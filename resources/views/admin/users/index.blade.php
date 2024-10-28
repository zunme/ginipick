<x-admin.main>
    <x-slot name="header">
            {{ __('회원 리스트') }}
    </x-slot>

    <div>
        <livewire:admin.users.index />
    </div>
</x-admin.main>