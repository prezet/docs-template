<div class="space-y-8">
    @foreach ($nav as $section)
        <div>
            <div
                class="sidebar-group-header mb-3.5 flex items-center gap-2.5 pl-4 font-semibold text-gray-900 lg:mb-2.5 dark:text-gray-200"
            >
                <h5>{{ $section['title'] }}</h5>
            </div>
            <ul class="space-y-px">
                @foreach ($section['links'] as $link)
                    <li
                        id="/{{ $link['slug'] }}"
                        class="relative scroll-m-4 first:scroll-m-20"
                        data-title="{{ $link['title'] }}"
                    >
                        <a
                            @class([
                                'group flex w-full cursor-pointer items-center gap-x-3 rounded-xl py-1.5 pr-3 text-left outline-offset-[-1px]',
                                'bg-primary/10 text-primary dark:text-primary-light dark:bg-primary-light/10 [text-shadow:-0.2px_0_0_currentColor,0.2px_0_0_currentColor]' =>
                                    url()->current() === route('prezet.show', ['slug' => $link['slug']]),
                                'text-gray-700 hover:bg-gray-600/5 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-200/5 dark:hover:text-gray-300' =>
                                    url()->current() !== route('prezet.show', ['slug' => $link['slug']]),
                            ])
                            style="padding-left: 1rem"
                            href="{{ route('prezet.show', ['slug' => $link['slug']]) }}"
                        >
                            <div class="flex flex-1 items-center space-x-2.5">
                                <div class="">
                                    {{ $link['title'] }}
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>


