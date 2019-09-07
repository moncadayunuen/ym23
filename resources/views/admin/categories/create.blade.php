@extends('../../layouts.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Categorías</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categorías</a></li>
          <li class="breadcrumb-item active">Crear</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">

        <div class="offset-md-3 col-md-6 col-12">
          <div class="card card-dark card-outline">
            <div class="py-2 px-3 d-flex justify-content-start">
              <h4>Crea una categoría</h4>
            </div>
            <div class="card-body">
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
              </div>
              @endif
              <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Nombre de Categoría</label>
                  <input type="text" 
                    class="form-control" 
                    id="name" 
                    placeholder="Nombre" 
                    name="name" 
                    value="{{ old('name') }}"
                    required>
                </div>
                <div class="form-group">
                  <label for="description">Descripción</label>
                  <textarea class="form-control" 
                    id="description" rows="2" 
                    placeholder="...escribe algo" 
                    name="description">
                  {{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                  <label for="thumbnail">Imagen</label>
                  <input class="form-control" 
                    id="thumbnail"
                    type="file"
                    name="thumbnail"
                    required/>
                </div>
                <div class="alert alert-warning alert-dismissible mt-3">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-info"></i>Subida de imagen</h5>
                  <p><strong>Dimensiones de imagen:</strong> 360 x 220</p>
                  <p><strong>Peso máximo:</strong> 1mb</p>
                </div>
                <button type="submit" class="btn btn-success btn-block mr-2">Guardar</button>
              </form>
  
            </div>
          </div>
        </div>

    </div>
  </div>
</div>
@endsection