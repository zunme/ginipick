<div class="bg-white border-gray-200 dark:bg-gray-900 sticky z-40 top-0" 
    x-data="{
        toggle(){
            if($refs.tobblebtn) $refs.tobblebtn.click()
        }
    }"
    >
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2 md:p-4">
        <button data-collapse-toggle="navbar-default" type="button" x-ref="tobblebtn"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm  rounded-lg 
                md:hidden hover:bg-gray-100 focus:outline-none focus:ring-0 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="bg-gray-200/50 fixed top-0 bottom-0 left-0 right-0 z-20 hidden"></div>
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/img/logo.png" alt="ginipick" class="hidden lg:inline-block md:w-[150px] lg:w-[175px]">
            <img src="/img/logo_mobile.png" alt="ginipick" class="nline-block lg:hidden h-[30px] md:h-[40px]">
        </a>
        <span class="w-10 lg:hidden"></span>
        <div 
            class="hidden w-full absolute top-0 left-0 z-40 
                md:relative md:block md:w-auto 
                max-h-[calc(90vh-80px)]" 
            id="navbar-default" x-refs="modalmenu" @mousedown.outside ="toggle()">
            <ul class="text-[20px] md:text-[18px] lg:text-[20px] font-bold bg-[#efc4c4] lg:bg-inherit 
                    flex flex-col p-4 md:p-0 border border-gray-100 rounded-lg md:flex-row md:gap-x-5 lg:gap-x-8
                    rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white
                    max-h-[calc(80vh)] md:max-h-max overflow-y-auto md:overflow-y-visible
                    relative
                    ">
                <li class="md:hidden flex justify-end text-lg">
                    <span 
                        class="absolute top-1 right-1 z-40 w-8 h-8 flex justify-center items-center text-lg font-bold cursor-pointer hover:bg-gray-50/20 rounded-lg" 
                        @click="toggle()">
                        X
                    </span>
                </li>
                <li class="mt-5 md:mt-0">
                    <x-navbar-link href="/">회사소개</x-navbar-link>
                </li>
                <li>
                    <div
                    x-data="{
                        show:false,
                        is_mobile : false,
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
                        init(){
                            this.is_mobile = (window.innerWidth < ( 768 ) ? true : false)
                        }
                    }" 
                    @mouseenter="console.log('enter'); show = true;"
                    @mouseleave="show = false;"
                    @resize.window="is_mobile = (window.innerWidth < ( 768 ) ? true : false); show=false; console.log( window.innerWidth)"
                    class="relative pl-6 md:px-0
                        block py-3 px-3  md:p-0 border-b md:border-0 border-black
                        "
                    >
                    @php
                        $navgroup = ['/pages/avatar','/pages/contents','/pages/fashion','/pages/edu','/pages/consulting'];
                    @endphp
                    <x-navbar-link-group :groups="$navgroup">사업분야</x-navbar-link-group>
                    <div class="
                        block text-left
                        md:absolute md:z-10 md:top-7 md:left-1/2 md:transform md:-translate-x-1/2
                        md:bg-[#efc4c4]
                        md:rounded
                        p-1
                        
                        "
                        x-show="show || is_mobile"
                        x-cloak
                        >
                        <div class="min-w-[210px]">
                            <div class="hidden md:block w-3 h-3 rotate-45 bg-[#efc4c4] absolute -top-1 left-1/2 transform -translate-x-1/2"></div>
                            <div class="max-h-[20vh] md:max-h-[60vh] text-[20px] tq_scrollbar overflow-y-auto min-w-max
                                px-2 md:py-[20px] md:px-[30px] 
                                text-[20px]] 
                                flex flex-col gap-y-5
                                md:grid md:grid-cols-2 md:gap-x-4
                                lg:grid lg:grid-cols-3 lg:gap-x-4 lg:gap-y-8
                                md:shadow-lg
                                ">
                                <div class="flex flex-col gap-y-2">
                                    <div class="font-extrabold">AI 아바타</div>
                                    <div class="flex flex-col gap-y-2 pl-2 font-normal">
                                        <div class="">
                                            <x-navbar-link-group-item href="/pages/avatar#point1">AI 아바타</x-navbar-link-group-item>
                                            
                                        </div>
                                        <div>
                                            <a href="/pages/avatar#point2" class="hover:bg-gray-100 block px-2 rounded">아바타 친구</a>
                                        </div>
                                        <div>
                                            <a href="/pages/avatar#point3" class="hover:bg-gray-100 block px-2 rounded">아바타 추모관</a>
                                        </div>
                                    </div>                            
                                </div>
                                <div class="flex flex-col gap-y-2">
                                    <div class="font-extrabold">
                                        AI 콘텐츠
                                    </div>
                                    <div class="flex flex-col gap-y-2 pl-2 font-normal">
                                        <div>
                                            <a href="/pages/contents#point1" class="hover:bg-gray-100 block px-2 rounded">AI 영상</a>
                                        </div>
                                        <div>
                                            <a href="/pages/contents#point2" class="hover:bg-gray-100 block px-2 rounded">AI 작가</a>
                                        </div>
                                        <div>
                                            <a href="/pages/contents#point3" class="hover:bg-gray-100 block px-2 rounded">브랜드마케팅</a>
                                        </div>
                                        <div>
                                            <a href="/pages/contents#point4" class="hover:bg-gray-100 block px-2 rounded">메이크온오프</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-y-2">
                                    <div class="font-extrabold">
                                        AI 패션
                                    </div>
                                    <div class="flex flex-col gap-y-2 pl-2 font-normal">
                                        <div>
                                            <a href="/pages/fashion#point1" class="hover:bg-gray-100 block px-2 rounded">패션코디</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-y-2">
                                    <div class="font-extrabold">
                                        AI 교육
                                    </div>
                                    <div class="flex flex-col gap-y-2 pl-2 font-normal">
                                        <div>
                                            <a href="/pages/edu#point1" class="hover:bg-gray-100 block px-2 rounded">에듀 큐레이터</a>
                                        </div>
                                        <div>
                                            <a href="/pages/edu#point2" class="hover:bg-gray-100 block px-2 rounded">투자 큐레이터</a>
                                        </div>
                                        <div>
                                            <a href="/pages/edu#point3" class="hover:bg-gray-100 block px-2 rounded">라이프 큐레이터</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-y-2">
                                    <div class="font-extrabold">
                                        AI 상담
                                    </div>
                                    <div class="flex flex-col gap-y-2 pl-2 font-normal">
                                        <div>
                                            <a href="/pages/consulting#point1" class="hover:bg-gray-100 block px-2 rounded">CS지원서비스</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </li>
                <li>
                    <x-navbar-link href="/pages/apply">적용사례</x-navbar-link>
                </li>
                <li>
                    <x-navbar-link href="/pages/contact">CONTACT US</x-navbar-link>
                </li>
                <li>
                    <x-navbar-link href="/pages/qna">Q&A</x-navbar-link>
                </li>
                @auth
                <li>
                    <x-navbar-link @click="logout()" class="cursor-pointer">로그아웃</x-navbar-link>
                </li>
                @endauth
                @guest
                <li>
                    <x-navbar-link href="/login">로그인</x-navbar-link>
                </li>
                <li>
                    <x-navbar-link href="/register">회원가입</x-navbar-link>
                </li>
                @endguest
            </ul>
        </div>

    </div>
</div>