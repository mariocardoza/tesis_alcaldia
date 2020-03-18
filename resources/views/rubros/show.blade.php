@extends('layouts.app')

@section('migasdepan')
<h1>
        
        <small>Ver rubro <b>{{ $rubro->nombre }}</b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/rubros') }}"><i class="fa fa-dashboard"></i> Usuarios</a></li>
        <li class="active">Ver</li>
      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Datos del rubro </div>
                <div class="panel-body">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre del rubro: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$rubro->nombre}}</label><br>
                            
                        </div>

                         <div class="form-group{{ $errors->has('porcentaje') ? ' has-error' : '' }}">
                            <label for="porcentaje" class="col-md-4 control-label">Porcentaje del rubro: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$rubro->porcentaje}}</label><br>
                            
                        </div>

                        <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                            <label for="estado" class="col-md-4 control-label">Estado: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$rubro->estado}}</label><br>
                           
                        </div>

                      {{ Form::open(['route' => ['rubros.destroy', $rubro->id ], 'method' => 'DELETE', 'class' => 'form-horizontal'])}}
                      <a href="{{ url('/rubros/'.$rubro->id.'/edit') }}" class="btn btn-warning"><span class="glyphicon glyphicon-text-size"></span> Editar</a> |
                        <button class="btn btn-danger" type="button" onclick="
                        return swal({
                          title: 'Eliminar rubro',
                          text: '¿Está seguro de eliminar rubro?',
                          type: 'question',
                          showCancelButton: true,
                          confirmButtonText: 'Si, Eliminar',
                          cancelButtonText: 'No, Mantener',
                          confirmButtonClass: 'btn btn-danger',
                          cancelButtonClass: 'btn btn-default',
                          buttonsStyling: false
                        }).then(function(){
                          submit();
                          swal('Hecho', 'El registro a sido eliminado','success')
                        }, function(dismiss){
                          if(dismiss == 'cancel'){
                            swal('Cancelado', 'El registro se mantiene','info')
                          }
                        })";><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                      {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection