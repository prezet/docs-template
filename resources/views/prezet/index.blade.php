<x-prezet.template :nav="$nav" :headings="[]">
    @seo([
        'title' => 'Prezet: Markdown Blogging for Laravel',
        'description' => 'Transform your markdown files into SEO-friendly blogs, articles, and documentation!',
        'url' => route('prezet.index'),
    ])

    <section class="relative min-w-0 max-w-6xl">
        {{-- Header Section --}}
        <div class="py-10 border-b border-gray-200 sm:py-12 dark:border-gray-800">
            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <h1 class="font-display text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                        Documentation
                    </h1>
                    <p class="max-w-2xl text-base leading-7 text-gray-600 dark:text-gray-400">
                        Browse our latest guides, tutorials, and updates.
                    </p>
                </div>

                {{-- Active Filters --}}
                @if ($currentTag || $currentCategory)
                    <div class="flex flex-wrap items-center gap-2">
                        @if ($currentTag)
                            <span
                                class="inline-flex items-center gap-1.5 rounded-full bg-accent-50 px-3 py-1 text-xs font-medium text-accent-700 ring-1 ring-inset ring-accent-600/20 dark:bg-accent-500/10 dark:text-accent-400 dark:ring-accent-400/30"
                            >
                                <span>Tag: {{ \Illuminate\Support\Str::title($currentTag) }}</span>
                                <a
                                    href="{{ route('prezet.index', array_filter(request()->except('tag'))) }}"
                                    class="group relative -mr-1 flex h-3.5 w-3.5 items-center justify-center rounded-full hover:bg-accent-600/20 dark:hover:bg-accent-400/20"
                                >
                                    <span class="sr-only">Remove</span>
                                    <svg class="h-3 w-3 stroke-current" viewBox="0 0 14 14" fill="none">
                                        <path d="M4 4l6 6m0-6l-6 6" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </a>
                            </span>
                        @endif

                        @if ($currentCategory)
                            <span
                                class="inline-flex items-center gap-1.5 rounded-full bg-accent-50 px-3 py-1 text-xs font-medium text-accent-700 ring-1 ring-inset ring-accent-600/20 dark:bg-accent-500/10 dark:text-accent-400 dark:ring-accent-400/30"
                            >
                                <span>Category: {{ $currentCategory }}</span>
                                <a
                                    href="{{ route('prezet.index', array_filter(request()->except('category'))) }}"
                                    class="group relative -mr-1 flex h-3.5 w-3.5 items-center justify-center rounded-full hover:bg-accent-600/20 dark:hover:bg-accent-400/20"
                                >
                                    <span class="sr-only">Remove</span>
                                    <svg class="h-3 w-3 stroke-current" viewBox="0 0 14 14" fill="none">
                                        <path d="M4 4l6 6m0-6l-6 6" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </a>
                            </span>
                        @endif

                        @if($currentTag || $currentCategory)
                            <a href="{{ route('prezet.index') }}" class="ml-1 text-xs font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">Clear all</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        {{-- Articles List --}}
        <ul class="divide-y divide-gray-200 dark:divide-gray-800">
            @forelse ($articles as $article)
                <li class="py-12">
                    <x-prezet.article :article="$article" />
                </li>
            @empty
                <li class="py-24 text-center">
                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">No articles found</h3>
                    <p class="mt-1 text-gray-500 dark:text-gray-400">We couldn't find anything matching your criteria.</p>
                    <div class="mt-6">
                        <a href="{{ route('prezet.index') }}" class="text-sm font-semibold text-accent-600 hover:text-accent-500 dark:text-accent-400 dark:hover:text-accent-300">
                            View all articles <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </li>
            @endforelse
        </ul>

        {{-- Pagination --}}
        <div class="pt-10 pb-16">
            {{ $paginator->appends(request()->query())->links() }}
        </div>
    </section>
</x-prezet.template>
