@extends('../../layouts.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Categorías</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Inicio</a></li>
          <li class="breadcrumb-item">Categorías</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-end">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary"><i class="fa fa-list-alt mr-2"></i>Nueva Categoría</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="dataTable" class="table table-hover">
                <thead>
                  <tr>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Opciones <i class="ti-settings"></i></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td class="d-flex justify-content-center align-items-center">
                      <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary badge badge-primary mx-1"><i class="fa fa-pencil-alt mr-1"></i> Editar</a>
                      <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger badge badge-danger mx-1"><i class="fa fa-trash-alt mr-1"></i> Eliminar</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/admin/dataTables.bootstrap4.css') }}">
@endpush

@push('js-scripts')
  <script src="{{ asset('./js/admin/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('./js/admin/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('js')
<script>
  $(function () {
    $('#dataTable').DataTable({
        "language": {
          "processing":     "Procesando...",
          "lengthMenu":    "Mostrar _MENU_ registros",
          "search": "Buscar:",
          "emptyTable": "No hay registros",
          "paginate": {
            "first":      "Primero",
            "previous":   "Anterior",
            "next":       "Siguiente",
            "last":       "Último"
          },
          "info":           " _TOTAL_ registros",
          "infoEmpty":      " 0 registros",
          "infoFiltered":   "(Filtro de _MAX_ total de registros)",
          "infoPostFix":    "",
          "loadingRecords": "Cargando...",
          "zeroRecords":    "No se encontraron registros relacionados",
          "aria": {
              "sortAscending":  ": Activa para ordenar la columna en orden ascendente",
              "sortDescending": ": Activa para ordenar la columna en orden descendente"
          }
        }
    });
  });
</script>
@endpush