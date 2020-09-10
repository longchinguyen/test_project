@extends('admin.master');

@section('content')
    <div class = "row">
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <button  id="btn_create" type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="position: relative;top:-30px">
                Create
            </button>
            <div class="card">
                <div class="card-header text-center">
                    <h2>Products</h2>
                </div>
                @include('admin.create')
                @include('admin.update')
                <div class="card-body">
                    <div class="table-responsive" id="table_product" data-url="{{route('product.table')}}">
{{--                        <table class="table table-hover">--}}
{{--                            <thead class="text-primary">--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Price</th>--}}
{{--                                <th>Quantity</th>--}}
{{--                                <th>User_id</th>--}}
{{--                                <th>Description</th>--}}
{{--                                <th>Edit</th>--}}
{{--                                <th>Delete</th>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                                @foreach($products as $product)--}}
{{--                                     <tr>--}}
{{--                                         <td>{{$product->id}}</td>--}}
{{--                                        <td>{{ $product->name }}</td>--}}
{{--                                        <td>{{ $product->price }}</td>--}}
{{--                                         <td>{{ $product->user_id }}</td>--}}
{{--                                        <td>{{ $product->quantity }}</td>--}}
{{--                                        <td>{{ $product->description }}</td>--}}
{{--                                        <td>--}}
{{--                                            <a  id="btn_open_modal_update" data-action="{{route('product.getData',['id'=>$product->id])}}" data-url="{{route('product.update',['id'=>$product->id])}}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">Edit</a>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="" class="btn btn-danger">Delete</a>--}}
{{--                                        </td>--}}
{{--                                     </tr>--}}
{{--                                @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection

@section('js')
    <script src="admin/product/index.js"></script>
@endsection

