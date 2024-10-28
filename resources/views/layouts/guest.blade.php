<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="user-scalable=yes, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <title>지니픽 미디어</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/483598c605.js" crossorigin="anonymous"></script>

        <link type="text/css" href="/fonts/appleneo.css" rel="stylesheet">
        <link type="text/css" href="/style/common.css" rel="stylesheet">
        <link type="text/css" href="/style/style.css" rel="stylesheet">

		@if (isset($styles))
			{{ $styles }}
		@endif

        <!-- swiper -->
        @livewireStyles
        
        @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/default.js'])
        
        <!--
        <script type="module" src="http://dev.ginipick.com:8898/@@vite/client" data-navigate-track="reload"></script>
        <link rel="stylesheet" href="http://dev.ginipick.com:8898/resources/css/app.css" data-navigate-track="reload" />
        <script type="module" src="http://dev.ginipick.com:8898/resources/js/app.js" data-navigate-track="reload"></script>
        <script type="module" src="http://dev.ginipick.com:8898/resources/js/default.js" data-navigate-track="reload"></script>
        -->
    </head>
    @isset($body)
        {{$body}}
    @else
    <body class="text-gray-900 antialiased bg-white pt-0">
        <div class="flex justify-between items-center pt-3 md:pt-10">
            <div>
                <a href="javascript:history.back()" class="inline-block md:hidden">
                    <i class="fa-solid fa-arrow-left text-2xl"></i>
                </a>
            </div>
            <a href="/">
                <img src="/img/logo.png" class="hidden md:inline-block max-h-[72px] fill-current text-gray-500" />
                <img src="/img/sign/mobile_logo.png" alt="ginipick" class="inline-block md:hidden h-[32px]">
            </a>
            <span class=""></span>
        </div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center  bg-white">

            <div class="w-full md:max-w-[460px] mt-6 px-6 py-4 bg-white  overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        <div id="preloadshow" class="hidden" style="background-color: rgb(55 65 81 / 0.5);position:fixed; top:0; bottom:0; left:0;right:0;z-index:999999">
			<div class="loader_wrap"><span class="loader"></span></div>
		</div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    </body>
    @endif
</html>
