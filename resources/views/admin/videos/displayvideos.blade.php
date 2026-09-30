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
                    <h3 class="card-title">Display Video</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 30px;margin: 0 auto;">
                          <div class="input-group-append">
                          <a href="{{ url('admin/addvideo') }}"><i class="far fa-plus-square"></i></a>
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
                                <th>Video Title</th>
                                <th>Video</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($video as $key=>$videos)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $videos->video_title }}</td>
                                    <td>
                                        @if ($videos->youtube_video_link || $videos->upload_video)
                                        <br>
                                        <i class="far fa-eye" data-toggle="modal"
                                            data-target="#videoModal{{ $videos->id }}" style="color:#007bff"></i>
                                        <div class="modal fade" id="videoModal{{ $videos->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="videoModal{{ $videos->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="videoModal{{ $videos->id }}">
                                                            {{ $videos->video_title }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($videos->youtube_video_link)
                                                            <iframe height="400" width="500"
                                                                src="{{ $videos->youtube_video_link }}">
                                                            </iframe>
                                                        @elseif($videos->upload_video)
                                                            <iframe width="560" height="315"
                                                                src="{{ asset('public/uploaded video/' . $videos->upload_video) }}"
                                                                frameborder="0" allowfullscreen></iframe>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    </td>
                                    <td><a href="{{ url('admin/editVideo/' . $videos->id) }}"><i class="far fa-edit"
                                                aria-hidden="true"></i> | <a href="{{ url('admin/deletevideo/' . $videos->id) }}"
                                                onclick="return confirm('Are you sure you want to delete this video?')"
                                                class="far fa-trash-alt"></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $video->links()}}
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
