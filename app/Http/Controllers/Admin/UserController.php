<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Console\View\Components\Confirm;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function edituser($id){

        $user = User::find($id);
        return view('admin.user.edit-user')->with('user', $user);
    }

    public function updateuser(Request $request , $id){
        $user = User::find($id);
        $data = $request->validate([
            'name'=>['required' , 'string' , 'max:256'],
            'email'=>['required' , 'string' , 'max:256' , 'email' ,Rule::unique('users')->ignore($user->id)], //this users in unique is table name
            'phone'=>['required' , 'string' , 'max:256'],
            'address'=>[ 'string' , 'max:256']
        ]);
        ///when I want edit some people dont want change the password so I can make if and in this loop we say if the password field is not empty so validate that and not change it
        if(!is_null($request->password)){
            $request->validate([
            'password' => ['required', 'string', 'min:8']
            ]);

        $data['password'] = $request->password;
        }
        $user->update($data);

        //for verify email we make condition in view if the user is Active pls dont show us the verify button
        //so now we should verify if one of users is Inactive: make coundition and verify email
        if($request->has('verify')){
          $user->markEmailAsVerified();
        }
        return redirect(route('all-users'))->with('upd' , 'User Upadte!');
    }

    // public function distroy($id){
    //     $user = User::findOrFail($id);
    //     $user->delete();
    //     return redirect()->route('all-users')->with('del' , 'deleted');
    // }

    public function deleteuser($id){
        $user= User::find($id);
        $user->delete();
        return response()->json(['status' => 'User deleted successfully']);
    }
}
