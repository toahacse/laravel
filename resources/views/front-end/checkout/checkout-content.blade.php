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

        <!--single-->
    <div class="container">
    <div class="single-wl3">
        <div class="row">
            <div class="col-md-12 well">
                <h3>You have to login to complete youe valuable order. If you are not registered then please register first.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 well">
                <h3 style="margin: 10px 0px 15px 0px;">Register if you are not Registered before!</h3>
                <form action="{{ route('customer-sing-up') }}" method="POST">
                    {{csrf_field()}}
                    <input type="text" name="f_name" class="form-control" placeholder="First Name" />
                    <input type="text" name="l_name" class="form-control" placeholder="Last Name" />
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com" />
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                    <input type="number" name="number" class="form-control" placeholder="Phone Number" />
                    <textarea name="address" rows="3" cols="20" placeholder="Address" class="form-control" ></textarea>
                    <input type="submit" name="btn" value="Register" class="btn btn-info btn-block" />
                </form>
            </div>
            <div class="col-md-5 col-md-offset-1 well">
                <h3>Already Registered? Login Here!</h3>
                <h4 class="text-center text-danger">{{Session::get('massage')}}</h4>
                <form action="{{ route('customer-login') }}" method="POST">
                    {{csrf_field()}}
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com" />
                    <input type="password" name="Password" class="form-control" placeholder="Password" />
                    <input type="submit" name="btn" value="Log-in" class="btn btn-success btn-block" />
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection