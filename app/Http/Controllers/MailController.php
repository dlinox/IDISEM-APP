<?php

namespace App\Http\Controllers;

use App\Mail\CrearCuentaMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function enviarEmail()
    {
        Mail::to('dpumaticona@gmail.com')->send(new CrearCuentaMail());
    }
    
}
