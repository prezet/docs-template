<article class="md:grid md:grid-cols-4 md:items-baseline">
    <div class="md:col-span-3 group relative">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-100 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
            <a href="{{ route('prezet.show', $article->slug) }}">
                <span class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"></span>
                <span class="relative z-10">{{ $article->frontmatter->title }}</span>
            </a>
        </h2>
        <time class="md:hidden relative z-10 order-first mb-3 flex items-center text-sm text-gray-500 dark:text-gray-400 pl-3.5" datetime="{{ $article->createdAt->toIso8601String() }}">
            <span class="absolute inset-y-0 left-0 flex items-center" aria-hidden="true">
                <span class="h-4 w-0.5 rounded-full bg-gray-200 dark:bg-gray-500"></span>
            </span>
            {{ $article->createdAt->format('F j, Y') }}
        </time>
        <div class="relative z-10 mt-2 text-sm text-gray-600 dark:text-gray-400">
             {{ $article->frontmatter->excerpt }}
        </div>
        <div class="relative z-10 mt-4 flex items-center text-sm font-medium text-primary-600 dark:text-primary-400">
            Read article
            <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="ml-1 h-4 w-4 stroke-current">
                <path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
    </div>
    <time class="mt-1 hidden md:block relative z-10 order-first mb-3 flex items-center text-sm text-gray-500 dark:text-gray-400" datetime="{{ $article->createdAt->toIso8601String() }}">
        {{ $article->createdAt->format('F j, Y') }}
    </time>
</article>