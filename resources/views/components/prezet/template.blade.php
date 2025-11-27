<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://cdn.jsdelivr.net" />

        <x-prezet.meta />

        <link
            rel="icon"
            href="/favicon.ico"
            type="image/x-icon"
            sizes="16x16"
        />
        <link
            rel="icon"
            href="/favicon.svg"
            type="image/svg+xml"
            sizes="any"
        />
        <link rel="alternate" type="application/atom+xml" title="News" href="/feed">

        <!-- Scripts -->
        <!-- Zoomable Plugin (example version) -->
        <script defer src="https://unpkg.com/@benbjurstrom/alpinejs-zoomable@0.4.0/dist/cdn.min.js"></script>
        <script
            defer
            src="https://cdn.jsdelivr.net/npm/lite-youtube-embed@0.3.2/src/lite-yt-embed.min.js"
        ></script>
        <script
            defer
            src="https://unpkg.com/@alpinejs/ui@3.14.8/dist/cdn.min.js"
        ></script>
        <script
            defer
            src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.14.1/dist/cdn.min.js"
        ></script>
        <script
            defer
            src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"
        ></script>
        @vite(['resources/css/prezet.css'])
        @stack('jsonld')

        <script>
            ;(function () {
                const stored = localStorage.getItem('theme')
                const prefersDark = window.matchMedia(
                    '(prefers-color-scheme: dark)'
                ).matches
                const useDark =
                    stored === 'dark' || (stored === null && prefersDark)

                if (useDark) {
                    document.documentElement.classList.add('dark')
                }
            })()
        </script>
    </head>
    <body class="dark:bg-background-dark font-sans antialiased overscroll-none">
        <div class="min-h-screen">
            <x-prezet.alpine>
                <div
                    class="relative text-gray-500 antialiased dark:text-gray-200"
                >

                    <x-prezet.alpine>
                        {{-- Alpine.js only. No layout markup added by this component --}}

                        {{-- Sticky header: takes up its own space (not fixed), and aligns with main container --}}
                        <header
                            class="bg-background-light/95 dark:bg-background-dark/95 supports-[backdrop-filter]:bg-background-light/75 dark:supports-[backdrop-filter]:bg-background-dark/75 sticky top-0 z-30 backdrop-blur"
                        >
                            <div class="max-w-8xl mx-auto px-4 xl:px-4">
                                <x-prezet.header :document="$document ?? null" />
                            </div>
                        </header>

                        <main class="max-w-8xl relative mx-auto px-4 xl:px-4">
                            {{-- Mobile Sidebar (now inside main, below header; header stays unblurred) --}}
                            <div
                                x-cloak
                                x-show="showSidebar"
                                x-trap.inert.noscroll="showSidebar"
                                class="fixed inset-x-0 bottom-0 top-30 lg:top-16 z-40 flex overflow-hidden overscroll-none lg:hidden min-h-0"
                                style="display: none"
                            >
                                {{-- Overlay: scoped to main only (does NOT cover sticky header) --}}
                                <div
                                    x-show="showSidebar"
                                    class="absolute inset-0 bg-gray-900/40 backdrop-blur-sm"
                                    x-transition:enter="transition duration-300 ease-out"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition duration-200 ease-in"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    x-on:click="showSidebar = false"
                                ></div>

                                {{-- Drawer: slides in from left, beneath header --}}
                                <aside
                                    x-show="showSidebar"
                                    class="bg-background-light dark:bg-background-dark relative z-10 h-100dvh w-[85dvw] max-w-[22rem] min-w-[19rem] shadow-lg overscroll-none min-h-0"
                                    x-transition:enter="transform transition duration-300 ease-out"
                                    x-transition:enter-start="-translate-x-full"
                                    x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transform transition duration-200 ease-in"
                                    x-transition:leave-start="translate-x-0"
                                    x-transition:leave-end="-translate-x-full"
                                    x-on:click.outside="showSidebar = false"
                                    aria-label="Primary navigation"
                                >
                                    <div class="h-full overflow-y-auto overscroll-contain touch-pan-y ios-scroll px-4 pt-4 pb-12">
                                        <div class="relative lg:text-sm lg:leading-6">
                                            <x-prezet.sidebar-index :nav="$nav" />
                                        </div>
                                    </div>
                                </aside>
                            </div>

                            {{-- Responsive columns: 1 -> 2 (md/lg) -> 3 (xl) --}}
                            <div
                                class="grid grid-cols-1 gap-8 md:grid-cols-[18rem_minmax(0,1fr)] xl:grid-cols-[18rem_minmax(0,1fr)_19rem]"
                            >
                                {{-- Left Sidebar (desktop) --}}
                                <aside
                                    class="sticky top-36 hidden h-[calc(100vh-6rem)] w-[18rem] self-start md:block xl:w-[18rem]"
                                    aria-label="Primary navigation"
                                >
                                    <div class="h-full overflow-y-auto pr-0 md:pr-6 xl:pr-8">
                                        <div class="relative lg:text-sm lg:leading-6">
                                            <x-prezet.sidebar-index :nav="$nav" />
                                        </div>
                                    </div>
                                </aside>

                                {{-- Center Content --}}
                                {{ $slot }}

                                {{-- Right Sidebar (TOC) at xl+ --}}
                                @if(isset($headings) && !empty($headings))
                                <aside
                                    class="sticky top-36 hidden h-[calc(100vh-6rem)] self-start xl:flex"
                                    aria-label="On this page"
                                >
                                    <div
                                        class="z-10 box-border max-h-full w-[19rem] pl-10 xl:flex"
                                    >
                                        <x-prezet.sidebar-toc :headings="$headings" :active-heading="null" />
                                    </div>
                                </aside>
                                @endif
                            </div>
                        </main>

                        {{-- Search Modal - positioned at root level for full viewport overlay --}}
                        <div
                            x-cloak
                            x-show="searchOpen"
                            x-trap.inert.noscroll="searchOpen"
                            x-transition:enter="transition duration-300 ease-out"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition duration-200 ease-in"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            x-bind:aria-hidden="!searchOpen"
                            x-on:keydown.esc.prevent.stop="closeCommandPalette()"
                            class="z-90 fixed inset-0 overflow-y-auto overflow-x-hidden bg-zinc-900/75 p-4 backdrop-blur-xs will-change-auto md:py-8 lg:px-8 lg:py-16"
                            tabindex="-1"
                            role="dialog"
                            aria-modal="true"
                        >
                            <x-prezet.search-modal-dialog />
                        </div>
                        {{-- END Search Modal --}}
                    </x-prezet.alpine>
                </div>
            </x-prezet.alpine>
        </div>
    </body>
</html>
