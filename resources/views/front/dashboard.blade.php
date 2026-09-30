@include('layouts.frontheader')
@include('layouts.frontMenu')

@php
 $category = DB::select(DB::raw("SELECT id,category_name from categories WHERE is_delete='0'"));
 
@endphp
@foreach($category as $key=>$val)
@endforeach

<section class="slider_wrapper">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators" id="test">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="{{ asset('public/front/images/slider-1-bg.webp')}}" class="d-block w-100 img-fluid slider_img" alt="slider-1-bg">
                <div class="carousel-caption">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 offset-md-1 offset-sm-0 col-sm-12">
                            <div class="banner_text">
                            <h1>Insulated Ice Boxes</h1>
                            <ul>
                                <li>Ideal for refrigerated food products and drinks</li>
                                <li>Easy to handle, carry and maintain</li>
                                <li>High durability with no abrasion and wear properties</li>
                                <li>Available in big capacities to keep different sizes of products for long period of time</li>
                            </ul>
                            <a type="submit" class="btn" href="{{url('product-list/ice-box') }}">View Products</a>
                            </div>
                       </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mobile_none">
                            <div>
                                <img src="{{ asset('public/front/images/slider-1.webp')}}" class="img-fluid" alt="slider-1" data-aos="zoom-out" data-aos-duration="1000" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset('public/front/images/slider-2-background.webp')}}" class="d-block w-100 slider_img" alt="slider-2-background">
                <div class="carousel-caption">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 offset-md-1 offset-sm-0 col-sm-12">
                            <div class="banner_text">
                                <h2>Fish Tubs</h2>
                                <ul>
                                    <li>Light weight</li>
                                    <li>Highly durable</li>
                                    <li>Easy to store</li>
                                    <li>Fish totes of designed by Allwin are widely enhance temperature retention of your perishable product.</li>
                                </ul>
                                <a type="submit" class="btn" href="{{url('product-list/fish-tubs') }}">View Products</a>
                                </div>
                            </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mobile_none">
                            <div>
                                <img src="{{ asset('public/front/images/nslider-2.webp')}}" class="img-fluid" alt="nslider-2" data-aos="zoom-out" data-aos-duration="1500">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset('public/front/images/slider-3-bg (1).webp')}}" class="d-block w-100 slider_img" alt="slider-3-bg">
                <div class="carousel-caption">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 offset-md-1 offset-sm-0 col-sm-12">
                            <div class="banner_text">
                                <h2>Roto Mould Plastic Pallet</h2>
                                <ul>
                                    <li>3 Runners, 2 Way Entry</li>
                                    <li>3 Runner, 4 Way Entry</li>
                                    <li>9 Legs, 4 Way Entry</li>
                                    <li>Spill Pallets</li>
                                    <li>Roll Pallets</li>
                                </ul>
                                <a type="submit" class="btn" href="{{url('product-list/plastic-pallets') }}">View Products</a>
                                </div>
                            </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mobile_none">
                            <div>
                                <img src="{{ asset('public/front/images/nslider-3.webp')}}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-duration="1500">
                            </div>
                        </div>
                    </div>
                </div>
            </div>       
          
    </div>
</section>
<section class="we_are_wrapper py-5">
    <div class="we_are_bg pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="we_are_inner">
                        <img src="{{ asset('public/front/images/we-are.png')}}" class="img-fluid hvr-curl-bottom-right" alt="we-are" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="we_are_inner position-relative">
                        <h2 class="effect-shine">Ice Box and Fish Tub Manufacturer</h2>
                        <!--<p class="py-3">Allwin Roto Plast, established in 1998 in Ahmedabad, Gujarat, India, is a reputable manufacturer, exporter, and supplier of durable Plastic Pallets, Boxes, Tanks, Insulated Fish Tubs, Insulated Pallet Containers, and more. With ISO 9001:2008 certification, we specialise in providing reliable solutions for transporting a wide range of commercial products, including chemicals, drugs, and food items. Our products are meticulously designed according to client specifications, and they are known for their temperature resistance, enduring strength, and durability.</p>-->
                         <p class="py-3">Allwin Roto Plast, established in 1998 in Ahmedabad, Gujarat, India, is a reputable manufacturer, exporter, and supplier of durable Plastic Pallets, Plastic Ice Boxes, Tanks, Insulated Fish Tubs, Insulated Pallet Containers, and more. As distinguished insulated fish box manufacturers with ISO 9001:2008 certification, we specialise in providing reliable solutions for transporting a wide range of commercial products, including chemicals, drugs, and food items. Our products are meticulously designed according to client specifications, and they are known for their temperature resistance, enduring strength, and durability.</p>
                    </div>
                    <div class="row py-5">
                        <div class="col-md-6 col-sm-12">
                            <div class="position-relative">
                                <!--<p>In Business Since</p>-->
                                <!--<h4>25+</h4>-->
                                <!--<p>Years</p>-->
                                <img src="{{ asset('public/front/images/25-years-logo.png')}}" class="img-fluid hvr-curl-bottom-right" alt="25 years logo" />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="year_content position-relative">
                                <p>Our company has gained prominence in the industry due to the following factors:
                                </p>
                                <ul>
                                    <li>Utilisation of modern production methods</li>
                                    <li>A skilled team of professionals</li>
                                    <li>Timely delivery of products</li>
                                    <li>ISO certification, ensuring quality standards</li>
                                    <li>Customisation facility to meet specific requirements</li>
                                    <li>Strict adherence to quality assurance processes</li>
                                    <li>CE & GMP Certified</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- popular product -->

<section class="popular_product py-5">
    <div class="container">
        <div class="product_content">
            <h2 data-aos="flip-down" data-aos-duration="1500">We Manufacture Roto Moulded Products</h2>
            <p>Allwin Roto Plast is a well-known manufacturer, exporter, and supplier of various roto-moulded products. Our extensive range includes Insulated Fish Tubs, Insulated Boxes, Plastic Insulated Fish Tubs, Ice Boxes, Dustbins, Shipping Boxes, Pallets, Chilling Pads, and more.</p>
        </div>

          <div class="popular_slider pt-5">
            <h3 class="effect-shine">Popular Product</h3>
        <div class="container">
            <div class="popular_slider ">
                  <div class="my-3">
                    <div class="swiper my-5">
                        <div class="swiper-wrapper mb-3">
                            @foreach($data['popular_product'] as $k=>$v)
                            <?php if ($v->product_image) {
                            if (strpos($v->product_image, ',') !== false) {
                                $image = explode(',', $v->product_image);
                            } else {
                                $image[0] = $v->product_image;
                            }
                        } ?>
                            <div class="swiper-slide">
                                <div class="card">
                                    <div class="similar_product_img">
                                        <img src="{{ asset('public/Product_Images/'.$image[0])}}" loading="lazy" class="card-img-top img-fluid" alt="{{$image[0] ?? 'Product Image'}}">
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted"><a href="{{ url(str_replace(' ', '-', strtolower($v->category_name)).'/'.str_replace(',', '', str_replace(' ', '&', $v->producturl))) }}" style="color:#fff !important;text-decoration: none;">{{ strtoupper($v->product_name) }}</a></small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<!-- certificate -->

<!--<section class="certificate-logo-wrapper  pb-5">-->
<!--    <div class="popular_slider ">-->
<!--        <h3 data-aos="fade-down"  data-aos-duration="1500">Certifictes</h3>-->
<!--    </div>-->
    
<!--     <div class="container">-->
<!--        <div class="certificates_inner">-->
<!--             <div class="swiper-three pt-5">-->
<!--                <div class="swiper-wrapper text-center" data-loop="true">-->
<!--                    @foreach($data['certificates'] as $key=>$val)-->
<!--                    <div class="swiper-slide">-->
<!--                        <img src="{{ asset('public/CertificateLogo/'.$val->certificate_logo)}}" alt="certificates" srcset="">-->
<!--                    </div>-->
<!--                    @endforeach-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->



<section class="certificate-logo-wrapper pt-5 pb-5">
    <div class="popular_slider ">
        <h3 class="effect-shine">Certificates</h3>
    </div>
    <div class="container">
        <div class="certificates_inner  ">
            <div class="certificates-slider pt-5">
                @foreach($data['certificates'] as $key=>$val)
                    <div class="">
                        <img src="{{ asset('public/CertificateLogo/'.$val->certificate_logo)}}" alt="certificates" srcset="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>




<!--<section class="our_client py-5">-->
<!--    <div class="container">-->
<!--        <div class="popular_slider ">-->
<!--            <h3 data-aos="fade-down"  data-aos-duration="1500">Certifictes</h3>-->
<!--        </div>-->
<!--        <div class="swiper-three pt-5">-->
<!--            <div class="swiper-wrapper text-center">-->
<!--              @foreach($data['certificates'] as $key=>$val)-->
<!--                    <div class="swiper-slide">-->
<!--                        <img src="{{ asset('public/CertificateLogo/'.$val->certificate_logo)}}" alt="certificates" srcset="">-->
<!--                    </div>-->
<!--                    @endforeach-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->


<section class="certificates py-5">
    <div class="certificates_bg pt-5 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="certificates_block text-center">
                        <img src="{{ asset('public/front/images/innovation.png')}}" class="hvr-pulse"/>
                        <div class="block_content">
                            <h3>Innovation</h3>
                            <p>Continuous Research and Development for creative industry solutions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="certificates_block text-center">
                        <img src="{{ asset('public/front/images/quality.png')}}" class="hvr-pulse"/>
                        <div class="block_content">
                            <h3>Quality</h3>
                            <p>Defined Quality Control process at each stage of manufacturing to achieve excellence.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="certificates_block text-center">
                        <img src="{{ asset('public/front/images/technology.png')}}" class="hvr-pulse" />
                        <div class="block_content">
                            <h3>Technology</h3>
                            <p>Carry out extensive market research to find more advanced technologies in the field.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="certificates_block text-center">
                        <img src="{{ asset('public/front/images/support.png')}}" class="hvr-pulse"/>
                        <div class="block_content">
                            <h3>Customer Support</h3>
                            <p>We committed to provide best-in-class service & support through world class technology & response mechanisms.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- client say -->
<!--<section class="client_wrapper py-5">-->
<!--    <div class="container">-->
<!--        <div class="popular_slider ">-->
<!--            <h3 class="effect-shine">What our Clients says</h3>-->
<!--        </div>-->
<!--        <div class="swiper-two my-5">-->
            <!-- Additional required wrapper -->
<!--            <div class="swiper-wrapper mb-3">-->
                <!-- Slides -->
<!--                @foreach($data['what_our_client'] as $k=>$v)-->
<!--                <div class="swiper-slide">-->
<!--                    <div class="card mb-3">-->
<!--                        <div class="card-body  px-5 py-4 ">-->
<!--                            <img src="{{ asset('public/front/images/quate-mark.png')}}" alt="" class="my-3" />-->
<!--                            {{-- <p class="card-text">Good morning Azam. The tubs looks very good, and the quality seems great. We have a store and have sold a few of them, and also have a fishing boat, and have tested them there. We are really happy with the tubs and as soon as we sell them we will order more from you. </p> --}}-->
                           
<!--                            <p class="card-text">{!! $v->description !!}</p>-->

<!--                        </div>-->
<!--                        <div class="card-footer px-5">-->
<!--                            <h4>{{ $v->client_name }}</h4>-->
                            <!--<p>{{ $v->client_company_name }}</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                @endforeach-->
              
<!--            </div>-->
            <!-- If we need pagination -->
<!--            <div class="swiper-pagination"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<section class="client_wrapper py-5">
    <div class="container">
    <div class="popular_slider ">
            <h3 class="effect-shine">What our Clients says</h3>
        </div>
        <div class="swiper-clients my-5">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper mb-3">
            @foreach($data['what_our_client'] as $k=>$v)
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="card mb-3">
                        <div class="card-body px-5 py-4">
                    <img src="{{ asset('public/front/images/quate-mark.png')}}" alt="quate mark" class="my-3" />
                            <!-- <p class="card-text">Good morning Azam. The tubs looks very good, and the quality seems great. We have a store and have sold a few of them, and also have a fishing boat, and have tested them there. We are really happy with the tubs and as soon as we sell them we will order more from you. </p> -->
                            <p class="card-text">{!! $v->description !!}</p>
                        </div>
                        <div class="card-footer px-5">
                            <!-- <h4>Jarle Smith</h4> -->
                            <!-- <h4>{{ $v->client_name }}</h4> -->
                            <!-- <p>Company name</p> -->
                            <p>{{ $v->client_company_name }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- client say -->



<!-- world map -->

<section class="wrold_map_wrapp py-5">
    <div class="container">
        <div class="popular_slider ">
            <h3 class="effect-shine">Our network in all over world</h3>
        </div>
        <div class="world_img mt-5">
            <img src="{{ asset('public/front/images/wrold-map.png')}}" alt="wrold map" class="img-fluid" data-aos="zoom-in-down" data-aos-easing="ease-out-cubic" data-aos-duration="3000" />
        </div>
    </div>
</section>

<div class="container">
    <hr class="map_hr" />
</div>
<!-- world map -->


<!-- our client` -->

<section class="our_client py-5">
    <div class="container">
        <div class="popular_slider ">
            <h3 class="effect-shine">Our Clients</h3>
        </div>
        <div class="swiper-three pt-5">
            <div class="swiper-wrapper text-center">
               @foreach($data['clients'] as $ke=>$ve)
                <div class="swiper-slide">
                    <img src="{{ asset('public/ClientLogo/'. $ve->client_logo)}}" alt="client Logo" srcset="">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- our client` -->



@include('layouts.frontfooter')
@include('layouts.popupmodal')