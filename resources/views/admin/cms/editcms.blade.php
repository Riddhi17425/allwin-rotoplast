@extends('layouts.adminHeader')

@section('sidebar')
@extends('layouts.adminSidebar')
@endsection
@section('content')

          <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Cms Page</h3>
                <a href="{{ route('admin/cms')}}" class="btn btn-default float-right">Back</a>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="{{ route('admin/updatecms') }}" >
                  @csrf
                  <input type="hidden" id="blogid" name="id" value="{{$data->id}}"> 
                  <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Page Name</label>
                        <input type="text" class="form-control" placeholder="Page Name" name="pagename" value="{{ $data->pagename }}" readonly>
                      </div>
                  </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea row="5" name="description" class="form-control textarea">{{$data->description}}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" placeholder="Enter Meta Title" value="{{$data->meta_title}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <textarea type="text" class="form-control" name="meta_description" placeholder="Enter Meta Description">{{$data->meta_description}}</textarea>
                        </div>
                    </div>
                </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button class="form-control btn btn-primary milestone_btn">Save</button>
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
