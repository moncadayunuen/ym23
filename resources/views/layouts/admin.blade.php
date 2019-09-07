<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/fav.png')}}">
    @stack('ckeditor-script')
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('./css/admin/adminlte.css') }}">
    <script src="https://kit.fontawesome.com/9fa0f078e1.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i> Menú</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn"><i class="fa fa-sign-out-alt mr-2"></i>Salir</button>
        </form>
      </li>
    </ul>

  </nav>

  <aside class="main-sidebar sidebar-light-warning elevation-4">

    <a href="{{ route('admin.index') }}" class="brand-link">
      <img src="{{ asset('img/fav.png') }}" alt="YM23 Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">YM23</span>
    </a>

    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset(auth()->user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.users.edit', auth()->user()) }}" class="d-block">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
              <i class="fas fa-home"></i> <p>Inicio</p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            @can('Ver usuarios')
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <i class="nav-icon fa fa-dashboard"></i><p>Usuarios<i class="right fa fa-angle-left"></i></p>
            </a>
            @endcan
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.users.edit', auth()->user()) }}" class="nav-link">
                  <i class="fa fa-pencil-alt nav-icon"></i><p>Mi usuario</p>
                </a>
              </li>
              @can('Ver usuarios')
              <li class="nav-item {{ request()->is('admin/usuarios') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/usuarios') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p>Ver Usuarios</p>
                </a>
              </li>
              @endcan
              @can('Crear usuarios')
              <li class="nav-item {{ request()->is('admin/usuarios/crear') ? 'active' : '' }}">
                <a href="{{ route('admin.users.create') }}" class="nav-link {{ request()->is('admin/usuarios/crear') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p>Crear Usuario</p>
                </a>
              </li>
              @endcan
              @can('Ver roles')
              <li class="nav-item {{ request()->is('admin/roles') ? 'active' : '' }}">
                <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->is('admin/roles') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p>Ver roles</p>
                </a>
              </li>
              @endcan
              @can('Crear roles')
              <li class="nav-item {{ request()->is('admin/roles/crear') ? 'active' : '' }}">
                <a href="{{ route('admin.roles.create') }}" class="nav-link {{ request()->is('admin/roles/crear') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p>Crear Rol</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @can('Ver curriculum')
          <li class="nav-item">
            <a href="{{ route('admin.cv.index') }}" class="nav-link {{ request()->is('admin/curriculum') ? 'active' : '' }}">
              <i class="far fa-address-book mr-2"></i><p>Curriculum</p>
            </a>
          </li>
          @endcan
          <li class="nav-item has-treeview menu-open">
            @can('Ver proyectos')
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-clipboard-check"></i>
              <i class="nav-icon fa fa-dashboard"></i><p>Proyectos<i class="right fa fa-angle-left"></i></p>
            </a>
            @endcan
            <ul class="nav nav-treeview">
              @can('Ver categorias de proyectos')
              <li class="nav-item">
                <a href="{{ route('admin.projects.categories.index') }}" class="nav-link">
                  <i class="far fa-circle mr-2"></i></i><p>Ver categorías</p>
                </a>
              </li>
              @endcan
              @can('Ver proyectos')
              <li class="nav-item">
                <a href="{{ route('admin.projects.index') }}" class="nav-link">
                  <i class="far fa-circle mr-2"></i></i><p>Ver proyectos</p>
                </a>
              </li>
              @endcan
              @can('Crear proyectos')
              <li class="nav-item {{ request()->is('admin/usuarios') ? 'active' : '' }}">
                <a href="{{ route('admin.projects.create') }}" class="nav-link">
                  <i class="far fa-circle mr-2"></i> <p>Crear proyecto</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          
          <li class="nav-item has-treeview menu-open">
            @can('Crear publicaciones')
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-wpforms"></i>
              <i class="nav-icon fa fa-dashboard"></i><p>Blog<i class="right fa fa-angle-left"></i></p>
            </a>
            @endcan
           
            <ul class="nav nav-treeview">
              @can('Ver categorías')
              <li class="nav-item {{ request()->is('admin/categorias') ? 'active' : '' }}">
                <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->is('admin/publicaciones/categorias') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p>Ver Categorías</p>
                </a>
              </li>
              @endcan
              @can('Crear categorías')
              <li class="nav-item {{ request()->is('admin/categorias/crear') ? 'active' : '' }}">
                <a href="{{ route('admin.categories.create') }}" class="nav-link {{ request()->is('admin/publicaciones/categorias/crear') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p>Crear Categoría</p>
                </a>
              </li>
              @endcan
              @can('Ver tags')
              <li class="nav-item {{ request()->is('admin/tags') ? 'active' : '' }}">
                <a href="{{ route('admin.posts.tags.index') }}" class="nav-link {{ request()->is('admin/publicaciones/tags') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p>Ver tags</p>
                </a>
              </li>
              @endcan
              @can('Ver publicaciones')
              <li class="nav-item {{ request()->is('admin/publicaciones') ? 'active' : '' }}">
                <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->is('admin/publicaciones') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p>Ver publicaciones</p>
                </a>
              </li>
              @endcan
              @can('Crear publicaciones')
              <li class="nav-item {{ request()->is('admin/publicaciones/crear') ? 'active' : '' }}">
                <a href="{{ route('admin.posts.create') }}" class="nav-link {{ request()->is('admin/publicaciones/crear') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p>Crear Publicación</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" 
              class="nav-link"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt nav-icon"></i> <p>Cerrar sesión</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>

    </div>

  </aside>


  <div class="content-wrapper">
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check"></i> !Hecho!</h5>
        {{ session('success') }}
      </div>
    @endif
    @yield('content')
  </div>

  <footer class="main-footer">

    <div class="float-right d-none d-sm-inline">Anything you want</div>
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>

  <script src="{{ asset('./js/jquery.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="{{ asset('./js/admin/bootstrap.min.js') }}"></script>
  @stack('js-scripts')
  <script src="{{ asset('./js/admin/adminlte.js') }}"></script>
  @stack('js')
</body>
</html>