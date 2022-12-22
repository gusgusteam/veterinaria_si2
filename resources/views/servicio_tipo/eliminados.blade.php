@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Tipo Servicios Eliminados</h1>
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
                              <a class="btn btn-primary btn-sm" href="{{ route('tipo_servicio.index') }}"><i class="far fa-trash-alt"></i>&nbsp;Regresar</a>
                          </div>
                      </div>
                      <table id="example2" class="table table-bordered table-sm table-hover table-striped " whidth="100%" >
                          <thead>
                              <tr>
                                  <th width="6%"> id </th>
                                  <th> nombre </th>
                                  <th> descripcion </th>
                                  <th width="6%"> accion </th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($tipo_servicios as $tipo_servicio)
                                  <tr>
                                      <td>{{ $tipo_servicio->id }}</td>
                                      <td>{{ $tipo_servicio->nombre }}</td>
                                      <td>{{ $tipo_servicio->descripcion }}</td>
                                      <td class="py-1 align-middle text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{route('tipo_servicio.restore',$tipo_servicio->id)}}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-alt-circle-up"></i></a>
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
      
        <!-- /.modal-dialog -->
    </div>
  </div>
  <!-- /.container-fluid -->
  

@stop


@section('plugins.Datatables', true)
@section('plugins.Toastr', true)

@section('js')
    
@stop


