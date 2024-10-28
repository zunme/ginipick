            <!-- daum -->
            <div
                x-data="{
                    show:false,
                    openDaum(){
                        let self = this
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

                                self.show = false;
                                
                                var ret = {
                                    'target' : 'user-profile',
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
                                
                                if( typeof getDaumAddr == 'function'){
                                    getDaumAddr( ret )
                                }else{
                                    console.log( {'type':'daumpost','data':ret} )
                                    $wire.dispatch('user-address-chaged', { data : ret } );
                                    /*
                                    $wire.address1 = ret.addr
                                    $wire.zipcode = ret.zipcode
                                    $wire.address2 = ''
                                    $wire.address_type = ret.address_type
                                    */
                                }
                            },
                            width : '100%',
                            height : '100%',
                            maxSuggestItems : 5
                        }).embed($refs.daum);

                        // iframe을 넣은 element를 보이게 한다.
                        self.show = true;

                        // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
                        this.initDaumLayerPosition();
                    },
                    initDaumLayerPosition(){
                        var width = 300; //우편번호서비스가 들어갈 element의 width
                        var height = 400; //우편번호서비스가 들어갈 element의 height
                        var borderWidth = 1; //샘플에서 사용하는 border의 두께
                        $refs.daum.style.width = width + 'px';
                        $refs.daum.style.height = height + 'px';
                        $refs.daum.style.border = borderWidth + 'px solid';
                        $refs.daum.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
                        $refs.daum.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
                    }
                }"
                x-init="initDaumLayerPosition()"
                @address-pop-event.window="openDaum()"
                x-cloak
                >
                <div 
                    class="!border-1" 
                    style="position:fixed;overflow:hidden;z-index:10000;-webkit-overflow-scrolling:touch;"
                    :class="{'hidden' : !show}"
                    x-ref="daum"
                    >
                    <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" @click="show=false" alt="닫기 버튼">
                </div>
            </div>
            <!-- /daum -->