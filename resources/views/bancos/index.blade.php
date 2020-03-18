@extends('layouts.app')
@section('migasdepan')
<h1>
        Bancos
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li class="active">Listado de Bancos</li>
      </ol>
@endsection
@section('content')
<div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
                <div class="btn-group pull-right">
                    <a href="javascript:void(0)" id="btnmodalagregar" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span></a>
                    <a href="{{ url('/bancos?estado=1') }}" class="btn btn-primary">Activos</a>
                    <a href="{{ url('/bancos?estado=0') }}" class="btn btn-primary">Papelera</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
                <thead>
                  <th>Id</th>
                  <th>Nombre del banco</th>
                  <th>Acción</th>
                </thead>
                <tbody>
                  @foreach($bancos as $key => $banco)
                  <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $banco->nombre}}</td>
                    <td>
                      @if($estado == 1 || $estado == "")
                        {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                        <a href="javascript:(0)" id="edit" data-id="{{$banco->id}}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                        <button class="btn btn-danger btn-xs" type="button" onclick={{ "baja(".$banco->id.",'bancos')" }}><span class="glyphicon glyphicon-trash"></span></button>
                        {{ Form::close()}}
                      @else
                        {{ Form::open(['method' => 'POST', 'id' => 'alta', 'class' => 'form-horizontal'])}}
                          <button class="btn btn-success btn-xs" type="button" onclick={{ "alta(".$banco->id.",'bancos')" }}><span class="glyphicon glyphicon-trash"></span></button>
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

@include("bancos.modales")
@endsection

@section("scripts")
<script>
  $(document).ready(function(e){
    $(document).on("click", "#btnmodalagregar", function(e){
      $("#modal_registrar").modal("show");
    });

    $(document).on("click", "#btnguardar", function(e){
      e.preventDefault();
      var datos=$("#form_banco").serialize();
      $.ajax({
        url:"bancos",
        type:"post",
        data:datos,
        success:function(retorno){
          if(retorno[0] == 1){
            toastr.success("Registrado con éxito");
            $("#modal_registrar").modal("hide");
            window.location.reload();
          }
          else{
            toastr.error("Falló");
          }
        },
        error:function(error){
          console.log();
          $(error.responseJSON.errors).each(function(
            index,valor){
            toastr.error(valor.nombre);
          })
        }
      });
    });

    $(document).on("click", "#edit", function(){
      var id = $(this).attr("data-id");
      $.ajax({
        url:"bancos/"+id+"/edit",
        type:"get",
        data:{},
        success:function(retorno){
          if(retorno[0] == 1){
            $("#modal_editar").modal("show");
            $("#e_nombre").val(retorno[2].nombre);
            $("#elid").val(retorno[2].id);
          }
          else{
            toastr.error("error");
          }
        }
      });
    });   //Fin modal editar

    $(document).on("click", "#btneditar", function(e){
      var id = $("#elid").val();
      var nombre = $("#e_nombre").val();

      $.ajax({
        url: "bancos/"+id,
        type: "put",
        data: {nombre},
        success:function(retorno){
          if(retorno[0] == 1){
            toastr.success("Exitoso");
            $("#modal_editar").modal("hide");
            window.location.reload();
          }
          else{
            toastr.error("error");
          }
        }
      });
    });       //Fin btneditar

    $(document).on()
  });
</script>
@endsection