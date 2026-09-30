@include('layouts.frontheader')
@include('layouts.frontMenu')

<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="#">Home</a> /Pallets / 3 Runner, 4 Way Entry</p>
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
                {{-- <ul class='gc-start display1  abc' style="z-index: 1;">
                    <li>
                        <img src="{{asset('public/images/'.$data->product_image)}}" alt='image2' data-gc-caption="Caption text title2" />
                </li>
                </ul> --}}
                 {{-- <a href="{{ url('productshow/'.$data->id)}}">  --}}
                    <?php if ($data->product_image) {
                        if (strpos($data->product_image, ',') !== false) {
                            $image = explode(',', $data->product_image);
                        } else {
                            $image[0] = $data->product_image;
                        }
                    } 
                    ?>
                    <ul class='gc-start display1  abc' style="z-index: 1;">
                        @foreach($image as $k=>$v)
                        <li>
                            <img src="{{ asset('public/images/'.$v) }}" alt='image2' data-gc-caption="Caption text title2" />
                        </li>
                        @endforeach
                    </ul>
               {{-- </a>  --}}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="product_slider_details">
                    <div>
                        <h2>{{$data->product_name}}</h2>
                        <h4>{{$data->product_code}}</h4>
                        <p class="my-5">{!!$data->product_description!!}</p>
                    </div>
                    <div>
                        <p>Color Available:</p>
                        <div class="product_colors">
                            <p></p>
                        </div>
                        <button type="submit" class="btn common_btn" onclick="productModal('<?php echo $data->product_name; ?>')">Ask for Price</button>
                    </div>
                </div>
                <div class="product_details_tab my-5">
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Technical Details</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Features</button>
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
                                            <td>{!!$data->technical_details !!}</td>
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
        <h3>Certifictes</h3>
    </div>
    <div class="container">
        <div class="certificates_inner">
            <div class="swiper-three pt-5">
                <div class="swiper-wrapper text-center">
                    @foreach($data['cert'] as $k=>$v)
                    <div class="swiper-slide">
                        <img src="{{ asset('public/CertificateLogo/'.$v->certificate_logo)}}" alt="" class="img-fluid " />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
@if(!empty($data['other']) && $data['other'] != '' && isset($data['other']))

<section class="popular_product py-5">
    <div class="container">
        <div class="popular_slider pt-5">
            <h3>Similar Products</h3>

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
                                    <img src="{{ asset('public/images/'.$image[0]) }}" class="card-img-top img-fluid" alt="...">
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{$data->product_name}}</small>
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