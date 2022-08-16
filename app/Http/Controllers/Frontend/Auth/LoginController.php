<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use JWTAuth;
use Session;

class LoginController extends Controller
{
    //
    public function index()
    {
        $user = Auth::guard('web')->user();
        if (Auth::guard('web')->check()) {
            return redirect()->route('campaigns-confirmed');
        } else {
            return view('Frontend.layouts.Auth.login');
        }
    }

    public function loginProccess(Request $request)
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('campaigns-confirmed');
        } else {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => '1'])) {
                $credentials = $request->only('email', 'password');
                Session::put('auth_token', JWTAuth::attempt($credentials));
                return redirect()->route('campaigns-confirmed');
            } else {
                return redirect()->back()->with('error', 'User does not exist !');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->route('user-login');
    }
}