<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Events\WelcomeUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailWelcomeUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WelcomeUser $event): void
    {
        Mail::to($event->user->email)->send(new \App\Mail\TestMail($event->user));
    }
}
