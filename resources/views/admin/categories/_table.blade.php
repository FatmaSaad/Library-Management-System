
<table class="table table-striped- table-bordered table-hover table-checkable datatable">
    <thead>
    <tr>
        <th>#</th>
        <th>name</th>
        <th>settings</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{!!$loop->iteration!!}</td>
            <td>{!!$category->name!!}</td>

            <td>
                 <div class="row">
                    <a href="{!!route('admin.categories.edit',$category->id)!!}" class="btn btn-primary"> <i class="fas fa-pen"></i> edit</a>
                    <form method="POST" action="{!!route('admin.categories.destroy',$category->id)!!}">
                        @csrf() @method('delete')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                            delete
                        </button>
                    </form>
                </div>

            </td>

        </tr>
    @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>
