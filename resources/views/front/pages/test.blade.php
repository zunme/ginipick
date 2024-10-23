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
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/default.js'])
        
        <script type="module" src="http://dev.ginipick.com:8898/@@vite/client" data-navigate-track="reload"></script>
        <link rel="stylesheet" href="http://dev.ginipick.com:8898/resources/css/app.css" data-navigate-track="reload" />
        <script type="module" src="http://dev.ginipick.com:8898/resources/js/app.js" data-navigate-track="reload"></script>
        <script type="module" src="http://dev.ginipick.com:8898/resources/js/default.js" data-navigate-track="reload"></script>
        
    </head>

    <body class="!p-0">
        <x-navbar></x-navbar>
        <div>123123123</div>
<!-- content -->
<section class="section1">
    <div class="pcLinkMap">
        <a target="_blank" class="link1" href="https://youtu.be/y6jhWjJJGU4"></a>
        <a target="_blank" class="link2" href="https://youtu.be/-URxrjBt3j4?si=Fy7mg7qNYYNdyDOs"></a>
        <a target="_blank" class="link3" href="https://youtu.be/EzObLx0KKm0?si=zeCGoCpc4va4qv4j"></a>
    </div>
    <map name="link-visual-mo">
        <area shape="rect" coords="587,97,893,291" target="_blank" href="https://youtu.be/y6jhWjJJGU4">
        <area shape="rect" coords="115,165,433,371" target="_blank" href="https://youtu.be/-URxrjBt3j4?si=Fy7mg7qNYYNdyDOs">
        <area shape="rect" coords="809,375,1079,545" target="_blank" href="https://youtu.be/EzObLx0KKm0?si=zeCGoCpc4va4qv4j">
    </map>
    <!-- <h2>회사소개</h2> -->
    <div class="textbox main">
        <div class="inner">
            <p class="eng">
                Your present moment<br>
                Capture it with your avatar!
            </p>
            <p class="kor">
                당신의 지금 이 순간<br>
                아바타로 캡처하세요!
            </p>
            <a href="https://www.youtube.com/channel/UCuvpzT1iV9lkalQL4F0rJ9w" class="btn-common" target="_blank">
                <span>체험하기</span>
                <img src="/img/arrow_right_black.png" alt="">
            </a>
        </div>
    </div>
    <img src="/img/visual_bg.png" alt="" class="visual_img pc">
    <img src="/img/visual_bg_mobile.png" alt="" class="visual_img mo" usemap="#link-visual-mo">
</section>
<!-- / content -->
        <footer>
            <div class="sns">
                <a href="https://blog.naver.com/ginipick_ai" target="_blank"><img src="/img/ico_blog.png" alt="naver blog"></a>
                <a href="javascript:;" target="_blank"><img src="/img/ico_facebook.png" alt="facebook"></a>
                <a href="https://www.instagram.com/ginipick_official/" target="_blank"><img src="/img/ico_instagram.png" alt="instagram"></a>
                <a href="https://www.youtube.com/channel/UCuvpzT1iV9lkalQL4F0rJ9w" target="_blank"><img src="/img/ico_youtube.png" alt="youtube"></a>
            </div>
            <div class="link">
                <a href="javascript:;">지니픽 이용약관</a>
                <a href="/doc/privacy_ginipick.docx" class="active" download>개인정보처리방침</a>
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
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

		@if (isset($scrpits))
			{{ $scrpits }}
		@endif
        
        @livewireScriptConfig 
    </body>
</html>
