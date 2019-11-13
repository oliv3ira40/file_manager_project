@extends('Admin.layout.layout')

@section('title', 'Perfil de usuário')

@section('title2', 'Perfil de usuário')



@section('content')

	{{-- <style>
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
	</style> --}}

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Dados pessoais</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							{!! Form::model($user, ['route'=>'admin.user.update']) !!}
								{!! Form::hidden('id', $user->id) !!}
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10 text-left" for="example-email">Nome: </label>
										{!! Form::text('first_name', null, ['class'=>'form-control']) !!}

										@if ($errors->has('first_name'))
											<span class="txt-danger">
												<strong>{{ $errors->first('first_name') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10 text-left" for="example-email">Sobrenome: </label>
										{!! Form::text('last_name', null, ['class'=>'form-control']) !!}

										@if ($errors->has('last_name'))
											<span class="txt-danger">
												<strong>{{ $errors->first('last_name') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label mb-10 text-left" for="example-email">Email: </label>
										{!! Form::text('email', null, ['class'=>'form-control']) !!}

										@if ($errors->has('email'))
											<span class="txt-danger">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label mb-10 text-left" for="login">Login: </label>
										{!! Form::text('login', null, ['id'=>'login', 'class'=>'form-control']) !!}

										@if ($errors->has('login'))
											<span class="txt-danger">
												<strong>{{ $errors->first('login') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label mb-10 text-left" for="example-email">Senha: </label>
										{!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'********']) !!}

										@if ($errors->has('password'))
											<span class="txt-danger">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label mb-10 text-left">Grupo</label>
										@if (in_array('admin.user.editUserGroup', HelpersUsers::permissionsUser(\Auth::user())))
											<select name="group_id" class="form-control">
												@foreach ($groups as $group)
													@if ($group->name == 'Desenvolvedor')
														@if ($user->Group->name == 'Desenvolvedor')
															@if ($user->group_id == $group->id)
																<option selected value="{{ $group->id }}">{{ $group->name }}</option>
															@else
																<option value="{{ $group->id }}">{{ $group->name }}</option>
															@endif
														@endif
													@else
														@if ($user->group_id == $group->id)
															<option selected value="{{ $group->id }}">{{ $group->name }}</option>
														@else
															<option value="{{ $group->id }}">{{ $group->name }}</option>
														@endif
													@endif
												@endforeach
											</select>
										@else
											<select disabled name="group_id" class="form-control">
												@foreach ($groups as $group)
													@if ($user->group_id == $group->id)
														<option selected value="{{ $group->id }}">{{ $group->name }}</option>
													@endif
												@endforeach
											</select>
										@endif
									</div>
								</div>
								<div class="col-md-12">
									<button type="submit" class="btn btn-primary pull-right">
										<span class="btn-text">Atualizar</span>
									</button>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

{{-- @if (in_array('admin.index', HelpersUsers::permissionsUser(\Auth::user())))
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
@endif --}}