@extends('layouts.app')

@section('migasdepan')
<h1>
        Inmuebles
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/inmuebles') }}"><i class="fa fa-dashboard"></i> Proveedores</a></li>
        <li class="active">Listado de proveedores</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
                <a href="{{ url('/inmuebles/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                <a href="{{ url('/inmuebles?estado=1') }}" class="btn btn-primary">Activos</a>
                <a href="{{ url('/inmuebles?estado=2') }}" class="btn btn-primary">Papelera</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
          <thead>
                  <th>Id</th>
                  <th>Número catastral</th>
                  <th>Propietario</th>
                  <th>Dirección inmueble</th>
                  <th>Medida del inmueble</th>
                  <th>Número de escritura</th>
                  <th>Metros de acera</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                  @foreach($inmuebles as $inmueble)
                  <tr>
                    <td>{{ $inmueble->id }}</td>
                    <td>{{ $inmueble->numero_catastral }}</td>
                    <td>{{ $inmueble->contribuyente->nombre }}</td>
                    <td>{{ $inmueble->direccion_inmueble }}</td>
                    <td>{{ $inmueble->medida_inmueble }}</td>
                    <td>{{ $inmueble->numero_escritura }}</td>
                    <td>{{ $inmueble->metros_acera }}</td>
                    <td>
                      <a href="{{ url('proveedores/'.$inmueble->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                      <a href="{{ url('/proveedores/'.$inmueble->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
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
