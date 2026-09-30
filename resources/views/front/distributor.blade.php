@include('layouts.frontheader')
@include('layouts.frontMenu')

@php
$countries = DB::select(DB::raw("SELECT name from countries"));
@endphp
<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{ url('/')}}">Home</a> / Distributor</p>
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
            <h1 class="effect-shine">Business Opportunity</h1>
        </div>
        <div >
    <form method="post" enctype="multipart/form-data" action="{{ route('distributorstore') }}" id="distributor_form">
    @csrf
    <input type="hidden" name="type" value="distributor">
    
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="mb-4">
                <input type="text" class="form-control" name="name" placeholder="Full Name*" >
                <span class="text-danger error-name"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="mb-4">
                <input type="email" class="form-control" name="email" placeholder="Email Address*" >
                <span class="text-danger error-email"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="mb-4">
                <input type="number" class="form-control" name="phone" placeholder="Phone*" min="10" >
                <span class="text-danger error-phone"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="mb-4">
                <select class="form-select" name="country" >
                    <option value="" selected>Select Country</option>
                    @foreach($countries as $ke=>$vl)
                    <option value="{{ $vl->name }}">{{ $vl->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger error-country"></span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="mb-4">
                <textarea class="form-control" placeholder="Requirement*" name="requirment" style="height: 150px" ></textarea>
                <span class="text-danger error-requirment"></span>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <div class="g-recaptcha" data-sitekey="6Lc_PvonAAAAAOm_L-O6spxZ0HPtBN-IXrsOH7Y-"></div>
        <span class="text-danger error-recaptcha"></span>
    </div>

    <button type="submit" class="btn common_btn">Submit Now</button>
    <div id="success-message" class="text-success mt-3"></div>
</form>


        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $('#distributor_form').on('submit', function (event) {
            event.preventDefault(); // Prevent form reload

            $('.text-danger').text(''); // Clear error messages
            $('#success-message').text('');

            var formData = $(this).serialize();
            var recaptchaResponse = grecaptcha.getResponse();

            $.ajax({
                url: "{{ route('distributorstore') }}",
                method: "POST",
                data: formData,
                beforeSend: function () {
                    $('.common_btn').attr('disabled', true);
                },
                success: function (response) {
                    $('.common_btn').attr('disabled', false);

                    if (response.success) {
                        window.location.href = response.redirect; 
                    }
                },
                error: function (xhr) {
                    $('.common_btn').attr('disabled', false);
                    
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let hasOtherErrors = false;

                        for (let key in errors) {
                            if (key === 'g-recaptcha-response') continue;
                            $('.error-' + key).text(errors[key][0]);
                            hasOtherErrors = true;
                        }

                        if (!hasOtherErrors && !recaptchaResponse) {
                            $('.error-recaptcha').text('Please complete the reCAPTCHA.');
                        }
                    } else {
                        $('#success-message').text('Something went wrong. Please try again.');
                    }
                }
            });
        });
    });
</script>
@include('layouts.frontfooter')
@include('layouts.popupmodal')