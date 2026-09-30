@extends('layouts.adminHeader')
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title  float-left">Edit Certificate</h3>
            <a href="{{ route('admin/certificate') }}" class="btn btn-default float-right">Back</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form  method="post" action="{{ route ('admin/updatecertificate',$certificate->id) }}" enctype="multipart/form-data">
                @csrf
                {{-- <form method="post" enctype="multipart/form-data" action="{{ route('admin/updatecasestudy',$data->id) }}" >
                    @csrf --}}
                {{-- <input type="hidden" name="id" value="{{ $certificate->id }}"> --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Certificate Name</label>
                                    <input type="text" class="form-control" placeholder="Please Enter Here Certificate Name" name="certificate_name" value="{{ $certificate->certificate_name }}">
                                    @if ($errors->has('certificate_name'))
                                        <span class="text-danger">{{ $errors->first('certificate_name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                              <label>Certificate Logo</label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="certificate_logo[]" id="customFile"
                                      multiple>
                                  <label class="custom-file-label" for="customFile">Choose image</label>
                              </div>
                              @if ($errors->has('certificate_logo'))
                                  <span class="text-danger">{{ $errors->first('certificate_logo') }}</span>
                              @endif
                              @php
                                  $images = explode(',', $certificate->certificate_logo);
                              @endphp
                              @foreach($images as $image)
                                <label for="current_image">Current Image:</label>
                                <img src="{{ asset('public/CertificateLogo/' . $image)  }}" alt="Current Image" style="height:30px">
                            @endforeach
                                @if ($errors->has('certificate_logo'))
                                  <span class="text-danger">{{ $errors->first('certificate_logo') }}</span>
                                @endif
                            </div>
                          </div>          
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label>Check Download</label>
                                <div class="form-check">
                                <input type="checkbox" name="is_check" id="showFileCheckbox" {{( $certificate->is_check == 1 ? ' checked' : '') }}>
                                <label class="form-check-label">Check Download</label>
                                <div id="fileFieldContainer" style="display: none;">
                                    <input type="file" name="file" id="fileInput">
                                  </div>
                                  <div id="selectedFileName" style="display: none;"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-12">
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <div id="fileFieldContainer" style="display: none;">
                                        <label for="certificate_file">Certificate File</label>
                                        <input type="file"  name="certificate_file" class="form-control image">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                  <label>Certificate File</label>
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" name="certificate_file[]" id="customFile"
                                          multiple>
                                      <label class="custom-file-label" for="customFile">Choose image</label>
                                  </div>
                                  @if ($errors->has('certificate_file'))
                                      <span class="text-danger">{{ $errors->first('certificate_file') }}</span>
                                  @endif
                                  @php
                                      $images = explode(',', $certificate->certificate_file);
                                  @endphp
                                  @foreach($images as $image)
                                    <label for="current_image">Current Image:</label>
                                    <img src="{{ asset('public/CertificateFiles/' . $image)  }}" alt="Current Image" style="height:30px">
                                @endforeach
                                    @if ($errors->has('certificate_file'))
                                      <span class="text-danger">{{ $errors->first('certificate_file') }}</span>
                                    @endif
                                </div>

                              </div>          
                        </div>
                    </div>
        
                    {{-- <input type="hidden" name="cropped_image" id="cropped_image">
            
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
                    </div> --}}
            
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

{{-- for checkbox file upload --}}
<script>
    document.getElementById('showFileCheckbox').addEventListener('change', function() {
    var fileFieldContainer = document.getElementById('fileFieldContainer');
    if (this.checked) {
    fileFieldContainer.style.display = 'block';
    } else {
        fileFieldContainer.style.display = 'none';
        }
    });
</script>

{{-- <script>
    document.getElementById('showFileField').addEventListener('change', function() {
      var fileFieldContainer = document.getElementById('fileFieldContainer');
      if (this.checked) {
        fileFieldContainer.style.display = 'block';
      } else {
        fileFieldContainer.style.display = 'none';
      }
    });
  
    document.getElementById('fileInput').addEventListener('change', function() {
      var selectedFileName = document.getElementById('selectedFileName');
      if (this.files.length > 0) {
        selectedFileName.textContent = this.files[0].name;
        selectedFileName.style.display = 'block';
      } else {
        selectedFileName.textContent = '';
        selectedFileName.style.display = 'none';
      }
    });
</script> --}}

@endsection