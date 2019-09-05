@extends('../../layouts.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Curriculum</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.cv.index') }}">Curriculum</a></li>
          <li class="breadcrumb-item active">Editar</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <form method="POST" autocomplete="off" enctype="multipart/form-data" action="{{ route('admin.cv.update', $career) }}">
    @csrf @method('PUT')
    <div class="row">
      <div class="col-12">
      @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="fa fa-ban"></i> !Cuidado!</h5>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      </div>
      <div class="col-md-6 col-12">
        <div class="card card-dark card-outline">
          <div class="py-2 px-3">
            <h3>Encabezado</h3>
          </div>
          <div class="card-body">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><strong>Titulo</strong></span>
                </div>
                <input type="text" 
                  class="form-control" 
                  placeholder="Titulo" 
                  name="title"
                  value="{{ old('title', $career->title) }}">
              </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><strong>Descripción</strong></span>
                </div>
                <textarea class="form-control" rows="2" name="description">{{ $career->description }}</textarea>
                @include('ckfinder::setup')
              </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-12">
        <div class="card card-dark card-outline">
          <div class="py-2 px-3">
            <h3>Archivos</h3>
          </div>
          <div class="card-body">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><strong>Foto</strong></span>
                </div>
                <input type="file" 
                  class="form-control" 
                  placeholder="Titulo" 
                  name="photo"
                  value="{{ old('photo', $career->photo) }}">
              </div>
              <smal class="text-muted">La imagen debe ser de 800x800 pixeles</smal>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><strong>CV</strong></span>
                </div>
                <input type="file" 
                  class="form-control" 
                  placeholder="Titulo" 
                  name="cv_file"
                  value="{{ old('cv_file', $career->cv_file) }}">
              </div>
              <smal class="text-muted">El archivo no debe exceder los 3mb</smal>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="card card-dark card-outline">
          <div class="py-2 px-3">
            <h3>Sobre mí</h3>
          </div>
          <div class="card-body">
            
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><strong>Subtítulo</strong></span>
                </div>
                <input type="text" 
                  class="form-control" 
                  placeholder="Titulo" 
                  name="subtitle"
                  value="{{ old('subtitle', $career->subtitle) }}">
              </div>
              <div class="form-group mb-2">
                <textarea class="form-control" id="editor1" rows="2" name="content">{!! $career->content !!}</textarea>
              </div>
          </div>
          <button class="btn btn-success btn-block">Guardar</button>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection

@push('ckeditor-script')
  <script src="{{ asset('./js/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('./js/ckfinder/ckfinder.js') }}"></script>
@endpush

@push('js')
<script type="application/javascript">
  CKFinder.setupCKEditor();
  CKEDITOR.replace( 'editor1' );
</script>
@endpush