@extends('layouts.adminHeader')
@section('sidebar')
    @extends('layouts.adminSidebar')
@endsection
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('admin/updateproduct',$data->id) }}" >
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="row">        
                  <div class="col-sm-6">
                    <label>Category Name</label>
                    <select class="form-select" id="multiple-select-field" data-placeholder="Choose Category Name"  name="category_id">
                    @foreach ($category as $categories)
                    <option value="{{ $categories->id }}" {{ ($categories->id == $data->category_id) ? 'selected':'' }}>{{ $categories->category_name }}</option>
                    @endforeach
                    </select>
                 </div>   
                    <div class="col-sm-6 form-group">
                      <label>Product Name</label>
                      <input type="text" class="form-control" name="product_name" require placeholder="Enter Product Name" value="{{$data->product_name}}">
                      @if ($errors->has('product_name'))
                          <span class="text-danger">{{ $errors->first('product_name') }}</span>
                      @endif
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>Product Description</label>
                        <textarea id="summernote" name="product_description" class="textarea"> {{ $data->product_description}}</textarea>
                        @if ($errors->has('product_description'))
                            <span class="text-danger">{{ $errors->first('product_description') }}</span>
                        @endif
                    </div>                    
                  </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Product Code</label>
                            <input type="text" class="form-control" name="product_code" require placeholder="Enter Product Code" value="{{$data->product_code}}">
                            @if ($errors->has('product_code'))
                                <span class="text-danger">{{ $errors->first('product_code') }}</span>
                            @endif
                        </div>
                    </div>
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Product Image</label>
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" name="product_image[]" id="customFile"
                              multiple>
                          <label class="custom-file-label" for="customFile">Choose image</label>
                      </div>
                      @if ($errors->has('product_image'))
                          <span class="text-danger">{{ $errors->first('product_image') }}</span>
                      @endif
                      @php
                          $images = explode(',', $data->product_image);
                      @endphp
                      @foreach($images as $image)
                        <label for="current_image">Current Image:</label>
                        <img src="{{ asset('public/Product_Images/' . $image)  }}" alt="Current Image" style="height:30px">
                    @endforeach
                        @if ($errors->has('product_image'))
                          <span class="text-danger">{{ $errors->first('product_image') }}</span>
                        @endif
                    </div>
                  </div>                  
                </div>
                <div class="row">
                    <div class="col-sm-6">
                      <label>Product Color</label>
                      <select class="form-select" id="multiple-select-field2" data-placeholder="Choose product color"  name="product_color[]" multiple>
                        @foreach ($values as $value)
                          <option value="{{ $data->product_color }}" {{ ($data->product_color == $data->product_color) ? 'selected':'' }}> {{ $value }}</option>
                        @endforeach
                            <option value="red">Red</option>
                            <option value="light yellow">Light Yellow</option>
                            <option value="blue">Blue</option>
                            <option value="green">Green</option>
                            <option value="white">White</option>
                      </select>
                    </div>
                  <div class="col-sm-6 form-group">
                    <label>Product Short Description</label>
                    <input type="text" id="product_shortdescription" name="product_shortdescription" class="form-control" placeholder="Enter Product Short Description" value="{{$data->product_shortdescription}}"></textarea>
                    @if ($errors->has('product_shortdescription'))
                        <span class="text-danger">{{ $errors->first('product_shortdescription') }}</span>
                    @endif
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ $data->meta_title }}" placeholder="Enter Meta Title">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" class="form-control" name="meta_description" value="{{ $data->meta_description }}" placeholder="Enter Meta Description">
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>	Technical Details</label>
                        <textarea id="summernote" class="textarea"  name="technical_details">{{$data->technical_details}}</textarea>
                        @if ($errors->has('	technical_details'))
                            <span class="text-danger">{{ $errors->first('technical_details') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Features</label>
                            <textarea id="text" name="features"class="form-control">{{$data->features}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                            <label>Product Url</label>
                            <input type="text" class="form-control" name="producturl" require value="{{ $data->producturl }}" placeholder="Enter Product Url">
                            @if ($errors->has('producturl'))
                                <span class="text-danger">{{ $errors->first('producturl') }}</span>
                            @endif
                        </div>
                    </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Is Popular</label>
                        <div class="form-check">
                            <input type="checkbox" name="is_popular" {{( $data->is_popular == 1 ? ' checked' : '') }}>
                            <label class="form-check-label"> Check Popular</label>
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
        $('#multiple-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
        $('#multiple-select-field2').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
@endsection
