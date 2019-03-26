<?php

namespace Aammui\Tests;

use Orchestra\Database\ConsoleServiceProvider;
use Aammui\Laradash\LaradashServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @param   void
     * @return  void
     */
    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate', ['--database' => 'testbench']);
        $this->loadMigrationsFrom([
            '--database' => 'testbench',
            '--realpath' => realpath(__DIR__ . '/. . /migrations'),
        ]);
        $this->setUpRoutes();
    }
    /**
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
        // Setup the right User class (using stub)
        $app['config']->set('auth.providers.users.model', User::class);
    }
    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ConsoleServiceProvider::class,
            LaradashServiceProvider::class
        ];
    }
    /**
     * @return void
     */
    protected function setUpRoutes()
    {
        $this->app['router']->getRoutes()->refreshNameLookups();
    }
}
