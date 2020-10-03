<!-- Modal -->
<div  class="modal fade" id="open_update_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_update_user" >
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input  class="form-control name_select"  placeholder="Name" name="name" id="update_name_user">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input  class="form-control email_select"  placeholder="Email" name="email" id="update_email_user">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input  class="form-control password_select" type="password"  placeholder="Password" name="password" id="update_password_user">
                    </div>

                    <select class="form-control selected" id="create_select" name="roles[]" multiple >
                        @foreach($roles as $role)
                            <option
{{--                                {{$user->contains($role->id) ? 'selected' : ''}}--}}
                                value="{{$role->id}}">{{$role->display_name}}</option>
                        @endforeach
                    </select>

                    <button id ="btn_update_user_new" type="button" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
