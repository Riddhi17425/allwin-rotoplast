@extends('layouts.adminHeader')
@section('content')
    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }

        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }
    </style>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Add Our Clients</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="video-form" method="post" action="{{ url('admin/storeclientlogo') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" class="form-control" placeholder="Please Enter Here Client Name" name="client_name">
                                    @if ($errors->has('client_name'))
                                        <span class="text-danger">{{ $errors->first('client_name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
            
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="client_logo">Client Logo/Image</label>
                                    <input type="file" name="client_logo" class="form-control image">
                                    @if ($errors->has('client_logo'))
                                        <span class="text-danger">{{ $errors->first('client_logo') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('sidebar')
    @extends('layouts.adminSidebar')
@endsection
@section('footer')
    @include('layouts.adminFooter')
@endsection