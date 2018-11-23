@extends('front-end.master')
@section('body')
    <div class="banner1">
        <h3><a href="index.html">Home</a> / <span>Single</span></h3>
    </div>
    <style>
        input{
            margin-top: 20px;
        }
        textarea{
            margin-top: 20px;
        }
    </style>
    <div class="container">
        <div class="single-wl3">
            <div class="row">
                <div class="col-md-12 well">
                    Dear {{ Session::get('customerName') }}. You have to give us product payment method...
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 well">
                    <h3 style="margin: 10px 0px 15px 0px;" class="text-success">Payment Form........</h3>
                    <form action="{{ route('new-order') }}" method="POST">
                        {{csrf_field()}}
                        <table class="table table-bordered">
                            <tr>
                                <th>Cash on Delivery </th>
                                <td><input type="radio" name="payment_type" value="Cash" />Cash on Delivery</td>
                            </tr>
                            <tr>
                                <th>Paypel </th>
                                <td><input type="radio" name="payment_type" value="Paypel" />Paypel</td>
                            </tr>
                            <tr>
                                <th>Bkash </th>
                                <td><input type="radio" name="payment_type" value="Bkash" />Bkash</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" class="btn btn-success btn-block" name="btn" value="Confirm Order" /></td>
                            </tr>
                        </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection