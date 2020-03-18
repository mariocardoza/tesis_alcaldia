@extends('layouts.app')

@section('migasdepan')
<h1>
        Rubros
        <small>Control de rubros</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/rubros') }}"><i class="fa fa-dashboard"></i> Rubros</a></li>
        <li class="active">Listado de rubros</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Listado</h3>
      <div class="btn-group pull-right">
        <a href="{{ url('/rubros/create') }}" class="btn btn-success">
            <span class="glyphicon glyphicon-plus-sign"></span> Agregar
        </a>
        <a href="{{ url('/rubros?estado=1') }}" class="btn btn-primary">Activos</a>
        <a href="{{ url('/rubros?estado=2') }}" class="btn btn-primary">Papelera</a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-striped table-bordered table-hover" id="example2">
        <thead>
          <th>Id</th>
          <th>Nombre Rubro</th>
          <th>Porcentaje</th>
          <th>Estado</th>
          <th>Accion</th>
        </thead>
        <tbody>
            @foreach($rubros as $rubro)
            <tr>
                <td>{{ $rubro->id }}</td>
                <td>{{ $rubro->nombre }}</td>
                <td>{{ $rubro->porcentaje }}</td>
                <td>{{ $rubro->estado }}</td>
                <td>
                    @if($estado == 1 || $estado == "")
                        {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                        <a href="{{ url('rubros/'.$rubro->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="{{ url('/rubros/'.$rubro->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                        <button class="btn btn-danger btn-xs" type="button" onclick={{ "baja(".$rubro->id.",'rubros')" }}><span class="glyphicon glyphicon-trash"></span></button>
                        {{ Form::close()}}
                    @else
                        {{ Form::open(['method' => 'POST', 'id' => 'alta', 'class' => 'form-horizontal'])}}
                        <button class="btn btn-success btn-xs" type="button" onclick={{ "alta(".$rubro->id.",'rubros')" }}><span class="glyphicon glyphicon-trash"></span></button>
                        {{ Form::close()}}
                     @endif
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
        
    </div>
  </div>
</div>
</div>
@endsection
