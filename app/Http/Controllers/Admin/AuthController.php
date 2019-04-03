<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.pages.login', [
            'classes' => 'login-page']);
    }

    public function loginPost(Request $request)
    {
        $remember = $request->input('remember') ? true : false;

        $authResult = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $remember);

        if ($authResult) {
            return redirect()->route('admin.main.index');
        } else {
            return redirect()->route('admin.auth.login')
                ->with('authError', 'Неправильный логин или пароль');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.auth.login');
    }
}
