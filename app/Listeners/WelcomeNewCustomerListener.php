<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ResigrationUserMail;
use Mail;

class WelcomeNewCustomerListener
{
   

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user->email)
        ->send(new ResigrationUserMail($event->user));
    }
}
