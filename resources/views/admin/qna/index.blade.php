<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="font-semibold text-lg text-gray-800 leading-tight">
                {{ __('QnA 리스트') }}
            </div>
            <span class="w-6 h-6 bg-red-500 rounded-full cursor-pointer text-lg flex justify-center items-center text-white shadow pt-1" @click="eventToAlpine( {type:'crete_qna_pop'} )">+</span>
        </div>
    </x-slot>
    <div class="bg-white rounded p-2">
        @include('admin.qna.list')
    </div>
    @include( 'admin.qna.create_pop')
</x-admin-layout>