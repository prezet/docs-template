<article class="flex flex-col items-start justify-between">
    <div class="flex items-center gap-x-4 text-xs">
        <time datetime="{{ $article->createdAt->toIso8601String() }}" class="text-gray-500 dark:text-gray-200">
            {{ $article->createdAt->format('F j, Y') }}
        </time>
        @if($article->category)
            <a href="{{ route('prezet.index', ['category' => $article->category]) }}" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                {{ $article->category }}
            </a>
        @endif
    </div>
    <div class="group relative">
        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-primary-600 dark:text-white dark:group-hover:text-primary-400 transition-colors duration-200">
            <a href="{{ route('prezet.show', $article->slug) }}">
                <span class="absolute inset-0"></span>
                {{ $article->frontmatter->title }}
            </a>
        </h3>
        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-200">
            {{ $article->frontmatter->excerpt }}
        </p>
    </div>
    @if(!empty($article->frontmatter->tags))
        <div class="mt-4 flex flex-wrap gap-2 relative z-10">
            @foreach($article->frontmatter->tags as $tag)
                <a href="{{ route('prezet.index', ['tag' => $tag]) }}" class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-200 dark:ring-gray-700 dark:hover:bg-gray-700 transition-colors duration-200">
                    {{ $tag }}
                </a>
            @endforeach
        </div>
    @endif
</article>