<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WTJK4GM2');</script>
<!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <!--fbmeta-->
@php
    $ogType = request()->is('blog/*') || request()->is('blog') ? 'article' : 'website';
@endphp
<meta property="og:type" content="{{ $ogType }}">

<meta property="og:title" content="{{ $metatitle }}">
<meta property="og:description" content="{{ $metadescription }}">
<meta property="og:url" content="{{ url()->current() }}">
@if(isset($og_image) && $og_image != '')
    <meta property="og:image" content="{{ asset('public/images/'.$og_image) }}" />
    @else
     <meta property="og:image" content="{{ asset('public/front/images/og-images/'. ($ogimage ?? 'slider-1.png')) }}" />
@endif
 <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="627">
<link rel="canonical" href="{{ url()->current() }}" />


    <!--fbmeta-->
    <title>{!! $metatitle !!}</title>
    <meta name="description" content="{!! $metadescription !!}">
<link rel="icon" type="image/x-icon" href="{{ asset('public\images\allwin-favicon.png')}}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap cdn -->
  @if($data['products']->product_image ?? '')
   <meta property="og:image" content="{{ asset('public/Product_Images/'.$data->product_image) }}" />
  @endif
<!--slick slider -->
 <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- swiper slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.4.1/swiper-bundle.css" integrity="sha512-Aeqz1zfbRIQHDPsvEobXzaeXDyh8CUqRdvy6QBCQEbxIc/vazrTdpjEufMbxSW61+7a5vIDDuGh8z5IekVG0YA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--<link rel="stylesheet" href="https://unpkg.com/swiper@6.4.8/swiper-bundle.min.css">-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />-->
    <!--<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />-->
    <!-- swiper slider -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('public/front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/fonts/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/glasscase.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/css/intlTelInput.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"> 
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
    .bottom-whatsapp {
        position: fixed;
        bottom: 85px;
        width: 55px;
        right: 15px;
        height: 55px;
        z-index: 999;
    };

        input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
    </style>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1012413940761412');
fbq('track', 'PageView');
</script>
<noscript><img height=""1"" width=""1"" style=""display:none""
src=""https://www.facebook.com/tr?id=1012413940761412&ev=PageView&noscript=1""
/></noscript>
<!-- End Meta Pixel Code -->

<!--Schema-->
<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "LocalBusiness",
"name": "Allwin Roto Plast",
"image": "https://allwinrotoplast.com/public/front/images/we-are.png",
"@id": "",
"url": "https://allwinrotoplast.com/",
"telephone": "+91 9712930708",
"priceRange": "-",
"address": {
"@type": "PostalAddress",
"streetAddress": "753/B, B/h. Cadila Corporate Campus, Sarkhej-Dholka Road, Vill. Bhat, Tal.
Daskroi",
"addressLocality": "Ahmedabad",
"postalCode": "382210",
"addressCountry": "IN"
},
"geo": {
"@type": "GeoCoordinates",
"latitude": 22.87127988403031,
"longitude": 72.46020371349309
},
"openingHoursSpecification": {
"@type": "OpeningHoursSpecification",
"dayOfWeek": [
"Monday",
"Tuesday",
"Wednesday",
"Thursday",
"Friday",
"Saturday",
"Sunday"
],
"opens": "00:00",
"closes": "23:59"
},
"sameAs": [
"https://www.facebook.com/allwinrotoplast/",
"https://www.instagram.com/allwinrotoplast/",
"https://www.linkedin.com/company/allwin-roto-plast-private-limited/"
]
}
</script>


</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTJK4GM2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->