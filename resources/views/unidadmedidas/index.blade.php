@extends('layouts.app')

@section('migasdepan')
<h1>
        Unidades de medida
        <small>Control de unidades de medida</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/unidadmedidas') }}"><i class="fa fa-dashboard"></i> Unidades de medida</a></li>
        <li class="active">Listado de unidades de medida</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
                <a href="javascript:void(0)" id="modal_reg" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
          <thead>
                  <th>N°</th>
                  <th>Unidad de medida</th>
                  <th>Acción</th>
                </thead>
                <tbody>
                  @foreach($unidadmedidas as $index => $unidadmedida)
                  <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $unidadmedida->nombre_medida }}</td>
                    <td>
                      {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                      <a data-id="{{$unidadmedida->id}}" href="javascript:void(0)" id="modal_edit" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                    <button class="btn btn-danger btn-xs" type="button" id="quitar" data-id="{{$unidadmedida->id}}"><span class="glyphicon glyphicon-trash"></span></button>
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
@include('unidadmedidas.modales')
@endsection
@section('scripts')
<script>
  $(document).ready(function(e){
    $(document).on("click","#modal_reg",function(e){
      e.preventDefault();
      $("#modal_unidadmedida").modal("show");
      $("#este").focus();
    });

    $(document).on("click","#registrar_medida",function(e){
      e.preventDefault();
      modal_cargando();
      var datos=$("#form_medida").serialize();
      $.ajax({
        url:'unidadmedidas',
        type:'POST',
        dataType:'json',
        data:datos,
        success: function(json){
          if(json[0]==1){
            toastr.success("Unidad de medida registrada con éxito");
            location.reload();
            $("#form_medida").trigger("reset");
          }else{
            swal.closeModal();
            toastr.error("Ocurrió un error");
          }
        },
        error: function(error){
          $.each(error.responseJSON.errors,function(i,v){
            toastr.error(v);
          });
          swal.closeModal();
        }
      });
    });

    $(document).on("click","#modal_edit",function(e){
      e.preventDefault();
      var id=$(this).attr("data-id");
      $.ajax({
        url:'unidadmedidas/'+id+'/edit',
        type:'GET',
        dataType:'json',
        success: function(json){
          if(json[0]==1){
            
            $("#editar_medida").attr("data-id",json[2].id);
            $("#este2").val(json[2].nombre_medida);
            $("#modal_eunidadmedida").modal("show");
            console.log(json[2]);
          }
        }
      });
    });

    $(document).on("click","#editar_medida",function(e){
      e.preventDefault();
      var id=$(this).attr("data-id");
      modal_cargando();
      var datos=$("#form_emedida").serialize();
      $.ajax({
        url:'unidadmedidas/'+id,
        type:'PUT',
        dataType:'json',
        data:datos,
        success: function(json){
          if(json[0]==1){
            toastr.success("Unidad de medida modificado con éxito");
            location.reload();
          }else{
            swal.closeModal();
            toastr.error("Ocurrió un error");
          }
        },
        error: function(error){
          $.each(error.responseJSON.errors,function(i,v){
            toastr.error(v);
          });
          swal.closeModal();
        }
      });
    });

    $(document).on("click","#quitar",function(e){
      var id=$(this).attr("data-id");
      $.ajax({
        url:'unidadmedidas/'+id,
        type:'DELETE',
        dataType:'json',
        success: function(json){
          if(json[0]==1){
            if(json[1]==1){
              toastr.success(json[2]);
              window.location.reload();
            }else{
              toastr.info(json[2]);
            }
          }else{
            toastr.error("Ocurrió un error");
          }
        }
      });
    });

  });
</script>
@endsection
