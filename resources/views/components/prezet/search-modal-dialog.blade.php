{{-- Command Palette Container --}}
<div
    x-cloak
    x-show="searchOpen"
    x-transition:enter="transition duration-300 ease-out"
    x-transition:enter-start="-translate-y-32 opacity-0"
    x-transition:enter-end="translate-y-0 opacity-100"
    x-transition:leave="transition duration-150 ease-in"
    x-transition:leave-start="translate-y-0 opacity-100"
    x-transition:leave-end="-translate-y-32 opacity-0"
    x-on:click.outside="closeCommandPalette()"
    class="mx-auto flex w-full max-w-lg flex-col rounded-xl shadow-xl will-change-auto dark:text-gray-100 dark:shadow-black/25"
    role="document"
>
    {{-- Search Input --}}
    <div
        class="relative rounded-t-lg bg-white px-2 pt-2 dark:bg-gray-800"
    >
        <div
            class="flex w-full items-center rounded-lg bg-gray-100 px-3 dark:bg-gray-700/75"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                data-slot="icon"
                stroke-width="1.5"
                class="hi-mini hi-magnifying-glass inline-block size-6 opacity-50"
            >
                <path
                    fill-rule="evenodd"
                    d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z"
                    clip-rule="evenodd"
                />
            </svg>

            <input
                x-ref="searchFilter"
                x-model="searchFilterTerm"
                x-on:input.debounce.300ms="filterSearch($event)"
                x-on:keydown.enter.prevent.stop="onSearchOptionSelected()"
                x-on:keydown.up.prevent.stop="navigateSearchResults('previous')"
                x-on:keydown.down.prevent.stop="navigateSearchResults('next')"
                x-on:keydown.home.prevent.stop="navigateSearchResults('first')"
                x-on:keydown.end.prevent.stop="navigateSearchResults('last')"
                x-on:keydown.page-up.prevent.stop="navigateSearchResults('first')"
                x-on:keydown.page-down.prevent.stop="navigateSearchResults('last')"
                type="text"
                class="w-full border-none bg-transparent py-3 text-sm placeholder:text-gray-500 focus:outline-hidden focus:ring-0 dark:placeholder:text-gray-400"
                placeholder="Search..."
                tabindex="0"
                role="combobox"
                aria-expanded="true"
                aria-autocomplete="list"
            />
            <svg
                x-show="searchLoading"
                class="inline-block size-6 animate-spin opacity-50"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
            >
                <circle
                    class="opacity-25"
                    cx="12"
                    cy="12"
                    r="10"
                    stroke="currentColor"
                    stroke-width="4"
                ></circle>
                <path
                    class="opacity-75"
                    fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                ></path>
            </svg>
        </div>
    </div>
    {{-- END Search Input --}}

    {{-- Listbox --}}
    <ul
        x-show="searchFilterResults.length > 0"
        x-ref="searchListbox"
        x-on:mousemove.throttle="enableMouseInteraction()"
        x-on:mouseleave="setSearchHighlighted(null)"
        class="max-h-72 overflow-auto rounded-b-xl bg-white p-2 dark:bg-gray-800"
        role="listbox"
    >
        <template x-for="option in searchFilterResults" :key="option.id">
            <li
                x-on:click="onSearchOptionSelected()"
                x-on:mouseenter="setSearchHighlighted(option.id, 'mouse')"
                x-bind:class="{
                    'text-white bg-primary-600 dark:text-white dark:bg-primary-600': isSearchHighlighted(
                        option.id,
                    ),
                    'text-gray-600 dark:text-gray-300': ! isSearchHighlighted(option.id),
                }"
                x-bind:data-selected="isSearchHighlighted(option.id)"
                x-bind:data-id="option.id"
                x-bind:data-label="option.text"
                x-bind:aria-selected="isSearchHighlighted(option.id)"
                class="group flex cursor-pointer flex-col rounded-lg px-3 py-3 text-sm"
                role="option"
                tabindex="-1"
            >
                <div class="flex grow items-center">
                    <div
                        x-text="option.text"
                        class="font-medium"
                    ></div>
                </div>
                <div class="flex-none text-xs font-semibold opacity-75">
                    <span x-text="option.slug"></span>
                </div>
            </li>
        </template>
    </ul>
    {{-- END Listbox --}}

    {{-- No Results Feedback --}}
    <div
        x-show="searchFilterResults.length === 0"
        class="rounded-b-xl bg-white p-3 dark:bg-gray-800"
    >
        <div
            class="space-y-3 py-1.5 text-center text-sm text-gray-500 dark:text-gray-400"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                data-slot="icon"
                class="hi-outline hi-x-circle inline-block size-8 opacity-50"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                />
            </svg>
            <p>No search results</p>
        </div>
    </div>
    {{-- END No Results Feedback --}}
</div>
{{-- END Command Palette Container --}}


