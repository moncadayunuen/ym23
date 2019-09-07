@extends('../../layouts.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tags</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.posts.tags.index') }}">Tags</a></li>
          <li class="breadcrumb-item active">Editar</li>
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
              <h4>Editar tag</h4>
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
                @csrf @method('PUT')
                <div class="form-group">
                  <label for="name">Nombre de Tag</label>
                  <input type="text" 
                    class="form-control" 
                    id="name" 
                    placeholder="Nombre" 
                    name="name" 
                    value="{{ old('name', $tag->name) }}"
                    required>
                </div>
                <button type="submit" class="btn btn-success btn-block mr-2">Actualizar</button>
              </form>
  
            </div>
          </div>
        </div>

    </div>
  </div>
</div>    
@endsection