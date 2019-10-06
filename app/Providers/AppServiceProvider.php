<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Category;
use App\Models\Author;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $roles = Role::all();
        View::share('roles', $roles);
        
        $permissions  = Permission::all();
        View::share('permissions', $permissions);

        $categories  = Category::all();
        View::share('categories', $categories);
        $authors  = Author::all();
        View::share('authors', $authors);
    }
}
