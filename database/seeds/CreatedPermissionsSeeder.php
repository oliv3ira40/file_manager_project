<?php

use Illuminate\Database\Seeder;
use App\Models\CreatedPermission;

class CreatedPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'name'=>'Página inicial do Admin',
                'route'=>'admin.index',
        	],

        	[
        		'name'=>'Criação de novo usuário',
                'route'=>'admin.user.new',
        	],
        	[
        		'name'=>'Salvar novo usuário',
                'route'=>'admin.user.save',
        	],
        	[
        		'name'=>'Lista de usuários',
                'route'=>'admin.user.list',
        	],
        	[
                'name'=>'Deletar usuário',
                'route'=>'admin.user.delete',
            ],
            [
                'name'=>'Edição de usuário',
                'route'=>'admin.user.edit',
            ],
            [
                'name'=>'Salvar edição de usuário',
                'route'=>'admin.user.update',
            ],
            [
        		'name'=>'Editar seu próprio grupo',
                'route'=>'admin.user.editMyGroup',
        	],

        	[
        		'name'=>'Lista de grupos',
                'route'=>'admin.group.list',
        	],
        	[
        		'name'=>'Criar novo grupo',
                'route'=>'admin.group.new',
        	],
        	[
        		'name'=>'Salvar novo grupo',
                'route'=>'admin.group.save',
        	],
        	[
        		'name'=>'Edição de grupos',
                'route'=>'admin.group.edit',
        	],
        	[
        		'name'=>'Salvar edição de grupos',
                'route'=>'admin.group.update',
        	],
        	[
        		'name'=>'Excluir grupo',
                'route'=>'admin.group.delete',
        	],

        	[
        		'name'=>'Lista de permissões',
                'route'=>'admin.permission.list',
        	],
        	[
        		'name'=>'Criação de nova permissão',
                'route'=>'admin.permission.new',
        	],
        	[
        		'name'=>'Salvar nova permissão',
                'route'=>'admin.permission.save',
        	],
        	[
        		'name'=>'Excluir permissões',
                'route'=>'admin.permission.delete',
        	],

            [
                'name'=>'Editar permissões',
                'route'=>'admin.permission.edit',
            ],

            [
                'name'=>'Atualizar permissões',
                'route'=>'admin.permission.update',
            ],

            [
                'name'=>'Menu Desenvolvedor',
                'route'=>'admin.menu.developer',
            ],
            [
                'name'=>'Menu Usuário',
                'route'=>'admin.menu.user',
            ],

		];

		foreach ($data as $permission) {
			if (CreatedPermission::where('route', '=', $permission['route'])->count()) {
				$created_permission = CreatedPermission::where('route', '=', $permission['route'])->first();
				$created_permission->update($permission);
				echo "Permissões alteradas!";
			} else {
				CreatedPermission::create($permission);
				echo "Permissões cadastradas!";
			}
		}
    }
}
