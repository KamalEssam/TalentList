<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */

        public function register()
    {
        // here we bind interfaces and repositories to our project

        $webInterfacesAndRepositories = [
            'adminRepositoryInterface' => 'adminRepository',
            'contactUsRepositoryInterface' => 'contactUsRepository',
        ];

        foreach ($webInterfacesAndRepositories as $key => $value) {
            $this->app->bind("App\Http\interfaces\\".$key , "App\Http\Eloquent\\".$value);
        }
    }
}
