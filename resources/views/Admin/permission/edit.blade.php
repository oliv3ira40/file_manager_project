@extends('Admin.layout.layout')
@section('title', 'Editando permissão')
@section('title2', 'Editando permissão')

@section('content')
	<div class="content-page">
	<!-- Start content -->
	<div class="content">
	    <div class="container-fluid">

	    	<div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Informe o nome e a rota da permissão</h4>

                        <div class="row">
                            <div class="col-12">
                                <div class="p-20">
                                    {!! Form::model($permission, ['route'=>['admin.permission.update', $permission->id]], ['class'=>'form-horizontal', 'role'=>'form']) !!}
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                {!! Form::text('route', null, ['class'=>'form-control']) !!}
                                            </div>
                                            <div class="col-12">
                                                <button class="pull-right btn btn-primary waves-effect w-md waves-light m-b-5">Salvar</button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>

                        </div>

                        
                        <!-- end row -->

                    </div> <!-- end card-box -->
                </div><!-- end col -->
            </div>

	    </div> <!-- container -->
	</div> <!-- content -->
	</div>
@endsection