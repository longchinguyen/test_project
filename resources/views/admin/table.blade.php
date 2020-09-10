<div class="table-responsive" id="table_product" data-url="{{route('product.table')}}">
    <table class="table table-hover">
        <thead class="text-primary">
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a  id="btn_open_modal_update" data-action="{{route('product.getData',['id'=>$product->id])}}" data-url="{{route('product.update',['id'=>$product->id])}}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">Edit</a>
                </td>
                <td>
                    <a id="btn_delete" data-action= "{{route('product.delete',['id'=>$product->id])}}"   class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
