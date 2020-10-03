<!-- Modal -->
<div  class="modal fade" id="open_create_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_create_category" method="POST" action="{{route('category.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input  class="form-control"  placeholder="Name" name="name" id="create_name_category" value="">
                        <div class="alert alert-danger" id="error_name" style="display: none">
                        </div>
                    </div>
                    <br>
                    <button  id ="btn_create_category" data-action="{{route('category.store')}}"  type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
