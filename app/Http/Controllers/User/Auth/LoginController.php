<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return Inertia::render('User/Auth/Login');
    }

    public function login(UserLoginRequest $request)
    {

        if (Auth::attempt($request->only(['email', 'password']), $request->get('remember'))) {
            return redirect()->intended('/user');
        }

        return back()->with(['status' => false, 'message' => 'Credenciales incorrectas'])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/user/auth/login');
    }
}
