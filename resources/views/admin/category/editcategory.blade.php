@extends('layouts.adminHeader')
@section('sidebar')
    @extends('layouts.adminSidebar')
@endsection
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('admin/updatecategory',$category->id)}}" >
                @csrf
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="row">                  
                    <div class="col-sm-12 form-group">
                      <label>category Name</label>
                      <input type="text" class="form-control" name="category_name" require placeholder="Enter Category Name" value="{{$category->category_name}}">
                      @if ($errors->has('category_name'))
                          <span class="text-danger">{{ $errors->first('category_name') }}</span>
                      @endif
                    </div>  
                  </div>
        
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                        <button class="form-control btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
                
              </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('footer')
    @include('layouts.adminFooter')
@endsection
