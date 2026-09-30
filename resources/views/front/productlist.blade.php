@include('layouts.frontheader')
@include('layouts.frontMenu')
<style>
    .product_list_inner p {
        font-size: 20px !important;
        font-weight: bold;
        color: #1f1c19;
        text-transform: uppercase;
        margin: 15px 0;
    }
</style>
<section class="backPrevious">
    <div class="container">
        <div class="tophome">
            <div class="backhome">
                <p class="backtoHome"><a href="{{url('/')}}">Home</a> / {{ $title }} </p>
            </div>
        </div>
    </div>
</section>

<section class="product_list_wrapper">
    <div class="container">
        <?php if($title == 'Plastic Pallets'){ ?>
            <h1>Plastic Pallets</h1>    
            <p>At Allwin, we understand the challenges of material heavy handling and storage, which is why our heavy duty plastic pallets are crafted from premium materials, offering rackable, stackable, and nestable solutions. Our industrial pallet experts assist businesses in selecting the right sizes or customizing pallets to meet specific industry needs. Ideal for Manufacturing, Automotive, Pharmaceuticals, and Export & Shipping, Allwin pallets are CE & GMP Certified, ensuring reliability, cost-effectiveness, and the durability to withstand heavy loads, making them a game-changer in storage and logistics.</p>
            <!--<p>Plastic pallets are a modern alternative to wooden pallets for storage and transportation of goods. They are lightweight, durable, and resistant to moisture and pests.</p>-->
        <?php } ?>
        <?php if($title == 'Fish Tubs'){ ?>
            <h1>Fish Tubs</h1>    
            <p>Fish tubs are containers used in the fishing industry for the storage and transportation of fresh fish. Our industrial fish containers are designed to keep fish fresh and are typically made of durable materials such as plastic. Fishermen and fish processors use these tubs to store their catch while at sea or onshore. Allwin is a leading manufacturer of fish tubs in Gujarat, India, supplying fish storage tubs and boxes across India and internationally, including the USA, UK, UAE, Canada, Australia, and more. Established in 1998, we offer all types of industrial fish containers, ISO 9001:2008, CE & GMP Certified, as per client requirements.</p>
        <?php } ?>
         <?php if($title == 'Ice Box'){ ?>
            <h1>Ice Box</h1>    
            <p>Allwin offers premium insulated ice boxes that are used for storing food items, beverages, and medicines. The offered range of insulated boxes is made from the best quality components and uses advanced technology. These insulated ice boxes are highly demanded in the market due to their high performance and accuracy. We always try to deliver the best quality insulated box within the promised time frame.</p>
        <?php } ?>
        <?php if($title == 'Doff Basket'){ ?>
            <h1>Doff Basket</h1>    
            <p>Optimize your textile operations with Allwin's Doff Baskets! As a leading Doff Basket Manufacturer, Allwin offers Plastic Doff Baskets designed for efficiency and durability. These Roto Mould Doff Baskets streamline the collection of yarn and thread bobbins during manufacturing, ensuring seamless productivity in the textile industry. Built to last, they are ideal for enhancing operational efficiency. If you're looking to Buy Doff Baskets, choose Allwin for Quality Doff Baskets that meet your industrial needs.</p>
        <?php } ?>
        <?php if($title == 'Milk Can'){ ?>
            <h1>Milk Can</h1>    
            <p>Allwin's ROTO Moulded Milk Cans are ideal for the dairy industry, not only because they are durable but also hygienic. Featuring smooth interiors and exteriors with a 40-litre plastic milk can for easy cleaning with no milk buildup, Allwin's Milk Cans have gained immense trust from farmers across the country to send milk from villages to cities conveniently. As a leading Milk Cans Manufacturer, Allwin offers more economical and robust dairy milk cans to meet the exact requirements of the modern dairy operation.</p>
        <?php } ?>
         @if($title == 'Roto Moulded Plastic Dustbins')
         <h1>Roto Moulded Plastic Dustbins</h1>
         <p>These are durable and sturdy dustbins made through a rotational molding process. They are designed for waste collection and disposal and are often seen in public spaces, homes, and businesses.</p>
         @endif
         <?php if($title == 'Safbin'){ ?>
            <h1>Safbins and Storage Bins</h1>    
            <p>Safbins, likely a brand or product line, refer to a range of safe and secure storage bins. These bins can be used for various purposes, such as keeping personal belongings or valuable items secure.</p>
        <?php } ?>
        <?php if($title == 'Pallet Container'){ ?>
            <h1>Pallet Container</h1>    
            <p>At Allwin, we are offering high-quality pallet containers and bulk bins as per your individual requirements. Being the top-notch pallet container manufacturer, we have customizable solutions including plastic pallet containers, bulk pallet containers, and insulated pallet containers. Our tough and reliable products enhance efficiency, improve safety, and optimize your supply chain</p>
            <p>Explore our wide range of pallet containers for sale and discover how Allwin can help your business thrive. <strong><a href="https://allwinrotoplast.com/contact-us" target="_blank">Contact us today for a free quote</a></strong>!</p>
        <?php } ?>
        <?php if($title == 'Dustbins'){ ?>
            <h1>Dustbin</h1>    
            <p>Maintain your place neat and clean with our superior range of dustbins. With functionality in mind, they are simple to handle, long-lasting, and aesthetic, making it easy to dispose of waste. From kitchen dustbin to home, office, or public space, our bins are easy to put in any setting. At Allwin, we think that a dustbin is not merely a litter bin—it's an important element of a hygienic and well-organized space. That is why our fashionable designer plastic dustbins feature modern designs, durable materials, and functional designs to suit every corner of your home, whether the kitchen and bathroom or the living room. Thanks to our range of waste bins, office dustbins, industrial dustbins, and wheel dustbins, Allwin makes waste management easier than ever before. Shop our contemporary garbage dustbins online and make a healthier, mess-free environment today! </p>
           
        <?php } ?>
        <div class="">
           
            <div class="">
                <div class="product_list_inner">
                    @foreach($data  as $key=>$vals)
                        <div>
                             <?php if($vals->product_name == 'Single wall Spill Pallets'){ ?><a href="{{ url(str_replace(' ', '-', strtolower($title)).'/'.str_replace(',', '', str_replace(' ', '&', $vals->producturl))) }}">
                            <?php } elseif ($vals->product_name == 'Double wall Spill Pallets') { ?> <a href="{{ url(str_replace(' ', '-', strtolower($title)).'/'.str_replace(',', '', str_replace(' ', '&', $vals->producturl))) }}"> <?php } else { ?> <a href="{{ url(str_replace(' ', '-', strtolower($title)).'/'.str_replace(',', '', str_replace(' ', '&', $vals->producturl))) }}">

                            <?php }?>
                        <?php if($vals->product_image){
                            if( strpos($vals->product_image, ',') !== false ){
                                $image = explode(',',$vals->product_image);
                            }else{
                                $image[0] = $vals->product_image;
                            }
                        }?>
                        <img src="{{ asset('public/Product_Images/'.$image[0]) }}" class="img-fluid" style="border: 1px solid #ddd;
                        border-radius: 10px;" alt="{{ $vals['product_name'] }}" data-aos="zoom-in" data-aos-duration="1500">
                        <p>
                             <?php if($title == 'Fish Tubs'){ ?>
                                Insulated Fish Tubs 
                             <?php } ?>
                              <?php if($title == 'Ice Box'){ ?>
                              Ice Box 
                             <?php } ?>
                            {{ $vals['product_name'] }}</p>
                        </a>
                        <div>
                            <button type="submit" class="btn common_btn" onclick="productModal('<?php echo $vals['product_name'] ?>','<?php echo $title ?>')">Ask for Price</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <!--<hr class="comman_hr" />-->
</div>
 <?php if($title == 'Fish Tubs'){ ?>
<div class="productList_Dis">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2 data-aos="fade-down" data-aos-duration="1500">Plastic Fish Tubs Manufacturer</h2>
                <p>Allwin is one of the leading manufacturers of large fish tubs and totes varying
                    from 70 liters to
                    1250 liters capacity using food-grade polyethylene. We have various fish totes well-known for
                    excellence because we cater to the different needs of our customers. Our fish tubs are manufactured
                    with the best-quality raw materials and advanced machinery. The plastic fish tubs are highly durable
                    to store and transport fish. Different sizes are also available, be they standard or customized, and
                    would cater to the various needs of each client. Additionally, our clients can obtain these fish
                    totes from us at the most affordable prices available.</p>
            </div>
            <div class="col-xl-12">
                <div class="products-feature-tabs">
                    <ul class="nav nav-tabs details-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                <h3>Discription</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="true">
                                <h3>Features</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">
                                <h3>Applications</h3>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content details-tabs-content" id="myTabContent">

                        <div class="tab-pane details-content-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <p>Allwin offers high-quality plastic fish tubs designed to meet the diverse storage needs of the fishing, food, and pharmaceutical industries. Ideal for storing fish, ice cream, medicines, and other perishable items, our tubs are durable and built to international standards. Available in various sizes and specifications, they provide long-lasting performance, ensuring safe and efficient storage for a wide range of applications. </p>
                        </div>
                        <div class="tab-pane details-content-pane fade" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <ul>
                                <li>Available in a variety of sizes </li>
                                <li>High-Quality Polyethylene </li>
                                <li>Durable built quality </li>
                                <li>Advanced manufacturing </li>
                                <li>Resistant to impact</li>
                                <li>Excellence strength </li>
                                <li>Easy customization options </li>
                                <li>Hygiene and easy-to-clean </li>
                                <li>Lightweight design </li>
                                <li>Non-toxic and environmentally friendly </li>
                                <li>Temperature resistant </li>
                                <li>Cost-effective </li>

                            </ul>
                        </div>
                        <div class="tab-pane details-content-pane fade " id="contact" role="tabpanel"
                            aria-labelledby="contact-tab">
                            <p>Fish tubs can be used for a variety of applications within the seafood industry.
                                These tubs are perfect for storing seafood, keeping it fresh and preventing
                                spoilage. They are used to transport fish safely from boats to processing or market
                                facilities. This ensures that the product remains in perfect condition. Fish tubs
                                are used in aquaculture to provide a safe environment that promotes fish growth.
                                They are also ideal for cold storage, which is why they're used in food processing
                                plants that need to handle large quantities of fresh fish. Fish tubs are used by
                                retail and wholesale markets to display and store fresh fish. Commercial fishermen
                                use them as a means of storing fish on deck. Fish tubs are also useful for
                                restaurants and catering services since they keep seafood fresh when large events or
                                food preparation are taking place. These tubs also play an important role in supply
                                chain management and logistics, ensuring safe and fresh seafood delivery to
                                different destinations.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="FAQ_productList">
                <h2 data-aos="fade-down" data-aos-duration="1500" class="mb-5">FAQs about Fish Tubs
                </h2>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What materials are used in manufacturing fish tubs?
                            </button>
                        </h5>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Fish tubs are typically made from food-grade plastic, HDPE (High-Density
                                Polyethylene), or insulated materials to ensure durability and hygiene. These
                                materials are common in plastic fish tubs and insulated fish bins.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Who are the top manufacturers catering to the export market for fish tubs?
                            </button>
                        </h5>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Allwin is the top fish tub manufacturer, which provides high-quality insulated fish
                                totes and industrial fish containers for the export market.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                What sizes do fish tubs typically come in?
                            </button>
                        </h5>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Fish tubs and insulated fish bins are available in various sizes, commonly ranging
                                from 70 liters to 1250 liters, based on storage and transportation needs.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                How do I choose the right fish tub for my needs?
                            </button>
                        </h5>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Make a choice based on capacity, insulation needs, and durability. Consider whether
                                you need a fish storage ice box or insulated fish tubs for temperature control and
                                the type of fish or seafood being handled.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Are Allwin fish tubs suitable for transporting live fish?
                            </button>
                        </h5>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Yes, Allwin insulated fish tubs are designed to safely transport live fish,
                                maintaining proper aeration and water conditions.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                How do Allwin fish tubs help in maintaining product freshness?
                            </button>
                        </h5>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Allwin's insulated fish totes maintain product freshness by regulating temperature
                                during transport and storage, ideal for preventing spoilage.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Can fish tubs be used for other applications besides seafood storage?
                            </button>
                        </h5>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Yes, plastic fish tubs and fish storage ice boxes are versatile and can be used to
                                store other perishable goods like meat, vegetables, and ice.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEleven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                What is the price range for fish tubs in India?
                            </button>
                        </h5>
                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                The price of Allwin fish tubs varies depending on size, insulation features, and
                                whether they are standard or insulated fish bins.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEaight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEaight" aria-expanded="false"
                                aria-controls="collapseEaight">
                                How should fish tubs be cleaned and maintained?
                            </button>
                        </h5>
                        <div id="collapseEaight" class="accordion-collapse collapse" aria-labelledby="headingEaight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Clean industrial fish containers and insulated fish totes regularly with mild
                                detergent and water. Avoid harsh chemicals, and ensure they are completely dry to
                                prevent bacteria growth.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!--<hr class="comman_hr" />-->
    </div>
    <div class="popular_slider pt-5">
        <div class="container">
            <div class="row">
                <h3 data-aos="fade-down" data-aos-duration="1500">Application Of Product</h3>
                <div class="application_product">
                    @foreach ($datas as $key => $val)
                        <div>
                            <img src="{{ asset('public/appimage/' . $val->image) }}" class="img-fluid"
                                alt="{{ $val->name }}" data-aos="flip-left" data-aos-duration="1500">
                            <p>{{ $val->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
 <?php } ?>
 <?php if($title == 'Ice Box'){ ?>
<div class="productList_Dis">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2 data-aos="fade-down" data-aos-duration="1500">Plastic Ice Box Manufacturer </h2>
                <p>Allwin is a leading insulated ice box manufacturer and supplier of iceboxes based in Ahmedabad, India. We offer insulated ice boxes ranging from 20 to 250 liters, catering to both domestic and international markets, including the USA, UK, UAE, Australia, and more. Our plastic iceboxes are widely used across industries such as food, pharmaceuticals, fishing, and more.</p>
                
                <p>Explore and buy ice boxes online, choosing from a variety of sizes to meet your specific needs. At Allwin, we offer a wide range of color and design options to suit your preferences. Customer reviews and ratings make it easier to pick the perfect icebox for your requirements. Place your order online and enjoy doorstep delivery for ultimate convenience.</p>
                <p>Renowned for exceptional performance and durability, Allwin iceboxes are the top choice in the market. With a commitment to high product quality and timely delivery, we ensure that you receive the best value for your investment every time. Choose Allwin for a reliable, high-performing thermocol ice box that meets all your storage and transportation needs.</p>
            </div>
            <div class="col-xl-12">
                <div class="products-feature-tabs">
                    <ul class="nav nav-tabs details-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                <h3>Discription</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="true">
                                <h3>Features</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">
                                <h3>Applications</h3>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content details-tabs-content" id="myTabContent">

                        <div class="tab-pane details-content-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <p>Planning and packing play a crucial role in ensuring your trip is both enjoyable and stress-free. To elevate your travel experience, a small ice box is essential. It not only keeps your food, drinks, and beverages fresh but also extends the life of ice, preventing spoilage and ensuring everything stays fresh and organized. Allwin’s insulated iceboxes go a step further with their advanced roto molding technology, offering unmatched durability and suitability for all conditions. Designed with spacious compartments, they allow you to neatly organize food containers, bottles, and drinks for easy access, making them perfect for long road trips, beach outings, summer picnics, and more. Whether you're storing ice creams, beverages, or perishables, Allwin’s travel ice boxes promise exceptional performance and a long lifespan, ensuring your investment is worthwhile. Don’t let your travel plans fall short—choose Allwin’s iceboxes for a hassle-free and refreshing experience.</p>
                        </div>
                        <div class="tab-pane details-content-pane fade" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <ul>
                                <li><strong>Durable Construction:</strong> Made using advanced roto molding technology for long-lasting performance.</li>
                                <li><strong>Insulated Design:</strong> Provides superior temperature retention to keep items fresh for extended periods.</li>
                                <li><strong>Spacious Compartments:</strong> Ample storage space for organizing food, beverages, and ice efficiently. </li>
                                <li><strong>Lightweight and Portable:</strong> Easy to carry and transport, perfect for trips and outdoor activities. </li>
                                <li><strong>Multi-Utility: </strong>Ideal for storing ice creams, drinks, seafood, and perishables.</li>
                                <li><strong>Leak-Proof:</strong> Ensures no spillage, keeping your items safe and dry.</li>
                                <li><strong>Ergonomic Handles:</strong> Comfortable grip for easy handling and mobility.</li>
                                <li><strong>Variety of Sizes:</strong> Available in capacities ranging from 20 to 250 liters to meet diverse needs.</li>
                                <li><strong>Customizable Options:</strong> Choice of colors, designs, and branding as per client requirements. </li>
                                <li><strong>Hygienic and Easy to Clean:</strong> Smooth surfaces and materials for quick cleaning. </li>
                                <li><strong>Eco-Friendly Materials:</strong> Made from high-quality, non-toxic, and recyclable materials.</li>
                               

                            </ul>
                        </div>
                        <div class="tab-pane details-content-pane fade " id="contact" role="tabpanel"
                            aria-labelledby="contact-tab">
                           <ul>
                                <li><strong>Fishing Industry: </strong> For storing and transporting fresh fish and seafood, maintaining freshness.</li>
                                <li><strong>Food & Beverage Industry: </strong> Ideal for keeping perishable food items, beverages, and ice creams cool during transport.</li>
                                <li><strong>Pharmaceuticals: </strong> For transporting temperature-sensitive medicines, vaccines, and biological samples.</li>
                                <li><strong>Outdoor Activities: </strong> Perfect for picnics, road trips, beach outings, and camping to keep food and drinks fresh.</li>
                                <li><strong>Cold Chain Logistics: </strong> Ensures the safe transport of perishable goods over long distances.</li>
                            
                                <li><strong>Retail & Distribution:</strong> For storing chilled products during delivery to customers or retail outlets.</li>
                                <li><strong>Agriculture: </strong> Useful for preserving produce like fruits, vegetables, and dairy products during transport.</li>
                                <li><strong>Sports Events:</strong> Keeps drinks and snacks cool for players and spectators.</li>
                                <li><strong>Hospitality Industry: </strong> Essential for hotels and resorts to store chilled drinks and serve fresh beverages poolside or during events.</li>
                                <li><strong>Dairy Industry: </strong> Helps in the transport of milk, cheese, butter, and other dairy products, maintaining their quality.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="FAQ_productList">
                <h2 data-aos="fade-down" data-aos-duration="1500" class="mb-5">FAQs about Insulated Ice Boxes 
                </h2>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               What materials are commonly used in iceboxes?
                            </button>
                        </h5>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Iceboxes are generally built with strong, insulating materials like HDPE for the outer casing and polyurethane foam as insulation. Some use stainless steel for rugged durability or ABS plastic for lightweight versions. These materials are designed to preserve the cold temperature while having strength and resistance to wear.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Are iceboxes easy to clean?
                            </button>
                        </h5>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Yes, iceboxes are typically made with ease of cleaning in mind. The smooth, non-porous surfaces most models exhibit mean that they will clean up easily with mild soap and water. Most also have removable trays or dividers for easy access, and a number of them are designed with drain plugs to make removing melted ice that much easier.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Do iceboxes come with handles for portability?
                            </button>
                        </h5>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Yes, most iceboxes do come with the addition of handles to make them easier to carry. Handles can be either molded into the body of the icebox or some versions have heavy-duty side handles or wheels for easier carrying, especially larger or heavier units.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Can iceboxes be used for pharmaceutical storage?
                            </button>
                        </h5>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Yes, they can be used for pharmaceutical storage; the specific requirements depend on the temperature range needed for the medications. There are some iceboxes designed to keep medicines at very low temperatures, thus apt for use in the transportation of temperature-sensitive pharmaceuticals like vaccines, insulin, or other biologics.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Are iceboxes eco-friendly?
                            </button>
                        </h5>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Each model and brand of iceboxes differs in terms of its eco-friendliness. Some are even produced with recyclable materials, which include high-density polyethylene (HDPE), while others focus on their ecological efficiency through certain attributes. The existence of polyurethane foam insulation, though usually used in most iceboxes, has environmental sustainability issues.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                What is the warranty period for most iceboxes?
                            </button>
                        </h5>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               The warranty for iceboxes usually ranges between 1-5 years, depending on the brand and product. More premium brands offer long warranties, usually on their high-end or commercial-grade items. Of course, every manufacturer has specific warranty terms for a product, so be sure to check those before making a purchase.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                What materials are used in Allwin iceboxes?
                            </button>
                        </h5>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                The Allwin icebox is made of high-quality polyethylene for the outer portion, high food-grade polyurethane foam as insulation, providing the highest durability, insulation, and resistance from extreme temperatures for both personal and commercial use.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                What sizes are available in Allwin iceboxes?
                            </button>
                        </h5>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Allwin Iceboxes are available in many sizes to meet various requirements. Normally, compact, portable ones are available for personal use (about 20-30 quarts), while larger, heavy-duty ones (up to 150 quarts or more) would be suitable for group use, outdoor activities, and commercial applications.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEaight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEaight" aria-expanded="false"
                                aria-controls="collapseEaight">
                                Are Allwin iceboxes suitable for long trips?
                            </button>
                        </h5>
                        <div id="collapseEaight" class="accordion-collapse collapse" aria-labelledby="headingEaight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Indeed, Allwin iceboxes are perfect for long trips, having the ability to store food and drink well-insulated. They offer quite a period of maintaining cold temperatures, making them suitable for outdoor camping, and road trips, among other activities that would demand storage of food and drinks.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEaight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEaight" aria-expanded="false"
                                aria-controls="collapseEaight">
                                What industries commonly use iceboxes?
                            </button>
                        </h5>
                        <div id="collapseEaight" class="accordion-collapse collapse" aria-labelledby="headingEaight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Iceboxes are used in many sectors such as food service, healthcare, hospitality, and outdoor recreation. They are commonly used by catering firms, fishermen, medical facilities transporting pharmaceuticals, and outdoor enthusiasts including campers and hunters.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEaight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEaight" aria-expanded="false"
                                aria-controls="collapseEaight">
                               Are Allwin iceboxes leak-proof?
                            </button>
                        </h5>
                        <div id="collapseEaight" class="accordion-collapse collapse" aria-labelledby="headingEaight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Allwin iceboxes are leak-proof. Tightly sealed lids with robust construction assure leakage prevention by melted ice or liquids from leaking out. This makes sure the contents stay cold and dry while the outside remains clean and free from spills.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!--<hr class="comman_hr" />-->
    </div>
    <div class="popular_slider pt-5">
        <div class="container">
            <div class="row">
                <h3 data-aos="fade-down" data-aos-duration="1500">Application Of Product</h3>
                <div class="application_product">
                    @foreach ($datas as $key => $val)
                        <div>
                            <img src="{{ asset('public/appimage/' . $val->image) }}" class="img-fluid"
                                alt="{{ $val->name }}" data-aos="flip-left" data-aos-duration="1500">
                            <p>{{ $val->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
 <?php } ?>
  <?php if($title == 'Plastic Pallets'){ ?>
  <div class="productList_Dis">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <!--<h2 data-aos="fade-down" data-aos-duration="1500">Custom Plastic Pallet Manufacturer </h2>-->
                <h2 data-aos="fade-down" data-aos-duration="1500">Customized Industrial Plastic Pallet Solutions for All Industry </h2>
                <p>We are India's leading industrial plastic pallet manufacturer, proudly serving clients across the globe like the USA, UK, Dubai, Australia, and beyond. Our high-quality, durable, eco-friendly plastic pallets, including spill pallets and specialized options like the 2 drum spill pallet, are designed to meet the diverse needs of industries such as logistics, warehousing, pharmaceuticals, food processing, and automotive. The pallets are engineered to pass the strength and longevity test by providing reliable performance in diverse environments. They are ideal for heavy-duty usage because they are moisture- and chemical-resistant. The best thing about our plastic pallets is that they are hygienic, easy to clean, safe for handling fragile goods, cost-effective, and reduce waste and long-term expenses. At Allwin, we also focus on sustainability by providing environmentally friendly products that help businesses improve efficiency and reduce their carbon footprint, making us the trusted choice for industrial plastic pallets worldwide.</p>
            </div>
            <div class="col-xl-12">
                <div class="products-feature-tabs">
                    <ul class="nav nav-tabs details-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                <h3>Discription</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="true">
                                <h3>Features</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">
                                <h3>Applications</h3>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content details-tabs-content" id="myTabContent">

                        <div class="tab-pane details-content-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <p>Our pallet plastic comes under renowned organizations that manufacture the best quality range of plastic pallets for sale. These are made using advanced technology through injection molding or roto molding processes with HDPE, PP, or PE. The salient advantage of plastic pallets is their tough and durable structure. They can withstand temperature ranges from -40 to 65°C with two- or four-way entry for easy forklift operation. The pallets can also be customized as per the client’s requirements. Our products come with long shelf life, weather and chemical resistance, are eco-friendly, and require no maintenance. </p>
                        </div>
                        <div class="tab-pane details-content-pane fade" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                           <p>Allwin plastic pallets, including our durable roto molded plastic pallets and versatile plastic shipping pallets, are widely used across various industries because of their versatility and reliability. In warehousing and distribution, they assist in maximizing storage space and improving the efficiency of goods handling. In sectors where cleanliness and safety are crucial, such as food processing and pharmaceuticals, these pallets are the ideal choice. Allwin plastic pallets are also preferred in the automotive and manufacturing industries, as they can transport heavy parts and components while offering superior load-bearing capacity. They perform exceptionally well even in cold storage environments. These pallets are a trusted solution for safely transporting hazardous materials and chemicals due to their strong chemical resistance. In logistics and transportation, plastic shipping pallets lower overall shipping costs and enhance handling efficiency. Their weather-resistant and lightweight properties make them perfect for international shipping and export requirements. Visually appealing, they can even be used for retail displays. Allwin provides an all-in-one solution for businesses looking for durable, hygienic, and sustainable material handling options. </p>
                        </div>
                        <div class="tab-pane details-content-pane fade " id="contact" role="tabpanel"
                            aria-labelledby="contact-tab">
                            <p>Allwin plastic pallets are used widely across various industries because of their versatility and reliability. In warehousing and distribution, they assist in maximizing storage space and improving the efficiency of goods handling. A place where cleanliness and safety are a crucial factor, this makes them an ideal choice for the food processing and pharmaceutical sectors. Allwin plastic pallets are best preferred in the automotive and manufacturing industries, as they can transport heavy parts and components, offering superior load-bearing capacity. The plastic pallets work well even in a cold storage environment. These pallets are a trusted solution for safely transporting hazardous materials and chemicals, as the pallets are chemical resistant. In logistics and transportation, they lower shipping costs and increase handling efficiency. Their weather-resistant and lightweight properties make them an ideal choice for international shipping and export requirements. The products are visually appealing and can be used for retail displays. An all-in-one solution for your businesses who are looking for durable, hygienic, and sustainable material handling options.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="FAQ_productList">
                <h2 data-aos="fade-down" data-aos-duration="1500" class="mb-5">FAQs about Plastic Pallets
                </h2>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What Are the Advantages of Plastic Pallets Over Wooden Pallets?
                            </button>
                        </h5>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               There are many advantages of using plastic pallets over wooden pallets. Some of them are Durability, safety, lighter than wood, cost efficiency, and most importantly that it makes them economical choices for many businesses.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Are Allwin plastic pallets environmentally friendly?
                            </button>
                        </h5>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Yes, Allwin plastic pallets are environmentally friendly because they can be recycled and reused.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Can plastic pallets be used in the food and pharmaceutical industries?
                            </button>
                        </h5>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Yes, plastic pallets are widely used in the food and pharmaceutical industries because they are hygienic, durable, and cost-effective. They meet strict industry standards for cleanliness and safety, making them ideal for handling sensitive goods. If you are looking to buy bulk plastic pallets, Allwin — a leading manufacturer and trusted supplier — offers high-quality, sustainable solutions designed for global industries.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                How long do plastic pallets last?
                            </button>
                        </h5>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                The plastic pallets can last up to 10 years. However it depends upon how the plastic pallets are used, but typically it can last for 8–10 years.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Are Allwin plastic pallets safe for international shipping?
                            </button>
                        </h5>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Yes, the Allwin heavy duty plastic pallets for sale are safe for international shipping, as they are engineered to withstand the rigors of global transportation. 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Can Allwin plastic pallets be customized to specific sizes?
                            </button>
                        </h5>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Yes, Allwin plastic pallets can be customized to specific sizes, Additionally, our custom pallets can be tailored to meet your unique logistics needs.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Can plastic pallets be used in cold storage environments?
                            </button>
                        </h5>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Yes, plastic pallets can be used in cold storage environments, as in cold storage it is crucial to maintain cleanliness and sanitation.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEleven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                Are plastic pallets available in different colors?
                            </button>
                        </h5>
                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Yes, plastic pallets are available in different colors, and with Allwin Plastic Pallets you can even customize your plastic pallets.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEaight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEaight" aria-expanded="false"
                                aria-controls="collapseEaight">
                               Can plastic pallets be repaired if damaged?
                            </button>
                        </h5>
                        <div id="collapseEaight" class="accordion-collapse collapse" aria-labelledby="headingEaight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Yes, plastic pallets can be repaired if they become damaged.
                            </div>
                        </div>
                    </div>
                   
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTen" aria-expanded="false"
                                aria-controls="collapseTen">
                               How do plastic pallets reduce the risk of product contamination?
                            </button>
                        </h5>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Plastic pallets are a good choice for reducing the risk of product contamination because they are: Resistant to contamination, easy to clean, durable, Lightweight, etc.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!--<hr class="comman_hr" />-->
    </div>
    <div class="popular_slider pt-5">
        <div class="container">
            <div class="row">
                <h3 data-aos="fade-down" data-aos-duration="1500">Application Of Product</h3>
                <div class="application_product">
                    @foreach ($datas as $key => $val)
                        <div>
                            <img src="{{ asset('public/appimage/' . $val->image) }}" class="img-fluid"
                                alt="{{ $val->name }}" data-aos="flip-left" data-aos-duration="1500">
                            <p>{{ $val->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
   <?php } ?>
   <?php if($title == 'Pallet Container'){ ?>
<div class="productList_Dis">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2 data-aos="fade-down" data-aos-duration="1500">Manufacturer of High-Quality Pallet Containers - Allwin </h2>
                <p>Transform your storage efficiency with Allwin's premium pallet containers. Engineered through advanced roto molding technology, our plastic pallet containers deliver unmatched strength and reliability. As trusted pallet containers manufacturers, we specialize in both standard and insulated pallet containers, perfectly crafted for pharmaceutical, food, and textile applications. Our innovative bulk pallet containers combine smart stackability with superior protection, maximizing your storage potential. Browse our extensive range of pallet containers for sale and discover why industry leaders trust Allwin for their critical storage needs. Experience excellence in every container – designed, tested, and engineered for your success.</p>
            </div>
            <div class="col-xl-12">
                <div class="products-feature-tabs">
                    <ul class="nav nav-tabs details-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                <h3>Discription</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="true">
                                <h3>Features</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">
                                <h3>Applications</h3>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content details-tabs-content" id="myTabContent">

                        <div class="tab-pane details-content-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                        <ul>
                            <li><strong>Safe and Easy Handling:</strong> Allwin is designed for trouble-free maneuvering. This increases the safety factors in operations by being easy while operating.</li>
                            <li><strong>Hygienic with easy cleaning options:</strong> All the pallet containers, being made up of virgin quality polyethylene material, are absolutely non-porous and washable. Thus the same is much in demand when the hygiene or cleanliness standards require strict maintenance.</li>
                            <li><strong>Premium Virgin Polyethylene Construction:</strong> Allwin's pallet containers are made of virgin polyethylene material, providing superior strength and resilience.</li>
                            <li><strong>Color Options:</strong> Allwin's pallet containers come in a variety of colors, such as Blue, Green, Gray, Ivory, Yellow, and Red, with customization options available to meet specific preferences.</li>
                            <li><strong>UV Resistant and Temperature Tolerant:</strong> The pallet containers by Allwin are designed to withstand a wide range of temperatures and resist UV radiation, ensuring the integrity of stored goods.</li>
                            <li><strong>Space-Efficient Stackable Design:</strong> Allwin's pallet containers can be stacked vertically, thus utilizing cubic space both in storage and transit.</li>
                            <li><strong>Industry Standards Compliance:</strong> All Allwin plastic pallet containers are made as per WHO-GMP, FDA, and HACCP norms, thus appropriate for use in pharmaceutical, food, beverage, and chemical industries, as well as in factories and warehouses.</li>
                        </ul>
                        <p>For more information about Allwin's insulated pallet containers and other products, please <strong>contact us.</strong></p>
                        </div>
                        
                        <div class="tab-pane details-content-pane fade" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <ul>
                                <li><strong>Custom sizes:</strong> The Allwin plastic pallet containers can be developed in all sorts of dimensions, based on the operational need, ensuring it perfectly fits the logistics operation at hand.  </li>
                                <li><strong>100% Virgin raw material base:</strong> These pallet containers are made with high-quality virgin polyethylene for maximum strength and resilience, providing an ideal candidate for heavy-duty applications.</li>
                                <li><strong>Strong & Durable:</strong> Allwin's bulk pallet containers are built for long-term usage and therefore not as often to be replaced as the competitors.</li>
                                <li><strong>Chemical Resistance:</strong> Pallet containers by Allwin are designed to be chemical-resistant to various chemicals and, therefore, fit industries requiring sturdy and reliable storage solutions.</li>
                                <li><strong>Stain-Free:</strong> Allwin's pallet containers come with a non-porous surface, making it stain-free.</li>
                                <li><strong>Advanced Manufacturing Technology:</strong> Allwin uses the best manufacturing techniques and ensures that pallet containers are well made to the highest quality levels, thus enabling reliable performance.</li>
                                <li><strong>Superior Polyethylene Construction:</strong> Moulded from premium grades of polyethylene, these pallet containers offer added durability and better performance, providing longevity and reliability.</li>
                                <li><strong>Drainage Provision:</strong> Some models of Allwin pallet containers can include drainage features which make cleaning very easy and this is important to industries with severe hygiene standards.</li>
                                <li><strong>Snag-Free Design:</strong> Smooth edges and surfaces are part of the pallet container design so as not to snag, hence ensuring safe handling and transportation.</li>
                                <li><strong>Compatibility with Racking/Lifting Systems:</strong> Allwin's pallet containers are compatible with various racking and lifting systems, thereby increasing operational efficiency and streamlining logistics processes.</li>
                                <li><strong>Excellent After-Sales Support:</strong> Dedicated to customer satisfaction, Allwin offers comprehensive after-sales support in case any concern or requirement arises, thus making the experience of using its pallet containers a smooth one.</li>
                                <li><strong>Pan India Sales & Service Network:</strong>Allwin has a widespread sales and service network across India, ensuring that pallet containers are delivered and supported on time for businesses across the country.  </li>
                                

                            </ul>
                        </div>
                        
                        <div class="tab-pane details-content-pane fade " id="contact" role="tabpanel"
                            aria-labelledby="contact-tab">
                            <p>Allwin Roto Plast's pallet containers are engineered to meet the diverse needs of industries in pharmaceuticals, food and beverage, dairy, poultry, and food processing. Our plastic pallet containers are safe and efficient in use with compliance with the stringent hygiene standards. Constructed from high-quality virgin polyethylene, these bulk pallet containers offer better strength and durability for heavy-duty applications. Our pallet containers, available for purchase, have customization options on the color of preference and fit all types of racking and lifting systems, allowing for wide-scale solutions to the material handling and storage system. Our insulated pallet containers also guarantee durability in extreme temperature resistance and resist the UV radiations that damage items.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="FAQ_productList">
                <h2 data-aos="fade-down" data-aos-duration="1500" class="mb-5">FAQs for Pallet Container </h2>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What Size Pallet Container Do I Need?
                            </button>
                        </h5>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Determining the appropriate pallet container size depends on the specific requirements you have in storing and transporting goods. It includes the size and weight of the goods to be stored as well as available space in the warehouse. Allwin has several options for plastic pallet containers, thus accommodating all possible needs. 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Are Your Bulk Containers Stackable?
                            </button>
                        </h5>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Yes, Allwin's bulk pallet containers are designed for stackability, optimizing storage efficiency in warehouses and during transit. Their robust construction ensures stability and safety when stacked.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                How to Choose the Right Pallet Container Supplier?
                            </button>
                        </h5>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               When selecting a pallet container supplier, assess factors such as product quality, compliance with industry standards, customization options, and after-sales support. Allwin is a reputable pallet container manufacturer known for its durable and customizable solutions.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                What is the Cost of a Plastic Pallet Container?
                            </button>
                        </h5>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               The cost of a plastic pallet container depends upon size, material, and design specifications. For details on pricing contact Allwin.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            How Many Square Feet Per Pallet Container?
                            </button>
                        </h5>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                The pallet container footprint is determined by the size of the pallet container. Allwin offers a range of sizes to accommodate various spatial needs. For detailed measurements, kindly refer to Allwin's product specifications.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                What are the advantages of pallet containers?
                            </button>
                        </h5>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Pallet containers have many benefits, such as durability, ease of handling, and safeguarding goods. Allwin's plastic pallet containers are made of high-quality material, ensuring longevity and reliability.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Which industries make use of pallet containers?
                            </button>
                        </h5>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Pallet containers are used in pharmaceutical, food and beverages, dairy, poultry, and food processing. Allwin products are made with the specific requirements of these industries.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEleven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                               How to Clean a Pallet Container?
                            </button>
                        </h5>
                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Cleaning pallet containers is easy. Allwin's containers are non-porous materials, making it easy to wash and sanitize them, which is a must in industries that demand high hygiene.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEaight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEaight" aria-expanded="false"
                                aria-controls="collapseEaight">
                               What parameters should I be looking for in pallet containers for purchase?
                            </button>
                        </h5>
                        <div id="collapseEaight" class="accordion-collapse collapse" aria-labelledby="headingEaight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            Buy pallet containers while considering material quality, size, stackability, industry standards, compliances, and the reputation of the supplier. Allwin also provides various models according to diversified needs.
                            </div>
                        </div>
                    </div>
                   
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTen" aria-expanded="false"
                                aria-controls="collapseTen">
                              Is it safe to use Allwin pallet containers?
                            </button>
                        </h5>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Allwin's pallet containers are safe because they are produced using quality material and adhere to industry standards to ensure that they can be used for various purposes. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!--<hr class="comman_hr" />-->
    </div>
    <div class="popular_slider pt-5">
        <div class="container">
            <div class="row">
                <h3 data-aos="fade-down" data-aos-duration="1500">Application Of Product</h3>
                <div class="application_product">
                    @foreach ($datas as $key => $val)
                        <div>
                            <img src="{{ asset('public/appimage/' . $val->image) }}" class="img-fluid"
                                alt="{{ $val->name }}" data-aos="flip-left" data-aos-duration="1500">
                            <p>{{ $val->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
     <?php } ?>
    <?php if($title == 'Doff Basket'){ ?>
    <div class="productList_Dis">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2 data-aos="fade-down" data-aos-duration="1500">Doff Basket Manufacturer  </h2>
                <p>Allwin, a premier Doff Basket Manufacturer, offers top-tier Plastic Doff Baskets designed to enhance efficiency in textile operations. Our Roto Mould Doff Baskets are crafted for durability and ease of use, ensuring seamless handling of yarn and thread bobbins during manufacturing. For those looking to Buy Doff Baskets, Allwin provides Quality Doff Baskets that are lightweight, chemical-resistant, and maintenance-free. Available in various colors and compatible with dollies or trolleys for effortless movement, our doff baskets are tailored to meet diverse customer needs.</p>
            </div>
            <div class="col-xl-12">
                <div class="products-feature-tabs">
                    <ul class="nav nav-tabs details-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                <h3>Discription</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="true">
                                <h3>Features</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">
                                <h3>Applications</h3>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content details-tabs-content" id="myTabContent">

                        <div class="tab-pane details-content-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                        <p>A Doff Basket is an industrial container, used in the textile industry for collecting bobbins of yarn or thread manufactured during the production process. It is manufactured by leading Doff Basket Manufacturers in plastic material and is quite robust and wear-resistant. The Roto Mould Doff Baskets are specifically designed for effective handling and storage, ensuring that the internal walls are smooth so that the bobbins of yarn can be collected and transported easily. To buy Doff Baskets, one needs to select quality Doff Baskets that meet the standards of the industry, ensuring longevity and optimal performance in textile operations.</p>
                        </div>
                        
                        <div class="tab-pane details-content-pane fade" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <ul>
                                <li>We offer a wide variety of Doff Baskets to suit diverse industrial needs.</li>
                                <li>Made from high-quality plastic for superior strength and longevity.</li>
                                <li>Roto Mould Doff Baskets are designed for heavy-duty usage.</li>
                                <li>Resistant to harsh chemicals, ensuring durability.</li>
                                <li>Plastic Doff Baskets maintain a clean and hygienic surface.</li>
                                <li>Smooth interiors prevent yarn or fabric from getting stuck.</li>
                                <li>Crafted with advanced Roto Moulding techniques for precision.</li>
                                <li>Molded from high-grade polyethylene for strength.</li>
                                <li>Reliable service for all Doff Basket Manufacturer products.</li>
                                <li>Available across India with a strong distribution system.</li>
                            </ul>
                        </div>
                        
                        <div class="tab-pane details-content-pane fade " id="contact" role="tabpanel"
                            aria-labelledby="contact-tab">
                            <p>Allwin Doff Baskets are essential for the textile industry, ensuring efficient handling and storage of yarn and thread. Designed for spinning mills and weaving units, these plastic doff baskets help in collecting bobbins seamlessly. Their snag-free and smooth internal walls protect delicate materials, while the lightweight yet durable structure makes them easy to handle. Ideal for material movement, they are perfect for transporting yarn to dyeing and finishing units without contamination. With a stackable design and compatibility with dollies and trolleys, these roto mould doff baskets provide easy mobility within facilities. Made from UV-stable polyethylene, they are suitable for both indoor and outdoor use. Whether you're looking to buy doff baskets or need quality doff baskets, Allwin delivers top-tier solutions for textile operations. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="FAQ_productList">-->
            <!--    <h4 data-aos="fade-down" data-aos-duration="1500" class="mb-5">FAQs for Pallet Container </h4>-->
            <!--    <div class="accordion" id="accordionExample">-->
            <!--        <div class="accordion-item">-->
            <!--            <h5 class="accordion-header" id="headingOne">-->
            <!--                <button class="accordion-button" type="button" data-bs-toggle="collapse"-->
            <!--                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">-->
            <!--                    What Size Pallet Container Do I Need?-->
            <!--                </button>-->
            <!--            </h5>-->
            <!--            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"-->
            <!--                data-bs-parent="#accordionExample">-->
            <!--                <div class="accordion-body">-->
            <!--                   Determining the appropriate pallet container size depends on the specific requirements you have in storing and transporting goods. It includes the size and weight of the goods to be stored as well as available space in the warehouse. Allwin has several options for plastic pallet containers, thus accommodating all possible needs. -->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="accordion-item">-->
            <!--            <h5 class="accordion-header" id="headingTwo">-->
            <!--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
            <!--                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">-->
            <!--                    Are Your Bulk Containers Stackable?-->
            <!--                </button>-->
            <!--            </h5>-->
            <!--            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"-->
            <!--                data-bs-parent="#accordionExample">-->
            <!--                <div class="accordion-body">-->
            <!--                  Yes, Allwin's bulk pallet containers are designed for stackability, optimizing storage efficiency in warehouses and during transit. Their robust construction ensures stability and safety when stacked.-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="accordion-item">-->
            <!--            <h5 class="accordion-header" id="headingThree">-->
            <!--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
            <!--                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
            <!--                    How to Choose the Right Pallet Container Supplier?-->
            <!--                </button>-->
            <!--            </h5>-->
            <!--            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"-->
            <!--                data-bs-parent="#accordionExample">-->
            <!--                <div class="accordion-body">-->
            <!--                   When selecting a pallet container supplier, assess factors such as product quality, compliance with industry standards, customization options, and after-sales support. Allwin is a reputable pallet container manufacturer known for its durable and customizable solutions.-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="accordion-item">-->
            <!--            <h5 class="accordion-header" id="headingFour">-->
            <!--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
            <!--                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">-->
            <!--                    What is the Cost of a Plastic Pallet Container?-->
            <!--                </button>-->
            <!--            </h5>-->
            <!--            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"-->
            <!--                data-bs-parent="#accordionExample">-->
            <!--                <div class="accordion-body">-->
            <!--                   The cost of a plastic pallet container depends upon size, material, and design specifications. For details on pricing contact Allwin.-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="accordion-item">-->
            <!--            <h5 class="accordion-header" id="headingFive">-->
            <!--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
            <!--                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">-->
            <!--                How Many Square Feet Per Pallet Container?-->
            <!--                </button>-->
            <!--            </h5>-->
            <!--            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"-->
            <!--                data-bs-parent="#accordionExample">-->
            <!--                <div class="accordion-body">-->
            <!--                    The pallet container footprint is determined by the size of the pallet container. Allwin offers a range of sizes to accommodate various spatial needs. For detailed measurements, kindly refer to Allwin's product specifications.-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="accordion-item">-->
            <!--            <h5 class="accordion-header" id="headingSix">-->
            <!--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
            <!--                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">-->
            <!--                    What are the advantages of pallet containers?-->
            <!--                </button>-->
            <!--            </h5>-->
            <!--            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"-->
            <!--                data-bs-parent="#accordionExample">-->
            <!--                <div class="accordion-body">-->
            <!--                    Pallet containers have many benefits, such as durability, ease of handling, and safeguarding goods. Allwin's plastic pallet containers are made of high-quality material, ensuring longevity and reliability.-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="accordion-item">-->
            <!--            <h5 class="accordion-header" id="headingSeven">-->
            <!--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
            <!--                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">-->
            <!--                    Which industries make use of pallet containers?-->
            <!--                </button>-->
            <!--            </h5>-->
            <!--            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"-->
            <!--                data-bs-parent="#accordionExample">-->
            <!--                <div class="accordion-body">-->
            <!--                  Pallet containers are used in pharmaceutical, food and beverages, dairy, poultry, and food processing. Allwin products are made with the specific requirements of these industries.-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="accordion-item">-->
            <!--            <h5 class="accordion-header" id="headingEleven">-->
            <!--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
            <!--                    data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">-->
            <!--                   How to Clean a Pallet Container?-->
            <!--                </button>-->
            <!--            </h5>-->
            <!--            <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"-->
            <!--                data-bs-parent="#accordionExample">-->
            <!--                <div class="accordion-body">-->
            <!--                   Cleaning pallet containers is easy. Allwin's containers are non-porous materials, making it easy to wash and sanitize them, which is a must in industries that demand high hygiene.-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="accordion-item">-->
            <!--            <h5 class="accordion-header" id="headingEaight">-->
            <!--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
            <!--                    data-bs-target="#collapseEaight" aria-expanded="false"-->
            <!--                    aria-controls="collapseEaight">-->
            <!--                   What parameters should I be looking for in pallet containers for purchase?-->
            <!--                </button>-->
            <!--            </h5>-->
            <!--            <div id="collapseEaight" class="accordion-collapse collapse" aria-labelledby="headingEaight"-->
            <!--                data-bs-parent="#accordionExample">-->
            <!--                <div class="accordion-body">-->
            <!--                Buy pallet containers while considering material quality, size, stackability, industry standards, compliances, and the reputation of the supplier. Allwin also provides various models according to diversified needs.-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
                   
            <!--        <div class="accordion-item">-->
            <!--            <h5 class="accordion-header" id="headingTen">-->
            <!--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
            <!--                    data-bs-target="#collapseTen" aria-expanded="false"-->
            <!--                    aria-controls="collapseTen">-->
            <!--                  Is it safe to use Allwin pallet containers?-->
            <!--                </button>-->
            <!--            </h5>-->
            <!--            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"-->
            <!--                data-bs-parent="#accordionExample">-->
            <!--                <div class="accordion-body">-->
            <!--                  Allwin's pallet containers are safe because they are produced using quality material and adhere to industry standards to ensure that they can be used for various purposes. -->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </div>
    <div class="container">
        <!--<hr class="comman_hr" />-->
    </div>
    <div class="popular_slider pt-5">
        <div class="container">
            <div class="row">
                <h3 data-aos="fade-down" data-aos-duration="1500">Application Of Product</h3>
                <div class="application_product">
                    @foreach ($datas as $key => $val)
                        <div>
                            <img src="{{ asset('public/appimage/' . $val->image) }}" class="img-fluid"
                                alt="{{ $val->name }}" data-aos="flip-left" data-aos-duration="1500">
                            <p>{{ $val->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php if($title == 'Milk Can'){ ?>
<div class="productList_Dis">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2 data-aos="fade-down" data-aos-duration="1500">Trusted Manufacturer of 40 Liter ROTO Moulded Milk Cans</h2>
                <p>Allwin's ROTO Moulded Milk Cans are meticulously engineered to meet the rigorous demands of the dairy industry. Made from premium-grade polyethylene with advanced rotational molding techniques, 40-liter plastic milk cans will be of very high durability and long-lasting capabilities. The seams-free, one-piece construction minimizes joints; hence, no points of weakness are created for potential failure. Ergonomically shaped handles are present on the cans, which facilitate easy transportation without any hassle. The interior has a polished surface that is not porous and also prevents bacterial growth, thus making the milk stay pure during the transport process. Moreover, these cans are designed with inherent UV resistance, ensuring that the harmful ultraviolet rays do not destroy the milk while being transported, thus making these cans suitable for outdoor use. Allwin being a major Milk Cans Manufacturer, these Dairy Milk Cans are available in a variety of colors to be easily identified and organized in dairy manufacturing. A safe and tight-lid design without spillage or contamination is also assured so that the milk remains fresh even till its destination. Allwin's ROTO Moulded Milk Cans, a product that ensures its users receive an innovative, quality, and practical product that improves the efficiency and reliability of collecting and distributing milk to all interested parties.</p>
            </div>
            <div class="col-xl-12">
                <div class="products-feature-tabs">
                    <ul class="nav nav-tabs details-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                <h3>Discription</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="true">
                                <h3>Features</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">
                                <h3>Applications</h3>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content details-tabs-content" id="myTabContent">

                        <div class="tab-pane details-content-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                        <p>Allwin's 40-liter Plastic Milk Cans are expertly designed for the secure storage and transportation of milk, ensuring it remains fresh and uncontaminated during transit. Constructed from food-grade plastic, these ROTO Moulded Milk Cans are both lightweight and robust, facilitating easy handling. The integrated sturdy handles enhance portability, while the seamless, polished interior and exterior surfaces prevent bacterial growth and simplify cleaning. As a leading Milk Cans Manufacturer, Allwin offers these Dairy Milk Cans in various colors, catering to diverse preferences and needs. </p>
                        </div>
                        
                        <div class="tab-pane details-content-pane fade" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <ul>
                                <li>Ensures safe and hygienic storage and transport of milk using ROTO Moulded Milk Cans made from 100% Virgin & Food-Grade Material.</li>
                                <li>Facilitates easy handling during transportation with lightweight Plastic Milk Cans.</li>
                                <li>Offers long-lasting performance, even under heavy use, thanks to the durable construction of 40-liter Plastic Milk Cans.</li>
                                <li>Prevents spillage and maintains the quality of milk during transit with Lockable Lids and Leakproof design, ideal for Dairy Milk Cans.</li>
                                <li>Provides efficient storage, saving space when not in use with stackable lids for Plastic Milk Cans.</li>
                                <li>A smooth internal surface makes cleaning quick and hassle-free, ensuring easy maintenance of your Milk Can.</li>
                                <li>Perfectly suited for handling larger quantities of milk, offering a 40-litre Plastic Milk Can capacity.</li>
                                <li>A budget-friendly solution without compromising on quality, designed by a leading Milk Cans Manufacturer.</li>
                                <li>Ideal for transporting milk from farms to processing units or markets, ensuring the safe delivery with Plastic Milk Cans.</li>
                            </ul>
                        </div>
                        
                        <div class="tab-pane details-content-pane fade " id="contact" role="tabpanel"
                            aria-labelledby="contact-tab">
                            <p>Allwin's 40-litre Plastic Milk Cans are engineered to address the diverse needs of the dairy and food processing industries. As a trusted Milk Cans Manufacturer, Allwin delivers premium ROTO Moulded Milk Cans that serve as an essential tool for dairy farms, creameries, cheese-making facilities, and other sectors. These Plastic Milk Cans are ideal for the hygienic collection, secure transportation, and reliable storage of milk, cream, and various dairy products. With their robust construction and secure lids, these Dairy Milk Cans ensure optimal freshness and durability, making them indispensable for operations ranging from butter and ice cream production to large-scale milk handling.  </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="FAQ_productList">
                <h2 data-aos="fade-down" data-aos-duration="1500" class="mb-5">FAQs About Milk Can </h2>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What materials are used to manufacture milk cans?
                            </button>
                        </h5>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Allwin’s ROTO Moulded Milk Cans are made from 100% virgin, food-grade plastic, ensuring durability, hygiene, and safety for dairy storage and transportation.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                               Are Allwin milk cans rust-proof?
                            </button>
                        </h5>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            Yes, Allwin’s Plastic Milk Cans are completely rust-proof, unlike traditional metal alternatives, making them ideal for long-term milk storage and transportation.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Are milk cans suitable for transporting milk?
                            </button>
                        </h5>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Absolutely! Allwin’s 40 Litre Plastic Milk Cans are designed for safe and hygienic milk transportation, offering a leak-proof and sturdy construction for easy handling.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Can Allwin milk cans be used for other liquids? 
                            </button>
                        </h5>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Yes, these Dairy Milk Cans are suitable for storing and transporting other food-grade liquids, including cream, buttermilk, and other dairy products.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            What is the difference between plastic and stainless steel milk cans?
                            </button>
                        </h5>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Allwin’s Plastic Milk Cans are lightweight, rust-proof, cost-effective, and impact-resistant, whereas stainless steel cans are heavier and more expensive but offer high-temperature resistance.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Can milk cans be customized for branding or capacity requirements?
                            </button>
                        </h5>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Yes, as a leading Milk Cans Manufacturer, Allwin provides customization options, including branding, color choices, and different capacity variations to meet customer needs.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                               How long can milk be stored in a milk can?
                            </button>
                        </h5>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              With airtight and secure lids, Allwin’s Plastic Milk Cans help maintain milk freshness for extended periods, depending on storage conditions and temperature control.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEleven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                              Do Allwin milk cans come with warranties?
                            </button>
                        </h5>
                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Yes, Allwin provides warranty coverage on its ROTO Moulded Milk Cans, ensuring long-lasting durability and performance.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEaight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEaight" aria-expanded="false"
                                aria-controls="collapseEaight">
                              Are Allwin milk cans leak-proof?
                            </button>
                        </h5>
                        <div id="collapseEaight" class="accordion-collapse collapse" aria-labelledby="headingEaight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                          Yes, Allwin’s 40 Litre Plastic Milk Cans feature airtight, lockable lids, ensuring they remain completely leak-proof during transportation.
                            </div>
                        </div>
                    </div>
                   
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTen" aria-expanded="false"
                                aria-controls="collapseTen">
                              Are there UV-resistant milk cans?
                            </button>
                        </h5>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Yes, Allwin’s Plastic Milk Cans are made with UV-stable polyethylene, making them suitable for outdoor usage without degradation from sunlight exposure.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!--<hr class="comman_hr" />-->
    </div>
    <div class="popular_slider pt-5">
        <div class="container">
            <div class="row">
                <h3 data-aos="fade-down" data-aos-duration="1500">Application Of Product</h3>
                <div class="application_product">
                    @foreach ($datas as $key => $val)
                        <div>
                            <img src="{{ asset('public/appimage/' . $val->image) }}" class="img-fluid"
                                alt="{{ $val->name }}" data-aos="flip-left" data-aos-duration="1500">
                            <p>{{ $val->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php if($title == 'Dustbins'){ ?>
<div class="productList_Dis">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2 data-aos="fade-down" data-aos-duration="1500">Plastic Dustbin Manufacturer </h2>
                <p>Allwin excels as one of the pioneering Plastic Dustbin Manufacturers of the country, which serves India's changing garbage waste management solutions needs and from India. Holding firmly to values of quality and technology, we rank among Ahmedabad and Gujarat's best Plastic Dustbin Manufacturers by providing convenient trash disposal mechanisms. Recognizing how essential credible waste management mechanisms are towards securing cleanliness and a hygienic environment, our plastic dustbins are specially prepared with skillfulness and with toughness. Ideal for both domestic, business, and industrial application, our dustbins are available in diverse sizes, hues, and configurations to suit differing needs.</p>
                <p>As a credible Plastic Dustbin Supplier in India, Allwin is committed to offering higher-quality, longer-lasting, and highly effective garbage managing solutions. Having been constructed of the best grade plastic material, our dustbins are built tough, longer lasting, and enduring wear and tear. Whether for small home-sized bins or giant bins for community use, we offer the best solution to any requirement. With innovation and sustainability in mind, Allwin continues to lead the way, making cleanliness and tidiness easy and convenient.</p>
            </div>
          
            <div class="col-xl-12">
                <div class="products-feature-tabs">
                    <ul class="nav nav-tabs details-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                <h3>Discription</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="true">
                                <h3>Features</h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">
                                <h3>Applications</h3>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content details-tabs-content" id="myTabContent">

                        <div class="tab-pane details-content-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                        <p>A dustbin is an essential part of all homes, offices, and public areas, fostering hygiene and cleanliness by avoiding the accumulation of waste and ensuring a healthy environment. Functionality aside, today's dustbins have developed to meet modern lifestyles, combining functionality with good looks. Founded in 1998 in Ahmedabad, Allwin has been a name you can rely on in the business, offering CE & GMP-certified and ISO-approved products with the highest standards of quality. Our high-end range of plastic dustbins, office dustbins, and residential dustbins is made for long-lasting use, ease, and elegance. Made from strong material, these dustbins provide extended use, assisting you in disposing of household trash efficiently with features for waste segregation. Most individuals currently employ several bins to sort recyclable and non-recyclable trash or to store wet and dry garbage separately, making disposal simpler and environmentally friendly. To have a well-structured area, complement your dustbin with storage racks, trolleys, or plastic cabinets to form a dedicated cleaning station. Visit our wide range online, from pedal bins to lidded and lidless dustbins, unique home bins, wheeled bins, and bulk community dustbins, to identify the ideal product for your application. Allwin offers you the guarantee of excellent, certified waste management products with a blend of efficiency, cleanliness, and ingenuity.</p>
                        </div>
                        
                        <div class="tab-pane details-content-pane fade" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <p>Adorn your space with Allwin's chic and efficient designer dustbins. Previously relegated to hiding behind their plain look, contemporary dustbins now double as fashion statements, with different colors and patterns to suit. With a wonderful combination of beauty and functionality, select a dustbin that perfectly matches your decor while also taking care of your waste disposal needs.</p>
                            <ul>
                                <li><strong>Choosing the Right Size:</strong> Select a dustbin that ideally suits the waste disposal requirements of your office or home. A bin that is too large is difficult to transport, whereas a small dustbin tends to get filled up and creates an unnecessary mess. Allwin offers a wide range of plastic dustbins, including secure lids for easy handling and effective waste disposal, keeping the area cleaner and more organized.</li>
                                <li><strong>Selecting the Best Material:</strong> Garbage bins are made from metal or plastic, each serving different needs. Allwin’s plastic dustbins are lightweight, colorful, and easy to maintain, while metal bins, made of stainless steel or galvanized steel, are durable and ideal for commercial spaces.

</li>
                                <li><strong>Matching Colors & Patterns:</strong> In-door trash dustbins should blend in with your environment. Bright, playful colors are ideal for kids' rooms and kitchens, while natural colors add coziness to the living room. Metallic colors suit a modern style. Allwin offers a variety to match every taste and need.</li>
                                
                                <li><strong>Finding the Ideal Design:</strong> Allwin provides a wide range of dustbin designs, including pedal bins for hands-free use, twin bins for easy waste segregation, and touch-top bins for added convenience. Lidded options ensure hygiene and a clutter-free look, keeping your space clean and organized.</li>
                                
                                <li><strong>Deciding the Placement:</strong> Place your dustbin thoughtfully to manage waste and odors effectively. With Allwin’s stylish and functional designs, you can confidently keep them in kitchens, bathrooms, or living spaces without the need to hide them.</li>
                                <li><strong>Ensuring Proper Usage:</strong> Lining your dustbin with garbage bags makes waste disposal and cleaning seamless. Keep multiple bins in your home for efficient and hassle-free waste management with Allwin’s practical solutions.</li>
                                
                            </ul>
                        </div>
                        
                        <div class="tab-pane details-content-pane fade " id="contact" role="tabpanel"
                            aria-labelledby="contact-tab">
                            <p>Purchase large or small dustbins online from Allwin, a Gujarat-based business offering high-quality waste management solutions globally. Our high-performance and long-lasting garbage bins are engineered to simplify waste disposal and make it efficient for households, offices, and industries. From small bins for kitchens and bathrooms to large-capacity bins for public areas, Allwin has a large variety to suit every need. With reasonable rates, discounts, and clearance sale, you can have the maximum value without going for a compromise on quality. Avoid the effort of going out to shops—shop online from anywhere across the globe, and Allwin shall deliver quickly and safely to your doorstep.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="FAQ_productList">
                <h2 data-aos="fade-down" data-aos-duration="1500" class="mb-5">FAQs About Plastic Dustbin </h2>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Are plastic dustbins eco-friendly?
                            </button>
                        </h5>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Plastic dustbins' eco-friendliness depends on the materials and manufacturing processes used. Allwin Roto Plast offers options made from recycled plastics, promoting sustainability by reducing environmental waste. 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                               What types of plastic dustbins does Allwin manufacture for businesses?
                            </button>
                        </h5>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Allwin provides a range of plastic dustbins suitable for business environments, including:
                            <ul>
                                <li><strong>Pedal Bins:</strong> Hands-free operation ideal for maintaining hygiene in workplaces.</li>
                                <li><strong>Swing Bins:</strong> Convenient swing lids suitable for offices and commercial spaces.</li>
                                <li><strong>Roto-Moulded Dustbins:</strong> Durable bins designed for heavy-duty use in industrial settings.</li>
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Do you offer bulk purchasing options for plastic dustbins?
                            </button>
                        </h5>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                             Yes, Allwin offers bulk purchasing options for plastic dustbins, catering to businesses and organizations requiring large quantities. Customized colors are available for bulk orders.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                What industries commonly use Allwin’s plastic dustbins?
                            </button>
                        </h5>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Allwin's plastic dustbins are utilized across various industries, including:
                               <ul>
                                   <li><strong>Hospitality:</strong> Hotels and restaurants for waste management.</li>
                                   <li><strong>Healthcare:</strong> Hospitals and clinics for medical waste disposal.</li>
                                   <li><strong>Manufacturing:</strong> Factories and industrial facilities for handling industrial waste.</li>
                                   <li><strong>Public Services:</strong> Municipalities for public waste collection.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            What is the minimum order quantity (MOQ) for bulk orders?
                            </button>
                        </h5>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               The minimum order quantity (MOQ) for bulk orders varies depending on the product and customization requirements. For specific details, it is recommended to contact Allwin directly.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Do you offer wheeled dustbins for easier waste collection?
                            </button>
                        </h5>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Yes, Allwin offers wheeled dustbins, such as the ARP 240 & 120 DBW models, designed for easier waste collection and mobility.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                              Are your dustbins leak-proof and resistant to chemical exposure?
                            </button>
                        </h5>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Allwin's plastic dustbins are designed to be durable, leak-proof, and resistant to chemical exposure, making them suitable for various waste types, including industrial waste.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEleven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                              What are the standard and custom sizes available for bulk orders?
                            </button>
                        </h5>
                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Standard sizes range from 60 liters to 240 liters. Allwin also offers customization options for bulk orders to meet specific size and design requirements.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingEaight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEaight" aria-expanded="false"
                                aria-controls="collapseEaight">
                              Are your pedal bins designed for smooth, noiseless operation in commercial spaces?
                            </button>
                        </h5>
                        <div id="collapseEaight" class="accordion-collapse collapse" aria-labelledby="headingEaight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                         Allwin's pedal bins are engineered for smooth and noiseless operation, making them ideal for maintaining a quiet and efficient environment in commercial spaces.
                            </div>
                        </div>
                    </div>
                   
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTen" aria-expanded="false"
                                aria-controls="collapseTen">
                              What sizes are available for plastic dustbins?
                            </button>
                        </h5>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              Allwin manufactures plastic dustbins in various sizes to meet diverse needs. For example, the ARP 110 DB model has a capacity of 110 liters, with dimensions of 515 mm (L) x 515 mm (W) x 920 mm (H).
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   
</div>
<?php } ?>
@include('layouts.frontfooter')
<script>
    function redirectToRoute(routeUrl) {
        window.location.href = routeUrl;
    }
</script>
@include('layouts.popupmodal')