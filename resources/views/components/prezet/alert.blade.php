@props([
    'type' => 'info',
    'title' => null,
    'body',
])

@php
    $styles = [
        'success' => [
            'wrapper' => 'border-green-200 bg-green-50/50 dark:border-green-500/20 dark:bg-green-500/5',
            'title' => 'text-green-800 dark:text-green-400',
            'body' => 'text-green-700 dark:text-green-300',
            'icon' => 'text-green-500 dark:text-green-400',
        ],
        'error' => [
            'wrapper' => 'border-red-200 bg-red-50/50 dark:border-red-500/20 dark:bg-red-500/5',
            'title' => 'text-red-800 dark:text-red-400',
            'body' => 'text-red-700 dark:text-red-300',
            'icon' => 'text-red-500 dark:text-red-400',
        ],
        'warning' => [
            'wrapper' => 'border-yellow-200 bg-yellow-50/50 dark:border-yellow-500/20 dark:bg-yellow-500/5',
            'title' => 'text-yellow-800 dark:text-yellow-400',
            'body' => 'text-yellow-700 dark:text-yellow-300',
            'icon' => 'text-yellow-500 dark:text-yellow-400',
        ],
        'info' => [
            'wrapper' => 'border-blue-200 bg-blue-50/50 dark:border-blue-500/20 dark:bg-blue-500/5',
            'title' => 'text-blue-800 dark:text-blue-400',
            'body' => 'text-blue-700 dark:text-blue-300',
            'icon' => 'text-blue-500 dark:text-blue-400',
        ],
    ];

    $style = $styles[$type] ?? $styles['info'];

    $icons = [
        'warning' => '<path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />',
        'success' => '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />',
        'error' => '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />',
        'info' => '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />',
    ];
@endphp

<div class="{{ $style['wrapper'] }} not-prose border p-4 rounded-lg">
    <div class="flex">
        <div class="shrink-0">
            <svg
                class="{{ $style['icon'] }} h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
            >
                {!! $icons[$type] !!}
            </svg>
        </div>
        <div class="ml-3">
            @isset($title)
                <h3 class="{{ $style['title'] }} mb-2 text-sm font-medium">
                    {{ $title }}
                </h3>
            @endisset

            <div class="{{ $style['body'] }} text-sm">
                <p>{{ $body }}</p>
            </div>
        </div>
    </div>
</div>
