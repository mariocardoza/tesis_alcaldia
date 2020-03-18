@extends('layouts.app')

@section('migasdepan')
<h1>
	<small>Ver Pago<b> {{$pago->tipopago_id}} </b></small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/pagos') }}"><i class="fa fa-dashboard"></i> Pagos</a></li>
	<li class="active">Ver</li>
</ol>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-11">
			<div class="panel panel-primary">
				<div class="panel-heading">Pagos registrados</div>
				<div class="panel-body">
					<div class="form-group {{ $errors->has('tipopago_id') ? ' has-error ' : '' }}">
						<label for="tipopago_id" class="col-md-4 control-label">Nombre del pago</label>
						<label for="nombre" class="col-md-4 control-label">{{$pago->tipopago_id}}</label><br>
					</div>

					<div class="form-group {{ $errors->has('cuenta_id') ? ' has-error ' : '' }}">
						<label for="cuenta_id" class="col-md-4 control-label">Número de cuenta</label>
						<label for="nombre" class="col-md-4 control-label">{{$pago->cuenta_id}}</label><br>
					</div>

					<div class="form-group {{ $errors->has('monto') ? ' has-error ' : '' }}">
						<label for="monto" class="col-md-4 control-label">Monto del pago</label>
						<label for="nombre" class="col-md-4 control-label">{{$pago->monto}}</label><br>
					</div>

					 <div class="form-group {{ $errors->has('num_factura') ? ' has-error ' : '' }}">
					 	<label for="num_factura" class="col-md-4 control-label">N° de factura</label>
						<label for="nombre" class="col-md-4 control-label">{{$pago->num_factura}}</label><br>
					 </div>

					 {{Form::open(['route' => ['pagos.destroy', $pago->id], 'method' => 'DELETE', 'class' => 'form-horizontal'])}}
					 <a href="{{ url('/pagos/'.$pago->id.'/edit') }}" class="btn btn-warning"> <span class="glyphicon glyphicon-text-size"></span> Editar</a> |
					 <button class="btn btn-danger" type="button" onclick="return
					 swal({
					 title: 'Eliminar registro',
					 text: '¿Está seguro de eliminar el registro?',
					 type: question,
					 showCancelButton: true,
					 confirmButtonText: 'Sí, eliminar',
					 cancelButtonText: 'No, mantener',
					 confirmButtonClass: 'btn btn-danger',
					 cancelButtonClass: 'btn btn-default',
					 buttonsStyling: false
					}).then(function (){
					submit();
					swal('Hecho', 'El registro ha sido eliminado', 'success')
				}, function(dismiss){
				if(dismiss == 'cancel'){
				swal('Cancelado', 'El registro se mantiene', 'info')
			}
			});"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
			{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection