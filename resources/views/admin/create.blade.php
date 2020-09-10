<!-- Modal -->
<div  class="modal fade" id="open_modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.store')}}" id="form_create_product">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input  class="form-control"  placeholder="Name" name="name" id="create_name">
                        <div id="name_error" class="mt-3 alert alert-danger" style="display: none"></div>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input  class="form-control"  placeholder="Price" name="price" id="create_price">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input  class="form-control"  placeholder="Quantity" name="quantity" id="create_quantity">
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label>User_id</label>--}}
{{--                        <input  class="form-control"  placeholder="User_id">--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label>Description</label>
                        <input  class="form-control"  placeholder="Description" name="description" id="create_description">
                    </div>
                    <button id ="btn_create_product" type="button" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
