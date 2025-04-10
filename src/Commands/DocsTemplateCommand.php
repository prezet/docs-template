<?php

namespace Prezet\DocsTemplate\Commands;

use Illuminate\Console\Command;

class DocsTemplateCommand extends Command
{
    public $signature = 'docs-template';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
