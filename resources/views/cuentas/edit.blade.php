@extends('layouts.app')

@section('migasdepan')
<h1>
        Cuenta N°: <small>{{ $cuenta->numero_de_cuenta }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ url('cuentas') }}"><i class="fa fa-dashboard"></i> Cuentas</a></li>
        <li class="active">Edición</li>
      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                {{ Form::model($cuenta, array('method' => 'put', 'class' => 'form-horizontal' , 'route' => array('cuentas.update', $cuenta->id))) }}
                 @include('cuentas.formulario')
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-floppy-disk"></span>    Editar
                            </button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
