@extends('layouts.adminHeader')
@section('content')
    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }

        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }
    </style>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Add Certificate</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="video-form" method="post" action="{{ route('admin/storecasestudy') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Case Study Name</label>
                                    <input type="text" class="form-control" placeholder="Please Enter Here Case Study Name" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Case Study Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image[]" id="customFile"
                                    multiple>
                                <label class="custom-file-label" for="customFile">Choose image</label>
                            </div>
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        </div>
                        </div>
                    </div>
            
                    <input type="hidden" name="cropped_image" id="cropped_image">
            
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Crop Image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="img-container">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Cropper.js -->
    <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">
    <script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>

    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        
        // Event listener for image selection
        $("body").on("change", ".image", function(e) {
            var files = e.target.files;
            if (files && files.length > 0) {
                var file = files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                    $modal.modal('show');
                };
                reader.readAsDataURL(file);
            }
        });
        
        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });
        
        // Event listener for form submission
        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                // Replace the image with the cropped image
                image.src = url;
                $('#cropped_image').val(base64data);
                // Hide the modal
                $modal.modal('hide');
                }
            });
        });
    </script>   
@endsection
