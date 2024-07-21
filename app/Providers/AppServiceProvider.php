<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing( function ( $notifiable, $url ) 
        {
            return ( new MailMessage )
                ->subject( 'Verificar Cuenta')
                ->line( 'Por favor, haga clic en el siguiente enlace para verificar su cuenta.' )
                ->action( 'Confirmar Cuenta', $url )
                ->line( 'Si no Creaste esta Cuenta puedes Ignorar este Mensaje.');
        });
    }
}
