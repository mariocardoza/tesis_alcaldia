@extends('layouts.app')

@section('migasdepan')
<h1>
        Formas de pago
        <small>Control de formas de pago</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/formapagos') }}"><i class="fa fa-dashboard"></i> Formas de pago</a></li>
        <li class="active">Listado de formas de pago</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
                <a href="{{ url('/formapagos/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                <a href="{{ url('/formapagos?estado=1') }}" class="btn btn-primary">Activos</a>
                <a href="{{ url('/formapagos?estado=2') }}" class="btn btn-primary">Papelera</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
          <thead>
                  <th>Id</th>
                  <th>Nombre forma de pago</th>
                  <th>Estado</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                  @foreach($formapagos as $formapago)
                  <tr>
                    <td>{{ $formapago->id }}</td>
                    <td>{{ $formapago->nombre }}</td>
                    <td>{{ $formapago->estado }}</td>
                    <td>
                            @if($estado == 1 || $estado == "")
                                {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                                <a href="{{ url('formapagos/'.$formapago->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a href="{{ url('/formapagos/'.$formapago->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                                <button class="btn btn-danger btn-xs" type="button" onclick={{ "baja(".$formapago->id.",'formapagos')" }}><span class="glyphicon glyphicon-trash"></span></button>
                                {{ Form::close()}}
                            @else
                                {{ Form::open(['method' => 'POST', 'id' => 'alta', 'class' => 'form-horizontal'])}}
                                <button class="btn btn-success btn-xs" type="button" onclick={{ "alta(".$formapago->id.",'formapagos')" }}><span class="glyphicon glyphicon-trash"></span></button>
                                {{ Form::close()}}
                             @endif
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
