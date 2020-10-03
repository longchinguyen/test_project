<div class="table-responsive" id="table_product" data-url="{{route('products.table')}}">
    <table class="table table-hover">
        <thead class="text-primary">
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Image</th>
        <th>Active</th>

        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->description }}</td>
                <td><img src="{{URL::to('/')}}/images/{{$product->image}}" class="img-thumbnail" width="75" alt=""></td>
                <td>
                    <a id="btn_open_modal_update" data-action="{{route('products.show',['id'=>$product->id])}}"
                       data-url="{{route('products.update',['id'=>$product->id])}}" class="btn btn-success"
                       data-toggle="modal" data-target="#exampleModal1">Edit</a>
                    <a id="btn_delete" data-action="{{route('products.delete',['id'=>$product->id])}}"
                       class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!!  $products->appends(Request::only(['name','quantity'=>'marker']))->render() !!}
</div>


