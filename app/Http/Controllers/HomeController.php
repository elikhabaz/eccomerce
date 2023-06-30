<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){

        $userType=Auth::user()->userType;
            if($userType==1){
                return view('admin.home');
             }else{
                 return view('dashboard');
        }
    }
}
