<div class="table-responsive" id="table_list_role"  data-action="{{route('role.table')}}" >
    <table class="table table-hover"   >
        <thead class="text-primary">
        <th>#</th>
        <th>Name</th>
        <th>Display name</th>
        <th>Active</th>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{ $role->name }}</td>
                <td>{{$role->display_name}}</td>
                <td>
                    <a id="edit_role"
                       data-action="{{route('role.getBy',['id'=>$role->id])}}"
                       data-url="{{route('role.update',['id'=>$role->id])}}"
                       class="btn btn-success" data-toggle="modal"
                       data-target="#exampleModal1">Edit</a>
                    <a id="btn_delete_role"
                       data-action="{{route('role.destroy',$role->id)}}"
                       class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $roles ->links() }}

</div>
