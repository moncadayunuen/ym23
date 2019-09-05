@extends('../../layouts.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Proyectos</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Proyectos</a></li>
          <li class="breadcrumb-item active">Crear</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <form method="POST" autocomplete="off" enctype="multipart/form-data">
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
            <h3>Info</h3>
          </div>
          <div class="card-body">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><strong>Nombre</strong></span>
              </div>
              <input type="text" 
                class="form-control" 
                placeholder="Nombre" 
                name="title"
                value="{{ old('name', $project->title) }}">
            </div>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text"><strong>Descripción</strong></span>
              </div>
              <input type="text" 
                class="form-control" 
                placeholder="Descripción" 
                name="description"
                value="{{ old('description', $project->description) }}">
            </div>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text"><strong>Cliente</strong></span>
              </div>
              <input type="text" 
                class="form-control" 
                placeholder="Cliente" 
                name="client"
                value="{{ old('client', $project->client) }}">
            </div>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text"><strong>Sitio Web</strong></span>
              </div>
              <input type="text" 
                class="form-control" 
                placeholder="https://" 
                name="website"
                value="{{ old('website', $project->website) }}">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-12">
        <div class="card card-dark card-outline">
          <div class="card-body">
            
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text"><strong>Fecha</strong></span>
              </div>
              <input type="text" 
                class="form-control"
                id="pickerDate"
                placeholder="Fecha" 
                name="created"
                value="{{ old('date', $project->created) }}">
            </div>
            <div class="form-group mb-2">
            <select class="select2" data-tags="true" name="category_id" style="width:100%;">
              @foreach($categories as $category)
                <option value="" selected="selected">Selecciona una categoría</option>
                <option {{ old('category_id', $project->category_project_id) == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            </div>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text"><strong>Thumbnail</strong></span>
              </div>
              <input type="file" 
                class="form-control" 
                name="thumbnail"
                value="{{ old('thumbnail') }}">
            </div>
            <small class="text-muted">Las dimensiones son de 460x530 pixeles</small>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="card card-dark card-outline">
          <div class="py-2 px-3">
            <h3>Contenido del proyecto</h3>
          </div>
          <div class="card-body">
              <div class="form-group mb-2">
                <textarea class="form-control" id="editor1" rows="2" name="content">{{ $project->content }}</textarea>
                @include('ckfinder::setup')
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
  CKEDITOR.replace('editor1');
  $(function () {
    $('.select2').select2({
      tags: true,
    });
    $('#pickerDate').datepicker({
      timePicker: true,
      timePickerIncrement: 30,
      autoclose: true,
    })

  });
  
</script>
@endpush