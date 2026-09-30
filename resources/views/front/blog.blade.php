@include('layouts.frontheader')
@include('layouts.frontMenu')


<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{ url('/')}}">Home</a> / Blogs</p>
            </div>
        </div>
    </div>
</section>
<section class="case-study-title">
<div class="main_title">
    <div class="container">
                        <h1 class="effect-shine">Our Latest Blogs</h1>
                        <p class="text-center mt-3 px-5 header-content"> Check out our latest blog for insights, tips, and expert advice on ice boxes, insulated boxes, fish tubs, plastic pallets, and more. Stay updated on the latest trends and solutions!</p>
                    </div>
                    </div>
</section>
<section>
    <div class="container">
        <div class="blog_inner">
            @foreach($datas as $key=>$val)
            <div class="post">
                <img src="{{ asset('public/images/'.$val->front_image)}}" class="post-img" alt="blog-image">
                    <a href="{{ url('/blog/'.$val->url)}}">
                    <div class="post-content">
                        <div class="blog-post-date">
                            <h5>{{date('Y',strtotime($val->publish_date))}}</h5>
                            <p>{{date('M',strtotime($val->publish_date))}}</p>
                        </div>
                        <div class="blog_title">
                            <h3>{{$val->title}}</h3>
                            <p>{{$val->short_description}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            {{-- <div class="post">
                <img src="./assets/images/blog-img.png" class="post-img" alt="">
                <div class="post-content">
                    <div class="blog-post-date">
                        <h5>30</h5>
                        <p>April</p>
                    </div>
                    <div class="blog_title">
                        <h3>Lorem ipsum dolor sit amet consectetur.....</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in maximus magna.</p>
                    </div>
                </div>
            </div>
            <div class="post">
                <img src="./assets/images/blog-img.png" class="post-img" alt="">
                <div class="post-content">
                    <div class="blog-post-date">
                        <h5>30</h5>
                        <p>April</p>
                    </div>
                    <div class="blog_title">
                        <h3>Lorem ipsum dolor sit amet consectetur.....</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in maximus magna.</p>
                    </div>
                </div>
            </div>
            <div class="post">
                <img src="./assets/images/blog-img.png" class="post-img" alt="">
                <div class="post-content">
                    <div class="blog-post-date">
                        <h5>30</h5>
                        <p>April</p>
                    </div>
                    <div class="blog_title">
                        <h3>Lorem ipsum dolor sit amet consectetur.....</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in maximus magna.</p>
                    </div>
                </div>
            </div>
            <div class="post">
                <img src="./assets/images/blog-img.png" class="post-img" alt="">
                <div class="post-content">
                    <div class="blog-post-date">
                        <h5>30</h5>
                        <p>April</p>
                    </div>
                    <div class="blog_title">
                        <h3>Lorem ipsum dolor sit amet consectetur.....</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in maximus magna.</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>


@include('layouts.frontfooter')
@include('layouts.popupmodal')