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
                <h3 class="card-title">Social Media Listing</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 30px;margin: 0 auto;">
                    <div class="input-group-append">
                    <a href="{{ route('admin/addsocialmedia')}}"><i class="far fa-plus-square"></i></a>
                    </div>
                  </div>
                </div>
              </div>
             
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>name</th>
                      <th>link</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key=>$val)
                    <tr>
                      <td >{{ $key + 1 }}</td>
                      <td>{{ $val->socialname }}</td>
                      <td>{{ $val->link }}</td>
                      <td><a href="{{ url('admin/editsocialmedia/'.$val->id) }}"><i class="far fa-edit"></i></a> | <a href="{{ url('admin/deletesocialmedia/'.$val->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
               </div>
               {{ $data->links()}}
            </div>
           </div>
  
  
</div>
@endsection

@section('footer')
    @include('layouts.adminFooter')
@endsection
