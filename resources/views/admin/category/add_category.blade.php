@extends('admin.admin-master')

@section('admin_body')

    <div class="row">
       <div class="col-md-offset-1 col-md-8" style="margin-top: 30px;">
           <div class="panel panel-default">
               <div class="panel-heading">
                   <h3 class="text-center text-success">Add Category Info</h3>
               </div>
               <div class="panel-body">
                   <h3 class="text-center text-success">{{Session::get('massege')}}</h3>
                   <form action="{{ route('new-category') }}" method="POST">
                       {{csrf_field()}}
                       <div class="form-group">
                           <label for="categoryName">Category Name:</label>
                           <input type="text" class="form-control" name="categoryName" required id="formGroupExampleInput" placeholder="Category Name"/>
                       </div>
                       <div class="form-group">
                           <label for="categoryDescription">Category Description:</label>
                           <input type="text" class="form-control" name="categoryDescription" required id="formGroupExampleInput2" placeholder="Category Description"/>
                       </div>
                       <div class="form-group">
                           <label>Publication Status: </label>
                           <input type="radio" name="publicationStatus" value="1">Published
                           <input type="radio" name="publicationStatus" value="0">Unpublished
                       </div>
                       <div class="form-group">
                           <input type="submit" class="btn btn-success btn-block" name="ok" value="Save Category Info" />
                       </div>
                   </form>
               </div>
           </div>
        </div>
    </div>

@endsection