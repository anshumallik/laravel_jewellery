@extends('admin.layouts.app')
@section('page-name','Order')
@section('order','active')
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
                    <h3>Orders</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
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

                        <h3 class="card-title float-right">
                            <a href="{{ route('user_orders.create') }}" class="btn btn-success float-right btn-sm"><i
                                        class="fas fa-plus-circle"></i> Add New </a>
                        </h3>
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
                    </div>
                    <div class="card-body">
                        <table class="table user_order mt-5" id="user_order">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Order Code</th>
                                <th>Name</th>
                                <th>Weight</th>
                                <th>Subtotal</th>
                                <th>Grand Total</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user_orders as $user_order)
                                <?php
                                $totalweight = 0;
                                $totaladvance = 0;
                                $totalprice = 0;
                                $grand_total = 0;
                                foreach ($user_order->order_items as $order_item) {
                                    $totalweight += $order_item->weight;
                                    $totalprice += $order_item->price;
                                    $totaladvance += $order_item->advance;
                                    $grand_total = $order_item->grand_total;
                                }
                                ?>
                                <tr>
                                    <td>{{++$id}}</td>
                                    <td>{{$user_order->order_code}}</td>
                                    <td>{{$user_order->customer_name}}</td>
                                    <td>{{$totalweight}}</td>
                                    <td>{{$totalprice}}</td>
                                    <td>{{$grand_total}}</td>
                                    <td>
                                        <div id="outer">
                                            <a class="btn btn-sm inner" style="color: royalblue;"
                                               href="{{ route('user_orders.showOrder',$user_order->id) }}"><i
                                                        class="fas fa-eye" title="View Order"></i></a>
                                            <a class="btn btn-sm inner" style="color: royalblue;"
                                               href="{{ route('user_orders.edit',$user_order->id) }}"><i
                                                        class="fas fa-edit" title="Edit Order"></i></a>
                                            <form action="{{ route('deleteUserOrderItems', $user_order->id)}}"
                                                  method="post" class="inner">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm" style="color: red;" type="submit"><i
                                                            class="fa fa-trash" title="Delete"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
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
        $('#user_order').DataTable();

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