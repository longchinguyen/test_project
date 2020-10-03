<!-- Modal -->
<div  class="modal fade" id="open_create_role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_create_role" method="POST" action="{{route('role.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input  class="form-control"  placeholder="Name" name="name" id="create_name_role" value="">
                        <div class="alert alert-danger" id="error_name" style="display: none">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Display name</label>
                        <input  class="form-control"  placeholder="Display name" name="display_name" id="create_role" value="">
                        <div class="alert alert-danger" id="error_email"  style="display: none"></div>
                    </div>
                   <div style="color: red;">
                       <input type="checkbox" id="checkAll" > Check All
                   </div>
                        @foreach($permissions as $permission)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkRole" name="permissions[]" value="{{$permission->id}}" >
                            <label class="form-check-label" for="exampleCheck1">{{$permission->display_name}}</label>
                        </div>
                        @endforeach
                    <br>
                    <button  id ="btn_create_role" data-action="{{route('role.store')}}"  type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
