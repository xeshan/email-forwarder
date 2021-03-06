<?php

namespace App\Providers;

use App\Role;
use App\User;
use Laravel\Passport\Passport; 
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
        Passport::routes();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1,2]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth-token
        Gate::define('auth_tokenaccess', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('auth_tokencreate', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('auth_tokenedit', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('auth_tokenview', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('auth_tokendelete', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        
        // Auth gates for: Email
        Gate::define('email_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('email_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('email_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('email_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('email_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

    }
}
