
<x-ginipick>
    <x-slot:scripts>
        <script src="/script/jquery.1.12.0.min.js"></script>
        <script src="/script/jquery.rwdImageMaps.min.js"></script>
        <script src="/script/script_re.js?ver=00000000000000"></script>
    </x-slot:scripts>

    <section class="section1">
        <div class="pcLinkMap">
            <a target="_blank" class="link1" href="https://youtu.be/y6jhWjJJGU4"></a>
            <a target="_blank" class="link2" href="https://youtu.be/-URxrjBt3j4?si=Fy7mg7qNYYNdyDOs"></a>
            <a target="_blank" class="link3" href="https://youtu.be/EzObLx0KKm0?si=zeCGoCpc4va4qv4j"></a>
        </div>
        <map name="link-visual-mo">
            <area shape="rect" coords="587,97,893,291" target="_blank" href="https://youtu.be/y6jhWjJJGU4" />
            <area shape="rect" coords="115,165,433,371" target="_blank" href="https://youtu.be/-URxrjBt3j4?si=Fy7mg7qNYYNdyDOs" />
            <area shape="rect" coords="809,375,1079,545" target="_blank" href="https://youtu.be/EzObLx0KKm0?si=zeCGoCpc4va4qv4j" />
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
                <a 
                    @auth
                    href="https://hugpu.ai"
                    @endauth
                    @guest
                    onClick="alert('로그인 후 사용해주세요');"
                    @endauth
                    class="btn-common cursor-pointer" 
                    target="_blank">
                    <span>체험하기</span>
                    <img src="/img/arrow_right_black.png" alt="">
                </a>
            </div>
        </div>
        <img src="/img/visual_bg.png" alt="" class="visual_img pc">
        <img src="/img/visual_bg_mobile.png" alt="" class="visual_img mo" usemap="#link-visual-mo">
    </section>

    <section class="section2">
        <h2 class_="!text-[0px] lg:!text-[48px]">지니픽을 통해 AI를 만나보세요!</h2>

        <h3>
            AI 기술, 멀게만 느끼셨나요?<br>
            인간을 대체 할 수 있다는 AI 기술이 두렵기만 하신가요?
        </h3>

        <a @auth
            href="https://hugpu.ai"
            @endauth
            @guest
            onClick="alert('로그인 후 사용해주세요');"
            @endauth
            class="btn-common cursor-pointer"  target="_blank"
            >
            <span>체험하기</span>
            <img src="/img/arrow_right.png" alt="">
        </a>

        <p class="subtext">
            AI 기술을 당신의 아바타로 활용해 보세요!<br>
            지니픽의 혁신적인 서비스는 당신의 능력을 극대화시켜 드립니다!
        </p>
    </section>

    <section class="section3 maxWidthWrap">
        <h2>트렌드를 앞서 나가는 지니픽</h2>
        <div class="subtext">
            AI 기술과 스튜디오를 결합한 온오프라인 융합 모델을 지원하여<br>
            지리적, 공간적 장점과 혁신, 생산 효율성의<br class="view_only_mobile">  차별화를 갖춘 미디어 제작을 지원 합니다.
        </div>

        <div class="contentbox">
            <div class="box">
                <div class="inner">
                    <h3>AI 기술</h3>
                    <P>현존 최고의 경쟁기술과 동급</P>
                </div>
            </div>
            <div class="box">
                <div class="inner"> 
                    <h3>스튜디오</h3>
                    <P>트렌드에 맞는 최신장비 완비</P>
                </div>
            </div>
        </div>

        <p class="subtext">
            <strong>자체 LLM 서버 Pick Cerberus-8B v1</strong> 구축으로<br>
            한국어는 기본, 영어 중국어 등 전세계 다양한 언어로<br>
            실시간 양방 소통을 가능하게 구현 했으며<br>
            AI 전문 지식이나 기술의 경험이 없어도 누구나 쉽고 빠르게<br>
            콘텐츠 제작을 가능하게 했습니다.
        </p>

        <div class="h100"></div>
        <h2>지니픽이 함께 합니다</h2>
        <p class="subtext">
            더욱 치열해지는 디지털 광고시장에서<br>
            성공노하우와 자체솔루션 기반으로 최고의 성과를 약속 드립니다.
        </p>

        <div class="companySwiper__outer">
            <div class="swiper companySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/img/company/logo_1.png" alt="사단법인 여성행복누리"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_2.png" alt="광명아우름"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_3.png" alt="gallery aurm"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_4.png" alt="아우름 대안학교"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_5.png" alt="경기도 위기임산부 안심상담"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_6.png" alt="onoff korea"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_7.png" alt="onoff pay"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_8.png" alt="onoff t데이"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_9.png" alt="해피페이"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_10.png" alt="해피쿠폰"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_11.png" alt="engplus"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_12.png" alt="옥수수페이"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_13.png" alt="옥수수마켓"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_14.png" alt="휴먼 큐레이팅"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_15.png" alt="mayday"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_16.png" alt="예원int"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_17.png" alt="예원히스테모"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_18.png" alt="(주)예원황칠바이오"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_19.png" alt="에스엔비엔지니어링"></div>
                    <!-- <div class="swiper-slide"><img src="/img/company/logo_20.png" alt="ginipick media"></div> -->
                    <div class="swiper-slide"><img src="/img/company/logo_21.png" alt="2424,2424"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_22.png" alt="global H"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_23.png" alt="칠빵대리"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_24.png" alt="더벡터"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_25.png" alt="(주)예원빅테크"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_26.png" alt="(주)더이케이자산관리"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_27.png" alt="더이케이"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_28.png" alt="엠트리 글로벌"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_29.png" alt="Dr. 마리엔스+"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_30.png" alt="k-popclick"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_31.png" alt="크레스트72"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_32.png" alt="gini ENM"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_33.png" alt="ASIACROWD"></div>
                    <div class="swiper-slide"><img src="/img/company/logo_34.png" alt="월드케이팝센터"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-navigation">
                <button class="swiper-button-prev">
                    <img src="/img/arrow_prev_mo.png" alt="prev">
                </button>
                <button class="swiper-button-next">
                    <img src="/img/arrow_next_mo.png" alt="next">
                </button>
            </div>
        </div>
    </section>

    <section class="section4 section1">
        <img src="/img/section4_img.png" alt="" class="section4_img pc">
        <img src="/img/section4_img_mobile.png" alt="" class="section4_img mo">
        <div class="maxWidthWrap">
            <h2>사업분야</h2>
            <div class="textbox">
                <div class="inner">
                    <p class="kor">
                        지니픽의 사업분야는<br>
                        AI 아바타, AI 콘텐츠, AI 패션<br>
                        AI 교육, AI 상담 분야<br>
                        총 5가지 사업분야로 나뉘어집니다.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="section5 maxWidthWrap">
        <ul>
            <li>
                <a href="/pages/avatar">
                    <img src="/img/section5_img1.jpg" alt="" class="section5_img pc">
                    <img src="/img/a.png" alt="" class="section5_img mo">
                    <button>
                        <span>바로가기</span>
                        <img src="/img/arrow_right_black.png" alt="">
                    </button>
                </a>
                <div class="text">
                    <h2>AI 아바타</h2>
                    <h3>이제는 쉽게 AI 아바타를 생성할 수 있습니다!</h3>
                    <p class="text-subtext-mobile">나만의 AI 아바타를<br>생성해 콘텐츠 제작</p>
                    <img src="/img/arrow_down_mobile.png" alt="" class="arrow-down">
                    <p>
                        <span class="hide_mobile">나만의 AI 아바타를 생성해 콘텐츠 제작</span><br class="hide_mobile">
                        내가 원하는 스타일의 가상인물 제작 및 양방향 대화 가능<br>
                        그리움을 오래 간직할수 있는 추모 서비스 제공
                    </p>
                    <!-- <div class="hashtag">
                        <span>#AI아바타</span>
                        <span>#디지털친구</span>
                        <span>#디지털추모관</span>
                    </div> -->
                </div>
            </li>
            <li>
                <div class="text">
                    <h2>AI 콘텐츠</h2>
                    <h3>
                        키워드만 있으면 쉽고 빠르게<br>
                        나만의 컨텐츠 제작이 가능합니다!
                    </h3>
                    <p class="text-subtext-mobile">시나리오만 있으면 누구나 손쉽게<br>아바타 영상 제작 가능</p>
                    <p>
                        <span class="hide_mobile">시나리오만 있으면 누구나 손쉽게 아바타 영상 제작 가능</span><br class="hide_mobile">
                        노출 키워드 활용 블로그 컨텐츠 작성 기능 제공
                    </p>
                    <!-- <div class="hashtag">
                        <span>#AI영상</span>
                        <span>#AI블로그</span>
                    </div> -->
                    <img src="/img/arrow_down_mobile.png" alt="" class="arrow-down">
                </div>
                <a href="/pages/contents">
                    <img src="/img/section5_img2.jpg" alt="" class="section5_img pc">
                    <img src="/img/b.png" alt="" class="section5_img mo">
                    <button>
                        <span>바로가기</span>
                        <img src="/img/arrow_right_black.png" alt="">
                    </button>
                </a>
            </li>
            <li>
                <a href="/pages/fashion">
                    <img src="/img/section5_img3.jpg" alt="" class="section5_img pc">
                    <img src="/img/c.png" alt="" class="section5_img mo">
                    <button>
                        <span>바로가기</span>
                        <img src="/img/arrow_right_black.png" alt="">
                    </button>
                </a>
                <div class="text">
                    <h2>AI 패션</h2>
                    <h3>
                        AI코디에게 매일 나에게 맞는<br>
                        스타일링을 받아보세요!
                    </h3>
                    <p class="text-subtext-mobile">한 번의 정보 등록으로<br>AI 맞춤 코디 제공</p>
                    <p>
                        <span class="hide_mobile">한 번의  정보 등록으로 AI 맞춤 코디 제공</span><br class="hide_mobile">
                        스타일에 맞는 국내, 글로벌 쇼핑 플랫폼<br>
                        통합검색으로 쇼핑 제안
                    </p>
                    <!-- <div class="hashtag">
                        <span>#패션코디</span>
                    </div> -->
                    <img src="/img/arrow_down_mobile.png" alt="" class="arrow-down">
                </div>
            </li>
            <li>
                <div class="text">
                    <h2>AI 교육</h2>
                    <h3>
                        24시간 언제 어디서든<br>
                        내게 필요한 교육을 받을수 있습니다!
                    </h3>
                    <p class="text-subtext-mobile">내가 선택한 AI 선생님과 양방향 소통으로<br>
                        건강상담, 교육 등 가능</p>
                    <p>
                        <span class="hide_mobile">내가 선택한 AI 선생님과 양방향 소통으로<br>
                            건강상담, 교육 등 가능</span><br class="hide_mobile">
                        다양한 카테고리별로 공부할 수 있는 AI 플랫폼 제공
                    </p>
                    <!--  <div class="hashtag">
                        <span>#에듀큐레이터</span>
                        <span>#투자큐레이터</span>
                        <span>#라이프큐레이터</span>
                    </div> -->
                    <img src="/img/arrow_down_mobile.png" alt="" class="arrow-down">
                </div>
                <a href="/pages/edu">
                    <img src="/img/section5_img4.jpg" alt="" class="section5_img pc">
                    <img src="/img/d.png" alt="" class="section5_img mo">
                    <button>
                        <span>바로가기</span>
                        <img src="/img/arrow_right_black.png" alt="">
                    </button>
                </a>
            </li>
            <li>
                <a href="/pages/consulting">
                    <img src="/img/section5_img5.jpg" alt="" class="section5_img pc">
                    <img src="/img/e.png" alt="" class="section5_img mo">
                    <button>
                        <span>바로가기</span>
                        <img src="/img/arrow_right_black.png" alt="">
                    </button>
                </a>
                <div class="text">
                    <h2>AI 상담</h2>
                    <h3>
                        24시간  AI 상담으로 고객을 놓치지 마세요!
                    </h3>
                    <p class="text-subtext-mobile">AI 학습으로 고객이 문의한 내용에 즉답할 수 있는<br>
                        AI 챗 상담 기능 제공</p>
                    <p>
                    <p>
                        <span class="hide_mobile">AI 학습으로 고객이 문의한 내용에 즉답할 수 있는<br>
                            AI 챗 상담 기능 제공</span>
                    </p>
                    <!-- <div class="hashtag">
                        <span>#CS지원서비스</span>
                    </div> -->
                    <!-- <img src="/img/arrow_down_mobile.png" alt="" class="arrow-down"> -->
                </div>
            </li>
        </ul>
    </div>
</x-layouts.ginipick>