<!DOCTYPE html>
<html lang="ko">
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
        <!--
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/default.js'])
        -->
        <script type="module" src="http://dev.ginipick.com:8898/@@vite/client" data-navigate-track="reload"></script>
        <link rel="stylesheet" href="http://dev.ginipick.com:8898/resources/css/app.css" data-navigate-track="reload" />
        <script type="module" src="http://dev.ginipick.com:8898/resources/js/app.js" data-navigate-track="reload"></script>
        <script type="module" src="http://dev.ginipick.com:8898/resources/js/default.js" data-navigate-track="reload"></script>
        
    </head>

    <body class="!pt-0">
        <x-navbar></x-navbar>
        {{$slot}}

        <footer>
            <div class="sns">
                <a href="https://blog.naver.com/ginipick_ai" target="_blank"><img src="/img/ico_blog.png" alt="naver blog"></a>
                <a href="javascript:;" target="_blank"><img src="/img/ico_facebook.png" alt="facebook"></a>
                <a href="https://www.instagram.com/ginipick_official/" target="_blank"><img src="/img/ico_instagram.png" alt="instagram"></a>
                <a href="https://www.youtube.com/channel/UCuvpzT1iV9lkalQL4F0rJ9w" target="_blank"><img src="/img/ico_youtube.png" alt="youtube"></a>
            </div>
            <div class="link">
                <a href="javascript:window.dispatchEvent(new CustomEvent('term1-pop'));;">지니픽 이용약관</a>
                <a href="javascript:window.dispatchEvent(new CustomEvent('term2-pop'));" class="active" download>개인정보처리방침</a>
                <a href="javascript:;">법적고지 및 주의사항</a>
                <a href="javascript:;">전자금융거래약관</a>
            </div>
            <address>
                <span>06193 / 서울특별시 강남구 선릉로90길 44 9층</span>
                <br class="view_only_mobile">
                <span>대표전화 1668-1700</span>
                <span>팩스 070-8277-8279</span>
                <span>대표자 조현규 최선영</span>
                <span>사업자번호 489-88-02010</span>
                <span>통신판매업신고번호 2024-서울강남-03698호</span>
            </address>
            <div class="copy">
                <img src="/img/footer_logo.png" alt="ginipick">
                <span>Copyright © GINIPICK All Rights Reserved.</span>
            </div>
        </footer>


        <div id="preloadshow" class="hidden" style="background-color: rgb(55 65 81 / 0.5);position:fixed; top:0; bottom:0; left:0;right:0;z-index:999999">
			<div class="loader_wrap"><span class="loader"></span></div>
		</div>
        @include("front.pop.terms")
        @include("front.pop.personal")

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

		@if (isset($scrpits))
			{{ $scrpits }}
		@endif
        
        @livewireScriptConfig 
    </body>
</html>
