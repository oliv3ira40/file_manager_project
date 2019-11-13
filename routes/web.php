<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'VerifyUserPermissions'], function(){
	
	Route::get('/', 'Admin\AdminController@index')->name('admin.index');

	// DESENVOLVEDOR
		// GRUPOS
			Route::get('/_admin/grupo/lista', 'Admin\Developer\GroupController@list')->name('admin.group.list');
			
			Route::get('/_admin/grupo/novo', 'Admin\Developer\GroupController@new')->name('admin.group.new');
			Route::post('/_admin/grupo/salvar', 'Admin\Developer\GroupController@save')->name('admin.group.save');
			
			Route::match(['get', 'post'], '/_admin/grupo/edit/{id?}', 'Admin\Developer\GroupController@edit')->name('admin.group.edit');
			Route::post('/_admin/grupo/update', 'Admin\Developer\GroupController@update')->name('admin.group.update');

			Route::post('/_admin/grupo/excluir', 'Admin\Developer\GroupController@delete')->name('admin.group.delete');
		// GRUPOS

		// PERMISSÕES
			Route::get('/_admin/permissões/lista', 'Admin\Developer\PermissionController@list')->name('admin.permission.list');

			Route::get('/_admin/permissões/novas', 'Admin\Developer\PermissionController@new')->name('admin.permission.new');
			Route::post('/_admin/permissões/salvar', 'Admin\Developer\PermissionController@save')->name('admin.permission.save');
			
			Route::get('/_admin/permissões/editar/{id}', 'Admin\Developer\PermissionController@edit')->name('admin.permission.edit');
			Route::post('/_admin/permissões/atualizar/{id?}', 'Admin\Developer\PermissionController@update')->name('admin.permission.update');

			Route::post('/_admin/permissões/excluir', 'Admin\Developer\PermissionController@delete')->name('admin.permission.delete');
		// PERMISSÕES

		// USER
			Route::get('/_admin/usuário/lista', 'Admin\UserController@list')->name('admin.user.list');

			Route::get('/_admin/usuário/editar/{id}', 'Admin\UserController@edit')->name('admin.user.edit');
			Route::post('/_admin/usuário/atualizar', 'Admin\UserController@update')->name('admin.user.update');

			Route::get('/_admin/usuário/novo', 'Admin\UserController@new')->name('admin.user.new');
			Route::post('/_admin/usuário/salvar', 'Admin\UserController@save')->name('admin.user.save');

			Route::post('/_admin/usuário/excluir', 'Admin\UserController@delete')->name('admin.user.delete');
		// USER
	// DESENVOLVEDOR

	// GERENCIADOR DE ARQUIVOS
		
		Route::get('/_admin/gerenciador_de_arquivos', 'Admin\FileManagerController@index')->name('admin.file_manager.index');
	// GERENCIADOR DE ARQUIVOS

	// AGENDA
		Route::get('/_admin/Agenda', 'Admin\Calendar\EventCalendarController@index')->name('admin.calendar.index');

		Route::match(['get', 'post'], '/_admin/Agenda/novo_evento', 'Admin\Calendar\EventCalendarController@newEvent')->name('admin.calendar.newEvent');
		
		Route::match(['get', 'post'], '/_admin/Agenda/atualizar_evento', 'Admin\Calendar\EventCalendarController@updateEvent')->name('admin.calendar.updateEvent');

		Route::match(['get', 'post'], '/_admin/Agenda/info_evento', 'Admin\Calendar\EventCalendarController@getInfo')->name('admin.calendar.get_info');

		Route::match(['get', 'post'], '/_admin/Agenda/deletar_evento', 'Admin\Calendar\EventCalendarController@deleteEvent')->name('admin.calendar.delete_event');
	// AGENDA

});	/*Fecha grupo de verificação de permissões*/


// DESENVOLVEDOR
	
	Route::get('/_admin/grupo/buscarGrupos', 'Admin\Developer\GroupController@buscarGrupos')->name('admin.user.editMyGroup');
// DESENVOLVEDOR

// GERENCIADOR DE ARQUIVOS
// AJAX
	Route::match(['get', 'post'], '/_admin/gerenciador/view_file', 'Admin\FileManagerController@viewPdfPlugin')->name('admin.file_manager.viewPdfPlugin');

	Route::match(['get', 'post'], '/_admin/buscar_permissões_usuario', 'Admin\FileManagerController@getUserPermissions')->name('admin.getUserPermissions');

	Route::match(['get', 'post'], '/_admin/gerenciador/seleção_de_pastas_e_arquivos', 'Admin\FileManagerController@pickFolderAndFileSelection')->name('admin.file_manager.pick_folder_and_file_selection');
	Route::match(['get', 'post'], '/_admin/gerenciador/pastas_e_arquivos_treeview', 'Admin\FileManagerController@getFolderAndFilesTreeview')->name('admin.file_manager.get_folder_and_files_treeview');
	
	Route::match(['get', 'post'], '/_admin/gerenciador/buscar_todos_arquivos', 'Admin\FileManagerController@getAllFilesInTheFolder')->name('admin.file_manager.get_all_files_in_the_folder');
	Route::match(['get', 'post'], '/_admin/gerenciador/buscar_arquivos', 'Admin\FileManagerController@getFiles')->name('admin.file_manager.get_files');
	Route::match(['get', 'post'], '/_admin/gerenciador/buscar_pastas', 'Admin\FileManagerController@getFolders')->name('admin.file_manager.get_folders');

	Route::match(['get', 'post'], '/_admin/gerenciador/excluir_arquivo', 'Admin\FileManagerController@deleteFIle')->name('admin.file_manager.delete_file');

	Route::match(['get', 'post'], '/_admin/gerenciador/renomear_arquivos', 'Admin\FileManagerController@renameFIleAndFOlder')->name('admin.file_manager.rename_file_and_folder');

	Route::match(['get', 'post'], '/_admin/gerenciador/excluir_pasta', 'Admin\FileManagerController@deleteFolder')->name('admin.file_manager.delete_folder');
	
	Route::match(['get', 'post'], '/_admin/gerenciador/arquivos_na_pasta', 'Admin\FileManagerController@filesInTheFolder')->name('admin.file_manager.files_in_the_folder');
	
	Route::match(['get', 'post'], '/_admin/gerenciador/adicionar_arquivos', 'Admin\FileManagerController@addNewFiles')->name('admin.file_manager.add_new_files');
	Route::match(['get', 'post'], '/_admin/gerenciador/adicionar_pastas', 'Admin\FileManagerController@addNewFolders')->name('admin.file_manager.add_new_folder_to_folder');
	
	Route::match(['get', 'post'], '/_admin/gerenciador/organograma', 'Admin\FileManagerController@organograma')->name('admin.file_manager.organograma');
	
	Route::match(['get', 'post'], '/_admin/gerenciador/menu_inicio', 'Admin\FileManagerController@menuInicio')->name('admin.file_manager.menu_inicio');
	
	Route::match(['get', 'post'], '/_admin/gerenciador/menu_gorven_corporativa', 'Admin\FileManagerController@menuGorvenCorporativa')->name('admin.file_manager.menu_gorven_corporativa');
// AJAX
// GERENCIADOR DE ARQUIVOS

// CALENDARIO
// AJAX
	Route::match(['get', 'post'], '/_admin/Agenda/lista_eventos', 'Admin\Calendar\EventCalendarController@getListEvents')->name('admin.calendar.getListEvents');
// AJAX
// CALENDARIO


Auth::routes();
Route::post('login', 'Admin\UserController@login')->name('login');

Route::get('_admin/withoutPermission', 'Admin\AdminController@withoutPermission')->name('withoutPermission');