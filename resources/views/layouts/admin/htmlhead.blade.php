        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Admin') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
		<script src="https://kit.fontawesome.com/483598c605.js" crossorigin="anonymous"></script>
		

		<script src="/js/default.js?ver={{ env('JS_VERSION', \Carbon\Carbon::now()->format('YmdHis') )}}"></script>
		<link type="text/css" href="/fonts/appleneo.css" rel="stylesheet">
        <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/default.js'])

		<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
		<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <link type="text/css" href="/css/admin.css?ver=11111111111112" rel="stylesheet">
        