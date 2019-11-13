@extends('Admin.layout.layout')
@section('title', 'Permissões Disponíveis')

@section('content')
	
	<!-- Row -->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Permissões disponíveis</h6>
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
											<th class="hide">Id</th>
											<th>Nome</th>
											<th>Rota</th>
											<th>Data de criação</th>
											<th>Ações</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th class="hide">Id</th>
											<th>Nome</th>
											<th>Rota</th>
											<th>Data de criação</th>
											<th>Ações</th>
										</tr>
									</tfoot>
									<tbody class="tbody_list_permissions">
										@foreach ($permissions as $permission)
											<tr>
												<td class="id_permission_td hide">{{ $permission->id }}</td>
												<td class="name_permission_td">{{ $permission->name }}</td>
												<td class="route_permission_td">{{ $permission->route }}</td>
												<td>{{ $permission->created_at }}</td>
												<td>
													<button data-toggle="modal" data-target="#edit-modal" class="btn_edit_permission btn btn-warning btn-sm">Editar</button>
													<button data-toggle="modal" data-target="#delete-modal" class="btn_delete_permission btn btn-danger btn-sm">Excluir</button>
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
					<h5 class="modal-title">Editando Permissão: <b class="tittle_name_permission"></b></h5>
				</div>
				{!! Form::open(['route'=>['admin.permission.update']]) !!}
					<div class="modal-body">
						{!! Form::hidden('id', null, ['class'=>'permission_id_input']) !!}

						<div class="form-group">
							<label for="name" class="control-label mb-10">Nome:</label>
							<input type="text" name="name" class="name_permission_input form-control">
						</div>
						<div class="form-group">
							<label for="name" class="control-label mb-10">Rota:</label>
							<input type="text" name="route" class="route_permission_input form-control">
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
					<h5 class="modal-title">Excluindo Permissão: <b class="tittle_name_permission"></b></h5>
				</div>
				{!! Form::open(['route'=>['admin.permission.delete']]) !!}
					<div class="modal-body">
						{!! Form::hidden('id', null, ['class'=>'permission_id_input']) !!}

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
	
@endsection