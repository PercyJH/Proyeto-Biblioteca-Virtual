@extends('adminlte::page')

@section('title','Admin - Libros')

@section('content_header')
    <h1>
        Libros
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-post">
            Crear
        </button>
    </h1>
@endsection

@section('css')

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Libros</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="posts" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Libro</th>
                            <th>Categoría</th>
                            <th>Reseña</th>
                            <th>Autor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->author }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-post-{{$post->id}}">
                                    Editar
                                </button>
                                <form action="{{route('admin.posts.delete', $post->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <!-- UPDATE -->
                        @include('admin.posts.modal-update-post')
                        <!-- /.UPDATE -->
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Libro</th>
                            <th>Categoría</th>
                            <th>Reseña</th>
                            <th>Autor</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- INSERT -->
<div class="modal fade" id="modal-create-post">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Libro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>



            <form action="{{ route('admin.posts.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                
                    <div class="form-group">
                        <label for="title">Nombre</label>
                        <input type="text" name="title" id="post" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category-id">Categoría</label>
                        <select name="category_id" class="form-control" id="category-id">
                            <option>-- Elegir categoría --</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">-- {{$category->name}} --</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Reseña</label>
                        <textarea type="text" name="content" id="content" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="author">Autor</label>
                        <input type="text" name="author" id="author" class="form-control">
                    </div>
                </div>


            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline-primary">Guardar</button>
            </div>
        </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.INSERT -->

@endsection

@section('js')
<script>
$(document).ready(function() {
    $('#posts').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@endsection