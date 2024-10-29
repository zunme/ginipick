@php
    $selectdata = [            
        'write'=>'신규문의',
        'read'=>'읽음',
        'progress'=>'처리중',
        'done'=>'처리완료'
    ];
@endphp
<x-alpine.pagenate-list 
    url="/api/admin/contact" 
    side="4" class="" innerclass=""
    tableid="qna"
    formcall=null
>
<x-slot name="script"></x-slot>
<x-slot name="form"></x-slot>
<x-admin.scroll-table>
    <x-slot name="thead">
        <tr>
            <x-admin.th-b class="">#</x-admin.th-b>
            <x-admin.th-b class="">기업명</x-admin.th-b>
            <x-admin.th-b class="">이름</x-admin.th-b>
            <x-admin.th-b class="">직책</x-admin.th-b>
            <x-admin.th-b class="">연락처</x-admin.th-b>
            <x-admin.th-b class="">이메일</x-admin.th-b>
            <x-admin.th-b class="">서비스</x-admin.th-b>
            <x-admin.th-b class="">상태</x-admin.th-b>
            <x-admin.th-b class="">문의내용</x-admin.th-b>
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
                <x-admin.td-b x-text="row.company"></x-admin.td-b>
                <x-admin.td-b x-text="row.name"></x-admin.td-b>
                <x-admin.td-b x-text="row.position"></x-admin.td-b>
                <x-admin.td-b x-text="row.tel"></x-admin.td-b>
                <x-admin.td-b x-text="row.email"></x-admin.td-b>
                <x-admin.td-b x-text="row.service_type"></x-admin.td-b>
                <x-admin.td-b >
                    <div class="w-full max-w-sm min-w-[200px]">      
                        <div class="relative"
                            x-data="{
                                id : row.id, 
                                selectedval : row.c_type,
                                changeStatus(e){
                                    let formData = new FormData();
                                    formData.append( '_method','put')
                                    formData.append( 'c_type',e.target.value)
                                    axios.post( `/api/admin/contact/${this.id}/status`, formData).then( res=>{
                                        alertcall('수정하였습니다.')
                                    })
                                }
                            }"
                          >
                          <select
                              class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded pl-3 pr-8 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md appearance-none !bg-none cursor-pointer"
                              x-model="selectedval"
                              @change="changeStatus(event)"
                              >
                              @foreach( $selectdata as $key=>$val)
                                <option value={{$key}}>{{$val}}</option>
                              @endforeach
                          </select>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="h-5 w-5 ml-1 absolute top-2.5 right-2.5 text-slate-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                          </svg>
                        </div>
                      </div>
                </x-admin.td-b>
                <x-admin.td-b>
                    <div x-html="nl2br(row.content)" class="text-wrap break-all text-left"></div>
                </x-admin.td-b>
                <x-admin.td-b x-text="toDateTimeString(row.created_at)"></x-admin.td-b>
            </tr>
        </template>
    </x-slot>
</x-admin.scroll-table>
<template x-if="list.length < 1">
    <div class="py-8 text-center text-gray-400 text-lg">
        등록된 QNA 가 없습니다.
    </div>
</template>
</x-alpine.pagenate-list>