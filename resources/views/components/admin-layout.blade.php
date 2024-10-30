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
		<style>
		:root {
        --danger-50: 254, 242, 242;
        --danger-100: 254, 226, 226;
        --danger-200: 254, 202, 202;
        --danger-300: 252, 165, 165;
        --danger-400: 248, 113, 113;
        --danger-500: 239, 68, 68;
        --danger-600: 220, 38, 38;
        --danger-700: 185, 28, 28;
        --danger-800: 153, 27, 27;
        --danger-900: 127, 29, 29;
        --danger-950: 69, 10, 10;
        --gray-50: 250, 250, 250;
        --gray-100: 244, 244, 245;
        --gray-200: 228, 228, 231;
        --gray-300: 212, 212, 216;
        --gray-400: 161, 161, 170;
        --gray-500: 113, 113, 122;
        --gray-600: 82, 82, 91;
        --gray-700: 63, 63, 70;
        --gray-800: 39, 39, 42;
        --gray-900: 24, 24, 27;
        --gray-950: 9, 9, 11;
        --info-50: 239, 246, 255;
        --info-100: 219, 234, 254;
        --info-200: 191, 219, 254;
        --info-300: 147, 197, 253;
        --info-400: 96, 165, 250;
        --info-500: 59, 130, 246;
        --info-600: 37, 99, 235;
        --info-700: 29, 78, 216;
        --info-800: 30, 64, 175;
        --info-900: 30, 58, 138;
        --info-950: 23, 37, 84;
        --primary-50: 255, 251, 235;
        --primary-100: 254, 243, 199;
        --primary-200: 253, 230, 138;
        --primary-300: 252, 211, 77;
        --primary-400: 251, 191, 36;
        --primary-500: 245, 158, 11;
        --primary-600: 217, 119, 6;
        --primary-700: 180, 83, 9;
        --primary-800: 146, 64, 14;
        --primary-900: 120, 53, 15;
        --primary-950: 69, 26, 3;
        --success-50: 240, 253, 244;
        --success-100: 220, 252, 231;
        --success-200: 187, 247, 208;
        --success-300: 134, 239, 172;
        --success-400: 74, 222, 128;
        --success-500: 34, 197, 94;
        --success-600: 22, 163, 74;
        --success-700: 21, 128, 61;
        --success-800: 22, 101, 52;
        --success-900: 20, 83, 45;
        --success-950: 5, 46, 22;
        --warning-50: 255, 251, 235;
        --warning-100: 254, 243, 199;
        --warning-200: 253, 230, 138;
        --warning-300: 252, 211, 77;
        --warning-400: 251, 191, 36;
        --warning-500: 245, 158, 11;
        --warning-600: 217, 119, 6;
        --warning-700: 180, 83, 9;
        --warning-800: 146, 64, 14;
        --warning-900: 120, 53, 15;
        --warning-950: 69, 26, 3;
        --font-family: "Inter";
        --sidebar-width: 16rem;
        --collapsed-sidebar-width: 4.5rem;
        --default-theme-mode: system;
      }
		</style>
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
      @include('admin.userv2.create_pop')
      @include('admin.userv2.info_pop')
    @endpersist
    <!-- /pop -->

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
		<script>
		window.toast = function(payload){
            Toastify({
              text: payload.title,
              duration: payload.timeout ?? 3000,
              //destination: "https://github.com/apvarun/toastify-js",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "center", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              
              style: {
                background: "#666",
                color : "#fff"
              },
              
              onClick: function(){} // Callback after click
            }).showToast();
        }
			document.addEventListener('livewire:init', () => {       
				Livewire.on('notification', (event) => {          
					// livewire component  : $this->dispatch('notification', title: "New category create");
					toast(event)
				});    
			});
		</script>
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
