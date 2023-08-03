<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Console\View\Components\Confirm;
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
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->phone = $request->phone;
        // $user->address = $request->address;
        // $user->save();
        // return redirect('all-user')->with('status','user saved!');
        $data = $request->validate([
            'name'=>['required' , 'string' , 'max:256'],
            'email'=>['required' , 'string' , 'max:256' , 'email' , 'unique:users'],
            'phone'=>['required' , 'string' , 'max:256'],
            'address'=>[ 'string' , 'max:256'],
            'password' => ['required', 'string', 'min:8']
        ]);
        $user = User::create($data);

        if($request->has('verify')){
            $user->markEmailAsVerified();
        }
        return redirect(route('all-users'))->with('status' , 'User Saved!');
    }
}
