<div  class="modal fade" id="open_update_role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_role" method="post">
                    @csrf
                    @method('put')
                    <div class="form-update-group">
                        <label>Name</label>
                        <input  class=" form-control name_role"  placeholder="Name" name="name" id="update_name_role" value="">
                        <div class="alert alert-danger" id="error_name" style="display: none">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Display name</label>
                        <input  class=" form-control display_name_role"  placeholder="Display name" name="display_name" id="update_role" value="">
                        <div class="alert alert-danger" id="error_email"  style="display: none"></div>
                    </div>
                    <div style="color: red;">
                        <input type="checkbox" id="checkAllEdit" > Check All
                    </div>
                    @foreach($permissions as $permission)
                        <div class="form-check checkin_role">
                            <input type="checkbox" class="form-check-input check-role" name="permissions[]" value="{{$permission->id}}" >
                            <label class="form-check-label" for="exampleCheck1">{{$permission->display_name}}</label>
                        </div>
                    @endforeach
                    <br>
                    <button  id ="btn_update_role"   type="button" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
