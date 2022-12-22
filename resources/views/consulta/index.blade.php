@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Consultas</h1>
@stop

@section('content')
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">

                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="d-flex justify-content-end">
                          <div class="form-group">
                              <a class="btn btn-info btn-sm" href="{{ route('consulta.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar</a>
                              <a class="btn btn-danger btn-sm" href="{{ route('consulta.eliminados') }}"><i class="far fa-trash-alt"></i>&nbsp;Eliminados</a>
                          </div>
                      </div>
                      <table id="example2" class="table table-bordered table-sm table-hover table-striped " whidth="100%" >
                          <thead>
                              <tr>
                                  <th width="6%"> id </th>
                                  <th> descripcion </th>
                                  <th> precio </th>
                                  <th width="13%"> fecha y hora </th>
                                  <th width="9%"> accion </th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($consultas as $consulta)
                                  <tr>
                                      <td>{{ $consulta->id }}</td>
                                      <td>{{ $consulta->descripcion }}</td>
                                      <td>{{ $consulta->precio }}</td>
                                      <td>{{ $consulta->fecha }}</td>
                                      <td class="py-1 align-middle text-center">
                                        <div class="btn-group btn-group-sm">
                                          @if ($consulta->id_nota_servicio == null)
                                          <a href="{{route('consulta.edit',$consulta->id)}}" class="btn btn-default"  title="No Tiene Nota Servicio" ><i class="fas fa-trash"></i></a>
                                          @else
                                          <a href="{{route('consulta.edit',$consulta->id)}}" class="btn btn-primary"  title="Nota servicio" ><i class="fas fa-trash"></i></a>   
                                          @endif
                                          <a href="{{route('consulta.edit',$consulta->id)}}" class="btn btn-warning"  title="Editar" ><i class="fas fa-trash"></i></a>
                                          <a href="{{route('consulta.destroy', $consulta->id)}}" class="btn btn-danger"  title="Eliminar" ><i class="fas fa-trash"></i></a>
                                        </div>
                                      </td>    
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
                  <!-- /.card-body -->

              </div>
              <!-- /.card -->

          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->


@stop


@section('plugins.Datatables', true)
@section('plugins.Toastr', true)

@section('js')

@stop