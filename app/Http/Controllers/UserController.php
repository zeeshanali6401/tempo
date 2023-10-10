<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Jobs\SendMail;

class UserController extends Controller

{
    public function index()
    {
        $users = User::get();
        return view('users', compact('users'));
    }
    public function SendMail(){
        $emails = User::pluck('email')->toArray();
        dispatch(new SendMail($emails));  // send to que-jobs
        dd('done');
    }

}
