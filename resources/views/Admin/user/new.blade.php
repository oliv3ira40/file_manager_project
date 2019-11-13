@extends('Admin.layout.layout')
@section('title', 'Novo Usuário')
@section('title2', 'Novo Usuário')

@section('content')

	<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Novo usuário</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-wrap">
                                    {!! Form::open(['route'=>'admin.user.save']) !!}
                                        <div class="form-body">
                                            {{-- <div class="seprator-block"></div> --}}
                                            <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Dados pessoais</h6>
                                            <hr class="light-grey-hr"/>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Nome*</label>
                                                        <input name="first_name" type="text" class="form-control">

                                                        @if ($errors->has('first_name'))
                                                            <span class="txt-danger">
                                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Sobrenome</label>
                                                        <input name="last_name" type="text" class="form-control">
                                                    
                                                        @if ($errors->has('last_name'))
                                                            <span class="txt-danger">
                                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Senha*</label>
                                                        <input name="password" type="text" class="form-control">
                                                        
                                                        @if ($errors->has('password'))
                                                            <span class="txt-danger">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Email*</label>
                                                        <input name="email" type="text" class="form-control">
                                                    
                                                        @if ($errors->has('email'))
                                                            <span class="txt-danger">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Login</label>
                                                        <input name="login" type="text" class="form-control">
                                                    
                                                        @if ($errors->has('login'))
                                                            <span class="txt-danger">
                                                                <strong>{{ $errors->first('login') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if (in_array('admin.user.editUserGroup', HelpersUsers::permissionsUser(\Auth::user())))
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Grupos</label>
                                                            <select name="group_id" class="form-control">
                                                                @foreach ($groups as $group)
                                                                    @if ($group->name == 'Desenvolvedor')
                                                                        @if (in_array('Developer', HelpersUsers::permissionsUser(\Auth::user())))
                                                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                                        @endif
                                                                    @else
                                                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-actions mt-10">
                                            <a href="javascript:history.back(1)" class="btn btn-default">Cancelar</a>
                                            <button type="submit" class="pull-right btn btn-success  mr-10"> Save</button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </div>

@endsection