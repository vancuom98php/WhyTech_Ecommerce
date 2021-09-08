<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Role;

class BladeServiceProvider extends ServiceProvider
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
        Blade::if('hasRole', function ($expression) {
            if (Auth::user()) {
                $admin = Admin::where('admin_email', Auth::user()->admin_email)->first();
                if ($admin->hasRole($expression))
                    return true;
            }
            return false;
        });

        Blade::if('hasAnyRoles', function ($expression) {
            if (Auth::user()) {
                $admin = Admin::where('admin_email', Auth::user()->admin_email)->first();
                if ($admin->hasAnyRoles($expression))
                    return true;
            }
            return false;
        });
    }
}
