@extends('admin.layouts.app')
@section('page-name', 'Product')
@section('product', 'active')
@section('content')
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        #outer {
            width: 100%;
            text-align: center;
        }

        .inner {
            display: inline-block;

        }
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Product</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        <a href="{{route('products.create')}}" class="btn btn-success float-right btn-sm"><i
                                    class="fas fa-plus-circle"></i> Add Product</a>
                    </div>
                    <div class="card-body">
                        <table id="products" class="table">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Code</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{++$id}}</td>
                                    <td>{{$product->code}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>
                                        <img src="{{asset('images/product/'.$product->image)}}" alt="Product Image"
                                             style="width: 20px;">
                                    </td>
                                    <td>
                                        <div id="outer">
                                            <a href="{{route('products.edit', $product->id)}}" class="btn btn-sm inner"
                                               style="color: royalblue;"><i class="fa fa-edit" title="Edit"></i></a>

                                            <a href="{{route('products.show', $product->id)}}" class="btn btn-sm inner"
                                               style="color: royalblue;"><i class="fa fa-eye" title="View"></i></a>

                                            <a href="{{route('addImages', $product->id)}}" class="btn btn-sm inner"
                                               data-title="Add Images" style="color: royalblue;"><i
                                                        class="fa fa-plus-circle" title="Add Image"></i></a>
                                            <form action="{{route('products.destroy', $product->id)}}" method="POST"
                                                  class="inner">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm" style="color:red;"><i
                                                            class="fas fa-trash" title="Delete"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $("#products").DataTable();

                @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>

@endsection