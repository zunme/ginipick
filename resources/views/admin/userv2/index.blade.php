<x-admin.main>
    <x-slot name="header">
            {{ __('회원 리스트') }}
    </x-slot>

    <div>
        @include('admin.userv2.list')
    </div>
</x-admin.main>