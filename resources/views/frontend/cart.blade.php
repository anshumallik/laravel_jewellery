@extends('frontend.layout')
@section('content')
    <link rel="stylesheet" href="{{asset('css/price_rangs.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">

    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <p>Home/Shop/Single product/Cart list</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                @if($cart)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Remove</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            @foreach($cart->items as $product)
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{ asset('images/product/'. $product['image']) }}" alt=""
                                                     width="50"
                                                     height="50">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media-body">
                                            <p>{{$product['name']}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.update', $product['id']) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="number" name="qty" value="{{$product['qty']}}">
                                            <button type="submit" class="btn" style="color: royalblue;"><i
                                                        class="ti-reload"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('cart.remove', $product['id'])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn" style="color: red;"><i
                                                        class="ti-trash"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <h5>Rs. {{$product['price']}}</h5>
                                    </td>
                                    <td>Rs. {{$product['qty']}} * {{ $product['price'] }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>Rs. {{$cart->totalPrice}}</h5>
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                        <div class="checkout_btn_inner float-right">
                            {{--@if(Auth::guest())--}}
                            {{--<a class="btn_1" href="{{ route('shop') }}">Continue Shopping</a>--}}
                            {{--@else--}}

                            <a class="btn_1" href="{{ route('shop') }}">Continue Shopping</a>

                            <a class="btn_1 checkout_btn_1" href="{{route('checkout')}}">Proceed to checkout</a>
                            {{--<form action="{{ route('order.add') }}" method="POST">--}}
                            {{--@csrf--}}
                            {{--<input type="hidden" name="cart_data"--}}
                            {{--value="{{  json_encode($cart->items) }}">--}}
                            {{--<input type="hidden" name="cart_total"--}}
                            {{--value="{{$cart->totalPrice}}">--}}
                            {{--<button type="submit" class="btn btn-primary">Proceed to checkout</button>--}}

                            {{--</form>--}}
                            {{--@endif--}}
                        </div>
                    </div>
            </div>
            @else
                <h3 class="text-center">There is no item in cart.</h3>
            @endif
        </div>
    </section>

    <script src="{{asset('js/price_rangs.js')}}"></script>
@endsection