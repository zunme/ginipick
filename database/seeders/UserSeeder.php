<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		$admin_role = Role::create(['name' => 'admin']);
		$partner_admin_role = Role::create(['name' => 'partner_admin']);
		$partner_role = Role::create(['name' => 'partner']);
		
        $perm_admin = Permission::create(['name' => 'adminPanel']);
        $perm_partner = Permission::create(['name' => 'partnerPanel']);

        $admin_role->syncPermissions([$perm_admin]);
        $partner_admin_role->syncPermissions([$perm_admin,$perm_partner]);
        $partner_role->syncPermissions([$perm_partner]);

		$admin = User::create([
		    'name' => 'Admin',
			'userid' => 'admin',
            'email' => 'admin@admin.com',
            'password' => \Hash::make('12341234'),
            'user_type'=>'admin',
		]);
		$admin->assignRole($admin_role);
		
		$partner = User::create(['name' => 'partner','userid' => 'partner','user_type'=>'partner_admin','email' => 'partner@admin.com','password' => \Hash::make('12341234')]);
		$partner->assignRole($partner_admin_role);
		
		$user = User::create(['name' => 'test','userid' => 'test','user_type'=>'partner','email' => 'test@test.com','password' => \Hash::make('12341234')]);
    }
}