<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetMail;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'form', 'input');
    }
    public function form()
    {
    	return view('layouts.login');
    }
    public function input(Request $request)
    {
    	$credentials = $request->only('email','password');
    	// return $credentials;//untuk mengecek credentials => bentuknya objek
    	$check = Auth::attempt($credentials); //untuk cek
    	if ($check) {
    		return redirect()->intended('/admin/dashboard');
    	} else {
    		return 'login gagal !';
    	}
    }
    public function logout()
    {
    	Auth::logout();
        return redirect('/login');
    }
}
