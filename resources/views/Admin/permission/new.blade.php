@extends('Admin.layout.layout')
@section('title', 'Novas Permissões')
@section('title2', 'Novas Permissões')

@section('content')
	<div class="content-page">
	<!-- Start content -->
	<div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Novas Permissões</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                {!! Form::open(['route'=>'admin.permission.save'], ['class'=>'form-horizontal']) !!}
                                    <div class="form-group mb-0">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label class="control-label mb-10">Nome / Rotas</label>
                                                    <textarea class="form-control" rows="5" name="route/name" placeholder="Ex: Permissão para salvar arquivos=admin.file.save//Permissão para excluir arquivos=admin.file.delete"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-20">
                                            <a href="javascript:history.back(1)" class="btn_edit_group btn btn-primary btn-sm">Voltar</a>
                                            <button class="pull-right btn_delete_group btn btn-success btn-sm">Salvar</button>
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