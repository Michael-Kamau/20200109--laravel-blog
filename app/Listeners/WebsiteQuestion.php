<?php

namespace App\Listeners;

use App\Mail\RegisterMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class WebsiteQuestion
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        Log::info('New Question From User.');
        Mail::to('test@test.com')->send(new RegisterMail($event->data));
    }
}
