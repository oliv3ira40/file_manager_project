<?php

	namespace App\Helpers;

	/**
	* SideMenuAdmin
	*/
	class SideMenuAdmin
	{
		public static function SideMenu()
		{
			$action = \Request::route()->action['as'] ?? '';

			return [
				[
					'login'=>false,
					'permission'=>'#',
					'name_menu'=>'Menu Principal',
				],
				[
					'login'=>false,
					'permission'=>'admin.index',
					'label'=>'Página inicial',
					'url'=>'admin.index',
					'icon'=>'fa fa-home',
					'line'=>true,
					'active'=>(in_array($action, ['admin.index'])) ? 'active' : '',
				],
				[
					'login'=>false,
					'permission'=>'admin.file_manager.index',
					'label'=>'Gerenciador',
					'url'=>'admin.file_manager.index',
					'icon'=>'fa fa-file',
					'line'=>true,
					'active'=>(in_array($action, ['admin.file_manager.index'])) ? 'active' : '',
				],
				[
					'login'=>false,
					'permission'=>'admin.calendar.index',
					'label'=>'Agenda',
					'url'=>'admin.calendar.index',
					'icon'=>'fa fa-list',
					'line'=>true,
					'active'=>(in_array($action, ['admin.calendar.index'])) ? 'active' : '',
				],

				[
					'login'=>true,
					'permission'=>'admin.menu.developer',
					'name_menu'=>'Desenvolvedor',
				],
				[
					'login'=>true,
					'permission'=>'admin.menu.developer',
					'label'=>'Usuários',
					'url'=>'#',
					'link_btn'=>'user_id',
					'icon'=>'fa fa-users',
					
					'active'=>(in_array($action, [
						'admin.user.list',
						'admin.user.new'
					])) ? 'active' : '',
					
					'sub_menu'=>[
						[
							'label'=>'Lista',
							'url'=>'admin.user.list',
							'active_page'=>(in_array($action, ['admin.user.list'])) ? 'active-page' : '',
						],
						[
							'label'=>'Novo usuário',
							'url'=>'admin.user.new',
							'active_page'=>(in_array($action, ['admin.user.new'])) ? 'active-page' : '',
						],
					],
					'line'=>true,
				],
				[
					'login'=>true,
					'permission'=>'admin.menu.groups',
					'label'=>'Grupo',
					'url'=>'#',
					'link_btn'=>'group_id',
					'icon'=>'fa fa-th-large',
					
					'active'=>(in_array($action, [
						'admin.group.list',
						'admin.group.new'
					])) ? 'active' : '',
					
					'sub_menu'=>[
						[
							'label'=>'Lista',
							'url'=>'admin.group.list',
							'active_page'=>(in_array($action, ['admin.group.list'])) ? 'active-page' : '',
						],
						[
							'label'=>'Novo grupo',
							'url'=>'admin.group.new',
							'active_page'=>(in_array($action, ['admin.group.new'])) ? 'active-page' : '',
						],
					],
					'line'=>true,
				],
				[
					'login'=>true,
					'permission'=>'admin.menu.permissions',
					'label'=>'Permissões',
					'url'=>'#',
					'link_btn'=>'permi_id',
					'icon'=>'fa fa-list',
					
					'active'=>(in_array($action, [
						'admin.permission.list',
						'admin.permission.new'
					])) ? 'active' : '',
					
					'sub_menu'=>[
						[
							'label'=>'Lista',
							'url'=>'admin.permission.list',
							'active_page'=>(in_array($action, ['admin.permission.list'])) ? 'active-page' : '',
						],
						[
							'label'=>'Novas permissões',
							'url'=>'admin.permission.new',
							'active_page'=>(in_array($action, ['admin.permission.new'])) ? 'active-page' : '',
						],
					],
					'line'=>true,
				],
			];
		}
	}