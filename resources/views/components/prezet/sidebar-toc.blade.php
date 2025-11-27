@props(['headings', 'activeHeading'])

<nav
    class="-mt-10 w-[16.5rem] space-y-2 overflow-y-auto pt-10 pb-4 text-sm leading-6 text-gray-600"
>
    <button
        class="flex cursor-pointer items-center space-x-2 font-medium text-gray-700 transition-colors hover:text-gray-900 dark:text-gray-300 dark:hover:text-gray-100"
        type="button"
        aria-label="On this page"
        @click="window.scrollTo({top: 0, behavior: 'smooth'})"
    >
        <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            class="h-3 w-3"
        >
            <path
                d="M2.444 12.667H13.556"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M2.444 3.333H13.556"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M2.444 8H7.333"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
        </svg>
        <span>On this page</span>
    </button>

    <ul class="toc">
        @foreach ($headings as $h2)
            <li
                class="toc-item relative"
                data-depth="0"
            >
                <a
                    href="#{{ $h2['id'] }}"
                    class="block py-1 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300"
                    :class="{'text-primary dark:text-primary-light border-primary dark:border-primary-light hover:border-primary dark:hover:border-primary-light font-medium': activeHeading === '{{ $h2['id'] }}'}"
                    x-on:click.prevent="scrollToHeading('{{ $h2['id'] }}')"
                >
                    {{ $h2['title'] }}
                </a>
            </li>
            @foreach ($h2['children'] as $h3)
                <li class="toc-item relative">
                    <a
                        href="#{{ $h3['id'] }}"
                        class="group flex items-start py-1 pl-4 text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300"
                        :class="{'text-primary dark:text-primary-light': activeHeading === '{{ $h3['id'] }}'}"
                        x-on:click.prevent="scrollToHeading('{{ $h3['id'] }}')"
                    >
                        {{ $h3['title'] }}
                    </a>
                </li>
            @endforeach
        @endforeach
    </ul>
</nav>


