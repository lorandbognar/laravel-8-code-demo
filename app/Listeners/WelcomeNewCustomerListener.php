<?php

namespace App\Listeners;

use App\Mail\WelcomeNewCustomerMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeNewCustomerListener
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
        Mail::to($event->customer->email)->send(new WelcomeNewCustomerMail());
        session()->flash('newcustomerlistenerhandle', ['type'=>'warning', 'content'=> sprintf("An email has been sent to: %s", $event->customer->email)]);
        // do the rest of the bullshit when user is created, like subscribe to newsletter, etc
    }
}