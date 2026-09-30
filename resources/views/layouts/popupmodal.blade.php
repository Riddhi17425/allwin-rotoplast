<?php
$contact = DB::select(DB::raw("SELECT * FROM `cms`"));
$countries = DB::select(DB::raw("SELECT name from countries"));
$productname = DB::select(DB::raw("SELECT * from `product`"));
$category = DB::select(DB::raw("SELECT category_name,id from categories "));
?>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog d-flex load-form-dialog">
        <div class="modal-content left_ft_modal">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel1"></h5>
            </div>
            <div class="modal-body">
                <h5 class="mb-4 mt-2 ms-2">Our USPs</h5>
                <ol>
                    <li>26+ Years of Experience</li>
                    <li>ISO 9001:2015 Certified Manufacturer & Supplier</li>
                    <li>Industry Leader in Roto moulding Technology</li>
                    <li>Wide Range of High-Quality Plastic Products</li>
                    <li>Customizable Solutions for Diverse Applications</li>
                    <li>Trusted by 25k Clients Worldwide</li>
                </ol>
                <h5 class="mt-5 mb-3"><b>You can also reach us via</b></h5>
                Email: <a href="mailto:sales@allwinrotoplast.com ">sales@allwinrotoplast.com </a><br>
                Phone Number: <a href="tel:919712930708">+91 97129 30708</a>
            </div>
        </div>
        <div class="modal-content right_ft_modal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Inquiry Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="footer_contact_form mt-4" action="javascript:void(0)" id="inquiryqoutepopup" method="post">
                    @csrf
                    <div class="mb-4">
                        <input type="text" class="form-control"  name="fullname" id="fullname_popup"
                            placeholder="Full Name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-4">
                        <select class="form-select" name="sub_product" id="sub_product_popup"
                            aria-label="Default select example" >
                            <option value='' selected>Select Category</option>
                            @foreach ($category as $ke => $vl)
                                @if ($vl->category_name != 'Doff Basket' && $vl->category_name != 'Processing Trolley')
                                    <option value="{{ $vl->category_name }}" data-id="{{ $vl->id }}" >{{ $vl->category_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <select class="form-select" name="product" id="product_popup"
                            aria-label="Default select example" >
                            <option value='' selected>Select Product</option>
                           
                            <!--@foreach ($productname as $ke => $vl)-->
                            <!--    <option value="{{ $vl->product_name }}">{{ $vl->product_name }}</option>-->
                            <!--@endforeach-->
                        </select>
                    </div>

                    <div class="mb-4">
                        <input type="email" class="form-control"  name="mail" id="mail_popup"
                            placeholder="Email Address" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-4">
                        <input type="number" class="form-control"  name="mobile" id="mobile_popup"
                            placeholder="Phone" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-4">
                        <select class="form-select" name="countries"  id="countries_popup"
                            aria-label="Default select example">
                            <option value='' selected>Select Country</option>
                            @foreach ($countries as $ke => $vl)
                                <option value="{{ $vl->name }}">{{ $vl->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <textarea type="text" class="form-control"  name="requirments" id="requirments_popup"
                            placeholder="Requirement" rows="3" aria-describedby="emailHelp"></textarea>
                    </div>
                    <div class="mb-4">
                        <div class="g-recaptcha" data-sitekey="6Lc_PvonAAAAAOm_L-O6spxZ0HPtBN-IXrsOH7Y-"></div>
                    </div>
                    <button class="btn quote_btn" onclick="submt_inquiryqoute_popup()">Submit Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

 $(document).ready(function() {
        $('#sub_product_popup').change(function() {
            var selectedOption = $(this).find('option:selected'); 
            var categoryId = selectedOption.data('id');
            var baseUrl = "{{ url('/') }}"; 

            if (categoryId) {
            
                if (categoryId == 10) {
                    $.ajax({
                        url: baseUrl + '/getAllProducts', 
                        method: 'GET',
                        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                        success: function(response) {
                            var productDropdown = $('#product_popup');
                            productDropdown.empty(); 
                            productDropdown.append('<option value="">Select Product</option><option value="others">Others</option>'); // Default option

                            $.each(response, function(index, product) {
                                productDropdown.append('<option value="' + product.id + '">' + product.product_name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log("Error Status: " + status);
                            console.log("Error Details: " + error);
                            alert('Error fetching products.');
                        }
                    });
                } else {
                    $.ajax({
                        url: baseUrl + '/getProductsByCategory/' + categoryId, // URL to get category-specific products
                        method: 'GET',
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        
                        success: function(response) {
                            var productDropdown = $('#product_popup');
                            productDropdown.empty();
                            productDropdown.append('<option value="">Select Product</option><option value="others">Others</option>'); // Default option

                            $.each(response, function(index, product) {
                                productDropdown.append('<option value="' + product.product_name + '">' + product.product_name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log("Error Status: " + status);
                            console.log("Error Details: " + error);
                            alert('Error fetching products.');
                        }
                    });
                }
            } else {
                $('#product_popup').empty().append('<option value="">Select Product</option>');
            }
        });
 });
         
         
    function submt_inquiryqoute_popup(event) {

    if (grecaptcha.getResponse(4) == "") { 
        toastr.warning('Please verify Captcha');
        return false;
    }

    var formData = {
        fullname: $("#fullname_popup").val(),
        product: $("#product_popup").val(),
        sub_product: $("#sub_product_popup").val(),
        mail: $("#mail_popup").val(),
        mobile: $("#mobile_popup").val(),
        countries: $("#countries_popup").val(),
        requirments: $("#requirments_popup").val(),
        _token: "{{ csrf_token() }}"
    };
      var fields = {
        fullname: "Full name",
        sub_product: "Category",
        product: "Product",
        mail: "Email address",
        mobile: "Phone number",
        countries: "Country",
        requirments: "Requirements"
      };

      for (var field in fields) {
        if (!formData[field]) {
         // toastr.warning(fields[field] + " is .");
          $("#" + field + "_popup").addClass("is-invalid");
          return;
        }
        $("#" + field + "_popup").removeClass("is-invalid");
      }

    if (!validateEmail(formData.mail)) {
     // toastr.warning("Please enter a valid email address.");
      $("#mail_popup").addClass("is-invalid");
      return;
    }

    if (formData.mobile.length < 10 || formData.mobile.length > 15) {
      toastr.warning("Phone number must be between 10-15 digits.");
      $("#mobile_popup").addClass("is-invalid");
      return;
    }

    $.ajax({
        type: "POST",
        url: "{{ url('/inquiryqoutestore') }}",
        data: formData,
        dataType: "json",
        encode: true,
        beforeSend: function() {
            $('.quote_btn').prop('disabled', true);
        },
        complete: function() {
            $('.quote_btn').prop('disabled', false);
        },
    }).done(function(data) {
        console.log(data);
        $("#inquiryqoutepopup")[0].reset();
        $("#inquiryqoutepopup").modal("hide");
        //toastr.success(data.message);
        grecaptcha.reset();
        setTimeout(function() {
            window.location.href = "https://allwinrotoplast.com/thank-you";
        }, 500).fail(function(data) {
         toastr.error(data.responseJSON.message || "There was an error. Please try again.");
     });
        
        event.preventDefault();
    });
}



</script>
<script>
    $(document).on('show.bs.modal', '#exampleModal1', function (e) {
    // If any modal (except #exampleModal1) is already open
    if ($('.modal.show').length > 0) {
        e.preventDefault(); // stop opening
        return false;
    }
});
</script>