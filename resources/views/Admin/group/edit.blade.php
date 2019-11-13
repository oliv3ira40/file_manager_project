@extends('Admin.layout.layout')
@section('title', 'Grupo: ' . $group->name)
@section('title2', 'Grupo: ' . $group->name)

@section('content')
	<div class="content-page">
		<div class="content">
		    <div class="container-fluid">

		    	<style>
		    		.ms-container {
		    			width: 100%;
		    		}
		    	</style>

		    	<div class="row">
	                <div class="col-md-12">
	                    <div class="card-box">
	                    	{!! Form::open(['route'=>'admin.group.update', 'method'=>'post']) !!}
		                    	{!! Form::hidden('id', $group->id) !!}
		                    	<div class="row">
			                    	<div class="col-md-6">
				                        <h4 class="m-t-0 m-b-30 header-title">Permissões</h4>

				                        <select name="id_permissions[]" class="multi-select" multiple="" id="my_multi_select3" >
				                            @foreach ($permissions as $permission)
				                            	@if ($permission->select == 1)
				                            		<option value="{{ $permission->id }}" selected>{{ $permission->name }}</option>
				                            	@else
				                            		<option value="{{ $permission->id }}">{{ $permission->name }}</option>
				                            	@endif
				                            @endforeach
				                        </select>
			                    	</div>
			                    	<div class="col-md-6">
			                            <h4 class="m-t-0 m-b-30 header-title">Grupo</h4>

		                                <div class="form-group">
		                                    <label for="exampleInputEmail1">Nome do Grupo</label>
		                                    <input type="text" name="name" value="{{ $group->name }}" class="form-control" aria-describedby="emailHelp">
		                                </div>
		                                <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
			                    	</div>
		                    	</div>
		                    {!! Form::close() !!}
	                    </div>
	                </div>
	            </div>
		    </div>
		</div>
	</div>
@endsection