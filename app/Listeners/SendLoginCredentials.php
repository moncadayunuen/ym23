<?php

namespace App\Listeners;

use App\Mail\LoginCredentials;
use App\Events\UserWasCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLoginCredentials
{
    public function handle(UserWasCreated $event)
    {
        Mail::to($event->user)->queue(
            new LoginCredentials($event->user, $event->password)
        );
    }
}
