@include('layouts.frontheader')
@include('layouts.frontMenu')
<style>
    .about_detail {
    max-height: 320px; /* Initial visible height */
    overflow: hidden;
    transition: max-height 0.6s ease;
    position: relative;
}

/* Optional fade effect */
.about_detail::after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    height: 60px;
    background: linear-gradient(to bottom, rgba(255,255,255,0), #fff);
    transition: opacity 0.3s;
    pointer-events: none;
}

.about_detail.expanded::after {
    opacity: 0;
}

.read-more-btn {
    margin-top: 20px;
    padding: 10px 20px;
    border: none;
    background: #ad2126;
    color: #fff;
    cursor: pointer;
    border-radius: 999px;
    transition: background 0.3s;
}

.read-more-btn:hover {
    background: #0056b3;
}
</style>
<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{ url('/')}}">Home</a> / About Us</p>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!--<div class="">-->
                <!--    <img src="{{ asset('public/images/about-img-1.png')}}" class="img-fluid " alt="about-img">-->
                <!--</div>-->
                
                <div class="zoom">
                       <img src="{{ asset('public/front/images/about-img-1.jpg')}}" alt="zoom"  class="img-fluid alignleft size-medium wp-image-7000" />
                </div>
                
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 ">
                <div class="about_detail_wrapper">
                    <div class="contact_details">
                        <h1 class="effect-shine">About Company</h1>
                    </div>
                    <div class="about_detail" id="aboutContent">
                        <p>Our Journey to Rotational Moulding Excellence</p>
                        <p>Established in 1998, our company started with a vision and a dedicated team. Today, we're pioneers in the industry, transforming product design and manufacturing.</p>
                        <p style="font-weight:600 ; margin-bottom:10px" >Innovation-Driven Growth:</p>
                        <p>Since the beginning, we saw the potential in rotational moulding. Our relentless pursuit of innovation has led to significant milestones and shaped our success.</p>
                        <p style="font-weight:600 ; margin-bottom:10px">Cutting-Edge Technology:</p>
                        <p>We invest in state-of-the-art machinery, staying at the forefront of the industry. Our diverse product range caters to industrial and consumer needs.</p>
                        <p style="font-weight:600 ; margin-bottom:10px">Expert Team:</p>
                        <p>Our skilled engineers and designers push boundaries, delivering groundbreaking solutions that exceed expectations.</p>
                        <p style="font-weight:600 ; margin-bottom:10px">Customer-Centric Approach:</p>
                        <p>We prioritize customer satisfaction, understanding unique needs, and building lasting relationships based on trust and reliability.</p>
                        <p style="font-weight:600 ; margin-bottom:10px">Leading the Industry:</p>
                        <p>We've set standards for innovation, quality, and environmental responsibility. Our commitment to excellence remains unwavering.</p>
                        <p style="font-weight:600 ; margin-bottom:10px">Join Our Journey:</p>
                        <p>Explore our revolutionary products and collaborate with us to bring your ideas to life. Together, let's create a limitless world of innovation.</p>
                        
                    </div>
                    <button id="readMoreBtn" class="read-more-btn">Read More</button>
                    <!--<div class="about_detail">-->
                    <!--    <p>Allwin, originally founded in 1998, started as a partnership firm in small industrial premises specialising in insulated products and cold/hot preservation solutions. Over time, we expanded our operations and relocated to a spacious state-of-the-art facility equipped with advanced technology and an expanded product range. With a team of highly qualified and experienced industry professionals at the helm, Allwin has consistently delivered operational excellence for more than 25 years.</p>-->
                        
                    <!--    <p>Our company is engaged in the manufacturing, exporting, wholesaling, and supplying of the following products:</p>-->
                    <!--    <div class="d-flex">-->
                    <!--        <ul>-->
                    <!--            <li>Insulated Boxes</li>-->
                    <!--            <li>Insulated Ice Boxes</li>-->
                    <!--            <li>Dustbins</li>-->
                    <!--            <li>Doff Basket</li>-->
                    <!--            <li>Safbin</li>-->
                    <!--        </ul>-->
                    <!--        <ul>-->
                    <!--            <li>Shipper Boxes</li>-->
                    <!--            <li>Pallets</li>-->
                    <!--            <li>Chilling Pads</li>-->
                    <!--            <li>Milk Can</li>-->
                    <!--            <li>Pallet Container</li>-->
                    <!--        </ul>-->
                    <!--    </div>-->

                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about_comapny_wrapper my-5">
    <div class="">
        <div class="container">
            <div class="about_company_title mb-5">
                <h2>Company USP</h2>
            </div>
            <div class="about_company_inner">
                <div class="certificates_block text-center">
                    <img src="{{ asset('public/images/r_&_d.png')}}" alt="r_&_d" class="hvr-pulse" />
                    <div class="block_content">
                        <p>R&D Team With Technological Expertise</p>
                    </div>
                </div>
                <div class="certificates_block text-center">
                    <img src="{{ asset('public/images/finacial.png') }}" alt="finacial" class="hvr-pulse" />
                    <div class="block_content">
                        <p>Good Financial
                            Position & TQM</p>
                    </div>
                </div>
                <div class="certificates_block text-center">
                    <img src="{{ asset('public/images/production.png') }}" alt="production" class="hvr-pulse" />
                    <div class="block_content">
                        <p>Large
                            Product Line</p>
                    </div>
                </div>
                <div class="certificates_block text-center">
                    <img src="{{ asset('public/images/large_production.png') }}" alt="large production" class="hvr-pulse" />
                    <div class="block_content">
                        <p>Large Production
                            Capacity</p>
                    </div>
                </div>
                <div class="certificates_block text-center">
                    <img src="{{ asset('public/images/quality.png') }}" alt="quality" class="hvr-pulse" />
                    <div class="block_content">
                        <p>Quality
                            Measures </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="visin_mission_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="vision_mission_padd">
                    <div class="about_vision_mission">
                        <h2 class="effect-shine">Our Vision:</h2>
                    </div>
                    <p class="my-5">To lead the future of rotational moulding through relentless innovation, sustainable practices, and unparalleled customer satisfaction.</p>
                </div>
                <div class="vision_mission_padd">
                    <div class="about_vision_mission">
                        <h2 class="effect-shine">Our Mission:</h2>
                    </div>
                    <p class="my-5">At our innovative rotational moulding company, we are committed to revolutionizing the industry by pushing the boundaries of what's possible. Through cutting-edge technology, eco-conscious practices, and a dedicated team, we strive to deliver high-quality, customized solutions that exceed our customers' expectations. Our mission is to create a greener world, one innovative product at a time, while fostering long-lasting partnerships with our clients and promoting a culture of excellence and sustainability within our organization.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                
                <div class="zoom">
                       <img src="{{ asset('public/images/vision&mission.png')}}" alt="vision"  class="alignleft size-medium wp-image-7000" />
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
<hr>
</div>
<section class="visin_mission_wrapper">
    <div class="container">
         
 <div class="vision_mission_padd">
                    <div class="about_vision_mission">
                        <h2 class="effect-shine">Directors Message:</h2>
                    </div>
                    <p class="my-5">At Allwin, customer satisfaction is our top priority. Our dedicated team, alongside reliable partners, has contributed to our success. We take pride in our high-quality products, powered by our skilled engineers and the latest technology. Trust is at the core of our customer relationships, creating a 'Win-Win Situation.' We serve customers globally with innovative solutions and a commitment to excellence. We thank all who've been part of our journey and look forward to continued growth.</p>
                </div>
    </div>
</section>
<!--<section class="visin_mission_wrapper">-->
<!--    <div class="container">-->
<!--        <div class="row">-->

<!--            <div class="col-lg-4 col-md-4 col-sm-12">-->
                
<!--                <div class="zoom">-->
<!--                       <img src="{{ asset('public/images/about_production.png') }}" alt="vision"  class="alignleft size-medium wp-image-7000" />-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-8 col-md-8 col-sm-12">-->
<!--                <div class="warehouse_padd">-->
<!--                    <div class="    ">-->
<!--                        <h3 style="color:#b71615" >Warehousing and Packaging</h3>-->
<!--                    </div>-->
<!--                    <p class="mt-5 mb-3">We place significant emphasis on our warehousing and packaging activities. To streamline these operations, we have established an integrated facility within our infrastructure. This spacious facility allows us to store large quantities of products. Our team of experienced professionals efficiently handles the loading, management, and unloading of the stock. They follow a systematic and strict daily schedule to ensure the safety of the stored goods and maintain accurate inventory records. To maintain a favourable internal environment, we conduct timely fumigation and pest control activities, keeping moisture, rodents, and insects at bay.</p>-->
<!--                    <p>When it comes to packaging, our experts utilise the best materials and tools available. They carefully carry out the packaging process according to the specific requirements and needs of our clients.</p>-->
<!--                </div>-->
                
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<div class="container">
<hr>
</div>

<section class="team_wrapper mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 ">
                <div class="">
                    <div class="contact_details">
                        <h3 class="effect-shine">Our Team</h3>
                    </div>
                    <div class="about_detail">
                        <p>We have a dynamic team consisting of both seasoned professionals and enthusiastic, ambitious individuals who are committed to lifelong learning. This combination of experience and fresh perspectives enables us to thrive on innovation, driving our progress and growth.</p>
                        <p>As our team continues to expand and diversify, it is our shared values that unite us and guide our actions.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="">
                    <div class="team-slider pt-4">
                        <div class="">
                            <img src="{{ asset('public/front/images/team-1.jpeg') }}" class="img-fluid rounded-2" alt="team" srcset="">
                        </div>
                        <div class="">
                            <img src="{{ asset('public/front/images/team-2.jpeg') }}" class="img-fluid rounded-2" alt="team" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const content = document.getElementById("aboutContent");
const button = document.getElementById("readMoreBtn");

button.addEventListener("click", function () {

    if (content.classList.contains("expanded")) {
        // Collapse
        content.style.maxHeight = "320px";
        content.classList.remove("expanded");
        button.textContent = "Read More";
    } else {
        // Expand
        content.style.maxHeight = content.scrollHeight + "px";
        content.classList.add("expanded");
        button.textContent = "Read Less";
    }

});
</script>
@include('layouts.frontfooter')
@include('layouts.popupmodal')