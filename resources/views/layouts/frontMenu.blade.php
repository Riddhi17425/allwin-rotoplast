<section class="navigation">
    <div class="nav-container">
        <div class="nav_wrapper">
            <div class="brand">
                <a href="{{ url('/')}}"><img src="{{asset('public/front/images/main-logo.svg')}}" width="80%" alt="Allwin Roto Plast logo" /></a>
            </div>
        </div>
        <nav class="nav">
            <div class="nav-mobile"><a id="navbar-toggle" href="javascript:void(0)"><span></span></a></div>

            <div class="social-flex">
                <div >
                    <div class="social-nav">
                        <div>
                            <a href="https://goo.gl/maps/ARVAw4LLWY8qAtir6" target="_blank"> <i class="fa fa-map-marker mx-2" aria-hidden="true"></i> <span>Our Location</span></a>
                            <span class="mx-4">|</span>
                            <a href="mailto:sales@allwinrotoplast.com"> <i class="fa fa-envelope mx-2" aria-hidden="true"></i> <span>Email : sales@allwinrotoplast.com</span></a>
                        </div>

                        <div class="flex-button-icon">
                            
                            <div class="social-icon">
                                <div class="btn-group">
                                    <a class="btn  btn-sm blink-soft" type="button" href="{{url('/jointventure')}}">
                                        Joint Venture For Rotomold Product
                                    </a>
                                    <!--    <ul class="dropdown-menu">-->
                                    <!--     <li><a class="dropdown-item active" >Joint Venture For Rotomold Product</a></li>-->
                                        
                                    <!--</ul>-->
                                </div>
                            </div>
                            <div class="social-icon">
                                <div class="btn-group">
                                    <a class="btn  btn-sm blink-soft" href="{{url('/distributor')}}">
                                        Distributor
                                    </a>
                                    <!--<ul class="dropdown-menu">-->
                                    <!--    <li><a class="dropdown-item active" href="{{url('/distributor')}}">Distributor</a></li>-->
                                    <!--    </ul>-->
                                    <!--    <ul class="dropdown-menu">-->
                                    <!--     <li><a class="dropdown-item active" >Joint Venture For Rotomold Product</a></li>-->
                                        
                                    <!--</ul>-->
                                </div>
                            </div>

                            <div class="social-media-bg">
                                <div class="social-icons">
                                    <a href="https://www.facebook.com/allwinrotoplast/" title="facebook"  target="_blank">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    <!--<a href="https://twitter.com/TubsFish" title="twitter" target="_blank">-->
                                    <!--    <i class="fa fa-twitter" aria-hidden="true"></i>-->
                                    <!--</a>-->
                                    <!--<a href="https://plus.google.com/b/118222560496351179456/people" title="instagram" target="_blank">-->
                                    <!--    <i class="fa fa-google-plus" aria-hidden="true"></i>-->
                                    <!--</a>-->
                                    <a href="https://www.instagram.com/allwinrotoplast/" title="instagram" target="_blank">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/company/allwin-roto-plast-private-limited/" title="linkedin" target="_blank">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                    <!--<a href="https://www.linkedin.com/company/allwin-roto-plast-private-limited/" title="linkedin" target="_blank">-->
                                    <!--    <i class="fa fa-linkedin" aria-hidden="true"></i>-->
                                    <!--</a>-->
                                </div>
                            </div>
                             <div id="google_translate_element">
                          <i class="fa fa-globe" aria-hidden="true"></i> <span>&nbsp EN</span>
                          <i class="fa fa-angle-down translate-arrow" aria-hidden="true"></i>

                        </div>
                        </div>

                    </div>
                </div>

@php
 $category = DB::select(DB::raw("SELECT id,category_name from categories WHERE is_delete='0'"));
@endphp

                <div class="menu_flex">
                    <ul class="nav-list">
                        <li class="product_menu">
                            <a href="javascript:void(0)">Products</a>
                            <ul class="navbar-dropdown" style="z-index: 99999;">
                               @foreach($category as $key=>$val)
                                @if($val->id != 9 && strtolower($val->id) != '10')
                                <li>
                                    <?php $cat = $val->category_name; ?>
                                    <a href="{{ url('product-list/'.str_replace(' ', '-', strtolower($cat))) }}">{{ $val->category_name }}</a>

                                </li>
                                @endif
                               @endforeach
                               <li><a href="{{ url('custom-rotational-moulding') }}">Custom Rotational</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('about-us')}}">About Allwin</a>
                        </li>
                        <li>
                            <a href="{{route('case-studies')}}">Case Studies</a>
                        </li>

                        <li>
                            <a href="{{route('download')}}">Download</a>
                        </li>
                        <li>
                            <a href="{{route('gallary-videos')}}">Gallery Videos</a>
                        </li>
                        <li>
                            <a href="{{route('blog')}}">Blogs</a>
                        </li>
                        <li>
                            <a href="{{ route('contact-us')}}">Contact</a>
                        </li>
                        <li>
                        <!-- <div id="google_translate_element" style="position: relative;">-->
                        <!--  <i class="fa fa-globe" aria-hidden="true" style="position: absolute; top: 14px; right: 22px; font-size: 22px; color: #b71615;"></i>-->
                        <!--</div>-->

                        </li>
                         <!--<div id="google_translate_element"></div>-->
                    </ul>
                    
                    <div class="menu_right">
                        
                        <div class="d-flex align-items-center">
                            <a href="tel:+919712930708"><i class="fa fa-phone" aria-hidden="true"></i></a>
                            <div class="header_contact">
                                <p class="mb-0">Call us on:</p>
                                <a href="tel:+919712930708">+91 97129 30708</a>
                            </div>
                            <button type="button" class="btn" id="openClickModal">Get Quote</button>
                         </div>
                    </div>
                </div>

            </div>

        </nav>
    </div>
</section>

<style>/* Top-level menu link par click action ko disable karein */



/* Hover State: Mouse le jaane par hi dropdown visible hoga */
.product_menu:hover .navbar-dropdown {
    display: block !important;
    opacity: 1 !important;
    visibility: visible !important;
}</style>

<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "Product", 
  "name": "Allwin Roto Plast",
  "image": "https://allwinrotoplast.com/public/front/images/main-logo.jpg",
  "description": "Allwin Roto Plast, based in Ahmedabad, is a prominent manufacturer and supplier of 
Roto Mold Plastic Pallet, Boxes, Tanks, Insulated Fish Tubs, and Pallet Containers.",
  "brand": {
    "@type": "Brand",
    "name": "Allwin Roto Plast"
  },
  "offers": {
    "@type": "AggregateOffer",
    "url": "https://allwinrotoplast.com/",
    "priceCurrency": "INR",
    "lowPrice": "0",
    "highPrice": "1000",
    "offerCount": "1000"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9",
    "bestRating": "5",
    "worstRating": "1",
    "ratingCount": "15"
  }
}
</script>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }

    function toggleGoogleTranslate() {
        var translateElement = document.getElementById("google_translate_element");
        if (translateElement.style.display === "none") {
            translateElement.style.display = "block";
        } else {
            translateElement.style.display = "none";
        }
    }
</script>



<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<style>
    .suggestions-box {
    border: 1px solid #ccc;
    display: none;
    position: absolute;
    background: #fff;
    z-index: 999;
    width: 100%;
    }
    .suggestions-box div {
        padding: 8px;
        cursor: pointer;
    }
    .suggestions-box div:hover {
        background-color: #f0f0f0;
    }
        .goog-te-gadget-simple {
            border: none !important; 
            background: none !important; 
            padding: 0 !important; 
            font-family: "Glacial Indifference", sans-serif;
        }
        .goog-te-gadget-icon {
            display: none !important; 
        }
        .goog-te-gadget-simple span {
            border-left: none !important;
            font-family: inherit !important;
            color: var(--gray) !important;
            font-size: 16px !important;
        }
        .lang-select {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-select {
        display: flex;
        align-items: center;
        gap: 8px;
        background-color: #fff;
        border: 2px solid #D9D9D9;
        border-radius: 25px;
        padding: 8px 15px;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .custom-select:hover {
        border-color: #A8964E;
    }

    .custom-select .icon svg {
        stroke: #A8964E;
    }

    /*.goog-te-combo {*/
    /*    border: none;*/
    /*    background: transparent;*/
    /*    outline: none;*/
    /*    color: #000;*/
    /*    font-weight: 500;*/
    /*    cursor: pointer;*/
      
    /*}*/
</style>
<style>

        .goog-te-gadget {
           
            font-size: 0px;
                height: 0;
        }

        .goog-te-gadget span
        {
            display:none;
        }
        .goog-te-gadget-simple {
            border: none !important; 
            background: none !important; 
            padding: 0 !important; 
            font-family: "Glacial Indifference", sans-serif;
        }
        .goog-te-gadget-icon {
            display: none !important; 
        }
        .goog-te-gadget-simple span {
            border-left: none !important;
            font-family: inherit !important;
            color: var(--gray) !important;
            font-size: 14px !important;
        }
        .lang-select {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-select {
        display: flex;
        align-items: center;
        gap: 8px;
        background-color: #fff;
        border: 2px solid #D9D9D9;
        border-radius: 25px;
        padding: 8px 15px;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .custom-select:hover {
        border-color: #A8964E;
    }

    .custom-select .icon svg {
        stroke: #A8964E;
    }

    /*.goog-te-combo {*/
    /*    border: none;*/
    /*    background: transparent;*/
    /*    outline: none;*/
    /*    color: #000;*/
    /*    font-weight: 500;*/
    /*    cursor: pointer;*/
    /*    max-width:21px;*/
    /*    padding:0!important;*/
    /*}*/
    
    .menu_flex {
    align-items: normal;
}


#google_translate_element {
    position: relative;
    /*width: 45px;*/
    /*height: 45px;*/
    display: flex;
    align-items: center;
    justify-content: center;
}

#google_translate_element .fa-globe {
    color: #b71615;
    font-size: 22px;
}

#google_translate_element .translate-arrow {
    font-size: 14px;
    color: #666;
    margin-left: 3px;
}

#google_translate_element .goog-te-combo {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
    border: none !important;
    background: transparent !important;
}

</style>

