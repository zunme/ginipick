<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="font-semibold text-lg text-gray-800 leading-tight">
                {{ __('회원 리스트') }}
            </div>
            <span class="w-6 h-6 bg-red-500 rounded-full cursor-pointer text-lg flex justify-center items-center text-white shadow pt-1" @click="eventToAlpine( {type:'crete_user_pop'} )">+</span>
        </div>
    </x-slot>
    <div class="bg-white rounded p-2">
        <x-alpine.pagenate-list 
            url="/api/admin/users" 
            side="4" class="" innerclass=""
            tableid="users"
            formcall=null
            >
            <x-slot name="script"></x-slot>
            <x-slot name="form"></x-slot>
            <x-admin.scroll-table>
                <x-slot name="thead">
                    <tr>
                        <x-admin.th-b class="">#</x-admin.th-b>
                        <x-admin.th-b class="">NAME</x-admin.th-b>
                        <x-admin.th-b class="">TEL</x-admin.th-b>
                        <x-admin.th-b class="">TYPE</x-admin.th-b>
                        <x-admin.th-b class="">개인/법인</x-admin.th-b>
                        <x-admin.th-b class="">등록일</x-admin.th-b>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    <template x-for="row in list" :key="row.id">
                        <tr>
                            <x-admin.td-b>
                                <input type="checkbox" name="ids[]" :value="row.id">
                                <span x-text="row.id" class="hidden"></span>
                            </x-admin.td-b>
                            <x-admin.td-b x-text="row.name"></x-admin.td-b>
                            <x-admin.td-b>
                                <span  x-text="row.tel" ></span>
                                <template x-if="row.tel">
                                    <span class="pl-1">
                                        (<span x-text="row.checkplus_log_id ? '인증':'비인증'"></span>)
                                    </span>
                                </template>
                            </x-admin.td-b>
                            <x-admin.td-b x-text="row.user_type"></x-admin.td-b>
                            <x-admin.td-b x-text="row.personality=='C'?'법인':'개인'"></x-admin.td-b>
                            <x-admin.td-b x-text="toDateTimeString(row.created_at)"></x-admin.td-b>
                        </tr>
                    </template>
                </x-slot>
            </x-admin.scroll-table>
        </x-alpine.pagenate-list>
    </div>
    @include('admin.userv2.create_pop')
</x-admin-layout>