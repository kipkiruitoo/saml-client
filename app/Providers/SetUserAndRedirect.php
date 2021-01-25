<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Session\Session;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Session\Middleware\AuthenticateSession;

class SetUserAndRedirect
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // dd($event);
        // dd(auth()->user());

        // session()->put('user', auth()->user());

        // AuthenticateSessionController::login(auth()->user());

        // return redirect()->route('dashboard');
    }
}
