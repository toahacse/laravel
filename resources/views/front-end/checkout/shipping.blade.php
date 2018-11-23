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
                        Dear {{ Session::get('customerName') }}. You have to give us product shipping info to complete your valiuable order. If your billing info & shipping info are same then just press on save shipping info button.
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 style="margin: 10px 0px 15px 0px;">Shipping Info gose here.....</h3>
                    <form action="{{ route('new-shipping') }}" method="POST">
                        {{csrf_field()}}
                        <input type="text" name="full_name" value="{{ $customer->f_name.' '.$customer->l_name }}" class="form-control" placeholder="First Name" />
                        <input type="email" name="email" value="{{ $customer->email }}" class="form-control" placeholder="example@gmail.com" />
                        <input type="number" name="number" value="{{ $customer->number }}" class="form-control" placeholder="Phone Number" />
                        <textarea name="address" rows="3" cols="20"  placeholder="Address" class="form-control" >{{ $customer->address }}</textarea>
                        <input type="submit" name="btn" value="Save Shipping info" class="btn btn-info btn-block" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection