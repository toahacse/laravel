@extends('admin.admin-master')

@section('admin_body')

    <div class="row">
        <div class="col-md-offset-1 col-md-8" style="margin-top: 30px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center text-success">Add Product Info</h3>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success">{{Session::get('massege')}}</h3>
                    <form action="{{ route('new-product') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
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
                            <input type="text" class="form-control" name="product_name" required id="formGroupExampleInput2" placeholder="Product Name"/>
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Product Price:</label>
                            <input type="text" class="form-control" name="product_price" required id="formGroupExampleInput2" placeholder="Category Description"/>
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Product Quantity:</label>
                            <input type="text" class="form-control" name="product_quantity" required id="formGroupExampleInput2" placeholder="Category Description"/>
                        </div>
                        <div class="form-group">
                            <label>Short Description:</label>
                            <textarea class="form-control" rows="2" cols="20" placeholder="Short Description" name="short_diccription"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Long Description:</label>
                            <textarea class="form-control" rows="5" cols="20" placeholder="Long Description" name="long_diccription"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Product Image:</label>
                            <input type="file" name="product_image" class="form-control" accept="image/*" />
                        </div>
                        <div class="form-group">
                            <label>Publication Status: </label>
                            <input type="radio" name="publication_Status" value="1">Published
                            <input type="radio" name="publication_Status" value="0">Unpublished
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="ok" value="Save Product Info" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection