<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use  Aacotroneo\Saml2\Events\Saml2LoginEvent;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        Login::class => [
            SetUserAndRedirect::class,
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //

        Event::listen('Aacotroneo\Saml2\Events\Saml2LoginEvent', function (Saml2LoginEvent $event) {
            $messageId = $event->getSaml2Auth()->getLastMessageId();
            // Add your own code preventing reuse of a $messageId to stop replay attacks
            // dd($messageId);
            $user = $event->getSaml2User();
            $userData = [
                'id' => $user->getUserId(),
                'attributes' => $user->getAttributes(),
                'assertion' => $user->getRawSamlAssertion()
            ];

            // check if user exists in our local database
            if (User::where('email', $userData['id'])->exists()) {
                // means the user exists on our local database and we shouldn't create one

                $user = User::where('email', $userData['id'])->first();
                // dd($user);
            } else {
                // user doesn't exist  in the db so create one
                $user =  User::firstOrCreate(['email' => $userData['attributes']["http://schemas.xmlsoap.org/ws/2005/05/identity/claims/emailaddress"][0], 'name' => $userData['attributes']["http://schemas.xmlsoap.org/claims/CommonName"][0], 'password' => Hash::make('password')],);
            }

            Auth::login($user, $remember = true);


            // Session::put('user', $user);
            // SessionGuard::setUser($user);

            // AuthenticatedSessionController::login($user);

            // dd(Auth::user());
        });
    }
}
