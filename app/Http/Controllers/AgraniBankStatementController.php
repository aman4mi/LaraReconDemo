<?php

namespace App\Http\Controllers;

use App\Models\Dash;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AgraniBankImport;
use App\Exports\UsersExport;
use App\Users;
use App\Models\User;
use App\Models\Ledger;
use DataTables;

class AgraniBankStatementController extends Controller
{



    public function agraniBankStmntImportShow()
    {
        return view('agranibankstmnt');
    }

    public function agraniBankStmntImport(Request $request)
    {
        $bid = $request -> bank_id;
        Excel::import(new AgraniBankImport($bid), $request->file('file')->store('temp'));

        // $query = "UPDATE agrani_bank_statements
        //            SET bank_id = $bid
        //           WHERE bank_id is null";
        // $data = \DB::insert($query);
        
        return back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dash  $dash
     * @return \Illuminate\Http\Response
     */
    public function show(Dash $dash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dash  $dash
     * @return \Illuminate\Http\Response
     */
    public function edit(Dash $dash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dash  $dash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dash $dash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dash  $dash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dash $dash)
    {
        //
    }
}
