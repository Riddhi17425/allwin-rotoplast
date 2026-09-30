@extends('layouts.adminHeader')
<style>
    table {
       width: 300px;
    }
    
    table.fixed {
        table-layout: fixed;
    }
    table, th, td{
        border: 1px solid black;
    }
        </style>
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
        <h3 class="card-title">Cms Page Listing</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 30px;margin: 0 auto;">
            <div class="input-group-append">
              <a href="{{ route('admin/addcms')}}"><i class="far fa-plus-square"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Page Name</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $key=>$val)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $val['pagename'] }}</td>
              <td>{!! $val['description'] !!}</td>
              <td><a href="{{ url('admin/editcms/'.$val['id']) }}"><i class="far fa-edit"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
@include('layouts.adminFooter')
@endsection