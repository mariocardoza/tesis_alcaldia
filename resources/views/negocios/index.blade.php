@extends('layouts.app')

@section('migasdepan')
<h1>
        Negocios
        <small>Control de negocios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/negocios') }}"><i class="fa fa-dashboard"></i> Negocios</a></li>
        <li class="active">Listado de negocios</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Listado</h3>
      <div class="btn-group pull-right">
        <!---->
        <a href="{{ url('/negocios/create') }}" class="btn btn-success">
            <span class="glyphicon glyphicon-plus-sign"></span> Agregar
        </a>
        <a href="{{ url('/Negocios?estado=1') }}" class="btn btn-primary">Activos</a>
        <a href="{{ url('/Negocios?estado=2') }}" class="btn btn-primary">Papelera</a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-striped table-bordered table-hover" id="example2">
        <thead>
          <th>Id</th>
          <th>Nombre del negocio</th>
          <th>Contribuyente</th>
          <th>Rubro</th>
          <th>Accion</th>
        </thead>
        <tbody>
            @foreach($negocios as $negocio)
                <tr>
                    <td>{{ $negocio->id }}</td>
                    <td>{{ $negocio->nombre }}</td>
                    <td>{{ $negocio->contribuyente->nombre }}</td>
                    <td>{{ $negocio->rubro->nombre }}</td>
                    <td>
                      {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                          <a href="{{ url('negocios/'.$negocio->id) }}" class="btn btn-primary btn-xs">
                            <span class="glyphicon glyphicon-eye-open"></span>
                          </a>
                          <a href="{{ url('negocio/mapa/'.$negocio->id) }}" class="btn btn-primary btn-xs">
                            <span class="glyphicon glyphicon-eye-open"></span>
                          </a>
                          <a href="{{ url('/negocios/'.$negocio->id.'/edit') }}" class="btn btn-warning btn-xs">
                            <span class="glyphicon glyphicon-text-size"></span>
                          </a>
                          <button class="btn btn-danger btn-xs" 
                            type="button" onclick={{ "baja(".$negocio->id.")" }}>
                              <span class="glyphicon glyphicon-trash"></span>
                          </button>
                      {{ Form::close()}}
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
