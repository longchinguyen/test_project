<div  class="modal fade" id="open_update_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_category" method="post">
                    @csrf
                    @method('put')
                    <div class="form-update-group">
                        <label>Name</label>
                        <input  class=" form-control name_category"  placeholder="Name" name="name" id="update_name_category" value="">
                        <div class="alert alert-danger" id="error_name" style="display: none">
                        </div>
                    </div>
                    <br>
                    <button  id ="btn_update_category"   type="button" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
