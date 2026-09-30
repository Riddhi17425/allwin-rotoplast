@extends('layouts.adminHeader')
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title  float-left">Edit Video</h3>
            <a href="{{ url('admin/displayvideo') }}" class="btn btn-default float-right">Back</a>
        </div>
        <div class="card-body">
            <form id="video-form" method="post" action="{{ url('admin/updatevideo/') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Video Title</label>
                                    <input type="text" class="form-control" placeholder="Video Title" name="video_title"
                                        value="{{ $data->video_title }}">
                                        @if ($errors->has('video_title'))
                                        <span class="text-danger">{{ $errors->first('video_title') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1"
                                            onclick="changesection()" value="youtube"
                                            {{ $data->youtube_video_link == '' ? '' : 'checked' }}>
                                        <label class="form-check-label">Youtube Video Link</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" onclick="changesection()"
                                            name="radio1" value="upload" {{ $data->upload_video == '' ? '' : 'checked' }}>
                                        <label class="form-check-label">Upload Video</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-6" id="youtube-video-section"
                                style="{{ $data->youtube_video_link == '' ? 'display:none;' : '' }}">
                                <div class="form-group">
                                    <label>Youtube Video Link</label>
                                    <input type="text" class="form-control"
                                        placeholder="Youtube Embed Video Link ex:https://www.youtube.com/embed/1l-SzmesgAk"
                                        name="youtube_video_link" value="{{ $data->youtube_video_link }}">
                                        @if ($errors->has('youtube_video_link'))
                                        <span class="text-danger">{{ $errors->first('youtube_video_link') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6" id="upload-video-section"
                                style="{{ $data->upload_video == '' ? 'display:none;' : '' }}">
                                <div class="form-group">
                                    <label>Upload Video</label>
                                    <input type="file" name="upload_video" class="form-control" />
                                    @if ($errors->has('upload_video'))
                                        <span class="text-danger">{{ $errors->first('upload_video') }}</span>
                                    @endif
                                </div>
                            </div>
                            <a data-toggle="modal" data-target="#videoModal{{ $data->id }}"
                                style="color:#007bff">{{ $data->upload_video }}</a>
                            <div class="modal fade" id="videoModal{{ $data->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="videoModal{{ $data->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="videoModal{{ $data->id }}">
                                                {{ $data->video_title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe width="560" height="315"
                                                src="{{ asset('public/uploaded video/' . $data->upload_video) }}" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
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
@section('script')
    <script>
        function changesection() {
            //$('#upload-video-section').hide();
            $('input[type=radio][name=radio1]').change(function() {
                if (this.value === 'youtube') {
                    $('#youtube-video-section').show();
                    $('#upload-video-section').hide();
                } else if (this.value === 'upload') {
                    $('#youtube-video-section').hide();
                    $('#upload-video-section').show();
                }
            });
        }
        // $(document).ready(function() {
        //     $('#upload-video-section').hide();
        //     $('input[type=radio][name=radio1]').change(function() {
        //         if (this.value === 'youtube') {
        //             $('#youtube-video-section').show();
        //             $('#upload-video-section').hide();
        //         } else if (this.value === 'upload') {
        //             $('#youtube-video-section').hide();
        //             $('#upload-video-section').show();
        //         }
        //     });
        // });
    </script>
@endsection
