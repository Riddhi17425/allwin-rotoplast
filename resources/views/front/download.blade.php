@include('layouts.frontheader')
@include('layouts.frontMenu')

<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{ url('/')}}">Home</a> / Download</p>
            </div>
        </div>
    </div>
</section>
<?php 
//echo $data
?>

<section class="download_certificates">
    <div class="container">
        <div class="download_pdf_inner">
            @foreach($datas as $key=>$val)
               @if($val->certificate_name == 'Coprorate Brochure' || $val->certificate_name == 'Pallets'  || $val->certificate_name == 'Spill Pallets' )
                    <div>
                        <a href="{{ url('public/CertificateFiles', $val->certificate_file)}}" target="_blank" style="text-decoration: none;">
                            <img src="{{ asset('public/images/download_pdf.png')}}" class="img-fluid" alt="{{$val->certificate_name}}" data-aos="zoom-out-up" data-aos-duration="1500">
                            <p class="my-3"  style="color: #212529;">{{$val->certificate_name}} Catalogue</p>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
<section class="download_certificates">
    <div class="container">
        <div class="main_title">
            <h3 class="effect-shine">Certificates</h3>
        </div>
        <div class="download_pdf_inner">
            @foreach($datas as $key=>$val)
                @if($val->certificate_name == 'Biotech Testing Services Test Report - 2' || $val->certificate_name == 'Biotech Testing Services Test Report - 1' || $val->certificate_name == 'ARP 100' 
                || $val->certificate_name == 'OCV' || $val->certificate_name == 'IIP laboratory 20th November,2013' || $val->certificate_name == 'Cipet Plastic Testing' || $val->certificate_name == 'Pallets Report' 
                || $val->certificate_name == 'IIP Laboratory 27th June,2013')
                    <div>
                        <a href="{{ url('public/CertificateFiles', $val->certificate_file)}}" target="_blank" style="text-decoration: none;">
                            <img src="{{ asset('public/images/download_pdf.png')}}" class="img-fluid" alt="{{$val->certificate_name}}" data-aos="zoom-out-up" data-aos-duration="1500">
                            <p class="my-3"  style="color: #212529;">{{$val->certificate_name}}</p>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
<!--<section>-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="download_pdf_inner">-->
<!--                @foreach($data as $key=>$val)-->
<!--                <div>-->
<!--                   <a href="javascript:void(0)"><img src="{{ asset('public/images/download_pdf.png')}}" class="img-fluid" alt="{{ $val->category_name}}" onclick="CatalogueModal('<?php echo $val->category_name; ?>')" data-aos="zoom-in-down" data-aos-duration="1500"></a>-->
<!--                    <p class="my-3">{{ $val->category_name}} Catalog</p>-->
<!--                </div>-->
<!--                @endforeach-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!--<section class="download_certificates">-->
<!--    <div class="container">-->
<!--        <div class="main_title">-->
<!--            <h3 class="effect-shine">Certificates</h3>-->
<!--        </div>-->

<!--        <div class="download_pdf_inner">-->
<!--            @foreach($datas as $key=>$val)-->
<!--            <div>-->
<!--                <a href="{{ url('public/CertificateFiles',$val->certificate_file)}}" target="_blank" style="text-decoration: none;"><img src="{{ asset('public/images/download_pdf.png')}}" class="img-fluid" alt="{{$val->certificate_name}}" data-aos="zoom-out-up" data-aos-duration="1500">               -->
<!--               <p class="my-3"  style="color: #212529;">{{$val->certificate_name}}</p>-->
<!--                </a>-->
<!--            </div>-->
<!--            @endforeach-->
<!--        </div>-->

<!--    </div>-->
<!--</section>-->


@include('layouts.frontfooter')
@include('layouts.popupmodal')