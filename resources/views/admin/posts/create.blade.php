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
          <li class="breadcrumb-item active">Crear</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    
    <form method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
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
            <h4>Crea una nueva publicación</h4> 
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="title">Titulo de Publicación</label>
              <input type="text" class="form-control" id="title" placeholder="Titulo" name="title" value="{{ old('title') }}">
            </div>

            
            <div class="form-group">
              <label for="description">Descripción</label>
              <textarea class="form-control" id="description" rows="4" placeholder="...escribe algo" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
              <label for="editor1">Contenido</label>
              <textarea class="form-control" id="editor3" rows="8" name="content">{{ old('content') }}</textarea>
              @include('ckfinder::setup')
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="card card-dark card-outline">
          <div class="card-body">
            <div class="form-group">
                <label for="category">Selecciona una fecha de publicación:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" class="form-control float-right" id="pickerDate" name="published_at" value="{{ old('published_at') }}">
                </div>
              </div>

              <div class="form-group">
                <label for="title">Tags</label>
                <select class="form-control select2" 
                  multiple="multiple" 
                  data-placeholder="Selecciona un tag" 
                  style="width: 100%;" 
                  name="tags[]">
                  @foreach($tags as $tag)
                    <option {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
                </select>  
              </div>


              <div class="form-group">
                  <label for="category">Selecciona una categoría</label>
                  <select class="form-control" id="category" name="category_id" value="{{ old('category_id') }}">
                    <option value='' selected="selected">Selecciona una categoría</option>
                    @foreach($categories as $category)
                      <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Selecciona una imagen</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                </div>
                <div class="alert alert-warning alert-dismissible mt-3">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-info"></i>Subida de imagen</h5>
                  <p><strong>Dimensiones de imagen:</strong> 1200 x 628</p>
                  <p><strong>Peso máximo:</strong> 1mb</p>
                </div>
    
                <button type="submit" class="btn btn-success btn-block mr-2">Guardar</button>
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
  CKEDITOR.replace( 'editor3' );

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