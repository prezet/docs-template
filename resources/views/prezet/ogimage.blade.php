@php
    /* @var \Prezet\Prezet\Data\FrontmatterData $fm */
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta name="robots" content="noindex" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap"
            rel="stylesheet"
        />

        <!-- Scripts -->
        @vite(['resources/css/prezet.css'])
    </head>
    <body
        class="font-sans text-gray-900 antialiased"
        style="height: 630px; width: 1200px"
    >
        <div
            class="relative flex flex-col h-full w-full justify-between bg-stone-900 p-16"
        >
            <div></div>
            <h1 class="font-bold inline bg-linear-to-r from-orange-400 via-orange-500 to-red-600 bg-clip-text text-8xl tracking-tight text-transparent py-4 px-12">
                {{ $fm->title }}
            </h1>
{{--            <div class="h-36 w-36">--}}
{{--                <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44">--}}
{{--                    <path d="m9 35 7-26h5l-7 26H9ZM22 18v-5l13 6.5v5L22 31v-5l8-4-8-4Z" fill="#EA580C"/>--}}
{{--                </svg>--}}
{{--            </div>--}}

            <div class="flex justify-end">
                <div class="w-64">
                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130 29">
                        <path d="M38.517 23V5.545h6.886c1.324 0 2.452.253 3.384.759.932.5 1.642 1.196 2.13 2.088.495.886.742 1.91.742 3.068 0 1.16-.25 2.182-.75 3.068-.5.887-1.224 1.577-2.173 2.071-.943.495-2.085.742-3.426.742h-4.39v-2.958h3.793c.71 0 1.295-.122 1.756-.366.466-.25.812-.594 1.04-1.031.233-.443.349-.952.349-1.526 0-.58-.116-1.085-.35-1.517a2.333 2.333 0 0 0-1.04-1.014c-.465-.244-1.056-.367-1.772-.367h-2.489V23h-3.69Zm15.54 0V5.545h6.886c1.318 0 2.443.236 3.374.708.938.466 1.651 1.128 2.14 1.986.494.852.741 1.855.741 3.008 0 1.16-.25 2.156-.75 2.992-.5.83-1.224 1.465-2.173 1.909-.943.443-2.085.665-3.426.665h-4.611v-2.966h4.014c.705 0 1.29-.097 1.756-.29.466-.193.812-.483 1.04-.87.233-.386.349-.866.349-1.44 0-.58-.116-1.068-.35-1.466-.227-.397-.576-.699-1.048-.903-.466-.21-1.054-.316-1.764-.316h-2.489V23h-3.69Zm9.425-7.943L67.82 23h-4.074l-4.244-7.943h3.98ZM69.806 23V5.545h11.761v3.043h-8.07v4.16h7.465v3.042h-7.466v4.167h8.106V23H69.806Zm14.508 0v-2.19l8.71-12.222h-8.727V5.545H97.66v2.19l-8.72 12.222h8.737V23H84.314Zm16.195 0V5.545h11.762v3.043H104.2v4.16h7.465v3.042H104.2v4.167h8.105V23h-11.796ZM114.54 8.588V5.545h14.335v3.043h-5.344V23h-3.647V8.588h-5.344Z" fill="#D9D9D9"/>
                        <path d="M0 27 7 1h5L5 27H0ZM13 10V5l13 6.5v5L13 23v-5l8-4-8-4Z" fill="#EA580C"/>
                    </svg>
                </div>
            </div>
        </div>
    </body>
</html>
