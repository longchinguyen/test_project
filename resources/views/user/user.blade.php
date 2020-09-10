@extends('admin.master');
@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <button id="btn_create" type="button" class="btn btn-primary" data-action="{{route('user.index')}}" data-toggle="modal" data-target="#exampleModal"
                    style="position: relative;top:-30px">
                Create
            </button>
            @include('user.create')
            <div class="card" >
                <div class="card-header text-center">
                    <h2>Users</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="table_user" >
                        <table class="table table-hover">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>

                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a id="btn_open_modal_update"
{{--                                           data-action="{{route('user.getData',['id'=>$product->id])}}"--}}
{{--                                           data-url="{{route('product.update',['id'=>$product->id])}}"--}}
                                           class="btn btn-success" data-toggle="modal"
                                           data-target="#exampleModal1">Edit</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-danger">Delete</a>
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
@endsection
@section('ujs')
    <script src="admin/user/u_index.js"></script>
@endsection
