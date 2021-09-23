<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\AgraniBankStatementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('file-import-export', [UserController::class, 'fileImportExport']);
Route::get('file-import-export', [UserController::class, 'fileImportExport'])->name('switch-file-import');
Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');
Route::get('get-data-c', [UserController::class, 'getDataFromController'])->name('get-data-n');
Route::get('get-data-m', [UserController::class, 'getDataFromUsersModel']);
Route::get('clear-user-all', [UserController::class, 'clearUserModel'])->name('clear-user-all');

Route::get('l-file-import-export', [LedgerController::class, 'ledgerFileImportExport'])->name('l-file-import-export');
Route::post('ledger-file-import', [LedgerController::class, 'ledgerFileImport'])->name('ledger-file-import');
Route::get('clear-ledger', [LedgerController::class, 'clearLedger'])->name('clear-ledger');

Route::get('get-ledger-dataview', [LedgerController::class, 'getLedgerDataView'])->name('get-ledger-dataview');
Route::get('get-ledger-data/{id}', [LedgerController::class, 'getLedgerData'])->name('get-ledger-data');

Route::get('queryexe', [LedgerController::class, 'ledgerExecutor'])->name('queryexe');
Route::post('queryexewithdata', [LedgerController::class, 'ledgerExecutorSqlData'])->name('queryexewithdata');

//from home
Route::get('wel2', [LedgerController::class, 'welcomeTwo']);
Route::get('lata', [LedgerController::class, 'lataD'])->name('lata');
Route::get('latadata', [LedgerController::class, 'getLata'])->name('lata.list');

//agrani
Route::get('ag-bank-show', [AgraniBankStatementController::class, 'agraniBankStmntImportShow'])->name('ag-bank-show');
Route::post('ag-bank-file-import', [AgraniBankStatementController::class, 'agraniBankStmntImport'])->name('ag-bank-file-import');


