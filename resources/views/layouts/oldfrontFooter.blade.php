<?php
$contact = DB::select(DB::raw("SELECT * FROM `cms`"));
$countries = DB::select(DB::raw("SELECT name from countries"));
$productname = DB::select(DB::raw("SELECT product_name from product "));
$subproduct = DB::select(DB::raw("SELECT category_name from categories "));

// WHERE id = :id"), ['id' => $id])
?>
<footer class="footer_wrapper">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 custom_col_left">
                <div class="footer_left custome-container py-5">
                    <div class="company_details">
                        <div>
                            <img src="{{ asset('public/front/images/footer_logo.png') }}" alt="" srcset="" width="76%">
                        </div>
                        <hr class="footer_hr_line" />

                        {{-- <div class="detail_content my-4">
                            <img src="{{ asset('public/front/images/location.png') }}" />
                            <address class="mb-0">753/B, B/h. Cadila Corporate Campus,
                                Sarkhej-Dholka Road, Vill.: Bhat, Tal: Daskroi,
                                Ahmedabad-382210, Gujarat, India</address>
                        </div>


                        <div class="detail_content my-4">
                            <i class="fa fa-solid fa-phone" style="color: #ffffff;"></i>
                            <div>
                                <a href="tel:+919426177529">+91 94261 77529</a><br />
                                <a href="tel:+918469000194">+91 84690 00194</a>
                            </div>
                        </div>


                        <div class="detail_content my-4">
                            <i class=" fa fa-solid fa-envelope" style="color: #ffffff;"></i>
                            <div>
                                <a href="mailto:info@allwinrotoplast.com">info@allwinrotoplast.com</a>
                            </div>
                        </div> --}}

                         {!!$contact[1]->description!!}

                        <div class="social_icons mb-5">
                            <ul class="position-relative">
                                    <li><a><i class="fa fa-brands fa-facebook-f" style="color: #ffffff;"></i></a></li>
                                <li><a><i class="fa fa-brands fa-twitter" style="color: #ffffff;"></i></a></li>
                                <li><a><i class="fa fa-google-plus" style="color: #ffffff;"></i></a></li>
                                <li><a><i class="fa fa-brands fa-instagram" style="color: #ffffff;"></i></a></li>
                                <li><a><i class="fa fa-linkedin" style="color: #ffffff;"></i></a></li>
                            </ul>
                        </div>

                        <hr class="footer_hr_line" />

                        <div class="footer_copyright">
                            <p> {{ date('Y')}} © Copyright Allwin Roto Plast All rights Reserved.</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 custom_col_right">
                <div class="footer_right custome-container py-5">
                    <h3>Get a free quote…!</h3>
                    <div>
                        <div class="row">
                            <div class="">
                                <form class="footer_contact_form mt-4" action="javascript:void(0)" id="quoteform" method="POST">
                                    <div class="mb-4">
                                        <input type="text" class="form-control" name="name" required id="name" placeholder="Full Name " aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <input type="email" class="form-control" required name="email" id="email" placeholder="Email Address" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <input type="number" class="form-control" name="phone" required id="phone" placeholder="Phone" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <select class="form-select" name="country" required id="country" aria-label="Default select example">
                                            <option selected>Select Country</option>
                                                @foreach($countries as $ke=>$vl)
                                                <option  value="{{ $vl->name }}">{{ $vl->name }}</option>
                                                @endforeach

                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <textarea type="text" class="form-control" name="message" required id="message" placeholder="Requirement" rows="3" aria-describedby="emailHelp"></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            checkbox
                                        </label>
                                    </div>
                                    <button  class="btn" onclick="submitinquiry()">Submit Now</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- product price --}}


    <div class="quote_modal">
        <div class="modal fade" id="ProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h2>Ask a price....</h2>
                        <form class="footer_contact_form mt-4" action="javascript:void(0)" id="productprice" method="post">
                            <div class="mb-4">
                                <input type="text" class="form-control" required name="your_name" id="your_name" placeholder="Full Name " aria-describedby="emailHelp">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" required  name="product_name" id="product_name" placeholder="Product Name " aria-describedby="emailHelp" readonly>
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control" required name="mail_id"  id="mail_id" placeholder="Email Address" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-4">
                                <input type="number" class="form-control" required name="mobilenumber" id="mobilenumber" placeholder="Phone" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-4">
                                <select class="form-select" name="countryName" required id="countryName" aria-label="Default select example">
                                    <option selected>Select Country</option>
                                        @foreach($countries as $ke=>$vl)
                                        <option value="{{ $vl->name }}">{{ $vl->name }} 
                                        </option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <textarea type="text" class="form-control"  required name="requirment" id="requirment" placeholder="Requirement" rows="3" aria-describedby="emailHelp"></textarea>
                            </div>
                            <div class="mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    checkbox
                                </label>
                            </div>
                            <button class="btn quote_btn" onclick="productprice()">Submit Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="request-popup">
        <div class="modal fade" id="request-btn">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <form  class="mt-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="text" required="" class="controlForm" id="name"
                                    placeholder="Your Name*" name="name">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="number" required="" class="controlForm" id="Phone"
                                    placeholder="Phone Number*" name="Phone">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="email" required="" class="controlForm" id="email"
                                    placeholder="Email Address*" name="email">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="text" required="" class="controlForm" id="currentbusiness"
                                    placeholder="Current business" name="currentbusiness">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="text" required="" class="controlForm" id="experience"
                                    placeholder="Year of experience*" name="experience">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="text" required="" class="controlForm" id="capacity"
                                    placeholder="Turnover & Investment Capacity" name="Capacity">
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="submit">
                                    <input type="submit" value="Submit Inquiry" class="submit-inquiry">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>

  <!-- quote btn popup form -->

  <div class="quote_modal">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>Get a free quote…!</h2>
                    <form class="footer_contact_form mt-4" action="javascript:void(0)" id="inquiryqoute" method="post">
                        <div class="mb-4">
                            <input type="text" class="form-control" required name="fullname" id="fullname" placeholder="Full Name" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <select class="form-select" required name="product" id="product" aria-label="Default select example">
                                <option selected>Select Product</option>
                                @foreach($productname as $ke=>$vl)
                                <option  value="{{ $vl->product_name }}">{{ $vl->product_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <select class="form-select"  required name="sub_product" id="sub_product" aria-label="Default select example">
                                <option selected>Select Sub Product</option>
                                @foreach($subproduct as $ke=>$vl)
                                <option  value="{{ $vl->category_name }}">{{ $vl->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control" required name="mail"  id="mail" placeholder="Email Address" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <input type="number" class="form-control" required name="mobile" id="mobile" placeholder="Phone" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <select class="form-select" name="countries" required id="countries"  aria-label="Default select example">
                                <option selected>Select Country</option>
                                @foreach($countries as $ke=>$vl)
                                <option  value="{{ $vl->name }}">{{ $vl->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <textarea type="text" class="form-control"  required name="requirments" id="requirments" placeholder="Requirement" rows="3" aria-describedby="emailHelp"></textarea>
                        </div>
                        <div class="mb-4">
                            <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                checkbox
                            </label>
                        </div>
                        <button class="btn quote_btn" onclick="inquiryqoute()">Submit Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

   <!-- downlaod catalogue popup -->

   <div class="catalogue_modal">
    <div class="modal fade" id="catalogueModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Catalogue Request Form…!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="footer_contact_form mt-4" action="javascript:void(0)" id="catalogue" method="post">
                        <div class="mb-4">
                            {{-- id="catalogueTitle" --}}
                            <input type="text" class="form-control" name="catalogueTitle" required id="catalogueTitle" placeholder="Full Name" aria-describedby="emailHelp" readonly>
                        </div>
                        <div class="mb-4">
                            <input type="text" class="form-control" required id="full_name" name="full_name" placeholder="Full Name " aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control" required id="email_address" name="email_address" placeholder="Email Address" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <input type="number" class="form-control mob" required id="mob" name="mob" placeholder="Phone" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <select class="form-select" id="country_name" required  name="country_name"  aria-label="Default select example">
                                <option selected>Select Country</option>
                                @foreach($countries as $ke=>$vl)
                                <option  value="{{ $vl->name }}">{{ $vl->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                checkbox
                            </label>
                        </div>
                        <button class="btn quote_btn" onclick="catalogue()">Submit Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- quote btn popup form -->


<!-- product ask for price btn popup form -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('public/front/js/custom.js') }}"></script>
<script src="{{ asset('public/front/js/jquery.glasscase.min.js') }}" type="text/javascript"></script>
<!-- bootstrap cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- bootstrap cdn -->
<!-- swiper slider -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



{{-- catelouge --}}
<script type="text/javascript">
    function catalogue(){
        $("#catalogue").submit(function (event) {
            var formData = {
            catalogueTitle: $("#catalogueTitle").val(),
            full_name: $("#full_name").val(),
            email_address: $("#email_address").val(),
            mob: $(".mob").val(),
            country_name: $("#country_name").val(),
            _token: "{{ csrf_token() }}"
            };
            $.ajax({
            type: "POST",
            url: "{{ url('/cataloguestore') }}",
            data: formData,
            dataType: "json",
            encode: true,
            }).done(function (data) {
                document.getElementById("catalogue").reset();
                $('.btn-close').click();
                toastr.info(data.message);
            });
            event.preventDefault();
        });
    }
</script>



{{-- inquiry inquiryqoute --}}
<script type="text/javascript">
    function inquiryqoute(){
        $("#inquiryqoute").submit(function (event) {
            var formData = {
            fullname: $("#fullname").val(),
            product: $("#product").val(),
            sub_product: $("#sub_product").val(),
            mail: $("#mail").val(),
            mobile: $("#mobile").val(),
            countries: $("#countries").val(),
            requirments: $("#requirments").val(),
            _token: "{{ csrf_token() }}"
            };
            $.ajax({
            type: "POST",
            url: "{{ url('/inquiryqoutestore') }}",
            data: formData,
            dataType: "json",
            encode: true,
            }).done(function (data) {
                document.getElementById("inquiryqoute").reset();
                $('.btn-close').click();
                toastr.info(data.message);
            });
            event.preventDefault();
        });
    }
</script>

{{-- productprice inquiry --}}
<script type="text/javascript">
function productprice(){
    $("#productprice").submit(function (event) {
        var formData = {
        your_name: $("#your_name").val(),
        product_name: $("#product_name").val(),
        mail_id: $("#mail_id").val(),
        mobilenumber: $("#mobilenumber").val(),
        countryName: $("#countryName").val(),
        requirment: $("#requirment").val(),
        _token: "{{ csrf_token() }}"
        };
        $.ajax({
        type: "POST",
        url: "{{ url('/submitproductprice') }}",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (data) {
            document.getElementById("productprice").reset();
            $('.btn-close').click();
            toastr.info(data.message);
        });
        event.preventDefault();
    });
}
</script>

<script type="text/javascript">
function submitinquiry(){
    $("#quoteform").submit(function (event) {
        var formData = {
        name: $("#name").val(),
        email: $("#email").val(),
        phone: $("#phone").val(),
        country: $("#country").val(),
        message: $("#message").val(),
        _token: "{{ csrf_token() }}"
        };
        $.ajax({
        type: "POST",
        url: "{{ url('/submitenquiry') }}",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (data) {
            document.getElementById("quoteform").reset();
            toastr.info(data.message);
        });
        event.preventDefault();
    });
}
</script>

<script>
    (function($) {
        $(function() {

            //  open and close nav 
            $('#navbar-toggle').click(function() {
                $('nav ul').slideToggle();
            });


            // Hamburger toggle
            $('#navbar-toggle').on('click', function() {
                this.classList.toggle('active');
            });


            // If a link has a dropdown, add sub menu toggle.
            $('nav ul li a:not(:only-child)').click(function(e) {
                $(this).siblings('.navbar-dropdown').slideToggle("slow");

                // Close dropdown when select another dropdown
                $('.navbar-dropdown').not($(this).siblings()).hide("slow");
                e.stopPropagation();
            });


            // Click outside the dropdown will remove the dropdown class
            $('html').click(function() {
                $('.navbar-dropdown').hide();
            });
        });
    })(jQuery);
</script>

<!-- header script -->

<script>
    var swiper = new Swiper('.swiper', {
        // Default parameters
        slidesPerView: 3,
        paginationClickable: true,
        speed: 300,
        autoplay: {
            delay: 2000,
        },
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
        breakpoints: {
            180: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 40,
                centeredSlidesBounds: true,
            }
        }
    })
</script>

<!-- swiper-two -->
<script>
    var swiper = new Swiper('.swiper-two', {
        // Default parameters
        slidesPerView: 3,
        paginationClickable: true,
        speed: 300,
        autoplay: {
            delay: 2000,
        },
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
        breakpoints: {
            180: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 20,
                centeredSlidesBounds: true,
            }
        }
    })
</script>


<!-- swiper-three -->
<script>
    var swiper = new Swiper('.swiper-three', {
        // Default parameters
        slidesPerView: 5,
        paginationClickable: true,
        speed: 300,
        autoplay: {
            delay: 2000,
        },
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
        breakpoints: {
            180: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 4,
                spaceBetween: 10,
                centeredSlidesBounds: true,
            }
        }
    })
</script>


<script>
    $('.display1').glassCase({
        'widthDisplay': 370,
        'heightDisplay': 550,
        'isSlowZoom': true,
        'isSlowLens': true,
        'capZType': 'in',
        'isHoverShowThumbs': true,
        'colorIcons': '#fff',
        'colorActiveThumb': '#333',
        'thumbsPosition': 'left',
        'zoomPosition': 'right'
    });
</script>
<!-- swiper slider -->



</body>

</html>