<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\CalificacionesController;
use App\Http\Controllers\Admin\EncuestaController;
use App\Http\Controllers\Admin\PreguntaController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::name('admin.')->prefix('admin')->group(function () {

    Route::middleware('auth:admin')->controller(AdminController::class)->group(function () {
        Route::get('', 'index')->name('index');
    });

    Route::resource('encuestas', EncuestaController::class)->middleware('auth:admin');
    Route::resource('calificaciones', CalificacionesController::class)->middleware('auth:admin');
    Route::resource('preguntas', PreguntaController::class)->middleware('auth:admin');
    Route::resource('usuarios', UsuariosController::class)->middleware('auth:admin');

    Route::middleware([])->name('auth.')->prefix('auth')->group(function () {
        Route::controller(LoginController::class)->group(function () {
            Route::get('/login', 'index')->name('index');
            Route::post('/login', 'login')->name('login');
            Route::delete('/logout', 'logout')->name('logout');
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
        });
        Route::controller(UserRegisterController::class)->group(function () {
            Route::get('/register', 'index')->name('index');
            Route::post('/register', 'register')->name('register');
            Route::post('/changer-password', 'changerPassword')->name('changer-password');
            Route::post('/agree-tyc', 'agreeTerms')->name('agree-tyc');

            Route::post('/val-code', 'validarCode')->name('val-code');
            Route::post('/send-email', 'sendEmail')->name('send-email');
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