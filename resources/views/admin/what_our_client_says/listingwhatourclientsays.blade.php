@extends('layouts.adminHeader')
@section('sidebar')
@extends('layouts.adminSidebar')
@endsection
@section('content')
<div class="row">
  
<div class="col-12">
          @if(session()->has('success'))
              <div class="alert alert-success">
                  {{ session()->get('success') }}
              </div>
          @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">What Our Client Say Listing</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 30px;margin: 0 auto;">
                    <div class="input-group-append">
                    <a href="{{ route('admin/addwhatourclientsay')}}"><i class="far fa-plus-square"></i></a>
                    </div>
                  </div>
                </div>
              </div>
             
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap fixed">
                  <thead>
                    <tr>
                      <th width="10%">ID</th>
                      <th>Client Name</th>
                      <th>Client Company Name</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       @foreach($clientsay as $key=>$clientsays)
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $clientsays->client_name }}</td>
                      <td>{{ $clientsays->client_company_name }}</td>
                      <td width="50%">{!!$clientsays->description!!}</td>
                      <td><a href="{{ url('admin/editwhatourclientsay/' . $clientsays->id) }}"><i class="far fa-edit"></i></a> | <a href="{{ url('admin/deletewhatourclientsays/' . $clientsays->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {{ $clientsay->links()}}
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
  
  
</div>
@endsection

@section('footer')
    @include('layouts.adminFooter')
@endsection
