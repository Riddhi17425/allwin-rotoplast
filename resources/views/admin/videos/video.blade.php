@extends('layouts.adminHeader')
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Add Video</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="video-form" method="post" action="{{ url('admin/storevideo') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Video Title</label>
                                    <input type="text" class="form-control" placeholder="Video Title" name="video_title">
                                    @if ($errors->has('video_title'))
                                        <span class="text-danger">{{ $errors->first('video_title') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <!-- radio -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1" value="youtube"
                                            checked>
                                        <label class="form-check-label">Youtube Video Link</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1" value="upload">
                                        <label class="form-check-label">Upload Video</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="col-sm-6" id="youtube-video-section">
                                <div class="form-group">
                                    <label>Youtube Video Link</label>
                                    <input type="text" class="form-control"
                                        placeholder="Youtube Embedde Video Link ex:https://www.youtube.com/embed/1l-SzmesgAk"
                                        name="youtube_video_link">
                                        @if ($errors->has('youtube_video_link'))
                                        <span class="text-danger">{{ $errors->first('youtube_video_link') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6" id="upload-video-section">
                                <div class="form-group">
                                    <label>Upload Video</label>
                                    <input type="file" name="upload_video" class="form-control" />
                                    @if ($errors->has('upload_video'))
                                        <span class="text-danger">{{ $errors->first('upload_video') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </form>
        </div>
        <!-- /.card-body -->
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
        $(document).ready(function() {
            $('#upload-video-section').hide();
            $('input[type=radio][name=radio1]').change(function() {
                if (this.value === 'youtube') {
                    $('#youtube-video-section').show();
                    $('#upload-video-section').hide();
                } else if (this.value === 'upload') {
                    $('#youtube-video-section').hide();
                    $('#upload-video-section').show();
                }
            });
        });
    </script>
@endsection
