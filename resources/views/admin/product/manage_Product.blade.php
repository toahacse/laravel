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
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Short Diccription</th>
                            <th>Long Diccription</th>
                            <th>Product Image</th>
                            <th>Publication Status</th>
                            <th style="padding-left: 30px; padding-right: 30px;">Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($product as $product)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$product->categoryName}}</td>
                                <td>{{$product->Brand_Name}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_price}} TK</td>
                                <td>{{$product->product_quantity}}</td>
                                <td>{{$product->short_diccription}}</td>
                                <td>{{$product->long_diccription}}</td>
                                <td><img src="{{$product->product_image}}" height="100px" width="100px"/></td>
                                <td>{{$product->publication_Status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    @if($product->publication_Status == 1)
                                        <a href="{{ route('unpublished-product', ['id'=>$product->id]) }}" class="btn btn-info btn-xs">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{ route('published-product', ['id'=>$product->id]) }}" class="btn btn-warning btn-xs">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif
                                    <a href="{{ route('edit-product', ['id'=>$product->id]) }}" class="btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{ route('delete-product', ['id'=>$product->id]) }}" class="btn btn-danger btn-xs">
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
    </div>


@endsection