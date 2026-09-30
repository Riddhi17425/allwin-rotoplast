@extends('layouts.adminHeader')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product Listing</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 30px;margin: 0 auto;">
                            <div class="input-group-append">
                                <a href="{{ route('admin/productcreate') }}"><i class="far fa-plus-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th style="width: 10px">Id</th>
                                <th>Application Name</th>
                                <th>Application Image</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $val)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $val->name }}</td>
                                    <?php $images = explode(',', $val->image); ?>
                                    <td>
                                        @foreach ($images as $image)
                                            <img src="{{ asset('public/appimage/' . $image) }}" alt="{{ $image }}"
                                                style="height:60px">
                                        @endforeach
                                    </td>
                                    <td><a href="{{ url('/admin/editapp/' . $val->id) }}"><i class="far fa-edit"
                                        aria-hidden="true"></i> | </a>

                                        <a href="{{ url('admin/deleteapp/'.$val['id']) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i></a>        
                                    </td>
                                  
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
               
                <!-- /.card-body -->
            </div>
            {{$data->links()}}
            <!-- /.card -->

            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('sidebar')
    @extends('layouts.adminSidebar')
@endsection
@section('footer')
    @include('layouts.adminFooter')
@endsection
