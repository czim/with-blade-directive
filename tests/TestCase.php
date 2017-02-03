<?php
namespace Czim\WithBladeDirective\Test;

use Czim\WithBladeDirective\Test\Helpers\TestServiceProvider;
use Czim\WithBladeDirective\WithBladeDirectiveServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app)
    {
        return [
            WithBladeDirectiveServiceProvider::class,
            TestServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
    }

}
