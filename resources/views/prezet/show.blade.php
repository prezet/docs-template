<x-prezet.template :document="$document" :nav="$nav" :headings="$headings">
    @php
        seo()
        ->title($document->frontmatter->title)
        ->description($document->frontmatter->excerpt)
        ->url('https://prezet.com' . route('prezet.show', ['slug' => $document->slug], false))
        ->image(url($document->frontmatter->image))
        ->tag('robots', str_contains(request()->path(), 'v0.x') ? 'none' : 'all');
    @endphp

    @push('jsonld')
        <script type="application/ld+json">{!! $linkedData !!}</script>
    @endpush

    <section class="mt-8 min-w-0 md:mr-8 xl:mr-0">

        <div class="relative">
            <div class="space-y-2.5">
                <div
                    class="eyebrow text-xs font-bold tracking-wide uppercase text-primary-600 dark:text-primary-400 h-5"
                >
                    {{ $document->category }}
                </div>

                <div
                    class="relative flex flex-col items-start gap-2 sm:flex-row sm:items-center"
                >
                    <h1
                        class="inline-block text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-gray-100"
                    >
                        {{ $document->frontmatter->title }}
                    </h1>
                </div>
            </div>

            <div
                class="mt-4 text-lg leading-8 text-gray-600 dark:text-gray-300"
            >
                <p>{{ $document->frontmatter->description }}</p>
            </div>
        </div>

        <article
            class="prose prose-gray dark:prose-invert relative mt-8 mb-14 !max-w-none"
        >
            {!! $body !!}
        </article>

        <x-prezet.footer />
    </section>

</x-prezet.template>
