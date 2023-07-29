<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function allusers(){
        $users = User::all();
        return view('admin.user.all-users' , compact('users'));
    }

    public function createuser(){
        dd('vgkighkjh');
    }
}
