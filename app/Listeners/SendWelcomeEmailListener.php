<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\WelcomeEmailNotification;

class SendWelcomeEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object Verified $event
     * @return void
     */
    public function handle(Verified $event)
    {
        if ($event->user->hasVerifiedEmail()) {

            $event->user->notify(new WelcomeEmailNotification());
        }
    }
}
