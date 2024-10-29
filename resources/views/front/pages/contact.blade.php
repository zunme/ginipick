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
    <div class="popup_submit" style="display:none">
        <button class="btn-close closePopup">
            <img src="../img/close_popup.png" alt="">
        </button>
        <img src="../img/ico_poup_check.png" alt="" class="ico_check">
        <h4>제출 완료</h4>
        <p>
            <b>OOO</b>
            님!<br>
            문의하신 내용이 제출되었습니다.<br>
            문의하신 내용은 이메일로 답변이 전송됩니다.
        </p>
        <button class="btn-submit closePopup">확인</button>
    </div>

    <div class="subpage page_sub contact">
        <section class="section1">
            <img src="../img/contact/visual_img.png" alt="" class="visual_img pc">
            <img src="../img/contact/visual_img_mobile.png" alt="" class="visual_img mo">
            <div class="maxWidthWrap">
                <h2>문의하기</h2>
                <div class="textbox">
                    <div class="inner">
                        <p class="title view_only_mobile">문의하기</p>
                        <p class="kor">
                            문의하기를 통해 궁금하신 사항을<br>
                            직접 물어보세요.<br>
                            1:1로 친절하게 알려드리겠습니다.<br>
                            남겨주신 문의는 고객님의 이메일로
                            <br>
                            답변드리고 있습니다.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div id="point1" class="point__ai" x-data="{
                save(e){
                    if(confirm('작성하신 내용으로 문의하시겠습니까?')){
                        axios.post('/api/contact', new FormData( e.target)).then( res=>{
                            $refs.formref.reset();
                            alertcall('문의 내용을 남겼습니다.')
                        })
                    }
                },
                reset(){
                    $refs.formref.reset();
                }
            }">
            <div class="maxWidthWrap">
                <div class="top">
                    <h3>문의사항 작성</h3>
                    <span>개인/기업 모두 문의 가능합니다.</span>
                </div>
                <form class="table_contact" @submit.prevent="save(event)" x-ref="formref">
                    <ul>
                        <li>
                            <p>
                                <span>기업명</span>
                                <span class="essential">*</span>
                            </p>
                            <div class="box">
                                <input type="text" name="company" placeholder="기업명을 입력하세요." required>
                            </div>
                        </li>
                        <li>
                            <p>
                                <span>이름</span>
                                <span class="essential">*</span>
                            </p>
                            <div class="box">
                                <input type="text" name="name" placeholder="이름" required>
                            </div>
                        </li>
                        <li>
                            <p>
                                <span>직책</span>
                            </p>
                            <div class="box">
                                <input type="text" name="position" placeholder="직책.">
                            </div>
                        </li>
                        <li>
                            <p>
                                <span>연락처</span>
                                <span class="essential">*</span>
                            </p>
                            <div class="box">
                                <input type="text" name="tel" placeholder="연락처를 입력하세요." required>
                            </div>
                        </li>
                        <li>
                            <p>
                                <span>e-mail</span>
                                <span class="essential">*</span>
                            </p>
                            <div class="box">
                                <input type="email" name="email" placeholder="이메일" required>
                            </div>
                        </li>
                        <li>
                            <p>
                                <span>서비스</span>
                                <span class="essential">*</span>
                            </p>
                            <div class="box">
                                <select name="service_type" required>
                                    <option value="AI 아바타">AI 아바타</option>
                                    <option value="아바타 친구">아바타 친구</option>
                                    <option value="아바타 추모관">아바타 추모관</option>
                                    <option value="AI 영상">AI 영상</option>
                                    <option value="AI 작가">AI 작가</option>
                                    <option value="브랜드마케팅">브랜드마케팅</option>
                                    <option value="마이크온오프">마이크온오프</option>
                                    <option value="패션코디">패션코디</option>
                                    <option value="에듀 큐레이터">에듀 큐레이터</option>
                                    <option value="투시 큐레이터">투시 큐레이터</option>
                                    <option value="라이프 큐레이터">라이프 큐레이터</option>
                                    <option value="CS지원서비스">CS지원서비스</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <p>
                                <span>문의내용</span>
                                <span class="essential">*</span>
                            </p>
                            <div class="box">
                                <textarea name="content" required></textarea>
                                <p class="subtext">문의 사항과 관련된 세부 정보나 이미지를 제공해 주시면, 더 신속하고 정확한 도움을 드릴 수 있습니다.</p>
                                <div class="h20"></div>
                            </div>
                        </li>
                        <!--
                        <li>
                            <p>
                                <span>자유작성</span>
                            </p>
                            <div class="box">
                                <input type="text" placeholder="제목">
                                <div class="h20"></div>
                                <textarea name="" placeholder="내용"></textarea>
                            </div>
                        </li>
                        -->
                    </ul>
                    <div class="agreeboxWrap">
                        <div class="agreebox">
<pre class="overflow-x-hidden overflow-y whitespace-pre-wrap break-all">
    개인정보 취급 방침
    개인정보취급방침은 회원의 개인정보보호를 위하여 (주)지니픽이 실시하는 개인정보수집의 목적과 그 정보의 정책적, 시스템적 보안에 관한 규정이며, (주)지니픽 회원의 기본적인 사생활 비밀과 자유 및 통신비밀을 보장하고 정보유출로 인한 인권피해가 발생하지 않도록 하고자 마련된 것입니다.
    (주)지니픽은 개인정보 보호법 제30조에 따라 정보주체의 개인정보를 보호하고 이와 관련한 고충을 신속하고 원활하게 처리할 수 있도록 하기 위하여 아래와 같이 개인정보 취급방침을 수립 및 공개합니다. (주)지니픽은 개인정보 취급방침을 통하여 회원께서 제공하시는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며, 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다.
    (주)지니픽의 개인정보 취급방침을 변경하는 경우, 웹사이트 공지사항을 통하여 적절한 안내를 할 것입니다. (주)지니픽 홈페이지를 수시로 방문하시어 변경내용을 확인하시기 바랍니다.
    (주)지니픽은 개인정보취급방침을 개정하는 경우 웹사이트 공지사항(또는 개별공지)을 통하여 공지할 것입니다.
    제1조 개인정보 수집항목 및 이용목적
    (주)지니픽은 수집한 개인정보를 다음의 목적을 위해 활용합니다. 처리하고 있는 개인정보는 다음의 목적 이외의 용도로는 이용되지 않으며, 이용 목적이 변경되는 경우에는 개인정보 보호법 제18조에 따라 별도의 동의를 받는 등 필요한 조치를 이행할 예정입니다.
    수집항목	이용목적
    주민등록번호 또는 외국인등록번호 및 은행계좌정보, 사업자등록번호	회원 가입의사 확인, 회원가입에 따른 본인 식별 및 인증, 회원자격 유지 및 관리, 본인확인, 회원서비스 부정이용 방지, 각종 고지 및 통지, 고충처리, 구매/결재에 따른 본인식별, 방문판매 등에 관한 법률을 포함한 관련법령에 의거하여 회사에 부과되는 법적, 행정적 의무의 이행, 수당지급, 소득세 및 주민세 등 각종 세금의 신고/납부, 현금영수증 및 세금계산서의 발급/교부
    성명, 생년월일, 로그인id, 비밀번호, 자택 전화번호, 자택 주소, 휴대전화번호 및 이메일주소	정확한 상품 배송지의 확보, 서비스 제공, 계약서 및 청구서 발송, 콘텐츠 제공, 맞춤서비스 제공, 본인인증, 방문판매 등에 관한 법률을 포함한 관련법령에 의거한 연령인증, 회원제 서비스 이용에 따른 본인확인, 연령확인, 회원 가입 및 관리, 회원명부 작성
    제2조 개인정보 보유기간 및 이용기간
    (주)지니픽에서 제공하는 서비스를 받는 동안 회원의 개인정보는 (주)지니픽에서 계속 보유하며 서비스 제공을 위해 이용하게 됩니다. 단, 회원의 개인정보는 수집목적 또는 제공받은 목적이 달성되거나, (주)지니픽 회원관리규정 제47조에 표명한 절차에 따라 탈퇴를 요청하거나 제48조에 표명된 자격 해지 사유에 의해 회원의 자격을 해지시키는 경우에는 해당 개인의 정보는 재생할 수 없는 기술적 방법에 의해 삭제 되며, 어떠한 용도로도 열람 또는 이용될 수 없도록 처리됩니다.
    단, 상법 등 관련법령의 규정에 의하여 다음과 같이 거래관련 권리의무관계의 확인 등을 이유로 일정기간 보유하여야 할 필요가 있는 경우에는 해당자료를 일정기간 보유합니다.
    계약 또는 청약철회 등에 관한 기록: 5년
    대금결제 및 재화 등의 공급에 관한 기록: 5년
    소비자의 불만 또는 분쟁처리에 관한 기록: 3년
    회원탈퇴 6개월 이내의 재가입 방지 및 내부 방침에 의거 (주)지니픽의 회원으로 적법하지 않은 자 변별: 3년
    제3조 개인정보 제공 및 공유
    원칙적으로 (주)지니픽은 회원의 개인정보를 회원에 대한 서비스와 무관한 타 기업, 기관에 공개하지 않습니다. 다만, 다음의 경우에는 예외적으로 동의 없이 개인정보를 제공할 수 있습니다.
    ① (주)지니픽의 회원규정을 위배하거나 (주)지니픽의 서비스를 이용하여 타인에게 피해를 주거나 미풍양속을 해치는
    　 위법행위를 한 사람 등에게 법적인 조치를 취하기 위해 개인 정보를 공개해야 한다고 판단되는 경우
    ② 법령의 규정에 의하거나, 수사상의 목적으로 법령에 정해진 절차와 방법에 따라 수사기관의 요구 있는 경우
    제4조 개인정보처리의 위탁 및 제3자 제공
    서비스 향상을 위해서 회원의 개인정보를 위탁업체에 수집, 취급, 관리 등을 위탁할 수 있으며, 관계법령에 따라 위탁계약 시 개인정보가 안전하게 관리될 수 있도록 규정하고 있습니다.
    ① 회사는 위탁계약 체결 시, 개인정보 보호법 제25조에 따라 위탁업무 수행목적 외 개인정보 처리금지, 기술적.관리적 보호조치,
    　 재위탁 제한, 수탁자에 대한 관리.감독, 손해배상 등 책임에 관한 사항을 계약서 등 문서에 명시하고, 수탁자가 개인정보를 안전하게
    　 처리하는지를 감독하고 있습니다.
    ② 위탁업무의 내용이나 수탁자가 변경될 경우에는 지체 없이 본 개인정보 처리방침을 통하여 공개하도록 하겠습니다.
    제5조 정보주체의 권리.의무 및 행사방법
    ① 정보주체는 회사에 대해 언제든지 다음 각 호의 개인정보 보호 관련 권리를 행사할 수 있습니다.
    1.	개인정보 열람요구
    2.	오류 등이 있을 경우 정정 요구
    3.	삭제요구
    4.	처리정지 요구
    ② 제1항에 따른 권리 행사는 회사에 대해 서면, 전화, 전자우편, fax 등을 통하여 하실 수 있으며 회사는 이에 대해 지체 없이 조치
    　 하겠습니다.
    ③ 정보주체가 개인정보의 오류 등에 대한 정정 또는 삭제를 요구한 경우에는 회사는 정정 또는 삭제를 완료할 때까지 당해 개인정보를
    　 이용하거나 제공하지 않습니다.
    ④ 제1항에 따른 권리 행사는 정보주체의 법정대리인이나 위임을 받은 자 등 대리인을 통하여 하실 수 있습니다. 이 경우 개인정보 보호법
    　 시행규칙 별지 제11호서식에 따른 위임장을 제출하셔야 합니다.
    ⑤ 정보주체는 개인정보 보호법 등 관계법령을 위반하여 회사가 처리하고 있는 정보주체 본인이나 타인의 개인정보 및 사생활을 침해
    　 하여서는 안됩니다.
    제6조 기술적, 관리적 대책
    ① 기술적 대책
    (주)지니픽은 회원의 개인정보를 취급함에 있어 개인정보가 분실, 도난, 누출, 변조 또는 훼손 되지 않도록 안전성 확보를 위하여 다음과 같은 기술적 대책을 강구하고 있습니다.
    - 회원의 개인정보는 비밀번호에 의해 보호되며 파일 및 전송데이터를 암호화하거나 파일잠금기능(lock)을 사용하여 중요한
    　데이터는 별도의 보안기능을 통해 보호되고 있습니다.
    - (주)지니픽은 백신프로그램을 이용하여 컴퓨터바이러스에 의한 피해를 방지하기 위한 조치를 취하고 있습니다.
    　백신프로그램은 주기적으로 업데이트되며 갑작스런 바이러스가 출현할 경우 백신이 나오는 즉시 이를 제공함으로써 개인정보가
    　침해되는 것을 방지하고 있습니다.
    - (주)지니픽은 암호알고리즘을 이용하여 네트워크 상의 개인정보를 안전하게 전송할 수 있는 보안장치(ssl 또는 set)를
    　채택하고 있습니다.
    - 해킹 등 외부침입에 대비하여 각 서버마다 침입차단시스템 및 취약점 분석시스템 등을 이용하여 보안에 만전을 기하고 있습니다.
    ② 관리적 대책
    - (주)지니픽은 회원의 개인정보에 대한 접근권한을 최소한의 인원으로 제한하고 있으며, 개인정보를 취급하는 직원을 대상
    　으로 새로운 보안기술 습득 및 개인정보보호의무 등에 관해 정기적인 사내 교육 및 외부 위탁교육을 실시하고 있습니다.
    - 입사 시 전 직원의 보안서약서를 통하여 사람에 의한 정보유출을 사전에 방지하고 개인정보 취급방침에 대한 이행사항 및 직원의
    　준수여부를 감시하기 위한 내부절차를 마련하고 있습니다.
    - 개인정보 관련 취급자의 업무 인수인계는 보안이 유지된 상태에서 철저하게 이루어지고 있으며 입사 및 퇴사 후 개인정보 사고에
    　대한 책임을 명확화하고 있습니다.
    - (주)지니픽은 이용자 개인의 실수나 기본적인 인터넷의 위험성 때문에 일어나는 일들에 대해 책임을 지지 않습니다.
    　회원 개개인이 본인의 개인정보를 보호하기 위해서 자신의 id와 비밀번호를 적절하게 관리하고 여기에 대한 책임을 져야 합니다.
    - 그 외 내부 관리자의 실수나 기술관리 상의 사고로 인해 개인정보의 상실, 유출, 변조, 훼손이 유발될 경우, (주)지니픽은 즉각
    　회원께 사실을 알리고 적절한 대책을 강구할 것입니다.
    제7조 개인 아이디와 비밀번호 관리
    회원이 사용하는 회원번호와 비밀번호는 원칙적으로 회원만이 사용하도록 되어 있습니다. (주)지니픽의 고의 또는 과실이 없는 경우에, 회원의 id와 비밀번호 도용 또는 기타 타인의 사용으로 의해 발생된 문제에 대하여 (주)지니픽이 책임지지 않습니다. 어떠한 경우에도 비밀번호는 타인에게 알려 주지 마시고 로그온 상태에서는 주위의 다른 사람에게 개인 정보가 유출되지 않도록 특별한 주의를 기울여 주시기 바랍니다. 타인의 개인정보를 도용하여 회원 가입 또는 구매가 확인되었을 경우에는 회원계약이 일방적으로 해지될 수 있으며, 주민등록법에 의해 3년 이하의 징역 또는 1천만원 이하의 벌금이 부과될 수 있습니다.
    제8조 만14세 미만 아동에 대한 정보보호에 관한 사항
    (주)지니픽은 19세 이상만이 회원 가입이 가능합니다.
    제9조 권익침해 구제방법
    정보주체는 아래의 기관에 대해 개인정보 침해에 대한 문의하실 수 있습니다. 아래의 기관은 회사와는 별개의 기관으로서, 개인정보침해에 대한 신고나 상담이 필요하신 경우에는 아래 기관에 문의하시기 바랍니다.
    ▶ 개인정보 침해신고센터 및 분쟁조정위원회 (한국인터넷진흥원 운영)
    - 소관업무: 개인정보 침해사실 신고, 상담 신청, 분쟁조정신청
    - 홈페이지: privacy.kisa.or.kr
    - 전화: (국번없이) 118
    - 주소: (138-950) 서울시 송파구 중대로 135 한국인터넷진흥원
    개인정보침해신고센터
    ▶ 대검찰청 사이버범죄수사단: 02-3480-3573 (www.spo.go.kr)
    ▶ 경찰청 사이버테러대응센터: 1566-0112 (www.netan.go.kr)
    기타 개인정보 침해/피해와 관련한 상담이 필요한 경우에는 한국정보보호진흥원(kisa)내 개인정보 침해신고센터
    (http://www.cyberprivacy.or.kr 전화 1336) 에서 하실 수 있습니다.
</pre>
                        </div>
                        <label class="py-4">
                            <input type="checkbox" name="agree" value="Y" class="!min-h-[inherit] !p-0 mr-2 w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-0 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
                            <span>개인정보 수집 및 처리방침 동의</span>
                        </label>
                    </div>
                    <div class="btnbox">
                        <button class="btn-cancel" type="button" @click="reset()">취소</button>
                        <button class="btn-submit btn-showPopup">제출</button>
                    </div>
                </form>
            </div>
            <div class="h100"></div>
        </div>
    </div>
    <!-- / body -->

</x-ginipick>