@extends('Admin.layout.layout')
@section('title', 'Grupos Disponíveis')
@section('title2', 'Grupos Disponíveis')

@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Grupos disponíveis</h6>
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
											<th style="display: none;">Id</th>
											<th>Nome</th>
											<th>Permissões</th>
											<th>Usuários</th>
											<th>Data de criação</th>
											<th>Data de atualização</th>
											<th>Ações</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th style="display: none;">Id</th>
											<th>Nome</th>
											<th>Permissões</th>
											<th>Usuários</th>
											<th>Data de criação</th>
											<th>Data de atualização</th>
											<th>Ações</th>
										</tr>
									</tfoot>
									<tbody id="tbody_list_groups">
										@foreach ($groups as $group)
											<tr>
												<td class="id_group_td" style="display: none;">{{ $group->id }}</td>
												<td class="name_group_td">{{ $group->name }}</td>
												<td>{{ count($group->Permission) }}</td>
												<td>{{ count($group->User) }}</td>
												<td>{{ $group->created_at }}</td>
												<td>{{ $group->updated_at }}</td>
												<td>
													<button data-toggle="modal" data-target="#edit-modal" class="btn_edit_group btn btn-warning btn-sm">Editar</button>
													<button data-toggle="modal" data-target="#delete-modal" class="btn_delete_group btn btn-danger btn-sm">Excluir</button>
												</td>
											</tr>
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
					<h5 class="modal-title">Editando Grupo: <b class="tittle_name_group"></b></h5>
				</div>
				{!! Form::open(['route'=>['admin.group.update']]) !!}
					<div class="modal-body">
						{!! Form::hidden('id', null, ['class'=>'group_id_input']) !!}

						<div class="form-group">
							<label for="name" class="control-label mb-10">Nome:</label>
							<input type="text" name="name" class="form-control" id="name_group_input">
						</div>
						<div class="form-group">
							<label for="message-text" class="control-label mb-10">Permissões:</label>
							<select class="select_edit_group" multiple id="public-methods" name="id_permissions[]">
								{{-- <option></option> --}}
							</select>
							<div class="button-box col-md-12 mb-20">
								<div class="col-md-6">
									<a id="select-all" class="btn btn-block btn-success btn-outline mr-10 mt-15" href="#">Selecionar todas</a> 
								</div>
								<div class="col-md-6">
									<a id="deselect-all" class="btn btn-block btn-danger btn-outline mr-10 mt-15" href="#">Remover todas</a> 
								</div>
							</div>
						</div>
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
					<h5 class="modal-title">Excluindo Grupo: <b class="tittle_name_group"></b></h5>
				</div>
				{!! Form::open(['route'=>['admin.group.delete']]) !!}
					<div class="modal-body">
						{!! Form::hidden('id', null, ['class'=>'group_id_input']) !!}

						<div class="col-md-12">
							<p>
								<b>Você tem certeza que quer excluir este grupo?</b>
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
		{!! Form::open(['route'=>'admin.group.edit', 'id'=>'form_admin_group_edit']) !!}
		{!! Form::close() !!}
	{{-- FORMS DE APOIO --}}
@endsection