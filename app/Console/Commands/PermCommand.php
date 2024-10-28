<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermCommand extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cust-perm:make {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => '퍼미션 이름이 필요합니다.',
        ];
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $perm_name = $this->argument('name');
        $perm_attr=['view_','view_any_','create_','update_','delete_','delete_any_'];
        $admin_role = Role::where('name','admin')->first();
        foreach( $perm_attr as $attr){
            try{
                $perm = Permission::create(['name' => $attr.$perm_name ]);
                if( $perm_name =='role') $user->givePermissionTo(  $attr.$perm_name );
                $admin_role->givePermissionTo([$perm]);

                $this->info( "create : ". $attr.$perm_name);
            }catch( \Exception $e){
                $this->info( "error create : ". $attr.$perm_name);
                $this->error( $e->getMessage());
            }
        }
    }
}
