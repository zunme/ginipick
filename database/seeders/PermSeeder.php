<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;

class PermSeeder extends Seeder
{
	public function run(): void
    {
        $user = User::where( 'userid','zunme')->first();

		$perms=[
			'role'
		];	
        $perm_attr=['view_','view_any_','create_','update_','delete_','delete_any_'];
		foreach( $perms as $perm_name){
            foreach( $perm_attr as $attr){
                try{
                    Permission::create(['name' => $attr.$perm_name ]);
                    if( $perm_name =='role') $user->givePermissionTo(  $attr.$perm_name );
                }catch( \Exception $e){
                    ;
                }
            }
		}
		//Role::where('name','partner_admin')->first()->syncPermissions( Permission::whereNotIn('name',['super','all'])->get() );
	}
}