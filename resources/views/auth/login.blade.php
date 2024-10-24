
<x-guest-layout>
    <x-slot:body>
        <body class="page__sign"
                x-data="{
                    userid : '',
                    password :'',
                    login(e){
                        if( !this.userid) alertcall('아이디를 입력해주세요')
                        else if( !this.userid) alertcall('아이디를 입력해주세요')
                    }
                }"
            >
            <a href="javascript:history.back()" class="btn-sign-back"></a>
            <h1>
                <img src="/img/logo.png" alt="ginipick" class="sign-logo view_only_pc">
                <img src="/img/sign/mobile_logo.png" alt="ginipick" class="sign-logo view_only_mobile">
            </h1>
            <h2 class="sign-title">로그인</h2>
    
            <form class="signform" method="post" action="/login">
                @csrf
                <div>
                    <label class="input-label" for="id">아이디</label>
                    <input type="text" name="userid" placeholder="아이디 입력" class="inputStyle" id="id" required x-model="userid">
                    <x-input-error :messages="$errors->get('userid')" class="mt-2" />
                </div>
                <div class="">
                    <label class="input-label" for="pw">비밀번호</label>
                    <input type="password" name="password" placeholder="비밀번호 입력"  class="inputStyle" id="pw" required x-model="password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="h60"></div>
                <button class="btn-signin block w-full">로그인</button>
                <a href="/register" class="btn-signup">회원가입</a>
    
                <div class="link-btm">
                    <label class="label-check">
                        <input type="checkbox" name="remember">
                        <i></i>
                        <span>로그인 정보 저장</span>
                    </label>
                    <!--
                    <a href="javascript:;" class="btn-find">아이디·비밀번호 찾기</a>
                    -->
                </div>
            </form>
        </body>
    </x-slot:body>
</x-guest-layout>