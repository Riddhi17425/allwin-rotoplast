@include('layouts.frontheader')
@include('layouts.frontMenu')
<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{ url('/')}}">Home</a> / Product List</p>
            </div>
        </div>
    </div>
</section>
<section class="product_list_wrapper">
    <div class="container">
        <div class="">
            <div class="">
                <div class="product_list_inner">
                    {{-- @foreach($data  as $key=>$val) 
                    <div>
                        <a href="{{ url('productshow/'.$val->id)}}">
                        <?php
                        //  if($val->product_image){
                        //     if( strpos($val->product_image, ',') !== false ) {
                        //         $image = explode(',',$val->product_image);
                        //     }else{
                        //         $image[0] = $val->product_image;
                        //     }
                        // }
                        ?>
                        <img src="{{ asset('public/images/'.$image[0]) }}" class="img-fluid" alt="">
                        <p>{{ $val['product_name'] }}</p>
                    </a>
                        <div>
                            <button type="submit" class="btn common_btn"  onclick="productModal('<?php 
                               // echo $val->product_name; 
                                ?>')">Ask for Price</button>
                        </div>
                       
                    </div>
                    @endforeach --}}
                    @foreach($data  as $key=>$val) 
                    <div>
                        <a href="{{ url('poduct-detail/'.$val->id)}}">
                    <?php if($val->product_image){
                        if( strpos($val->product_image, ',') !== false ) {
                            $image = explode(',',$val->product_image);
                        }else{
                            $image[0] = $val->product_image;
                        }
                    }?>
                    <img src="{{ asset('public/images/'.$image[0]) }}" class="img-fluid" alt="">
                    <p>{{ $val['product_name'] }}</p>
                    </a>
                    <div>
                        <button type="submit" class="btn common_btn" onclick="productModal('<?php echo $val['product_name'] ?>')">Ask for Price</button>
                    </div>
               
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <hr class="comman_hr" />
</div>
<div class="popular_slider pt-5">
    <div class="container">
        <div class="row">
            <h3>Application Of Product</h3>
            <div class="application_product">
                @foreach($datas as $key=>$val)
                <div>
                    <img src="{{ asset('public/appimage/'.$val->image) }}" class="img-fluid" alt="">
                    <p>{{$val->name}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('layouts.frontfooter')
<script>
    function redirectToRoute(routeUrl) {
        window.location.href = routeUrl;
    }
</script>