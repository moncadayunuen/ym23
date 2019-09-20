<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdatingCredentials extends Mailable
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
        return $this->view('emails.updatingCredentials')
                    ->subject('Actualización de Credenciales '.config('app.name'));
    }
}
