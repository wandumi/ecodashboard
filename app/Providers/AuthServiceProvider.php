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

        //This is a Super User of the system
        Gate::define('isSuperadmin', function($user){
            return $user->type === 'Super Admin';
        });

        // THis is a Administrator
        Gate::define('isAdmin', function($user){
            return $user->type === 'Admin';
        });

        // THis is a moderator
        Gate::define('isModerator', function($user){
            return $user->type === 'Moderator';
        });

        // THis is a Author
        Gate::define('isAuthor', function($user){
            return $user->type === 'Author';
        });

        // THis is a User
        Gate::define('isUser', function($user){
            return $user->type === 'User';
        });


    }
}
