@extends('admin.layouts.app')
@section('page-name', 'Product-Create')
@section('product', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Create Product</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add New Product</h3>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" style="background-color: #0E9A00">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form action="{{route('products.store')}}" role="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category">Select Category</label>
                                    <select name="category_id" id="category" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" class="form-control" id="product_name"
                                           placeholder="Enter Product Name">
                                    @if($errors->has('name'))
                                        <p class="error alert alert-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" class="form-control" id="price"
                                           placeholder="Enter Product Price">
                                    @if($errors->has('price'))
                                        <p class="error alert alert-danger">{{$errors->first('price')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Quantity</label>
                                    <input type="text" name="qty" class="form-control" id="qty"
                                           placeholder="Enter Product qty">
                                    @if($errors->has('qty'))
                                        <p class="error alert alert-danger">{{$errors->first('qty')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" style="width: 100%"></textarea>
                                    @if($errors->has('description'))
                                        <p class="error alert alert-danger">{{$errors->first('description')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image">Choose Image:</label>
                                    <input type="file" class="form-control" name="image" id="product_image">
                                </div>
                                @if($errors->has('image'))
                                    <p class="error alert alert-danger">{{$errors->first('image')}}</p>
                                @endif
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection