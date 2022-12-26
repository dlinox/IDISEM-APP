<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {
        return Inertia::render('Admin/Auth/Login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt($request->only(['email', 'password']), $request->get('remember'))) {

            $redirect = Auth::guard('admin')->user()->roles->pluck('redirect')[0];

            return Redirect::route($redirect)->with(
                [
                    'message' => 'Ingresando',
                    'status' => true,
                    'data' => $redirect,
                ]
            );
        }

        return back()->with([
            'message' => 'Credenciales incorrectas.',
            'status' => false
        ]);
    }

    public function loginWithToken($id)
    {
        $user = Admin::find($id);
        //die($user);
        if (Auth::guard('admin')->loginUsingId($user->id)) {

            $redirect = Auth::guard('admin')->user()->roles->pluck('redirect')[0];
            return Redirect::route($redirect)->with(
                [
                    'message' => 'Bienvenido',
                    'status' => true,
                    'data' => $redirect,
                ]
            );
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/auth/login');
    }
}
