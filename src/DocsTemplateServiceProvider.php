<?php

namespace Prezet\DocsTemplate;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Prezet\DocsTemplate\Commands\DocsTemplateCommand;

class DocsTemplateServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('docs-template')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_docs_template_table')
            ->hasCommand(DocsTemplateCommand::class);
    }
}
