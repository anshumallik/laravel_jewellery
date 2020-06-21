@extends('admin.layouts.app')
@section('page-name', 'Order-Show')
@section('product', 'active')
@section('content')
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mt-2">
                    <h5>Order Detail</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px; margin-right: 10px;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left">Order in Detail</h3>
            </div>
            <div class="card-body">
                <form role="form">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Customer Name:</strong>
                                <span>{{ $user_order->customer_name }}</span>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Contact Number:</strong>
                                <span>{{$user_order->contact_number}}</span>
                            </div>
                        </div>
                        <?php
                        $totalweight = 0;
                        $totaladvance = 0;
                        $totalprice = 0;
                        $total = 0;
                        foreach ($user_order->order_items as $order_item) {
                            $totalweight += $order_item->weight;
                            $totalprice += $order_item->price;
                            $totaladvance += $order_item->advance;
                            $total = $order_item->grand_total;
                        }
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Product Name:</strong>
                                @foreach($user_order->order_items as $order_item)
                                    {{ $loop->first ? '' : ', ' }}
                                    <span>{{ $order_item->product->name }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Weight:</strong>
                                <span>{{$totalweight}}</span>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Price:</strong>
                                <span>{{$totalprice}}</span>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Advance:</strong>
                                <span>{{$totaladvance}}</span>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Grand Total:</strong>
                                <span>{{$total}}</span>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <div class="form-group text-center">
                    <a class="btn btn-primary btn-sm" style="" href="{{ route('user_orders.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

@endsection