@extends('admin.admin-master')

@section('admin_body')

    <div class="row">
        <div class="col-md-offset-1 col-md-8" style="margin-top: 30px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center text-success">Update Product Info</h3>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success">{{Session::get('massege')}}</h3>
                    <form action="{{ route('update-product') }}" method="POST" enctype="multipart/form-data" name="editProductForm">
                        {{csrf_field()}}
                        <input type="hidden" class="form-control" name="Product_id" required id="formGroupExampleInput" value="{{$product->id}}"/>
                        <div class="form-group">
                            <label for="categoryName">Category Name:</label>
                            <select class="form-control" name="category_id">
                                <option>--Select Category Name--</option>
                                @foreach($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Brand Name:</label>
                            <select class="form-control" name="brand_id">
                                <option>--Select Brand Name--</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->Brand_Name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Name:</label>
                            <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}"/>
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Product Price:</label>
                            <input type="text" class="form-control" name="product_price" value="{{$product->product_price}}"/>
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Product Quantity:</label>
                            <input type="text" class="form-control" name="product_quantity"  value="{{$product->product_quantity}}"/>
                        </div>
                        <div class="form-group">
                            <label>Short Description:</label>
                            <textarea class="form-control" rows="2" cols="20" placeholder="Short Description" name="short_diccription">
                                {{$product->short_diccription}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Long Description:</label>
                            <textarea class="form-control" rows="5" cols="20" placeholder="Long Description" name="long_diccription">
                                {{$product->long_diccription}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Product Image:</label>
                            <input type="file" name="product_image" class="form-control" accept="image/*" />
                            <img src="{{ asset($product->product_image) }}" height="60px" width="60px" />
                        </div>
                        <div class="form-group">
                            <label>Publication Status: </label>
                            <input type="radio" name="publication_Status" {{$brand->publication_Status == 1 ? 'checked':''}} value="1">Published
                            <input type="radio" name="publication_Status" {{$brand->publication_Status == 0 ? 'checked':''}} value="0">Unpublished
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="ok" value="Update Product Info" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editProductForm'].elements['category_id'].value='{{$product->category_id}}';
        document.forms['editProductForm'].elements['brand_id'].value='{{$product->brand_id}}';
    </script>
@endsection