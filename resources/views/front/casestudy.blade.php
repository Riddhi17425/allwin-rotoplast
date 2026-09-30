@include('layouts.frontheader')
@include('layouts.frontMenu')

<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{ url('/')}}">Home</a> / Case Studies</p>
            </div>
        </div>
    </div>
</section>
<section class="case-study-title">
<div class="main_title">
                        <h1 class="effect-shine">Our Case Studies</h1>
                    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="case_studies_img_inner">
                
            @foreach($data as $key=>$val)
                <div class="">
                    <img  src="{{asset('public/caseimages/'.$val->image)}}" class="img-fluid popup_img thumbnails" alt="{{$val->name}}" data-aos="zoom-in-down" data-aos-duration="1500">
                    <p class="">{{$val->name}}</p>
                </div>
                @endforeach

            </div>
        </div>
    </div>


</section>

@include('layouts.frontfooter')
@include('layouts.popupmodal')