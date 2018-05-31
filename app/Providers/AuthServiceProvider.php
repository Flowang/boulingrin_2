<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Role;
use App\User;
use Barryvdh\Debugbar\Facade as Debugbar;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

   public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($users){
            $role = Role::where('name','Administrateur')->first();
            return $users->roles_id == $role->id;
        });

        Gate::define('isCommerçant', function($users){
            $role = Role::where('name','Commerçant')->first();
            return $users->roles_id == '2';
        });

        Gate::define('isClient', function($users){
            $role = Role::where('name','Client')->first();
            return $users->roles_id == '1';
        });
    }
}
