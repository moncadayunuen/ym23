<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable
{
    public $email;

    use Queueable, SerializesModels;

    public function __construct(Request $request)
    {
        $this->email = $request;
    }

    public function build()
    {
        return $this->subject('Contact from website YM23 - '.$this->email->subject)
                    ->from($this->email->email, $this->email->name)
                    ->to('moncadayunuen@gmail.com')
                    ->view('emails.contactEmail');
    }
}
