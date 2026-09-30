@include('layouts.frontheader')
@include('layouts.frontMenu')

<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="#">Home</a> / Case Studies</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="case_studies_img_inner">
                
            @foreach($data as $key=>$val)
                <div class="">
                    <img  src="{{asset('public/caseimages/'.$val->image)}}" class="img-fluid popup_img thumbnails" alt="">
                    <p class="">{{$val->name}}</p>
                </div>
                @endforeach

            </div>
        </div>
    </div>


</section>

@include('layouts.frontfooter')