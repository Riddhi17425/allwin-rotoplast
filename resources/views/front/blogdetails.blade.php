@include('layouts.frontheader', [
    'og_image' => $og_image,
])
@include('layouts.frontMenu')

@php
    $faqItems = collect(json_decode($finaldata->title_desc, true) ?: [])
        ->filter(function ($item) {
            return !empty($item['question']) && !empty($item['answer']);
        })
        ->values();

    $faqSchema = $faqItems->map(function ($item) {
        return [
            '@type' => 'Question',
            'name' => strip_tags($item['question']),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => trim(strip_tags($item['answer'])),
            ],
        ];
    });
@endphp

@if($faqSchema->isNotEmpty())
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faqSchema,
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endif
<style>
    .blog_details_content p {
        text-align: justify; 
    }

    .blog_cta_image {
        margin: 2rem 0;
        text-align: center;
    }

    .blog_cta_image img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
    }
</style>
<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{ url('/')}}">Home</a> / <a href="{{ url('/blog')}}">Blogs</a> / {{$finaldata->title}}    </p>
            </div>
        </div>
    </div>
</section>

<section class="blog-detail-wrapper">
    <div class="container">
        <a href="{{ url('/blog/blogdetail/'.$finaldata->id)}}">
         </a>
        <div class="blog_details_img">  
            <img src="{{ asset('public/images/'.$finaldata->image) }}" class="post-img" alt="{{$finaldata->title}}" loading="lazy" />
        </div>
        <div class="blog_details_title my-5">
            <h1 style="font-weight: 700;color: #B81615;">{{$finaldata->title}}</h1>
            <p>{{$finaldata->publish_date}}</p>
        </div>
        <div class="blog_details_content">
            {!! $finaldata->description !!}
        </div>
        @if($finaldata->cta_image)
            <div class="blog_cta_image">
                <a href="https://allwinrotoplast.com/contact-us" target_blank><img src="{{ asset('public/images/'.$finaldata->cta_image) }}" alt="{{$finaldata->title}} cta image" loading="lazy" /></a>
            </div>
        @endif
        @if($finaldata->conclusion)
            <div class="blog_details_content mt-4">
                <!--{!! $finaldata->conclusion !!}-->
                { $finaldata->conclusion }
            </div>
        @endif
    </div>
</section>
<div class="container">
    @if($faqItems->isNotEmpty())
    <div class="FAQ_productList">
            <h2 data-aos="fade-down" data-aos-duration="1500" class="mb-5 aos-init aos-animate">Frequently Asked Questions 
            </h2>
        <div class="accordion" id="accordionExample">
                @foreach($faqItems as $key => $item)
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="heading{{ $key }}">
                            <button class="accordion-button {{ $key == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $key }}">
                                {{ $item['question'] }}
                            </button>
                        </h4>
                        <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {!! $item['answer'] !!}
                            </div>
                        </div>
                    </div>
                @endforeach
           </div>
    </div>
    @endif
</div>
@include('layouts.frontfooter')
@include('layouts.popupmodal')