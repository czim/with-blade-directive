<?php
namespace Czim\WithBladeDirective\Test\Helpers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(realpath(__DIR__ . '/../views'), 'wbdtest');
    }

}
