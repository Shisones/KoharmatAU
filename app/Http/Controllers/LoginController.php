<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminModel;
use App\Http\Controllers\AdminController;

class LoginController extends Controller
{
    public function index(){
        return view('login',['title' => 'Login']);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'admin_username' => 'required',
            'admin_password' => 'required'
        ]);
        
        if(Auth::attempt(['admin_username' => $credentials['admin_username'], 'password' => $credentials['admin_password']])){
            $request->session()->regenerate();
            
            return redirect()->intended('/admin');
        }

        return back()->with('loginError', 'Login gagal!');
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
