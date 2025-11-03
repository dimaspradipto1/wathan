<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view('layouts.auth.login');
    }

    public function register()
    {
        return view('layouts.auth.register');
    }

    public function loginproses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if ($validator->fails()) {
            Alert::error('error', 'Login failed')->autoclose(2000)->toToast();
            return redirect(route('login'));
        }
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            Alert::success('success', 'Login successful')->autoclose(2000)->toToast();
            return redirect(route('dashboard'));
        } else {
            Alert::error('error', 'Invalid credentials')->autoclose(2000)->toToast();
            return redirect(route('login'));
        }
    }

    public function logout()
    {
        Auth::logout();
        Alert::success('sucesss','logout success')->autoclose(2000)->toToast();
        return redirect(route('login'));
    }
}
