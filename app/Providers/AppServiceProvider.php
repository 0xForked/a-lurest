<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User\UsersModel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton('mailer', function ($app) {
            $app->configure('services');
            return $app->loadComponent('mail', 'Illuminate\Mail\MailServiceProvider', 'mailer');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

        Validator::extend('alpha_spaces', function ($attribute, $value) {
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        Validator::extend('no_spaces', function ($attribute, $value) {
            return preg_match('/^\S*$/u', $value);
        });

        Validator::extend('phone_number', function($attribute, $value) {
            return preg_match('/^[+(00)][0-9]{6,14}$/u', $value);
        });

    }

}
