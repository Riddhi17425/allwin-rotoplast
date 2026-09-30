@include('layouts.frontheader')
@include('layouts.frontMenu')

<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{ url('/')}}">Home</a> / Contact</p>
            </div>
        </div>
    </div>
</section>
<section>
    <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2991.6566585876917!2d72.45968752896582!3d22.871001576715123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e91649f34d861%3A0x91778cbb1b1d3666!2sAllwin%20Roto%20Plast!5e1!3m2!1sen!2sin!4v1684234289393!5m2!1sen!2sin"style="border:0;" allowfullscreen="" loading="lazy"  referrerpolicy="no-referrer-when-downgrade" class="map_size"></iframe>
    </div>
</section>
<section class="mt-5">
    <div class="container">
        <div class="contact_details">
                <h1 class="effect-shine">Get in touch with us</h1>
            </div>
            <p class="my-3">We would love to be in touch with you!</p>
        <div class="contact_info">
            <div class="">
                <div class="details_wrapper">
                    <div class=" hvr-float-shadow">
                    <img src={{ asset('public/front/images/call-icon.png')}} class="img-fluid "  alt="call">
                    </div>
                    <div class="comman_space">
                        <h4>Phone</h4>
                         <a href="tel:+91-9712930708"> +91-9712930708</a><br />
                        <a href="tel:+91-9687640802"> +91-9687640802</a>
                        <!--<a href="tel:+91-9426177529"> +91-9426177529</a><br />-->
                        <!--<a href="tel:+91-84690 00194"> +91-84690 00194</a>-->
                    </div>
                </div>
            </div>
            <div class="">
                <div class="details_wrapper">
                    <div class="hvr-float-shadow">
                    <img src={{ asset('public/front/images/location-icon.png')}} class="" alt="location">
                    </div>
                    <div class="comman_space">
                        <h4>Our location</h4>
                        <address>753/B, B/h. Cadila Corporate Campus, Sarkhej-Dholka Road, Vill.: Bhat, Tal: Daskroi, Dist.: Ahmedabad-382210, India </address>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="details_wrapper">
                    <div class=" hvr-float-shadow">
                    <img src={{ asset('public/front/images/msg-icon.png')}} class="img-fluid" alt="mail">
                    </div>
                    <div class="comman_space">
                        <h4>Mail</h4>
                        <a href="mailto:sales@allwinrotoplast.com">sales@allwinrotoplast.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('layouts.frontfooter')

