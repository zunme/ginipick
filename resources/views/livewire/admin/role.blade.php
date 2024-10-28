<div class="flex flex-col gap-y-5">
    @foreach($this->roles as $role)
    <x-admin.section class="!shadow-md">
        <livewire:admin.roles.item :item="$role"/>
    </x-admin.section>
    @endforeach
</div>