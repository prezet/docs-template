<?php

namespace App\Http\Controllers\Prezet;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Prezet\Prezet\Prezet;

class IndexController
{
    public function __invoke(Request $request): RedirectResponse
    {
        $nav = Prezet::getSummary();
        
        // Get the first link from the first section
        $firstSection = $nav->first();
        $firstLink = $firstSection['links'][0] ?? null;
        
        if (!$firstLink) {
            abort(404, 'No content found');
        }
        
        return redirect()->route('prezet.show', ['slug' => $firstLink['slug']]);
    }
}
