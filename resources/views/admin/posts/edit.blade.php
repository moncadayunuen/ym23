@extends('../../layouts.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Publicaciones</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Publicaciones</a></li>
          <li class="breadcrumb-item active">Mostrar</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <form method="POST" enctype="multipart/form-data" autocomplete="off">
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
      <div class="col-md-8 col-12">
        <div class="card card-dark card-outline">
          <div class="py-2 px-3 d-flex justify-content-start">
            <h4>Editar publicación</h4>
          </div>
          <div class="card-body">   
            <div class="form-group">
              <label for="title">Titulo de Publicación</label>
              <input type="text" class="form-control" id="title" placeholder="Titulo" name="title" value="{{ old('title', $post->title) }}">
            </div>
            <div class="form-group">
              <label for="description">Descripción</label>
              <textarea class="form-control" id="description" rows="4" placeholder="...escribe algo" name="description">{{ old('description', $post->description) }}</textarea>
            </div>

            <div class="form-group">
              <label for="editor1">Contenido</label>
              <textarea class="form-control" id="editor1" rows="8" name="content">{{ old('content', $post->content) }}</textarea>
              @include('ckfinder::setup')
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12">
          <div class="card card-dark card-outline">
            <div class="card-body">

              <div class="form-group">
                <label for="category">Selecciona una fecha de publicación</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" id="pickerDate" name="published_at" value="{{ old('published_at', $post->published_at)->format('m/d/Y') }}">
                </div>
              </div>
                
              <div class="form-group">
                <label for="title">Tags</label>
                <select class="form-control select2" 
                  name="tags[]" 
                  multiple="multiple"
                  placeholder="Elige las etiquetas necesarias">
                  @foreach($tags as $tag)
                    <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}
                    value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="category">Selecciona una categoría</label>
                <select class="form-control" id="category" name="category_id">
                  <option value="">Selecciona una Categoría</option>
                  @foreach($categories as $category)
                    <option {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                    value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
  
              <div class="col-12 mb-3">
                <div class="form-group">
                  <input type="file" class="form-control" id="thumbnail" name="thumbnail" value="{{ old('thumbnail', $post->thumbnail) }}">
                </div>
                <div class="alert alert-warning alert-dismissible mt-3">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-info"></i>Subida de imagen</h5>
                  <p><strong>Dimensiones de imagen:</strong> 1200 x 628</p>
                  <p><strong>Peso máximo:</strong> 1mb</p>
                </div>
              </div>
 
                <button type="submit" class="btn btn-success btn-block mr-2">Actualizar</button>
  
            </div>
          </div>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/admin/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/admin/datepicker.css') }}">
@endpush

@push('ckeditor-script')
  <script src="{{ asset('./js/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('./js/ckfinder/ckfinder.js') }}"></script>
@endpush

@push('js-scripts')
  <script src="{{ asset('./js/admin/select2.min.js') }}"></script>
  <script src="{{ asset('./js/admin/bootstrap-datepicker.js') }}"></script>
@endpush

@push('js')
<script type="application/javascript">
  CKFinder.setupCKEditor();
  CKEDITOR.replace( 'editor1' );
  $(function () {
    $('.select2').select2({
      tags: true
    });
    $('#pickerDate').datepicker({
      timePicker: true,
      timePickerIncrement: 30,
      autoclose: true,
    })
  });
</script>
@endpush
