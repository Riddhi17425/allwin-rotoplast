@extends('layouts.adminHeader')
@section('content')
<section class="content">
<div class="container-fluid">
    
<div class="row">
<div class="col-lg-3 col-6">
    <div class="small-box bg-info">
    <div class="inner">
        <h3>{{ $productcount ?? '' }}</h3>
        <p>Total Products</p>
    </div>
    <div class="icon">
        <i class="ion ion-bag"></i>
    </div>
        <a href="#" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
    
</div>
</div>
</section>
@endsection

@section('sidebar')
@extends('layouts.adminSidebar')
@endsection

@section('footer')
    @include('layouts.adminFooter')
@endsection
