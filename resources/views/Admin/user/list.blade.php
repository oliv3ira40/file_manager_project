@extends('Admin.layout.layout')
@section('title', 'Lista de Usuários')
@section('title2', 'Lista de Usuários')

@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Usuários cadastrados</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="table-wrap">
							<div class="table-responsive">
								<table id="datable_1" class="table table-hover display  pb-30" >
									<thead>
										<tr>
											<th class="hide">Primeiro Nome</th>
											<th class="hide">Sobrenome</th>
											<th>Id</th>
											<th class="hide">Cpf</th>
											<th>Nome</th>
											<th>E-mail</th>
											<th class="hide">Login</th>
											<th>Grupo</th>
											<th>Data de criação</th>
											<th>Data de atualização</th>
											<th>Ações</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th class="hide">Primeiro Nome</th>
											<th class="hide">Sobrenome</th>
											<th>Id</th>
											<th class="hide">Cpf</th>
											<th>Nome</th>
											<th>E-mail</th>
											<th class="hide">Login</th>
											<th>Grupo</th>
											<th>Data de criação</th>
											<th>Data de atualização</th>
											<th>Ações</th>
										</tr>
									</tfoot>
									<tbody id="tbody_list_users">
										@foreach ($users as $user)
											{{-- O USUÁRIO A SER LISTADO É DESENVOLVEDOR? --}}
											@if (in_array('Developer', HelpersUsers::permissionsUser($user)))
												{{-- VERIFICANDO SE O USUÁRIO LOGADO É DESENVOLVEDOR --}}
												@if (in_array('Developer', HelpersUsers::permissionsUser(\Auth::user())))
													<tr>
														<td class="first_name_user_p hide">{{ $user->first_name }}</td>
														<td class="last_name_user_p hide">{{ $user->last_name }}</td>

														<td class="id_user_td">{{ $user->id }}</td>
														<td class="cpf_user_td hide">{{ $user->cpf }}</td>
														<td class="complet_name_user_td">{{ HelpersUsers::completName($user) }}</td>
														<td class="email_user_td">{{ $user->email }}</td>
														<td class="login_user_td hide">{{ $user->login }}</td>
														<td class="group_user_td">{{ $user->Group->name }}</td>
														<td>{{ $user->created_at }}</td>
														<td>{{ $user->updated_at }}</td>
														<td>
															{{-- <a href="{{ route('admin.user.profile', $user->id) }}" class="btn_edit_user btn btn-primary btn-sm">Perfil</a> --}}
															<button data-toggle="modal" data-target="#edit-modal" class="btn_edit_user btn btn-warning btn-sm">Editar</button>
															<button data-toggle="modal" data-target="#delete-modal" class="btn_delete_user btn btn-danger btn-sm">Excluir</button>
														</td>
													</tr>
												@endif
											@else
												<tr>
													<td class="first_name_user_p hide">{{ $user->first_name }}</td>
													<td class="last_name_user_p hide">{{ $user->last_name }}</td>

													<td class="id_user_td">{{ $user->id }}</td>
													<td class="cpf_user_td hide">{{ $user->cpf }}</td>
													<td class="complet_name_user_td">{{ HelpersUsers::completName($user) }}</td>
													<td class="email_user_td">{{ $user->email }}</td>
													<td class="login_user_td hide">{{ $user->login }}</td>
													<td class="group_user_td">{{ $user->Group->name }}</td>
													<td>{{ $user->created_at }}</td>
													<td>{{ $user->updated_at }}</td>
													<td>
														@if (in_array('admin.user.update', HelpersUsers::permissionsUser(\Auth::user())))
															<button data-toggle="modal" data-target="#edit-modal" class="btn_edit_user btn btn-warning btn-sm">Editar</button>
														@endif
														@if (in_array('admin.user.delete', HelpersUsers::permissionsUser(\Auth::user())))
															<button data-toggle="modal" data-target="#delete-modal" class="btn_delete_user btn btn-danger btn-sm">Excluir</button>
														@endif
													</td>
												</tr>
											@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

	<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title">Editando Usuário: <b class="name_user_title"></b></h5>
				</div>
				{!! Form::open(['route'=>['admin.user.update']]) !!}
					<div class="modal-body">
						{!! Form::hidden('id', null, ['class'=>'id_user_input']) !!}

						<div class="form-group col-md-6">
							<label for="first_name_user_input" class="control-label mb-10">Nome:</label>
							<input type="text" name="first_name" class="form-control" id="first_name_user_input">
						</div>
						<div class="form-group col-md-6">
							<label for="last_name_user_input" class="control-label mb-10">Sobrenome:</label>
							<input type="text" name="last_name" class="form-control" id="last_name_user_input">
						</div>
						<div class="form-group col-md-6">
							<label for="email_user_input" class="control-label mb-10">E-mail:</label>
							<input type="text" name="email" class="form-control" id="email_user_input">
						</div>
						<div class="form-group col-md-6">
							<label for="login_user_input" class="control-label mb-10">Login:</label>
							<input type="text" name="login" class="form-control" id="login_user_input">
						</div>
						{{-- <div class="form-group col-md-3">
							<label for="name" class="control-label mb-10">Cpf:</label>
							<input type="text" name="cpf" class="form-control mask_cpf" id="cpf_user_input">
						</div> --}}
						<div class="form-group col-md-12">
							<label for="password_user_input" class="control-label mb-10">Senha:</label>
							<input type="text" name="password" class="form-control" id="password_user_input">
						</div>

						@if (in_array('admin.user.editUserGroup', HelpersUsers::permissionsUser(\Auth::user())))
							<div class="form-group col-md-12">
								<label for="select_groups" class="control-label mb-10">Grupo:</label>
								<select id="select_groups" name="group_id" class="form-control">
									{{-- @foreach ($groups as $group)
										@if ($user->Group->name == $group->name)
											<option value="{{ $group->id }}" selected>{{ $group->name }}</option>
										@else
											<option value="{{ $group->id }}">{{ $group->name }}</option>
										@endif
									@endforeach --}}
								</select>
							</div>
						@endif
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-success">Salvar</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title">Excluindo Usuário: <b class="name_user_title"></b></h5>
				</div>
				{!! Form::open(['route'=>['admin.user.delete']]) !!}
					<div class="modal-body">
						{!! Form::hidden('id', null, ['class'=>'id_user_input']) !!}
						<div class="col-md-12">
							<p>
								<b>Você tem certeza que quer excluir este usuário?</b>
							</p>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-success">Excluir</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>


	{{-- FORMS DE APOIO --}}
		{!! Form::open(['route'=>'admin.user.editMyGroup', 'id'=>'form_user_editMyGroup']) !!}
		{!! Form::close() !!}
	{{-- FORMS DE APOIO --}}
@endsection