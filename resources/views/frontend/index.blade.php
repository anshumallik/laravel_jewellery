@extends('frontend.layout')
@section('content')
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner_slider">
                        <div class="single_banner_slider">
                            <div class="banner_text">
                                <div class="banner_text_iner">
                                    {{--<h5>Jewellery</h5>--}}
                                    <h1>Jewellery Collection <script>document.write(new Date().getFullYear());</script></h1>
                                    <a href="{{route('shop')}}" class="btn_1">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="new_arrival section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="arrival_tittle">
                        <h2>new arrival</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-2 col-sm-2">
                                {{--<div class="single_category_product" id="{{$product->category->id}}">--}}
                                <div class="single_category_img">
                                    <a href="{{ route('product-detail', $product->id) }}">
                                        <img src="{{asset('images/product/'.$product->image)}}" alt=""
                                             style="width: 50px;height: 50px;">
                                    </a>
                                    <div class="category_product_text">
                                        <a href="{{route('product-detail', $product->id)}}">
                                            <h5>{{$product->name}}</h5></a>
                                        <p>Rs. {{$product->price}}</p>
                                        <a class="btn btn-primary" href="{{route('product-detail', $product->id)}}">Add
                                            to cart</a>
                                    </div>
                                </div>
                                {{--</div>--}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection