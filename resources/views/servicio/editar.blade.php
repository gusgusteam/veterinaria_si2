@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Editar Servicio</h1>
@stop

@section('content')
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                <form method="POST" enctype="multipart/form-data" action="{{route('servicio.update',$servicio->id)}}" autocomplete="off" class="needs-validation" novalidate>
                    @method('POST')
                    @csrf
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="nombre">Nombre</label> 
                              <input class="form-control" id="nombre" name="nombre" type="text" value="{{$servicio->nombre}}"placeholder="ingrese su nombre " pattern=".*\S+.*" autofocus required />
                              <div class="invalid-feedback">Introduzca el nombre.</div>
                              @error('nombre')
                              <small class="text-danger"> {{$message}}</small>
                              @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="precio">Precio</label> 
                              <input class="form-control" id="precio" name="precio" type="text" pattern=".*\S+.*" placeholder="ingrese su precio"value="{{$servicio->precio}}" required />
                              <div class="invalid-feedback">Por favor, coloque un precio.</div>
                              @error('precio')
                              <small class="text-danger"> {{$message}}</small>
                              @enderror
                            </div>
                        </div>
                    </div>
        
        
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="id_tipo_servicio">Tipo Servicio</label> 
                          <select class="form-control"  id="id_tipo_servicio" name="id_tipo_servicio"  required>
                            <option selected disabled value="">Seleccionar tipo servicio</option>
                                @foreach ($tipos as $tipo)
                                <option @if ($servicio->id_tipo_servicio=$tipo->id) {{ 'selected' }} @endif  value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                @endforeach
                            </select>
                          <div class="invalid-feedback">Por favor, seleccione uno.</div>
                          @error('id_tipo_servicio')
                          <small class="text-danger"> {{$message}}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
        
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="d-flex justify-content-end">
                            <div class="mt-4">
                                <button type="submit" class= "btn btn-success btn-sm">Guardar</button>
                                <a href="{{ route('servicio.index') }}" class= "btn btn-secondary btn-sm">Regresar</a>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </form>
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