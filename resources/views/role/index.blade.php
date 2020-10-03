@extends('admin.master');
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <div class="card">
                <div class="card-header text-center">
                    <h2 style="text-align: left">Roles</h2>
                    <form data-action="{{route('role.search')}}" id="form-seach">
                    <div class="input-group md-form form-sm form-1 pl-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text purple lighten-3" id="basic-text1"><i
                                    class="fas fa-search text-white" aria-hidden="true"></i></span>
                        </div>
                        <input id="btn_search_role"
                               class="form-control my-0 py-1" name="name"  type="text" placeholder="Search" aria-label="Search">
                    </div>
                        <button id="btn_create_role" type="button" class="btn btn-primary" data-action="{{route('role.index')}}"
                                data-toggle="modal" data-target="#exampleModal" style="margin-left: -636px;margin-top: 10px">
                            Add
                        </button>
                    </form>
                </div>
                @include('role.create')
                @include('role.update')
                <div class="card-bodyx">
                    <div class="table-responsive" id="table_list_role">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('admin/role/index.js')}}"></script>
@endsection
