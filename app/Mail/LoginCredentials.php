<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginCredentials extends Mailable
{
    public $user;
    public $password;

    use Queueable, SerializesModels;

    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        return $this->markdown('emails.loginCredentials')
                    ->subject('Credenciales de Acceso '.config('app.name'));
    }
}
