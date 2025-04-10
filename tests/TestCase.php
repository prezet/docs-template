<?php

namespace Prezet\DocsTemplate\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Prezet\DocsTemplate\DocsTemplateServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            // DocsTemplateServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        config()->set('app.debug', 'true');

        config()->set('filesystems.disks.prezet', [
            'driver' => 'local',
            'root' => __DIR__.'/../content',
            'throw' => true,
        ]);

        $dbPath = __DIR__.'/Resources/prezet.sqlite';
        touch($dbPath);
        config()->set('database.connections.prezet', [
            'driver' => 'sqlite',
            'database' => $dbPath,
            'prefix' => '',
            'foreign_key_constraints' => true,
        ]);

        config()->set('database.default', 'prezet');

        Route::group([], function () {
            require __DIR__.'/../routes/prezet.php';
        });

        $migrations = __DIR__.'/../vendor/benbjurstrom/prezet/database/migrations';
        Artisan::call('migrate:fresh', [
            '--path' => $migrations,
            '--database' => 'prezet',
            '--realpath' => true,
            '--no-interaction' => true,
        ]);
    }
}
