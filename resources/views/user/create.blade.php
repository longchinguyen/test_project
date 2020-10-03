<!-- Modal -->
<div  class="modal fade" id="open_create_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_create_user">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input  class="form-control"  placeholder="Name" name="name" id="create_name_user">
                        <div class="alert alert-danger" id="error_name" style="display: none">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input  class="form-control"  placeholder="Email" name="email" id="create_email_user">
                        <div class="alert alert-danger" id="error_email"  style="display: none"></div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input  class="form-control" type="password"  placeholder="Password" name="password" id="create_password_user">
                    </div>
                    <select class="form-control" id="create_select" name="roles[]" multiple >
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->display_name}}</option>
                        @endforeach
                    </select>
                    {{--                    <div class="form-group">--}}
                    {{--                        <label>User_id</label>--}}
                    {{--                        <input  class="form-control"  placeholder="User_id">--}}
                    {{--                    </div>--}}
                    <br>
                    <button id ="btn_create_user" data-action="{{route('user.store')}}" type="button" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
