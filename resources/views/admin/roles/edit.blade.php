@extends('../../layouts.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Roles de Usuarios</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Roles de Usuarios</a></li>
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
            <div class="py-2 px-3"><h4>Editar Role</h4></div>
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
            <div class="card-body">
              <form method="POST" class="forms-sample" action="{{ route('admin.roles.update', $role) }}" autocomplete="off">
                @csrf @method('PUT')
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><strong>Nombre de role</strong></span>
                  </div>
                  <input type="text" 
                    class="form-control" 
                    placeholder="Role" 
                    name="name"
                    value="{{ old('name', $role->name) }}">
                </div>
                <strong>Permisos</strong>
                <div class="col-12">
                    @foreach ($permissions as $id => $name)
                      <div>
                        <input type="checkbox" 
                          class="minimal"
                          name="permissions[]" 
                          value="{{ $id }}" 
                          {{ collect(old('permissions'))->contains($name) ? 'checked' : '' }}
                          {{ $role->permissions->contains($id) ? 'checked' : '' }}>
                          <strong>{{ $name }}</strong>
                      </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success btn-block mt-4 mr-2">Guardar</button>
              </form>
            </div>
          </div>
        </div>

    </div>
  </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('./css/admin/i-check-all.css') }}">
@endpush

@push('js-scripts')
<script src="{{ asset('./js/admin/icheck.min.js') }}"></script>
@endpush

@push('js')
<script>
$(function () {
  $('input').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
  })
})
</script>
@endpush