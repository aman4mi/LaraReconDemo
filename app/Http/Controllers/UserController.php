<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Users;
use App\Models\User;

class UserController extends Controller {
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImportExport() {
        return view('file-import');
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request) {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport() {
        return Excel::download(new UsersExport, 'users-collection_data.xlsx');
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getDataFromController() {
        $query = "SELECT * FROM `users`";
        $data = \DB::select($query);
        //  dd($data);
        foreach ($data as $r) {
            // echo $r-> id, " | ",  $r-> name, " | ",  $r-> email  ;
            // echo $r-> email ;
            // echo "<br>";
            
        }
        return $data;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getDataFromUsersModel() {
        $userModel = new User;
        $data = $userModel->getAllData();
        var_dump($data);
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function clearUserModel() {
        $userModel = new User;
        $data = $userModel->deleteAllData();
    }
}
