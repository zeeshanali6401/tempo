<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function(){
    Route::get('users', 'index');
});

Route::get('users-export', function(){
    return Excel::download(new UsersExport, 'users.xlsx');
})->name('users.export');


Route::post('users-import', function(){
    Excel::import(new UsersImport(), request()->file('file'));
    return redirect()->back();
})->name('users.import');

Route::get('send_mail', [UserController::class, 'SendMail'])->name('send.mail');
