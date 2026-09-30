@extends('layouts.adminHeader')
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title  float-left">Edit Our Client</h3>
            <a href="{{ url('admin/displayourclient') }}" class="btn btn-default float-right">Back</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="video-form" method="post" action="{{ url('/admin/updateclientlogo')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $logo->id }}">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" class="form-control" placeholder="Please Enter Here Client Name" name="client_name" value="{{ $logo->client_name }}">
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
                                <img src="{{ asset('public/ClientLogo/' . $logo->client_logo) }}" alt="{{ $logo->client_name }}" width="50px" height="50px">
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