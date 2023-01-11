<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
            // 'captcha' => 'required|captcha'
        ]);

        $credentials = $request->only('email', 'password');
        if (captcha_check($request->captcha) == false) {
            Alert::error('Error', 'Captcha Failed!!');
            return back();
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        Alert::error('Error', 'Login Failed!!');
        return back();
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
