@extends('layouts.adminHeader')
@section('sidebar')
@extends('layouts.adminSidebar')
@endsection
@section('content')

          <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add Social Media</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="{{ route('admin/insertsocialmedia') }}" >
                  @csrf
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" name="socialname" require placeholder="FaceBook">
                          @if ($errors->has('socialname'))
                              <span class="text-danger">{{ $errors->first('socialname') }}</span>
                          @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="form-control" name="link" require placeholder="Https://linkedin.com/Yfhgje">
                        @if ($errors->has('link'))
                            <span class="text-danger">{{ $errors->first('link') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
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
