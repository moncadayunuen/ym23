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
          <li class="breadcrumb-item active">Mostrar</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-4 col-md-6 col-12">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{ asset($user->avatar)}}" alt="Foto de perfil de usuario">
            </div>

            <h3 class="profile-username text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$user->name }}</font></font></h3>

            <p class="text-muted text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ingeniero de software</font></font></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Correo </font></font></b> <a class="float-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $user->email }}</font></font></a>
              </li>
              <li class="list-group-item">
                <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicaciones </font></font></b> <a class="float-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $user->posts->count()}}</font></font></a>
              </li>
              <li class="list-group-item">
                <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Amigos </font></font></b> <a class="float-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">13,287</font></font></a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Seguir</font></font></b></a>
          </div>

        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-12">
        <div class="card card-primary card-outline">
          <div class="card-header with-border">
            <h4 class="box-title">Publicaciones</h4>
          </div>
          <div class="card-body d-flex flex-column">
            @forelse ($user->posts as $post)
              <a href="{{ route('blog.show', $post) }}" target="_blank">
                <strong>{{ $post->title }}</strong>
              </a>
              <small class="text-muted">Publicado el {{ $post->published_at->format('m/d/Y') }}</small>
              <p class="text-muted">{{ $post->description }}</p>
              @unless ($loop->last)
                  <hr>
              @endunless
            @empty
              <small class="text-muted">No tiene publicaciones hechas</small>
            @endforelse
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-12">
        <div class="card card-primary card-outline">
          <div class="card-header with-border">
            <h4 class="box-title">Roles de Usuario</h4>
          </div>
          <div class="card-body d-flex flex-column">
            @foreach ($user->roles as $role)
                <strong>{{ $role->name }}</strong>
              @if ($role->permissions->count())
                <small class="text-muted">Permisos {{ $role->permissions->pluck('name')->implode(', ') }}</small>
              @endif
              @unless ($loop->last)
                  <hr>
              @endunless
            @endforeach
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection