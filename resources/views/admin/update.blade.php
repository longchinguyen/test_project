<!-- Modal -->
<div id="modal-update" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_update_product">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input  class="form-control"  placeholder="Name" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input  class="form-control"  placeholder="Price" name="price" id="price">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input  class="form-control"  placeholder="Quantity" name="quantity" id="quantity">
                    </div>
                    {{--                    <div class="form-group">--}}
                    {{--                        <label>User_id</label>--}}
                    {{--                        <input  class="form-control"  placeholder="User_id">--}}
                    {{--                    </div>--}}
                    <div class="form-group">
                        <label>Description</label>
                        <input  class="form-control"  placeholder="Description" name="description" id="description">
                    </div>
                    <button type="button" class="btn btn-primary" id="btn_update_product">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
