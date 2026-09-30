@extends('layouts.adminHeader')
@section('sidebar')
    @extends('layouts.adminSidebar')
@endsection
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title float-left">Edit Blog</h3>
            <a href="{{ route('admin/blog') }}" class="btn btn-default float-right">Back</a>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('admin/updateblog') }}">
                @csrf
                <input type="hidden" id="blogid" name="id" value="{{ $data->id }}">
                <div class="row">

                    <div class="col-sm-12 form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" require placeholder="Enter Title"
                            value="{{ $data->title }}">
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="col-sm-12 form-group">
                        <label>Description</label>
                        <textarea id="summernote" name="description" class="textarea"> {!! $data->description !!}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6"> 
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Blog Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="blogimage" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <img src="{{ asset('public/images/' . $data->image) }}" width="50px" height="50px">
                    </div>
                    <div class="col-sm-6"> 
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Blog front Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="blogimage_front" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <img src="{{ asset('public/images/' . $data->front_image) }}" width="50px" height="50px">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>CTA Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="cta_image" id="ctaImage">
                                <label class="custom-file-label" for="ctaImage">Choose file</label>
                            </div>
                        </div>
                        @if($data->cta_image)
                            <img src="{{ asset('public/images/' . $data->cta_image) }}" width="50px" height="50px">
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Publish Date</label>
                            <div class="input-group" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="publish_date" class="form-control date"
                                    data-target="#reservationdate" value="{{ $data->publish_date }}" />
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
                                <option value="Active" {{ ($data->status ?? 'Active') == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="InActive" {{ ($data->status ?? 'Active') == 'InActive' ? 'selected' : '' }}>InActive</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" class="form-control" name="url" require placeholder="Enter Url"
                                value="{{ $data->url }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Short Description</label>
                            <input type="text" class="form-control" name="short_description" require
                                placeholder="Enter Short Description" value="{{ $data->short_description }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label>Conclusion</label>
                        <textarea name="conclusion" class="textarea">{!! $data->conclusion !!}</textarea>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-sm-6">
                        <!-- checkbox -->
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="is_publish"
                                    type="checkbox"{{ $data->is_publish == 0 ? 'checked' : '' }}>
                                <label class="form-check-label">Is Publish</label>
                            </div>
                        </div>
                    </div> --}}
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
