<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Models\Estudiante;
use App\Models\User;
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
        $estudiante = Estudiante::where('est_codigo_mat', $request->email)->first();

        if (!$estudiante) {
            return back()->with(['status' => false, 'message' => 'Usuario no registrado'])->withInput($request->only('email'));
        }

        if (Auth::attempt(['email' => $estudiante->est_correo, 'password' => $request->password])) {
            return redirect()->intended('/user');
        }

        return back()->with(['status' => false, 'message' => 'Credenciales incorrectas'])->withInput($request->only('email'));
    }

    public function loginWithToken($id)
    {
        $user = User::find($id);
        //die($user);
        if (Auth::loginUsingId($user->id)) {
            return redirect()->intended('/user');
        }
        return redirect('/user/auth/login')->with(['status' => false, 'message' => 'Error inesperado']);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/user/auth/login');
    }
}
