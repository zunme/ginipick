<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Sidemenu extends Component
{
    public $menus;
    public $routename;
    protected $user;
    public $current_id='';
    public $parent_id='';

    public function mount(){
        $this->user = \Auth::user();
        $this->routename = \Request::route()->getName();
        $menu = [
            [
              'label'=>'Role',
              'id'=>'role',
              'route'=>'admin.role',
              'icon'=>'fa-solid fa-shield-halved',
            ]
        ];
        $menu = array_merge( config('panel.menus_a'), $menu);
        $menu = $this->checkmenu( $menu );
        if( !$menu ) $this->menus = [];
        else $this->menus = $menu;

    }
    public function checkmenu($menus){
        foreach ( $menus as $menu){
            if( isset($menu['items']) ) {
                $data = $this->checkgroup( $menu);
            }else {
                $data = $this->checkitem( $menu);
            }
            if( $data != false ) $arr[] = $data;
        }
        return $arr;
    }
    protected function checkgroup( $menu){
        $items = [];
        $groupid = 'menu_colasp_'.\Str::random(10);

        foreach( $menu['items'] as $submenu ){
            $data = $this->checkitem($submenu , $groupid);
            if( $data != false ) $items[] = $data;
        }
        if( count($items) < 1 ) return false;
        
        return  [
            'hassub'=>true, 
            'icon'=>isset($menu['icon']) ? $menu['icon'] :'', 
            'label'=>$menu['label'] ,
            'selected'=>false,
            'id' => $groupid,
            'sub'=>$items
        ];
    }
    protected function checkitem( $menu , $parent_id=null){
        if( $menu['id'] =='home') {
            $perm = true;
        }else $perm = $this->user->can('view_any_'. $menu['id']);
        if( !$perm ) return false;
        $menu_id = 'menu_item_'.( isset($menu['id']) ? $menu['id'] : \Str::randon(10) );
        if( $this->routename == $menu['route']) {
            $this->current_id = $menu_id;
            $this->parent_id = $parent_id;
        }
        return [ 
                'hassub'=>false, 
                'icon'=>isset($menu['icon']) ? $menu['icon'] :'', 
                'label'=>$menu['label'] ,
                'link'=>route($menu['route'],[],false),
                'parent_id'=>$parent_id,
                'id'=>$menu_id,
                'selected'=>false
            ];
    }
    public function render()
    {
        return view('livewire.admin.sidemenu');
    }
}
