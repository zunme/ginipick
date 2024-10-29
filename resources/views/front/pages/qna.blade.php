<x-ginipick>
    <x-slot:styles>
        <link type="text/css" href="/style/sub.css" rel="stylesheet">
    </x-slot:styles>
    <x-slot:scripts>
        <script src="/script/jquery.1.12.0.min.js"></script>
        <script src="/script/jquery.rwdImageMaps.min.js"></script>
        <script src="/script/script_re.js?ver=00000000000000"></script>
    </x-slot:scripts>

    <!-- body -->
    <div class="subpage page_sub qna">
        <section class="section1">
            <img src="../img/qna/visual_img.png" alt="" class="visual_img pc">
            <img src="../img/qna/visual_img_mo.png" alt="" class="visual_img mo">
            <div class="maxWidthWrap">
                <h2>Q&A</h2>
                <div class="textbox">
                    <div class="inner">
                        <p class="title view_only_mobile">Q&A</p>
                        <p class="kor">
                            무엇이든 물어보세요!<br>
                            가장 많이 물어보는 질문과 <br>
                            공지사항을 확인하세요.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div id="point1" class="point__ai">
            <div class="maxWidthWrap"
                x-data="{
                    list : [],
                    init(){
                        axios.get('/api/qna').then(res=>this.list=res.data)
                    }
                }"
                >

                <div id="accordion-collapse" 
                    data-accordion="collapse" 
                    data-active-classes="bg-red-50 border-b-0"
                    data-inactive-Classes= "text-gray-500 border-b border-black"
                    class="mt-[80px]"
                    >
                    @php
                            $data = \App\Models\Qna::select('*')->orderBy('sort_no','asc')->orderBy('id','desc')->get();
                    @endphp
                    @forelse ( $data as $item )
                    <h2 id="accordion-collapse-heading-{{$item->id}}">
                        <button type="button" 
                            class="flex gap-3 items-center justify-between w-full py-3 pl-3 pr-8 font-medium text-gray-800 
                                hover:bg-red-50 " 
                            data-accordion-target="#accordion-collapse-body-{{$item->id}}" 
                            aria-expanded="true" 
                            aria-controls="accordion-collapse-body-{{$item->id}}">
                          <div class="flex items-start gap-x-8 text-2xl">
                              <span class="text-[28px] font-extrabold italic ">Q</span>
                              <span class="font-extrabold text-gray-400 min-w-[90px]">A/S문의</span>
                              <span class="font-extrabold break-all text-wrap  text-left">{!! nl2br($item->q) !!}</span>
                          </div>
                          <i data-accordion-icon class="fa-solid fa-caret-up text-2xl rotate-180 shrink-0"></i>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{$item->id}}" 
                        class="hidden" 
                        aria-labelledby="accordion-collapse-heading-{{$item->id}}">
                        <div class="py-2 pl-8 pr-5 bg-red-50 border-b-2 border-black text-2xl flex items-start gap-x-4">
                            <i class="text-red-600">A</i>
                            <div class="flex-grow overflow-x-hidden">
                                <div class="text-wrap break-all text-left">{!! nl2br($item->a) !!}</div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div></div>
                    @endforelse
                  </div>

                <p class="qna-text">더 궁금한 사항이 있으시면 24시 AI 상담사를 통해 문의 가능합니다.</p>
                <a href="/pages/contact" class="btn-submit w50">
                    AI 상담
                </a>
            </div>
            <div class="h100"></div>
        </div>
    </div>
    <!-- / body -->

</x-ginipick>