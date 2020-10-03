<div class="table-responsive" id="table_list_user">
    <table class="table table-hover">
        <thead class="text-primary">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Active</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{ $user->name }}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a id="btn_open_modal_update"
                       data-action="{{route('user.getData',['id'=>$user->id])}}"
                       data-url="{{route('user.update',['id'=>$user->id])}}"
                       class="btn btn-success" data-toggle="modal"
                       data-target="#exampleModal1">Edit</a>
                </td>
                <td>
                    <a id="btn_delete_user" data-action="{{route('user.destroy',['id'=>$user->id])}}"
                       class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
</div>
