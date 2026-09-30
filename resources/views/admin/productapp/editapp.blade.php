@extends('layouts.adminHeader')
@section('sidebar')
    @extends('layouts.adminSidebar')
@endsection
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit App Product</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('admin/updateapp',$data->id) }}" >
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="row">         
                   <div class="col-sm-6 form-group">
                        <label>Category Name</label>
                        <select class="form-select select2-hidden-accessible" id="multiple-select-field2" data-placeholder="Choose Category Name" name="category_id[]" multiple="" data-select2-id="select2-data-multiple-select-field2" tabindex="-1" aria-hidden="true">
                            @php
                                $selectedIds = explode(',', $data->category_id);
                            @endphp
                            @foreach($category as $categories)
                                @php
                                    $selected = in_array($categories->id, $selectedIds);
                                @endphp
                                <option value="{{$categories->id}}" {{ $selected ? 'selected' : '' }}>
                                    {{$categories->category_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
               
             <div class="col-sm-6 form-group">
                      <label>Application Product Name</label>
                      <input type="text" class="form-control" name="name" require placeholder="Enter Product Name" value="{{$data->name}}">
                      @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                      @endif
                    </div>                  
                  </div>
                <div class="row">
                
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Image</label>
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image[]" id="customFile"
                              multiple>
                          <label class="custom-file-label" for="customFile">Choose image</label>
                      </div>
                      @if ($errors->has('image'))
                          <span class="text-danger">{{ $errors->first('image') }}</span>
                      @endif
                      @php
                          $images = explode(',', $data->image);
                      @endphp
                      @foreach($images as $image)
                        <label for="current_image">Current Image:</label>
                        <img src="{{ asset('public/appimage/' . $image)  }}" alt="Current Image" style="height:30px">
                    @endforeach
                        @if ($errors->has('image'))
                          <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
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
@section('script')
    <script>
     
        $('#multiple-select-field2').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
@endsection