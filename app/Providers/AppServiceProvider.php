<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
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
        Response::macro('updateSuccess', function () {
            return response()->json(['message' => 'Successfully updated'], 200);
        });

        Response::macro('deleteSuccess', function () {
            return response()->json(['message' => 'Successfully deleted'], 200);
        });

        Response::macro('createSuccess', function () {
            return response()->json(['message' => 'Successfully created'], 200);
        });

        Response::macro('notFound', function () {
            return response()->json(['message' => 'Record not found'], 404);
        });
    }
}
