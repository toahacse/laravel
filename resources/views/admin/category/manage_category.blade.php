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
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($category as $category)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$category->categoryName}}</td>
                            <td>{{$category->categoryDescription}}</td>
                            <td>{{$category->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                @if($category->publicationStatus == 1)
                                    <a href="{{ route('unpublished-category', ['id'=>$category->id]) }}" class="btn btn-info btn-xs">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </a>
                                @else
                                    <a href="{{ route('published-category', ['id'=>$category->id]) }}" class="btn btn-warning btn-xs">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </a>
                                @endif
                                    <a href="{{ route('edit-category', ['id'=>$category->id]) }}" class="btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-edit"></span>
                                     </a>
                                <a href="{{ route('delete-category', ['id'=>$category->id]) }}" class="btn btn-danger btn-xs">
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