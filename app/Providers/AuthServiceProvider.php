<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
   public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($users){
            return $users->roles_id == '3';
        });
        Gate::define('isClient', function($users){
            return $users->roles_id == '2';
        });
        Gate::define('isCommerçant', function($users){
            return $users->roles_id == '1';
        });
    }
}
