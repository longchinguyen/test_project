@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <!-- Search form -->

            <div class="card">
                <div class="card-header text-center">
                    <h2 style="text-align: left">Products</h2>
                    <form data-action="{{route('products.search')}}" id="form-search_product">
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
                <div class="card-body w-100">
                    <div id="table_product" data-url="{{route('products.table')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.update')
    @include('admin.create')
@endsection

@section('scripts')

@endsection

@section('js')
    <script src="{{asset('admin/product/index.js')}}"></script>
@endsection

