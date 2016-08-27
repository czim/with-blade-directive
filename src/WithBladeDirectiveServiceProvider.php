<?php
namespace App\Providers;

use Czim\WithBladeDirective\RegistersWithDirective;
use Illuminate\Support\ServiceProvider;

class WithBladeDirectiveServiceProvider extends ServiceProvider
{
    use RegistersWithDirective;

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->registerWithDirective();
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }

}
