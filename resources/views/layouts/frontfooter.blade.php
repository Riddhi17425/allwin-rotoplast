<?php
$contact = DB::select(DB::raw("SELECT * FROM `cms`"));
$countries = DB::select(DB::raw("SELECT name from countries"));
$productname = DB::select(DB::raw("SELECT * from `product`"));
$category = DB::select(DB::raw("SELECT category_name,id from categories "));
?>

@include('layouts.expopoup')

<div id="scroll_to_top">
    <i class="fa fa-angle-double-up" aria-hidden="true"></i>
</div>

 <section class="top-footer">
      <div class="container">
        <h4 class="uk-front-title text-center">Allwin Globally</h4>
        <hr>
        <div class="row">
          <div class="col-lg-4">
             <ul class="top-footer-list">
                <li><a href="{{ url('/uk/insulated-fish-tubs') }}">Insulated Fish Tubs Supplier In UK</a></li>
                <li><a href="{{ url('/uk/insulated-ice-boxes') }}">Insulated Ice Boxes Supplier </a></li>
                <li><a href="{{ url('/uk/plastic-pallets-supplier') }}">Plastic Pallets Supplier in the UK</a></li> 
              </ul>
          
          </div>
        </div>
      </div>
  </section>
<footer class="footer_wrapper">
<!--<a href="https://api.whatsapp.com/send?phone=918469000194&text=Inquiry%20from%20the%20website." target="_blank"> <img src="{{ asset('public/front/images/whatsapp.png')}}" alt="whatsapp" class="bottom-whatsapp"></a>-->
    <div class="container">
        <div class="row formsecup">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 custom_col_left">
                <div class="footer_left custome-container py-5">
                    <div class="company_details">
                        <div>
                            <img src="{{ asset('public/front/images/footer_logo.svg') }}" alt="Allwin Roto Plast logo" srcset="" width="76%">
                        </div>
                        <hr class="footer_hr_line" />

                        <div class="mainlocation">
                        <h3><div class="detail_content my-4"><img src="{{ asset('public/front/images/location.png') }}" style="padding: 0px; margin: 0px 30px 0px 0px;" alt="">
                        <address class="mb-0">753/B, B/h. Cadila Corporate Campus, Sarkhej-Dholka Road, Vill.: Bhat, Tal: Daskroi, Ahmedabad-382210, Gujarat, India</address></div>
                        <div class="detail_content my-4" ><span class="fa fa-solid fa-phone" style="color:#fff"></span>
                        <div style="padding: 0px; margin: 0px;">
                            <a href="tel:+919712930708" style="padding: 0px; margin: 0px; color: white; font-size: 20px;">+91 9712930708</a>
                            <br style="padding: 0px; margin: 0px;">
                            <a href="tel:+919687640802" style="padding: 0px; margin: 0px; color: white; font-size: 20px;">+91 9687640802</a>
                            <!--<a href="tel:+919426177529" style="padding: 0px; margin: 0px; color: white; font-size: 20px;">+91 94261 77529</a>-->
                            <!--<br style="padding: 0px; margin: 0px;">-->
                            <!--<a href="tel:+918469000194" style="padding: 0px; margin: 0px; color: white; font-size: 20px;">+91 84690 00194</a>-->
                            </div></div><div class="detail_content my-4"><span class=" fa fa-solid fa-envelope" style="color:#fff"></span><div style="padding: 0px; margin: 0px;"><a href="mailto:sales@allwinrotoplast.com" style="padding: 0px; margin: 0px; color: white; font-size: 20px;">sales@allwinrotoplast.com</a></div></div></h3></div>
                        <div class="social_icons mb-5">
                            <ul class="position-relative">
                                <li><a href="https://www.facebook.com/allwinrotoplast/" title="Facebook"  target="_blank"><i class="fa fa-brands fa-facebook-f" style="color: #ffffff;"></i></a><span>|</span></li>
                                <!--<li><a href="https://twitter.com/TubsFish" title="twitter" target="_blank"><i class="fa fa-brands fa-twitter" style="color: #ffffff;"></i></a></li>-->
                                <!--<li><a href="https://plus.google.com/b/118222560496351179456/people" title="googleplus" target="_blank"><i class="fa fa-google-plus" style="color: #ffffff;"></i></a></li>-->
                                <li><a href="https://www.instagram.com/allwinrotoplast/" title="Instagram" target="_blank"><i class="fa fa-brands fa-instagram" style="color: #ffffff;"></i></a><span>|</span></li>
                                <li><a href="https://www.linkedin.com/company/allwin-roto-plast-private-limited/" title="LinkedIn" target="_blank"><i class="fa fa-linkedin" style="color: #ffffff;"></i></a></li>
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
                                   @csrf
                              <div class="mb-4">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" aria-describedby="emailHelp" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();">
                              </div>
                              <div class="mb-4">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-4">
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone" aria-describedby="emailHelp" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);">
                              </div>
                              <div class="mb-4">
                                <select class="form-select" name="country" id="country" aria-label="Default select example">
                                  <option value='' selected>Select Country</option>
                                  @foreach($countries as $ke=>$vl)
                                  <option value="{{ $vl->name }}">{{ $vl->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="mb-4">
                                <textarea type="text" class="form-control" name="message" id="message" placeholder="Requirement" rows="3" aria-describedby="emailHelp"></textarea>
                              </div>
                              @php
                              $siteKey = env('RECAPTCHA_SITE_KEY');
                              @endphp
                              <div class="mb-4">
                                <div class="g-recaptcha" data-sitekey="6Lc_PvonAAAAAOm_L-O6spxZ0HPtBN-IXrsOH7Y-"></div>
                              </div>
                              <button class="btn" onclick="submitinquiry()">Submit Now</button>
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
                        <input type="text" class="form-control" name="your_name" id="your_name" placeholder="Full Name" aria-describedby="emailHelp" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();">
                      </div>
                      <div class="mb-4">
                          <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" aria-describedby="emailHelp" readonly >
                      </div> 
                      <div class="mb-4">
                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" aria-describedby="emailHelp" readonly>
                      </div>
                      <div class="mb-4">
                        <input type="email" class="form-control" name="mail_id" id="mail_id" placeholder="Email Address" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-4">
                        <input type="number" class="form-control" name="mobilenumber" id="mobilenumber" placeholder="Phone" aria-describedby="emailHelp" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);">
                      </div>
                      <div class="mb-4">
                        <select class="form-select" name="countryName"  id="countryName" aria-label="Default select example">
                          <option value='' selected>Select Country</option>
                          @foreach($countries as $ke=>$vl)
                          <option value="{{ $vl->name }}">{{ $vl->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-4">
                        <textarea type="text" class="form-control" name="requirment" id="requirment" placeholder="Requirement" rows="3" aria-describedby="emailHelp"></textarea>
                      </div>
                      <div class="mb-4">
                        <div class="g-recaptcha" id="productenqch" data-sitekey="6Lc_PvonAAAAAOm_L-O6spxZ0HPtBN-IXrsOH7Y-"></div>
                      </div>
                      <button class="btn quote_btn" onclick="submtproductprice()">Submit Now</button>
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
                    <form action="" class="mt-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="text" required="" class="controlForm" id="name"
                                    placeholder="Your Name*" name="name" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="number" required="" class="controlForm" id="Phone"
                                    placeholder="Phone Number*" name="Phone" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);">
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
                      @csrf
                      <div class="mb-4">
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name" aria-describedby="emailHelp" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();">
                      </div>
                      <div class="mb-4">
                          <select class="form-select" name="sub_product" id="sub_product" aria-label="Default select example">
                            <option value='' selected>Select Category</option>
                            @foreach($category as $ke=>$vl)
                            @if ($vl->category_name != 'Doff Basket' && $vl->category_name != 'Processing Trolley')
                            <option value="{{ $vl->category_name }}">{{ $vl->category_name }}</option>
                            @endif
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-4">
                          <select class="form-select" name="product" id="product" aria-label="Default select example">
                            <option value='' selected>Select Product</option>
                            @foreach($productname as $ke=>$vl)
                            <option value="{{ $vl->product_name }}">{{ $vl->product_name }}</option>
                            @endforeach
                          </select>
                        </div>

                      <div class="mb-4">
                            <input type="email" class="form-control" name="mail" id="mail" placeholder="Email Address" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-4">
                            <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Phone" aria-describedby="emailHelp" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);">
                      </div>
                      <div class="mb-4">
                            <select class="form-select" name="countries" id="countries" aria-label="Default select example">
                                <option value='' selected>Select Country</option>
                                    @foreach($countries as $ke=>$vl)
                                        <option value="{{ $vl->name }}">{{ $vl->name }}</option>
                                    @endforeach
                            </select>
                      </div>
                      <div class="mb-4">
                            <textarea type="text" class="form-control" name="requirments" id="requirments" placeholder="Requirement" rows="3" aria-describedby="emailHelp"></textarea>
                      </div>
                      <div class="mb-4">
                            <div class="g-recaptcha" data-sitekey="6Lc_PvonAAAAAOm_L-O6spxZ0HPtBN-IXrsOH7Y-"></div>
                      </div>
                        <button class="btn quote_btn" onclick="submtinquiryqoute()">Submit Now</button>
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
                        <input type="text" class="form-control" name="catalogueTitle" id="catalogueTitle" placeholder="Full Name" aria-describedby="emailHelp" readonly>
                      </div>
                      <div class="mb-4">
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" aria-describedby="emailHelp" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();">
                      </div>
                      <div class="mb-4">
                        <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-4">
                        <input type="text" class="form-control"  id="mob" name="mob" placeholder="Phone" aria-describedby="emailHelp" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);">
                      </div>
                      <div class="mb-4">
                        <select class="form-select" id="country_name"  name="country_name" aria-label="Default select example">
                          <option value='' selected>Select Country</option>
                          @foreach($countries as $ke=>$vl)
                          <option value="{{ $vl->name }}">{{ $vl->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-4">
                        <div class="g-recaptcha" data-sitekey="6Lc_PvonAAAAAOm_L-O6spxZ0HPtBN-IXrsOH7Y-"></div>
                      </div>
                      <button class="btn quote_btn" onclick="submtcatalogue()">Submit Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
      /* ===== MODAL DESIGN ===== */
      .Whats_mpp_modal .popup-box_whatsapp {
          border-radius: 16px;
          /* overflow: hidden;   */
      }

      /* Header */
      .Whats_mpp_modal .popup-header {
          background: #b71615;
          color: #fff;
          padding: 15px 20px;
      }

      .Whats_mpp_modal .popup-header h5 {
          margin: 0;
          font-weight: 600;
      }

      .Whats_mpp_modal .white-close {
          filter: invert(1);
      }

      /* Body */
      .Whats_mpp_modal .popup-box_whatsapp .modal-body {
          padding: 25px;
      }

      /* Inputs */
      .Whats_mpp_modal .popup-input {
          border-radius: 12px;
          height: 50px;
          border: 1px solid #ddd;
          box-shadow: none !important;
      }

      .Whats_mpp_modal .popup-input:focus {
          border-color: #b71615;
      }

      /* Textarea */
      .Whats_mpp_modal textarea.popup-input {
          height: 90px;
      }

      /* Button */
      .Whats_mpp_modal .popup-btn {
          background: #b71615;
          color: #fff;
          height: 50px;
          border-radius: 12px;
          font-weight: 600;
          border: none;
      }

      .Whats_mpp_modal .popup-btn:hover {
          background: #b71615;
          color: #fff;
      }

      /* intl tel input full width */
      .Whats_mpp_modal .iti {
          width: 100%;
      }

      .Whats_mpp_modal .iti__selected-flag {
          border-radius: 10px 0 0 10px;
      }

      /* Remove modal scroll */
      .Whats_mpp_modal .modal-dialog {
          max-width: 420px;
      }

      .Whats_mpp_modal .modal-content {
          /* overflow: hidden; */
      }
.WhatsAppButton_mpp {
    background: #14a614;
    position: fixed;
    bottom: 90px;
    right: 15px;
    z-index: 999999;
    width: 50px;
    height: 50px;
    border-radius: 50%;
  cursor: pointer;
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(20, 166, 20, 0.7);
    }
    70% {
        box-shadow: 0 0 0 15px rgba(20, 166, 20, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(20, 166, 20, 0);
    }
}

.WhatsAppButton_mpp img {
    width: 100%;
    height: 100%;
}

     
  </style>
  
    <div class="modal fade Whats_mpp_modal" id="exampleModal-4" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content popup-box popup-box_whatsapp">

              <!-- HEADER -->
              <div class="modal-header popup-header">
                  <h5>Chat with us on WhatsApp</h5>
                  <button type="button" class="btn-close white-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- BODY -->
              <div class="modal-body">
                  <form method="POST" action="{{ route('whatsaapinquiry') }}" id="whatsappForm" target="_blank">
                      @csrf

                      <!-- Message -->
                      <div class="mb-3">
                          <label class="form-label">Message</label>
                          <textarea class="form-control popup-input" name="message" placeholder="Type your message"></textarea>
                      </div>

                      <!-- Phone -->
                      <div class="mb-3">
                          <label class="form-label">Contact No. <span class="text-danger">*</span></label>

                          <input type="tel" id="wa_phone" class="form-control popup-input" 
                              oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,15);">
                            
                            <small class="text-danger d-none" id="wa_error">
                                Contact number must be required
                            </small>
                          <!-- hidden -->
                          <input type="hidden" name="number" id="wa_full_phone">
                          <input type="hidden" name="country" id="wa_country_name">
                      </div>

                      <div class="d-grid">
                          <button type="submit" class="btn popup-btn">
                              Start Chat with Us
                          </button>
                      </div>

                  </form>
              </div>

          </div>
      </div>
  </div>

  <!-- WhatsApp floating button -->
  <!--<div class="WhatsAppButton_mpp">-->
  <!--    <a data-bs-toggle="modal" data-bs-target="#exampleModal-4" target="_blank">-->
  <!--        <img src="{{ asset('public/front/images/whatsapp.png')}}" alt="whatsapp">-->
  <!--    </a>-->
  <!--</div>-->
  
  <a data-bs-toggle="modal" data-bs-target="#exampleModal-4" target="_blank"> 
                <i class="fab fa-whatsapp" id="whatsapp"></i>
                <!--<span>WhatsApp<br><small>9163587 40011 </small></span>-->
             </a>
             
  <div class="WhatsAppButton_mpp">
    <a id="waFloatingBtn" data-bs-toggle="modal" data-bs-target="#exampleModal-4">
        <img src="{{ asset('public/front/images/whatsapp.png')}}" alt="whatsapp">
    </a>
</div>
    

  <script>
document.addEventListener("DOMContentLoaded", function () {

    const input = document.getElementById("wa_phone");
    const error = document.getElementById("wa_error");
    const form = document.getElementById("whatsappForm");
    const fullPhone = document.getElementById("wa_full_phone");
    const countryName = document.getElementById("wa_country_name");

    const iti = window.intlTelInput(input, {
        initialCountry: "auto",
        separateDialCode: true,
        preferredCountries: ["in", "ae", "us", "gb"],
        geoIpLookup: function (callback) {
            fetch("https://ipapi.co/json/")
                .then(res => res.json())
                .then(data => callback(data.country_code))
                .catch(() => callback("in"));
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/utils.js",
    });

    // numbers only + live hide error
    input.addEventListener("input", function () {
        this.value = this.value.replace(/[^0-9]/g, '');

        if (this.value.length >= 10) {
            error.classList.add("d-none");
        }
    });

    // submit validation
    form.addEventListener("submit", function (e) {

        if (input.value.trim() === "") {
            error.innerText = "Contact number must be required";
            error.classList.remove("d-none");
            input.focus();
            e.preventDefault();
            return;
        }

        if (input.value.length < 10 || input.value.length > 15) {
            error.innerText = "Contact number must be 10 to 15 digits";
            error.classList.remove("d-none");
            input.focus();
            e.preventDefault();
            return;
        }

        // ✅ valid
        error.classList.add("d-none");

        const countryData = iti.getSelectedCountryData();
        fullPhone.value = "+" + countryData.dialCode + input.value;
        countryName.value = countryData.name;
        
        sessionStorage.setItem("whatsapp_used", "yes");
    });

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("whatsappForm");
    const modalEl = document.getElementById("exampleModal-4");

    form.addEventListener("submit", function () {

        setTimeout(() => {
            const modal = bootstrap.Modal.getInstance(modalEl);
            if (modal) modal.hide();
        }, 10);

    });

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const modalEl = document.getElementById("exampleModal-4");
    const form = modalEl.querySelector('#whatsappForm');

    // Jab modal khule
    modalEl.addEventListener('show.bs.modal', function () {
        // Form reset kar do
        form.reset();

        // Hidden fields clear
        document.getElementById("wa_full_phone").value = "";
        document.getElementById("wa_country_name").value = "";

        // Error hide
        document.getElementById("wa_error").classList.add("d-none");
    });
});
</script>
<!--registeration modal-->
<script>
document.addEventListener("DOMContentLoaded", function () {

    if (!localStorage.getItem("modalShown")) {

        var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
        myModal.show();

        localStorage.setItem("modalShown", "true");
    }

});
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('public/front/js/custom.js') }}"></script>
<script src="{{ asset('public/front/js/jquery.glasscase.min.js') }}" type="text/javascript"></script>
<!-- bootstrap cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- bootstrap cdn -->

<!--slick slider-->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


<!-- swiper slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.4.1/swiper-bundle.min.js" integrity="sha512-3Ei7OPFo83kw3cPbDLeLhn/YF8tZB7Vs8sfli0B/KEekureL5eosDeshYFICCvt4K8i0yUil/lK3cSiic2Wjkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> 
<!--recaptcha-->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/intlTelInput.min.js"></script>
<!-- header script -->


<script type="text/javascript">
function submtcatalogue() {
  if (grecaptcha.getResponse(3) == "") {
    toastr.warning('Please verify Captcha');
    return false;
  } else {
    var formData = {
      catalogueTitle: $("#catalogueTitle").val(),
      full_name: $("#full_name").val(),
      email_address: $("#email_address").val(),
      mob: $("#mob").val(),
      country_name: $("#country_name").val(),
      _token: "{{ csrf_token() }}"
    };
    //console.log(formData);
    $.ajax({
      type: "POST",
      url: "{{ url('/cataloguestore') }}",
      data: formData,
      dataType: "json",
      encode: true,
      beforeSend: function () {
        $('button').prop('disabled', true);
      },
      complete: function () {
        $('button').prop('disabled', false);
      },
    }).done(function (data) {
      document.getElementById("catalogue").reset();
      $('.btn-close').click();
      toastr.success(data.message);
      grecaptcha.reset(3);
    });
    event.preventDefault();
  }
}
</script>


{{-- inquiry inquiryqoute --}}
<script>
  function submtinquiryqoute() {
    // $("#inquiryqoute").submit(function (event) {
    if (grecaptcha.getResponse(2) == "") {
      toastr.warning('Please verify Captcha');
      return false;
    } else {
      var formData = {
        fullname: $("#fullname").val(),
        sub_product: $("#sub_product").val(),
        product: $("#product").val(),
        mail: $("#mail").val(),
        mobile: $("#mobile").val(),
        countries: $("#countries").val(),
        requirments: $("#requirments").val(),
        _token: "{{ csrf_token() }}"
      };
      
         $(".form-control, .form-select").removeClass("is-invalid");
      $(".error-message").remove();

      var fields = {
        fullname: "Full Name",
        sub_product: "Sub Product",
        product: "Product",
        mail: "Email Address",
        mobile: "Mobile Number",
        countries: "Country",
        requirments: "Requirements"
      };

      for (var field in fields) {
      if (!formData[field]) {
        showError(field, fields[field] + " is required.");
        return;
      }
    }
    
    if (!validateEmail(formData.mail)) {
      showError("mail", "Please enter a valid email address.");
      return;
    }

    if (formData.mobile.length < 10 || formData.mobile.length > 15) {
      showError("mobile", "Mobile number must be 10 digits.");
      return;
    }
    
    
      $.ajax({
        // console.log(formData);
        type: "POST",
        url: "{{ url('/inquiryqoutestore') }}",
        data: formData,
        dataType: "json",
        encode: true,
        beforeSend: function () {
          $('.quote_btn').prop('disabled', true);
        },
        complete: function () {
          $('.quote_btn').prop('disabled', false);
        },
      }).done(function (data) {
        console.log(data);
        document.getElementById("inquiryqoute").reset();
        $('.btn-close').click();
        toastr.success(data.message);
        grecaptcha.reset(2);
        window.location.href="https://allwinrotoplast.com/thank-you";
      }).fail(function (data) {
          toastr.error("There was an error. Please try again.");
        });
      event.preventDefault();
    }
    //});
  }
  
   function showError(field, message) {
    $("#" + field).addClass("is-invalid"); 
    $("#" + field).after('<div class="invalid-feedback error-message">' + message + '</div>'); // Display error message
  }

  function validateEmail(email) {
    var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return re.test(email);
  }
</script>


<script type="text/javascript">
  function submtproductprice() {
    if (grecaptcha.getResponse(1) == "") {
      toastr.warning('Please verify Captcha');
      return false;
    } else {
      var formData = {
        your_name: $("#your_name").val(),
        category_name : $("#category_name").val(), 
        product_name: $("#product_name").val(),
        mail_id: $("#mail_id").val(),
        mobilenumber: $("#mobilenumber").val(),
        countryName: $("#countryName").val(),
        requirment: $("#requirment").val(),
        _token: "{{ csrf_token() }}"
      };
       $(".form-control, .form-select").removeClass("is-invalid");
       $(".error-message").remove();
       
        var fields = {
        your_name: "Your Name",
        category_name: "Category Name",
        product_name: "Product Name",
        mail_id: "Email Address",
        mobilenumber: "Mobile Number",
        countryName: "Country",
        requirment: "Requirement"
      };
      for (var field in fields) {
        if (!formData[field]) {
          showError(field, fields[field] + " is required.");
          return;
        }
        $("#" + field).removeClass("is-invalid");
      }

      if (!validateEmail(formData.mail_id)) {
          showError("mail_id", "Please enter a valid email address.");
          return;
      }

     if (formData.mobilenumber.length < 10 || formData.mobilenumber.length > 15) {
              showError("mobilenumber", "Phone number must be 10 digits.");
              return;
     }

      $.ajax({
        type: "POST",
        url: "{{ url('/submitproductprice') }}",
        data: formData,
        dataType: "json",
        encode: true,
        beforeSend: function () {
          $('button').prop('disabled', true);
        },
        complete: function () {
          $('button').prop('disabled', false);
        },
      }).done(function (data) {
        document.getElementById("productprice").reset();
        $('.btn-close').click();
        toastr.success(data.message);
        grecaptcha.reset(1);
        window.location.href="https://allwinrotoplast.com/thank-you";
      }).fail(function (data) {
          toastr.error(data.responseJSON.message || "There was an error. Please try again.");
        });
      event.preventDefault();
    }
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
var swiper = new Swiper('.swiper-clients', {
    slidesPerView: 2,
    spaceBetween: 20,
    speed: 300,
    loop: true,
    slidesPerGroup: 1,

    autoplay: {
        delay: 2000,
        disableOnInteraction: false
    },

    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
            return `<span class="${className}"></span>`;
        }
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
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
            centeredSlidesBounds: true
        },
        1024: {
            slidesPerView: 2,
            spaceBetween: 20,
            centeredSlidesBounds: true
        },
        1365: {
            slidesPerView: 2,
            spaceBetween: 20,
            centeredSlidesBounds: true
        },
        1440: {
            slidesPerView: 2,
            spaceBetween: 20,
            centeredSlidesBounds: true
        }
    }
});

// ---- FORCE ACTIVE ONLY IN FIRST 2 DOTS ---- //
swiper.on('slideChange', function () {
    const bullets = document.querySelectorAll('.swiper-pagination .swiper-pagination-bullet');

    bullets.forEach((bullet, i) => {
        if (i < 2) {
            bullet.classList.remove('swiper-pagination-bullet-active');
        }
    });

    // force correct active only between 0 and 1
    const activeIndex = swiper.realIndex % 2; 
    bullets[activeIndex].classList.add('swiper-pagination-bullet-active');
});

    

</script>
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
            clickable: true,
            dynamicBullets: true,
            dynamicMainBullets: 3,
        },
        breakpoints: {
            180: {
                slidesPerView: 1,
                spaceBetween: 20,
                 loop:true,
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 20,
                 loop:true,
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 30,
                 loop:true,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 40,
                centeredSlidesBounds: true,
                 loop:true,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 40,
                centeredSlidesBounds: true,
                 loop:true,
            },
            1365: {
                slidesPerView: 3,
                spaceBetween: 20,
                centeredSlidesBounds: true,
            },
            1440: {
                slidesPerView: 3,
                spaceBetween: 20,
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
            // 640: {
            //     slidesPerView: 2,
            //     spaceBetween: 20,
            //     centeredSlidesBounds: true,
            // }
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
                centeredSlidesBounds: true,
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 20,
                centeredSlidesBounds: true,
            },
            1365: {
                slidesPerView: 3,
                spaceBetween: 20,
                centeredSlidesBounds: true,
            },
            1440: {
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
        slidesPerView: 4,
        paginationClickable: true,
        speed: 300,
        autoplay: {
            delay: 1000,
        },
        loop: true,
        pagination: {
             el: '.swiper-pagination',
             clickable: true,
        },
        breakpoints: {
            180: {
                slidesPerView: 1,
                spaceBetween: 0,
                 loop:true,
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 20,
                 loop:true,
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 30,
                 loop:true,
            },
            640: {
                slidesPerView: 4,
                spaceBetween: 10,
                centeredSlidesBounds: true,
                 loop:true,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 10,
                centeredSlidesBounds: true,
                 loop:true,
            },
            990:{
               slidesPerView: 3,
                spaceBetween: 10,
            },
            1365:{
               slidesPerView: 4,
                spaceBetween: 10,
            },
            1440:{
               slidesPerView: 3,
                spaceBetween: 10,
            }
        }
    })
</script>

<!--slick slider-->
  <script type="text/javascript">
        $(document).ready(function() {
            $('.certificates-slider').slick({
                slidesToShow: 4,
                arrows: false,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                pauseOnHover:false,
                responsive: [
                     {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
            }
        },
         {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
            }
        },
          {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 1365,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 1440,
            settings: {
                slidesToShow: 3,
            }
        },
        

  ]
            });
        });
    </script>


<!--team slider-->

  <script type="text/javascript">
        $(document).ready(function() {
            $('.team-slider').slick({
                slidesToShow: 1,
                arrows: false,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                pauseOnHover:false,
                dots:false,
                fade: true,
                responsive: [
                     {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
            }
        },
         {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
            }
        },
          {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 1365,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 1440,
            settings: {
                slidesToShow: 1,
            }
        },
        

  ]
            });
        });
    </script>


<script>
    $('.display1').glassCase({
        'widthDisplay': 460,
        'heightDisplay': 460,
        'isSlowZoom': true,
        'isSlowLens': true,
        'capZType': 'in',
        'isHoverShowThumbs': true,
        'colorIcons': '#fff',
        'colorActiveThumb': '#333',
        'thumbsPosition': 'left',
        'zoomPosition': 'right',
        'isOneThumbShown': true
    });
</script>
<!-- swiper slider -->

<script>
  function submitinquiry() {
    if (grecaptcha.getResponse() == "") {
      toastr.warning('Please verify Captcha');
      return false;
    } else {
      var formData = {
        name: $("#name").val(),
        email: $("#email").val(),
        phone: $("#phone").val(),
        country: $("#country").val(),
        message: $("#message").val(),
        _token: "{{ csrf_token() }}"
      };
      
      $(".form-control, .form-select").removeClass("is-invalid");
      $(".error-message").remove();

      var fields = {
        name: "Your Name",
        email: "Email Address",
        phone: "Phone Number",
        country: "Country",
        message: "Message"
      };

      for (var field in fields) {
        if (!formData[field]) {
          showError(field, fields[field] + " is required.");
          return;
        }
        $("#" + field).removeClass("is-invalid");
      }
    
      if (!validateEmail(formData.email)) {
        showError("email", "Please enter a valid email address.");
        return;
      }
    
      if (formData.phone.length < 10 || formData.phone.length > 15) {
        showError("phone", "Phone number must be 10 digits.");
        return;
    }


      $.ajax({
        type: "POST",
        url: "{{ url('/submitenquiry') }}",
        data: formData,
        dataType: "json",
        encode: true,
        beforeSend: function () {
          $('button').prop('disabled', true);
        },
        complete: function () {
          $('button').prop('disabled', false);
        },
      }).done(function (data) {
        document.getElementById("quoteform").reset();
        toastr.success(data.message);
        grecaptcha.reset();
       window.location.href="https://allwinrotoplast.com/thank-you";
      }).fail(function (data) {
        toastr.error(data.responseJSON.message || "There was an error. Please try again.");
      });

      event.preventDefault();
    }
  }
</script>


<script>
    $(document).ready(function() {
      // Initially hide the button
      $('#scroll_to_top').hide();

      $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
          $('#scroll_to_top').fadeIn();
        } else {
          $('#scroll_to_top').fadeOut();
        }
      });

      $("#scroll_to_top").click(function() {
        $("html, body").animate({ scrollTop: 0 }, 400);
      });
    });
  </script>

<script>
    $(document).ready(function() {
        var autoModalTimer;

        var pathname = window.location.pathname;

        // Auto show popup after delay
        if (pathname === '/') {
            autoModalTimer = setTimeout(function() {
                $("#exampleModal1").modal('show');
            }, 4000);
        } else if (pathname !== '/thank-you' && pathname !== '/contact') {
            autoModalTimer = setTimeout(function() {
                $("#exampleModal1").modal('show');
            }, 7000);
        }

        // If user clicks "Get Quote"
        $('#openClickModal').on('click', function(e) {
            e.preventDefault();

            // Stop auto popup if still pending
            clearTimeout(autoModalTimer);

            // Hide auto modal if it's already open
            $("#exampleModal1").modal('hide');

            // Show click modal
            $("#exampleModal").modal('show');
        });
    });
</script>


    
<!--catehory after select the product-->
  <script>
// jQuery("#sub_product").change(function() {
//     alert("Hello");
//     var caste = $(".caste");
//     $(".caste").empty();

//     var religionId = this.value;
//     $.ajax({
//         url: '/listCaste',
//         type: "get",
//         data: {
//             religionId: religionId
//         },
//         success: function(response) { // What to do if we succeed
//             //if(data == "success")
//             // console.log(response);
//             if (response.length != 0) {
//                 $("#caste").css("display", "block");
//                 console.log("length" + response.length);
//                 $(caste).append(
//                     '<option selected="selected" value="" disabled>Select caste </option>'
//                 ); //add input box
//                 for (var i = 0; i < response.length; i++) {
//                     $(caste).append('<option value="' + response[i].castId + '">' +
//                         response[i].cast + '</option>'); //add input box
//                 }
//             } else {
//                 $("#caste").css("display", "none");
//             }
//         }
//     });

        
//     </script>


     <script type="text/javascript">
        $(document).ready(function() {
            $('.applications-slider').slick({
                slidesToShow: 1,
                arrows: true,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                pauseOnHover:false,
                 dots:true,
                responsive: [
                     {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
            }
        },
         {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
            }
        },
          {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
            }
        },
    
        

  ]
            });
        });
    </script>
    
</body>

</html>