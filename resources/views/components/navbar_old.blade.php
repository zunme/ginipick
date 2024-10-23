<header 
class="maxWidthWrap"
x-data="{
    navshow : false,
    depth2show : false,
    scrollbarwidth : 17,
    getScrollbarWidth() {
        const outer = document.createElement('div');
        outer.style.visibility = 'hidden';
        outer.style.overflow = 'scroll'; // forcing scrollbar to appear
        outer.style.msOverflowStyle = 'scrollbar'; // needed for WinJS apps
        document.body.appendChild(outer);
        const inner = document.createElement('div');
        outer.appendChild(inner);
        const scrollbarWidth = (outer.offsetWidth - inner.offsetWidth);
        outer.parentNode.removeChild(outer);
        return scrollbarWidth;
        
    },
    toggledepth(){
        this.depth2show = !this.depth2show
    },
    init(){
        this.scrollbarwidth = this.getScrollbarWidth();
    }
}"
x-resize="depth2show = ($width <= 990 - scrollbarwidth ? true : false); console.log($width)"
>
<button type="button" class="btn-menu" @click="navshow = !navshow">
    <img src="/img/ico_menu_mobile.png" alt="">
</button>
<h1>
    <a href="/" class="logo" title="ginipick">
        <img src="/img/logo.png" alt="ginipick" class="logo_img pc">
        <img src="/img/logo_mobile.png" alt="ginipick" class="logo_img mo">
    </a>
</h1>
<nav :class="navshow ? 'active':''">
    <span 
        class="absolute top-0 right-0 z-10 w-12 h-12 flex justify-center items-center text-lg font-bold cursor-pointer hover:bg-gray-50/20 rounded-lg" 
        x-show="navshow" @click="navshow = !navshow">
        X
    </span>
    <div class="nav_top_mobile">
        <a href="javascript:;" class="btn-close-nav">
            <img src="/img/ico_menu_close.png" alt="close">
        </a>
        <a href="/" class="btn-home">
            <img src="/img/logo_mobile_active.png" alt="ginipick">
        </a>
    </div>
    <a href="/">
        회사소개
    </a>
    <a href="javascript:;" class="isDepth2" @click="toggledepth()">
        사업분야
    </a>
    <div class="depth2 block" x-show="depth2show">
        <div class="depth2__inner">
            <div class="scrollbox">
                <strong>AI 아바타</strong>
                <a href="/pages/avatar#point1">AI 아바타</a>
                <a href="/pages/avatar#point2">아바타 친구</a>
                <a href="/pages/avatar#point3">아바타 추모관</a>

                <strong>AI 콘텐츠</strong>
                <a href="/pages/contents#point1">AI 영상</a>
                <a href="/pages/contents#point2">AI 작가</a>
                <a href="/pages/contents#point3">브랜드마케팅</a>
                <a href="/pages/contents#point4">메이크온오프</a>

                <strong>AI 패션</strong>
                <a href="/pages/fashion#point1">패션코디</a>

                <strong>AI 교육</strong>
                <a href="/pages/edu#point1">에듀 큐레이터</a>
                <a href="/pages/edu#point2">투자 큐레이터</a>
                <a href="/pages/edu#point3">라이프 큐레이터</a>

                <strong>AI 상담</strong>
                <a href="/pages/consulting#point1">CS지원서비스</a>
            </div>
        </div>
    </div>
    <!--
    <div
        x-data="{
            show:false,
        }" 
        @mouseenter="console.log('enter'); show = true;"
        @mouseleave="show = false;"
        class="text-2xl relative pl-6 lg:px-0 border-b lg:border-0 border-black"
        >
        <div class="text-left">test</div>
        <div class="
            block text-left
            lg:absolute lg:top-8 lg:left-1/2 lg:transform lg:-translate-x-1/2
            lg:bg-[#efc4c4]
            lg:rounded
            "
            x-show="show"
            >
            <div class="hidden lg:block z-10 w-3 h-3 rotate-45 bg-[#efc4c4] absolute -top-1 left-1/2 transform -translate-x-1/2"></div>
            <div class="scrollbox text-[20px] lg:py-2 pl-4 lg:pl-0  overflow-y-auto h-16 lg:h-auto">
                <div href="#" class="block font-extrabold text-2xl pl-6 pr-8">12314124</div>
                <a href="#" class="block hover:bg-pink-400 hover:text-white pl-8">12314124</a>
                <a href="#" class="block hover:bg-pink-400 hover:text-white pl-8">12314124</a>
                <a href="#" class="block hover:bg-pink-400 hover:text-white pl-8">12314124</a>
                <a href="#" class="block hover:bg-pink-400 hover:text-white pl-8">12314124</a>
                <a href="#" class="block hover:bg-pink-400 hover:text-white pl-8">12314124</a>
                <a href="#" class="block hover:bg-pink-400 hover:text-white pl-8">12314124</a>
                <a href="#" class="block hover:bg-pink-400 hover:text-white pl-8">12314124</a>
                <a href="#" class="block hover:bg-pink-400 hover:text-white pl-8">12314124</a>
                <a href="#" class="blblock hover:bg-pink-400 hover:text-white pl-8">12314124</a>
            </div>
        </div>
    </div>
    -->
    <a href="/pages/apply">적용사례</a>
    <a href="/pages/contact">CONTACT US</a>
    <a href="/pages/qna">Q&A</a>
</nav>
</header>