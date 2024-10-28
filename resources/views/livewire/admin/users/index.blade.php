<div>
    <div class="flex justify-end items-center gap-x-3">
        <x-ts-select.native :options="[
            ['label' => '아이디', 'value' => 'userid'],
            ['label' => '이름', 'value' => 'name'],
            ['label' => '전화', 'value' => 'tel']
        ]" select="label:label|value:value"  wire:model="search_type" />
        <x-ts-input sm wire:model="search_str" wire:keydown.enter="search()"/>
        <x-ts-button md wire:click="search()" class="mt-1">검색</x-ts-button>
        <x-ts-button @click="$modalOpen('create_mem_pop')" class="ml-2">
            <i class="fa-solid fa-user-plus"></i>
        </x-ts-button>
    </div>
    <div class="hidden">
        {{$search_type}} , {{$search_str}}
    </div>
    <div class="py-2">
        <x-admin.scroll-table>
            <x-slot name="thead">
                <x-admin.th-b class="text-center hidden">#</x-admin.th-b>
                <x-admin.th-b class="text-center">id</x-admin.th-b>
                <x-admin.th-b class="text-center">name</x-admin.th-b>
                <x-admin.th-b class="text-center">tel</x-admin.th-b>
                <x-admin.th-b class="text-center">type</x-admin.th-b>
                <x-admin.th-b class="text-center">개인/법인</x-admin.th-b>
                <x-admin.th-b class="text-center">등록일</x-admin.th-b>
            </x-slot>
            <x-slot name="tbody">
                @foreach($users as $user)
                <tr>
                    <x-admin.td-b class="hidden">{{$user->id}}</x-admin.td-b>
                    <x-admin.td-b>{{$user->userid}}</x-admin.td-b>
                    <x-admin.td-b>{{$user->name}}</x-admin.td-b>
                    <x-admin.td-b>{{$user->tel}} {{ $user->tel ? ($user->checkplus_log_id ? '(인증)' :'(비인증)') :'' }}</x-admin.td-b>
                    <x-admin.td-b>{{$user->user_type}}</x-admin.td-b>
                    <x-admin.td-b>{{$user->personality=='C' ? '법인':'개인'}}</x-admin.td-b>
                    <x-admin.td-b>{{$user->created_at->toDateTimeString()}}</x-admin.td-b>
                </tr>
                @endforeach
            </x-slot>
        </x-admin.scroll-table>
    </div>
    {{ $users->links() }}
    @include('admin.users.create')
</div>

