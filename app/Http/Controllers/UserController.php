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
        return view('admin.user.create-user');
    }

    public function storeuser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect('all-user')->with('status','user saved!');

    }
}
