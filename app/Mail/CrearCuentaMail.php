<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class CrearCuentaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }


    public function envelope()
    {
        return new Envelope(
            subject: 'Crear Cuenta Mail',
        );
    }


    public function content()
    {
        return new Content(
            view: 'mails.CreateCuentaMail',
        );
    }


    public function attachments()
    {
        return [];
    }
}
