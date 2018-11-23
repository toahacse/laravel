@extends('admin.admin-master')

@section('admin_body')

    <div class="row">
        <div class="col-md-offset-1 col-md-8" style="margin-top: 30px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center text-success">Update Brand Info</h3>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success">{{Session::get('massege')}}</h3>
                    <form action="{{ route('update-brand') }}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="categoryName">Brand Name:</label>
                            <input type="text" class="form-control" name="Brand_Name" required id="formGroupExampleInput" value="{{$brand->Brand_Name}}"/>
                            <input type="hidden" class="form-control" name="Brand_id" required id="formGroupExampleInput" value="{{$brand->id}}"/>
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Brand Description:</label>
                            <input type="text" class="form-control" name="Brand_Description" required id="formGroupExampleInput2" value="{{$brand->Brand_Description}}"/>
                        </div>
                        <div class="form-group">
                            <label>Publication Status: </label>
                            <input type="radio" name="publication_Status" {{$brand->publication_Status == 1 ? 'checked':''}} value="1">Published
                            <input type="radio" name="publication_Status" {{$brand->publication_Status == 0 ? 'checked':''}} value="0">Unpublished
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="ok" value="Update Brand Info" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection