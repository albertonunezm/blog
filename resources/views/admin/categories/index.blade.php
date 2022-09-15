@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Categorías</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary float-right btn-sm" href="{{ route('admin.categories.create') }}">Agregar Categoría</a>
        </div>

        <div class="card-body">
            <table id="categories" class="table table-striped dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>               
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category) }}">Editar</a>

                                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" style="display: inline-block;">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script>
        $('#categories').DataTable({
            responsive: true,
            autoWidth: false,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "¡No existen registros!",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "¡No existen registros!",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next" : "Siguiente",
                    "previous": "Anterior"
                }
        }
        });
    </script>
@stop
