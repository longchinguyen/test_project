<!-- Modal -->
<div id="modal-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_update_product" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input  class="form-control name"  placeholder="Name" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input  class="form-control price"  placeholder="Price" name="price" id="price">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input  class="form-control quantity"  placeholder="Quantity" name="quantity" id="quantity">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input  class="form-control description"  placeholder="Description" name="description" id="description">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload image</label>
                        <br>
                        <img src="#" id="target" alt="your image" class="img img-thumbnail imageThum" width="100" height="100" lign="center">
{{--                        <img id="output" src="" width="100" height="100">--}}
{{--                        <input name="photo" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">--}}
{{--                        <input id="image" type="file" name="image" class="form-control-file" onchange="readURL(this);" >--}}
                        <input id="src" type="file" name="image" class="form-control-file"/> <!-- input you want to read from (src) -->
{{--                        <img id="target"/> <!-- image you want to display it (target) -->--}}
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary" id="btn_update_product" data-action="products.update">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
