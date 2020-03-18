@extends('layouts.app')

@section('migasdepan')
<h1>
        Construcciones
        <small>Control de construcciones</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/construcciones') }}"><i class="fa fa-dashboard"></i> Construcciones</a></li>
        <li class="active">Listado de construcciones</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
                <a href="{{ url('/construcciones/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
          <thead>
                  <th>Id</th>
                  <th>Contribuyente</th>
                  <th>Presupuesto</th>
                  <th>Impuesto</th>
                  <th>Acción</th>
                </thead>
                <tbody>
                  @foreach($construcciones as $construccion)
                  <tr>
                    <td>{{ $construccion->id }}</td>
                    <td>{{ $construccion->contribuyente->nombre }}</td>
                    <td>{{ $construccion->presupuesto }}</td>
                    <td>{{ $construccion->impuesto->impuesto }}</td>
                    <td>
                                {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                                <a href="{{ url('construcciones/'.$construccion->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a href="{{ url('/construcciones/'.$construccion->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                                <button class="btn btn-danger btn-xs" type="button" onclick={{ "baja(".$construccion->id.",'construcciones')" }}><span class="glyphicon glyphicon-trash"></span></button>
                                {{ Form::close()}}

                        </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
                
              <div class="pull-right">

              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>
@endsection
