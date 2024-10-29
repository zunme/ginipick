<x-alpine-pop popid="userinfopop" title="유저정보" maxwidth='max-w-xl'>
    <x-slot name="datainit">
        memos : [],
        datainit(){
            axios.get(`/api/admin/user/${this.user_id}`).then( res=>{
                this.info = res.data
                this.memos = res.data.memos
                this.showModal()
            })
        },
        save(e){
            var formData = new FormData(e.target)
            formData.append('_method', 'PUT')
            axios.post(`/api/admin/user/${this.info.id}`, formData).then(res=>{
                alert('수정하였습니다')
                window.dispatchEvent(new CustomEvent('users_refresh'));
            })
        },
        savepwd(e){
            var formData = new FormData(e.target)
            formData.append('_method', 'PUT')
            axios.post(`/api/admin/user/${this.info.id}/password`, formData).then(res=>{
                alert('수정하였습니다')
            })       
        },
        saveMemo(e){
            var formData = new FormData(e.target)
            axios.post(`/api/admin/user/${this.info.id}/memo`, formData).then(res=>{
                alert('메모를 남겼습니다.')
                this.memos = res.data;
                e.target.reset()
            })        
        },
        changeRole(e){
            var formData = new FormData(e.target)
            formData.append('_method', 'PUT')
            if( confirm('변경하시겠습니까?') ){
                axios.post(`/api/admin/user/${this.info.id}/role`, formData).then(res=>{
                    alert('변경하였습니다.')
                    window.dispatchEvent(new CustomEvent('users_refresh'));
                })      
            }
        },
    </x-slot>
    <div>
        <form @submit.prevent="save(event)">
            <table class="border border-gray-400 w-full">
                <colgroup>
                    <col width="100px" />
                    <col width="*" />
                </colgroup>
                <tr>
                    <x-admin.th-b class="">아이디</x-admin.th-b>
                    <x-admin.td-b>
                        <input type="text" placeholder="아이디" 
                        class="input input-bordered w-full border-gray-400 focus:border-blue-500 focus:ring-0 rounded" 
                        :value="info.userid" disabled 
                        />
                    </x-admin.td-b>
                </tr>
                <tr>
                    <x-admin.th-b class="">이름</x-admin.th-b>
                    <x-admin.td-b>
                        <input type="text" placeholder="이름" 
                            class="input input-bordered w-full border-gray-400 focus:border-blue-500 focus:ring-0 rounded" 
                            name="name" :value="info.name" required 
                            />
                    </x-admin.td-b>
                </tr>
                <tr>
                    <x-admin.th-b class="">전화번호</x-admin.th-b>
                    <x-admin.td-b>
                        <input type="number" placeholder="전화번호" 
                            class="input input-bordered disable-arrow w-full border-gray-400 focus:border-blue-500 focus:ring-0 rounded" 
                            name="tel" :value="info.tel" required 
                            />
                    </x-admin.td-b>
                </tr>
                <tr>
                    <x-admin.th-b class="">이메일</x-admin.th-b>
                    <x-admin.td-b>
                        <input type="email" placeholder="이메일" 
                            class="input input-bordered disable-arrow w-full border-gray-400 focus:border-blue-500 focus:ring-0 rounded" 
                            name="email" :value="info.email" required 
                            />
                    </x-admin.td-b>
                </tr>             
                <tr>
                    <x-admin.th-b class="">개인/법인</x-admin.th-b>
                    <x-admin.td-b>
                        <x-form.select name="personality" :options="config('variables.personality')" x-model="info.personality">
                            <option disabled >개인/법인 선택</option>
                        </x-form.select>
                    </x-admin.td-b>
                </tr>
            </table>
            <div class="my-2 flex justify-end">
                <button class="daisy-btn daisy-btn-secondary daisy-btn-sm py-1 px-3">변경</button>
            </div>
        </form>
        <form @submit.prevent="savepwd(event)" class="mt-2">
            <table class="border border-gray-400 w-full">
                <colgroup>
                    <col width="100px" />
                    <col width="*" />
                </colgroup>
                <tr>
                    <x-admin.th-b class="">비밀번호</x-admin.th-b>
                    <x-admin.td-b>
                        <input type="text" placeholder="password" 
                        class="input input-bordered w-full border-gray-400 focus:border-blue-500 focus:ring-0 rounded" 
                        name="password"
                        />
                    </x-admin.td-b>
                </tr>
            </table>
            <div class="my-2 flex justify-end">
                <button class="daisy-btn daisy-btn-secondary daisy-btn-sm py-1 px-3">변경</button>
            </div>
        </form>
        @if(\Auth::user()->hasRole('admin') )
        <form @submit.prevent="changeRole(event)" class="mt-2">
            <table class="border border-gray-400 w-full">
                <colgroup>
                    <col width="100px" />
                    <col width="*" />
                </colgroup>
                <tr>
                    <x-admin.th-b class="">권한</x-admin.th-b>
                    <x-admin.td-b>
                        <x-form.select name="user_type" :options="config('variables.user_types')" x-model="info.user_type">
                            <option disabled>회원타입</option>
                        </x-form.select>
                    </x-admin.td-b>
                </tr>
            </table>
            <div class="my-2 flex justify-end">
                <button class="daisy-btn daisy-btn-secondary daisy-btn-sm py-1 px-3">변경</button>
            </div>
        </form>
        @endif
        <form @submit.prevent="saveMemo(event)" class="mt-4">
            <div>메모</div>
            <textarea class="daisy-textarea daisy-textarea-info w-full focus:outline-0" name="memo" placeholder="남길 메모"></textarea>
            <div class="my-2 flex justify-end">
                <button class="daisy-btn daisy-btn-success daisy-btn-sm py-1 px-3">메모저장</button>
            </div>      
        </form>
        <div>
            <div class="">
                <div class="border-b-2 border-gray-300 py-4 mb-4 text-slate-500 font-bold px-5">메모</div>
                <template x-if="memos.length < 1">
                    <div class="py-5 text-center text-gray-400 text-lg">저장된 메모가 없습니다.</div>
                </template>
                <template x-for="memo in memos">
                    <div class="mb-4 pb-4 [&:not(:last-child)]:border-b border-gray-600 ">
                        <div class="flex justify-between text-gray-500 p-1">
                            <template x-if="memo.writeuser">
                                <div class="px-2">
                                    <span x-text="memo.writeuser.userid"></span>
                                    (<span x-text="memo.writeuser.name"></span>)
                                </div>
                            </template>
                            <template x-if="!memo.writeuser">
                                <div></div>
                            </template>
                            <div x-text="toDateTimeString(memo.created_at)"></div>
                        </div>
                        <pre x-text="memo.memo" class="border px-3 py-1 rounded w-full overflow-x-hidden whitespace-pre-wrap break-all"></pre>
                    </div>
                </template>
            </div>
        </div>
    </div>
</x-alpine-pop>