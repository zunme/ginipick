<?php
namespace App\Classes;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Exception;


class MenuClass{
    protected $user;
    public function __construct(){
        
    }
    public function get(){
        $menus = config('panel.menus_a');
        $this->user = \Auth::user();
        $arr = array();
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
        foreach( $menu['items'] as $submenu ){
            $data = $this->checkitem($submenu);
            if( $data != false ) $items[] = $data;
        }
        if( count($items) < 1 ) return false;
        return  [
            'hassub'=>true, 
            'icon'=>isset($menu['icon']) ? $menu['icon'] :'', 
            'label'=>$menu['label'] ,
            'selected'=>false,
            'id' => 'menu_colasp_'.\Str::random(10),
            'sub'=>$items
        ];
    }
    protected function checkitem( $menu){
        if( $menu['id'] =='home') {
            $perm = true;
        }else $perm = $this->user->can('view_any_'. $menu['id']);
        if( !$perm ) return false;
        return [ 
                'hassub'=>false, 
                'icon'=>isset($menu['icon']) ? $menu['icon'] :'', 
                'label'=>$menu['label'] ,
                'link'=>route($menu['route'],[],false), 
                'selected'=>false
            ];
    }
}