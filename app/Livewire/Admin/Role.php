<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Role extends Component
{
    public $roles;

    public function mount(){
        if( !\Auth::user() || \Auth::user()->can('view_role') == false ){
            $this->roles = [];
        }else $this->roles = SpatieRole::with('permissions')->get();
    }
    public function render()
    {
        if( !\Auth::user() || \Auth::user()->can('view_role') == false ){
            return view('error',['code'=>'401','message'=>'Unauthorized']);
        }else return view('livewire.admin.role');
    }
}