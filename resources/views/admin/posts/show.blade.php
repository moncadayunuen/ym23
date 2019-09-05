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
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-primary d-flex justify-content-between">
            <h4>Ver publicación</h4>
            <a href="{{ route('admin.posts.edit' , $post->url) }}" class="btn btn-warning">Editar<i class="fa fa-pencil-alt ml-2"></i></a>
          </div>
          <div class="card-body">
            <form>
              <div class="row">

                <div class="col-md-6 col-12">

                  <div class="form-group">
                    <label for="title">Titulo de Publicación</label>
                    <input type="text" class="form-control" id="title" placeholder="Titulo" value="{{ old('title', $post->title) }}" readonly>
                  </div>

                  <div class="form-group">
                    <label for="category">Fecha de publicación</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control date" data-provide="datepicker" value="{{ optional($post->published_at)->format('M d Y') }}" readonly>
                    </div>
                  </div>

                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="description" rows="4" placeholder="...escribe algo" readonly>{{old('description',  $post->description) }}</textarea>
                  </div>
                </div>

              </div>

              <div class="row">

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="category">Categoría</label>
                    <select class="form-control" id="category" readonly>
                        <option>{{ old('category_id', $post->category->name) }}</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-6 col-12">
                  <label for="title">Tags</label>
                  <select class="form-control select2"
                    multiple="multiple"
                    data-placeholder="Elige las etiquetas necesarias" 
                    readonly>
                    @foreach($tags as $tag)
                      <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                  </select>
                </div>
  
              </div>
              
              <div class="form-group">
                <label for="editor1">Contenido</label>
                <textarea class="form-control" id="editor1" rows="8" name="content" readonly>{{ old('content', $post->content) }}</textarea>
              </div>

              <div class="row">

                <div class="col-12 mb-3">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="{{ old('thumbnail', $post->thumbnail) }}" readonly>
                    </div>
                    <div class="input-group-append">
                      <button class="input-group-text" id="">Thumbnail</button>
                    </div>
                  </div>
                </div>

              </div>
              <a href="{{ route('admin.posts.index') }}" class="btn btn-danger btn-block mr-2">Regresar</a>
            </form>
          </div>
        </div>
        </div>
    </div>
  </div>
</div>
@endsection


@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/admin/select2.min.css') }}">
@endpush

@push('ckeditor-script')
  <script src="{{ asset('./js/ckeditor/ckeditor.js') }}"></script>
@endpush

@push('js-scripts')
  <script src="{{ asset('./js/admin/select2.min.js') }}"></script>
@endpush

@push('js')
<script type="application/javascript">
  CKEDITOR.replace( 'editor1' );
  $(function () {
    $('.select2').select2();
  });
</script>
@endpush