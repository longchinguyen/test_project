<div class="table-responsive" id="table_list_category"  data-action="{{route('category.table')}}" >
    <table class="table table-hover"   >
        <thead class="text-primary">
        <th>#</th>
        <th>Name</th>
        <th>Active</th>
        </thead>
        <tbody>
        @foreach($categores as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a id="edit_category"
                       data-action="{{route('category.getBy',$category->id)}}"
                       data-url="{{route('category.update',$category->id)}}"
                       class="btn btn-success" data-toggle="modal"
                       data-target="#exampleModal1">Edit</a>
                    <a id="btn_delete_category"
                       data-action="{{route('category.destroy',$category->id)}}"
                       class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        {{$categores->links()}}
</div>
