<?php

namespace Prezet\DocsTemplate\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Prezet\DocsTemplate\DocsTemplate
 */
class DocsTemplate extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Prezet\DocsTemplate\DocsTemplate::class;
    }
}
