@extends('../../layouts.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Usuarios</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
          <li class="breadcrumb-item active">Editar</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
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
        <div class="col-6">
          <div class="card card-dark card-outline">
            <div class="py-2 px-3"><h4>Editar Usuario</h4></div>
            <div class="card-body">
              <form method="POST" class="forms-sample" enctype="multipart/form-data" action="{{ route('admin.users.update', $user) }}" autocomplete="off">
                @csrf @method('PUT')
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user mr-2"></i><strong>Nombre</strong></span>
                  </div>
                  <input type="text" 
                    class="form-control" 
                    placeholder="Nombre" 
                    name="name"
                    value="{{ old('name', $user->name) }}">
                </div>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user mr-2"></i><strong>Apellido</strong></span>
                  </div>
                  <input type="text" 
                    class="form-control" 
                    placeholder="Apellido" 
                    name="lastname"
                    value="{{ old('lastname', $user->lastname) }}">
                </div>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope mr-2"></i><strong>Correo</strong></span>
                  </div>
                  <input type="email" 
                    class="form-control" 
                    placeholder="Correo" 
                    name="email"
                    value="{{ old('email', $user->email) }}">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-key mr-2"></i><strong>Contraseña</strong></span>
                  </div>
                  <input type="password" 
                    class="form-control" 
                    placeholder="******" 
                    name="password">
                </div>
                <small class="text-muted">Ingresa tu contraseña solo si quieres cambiarla</small>
                <div class="input-group mb-2 mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-key mr-2"></i><strong>Repetir Contraseña</strong></span>
                  </div>
                  <input type="password" 
                    class="form-control"
                    placeholder="******" 
                    name="password_confirmation">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-image mr-2"></i><strong>Avatar</strong></span>
                  </div>
                  <input type="file" class="form-control" name="avatar" value="{{ old('avatar') }}">
                </div>
                <small class="text-muted">La foto de perfil de ser de 150x150 pixeles</small>
                <button type="submit" class="btn btn-success btn-block mt-4 mr-2">Guardar</button>
              </form>
            </div>
          </div>
        </div>

        @role('Administrador')
        <div class="col-6">
          <div class="card card-dark card-outline">
            <div class="py-2 px-3"><h4>Roles</h4></div>
            <div class="card-body">
              <form method="POST" autocomplete="off" action="{{ route('admin.users.roles.update', $user) }}">
              @csrf @method('PUT')
                @foreach ($roles as $role)
                  <div>
                    <input type="checkbox" 
                      class="minimal"
                      name="roles[]" 
                      value="{{ $role->id }}" 
                      {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                      <strong>{{ $role->name }}</strong> <br>
                      <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
                  </div>
                @endforeach
                <button type="submit" class="btn btn-primary btn-block mt-3">Actualizar Roles</button>
              </form>
            </div>
          </div>
          <div class="card card-dark card-outline">
            <div class="py-2 px-3"><h4>Roles</h4></div>
            <div class="card-body">
              <form method="POST" autocomplete="off" action="{{ route('admin.users.permissions.update', $user) }}">
              @csrf @method('PUT')
                @foreach ($permissions as $id => $name)
                  <div>
                    <input type="checkbox" 
                      class="minimal"
                      name="permissions[]" 
                      value="{{ $id }}" 
                      {{ $user->permissions->contains($id) ? 'checked' : '' }}>
                      <strong>{{ $name }}</strong>
                  </div>
                @endforeach
                <button type="submit" class="btn btn-primary btn-block mt-3">Actualizar Permisos</button>
              </form>
            </div>
          </div>
        </div>
        @else
        <div class="col-6">
          <div class="card card-dark card-outline">
            <div class="card-body">
              @foreach ($user->roles as $role)
                <div>
                  <input type="checkbox" 
                    class="minimal"
                    value="{{ $role->id }}" 
                    {{ $user->roles->contains($role->id) ? 'checked' : '' }}
                    disabled>
                    <strong>{{ $role->name }}</strong> <br>
                    <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        @endrole
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