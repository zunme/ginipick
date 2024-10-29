<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
 		@include('layouts.admin.htmlhead')
		@if (isset($styles))
			{{ $styles }}
		@endif
		
		
		<script>
			let windowpusher = null;
			let opendQnaChatRoom = -1;
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
				@include('layouts.admin.sidebar')
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
		
		
		<!-- preloader -->
		<div id="preloadshow" class="hidden" style="background-color: rgb(55 65 81 / 0.5);position:fixed; top:0; bottom:0; left:0;right:0;z-index:999999">
			<div class="loader_wrap"><span class="loader"></span></div>
		</div>
		
		@if (isset($afterbody))
			{{ $afterbody }}
		@endif
		<!--fc:scripts /-->
		<script src="/form_components/form_components.js?id=ef6f45e2d9d18992ce4f"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
		<!--script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></!--script-->

		<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker-full.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/locales/ko.js"></script>
		
		<!--script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script-->
		<div id="daumlayer" class="!border-1" style="display:none;position:fixed;overflow:hidden;z-index:10000;-webkit-overflow-scrolling:touch;">
			<img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaum()" alt="닫기 버튼">
		</div>
		<script lang="javascript" src="https://cdn.sheetjs.com/xlsx-0.20.1/package/dist/xlsx.full.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
		
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

		@if (isset($scripts))
			{{ $scripts }}
		@endif
        <!--script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script -->
        @livewireScriptConfig 
    </body>
</html>
