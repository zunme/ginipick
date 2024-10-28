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
        @livewireStyles
        
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/default.js'])
        <!--
        <script type="module" src="http://dev.ginipick.com:8898/@@vite/client" data-navigate-track="reload"></script>
        <link rel="stylesheet" href="http://dev.ginipick.com:8898/resources/css/app.css" data-navigate-track="reload" />
        <script type="module" src="http://dev.ginipick.com:8898/resources/js/app.js" data-navigate-track="reload"></script>
        <script type="module" src="http://dev.ginipick.com:8898/resources/js/default.js" data-navigate-track="reload"></script>
		-->
		<script>
			function _multipleString(n , str){
				return Array(n).fill( str ).join('')
			}
			function _recursiveOption( cate , i , is_use ) {
				var temp = [];
				++i;
				is_use =  !is_use ? false : ( cate.is_use =='N' ? false : true ) 
				if(cate.depth > 0) temp.push( {depth:cate.depth, cursor: i , id: cate.id, name:cate.name ,name_space: _multipleString(cate.depth*3 ,'\xa0')+cate.name , is_use : is_use } )
				if( cate.children ){
					for( children of cate.children ){
						var ret = _recursiveOption(children , i , is_use )
						temp = temp.concat( [...ret])
					}
				}
				return temp
			}
		</script>

		<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
		<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
