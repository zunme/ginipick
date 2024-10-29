<x-admin-layout>
    <x-slot name="header">
        @php
            $menuclass = new \App\Classes\MenuClass();
            $menu = $menuclass->get();
        @endphp
        <div class="flex justify-between">
            <div class="font-semibold text-lg text-gray-800 leading-tight">
                {{ __('CONTACT 리스트') }}
            </div>
            
        </div>
    </x-slot>
    <div class="bg-white rounded p-2">
        @include('admin.contact.list')
    </div>
</x-admin-layout>