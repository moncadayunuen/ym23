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
          <li class="breadcrumb-item active">Crear</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">

        <div class="col-6">
          <div class="card card-dark card-outline">
            <div class="py-2 px-3"><h4>Crear Role</h4></div>
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
              <form method="POST" class="forms-sample" action="{{ route('admin.roles.store') }}" autocomplete="off">
                @csrf
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><strong>Nombre de role</strong></span>
                  </div>
                  <input type="text" 
                    class="form-control" 
                    placeholder="Role" 
                    name="name"
                    value="{{ old('name') }}">
                </div>
                <strong>Permisos</strong>
                <div class="col-12">
                    @foreach ($permissions as $id => $name)
                      <div>
                        <input type="checkbox" 
                          class="minimal"
                          name="permissions[]" 
                          value="{{ $id }}" 
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

        <div class="col-md-6">
          <div class="card card-dark card-outline">
            <div class="py-2 px-3"><h4>Crear Permiso</h4></div>
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
              <form method="POST" class="forms-sample" action="{{ route('admin.users.permissions.store') }}" autocomplete="off">
                @csrf
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><strong>Nombre de permiso</strong></span>
                  </div>
                  <input type="text" 
                    class="form-control" 
                    placeholder="Permiso" 
                    name="name"
                    value="{{ old('permission') }}">
                </div>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><strong>Nombre de guardia</strong></span>
                  </div>
                  <select class="form-control" name="guard_name">
                    @foreach (config('auth.guards') as $guardName => $guard)
                        <option {{ old('guard_name') === $guardName ? 'selected' : '' }} value="{{ $guardName }}">{{ $guardName }}</option>
                    @endforeach
                  </select>
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