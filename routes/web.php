<?php

function name_routes_resources($prefix = "")
{
    return [
        'index' => $prefix ? $prefix . 'listado'  : 'listado',
        'create' => $prefix ? $prefix .  'formulario.crear' : 'formulario.crear',
        'store' => $prefix ? $prefix . 'crear' : 'crear',
        'show' => $prefix ? $prefix . 'ver' : 'ver',
        'edit' =>  $prefix ? $prefix . 'formulario.editar' : 'formulario.editar',
        'update' => $prefix ? $prefix . 'editar' : 'editar',
        'destroy' => $prefix ? $prefix . 'eliminar' : 'eliminar',
    ];
};

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdministradoresController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\CalificacionesController;
use App\Http\Controllers\Admin\EncuestaController;
use App\Http\Controllers\Admin\EstudiantesController;
use App\Http\Controllers\Admin\PreguntaController;
use App\Http\Controllers\Admin\ReportesController;
use App\Http\Controllers\Admin\RespuestasController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\User\Auth\LoginController as UserLoginController;
use App\Http\Controllers\User\Auth\RegisterController as UserRegisterController;
use App\Http\Controllers\User\EncuestaController as UserEncuestaController;
use App\Http\Controllers\User\RespuestaController as UserRespuestaController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;




Route::get('', [UserLoginController::class, 'index'])->name('index');

//Auth::routes();

Route::name('admin.')->prefix('admin')->group(function () {

    Route::middleware('auth:admin')->controller(AdminController::class)->group(function () {
        Route::get('', 'index')->name('dashboard');
    });

    Route::middleware('auth:admin')->controller(ReportesController::class)->name('reportes.')->prefix('reportes')->group(function () {
        Route::get('excel-encuesta/{id}', 'downloadExcelEncuesta')->name('excel-encuesta'); //downloadExcelEncuesta
    });

    Route::resource('encuestas', EncuestaController::class)->middleware('auth:admin')->names(name_routes_resources('encuestas.'));

    Route::middleware('auth:admin')->controller(EncuestaController::class)->name('encuestas.')->prefix('encuestas')->group(function () {
        Route::post('/share', 'share')->name('compartir');
    });


    Route::resource('calificaciones', CalificacionesController::class)->middleware('auth:admin')->names(name_routes_resources('calificaciones.'));
    Route::resource('respuestas', RespuestasController::class)->middleware('auth:admin')->names(name_routes_resources('respuestas.'))->only('show');
    Route::resource('preguntas', PreguntaController::class)->middleware('auth:admin')->names(name_routes_resources('preguntas.'));
    Route::resource('usuarios', UsuariosController::class)->middleware('auth:admin')->names(name_routes_resources('usuarios.'));
    Route::resource('administradores', AdministradoresController::class)->middleware('auth:admin')->names(name_routes_resources('administradores.'));
    Route::resource('estudiantes', EstudiantesController::class)->middleware('auth:admin')->names(name_routes_resources('estudiantes.'));
    Route::resource('roles', RolesController::class)->middleware('auth:admin')->names(name_routes_resources('roles.'));


    Route::middleware([])->name('auth.')->prefix('auth')->group(function () {
        Route::controller(LoginController::class)->group(function () {
            Route::get('/login', 'index')->name('index');
            Route::post('/login', 'login')->name('login');
            Route::delete('/logout', 'logout')->name('logout');
            Route::get('/login-token/{id}', 'loginWithToken')->name('login-token')->middleware('signed');
        });

        Route::controller(RegisterController::class)->group(function () {
            Route::get('/register', 'index')->name('index');
            Route::post('/register', 'register')->name('register');
        });
    });
});

Route::name('user.')->prefix('user')->group(function () {

    Route::middleware('auth')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/save-info-add', 'saveInfoAdd')->name('save-info-add');
    });

    Route::name('auth.')->prefix('auth')->group(function () {
        Route::controller(UserLoginController::class)->group(function () {
            Route::get('/login', 'index')->name('index');
            Route::post('/login', 'login')->name('login');
            Route::delete('/logout', 'logout')->name('logout');
            Route::get('/login-token/{id}', 'loginWithToken')->name('login-token')->middleware('signed');
        });
        Route::controller(UserRegisterController::class)->group(function () {
            Route::get('/register', 'index')->name('index');
            Route::post('/register', 'register')->name('register');
            Route::post('/changer-password', 'changerPassword')->name('changer-password');
            Route::post('/agree-tyc', 'agreeTerms')->name('agree-tyc');
            
            Route::post('/val-code', 'validarCode')->name('val-code');
            Route::post('/send-email', 'sendEmail')->name('send-email');
            
            Route::post('/register-student', 'registerStudent')->name('register-student');

            Route::post('/register-sign-in', 'registerAndSignIn')->name('register-sign-in');
            
        });
    });

    Route::resource('encuestas', UserEncuestaController::class)->middleware('auth')->only('index', 'show');
    Route::resource('respuestas', UserRespuestaController::class)->middleware('auth')->only('store');
});

Route::get('/enviar-email', [MailController::class, 'enviarEmail'])->name('email');//prueba

/*
Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard',function(){
    return view('admin');
})->middleware('auth:admin');*/