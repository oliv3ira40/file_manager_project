@extends('Admin.layout.layout')
@section('title', 'Agenda')
@section('title2', 'Agenda')

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
			<div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
					<div class="panel-body pt-0">
						{{-- <div class="col-md-4">
						</div> --}}

						<div class="col-md-12 calendar-wrap">
						  <div id="calendar"></div>
						</div>
					</div>
				</div>
			</div>	
		</div>	
	</div>

	<div class="modal fade new_event" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">

		<div class="modal-dialog modal-md">
			<div class="modal-content">
				{!! Form::open(['route'=>'admin.calendar.newEvent', 'id'=>'form_modal_new_event']) !!}
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title" id="mySmallModalLabel">Novo evento</h5>
					</div>
					<div class="modal-body">
						<div class="form-group col-md-12">
							<label for="name" class="control-label">Assunto:</label>
							<input name="name" type="text" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="name" class="control-label">Data Inicial:</label>
							<div class='input-group date'>
								<span class="input-group-addon">
									<span class="fa fa-calendar"></span>
								</span>
								<input type='text' class="form-control" name="event_day" id='event_day'/>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="name" class="control-label">Data Final:</label>
							<div class='input-group date'>
								<span class="input-group-addon">
									<span class="fa fa-calendar"></span>
								</span>
								<input type='text' class="form-control" name="end_of_the_event" id='end_of_the_event'/>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="name" class="control-label">Agenda:</label>
							<select class="selectpicker" name="target_of_the_event_id[]" multiple data-style="form-control btn-primary btn-outline">
								{{-- <option class="select_all">Selecionar todos</option> --}}
								@foreach ($targets_events as $target)
									<option value="{{ $target->id }}">{{ $target->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<div style="visibility: hidden;" id="msg_error" class="mt-10 mb-10 col-md-12 text-center bold">
							<p style="color: red;">Preencha todos os campos</p>
						</div>
						<div class="col-md-12">
							<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
							<button id="btn_save_event" type="submit" class="btn btn-primary">
								<i class="hide fa fa-spin fa-refresh"></i> Salvar
							</button>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	<div class="modal fade delete_event" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">

		<div class="modal-dialog modal-md">
			<div class="modal-content">
				{!! Form::open(['route'=>'admin.calendar.delete_event', 'id'=>'form_modal_delete_event']) !!}
					{!! Form::hidden('id', null) !!}

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title" id="mySmallModalLabel">Excluir evento</h5>
					</div>
					<div class="modal-body">
						<div class="form-group col-md-12">
							<label for="name" class="control-label">Assunto:</label>
							<input name="name" type="text" class="form-control" disabled>
						</div>
						<div class="form-group col-md-6">
							<label for="name" class="control-label">Data Inicial:</label>
							<div class='input-group date'>
								<span class="input-group-addon">
									<span class="fa fa-calendar"></span>
								</span>
								<input type='text' class="form-control" name="event_day" disabled/>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="name" class="control-label">Data Final:</label>
							<div class='input-group date'>
								<span class="input-group-addon">
									<span class="fa fa-calendar"></span>
								</span>
								<input type='text' class="form-control" name="end_of_the_event" disabled/>
							</div>
						</div>

						<div id="selecteds_targets" class="form-group col-md-12">
							<label for="name" class="control-label">Para:</label><br>
						</div>
					</div>
					<div class="modal-footer">
						@if (in_array('admin.calendar.delete_event', HelpersUsers::permissionsUser(\Auth::user())))
							<div class="col-md-12">
								<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-danger">
									<i class="hide fa fa-spin fa-refresh"></i> Excluir
								</button>
							</div>
						@endif
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>


{{-- FORMS DE APOIO --}}
	{!! Form::open(['route'=>'admin.calendar.getListEvents', 'id'=>'form_modal_get_list_events']) !!}
	{!! Form::close() !!}

	{!! Form::open(['route'=>'admin.calendar.updateEvent', 'id'=>'form_modal_update_event']) !!}
	{!! Form::close() !!}
	
	{!! Form::open(['route'=>'admin.calendar.get_info', 'id'=>'form_modal_get_info']) !!}
	{!! Form::close() !!}

	{!! Form::open(['route'=>'admin.getUserPermissions', 'id'=>'form_getUserPermissions']) !!}
	{!! Form::close() !!}
{{-- FORMS DE APOIO --}}

@endsection

@section('js')
	<script>
		var text_link_back = $("#text_link_back");
		var a = text_link_back.find('a');

		a.text('Volta ao gerenciador');
		a.attr('href', '{{ route('admin.file_manager.index') }}');
	</script>
@endsection