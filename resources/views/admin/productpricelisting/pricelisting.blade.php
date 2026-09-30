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
                <h3 class="card-title">Inquiry</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 30px;margin: 0 auto;">
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mt-1 mb-4">
                    <div class="relative max-w-xs pl-2 pt-2">
                        <form action="{{route('admin/searchinquirylist')}}" method="GET">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" name="s" class="block w-full p-2  text-sm" placeholder="Search..." />
                            <button name="search" class="btn btn-default">Search</button>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Name</th>
                            <th>Product Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Country</th>
                            <th>Requirment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($price as $key => $val)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $val->your_name }}</td>
                            <td>{{ $val->product_name}}</td>
                            <td>{{ $val->mail_id }}</td>
                            <td>{{ $val->mobilenumber }}</td>
                            <td>{{ $val->countryName}}</td>
                            <td>{{ $val->requirment}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
           
            <!-- /.card-body -->
        </div>
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