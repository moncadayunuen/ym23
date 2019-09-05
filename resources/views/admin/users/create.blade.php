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
          <li class="breadcrumb-item active">Crear</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">

        <div class="offset-3 col-6">
          <div class="card card-dark card-outline">
            <div class="py-2 px-3"><h4>Crear Usuario</h4></div>
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
              <form method="POST" class="forms-sample" action="{{ route('admin.users.store') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user mr-2"></i><strong>Nombre</strong></span>
                  </div>
                  <input type="text" 
                    class="form-control" 
                    placeholder="Nombre" 
                    name="name"
                    value="{{ old('name') }}">
                </div>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user mr-2"></i><strong>Apellido</strong></span>
                  </div>
                  <input type="text" 
                    class="form-control" 
                    placeholder="Apellido" 
                    name="lastname"
                    value="{{ old('lastname') }}">
                </div>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope mr-2"></i><strong>Correo</strong></span>
                  </div>
                  <input type="email" 
                    class="form-control" 
                    placeholder="Correo" 
                    name="email"
                    value="{{ old('email') }}">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-image mr-2"></i><strong>Avatar</strong></span>
                  </div>
                  <input type="file" class="form-control" name="avatar" value="{{ old('avatar') }}">
                </div>
                <small class="text-muted">La foto de perfil de ser de 150x150 pixeles</small>
                <div class="row py-2">
                  <div class="col-6">
                      @foreach ($roles as $role)
                        <div>
                          <input type="checkbox" 
                            class="minimal"
                            name="roles[]" 
                            value="{{ $role->name }}">
                            <strong>{{ $role->name }}</strong> <br>
                            <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
                        </div>
                      @endforeach
                  </div>
                  <div class="col-6">
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
                  </div>
                </div>
                <small class="text-muted"><strong>*</strong> La contraseña se enviará al correo registrado</small>
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