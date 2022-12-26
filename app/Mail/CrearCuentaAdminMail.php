<?php

namespace App\Mail;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CrearCuentaAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(Admin $user)
    {
        //
        $this->user = $user;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Crear Cuenta Admin Mail',
        );
    }


    public function content()
    {
        return new Content(
            view: 'mails.CreateCuentaAdminMail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
