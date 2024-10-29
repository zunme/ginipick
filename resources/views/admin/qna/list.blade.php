<x-alpine.pagenate-list 
    url="/api/admin/qna" 
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
            <x-admin.th-b class="">type</x-admin.th-b>
            <x-admin.th-b class="">Question</x-admin.th-b>
            <x-admin.th-b class="">Answer</x-admin.th-b>
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
                <x-admin.td-b>
                    <div x-text="row.q_type" class="text-wrap break-all text-left"></div>
                </x-admin.td-b>
                <x-admin.td-b>
                    <div x-html="nl2br(row.q)" class="text-wrap break-all text-left"></div>
                </x-admin.td-b>
                <x-admin.td-b>
                    <pre x-text="row.a"  class="max-w-[50vw] overflow-x-hidden overflow-y whitespace-pre-wrap break-all"></pre>
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