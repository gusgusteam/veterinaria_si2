@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Crear Tipo Servicio</h1>
@stop

@section('content')
<div class="container-fluid">
  <form method="POST" enctype="multipart/form-data" action="{{route('tipo_servicio.store')}}" autocomplete="off" class="needs-validation" novalidate>
    @method('POST')
    @csrf
      <div class="card card-secondary card-outline">
          <div class="card-body">

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="nombre">Nombre</label> 
                      <input class="form-control" id="nombre" name="nombre" type="text" value="{{old('nombre')}}"placeholder="ingrese su nombre " pattern=".*\S+.*" autofocus required />
                      <div class="invalid-feedback">Introduzca el nombre.</div>
                      @error('nombre')
                      <small class="text-danger"> {{$message}}</small>
                      @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="descripcion">descripcion</label> 
                      <textarea class="form-control" id="descripcion" name="descripcion" type="text" pattern=".*\S+.*" placeholder="ingrese su descripcion"value="{{old('descripcion')}}" required > </textarea>
                      <div class="invalid-feedback">Por favor, coloque una descripcion.</div>
                      @error('descripcion')
                      <small class="text-danger"> {{$message}}</small>
                      @enderror
                    </div>
                </div>
            </div>


            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex justify-content-end">
                    <div class="mt-4">
                        <button type="submit" class= "btn btn-success btn-sm">Guardar</button>
                        <a href="{{ route('tipo_servicio.index') }}" class= "btn btn-secondary btn-sm">Regresar</a>
                    </div>
                </div>
              </div>
            </div>

          </div><!--/body card-->
      </div><!--/CARD FIN-->
  </form>
</div><!-- /.container-fluid -->

@stop


@section('plugins.Datatables', true)
@section('plugins.Toastr', true)

@section('js')

@stop


        
 