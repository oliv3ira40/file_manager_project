<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\CreatedPermission;
use App\Models\Group;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        
        $group = Group::where('name', '=', 'Desenvolvedor')->first();
        $data['group_id'] = $group->id;

        $qtd_permissions = $group->Permission->count();
        
        if ($qtd_permissions == 0) {
            $createds_permissions = CreatedPermission::all();

            foreach ($createds_permissions as $created_permission) {
                $data['created_permission_id'] = $created_permission['id'];

                Permission::create($data);
                echo "Permissão de usuário cadastrada!";
            }            
        } else {
            echo "O usuário já possui permissões.";
        }
    }
}
