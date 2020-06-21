@extends('frontend.layout')
@section('content')
    <section class="banner_area" style="background: url('{{ asset("img/banner/banner-bg.jpg") }}')">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Wishlist Page</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="cat_product_area section_gap">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="latest_product_inner row">

                        <div class="card mt-lg-5">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                    @php
                                        Session::forget('flash_message');
                                    @endphp
                                </div>
                            @endif
                            @if(Session::has('success'))
                                <div class="alert alert-danger">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th> Product</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(Auth::user()->wishlists->count())
                                    @foreach($wishlists as $wishlist)
                                        <tr>
                                            <td>{{$wishlist->product->name}}</td>
                                            <td>
                                                <form action="{{route('wishlist.destroy',$wishlist->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn" style="color: red;"><i
                                                                class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection