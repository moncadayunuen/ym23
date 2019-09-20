<?php

namespace App\Listeners;

use App\Mail\UpdatingCredentials;
use App\Events\UserWasUpdated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUpdatingCredentials
{
    public function handle(UserWasUpdated $event)
    {
        Mail::to($event->user->email)->send(
            new UpdatingCredentials($event->user, $event->password)
        );
    }
}
