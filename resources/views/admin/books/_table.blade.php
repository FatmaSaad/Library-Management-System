
<table class="table table-striped- table-bordered table-hover table-checkable datatable">
    <thead>
    <tr>
        <th>#</th>
        <th>image</th>
        <th>Book</th>
        <th>Description</th>
        <th>Category</th>
        <th>price</th>
        <th>quantity</th>
        <th>auther</th>
        <th>Edits</th>
    </tr>
    </thead>
    <tbody>
    @foreach($books as $book)

        <tr>
            <td>{!! $loop->iteration !!}</td>
            <td><img src="{!! asset($book->image )!!}" width="100" height="100"></td>
            <td>{!! $book->name!!}</td>
            <td>{!! $book->description!!}</td>
            <td>{!! optional($book->Category)->name!!}</td>
            <td>{!! $book->price!!}</td>
            <td>{!! $book->quantity!!}</td>
            <td>{!! $book->auther!!}</td>

            <td>
                <div class="row">

                    <a href="{!!route('admin.books.edit',$book->id)!!}" class="btn btn-primary"> <i class="fas fa-pen"></i>
                    Edit</a>
                    <form method="POST" action="{!!route('admin.books.destroy',$book->id)!!}">
                        @csrf() @method('delete')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                            Delete
                        </button>
                    </form>
                </div>
            </td>

        </tr>
    @endforeach
    </tbody>

</table>
