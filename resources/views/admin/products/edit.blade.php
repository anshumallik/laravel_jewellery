@extends('admin.layouts.app')
@section('page-name', 'Product-Edit')
@section('product', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit Product</h3>
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
    <section class="content" style="margin-left: 0px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Product</h3>
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
                        <form action="{{route('products.update', $product->id)}}" role="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category">Select Category</label>
                                    <select name="category_id" id="category" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->name == $product->category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control"
                                           id="product_name"
                                           placeholder="Enter Product Name">
                                    @if($errors->has('name'))
                                        <p class="error alert alert-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" value="{{$product->price}}" class="form-control"
                                           id="price"
                                           placeholder="Enter Product Price">
                                    @if($errors->has('price'))
                                        <p class="error alert alert-danger">{{$errors->first('price')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Quantity</label>
                                    <input type="text" name="qty" value="{{$product->qty}}" class="form-control"
                                           id="qty"
                                           placeholder="Enter Product qty">
                                    @if($errors->has('qty'))
                                        <p class="error alert alert-danger">{{$errors->first('qty')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description"
                                              style="width: 100%">{{$product->description}}</textarea>
                                    @if($errors->has('description'))
                                        <p class="error alert alert-danger">{{$errors->first('description')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image">Choose Image:</label>
                                    <input type="file" class="form-control" name="image" id="product_image">
                                    <img src="{{asset('images/product/'.$product->image)}}" alt="Product Image"
                                         style="width: 50px; margin-top: 10px;">
                                    @if($errors->has('image'))
                                        <p class="error alert alert-danger">{{$errors->first('image')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group text-center">
                                    <a class="btn btn-primary btn-sm" style="" href="{{ route('products.index') }}">
                                        Back</a>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection