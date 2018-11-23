@extends('admin.admin-master')

@section('admin_body')

    <div class="row">
        <div class="col-md-offset-1 col-md-10" style="margin-top: 30px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center text-success">Manage Category Info</h3>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success"  id="massege">{{Session::get('massege')}}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>SL</th>
                            <th>Customer Name</th>
                            <th>Order Total</th>
                            <th>Order Date</th>
                            <th>Oredr Status</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $order->f_name.' '.$order->l_name }}</td>
                                <td>{{ $order->order_total }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->payment_type }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>
                                    <a href="{{ route('view-order-detail', ['id'=>$order->id]) }}" class="btn btn-info btn-xs" title="View Order Details">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    <a href="{{ route('view-order-invoice', ['id'=>$order->id]) }}" class="btn btn-warning btn-xs" title="View Order Invoice">
                                        <span class="glyphicon glyphicon-zoom-out"></span>
                                    </a>
                                    <a href="{{ route('edit-category', ['id'=>$order->id]) }}" class="btn btn-primary btn-xs" title="Download Order Invoice">
                                        <span class="glyphicon glyphicon-download"></span>
                                    </a>
                                    <a href="{{ route('delete-category', ['id'=>$order->id]) }}" class="btn btn-success btn-xs" title="Edit Order">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{ route('delete-category', ['id'=>$order->id]) }}" class="btn btn-danger btn-xs" title="Delete Order">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection