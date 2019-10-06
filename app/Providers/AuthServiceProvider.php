<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Permission;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissions = Permission::all();
        foreach ($permissions as $key => $permission) {
            Gate::define($permission->code, function($user) use ($permission){
                $user_permisssions = $user->role->permissions;
                foreach ($user_permisssions as $key => $user_permisssion) {
                    if ($permission->code == $user_permisssion->code) {
                        
                        return $permission->code == $user_permisssion->code;
                    }
                }
            });
        }
    }
}
