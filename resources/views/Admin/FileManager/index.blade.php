@extends('Admin.layout.layout')

@section('title', 'Portal dos dirigentes')
@section('title2', 'Portal dos dirigentes')

@section('content')
	<style>
		.fixed-sidebar-left {
			display: none !important;
		}

		.page-wrapper {
		    margin-left: 0px !important;
		}

		.toggle-left-nav-btn {
			display: none !important;
		}

		html {
		    overflow-y: scroll;
		}
	</style>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default card-view pa-0">
				<div class="panel-wrapper collapse in">
					<div class="col-lg-3 col-md-4 col-sm-6">
					   <div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Menu</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">

									<div class="treeview" id="treev_file_manager"></div>
									
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-9 col-md-8 col-sm-6">
						<div class="panel panel-default card-view">
							<div style="height: 50px;" id="title_selected_folder" data-path='' class="pl-0 col-md-6">
								<p style="font-size: 18px;" class="mt-10 mb-15 inline-block" id="title_folder_selected">{{-- Portal dos dirigentes --}}</p>

								<b style="font-size: 18px;" class="bold" id="name_folder_selected"></b>

								<input style="height: 25px;" id="input_rename_folder" class="hide" type="text">

								<div id="menu_folder" class="hide dropdown">

									<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button">
										<i style="padding: 5px 10px; font-size: 26px; position: relative; top: 2px;" class="zmdi zmdi-more-vert"></i>
									</a>
									<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
										<li class="li_dropdown_rename_folder" style='padding: 5px 0px;' role='presentation'>
											<a class='dropdown_rename_folder' data-toggle='modal' data-target='.rename_file' href='#' role='menuitem'>
												<i class='fa fa-pencil' aria-hidden='true'></i>Renomear
											</a>
										</li>

										<li class="li_dropdown_delete_folder" style='padding: 5px 0px;' role='presentation'>
											<a class='dropdown_delete_folder' data-toggle='modal' data-target='.modal_delete_folder' href='#' role='menuitem'>
												<i class='fa fa-trash-o' aria-hidden='true'></i>Excluir
											</a>
										</li>

										<li class="li_dropdown_add_new_file" style='padding: 5px 0px;' role='presentation'>
											<a class='dropdown_add_new_file' data-toggle='modal' data-target='.modal_new_file_folder' href='#' role='menuitem'>
												<i class='fa fa-upload' aria-hidden='true'></i>Adicionar Arquivo
											</a>
										</li>

										<li class="li_dropdown_add_new_folder" style='padding: 5px 0px;' role='presentation'>
											<a class='dropdown_add_new_folder' data-toggle='modal' data-target='.modal_add_new_folder' href='#' role='menuitem'>
												<i class='fa fa-folder-o' aria-hidden='true'></i>Nova Pasta
											</a>
										</li>
									</ul>
								</div>
							</div>

							<div style="height: 50px;" class="pl-0 col-md-6 pr-0">

								<div class="chat-search hide pl-0 pr-0 pb-5 pt-5">
									<div class="input-group">
										<input type="text" id="input_search_files" name="example-input1-group2" class="form-control" placeholder="Buscar">
										<span class="input-group-btn">
										<button type="button" class="btn  btn-default"><i class="zmdi zmdi-search"></i></button>
										</span>
									</div>
								</div>

								<ul style="overflow-x: overlay; max-height: 200px; width: 284px; min-height: 110px;" class="ul_list_results_search_files dropdown-menu bullet dropdown-menu-right" role="menu">
								</ul>
							</div>

							<div class="row">
								<div class="col-md-12">
									<a id="btn_come_back_folder" href="#">
										<p class="inline-block bold pull-right">
											<i class="fa fa-arrow-up"></i> Voltar
										</p>
									</a>
								</div>

								<div style="/*max-height: 500px; overflow-x: auto;" class="col-lg-12" id="body_files">
									<div class="row">

										<div style="display: inline-block;" class="container-fluid view-mail">
											
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- MODALS --}}

		@if (in_array('admin.file_manager.add_new_folder', HelpersUsers::permissionsUser(\Auth::user())))

			<div class="modal fade modal_add_new_folder" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">

				<div class="modal-dialog modal-sm">

					<div class="modal-content">

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

							<h5 class="modal-title" id="mySmallModalLabel">Nova pasta</h5>

						</div>

						<div class="modal-body">

							<input type="hidden" class="form-control" id="new_folder_input_path_file">

							

							<div class="form-group">

								<label for="recipient-name" class="control-label mb-10">Nome:</label>

								<input id="name_input_new_folder" type="text" class="form-control">

							</div>

							<p class="hide" style="color: red;">

								<b>Erro ao tentar adicionar nova pasta.</b>

							</p>

						</div>

						<div class="modal-footer">

							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

							<button type="button" class="btn_add_new_folder btn btn-primary">

								<i class="hide animate_btn_add_new_folder fa fa-spin fa-refresh"></i> Salvar

							</button>

						</div>

					</div>

					<!-- /.modal-content -->

				</div>

				<!-- /.modal-dialog -->

			</div>

		@endif



		@if (in_array('admin.file_manager.add_new_file', HelpersUsers::permissionsUser(\Auth::user())))

			<div class="modal fade modal_new_file_folder" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">

				<div class="modal-dialog modal-sm">

					<div class="modal-content">

						{!! Form::open(['route'=>'admin.file_manager.add_new_files', 'id'=>'form_admin_file_manager_add_new_files', 'files'=>true]) !!}

							<input type="hidden" name="path_folder" class="form-control" id="add_file_input_path_folder">



							<div class="modal-header">

								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

								<h5 class="modal-title" id="mySmallModalLabel">Adicionar arquivo</h5>

							</div>

							<div class="modal-body">

								<p>

									O arquivo sera adicionado a pasta: <b style="font-weight: bold;" id="b_destination_folder_the_file"></b>

								</p>

									

								<label class="pt-15 pb-10" for='new_file_modal'>

									<input name="selected_files[]" class="row col-md-12" id="new_file_modal" type="file" multiple>

								</label>

							</div>

							<p class="hide" style="color: red;">

								<b>Erro ao tentar excluir o arquivo.</b>

							</p>

							<div class="modal-footer">

								<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>

								<button type="submit" class="btn_add_new_file_to_folder btn btn-primary">

									<i class="hide animate_btn_add_new_file_to_folder fa fa-spin fa-refresh mr-5"></i>Adicionar

								</button>

							</div>

						{!! Form::close() !!}

					</div>

				</div>

			</div>

		@endif



		@if (in_array('admin.file_manager.rename_file', HelpersUsers::permissionsUser(\Auth::user())))

			<div class="modal fade rename_file" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">

				<div class="modal-dialog modal-sm">

					<div class="modal-content">

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

							<h5 class="modal-title" id="mySmallModalLabel">Renomear</h5>

						</div>

						<div class="modal-body">

							<input type="hidden" class="form-control" id="rename_input_path_file">

							

							<div class="form-group">

								<label for="recipient-name" class="control-label mb-10">Nome:</label>

								<input type="text" class="form-control" id="rename_input_name_file">

							</div>

							<p class="error_modal_rename hide" style="color: red;">

								<b>O campo de nome esta vazio ou já existe um arquivo com este nome.</b>

							</p>

						</div>

						<div class="modal-footer">

							<button type="button" class="pull-left btn btn-default" data-dismiss="modal">Cancelar</button>

							<button type="button" class="btn_rename_file btn btn-primary">

								<i class="hide animate_btn_rename_file fa fa-spin fa-refresh"></i> Salvar

							</button>

						</div>

					</div>

					<!-- /.modal-content -->

				</div>

				<!-- /.modal-dialog -->

			</div>

		@endif



		@if (in_array('admin.file_manager.delete_file', HelpersUsers::permissionsUser(\Auth::user())))

			<div class="modal fade delete_file" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">

				<div class="modal-dialog modal-sm">

					<div class="modal-content">

						<input type="hidden" class="form-control" id="delete_input_path_file">



						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

							<h5 class="modal-title" id="mySmallModalLabel">Excluir</h5>

						</div>

						<div class="modal-body">

							<p>Arquivo selecionado: <b style="font-weight: bold;" id="div_name_file"></b></p>

						</div>

						<p class="error_modal_delete hide" style="color: red;">

							<b>Erro ao tentar excluir o arquivo.</b>

						</p>

						<div class="modal-footer">

							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

							<button type="button" class="btn_delete_file btn btn-primary">

								<i class="hide animate_btn_delete_file fa fa-spin fa-refresh"></i> Excluir

							</button>

						</div>

					</div>

					<!-- /.modal-content -->

				</div>

				<!-- /.modal-dialog -->
			</div>
		@endif



		@if (in_array('admin.file_manager.delete_folder', HelpersUsers::permissionsUser(\Auth::user())))

			<div class="modal fade modal_delete_folder" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">

				<div class="modal-dialog modal-sm">

					<div class="modal-content">

						<input type="hidden" class="form-control" id="delete_input_path_folder">

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

							<h5 class="modal-title" id="mySmallModalLabel">Excluindo pasta</h5>

						</div>

						<div class="modal-body">

							<p><b style="font-weight: bold;" id="b_files_in_the_folder">??</b> arquivo(s) serão excluidos junto com esta pasta.</p>

						</div>

						<p class="hide" style="color: red;">

							<b>Erro ao tentar excluir o arquivo.</b>

						</p>

						<div class="modal-footer">

							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

							<button type="button" class="btn_delete_folder btn btn-primary">

								<i class="hide animate_btn_delete_folder fa fa-spin fa-refresh"></i> Excluir

							</button>

						</div>

					</div>

				</div>

			</div>
		@endif
	{{-- MODALS --}}

	{{-- FORMS E LINKS DE APOIO --}}
		{!! Form::open(['route'=>'admin.getUserPermissions', 'id'=>'form_getUserPermissions']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.pick_folder_and_file_selection', 'id'=>'form_pick_folder_and_file_selection']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.get_folder_and_files_treeview', 'id'=>'form_get_folder_and_files_treeview']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.get_folders', 'id'=>'form_get_folders']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.get_files', 'id'=>'form_get_files']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.get_all_files_in_the_folder', 'id'=>'form_get_all_files_in_the_folder']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.rename_file_and_folder', 'id'=>'form_rename_file_and_folder']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.delete_file', 'id'=>'form_delete_file']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.delete_folder', 'id'=>'form_delete_folder']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.files_in_the_folder', 'id'=>'form_files_in_the_folder']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.add_new_folder_to_folder', 'id'=>'form_add_new_folder_to_folder']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.organograma', 'id'=>'form_organograma']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.menu_inicio', 'id'=>'form_menu_inicio']) !!}
		{!! Form::close() !!}

		{!! Form::open(['route'=>'admin.file_manager.menu_gorven_corporativa', 'id'=>'form_menu_gorven_corporativa']) !!}
		{!! Form::close() !!}



		<img class="hide" id="link_img_file" src="{{ asset('img/icons_format_files/TXT.png') }}">

		<img class="hide" id="link_img_folder" src="{{ asset('img/icons_folders/folder-5.png') }}">
	{{-- FORMS DE APOIO --}}



@endsection

@if (in_array('admin.index', HelpersUsers::permissionsUser(\Auth::user())))
	@section('js')
		<script>
			var text_link_back = $("#text_link_back");
			var a = text_link_back.find('a');

			a.text('Página Inicial');
			a.attr('href', '{{ route('admin.index') }}');
		</script>
	@endsection
@else
	@section('js')
		<script>
			var text_link_back = $("#text_link_back");

			text_link_back.remove();
		</script>
	@endsection
@endif