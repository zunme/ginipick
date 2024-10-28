<?php

use Livewire\Volt\Component;
use Illuminate\Validation\ValidationException;

use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Models\Permission as SpatiePermission;

//use Mary\Traits\Toast;
use TallStackUi\Traits\Interactions; 

use Filament\Notifications\Notification As FiNoti;

new class extends Component
{
    //use Toast;
    use Interactions;

    public $item;
    public $perms;
    public $hasperm = [];
    public $selectedpage = false;
    public function mount( $item){
        $this->item = $item;
        $roles = config('panel.role');
        $role_items = config('panel.role_items');
        $perms = [];
        $this->hasperm = $item->permissions->pluck('name')->toArray();
        foreach( $roles as $role){
            foreach( $role_items as $item){
                $perms[] = $item.$role;
            }
        }
        $this->perms = $perms;
    }
    public function updatedSelectedpage($value){
        if( $value){
            $this->hasperm= $this->perms;
        }else{
            $this->hasperm=[];
        }
    }
    public function save(){
        
        //throw new Exception ('ModelNotFoundException');

        if( !\Auth::user() || \Auth::user()->can('view_role') == false ) {
            return redirect()->to('/');
        }
        try{
            $diff = $this->item->permissions->pluck('name')->diff( $this->hasperm );
            $this->item->syncPermissions($this->hasperm);
            foreach( $diff as $remove ){
                $this->item->revokePermissionTo( $remove );
            }
        }catch( Exception $e){
            throw ValidationException::withMessages([
                $e->getMessage()
            ]);
        }
        //$this->success( $this->item->name . ' 퍼미션을 변경하였습니다.');
        $this->toast()->success($this->item->name . ' 퍼미션을 변경하였습니다.')->send();

        FiNoti::make()
        ->title($this->item->name . ' 퍼미션을 변경하였습니다.')
        ->success()
        ->send();
    }
    public function exception($e, $stopPropagation) {
        FiNoti::make()
        ->title($e->getMessage())
        ->danger ()
        ->send();
        $stopPropagation();
    }
}
?>
    <div class="flex flex-col gap-y-2"
        x-data="{
            areAllCheckboxesChecked: false,

            checkIfAllCheckboxesAreChecked: function () {
                var checked = $refs.boxwrap.querySelectorAll('input[type=checkbox]:checked').length === $refs.boxwrap.querySelectorAll('input[type=checkbox]').length
                if( this.areAllCheckboxesChecked != checked) {
                    this.areAllCheckboxesChecked = checked
                    $wire.selectedpage = checked
                }
            },
            toggleAllCheckboxes: function (state) {
                $refs.boxwrap.querySelectorAll('input[type=checkbox]').forEach((checkbox) => {
                    if (checkbox.disabled) {
                        return
                    }
                    checkbox.checked = checked
                    checkbox.dispatchEvent(new Event('change'))
                })
            },
        }"
        x-init="
            $nextTick(() => {
                checkIfAllCheckboxesAreChecked()
            })
        "
        x-cloak
    >
    <div class="flex gap-x-8 items-end">
        <div class="text-base font-fold">{{$item->name}}</div>
        <x-ts-toggle id="selecte_all_{{$item->id}}" color="teal" label="전체선택" class="ring-0 border-1 border-amber-500" wire:model.live="selectedpage" invalidate />
    </div>
    <div class="px-2">
        <div class="grid grid-cols-5" x-ref="boxwrap">
        @foreach( $perms as $perm)
            <label>
                <input type="checkbox" 
                    class="fi-fo-checkbox-list-option-label form-checkbox dark:border-dark-600 border-1 dark:bg-dark-800 rounded border-gray-300 bg-white transition duration-100 ease-in-out h-5 w-5 text-primary-500 focus:ring-0 dark:ring-offset-dark-900" 
                    value="{{$perm}}" 
                    wire:model="hasperm"
                    x-on:change="checkIfAllCheckboxesAreChecked()"
                    >
                <span class="dark:text-dark-400 cursor-pointer items-center text-sm font-medium text-gray-700 ml-2">
                    {{$perm}}
                </span>
            </label>
        @endforeach
        </div>
        <div class="flex justify-end pt-2">
            <x-ts-button sm wire:click="save()">save</x-ts-button>
        </div>
    </div>
</div>