<x-guest-layout>
    <div
        x-data="{
            hpcert : {{ config("site.use_tel_verify") ? 'true' : 'false'}},
            auth_id : '{{old('auth_id')}}',
            name : '{{old('name')}}',
            tel : '{{old('tel')}}',
            dupcheck : false,
            certpop(){
                console.log( this.auth_id)
                if( !this.auth_id  ) fnCheckplusPopup()
                //else alert( '이미 전화번호 인증을 완료하셨습니다.') 
            },
            checkid(){
                let userid = $refs.userid.value
                if( !userid ) {
                    alertcall('아이디를 적어주세요')
                }else{
                    axios.get('/api/user/checkid',{params : { userid : userid} }).then( res=>{
                        alertcall('사용가능한 아이디입니다')
                        this.dupcheck =true
                    })
                }
            },
            check(e){
                if( !this.dupcheck){
                    alertcall('아이디 중복확인을 해주세요');
                    return;
                }
                else if( this.hpcert && !this.auth_id){
                    alertcall('핸드폰 인증을 받아주세요');
                    return;
                }else {
                    e.target.submit();
                }
            },
            checkplus(detail) {
                axios.get('getHpVerified').then(res=>{
                    this.name = res.data.log.name;
                    this.tel = res.data.log.mobileno;
                    this.auth_id = res.data.log.id;
                })
            },
            init(){
                window.addEventListener('toAlpine', event => {
                    if( event.detail && event.detail.type && event.detail.type=='checkplus') {
                        this.checkplus(event.detail)
                    }
                });
                
            }
        }"
        >
        <form method="POST" action="{{ route('register') }}" @submit.prevent="check(event)" class="mt-3"
            >
            @csrf
            @if( config("site.use_tel_verify"))
                <input type="hidden" name="auth_id" :value="auth_id">
                <input type="hidden" name="name" :value="name">
                <input type="hidden" name="tel" :value="tel">
            @endif

            <div class="text-center mb-2">
                <h2 class="text-[28px] font-bold text-gray-900">회원가입</h2>
            </div>
            <div class="w-full">
                <div class="grid grid-cols-2 gap-x-1 w-full text-center text-xl">
                <div class="flex items-center radio">
                    <input name="user_type" type="radio" id="person_type" hidden="hidden" class="hidden" checked value="P">
                    <label for="person_type" class="w-full py-3">
                        개인회원
                    </label>
                </div>
                <div class="flex items-center radio">
                    <input name="user_type" type="radio" id="company_type" hidden="hidden" class="hidden" value="C">
                    <label for="company_type" class="w-full py-3">
                        기업회원
                    </label>
                </div>
                </div>
            </div>
            <!--
            <div class="grid grid-cols-2 gap-x-1 w-full text-center text-xl">
                <label for="person_type2" class="checkbox group h-[55px]">
                    <input
                        type="checkbox"
                        name="user_type2"
                        id="person_type2"
                        class="hidden peer"
                        value="P"
                    >
                    <div class="flex justify-center items-center w-full h-full bg-[#d5d5d5] group-hover:bg-[#efc4c4] peer-checked:bg-[#efc4c4]">
                        <span class="text-[#231815] text-[22px] group-hover:font-extrabold peer-checked:font-extrabold">개인회원</span>
                    </div>
                </label>
                <label for="company_type2" class="checkbox group h-[55px]">
                    <input
                        type="checkbox"
                        name="user_type2"
                        id="company_type2"
                        class="hidden peer"
                        value="C"
                    >
                    <div class="flex justify-center items-center w-full h-full bg-[#d5d5d5] group-hover:bg-[#efc4c4] peer-checked:bg-[#efc4c4]">
                        <span class="text-[#231815] text-[22px] group-hover:font-extrabold peer-checked:font-extrabold">기업회원</span>
                    </div>
                </label>
            </div>
            -->
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="userid" :value="__('아이디')" class="!font-bold !text-lg"/>
                <div class="flex justify-between gap-x-2">
                    <x-text-input id="userid" class="block mt-1 w-full !border-gray-800" 
                    type="text" name="userid" :value="old('userid')" required autofocus autocomplete="username" x-ref="userid"/>
                    <button type="button" class="rounded bg-[#231815] text-lg text-white px-3 min-w-max mt-1" @click="checkid()" @change="dupcheck=false;console.log( 'change')">중복확인</button>
                </div>
                <x-input-error :messages="$errors->get('userid')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('비밀번호')"  class="!font-bold !text-lg"/>

                <x-text-input id="password" class="block mt-1 w-full  !border-gray-800"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <div class="text-gray-600 text-sm pl-2">최소 8자 이상 20자 이하로 적어주세요</div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('비밀번호 확인')"  class="!font-bold !text-lg"/>

                <x-text-input id="password_confirmation" class="block mt-1 w-full !border-gray-800"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('이름')"  class="!font-bold !text-lg"/>
                <input 
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full !border-gray-800" 
                    id="name" type="text" 
                    required="required" 
                    autocomplete="name"
                    :value="name"
                    @if( config("site.use_tel_verify"))
                    readonly="readonly"
                    @click="certpop()"
                    @else
                    name="name"
                    @endif
                    >
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="tel" :value="__('핸드폰번호')"  class="!font-bold !text-lg"/>
                <input 
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm disable-arrow block mt-1 w-full !border-gray-800" 
                    id="tel" type="number" required="required" autocomplete="tel"
                    :value="tel"
                    @if( config("site.use_tel_verify"))
                    readonly="readonly"
                    @click="certpop()"
                    @else
                    name="tel"
                    @endif
                    >
                <div class="text-gray-600 text-sm pl-2">숫자만 적어주세요</div>
                <x-input-error :messages="$errors->get('tel')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('이메일')"  class="!font-bold !text-lg"/>
                <x-text-input id="email" class="block mt-1 w-full !border-gray-800" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-2 mt-6 text-base pl-1"  x-data="{ }">
                <div class="flex gap-x-2 items-center">
                    <input type="checkbox" name="agree_personal" value="Y" required> 
                    <div @click="window.dispatchEvent(new CustomEvent('term1-pop'));" class="cursor-pointer"><span>(필수)</span> 이용약관 동의</div>
                </div>
                <x-input-error :messages="$errors->get('agree_personal')" class="mb-2 pl-6" />
                <div class="flex gap-x-2 items-center">
                    <input type="checkbox" name="agree_terms"  value="Y" required> 
                    <div @click="window.dispatchEvent(new CustomEvent('term2-pop'));" class="cursor-pointer"><span>(필수)</span> 개인정보 수집 및 이용 동의</div>
                </div>
                <x-input-error :messages="$errors->get('agree_terms')" class="mb-2 pl-6" />
            </div>

            <div class="mt-10">
                <button class="block w-full text-2xl text-white text-center py-3 bg-[#231815]">
                    회원가입
                </button>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-base text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('로그인') }}
                </a>
            </div>
        </form>
    </div>

    @include("front.pop.terms")
    @include("front.pop.personal")
    <script>
        function fnCheckplusPopup(){
            window.open('/phoneVerification', 'popupChk', 'width=500, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no, toolbar=no, titlebar=yes, location=no, scrollbar=no');
        }
    </script>
    <style>
        .radio input:checked ~ label {
            background-color: #efc4c4;
            color: white;
            font-weight: 800;
        }
        .radio input ~ label {
            background-color: #d5d5d5;
            color: #231815;
            font-weight: 400;
        }

    </style>
</x-guest-layout>
