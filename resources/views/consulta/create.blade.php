@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Crear Consulta</h1>
@stop

@section('content')
<div class="container-fluid">
  <form method="POST" enctype="multipart/form-data" action="{{route('consulta.store')}}" autocomplete="off" class="needs-validation" novalidate>
    @method('POST')
    @csrf
      <div class="card card-secondary card-outline">
          <div class="card-body">

            <div class="row">
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
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="precio">precio</label> 
                    <input class="form-control" id="precio" name="precio" type="number" value="{{old('precio')}}"placeholder="ingrese su precio " pattern=".*\S+.*" autofocus required />
                    <div class="invalid-feedback">Introduzca el precio.</div>
                    @error('precio')
                    <small class="text-danger"> {{$message}}</small>
                    @enderror
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="fecha">fecha</label> 
                  <input class="form-control" id="fecha" name="fecha" type="text" disabled value="{{date('m-d-Y h:i:s a', time())}}"placeholder="ingrese su fecha " pattern=".*\S+.*" autofocus required />
                  <div class="invalid-feedback">Introduzca el fecha.</div>
                  @error('fecha')
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
                        <a href="{{ route('consulta.index') }}" class= "btn btn-secondary btn-sm">Regresar</a>
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


        
 