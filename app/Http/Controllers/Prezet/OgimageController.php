<?php

namespace App\Http\Controllers\Prezet;

use BenBjurstrom\Prezet\Models\Document;
use Illuminate\View\View;

class OgimageController
{
    public function __invoke(string $slug): View
    {
        $doc = app(Document::class)::query()
            ->where('slug', $slug)
            ->when(config('app.env') !== 'local', function ($query) {
                return $query->where('draft', false);
            })
            ->firstOrFail();

        return view('prezet::ogimage', [
            'fm' => $doc->frontmatter,
        ]);
    }
}
