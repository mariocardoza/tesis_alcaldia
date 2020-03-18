<div class="form-group{{ $errors->has('contribuyente_id') ? ' has-error' : '' }}">
	<label for="" class="col-md-4 control-label">Seleccione contribuyente</label>
	<div class="col-md-6">
		<select name="contribuyente_id" id="contribuyente" class="form-control">
			<option value="">Seleccione contribuyente</option>
			@foreach($contribuyentes as $contribuyente)
			<option value="{{$contribuyente->id}}">{{$contribuyente->nombre}}</option>
			@endforeach
		</select>
		@if ($errors->has('contribuyente_id'))
		<span class="help-block">
			<strong>{{ $errors->first('contribuyente_id') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{$errors->has('direccion_construccion') ? 'has-error' : '' }}">
	<label for="direccion_construccion" class="col-md-4 control-label">Dirección dónde se construirá</label>

	<div class="col-md-6">
		{{ Form::textarea('direccion_construccion', null, ['class' => 'form-control']) }}
		@if ($errors->has('direccion_construccion'))
		<span class="help-block">
			<strong>{{ $errors->first('direccion_construccion') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{$errors->has('presupuesto') ? 'has-error' : '' }}">
	<label for="presupuesto" class="col-md-4 control-label">Presupuesto de construcción</label>

	<div class="col-md-6">
		{{ Form::text('presupuesto', null, ['class' => 'form-control']) }}
		@if ($errors->has('presupuesto'))
		<span class="help-block">
			<strong>{{ $errors->first('presupuesto') }}</strong>
		</span>
		@endif
	</div>
</div>


<div class="form-group{{ $errors->has('impuesto_id') ? ' has-error' : '' }}">
	<label for="" class="col-md-4 control-label">Seleccione impuesto</label>
	<div class="col-md-6">
		<select name="impuesto_id" id="impuesto" class="form-control">
			<option value="">Seleccione impuesto por aplicar</option>
			@foreach($impuestos as $impuesto)
			<option value="{{$impuesto->id}}">{{$impuesto->impuesto}}</option>
			@endforeach
		</select>
		@if ($errors->has('impuesto_id'))
		<span class="help-block">
			<strong>{{ $errors->first('impuesto_id') }}</strong>
		</span>
		@endif
	</div>
</div>