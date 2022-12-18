<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Mail\CrearCuentaMail;
use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;

class RegisterController extends Controller
{
    use RegistersUsers;


    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6',],
        ]);
    }

    protected function validatorCode(array $data)
    {
        return Validator::make($data, [
            'code' => ['required', 'integer', 'digits:6', 'exists:estudiantes,est_codigo_mat'],
        ]);
    }

    protected function validatorPassword(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:6',],
        ]);
    }


    public function index()
    {
        return Inertia::render('User/Auth/Register');
    }

    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);


        return Redirect::route('user.auth.register')->with(
            [
                'message' => 'Registro exitoso.',
                'status' => true
            ]
        );
    }

    public function validarCode(Request $request)
    {

        $this->validatorCode($request->all())->validate();

        //estudiantes
        $estudiante = Estudiante::where('est_codigo_mat', $request->code)->first();

        $data = (object)[
            'id' => $estudiante->est_id,
            'nombre' => $estudiante->est_nombres . ' ' . $estudiante->est_paterno . ' ' . $estudiante->est_materno,
            'correo' => substr_replace($estudiante->est_correo, '***', 2, 4),
        ];

        return back()->with(['data' => $data, 'message' => 'Estudiante encontrado', 'status' => true]);
    }

    public function sendEmail(Request $request)
    {
        $this->validatorCode($request->all())->validate();

        $estudiante = Estudiante::select('estudiantes.*', 'users.id')
            ->leftjoin('users', 'student', '=', 'est_id')
            ->where('est_codigo_mat', $request->code)
            ->first();

        if ($estudiante->id === null) {
            try {
                DB::transaction(function () use ($estudiante) {
                    $password =  Str::random(8);
                    $user =  User::create([
                        'name' =>  $estudiante->est_nombres . ' ' . $estudiante->est_paterno . ' ' . $estudiante->est_materno,
                        'email' => $estudiante->est_correo,
                        'student' => $estudiante->est_id,
                        'password' =>  Hash::make($password)
                    ]);

                    $user->password =  $password;
                    Mail::to($estudiante->est_correo)->send(new CrearCuentaMail($user));
                });
            } catch (\Throwable $th) {
                return Redirect::route('user.auth.register')->with(['message' => 'Ocurrio un error, vuelva a intentarlo', 'status' => false]);
            }
        } else {
            return Redirect::route('user.auth.register')->with(['message' => 'El usuario ya se encuentra registrado', 'status' => false]);
        }

        return Redirect::route('user.auth.login')->with(['message' => 'Usuario creado, Correo Enviado', 'status' => true]);
    }

    public function changerPassword(Request $request)
    {
        $this->validatorPassword($request->all())->validate();

        $user =  User::find(Auth::user()->id);
        $user->password =  Hash::make($request->password);
        $user->password_state =  1;
        $user->save();

        return Redirect::route('user.index')->with(
            [
                'message' => 'Contraseña cambiada con exito.',
                'status' => true
            ]
        );
    }

    public function agreeTerms()
    {
        $user =  User::find(Auth::user()->id);
        $user->tyc_date =  date('Y-m-d H:i:s');
        $user->tyc_state =  1;
        $user->save();
        return Redirect::route('user.index');
    }
    //
}
