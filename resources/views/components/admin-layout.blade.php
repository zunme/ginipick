<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
 		@include('layouts.admin.htmlhead')
		@if (isset($styles))
			{{ $styles }}
		@endif
		<style>
			.ql-editor img {
				max-width:100%;
			}
			.ql-editor a.linkicon::before {
				content:"\f0c1";
				display: inline-block;
				font-family: "Font Awesome 6 Free";;
				font-weight: 900;
				margin-right: 4px;
				--tw-text-opacity: 1;
    			color: rgb(118 169 250 / var(--tw-text-opacity));
			}
		</style>
		<style type="text/tailwindcss">
			@layer components {
				.image-bg{
					@apply block bg-cover bg-no-repeat bg-center bg-gray-50;
				}
				.image-bg-contain {
                    @apply block bg-contain bg-no-repeat bg-center bg-gray-50 relative;
                }
                .image-bg-cover {
                    @apply block bg-cover bg-no-repeat bg-center bg-gray-50 relative;
                }
			}
		</style>
		<script>
			let windowpusher = null;
			let opendQnaChatRoom = -1;
		</script>
		<style>
			.pagewrap > span{
				height: 30px;
				min-width: 38px;
				width: auto;
				display: flex;
				justify-content: center;
				align-items: center;
				/*border: 1px solid #aaa;*/
				--bg-opacity: 1 !important;
				background-color: rgb(229 231 235 / var(--bg-opacity)) !important;
				cursor:pointer;
			}
			.pagewrap > span.current_page{
				--bg-opacity: 1 !important;
				background-color: rgb(96 165 250 / var(--bg-opacity)) !important;
				--text-opacity: 1 !important;
				color: rgb(255 255 255 / var(--text-opacity)) !important;
				cursor: not-allowed;
			}
			.pagewrap > span.disabled{
				color: rgb(55 65 81 / 0.9) !important;
				background-color: rgb(55 65 81 / 0.6) !important;
				cursor: not-allowed;
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
		<div id="preloadshow" class="hiddenforce" style="background-color: rgb(55 65 81 / 0.5);position:fixed; top:0; bottom:0; left:0;right:0;z-index:999999">
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
		
		<script>
			const daum_element_layer = document.getElementById('daumlayer');
			function closeDaum() {
				daum_element_layer.style.display = 'none';
			}
			function openDaum(target) {
				new daum.Postcode({
					oncomplete: function(data) {
						var addr = ''; // 주소 변수
						var extraAddr = ''; // 참고항목 변수
						var zonecode = '';
						var road = {
							addr:'',
							extraAddr:'',
						}
						var oldAddr = {
							addr:'',
							extraAddr:'',
						}
						console.log( data )
						road.addr = data.roadAddress;
						oldAddr.addr = data.jibunAddress;

						if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
							road.extraAddr += data.bname;
						}
						// 건물명이 있고, 공동주택일 경우 추가한다.
						if(data.buildingName !== '' && data.apartment === 'Y'){
							road.extraAddr += (road.extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
						}
						// 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
						if(road.extraAddr !== ''){
							road.extraAddr = ' (' + road.extraAddr + ')';
						}
						zonecode = data.zonecode

						if (data.userSelectedType === 'R') { 
							addr = road.addr
							extraAddr = road.extraAddr
						}else addr = oldAddr.addr

						daum_element_layer.style.display = 'none'
						
						var ret = {
							'target' : target,
							'zipcode' : zonecode,
							'addr' : addr,
							'extraAddr' : extraAddr,
							'address_type' : data.userSelectedType, 
							'addrs' : {
								'road' : road,
								'jibun' : oldAddr,
							},
							'data' : data
						}
						/* TODO */
						//hiddenaxios.get('')
						
						if( typeof getDaumAddr == 'function'){
							getDaumAddr( ret )
						}
						if( typeof eventToAlpine == 'function'){
							eventToAlpine({'type':'daumpost','data':ret})
						}
					},
					width : '100%',
					height : '100%',
					maxSuggestItems : 5
				}).embed(daum_element_layer);

				// iframe을 넣은 element를 보이게 한다.
				daum_element_layer.style.display = 'block';

				// iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
				initDaumLayerPosition();
			}
			function initDaumLayerPosition(){
				var width = 300; //우편번호서비스가 들어갈 element의 width
				var height = 400; //우편번호서비스가 들어갈 element의 height
				var borderWidth = 1; //샘플에서 사용하는 border의 두께

				// 위에서 선언한 값들을 실제 element에 넣는다.
				daum_element_layer.style.width = width + 'px';
				daum_element_layer.style.height = height + 'px';
				daum_element_layer.style.border = borderWidth + 'px solid';
				// 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
				daum_element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
				daum_element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
			}
			function syntaxHighlight(obj) {
				if( !obj ) return '';
				json = JSON.stringify(obj, undefined, 4);
				json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
				return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
					var cls = 'number';
					if (/^"/.test(match)) {
						if (/:$/.test(match)) {
							cls = 'key';
						} else {
							cls = 'string';
						}
					} else if (/true|false/.test(match)) {
						cls = 'boolean';
					} else if (/null/.test(match)) {
						cls = 'null';
					}
					return '<span class="' + cls + '">' + match + '</span>';
				});
			}
		</script>
		<script>
			function toDateString( date ){
				if( !date) return ''
				return moment(date).format('YYYY-MM-DD')
			}
			function toDateTimeString( date ){
				if( !date) return ''
				return moment(date).format('YYYY-MM-DD HH:mm:ss')
			}
			function eventToAlpine(data){
				window.dispatchEvent(new CustomEvent("toAlpine", {detail: data }));
			}
		</script>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

		@if (isset($scripts))
			{{ $scripts }}
		@endif
        
        @livewireScriptConfig 
    </body>
</html>
