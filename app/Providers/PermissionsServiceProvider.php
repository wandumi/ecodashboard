<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;

use App\Permission;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Checking if the use has the permission to access the view
        Permission::get()->map(function ($permission){
            Gate::define($permission->name, function ($user) use ($permission){
                return $user->hasPermissionTo($permission);
            });
        });

        //open the directive of the artisan
        Blade::directive('role', function($role){
            return '<?php if(auth()->check() && auth()->user()->hasRole({ $role }) )?>';
        });

        //close the directive of the artisan
        Blade::directive('endrole', function($role){
            return '<?php endif; ?>';
        });
    }
}
