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
          <li class="breadcrumb-item active">Curriculum</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      @foreach($careers as $career)
      <div class="col-12">
        <div class="callout callout-warning">
          <h5><i class="fa fa-info"></i> Nota:</h5>
          Esta página muestra los datos de la página Sobre Mí, para modificar algún dato haga clic en <a href="{{ route('admin.cv.edit', $career->id) }}" class="text-primary" style="text-decoration:none;">Editar Curriculum</a>
        </div>

        <div class="invoice p-3 mb-3">
          <div class="d-flex justify-content-end"><a href="{{ route('admin.cv.edit', $career->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt mr-2"></i>Editar Curriculum</a></div>
          <div class="d-flex justify-content-center">
            <img class="img-fluid img-circle p-1 bg-light shadow-lg" src="{{ asset($career->photo)}}" width="300px" alt="{{ $career->title}}">
          </div>
          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fa fa-info mr-2"></i>{{ $career->title }}
                <small class="float-right">Actualizado: {{ $career->updated_at->diffForHumans() }}</small>
              </h4>
            </div>
          </div>

          <div class="row invoice-info">
            <div class="col-12 invoice-col">
              <p class="px-3">{{ $career->description }}</p>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fa fa-info mr-2"></i>{{ $career->subtitle }}
              </h4>
            </div>
          </div>

          <div class="row invoice-info">
            <div class="col-12 invoice-col">
              <p class="px-3">{!! $career->content !!}</p>
            </div>
          </div>

          <div class="row no-print">
            <div class="col-12">
              <a href="{{ route('download', $career) }}" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Descargar CV
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection