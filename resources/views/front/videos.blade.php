@include('layouts.frontheader')
@include('layouts.frontMenu')
<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{ url('/')}}">Home</a> / Videos</p>
            </div>
        </div>
    </div>
</section>
<section class="Yt-videos">
    <div class="container">
        <div class="col-lg-12 col-md-6 col-sm-12">
            <div class="mainYTvideos">
                @foreach ($data as $val)
                    <div class="videoPart">
                        @if($val['youtube_video_link'])
                        <iframe src="{{ $val->youtube_video_link }}" title="YouTube video player" frameborder="0"
                            class="iframehendal"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                        @elseif(['upload_video'])
                        <iframe src="{{ asset('public/uploaded video/' . $val->upload_video) }}" title="YouTube video player" frameborder="0"
                            class="iframehendal"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('layouts.frontfooter')
@include('layouts.popupmodal')