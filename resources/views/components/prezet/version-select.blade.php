<div
    x-data="{
        getCurrentVersion() {
            let path = window.location.pathname;
            if (path.includes('/v0.x')) return 'v0.x';
            if (path.includes('/v1.0-rc')) return 'v1.0-rc';
            return 'v1.x';
        },
        currentVersion: '',
        init() {
            this.currentVersion = this.getCurrentVersion();
        },
        switchVersion(version) {
            let currentPath = window.location.pathname;
            let basePath = currentPath;

            // Strip any existing version prefix
            basePath = basePath.replace(/^\/(v0\.x|v1\.0-rc)/, '');

            // Add new version prefix if not v1.x
            let newPath;
            if (version === 'v1.x') {
                newPath = basePath || '/';
            } else {
                newPath = '/' + version + (basePath || '');
            }

            if (newPath !== currentPath) {
                window.location.href = newPath;
            }
        }
    }"
    x-menu
    class="relative hidden sm:block"
>
    <!-- Menu Button -->
    <button x-menu:button class="relative flex items-center whitespace-nowrap justify-center gap-2 py-2 rounded-lg shadow-xs bg-white hover:bg-gray-50 text-gray-800 border border-gray-200 hover:border-gray-200 px-4 text-sm dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200 dark:border-gray-700">
        <span x-text="currentVersion"></span>

        <!-- Heroicon: micro chevron-down -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
        </svg>
    </button>

    <!-- Menu Items -->
    <div
        x-menu:items
        x-transition.origin.top.left
        class="absolute left-0 min-w-48 rounded-lg shadow-xs mt-2 z-10 origin-top-left bg-white divide-y divide-gray-200 outline-hidden border border-gray-200 dark:bg-gray-800 dark:divide-gray-700 dark:border-gray-700"
        x-cloak
    >
        <div class="p-1.5" role="group">
            <button
                x-menu:item
                type="button"
                @click="switchVersion('v1.x')"
                :class="{
                    'bg-gray-50 dark:bg-gray-700': currentVersion === 'v1.x',
                    'opacity-50 cursor-not-allowed': $menuItem.isDisabled,
                }"
                class="px-2.5 py-1.5 w-full flex items-center rounded-md transition-colors focus:outline-hidden text-left text-gray-800 dark:text-gray-200"
            >
                v1.x
            </button>

            <button
                x-menu:item
                type="button"
                @click="switchVersion('v1.0-rc')"
                :class="{
                    'bg-gray-50 dark:bg-gray-700': currentVersion === 'v1.0-rc',
                    'opacity-50 cursor-not-allowed': $menuItem.isDisabled,
                }"
                class="px-2.5 py-1.5 w-full flex items-center rounded-md transition-colors focus:outline-hidden text-left text-gray-800 dark:text-gray-200"
            >
                v1.0-rc
            </button>

            <button
                x-menu:item
                type="button"
                @click="switchVersion('v0.x')"
                :class="{
                    'bg-gray-50 dark:bg-gray-700': currentVersion === 'v0.x',
                    'opacity-50 cursor-not-allowed': $menuItem.isDisabled,
                }"
                class="px-2.5 py-1.5 w-full flex items-center rounded-md transition-colors focus:outline-hidden text-left text-gray-800 dark:text-gray-200"
            >
                v0.x
            </button>
        </div>
    </div>
</div>

