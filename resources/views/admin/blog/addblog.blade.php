@extends('layouts.adminHeader')
@section('sidebar')
    @extends('layouts.adminSidebar')
@endsection
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Add Blog</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('admin/insertblog') }}" >
                @csrf
                <div class="row">
                  
                    <div class="col-sm-12 form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title" require placeholder="Enter Title">
                      @if ($errors->has('title'))
                          <span class="text-danger">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                   
                    <div class="col-sm-12 form-group">
                      <label>Description</label>
                      <textarea id="summernote" name="description" class="textarea"></textarea>
                      @if ($errors->has('description'))
                          <span class="text-danger">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                
                <div class="row">
                  <div class="col-sm-6">
                    <!-- textarea --> 
                    <div class="form-group">
                      <label>Blog detail Image</label>
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" name="blogimage" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Blog front Image</label>
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" name="blogimage_front" id="customFile2">
                          <label class="custom-file-label" for="customFile2">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>CTA Image</label>
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" name="cta_image" id="ctaImage">
                          <label class="custom-file-label" for="ctaImage">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Publish Date</label>
                      <div class="input-group" id="reservationdate" data-target-input="nearest">
                          <input type="text" name="publish_date" class="form-control date" data-target="#reservationdate"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="date"> 
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                      </div>
                      @if ($errors->has('publish_date'))
                          <span class="text-danger">{{ $errors->first('publish_date') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="Active" selected>Active</option>
                        <option value="InActive">InActive</option>
                      </select>
                    </div> 
                  </div>
                </div>

               
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" class="form-control" name="url" require placeholder="Enter Url">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Short Description</label>
                            <input type="text" class="form-control" name="short_description" require placeholder="Enter Short Description">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                      <label>Conclusion</label>
                      <textarea name="conclusion" class="textarea"></textarea>
                    </div>
                </div>
                <div class="row">
                  {{-- <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" name="is_publish" type="checkbox">
                        <label class="form-check-label">Is Publish</label>
                      </div>
                    </div>
                  </div> --}}
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Meta Title</label>
                      <input type="text" class="form-control" name="meta_title" placeholder="Enter Meta Title">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group"> 
                    <label>Meta Description</label>
                    <input type="text" class="form-control" name="meta_description"
                        placeholder="Enter Meta Description">
                </div>
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
