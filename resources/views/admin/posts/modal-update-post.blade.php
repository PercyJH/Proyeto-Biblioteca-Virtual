<div class="modal fade" id="modal-update-post-{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Editar Libro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                
                    <div class="form-group">
                        <label for="title">Nombre</label>
                        <input type="text" name="title" id="post" class="form-control" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="category-id">Categoría</label>
                        <select name="category_id" class="form-control" id="category-id">
                            <option value="{{$post->category_id}}">-- {{ $post->category->name }} --</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">-- {{$category->name}} --</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Reseña</label>
                        <textarea type="text" name="content" id="content" class="form-control">{{$post->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="author">Autor</label>
                        <input type="text" name="author" id="author" class="form-control"  value="{{$post->author}}">
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