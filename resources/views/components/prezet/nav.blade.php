<div class="space-y-6">
    @foreach ($nav as $section)
        <div>
            <h5 class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                {{ $section['title'] }}
            </h5>
            <ul class="space-y-1">
                @foreach ($section['links'] as $link)
                    <li>
                        <a
                            href="{{ route('prezet.show', ['slug' => $link['slug']]) }}"
                            @class([
                                'group flex w-full items-center gap-2 rounded-md px-3 py-1.5 text-sm transition-colors',
                                'bg-primary-50 text-primary-700 font-medium dark:bg-primary-500/10 dark:text-primary-400' =>
                                    url()->current() === route('prezet.show', ['slug' => $link['slug']]),
                                'text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300' =>
                                    url()->current() !== route('prezet.show', ['slug' => $link['slug']]),
                            ])
                        >
                            {{ $link['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
