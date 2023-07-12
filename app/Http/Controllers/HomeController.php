<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('hompage.master');
    }

    public function redirect(){

        $userType=Auth::user()->userType;
            if($userType==1){
                return view('admin.index');
             }else{
                 return view('hompage.master');
        }
    }
}
