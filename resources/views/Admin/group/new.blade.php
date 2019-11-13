@extends('Admin.layout.layout')
@section('title', 'Novo Grupo')
@section('title2', 'Novo Grupo')

@section('content')
    <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Novo grupo</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="form-wrap">
                                    {!! Form::open(['route'=>'admin.group.save'], ['class'=>'form-horizontal']) !!}
                                        <div class="form-group mb-0">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="control-label mb-10">Nome do grupo</label>
                                                        <input required name="name" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="message-text" class="control-label mb-10">Permissões:</label>
                                                        <select class="select_edit_group" multiple id="public-methods" name="id_permissions[]">
                                                            @foreach ($created_permissions as $permission)
                                                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                                            @endforeach
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
                                            </div>
                                            <div class="col-md-12">
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

        </div> <!-- container -->
    </div> <!-- content -->
    </div>
@endsection

