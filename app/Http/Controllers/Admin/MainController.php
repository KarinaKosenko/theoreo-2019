<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.pages.main');
    }

    public function loginPost(Request $request)
    {
        $remember = $request->input('remember') ? true : false;

        $authResult = Auth::guard('admin')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $remember);

        if ($authResult) {
            //dump(Auth::guard('admin')->user());
            return redirect()->route('admin.main.index');
        } else {
            //dump(Auth::guard('admin')->user());
            return redirect()->route('login')
                ->with('authError', 'Неправильный логин или пароль');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('web')->logout();
        dump(Auth::user());
    }
}
