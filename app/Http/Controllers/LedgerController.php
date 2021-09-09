<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LedgerImport;
use App\Exports\UsersExport;
use App\Users;
use App\Models\User;
use App\Models\Ledger;
use DataTables;

class LedgerController extends Controller
{

    public function ledgerFileImportExport()
    {
        return view('ledger-file-import');
    }

    public function ledgerFileImport(Request $request)
    {
        Excel::import(new LedgerImport, $request->file('file')
            ->store('temp'));
        return back();
    }

    public function clearLedger()
    {
        // $query="DELETE FROM `ledgers`";
        $query = "SELECT 1";
        $data = \DB::select($query);
        // return $data;
        return redirect('lata')->with('success', 'Item created successfully!'); //redirects in get method
        
    }

    public function getLedgerDataView()
    {
        return view('ledgerlist');
    }

    public function getLedgerData($id = 0)
    {
        // get records from database
        if ($id == 0)
        {
            //laravel syntex
            //   $arr['data'] = Ledger::orderBy('id', 'asc')->get();
            //manual sql
            $query = "SELECT * FROM ledgers ";
            $arr['data'] = \DB::select($query);
            //  return $data;
            
        }
        else
        {
            //laravel syntex
            //   $arr['data'] = Ledger::where('id', $id)->first();
            //manual sql
            $query = "SELECT * FROM ledgers where id = $id ";
            $arr['data'] = \DB::select($query);
        }
        return json_encode($arr);
        // echo json_encode($arr);
        // exit;
        
    }

    public function ledgerExecutor()
    {
        return view('sqlexecutor');
    }

    public function ledgerExecutorSqlData(Request $request)
    {

        $query = $request->textData;
        // dd($query);
        $data = \DB::insert($query);
        return redirect('queryexe')->with('success', 'Data Saved Successfully.');
    }

    public function welcomeTwo()
    {
        return view('layout/welcome2');
    }

    public function lataD()
    {
        return view('layout/lata');
    }

    //composer require yajra/laravel-datatables-oracle
    public function getLata(Request $request)
    {
        if ($request->ajax())
        {
            $query = "SELECT * FROM `ledgers`";
            $data = \DB::select($query);

            // $data = Ledger::latest()->get();
            return Datatables::of($data)
            ->with(['message', 'Data Save Successfully.'])
            ->addIndexColumn()->addColumn('action', function ($row)
            {
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })->rawColumns(['action'])
                ->make(true);
        }
    }

}

