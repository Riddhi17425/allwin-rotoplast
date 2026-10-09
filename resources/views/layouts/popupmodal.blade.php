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
                        <input
                            type="tel"
                            class="form-control"
                            name="mobile"
                            id="mobile_popup"
                            placeholder="Phone"
                            inputmode="numeric"
                            maxlength="15"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);"
                        >
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
                    <button type="button" class="btn quote_btn" onclick="submt_inquiryqoute_popup()">Submit Now</button>
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
         

function submt_inquiryqoute_popup() {

    const form = $("#inquiryqoutepopup");

    // Clear previous errors
    form.find(".form-control, .form-select")
        .removeClass("is-invalid");

    form.find(".error-message").remove();

    const fields = {
        fullname_popup: {
            label: "Full Name",
            value: $("#fullname_popup").val().trim()
        },
        sub_product_popup: {
            label: "Category",
            value: $("#sub_product_popup").val()
        },
        product_popup: {
            label: "Product",
            value: $("#product_popup").val()
        },
        mail_popup: {
            label: "Email Address",
            value: $("#mail_popup").val().trim()
        },
        mobile_popup: {
            label: "Phone Number",
            value: $("#mobile_popup").val().trim()
        },
        countries_popup: {
            label: "Country",
            value: $("#countries_popup").val()
        },
        requirments_popup: {
            label: "Requirement",
            value: $("#requirments_popup").val().trim()
        }
    };

    let isValid = true;

    // Validate all required fields
    Object.keys(fields).forEach(function (id) {

        const field = fields[id];

        if (!field.value) {
            showPopupError(id, field.label + " is required.");
            isValid = false;
        }
    });

    // Email validation
    const email = fields.mail_popup.value;

    if (
        email &&
        !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
    ) {
        showPopupError(
            "mail_popup",
            "Please enter a valid email address."
        );

        isValid = false;
    }

    // Phone validation
    const phone = fields.mobile_popup.value;

    if (phone && !/^[0-9]{10,15}$/.test(phone)) {
        showPopupError(
            "mobile_popup",
            "Phone number must contain 10 to 15 digits."
        );

        isValid = false;
    }

    // Stop if any field is invalid
    if (!isValid) {
        return false;
    }

    // CAPTCHA is checked only after field validation
    // Use the correct widget ID if multiple CAPTCHAs exist.
    const captcha = grecaptcha.getResponse();

    if (!captcha) {
        toastr.warning("Please verify Captcha.");
        return false;
    }

    return true;
}

function showPopupError(id, message) {

    const input = $("#inquiryqoutepopup #" + id);

    input.addClass("is-invalid");

    $("<div>")
        .addClass("invalid-feedback error-message")
        .text(message)
        .insertAfter(input);
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