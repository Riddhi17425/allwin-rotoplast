@include('layouts.frontheader')
@include('layouts.frontMenu')

<style>
    .product_type {
  border-radius: 50%;
}
.product_type img{
  object-fit: cover;
  object-position: center;
  border-radius: 50%;
}
.product_features{
    display: flex;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    justify-content: center;
}
.product_type_wrapper{
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 20px;
}
.product_hr{
  color: #DDDDDD;
  margin: 40px 0;
}
    @media only screen and (max-width: 1400px) {
}
@media only screen and (max-width: 1024px) {
  .case_studies_img_inner {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media only screen and (max-width: 992px) {
}
@media only screen and (max-width: 768px) {
  .product_type_wrapper {
    grid-template-columns: repeat(3, 1fr);
  }
}
@media only screen and (max-width: 540px) {
  .product_type_wrapper {
    grid-template-columns: repeat(3, 1fr);
  }
}
</style>
<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{url('/')}}">Home</a> / <a href="{{ url('product-list/'.str_replace(' ', '-', strtolower($data->category_name))) }}">{{$data->category_name}}</a> / {{ strtoupper($data->product_name) }}</p>
            </div>
        </div>
    </div>
</section>
<?php
//dd($data['cer']->certificate_logo);
?>
<section class="product_main_slider  mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="custom_glass_effect">
                {{-- <ul class='gc-start display1  abc' style="z-index: 1;">
                    <li>
                        <img src="{{asset('public/Product_Images/'.$data->product_image)}}" alt='image2' data-gc-caption="" />
                </li>
                </ul> --}}
                {{-- <!-- <a href="{{ url('productshow/'.$data->id)}}"> --> --}}
                    <?php if ($data->product_image) {
                        if (strpos($data->product_image, ',') !== false) {
                            $image = explode(',', $data->product_image);
                        } else {
                            $image[0] = $data->product_image;
                        }
                    } ?>
                    <ul class='gc-start display1  abc' style="z-index: 1;">
                        @foreach($image as $k=>$v)
                        <li>
                            <img src="{{ asset('public/Product_Images/'.$v) }}" alt='image2' data-gc-caption="" />
                        </li>
                        @endforeach
                    </ul>
                <!-- </a> -->
                </div>
                
                <!--add by yamini-->
                  @if ($data->category_name == 'Pallets')
                <div class="product_features my-5">
                    <div class="">
                        <div class="product_type ">
                            <img src="{{asset('public/front/images/1.png')}}" class="img-fluid rounded-0" alt="">
                        </div>
                    </div>
                    <div class="">
                        <div class="product_type">
                            <img src="{{asset('public/front/images/2.png')}}" class="img-fluid rounded-0" alt="">
                        </div>
                    </div>
                    <div class="">
                        <div class="product_type">
                            <img src="{{asset('public/front/images/3.png')}}" class="img-fluid rounded-0" alt="">
                        </div>
                    </div>
                    <div class="">
                        <div class="product_type">
                            <img src="{{asset('public/front/images/4.png')}}" class="img-fluid rounded-0" alt="">
                        </div>
                    </div>
                </div>
            @endif
                <!--end by yamini-->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="product_slider_details">
                    <div>
                        @if($data->category_name == 'Fish Tubs')
                        <h1 data-aos="zoom-in-down" data-aos-duration="1500">Insulated Fish Tubs - {{$data->product_name}}</h1>
                        @endif
                         @if($data->category_name == 'Ice Box')
                        <h1 data-aos="zoom-in-down" data-aos-duration="1500">Insulated Ice Box - {{$data->product_name}}</h1>
                        @endif
                        
                        @if($data->category_name != 'Fish Tubs' && $data->category_name !=  'Ice Box')
                        <h1 data-aos="zoom-in-down" data-aos-duration="1500">{{$data->product_name}}</h1>
                        @endif
                        <h4><span>Product Code : </span>{{$data->product_code}}</h4>
                        
                        <p class="my-5">{!!$data->product_description!!}</p>
                        
                    </div>
                    <div>
                        
                        <p>Color Available:</p>
                        <div class="product_colors">
                            <?php if ($data->category_name == 'Plastic Pallets'): ?>
                        <p style="background:grey"></p>
                        <p style="background:white"></p>
                        <p style="background:darkblue"></p>
                    <?php elseif ($data->category_name == 'Fish Tubs'): ?>
                        <p style="background:blue"></p>
                        <p style="background:red"></p>
                        <p style="background:beige"></p>
                    <?php elseif ($data->category_name == 'Ice Box'): ?>
                        <p style="background:red"></p>
                        <p style="background:white"></p>
                        <p style="background:beige"></p>
                    <?php elseif ($data->category_name == 'Doff Basket'): ?>
                        <p style="background:red" ></p>
                    <?php elseif ($data->category_name == 'Milk Can'): ?>
                        <p style="background:darkblue" ></p>
                    <?php elseif ($data->category_name == 'Roto Moulded Plastic Dustbins'): ?>
                        <!--<p style="background:green" ></p>-->
                        <p style="background:#d01020" ></p>
                        <p style="background:blue" ></p>
                        <p style="background:darkgreen" ></p>
                    <?php elseif ($data->category_name == 'Safbin'): ?>
                        <p style="background:white" ></p>
                        <p style="background:blue" ></p>
                    <?php elseif ($data->category_name == 'Pallet Container'): ?>
                        <p style="background:white" ></p>
                    <?php elseif ($data->category_name == 'Processing Trolley'): ?>
                        <p style="background:red" ></p>
                    <?php endif; ?>
                    <br><span>Customized Color Available For Bulk Quantity</span> 
                        </div>
                     @if ($data->product_name == '3 Runner, 4 Way Entry' || $data->product_name == '3 Runner, 2 Way Entry' || $data->product_name == '9 legs 4-way Entry' || $data->product_name == '7 Runners, 2 Way Entry' || $data->product_name == 'ROLL PALLET' || $data->product_name == 'KISS OF PALLET')
                        <div class="product_type_wrapper">
                            <div class="">
                                <div class="product_type">
                                    <img src="{{asset('public/front/images/ribbed.png')}}" class="img-fluid" alt="">
                                </div>
                                <p style="text-align: center;">Ribbed</p>
                            </div>
                            <div class="">
                                <div class="product_type">
                                    <img src="{{asset('public/front/images/checkerd.png')}}" class="img-fluid" alt="">
                                </div>
                                <p style="text-align: center;">Checkered</p>
                            </div>
                            <div class="">
                                <div class="product_type">
                                    <img src="{{asset('public/front/images/safety.png')}}" class="img-fluid" alt="">
                                </div>
                                <p>Safety Border</p>
                            </div> 
                        </div>
                    @endif
                     @if ($data->product_name == 'Single wall Spill Pallets' || $data->product_name == 'Double wall Spill Pallets')
                        <div class="product_type_wrapper">
                            <div class="">
                                <div class="product_type">
                                    <img src="{{asset('public/front/images/round-spill.png')}}" class="img-fluid" alt="">
                                </div>
                                <p style="text-align: center;">Round</p>
                            </div>
                            <div class="">
                                <div class="product_type">
                                    <img src="{{asset('public/front/images/checkered-spill.png')}}" class="img-fluid" alt="">
                                </div>
                                <p style="text-align: center;">Checkered</p>
                            </div>
                        </div>
                    @endif

                        <button type="submit" class="btn common_btn" onclick="productModal('<?php echo $data->product_name ?>','<?php echo $data->category_name ?>')">Ask for Price</button>
                    </div>
                </div>
                <div class="product_details_tab my-5">
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Technical Details</button>
                        <!--<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Features</button>-->
                    </div>
                    </nav>
                    <div class="tab-content p-3 border table-responsive " id="nav-tabContent">
                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col">Model</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Load Capacity</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! $data->technical_details !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="text-center">
                                <td>{{$data->features}}</td>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<section class="certificate-logo-wrapper pt-5 pb-5" style="background-color: #EFEFEF;">
    <div class="popular_slider ">
        <h3 data-aos="fade-down" data-aos-duration="1500">Certificates</h3>
    </div>
    <!--<div class="container">-->
    <!--    <div class="certificates_inner">-->
    <!--        <div class="swiper-three pt-5">-->
    <!--            <div class="swiper-wrapper text-center">-->
    <!--                @foreach($data['cert'] as $k=>$v)-->
    <!--                <div class="swiper-slide">-->
    <!--                    <img src="{{ asset('public/CertificateLogo/'.$v->certificate_logo)}}" alt="certificates" class="img-fluid " />-->
    <!--                </div>-->
    <!--                @endforeach-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    <div class="container">
        <div class="certificates_inner  ">
            <div class="certificates-slider pt-5">
                @foreach($data['cert'] as $key=>$val)
                    <div class="">
                        <img src="{{ asset('public/CertificateLogo/'.$val->certificate_logo)}}" alt="certificates" srcset="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
</section>
@if(!empty($data['other']) && $data['other'] != '' && isset($data['other']))

<section class="popular_product py-5">
    <div class="container">
        <div class="popular_slider pt-5">
            <h3 data-aos="fade-down" data-aos-duration="1500">Other Products</h3>

            <!-- <a href="{{ url('productshow/'.$data->id)}}"> -->
            <div class="my-3">
                <div class="swiper my-5">
                    <div class="swiper-wrapper mb-3">
                        @foreach($data['other'] as $k=>$v)
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
                                    <img src="{{ asset('public/Product_Images/'.$image[0]) }}" class="card-img-top img-fluid" alt="...">
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted"><a href="{{ url(str_replace(' ', '-', strtolower($v->category_name)).'/'.str_replace(',', '', str_replace(' ', '&', $v->producturl))) }}" style="color:#fff !important;text-decoration: none;">{{ strtoupper($v->product_name)}}</a></small>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <!-- </a> -->
                </div>
            </div>
        </div>
    </div>

</section>
@endif
@include('layouts.frontfooter')
@include('layouts.popupmodal')