<nav class="space-y-8">
    @foreach ($nav as $section)
        <div>
            <h3 class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-200">
                {{ $section['title'] }}
            </h3>
            <div class="space-y-1">
                @foreach ($section['links'] as $link)
                    <a
                        href="{{ route('prezet.show', ['slug' => $link['slug']]) }}"
                        @class([
                            'flex w-full items-center justify-between rounded-md px-3 py-2 text-sm font-medium transition-colors',
                            'bg-accent-50 text-accent-700 dark:bg-accent-500/10 dark:text-accent-400' =>
                                url()->current() === route('prezet.show', ['slug' => $link['slug']]),
                            'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100' =>
                                url()->current() !== route('prezet.show', ['slug' => $link['slug']]),
                        ])
                    >
                        {{ $link['title'] }}
                        @if (url()->current() === route('prezet.show', ['slug' => $link['slug']]))
                            <div class="h-1.5 w-1.5 rounded-full bg-accent-600 dark:bg-accent-400"></div>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
</nav>

