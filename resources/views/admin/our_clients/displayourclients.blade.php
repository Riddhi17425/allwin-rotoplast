@extends('layouts.adminHeader')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('success'))
              <div class="alert alert-success">
                  {{ session()->get('success') }}
              </div>
          @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Our Clients</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 30px;margin: 0 auto;">
                          <div class="input-group-append">
                          <a href="{{ route('admin/ourclients')}}"><i class="far fa-plus-square"></i></a>
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
                                <th>Name</th>
                                <th>Logo/Image</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($client as $key=>$clients)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $clients->client_name }}</td>
                                    <td><img src="{{ asset('public/ClientLogo/' . $clients->client_logo) }}" alt="{{ $clients->client_name }}" style="height:60px"></td>
                                    <td><a href="{{ url('admin/editclientlogo/' . $clients->id) }}"><i class="far fa-edit"
                                        aria-hidden="true"></i> | <a href="{{ url('admin/deletelogo/' . $clients->id) }}"
                                        onclick="return confirm('Are you sure you want to delete this logo/image?')"
                                        class="far fa-trash-alt"></a></td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                {{$client->links()}}
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
