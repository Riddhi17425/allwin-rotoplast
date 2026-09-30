@include('layouts.frontheader')
@include('layouts.frontMenu')

@php
$countries = DB::select(DB::raw("SELECT name from countries"));
@endphp
<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{ url('/')}}">Home</a> / Joint Venture For Rotomold Product</p>
            </div>
        </div>
    </div>
</section>
<style>
    .error{
        color:red;
    }
</style>
<section>
 
    <div class="container">
        @if(session()->has('Success'))
            <div class="alert alert-success">
                {{ session()->get('Success') }}
            </div>
        @endif
        <div class="main_title">
            <h1 class="effect-shine">Joint Venture For Rotomold Product</h1>
        </div>
        <div >
            <form method="post" enctype="multipart/form-data" id="venture" action="{{ route('distributorstore') }}" class="distributor_form">
              @csrf
              <input type="hidden" name="type" value="venture">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="mb-4">
                    <input type="text" class="form-control" id="exampleInputText" name="name" aria-describedby="textHelp" placeholder="Full Name*">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="mb-4">
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email Address*">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="mb-4">
                    <input type="number" class="form-control" id="exampleInputNumber" name="phone" aria-describedby="numberHelp" placeholder="Phone*">
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="mb-4">
                    <select class="form-select" required id="country" name="country" aria-label="Default select example">
                      <option value='' selected>Select Country</option>
                      @foreach($countries as $ke=>$vl)
                      <option value="{{ $vl->name }}">{{ $vl->name }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('country'))
                        <span class="text-danger">{{ $errors->first('country') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="mb-4">
                    <textarea class="form-control" placeholder="Requirement*" name="requirment" id="floatingTextarea" style="height: 150px"></textarea>
                    @if ($errors->has('requirment'))
                        <span class="text-danger">{{ $errors->first('requirment') }}</span>
                    @endif
                  </div>
                </div>
              </div>
                  @php
                  $siteKey = env('RECAPTCHA_SITE_KEY');
                  @endphp
                  <div class="mb-4">
                    <div class="g-recaptcha" data-sitekey="{{ $siteKey }}"></div>
                  </div>
                  <button type="submit" class="btn common_btn">Submit Now</button>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
jQuery.noConflict();
(function($) {
  $(document).ready(function() {
    $('#venture').validate({
      rules: {
        name: 'required',
        email: 'required',
        phone: 'required',
        country: 'required',
        requirment: 'required',
        'g-recaptcha-response': 'required',
      },
      messages: {
        name: 'Please enter the name.',
        email: 'Please enter the email.',
        phone: 'Please enter the phone.',
        country: 'Please enter the country.',
        requirment: 'Please enter the requirement.',
        'g-recaptcha-response': {
          required: 'Please complete the reCAPTCHA.',
        },
      },
      submitHandler: function(form) {
        // If the form is valid, you can submit it
        if (grecaptcha.getResponse() == "") {
          toastr.warning('Please verify Captcha');
          return false;
        } else {
          form.submit();
        }
      }
    });
  });
})(jQuery);
</script>
@include('layouts.frontfooter')
