@extends('admin.master');
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <button id="btn_create" type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#exampleModal" style="margin-left: -636px;margin-top: 10px"
                    >
                Add
            </button>
            @include('user.create')
            @include('user.update')
            <div class="card">
                <div class="card-header text-center" >
                    <h2 style="text-align: left">Users</h2>

                    <form data-action="{{route('user.search')}}" id="form-search_user">
                        <div class="input-group md-form form-sm form-1 pl-0">
                            <div class="input-group-prepend">
                            <span class="input-group-text purple lighten-3" id="basic-text1"><i
                                    class="fas fa-search text-white" aria-hidden="true"></i></span>
                            </div>
                            <input id="btn_search_product"
                                   class="form-control my-0 py-1" name="name" type="text" placeholder="Search"
                                   aria-label="Search">
                        </div>
                        <button id="btn_create" type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal" style="margin-left: -636px;margin-top: 10px">
                            Add
                        </button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="table_list_user" >

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('admin/user/index.js')}}"></script>
@endsection
