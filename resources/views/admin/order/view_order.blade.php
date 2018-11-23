@extends('admin.admin-master')

@section('admin_body')

    <div class="row">
        <div class="col-md-offset-1 col-md-10" style="margin-top: 30px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Order Details Info For This Order</h3>
                    <table class="table table-bordered">
                            <tr>
                                <th>Order No</th>
                                <th>{{ $order->id }}</th>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <th>{{ $order->order_total }}</th>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <th>{{ $order->order_status }}</th>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <th>{{ $order->created_at }}</th>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-1 col-md-10" style="margin-top: 30px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Customer Info For This Order</h3>
                    <table class="table table-bordered">
                            <tr>
                                <th>Customer Name</th>
                                <th>{{ $customer->f_name.' '.$customer->l_name }}</th>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <th>{{ $customer->number }}</th>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <th>{{ $customer->email }}</th>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <th>{{ $customer->address }}</th>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-1 col-md-10" style="margin-top: 30px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Shipping Info For This Order</h3>
                    <table class="table table-bordered">
                            <tr>
                                <th>Full Name</th>
                                <th>{{ $shipping->full_name }}</th>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <th>{{ $shipping->number }}</th>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <th>{{ $shipping->email }}</th>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <th>{{ $shipping->address }}</th>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-1 col-md-10" style="margin-top: 30px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Payment Info For This Order</h3>
                    <table class="table table-bordered">
                            <tr>
                                <th>Payment Type</th>
                                <th>{{ $payment->payment_type }}</th>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <th>{{ $payment->payment_status }}</th>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-1 col-md-10" style="margin-top: 30px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Product Info For This Order </h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>SL</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        @php($i=1)
                        @foreach($orderDetails as $orderDetail)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $orderDetail->product_id }}</td>
                                <td>{{ $orderDetail->product_name }}</td>
                                <td>{{ $orderDetail->product_price }}</td>
                                <td>{{ $orderDetail->product_quantity }}</td>
                                <td>{{ $orderDetail->product_price*$orderDetail->product_quantity }}</td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection