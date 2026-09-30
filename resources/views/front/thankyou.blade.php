@include('layouts.frontheader')
@include('layouts.frontMenu')

<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{ url('/')}}">Home</a> / Thank You</p>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-124 col-sm-12">
                <h1 style="text-align: center; font-weight: 900;" class="mb-4">Thank You</h1>
               <h2 style="text-align: center;"><strong>Your enquiry has been submitted successfully.<br>
We will get in touch with you shortly.</strong></h2>
            </div>
        </div>
    </div>
</section>
@include('layouts.frontfooter')
