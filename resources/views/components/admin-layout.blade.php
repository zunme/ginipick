<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Admin') }}</title>

      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
      <script src="https://kit.fontawesome.com/483598c605.js" crossorigin="anonymous"></script>
      <link type="text/css" href="/fonts/appleneo.css" rel="stylesheet">

      <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
      @livewireStyles
      @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/default.js'])

      <link type="text/css" href="/css/admin.css?ver=11111111111112" rel="stylesheet">
		@if (isset($styles))
			{{ $styles }}
		@endif
		
		
		<script>
			let windowpusher = null;
		</script>
    </head>
    <body class="font-applesd antialiased">
      
    <div class="min-h-screen bg-gray-100"
				@include('layouts.admin.mainalpine')
			 >
       
			<x-admin.nav-header>
				@if(isset($navheader))
				{{ $navheader }}
				@endif
			</x-admin.nav-header>
      
			<div class="flex overflow-hidden bg-white pt-16">
        @persist('navbararea')
          <livewire:admin.sidemenu />
        @endpersist
				<div class="fixed inset-0 z-10 bg-gray-900 opacity-50 hidden" id="sidebarBackdrop"></div>
				<div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-hidden relative"
					 :class="{'ml-64':(open_menu),'ml-16':(!open_menu)}"
					 >	
					<main class="bg-gray-200 relative overflow-y-auto" id="main-item">
						@if (isset($header))
							<header class="bg-white shadow">
								<div class=" mx-auto py-2 px-4 sm:px-6 lg:px-8">
									{{ $header }}
								</div>
							</header>
						@endif
						<div class="px-1 py-1">
							{{ $slot }}
						</div>
					</main>
				</div>
			</div>
    </div>
		

		<!-- pop -->
    @persist('poparea')
     <div id="persistarea"></div>
      @include('admin.userv2.info_pop')

      <div id="daumlayer" class="!border-1" style="display:none;position:fixed;overflow:hidden;z-index:10000;-webkit-overflow-scrolling:touch;">
        <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaum()" alt="닫기 버튼">
      </div>
      <!-- preloader -->
      <div id="preloadshow" class="hidden" style="background-color: rgb(55 65 81 / 0.5);position:fixed; top:0; bottom:0; left:0;right:0;z-index:999999">
        <div class="loader_wrap"><span class="loader"></span></div>
      </div>      
    @endpersist
    <!-- /pop -->

		
		@if (isset($afterbody))
			{{ $afterbody }}
		@endif
		<!--fc:scripts /-->

    <script src="/js/default.js?ver=11111111111112"></script>

		<script src="/form_components/form_components.js?id=ef6f45e2d9d18992ce4f"></script>
		<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker-full.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/locales/ko.js"></script>
		<!-- xls
		<script lang="javascript" src="https://cdn.sheetjs.com/xlsx-0.20.1/package/dist/xlsx.full.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    -->
    <!-- quill
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
		<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    -->
		<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
		
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
        <!--script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script -->
		<script>
			document.addEventListener('livewire:init', () => {       
				Livewire.on('notification', (event) => {          
					// livewire component  : $this->dispatch('notification', title: "New category create");
					toast(event)
				});    
			});
      function globalevent(obj){
        if( typeof obj.e_name =='undefined') return 
        let name = obj.e_name
        delete obj['e_anme']
        window.dispatchEvent(new CustomEvent( name, {detail:obj}));
      }
		</script>
    @if (isset($scripts))
      {{ $scripts }}
    @endif


		@livewire('notifications')
		    <!--
			new FilamentNotification()
			.title('Saved successfully')
			.danger()
			.duration(50000)
			.send()
			-->
		<script src="http://tall.taqcloud.xyz/js/filament/notifications/notifications.js?v=3.2.112.0"></script>
        @livewireScriptConfig 
    </body>
</html>
