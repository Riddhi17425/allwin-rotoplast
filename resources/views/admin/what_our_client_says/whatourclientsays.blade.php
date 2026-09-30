@extends('layouts.adminHeader')
@section('sidebar')
    @extends('layouts.adminSidebar')
@endsection
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Add What Our Client Says</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('admin/storewhatourclientsays') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Client Name</label>
                            <input type="text" class="form-control" placeholder="Please Enter Here Client Name"
                                name="client_name">
                            @if ($errors->has('client_name'))
                                <span class="text-danger">{{ $errors->first('client_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Client Company Name</label>
                            <input type="text" class="form-control" placeholder="Please Enter Here Client Company Name"
                                name="client_company_name">
                            @if ($errors->has('client_company_name'))
                                <span class="text-danger">{{ $errors->first('client_company_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="summernote" name="description" class="textarea"></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary">Save</button>
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
