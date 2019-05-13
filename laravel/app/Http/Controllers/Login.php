<?php

namespace App\Http\Controllers;

use App\Model\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Login extends Controller
{
    public function index(){
    	if (!Session::get('login')) {
    		return redirect('login')->with('alert', 'Kamu Harus Login Dahulu');
    	}
    	else{
    		return view('user');
    	}
    }

    public function login(){
    	return view('login');
    }

    public function postnyalogin(Request $request){
    	$username = $request->username;
    	$password = $request->password;
    }
}
