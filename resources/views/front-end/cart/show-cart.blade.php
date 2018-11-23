@extends('front-end.master')
@section('body')

    <div class="banner1">
            <h3><a href="{{ route('/') }}">Home</a> / <span>Products</span></h3>
    </div>
    <div class="container">
    <div class="single-wl3">
    <div class="row">
    <div class="col-md-12" style="margin: 40px 0px 0px 0px;">
        <h3 class="text-center text-success">My Shopping Cart</h3>
        <hr/>
        <table class="table table-bordered">
            <tr class="bg-primary">
                <th>SL No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
            @php($i=1)
            @php($sum = 0)
            @foreach($cartProducts as $cartProduct)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $cartProduct->name }}</td>
                    <td><img src="{{ asset($cartProduct->options->image) }}" height="50px" width="50px"></td>
                    <td>{{ $cartProduct->price }}</td>
                    <td>
                        <form action="{{ route('update-cart') }}" method="POST">
                        {{csrf_field()}}
                            <input type="number" name="qty" value="{{ $cartProduct->qty }}" min="1"/>
                            <input type="hidden" name="rowId" value="{{ $cartProduct->rowId }}"/>
                            <input type="submit" name="btn" value="Update"/>
                        </form>
                    </td>
                    <td>{{$total= $cartProduct->price*$cartProduct->qty }}</td>
                    <td>
                        <a href="{{ route('delete-cart-itme',['id'=>$cartProduct->rowId]) }}" class="btn btn-danger btn-xs" title="Delete">
                           <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
                <?php $sum = $sum+$total; ?>
            @endforeach
        </table>
        <hr/>
        <table class="table table-bordered">
            <tr>
                <th>Item Total</th>
                <td>{{ $sum }} Tk</td>
            </tr>
            <tr>
                <th>Vat Total</th>
                <td>{{ $vat=0 }} Tk</td>
            </tr>
            <tr>
                <th>Grand Total</th>
                <td>{{ $orderTotal=$sum+$vat }} Tk</td>
                <?php Session::put('orderTotal', $orderTotal) ?>
            </tr>
        </table>
    </div>
    </div>
    <div class="row">
            <div class="col-md-12">
                @if(Session::get('customerId') && Session::get('shippingId'))
                <a href="{{ route('checkout-payment') }}" class="btn btn-success pull-right">Checkout</a>
                @elseif(Session::get('customerId'))
                    <a href="{{ route('checkout-shipping') }}" class="btn btn-success pull-right">Checkout</a>
                @else
                    <a href="{{ route('checkout') }}" class="btn btn-success pull-right">Checkout</a>
                @endif
                <a href="" class="btn btn-success">Continue Shopping</a>
            </div>
    </div>
    </div>
    </div>
@endsection