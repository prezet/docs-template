<div>
    <div class="relative">
        <div class="flex h-16 min-w-0 items-center md:mx-3">
            <div
                class="relative flex h-full min-w-0 flex-1 items-center gap-x-4 border-b border-gray-950/5 dark:border-white/10"
            >
                <div class="flex flex-1 items-center gap-x-4">
                    <a class="" href="/">
                        <span class="sr-only">
                            {{ config('app.name') }} home page
                        </span>
                        <div
                            class="flex items-center gap-2 text-2xl tracking-tight"
                        >
                            <x-prezet.logo />
                            <span
                                class="font-semibold text-gray-900 dark:text-gray-200"
                            >
                                Prezet
                            </span>
                        </div>
                    </a>
                    <div class="hidden items-center gap-x-2 lg:flex"></div>
                </div>
                <div
                    class="relative hidden flex-1 items-center justify-center lg:flex"
                >
                    <button
                        type="button"
                        x-on:click="openCommandPalette()"
                        class="group flex h-9 w-full max-w-xs items-center gap-2 rounded-lg border border-gray-200 bg-white/50 px-3 text-sm text-gray-500 shadow-sm transition-all hover:border-gray-300 hover:bg-white hover:shadow-md dark:border-gray-800 dark:bg-gray-900/50 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-900"
                        aria-label="Open search"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-search size-4 text-gray-400 group-hover:text-gray-500 dark:group-hover:text-gray-300"
                        >
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                        <span class="flex-1 text-left text-sm text-gray-500 dark:text-gray-200">Search...</span>
                        <span class="flex items-center gap-0.5 rounded border border-gray-200 bg-gray-100 px-1.5 py-0.5 text-[10px] font-medium text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200">
                            <span x-text="searchModifierKey"></span>K
                        </span>
                    </button>
                </div>
                <div
                    class="relative ml-auto flex flex-1 items-center justify-end gap-3"
                >
                    <x-prezet.version-select />
                    <a
                        target="_blank"
                        class="order-last lg:order-none group relative inline-flex items-center px-4 py-1.5 text-sm font-semibold"
                        href="https://github.com/prezet/prezet"
                    >
                        <span
                            class="bg-primary-600 absolute inset-0 rounded-lg transition-opacity group-hover:opacity-90"
                        ></span>
                        <div
                            class="relative z-10 mr-0.5 flex items-center space-x-2.5"
                        >
                            <svg
                                viewBox="0 0 20 20"
                                class="size-5 fill-white"
                            >
                                <path
                                    class="fill-white/90"
                                    d="M10 0C4.475 0 0 4.475 0 10a9.994 9.994 0 006.838 9.488c.5.087.687-.213.687-.476 0-.237-.013-1.024-.013-1.862-2.512.463-3.162-.612-3.362-1.175-.113-.287-.6-1.175-1.025-1.412-.35-.188-.85-.65-.013-.663.788-.013 1.35.725 1.538 1.025.9 1.512 2.337 1.087 2.912.825.088-.65.35-1.088.638-1.338-2.225-.25-4.55-1.112-4.55-4.937 0-1.088.387-1.987 1.025-2.688-.1-.25-.45-1.274.1-2.65 0 0 .837-.262 2.75 1.026a9.28 9.28 0 012.5-.338c.85 0 1.7.112 2.5.337 1.912-1.3 2.75-1.024 2.75-1.024.55 1.375.2 2.4.1 2.65.637.7 1.025 1.587 1.025 2.687 0 3.838-2.337 4.688-4.562 4.938.362.312.675.912.675 1.85 0 1.337-.013 2.412-.013 2.75 0 .262.188.574.688.474A10.016 10.016 0 0020 10c0-5.525-4.475-10-10-10z"
                                ></path>
                            </svg>
                            <span class="text-white">GitHub</span>
                        </div>
                    </a>
                    <button
                        type="button"
                        x-on:click="openCommandPalette()"
                        class="lg:hidden flex h-8 w-8 items-center justify-center text-gray-500 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-100"
                        aria-label="Open search"
                    >
                        <span class="sr-only">Search...</span>
                        <svg class="size-5 fill-gray-500 hover:fill-gray-600 dark:fill-gray-400 dark:hover:fill-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </button>
                    <x-prezet.dark-mode-toggle />
                </div>
            </div>
        </div>
        <button
            x-on:click="showSidebar = true"
            type="button"
            class="flex h-14 w-full items-center py-4 text-left focus:outline-0 md:hidden"
        >
            <div
                class="text-gray-500 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-100"
            >
                <span class="sr-only">Navigation</span>
                <svg
                    class="h-4"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                >
                    <path
                        d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"
                    ></path>
                </svg>
            </div>
            @if(isset($document) && $document)
            <div
                class="ml-4 flex min-w-0 space-x-3 overflow-hidden text-sm leading-6 whitespace-nowrap"
            >
                <div class="flex flex-shrink-0 items-center space-x-3">
                    <span>{{ $document->category }}</span>
                    <svg
                        width="3"
                        height="24"
                        viewBox="0 -9 3 24"
                        class="h-5 rotate-0 overflow-visible fill-gray-400"
                    >
                        <path
                            d="M0 0L3 3L0 6"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                        ></path>
                    </svg>
                </div>
                <div
                    class="min-w-0 flex-1 truncate font-semibold text-gray-900 dark:text-gray-200"
                >
                    {{ $document->frontmatter->title }}
                </div>
            </div>
            @endif
        </button>
    </div>
</div>
