<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Certificate; 
use App\Models\ApplicationProduct;
use App\Models\productprice;
use App\Models\Category;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data = Product::all();
        // $datas=  DB::table('application_products')->orderBy('id', 'desc')->limit(5)->select('id','name','image')->get();
        // return view('front.productlist',compact('data','datas')); 

        $data = Product::all();
        $datas=  DB::table('application_products')->orderBy('id', 'desc')->select('id','name','image')->get();
      
        return view('front.productlist',compact('data','datas')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function productprice(Request $request) {
        // Validation Rules
        $validatedData = $request->validate([
            'your_name' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'mail_id' => 'required|email|max:255',
            'mobilenumber' => 'required|min:10|max:15',
            'countryName' => 'required|string|max:255',
            'requirment' => 'required|string|max:1000',
        ], [
            'your_name.required' => 'Full name is required.',
            'category_name.required' => 'Category name is required.',
            'product_name.required' => 'Product name is required.',
            'mail_id.required' => 'Email is required.',
            'mail_id.email' => 'Please enter a valid email address.',
            'mobilenumber.required' => 'Mobile number is required.',
            'mobilenumber.digits' => 'Mobile number must be exactly 15 digits.',
            'countryName.required' => 'Country name is required.',
            'requirment.required' => 'Requirement field is required.'
        ]);
    
        // Insert data into the database
        DB::table('productprice')->insert($validatedData);
    
        $sheetsData = [
            'from_type' => 'Product Inquiry',
            'fullname' => $request->your_name,
            'product' => $request->product_name,
            'category'=>  $request->category_name,
            'email' => $request->mail_id,
            'phone' => $request->mobilenumber,
            'country' => $request->countryName,
            'requirement' => $request->requirment,
            'formattedDate'=> now()->format('Y-m-d'),
        ];
    
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post('https://script.google.com/macros/s/AKfycbzUdU-WKJDn4oA0zCjLydp5yVes-SKuJZnHYNkXWBgBnj5Eswz4XcPL0DW42j0yEUbn/exec', $sheetsData);
    
            \Log::info('Google Sheets Response:', [
                'status' => $response->status(),
                'headers' => $response->headers(),
                'body' => $response->body(),
            ]);
    
            if (!$response->successful()) {
                \Log::error('Google Sheets Error Response:', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'data_sent' => $sheetsData
                ]);
            }
    
        } catch (\Exception $e) {
            \Log::error('Google Sheets Exception:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data_sent' => $sheetsData
            ]);
        }
    
        $info = [
            'fullname' => $request->your_name,
            'email' => $request->mail_id,
            'phone' => $request->mobilenumber,
            'country' => $request->countryName,
            'requirementse' => $request->requirment,
        ];
        
        $data['thankyou'] = 'Thank you ' . $info['fullname'] . ' for reaching out to Home-Allwin. We have received your inquiry. We will contact you soon for the same.';
        
        try {
            Mail::send('mail.thankyou', $data, function ($message) use ($info) {
                $message->to($info['email'])->subject('Thank You');
            });
    
            Mail::send('mail.inquirydata', ['inquiryquote' => $info], function ($message) use ($info) {
                $message->to('sales@allwinrotoplast.com')->subject('Inquiry Details');
            });
    
            return response()->json([
                'success' => true,
                'message' => 'We received your request. Our team will contact you soon.'
            ]);
    
        } catch (\Swift_TransportException $e) {
            return response()->json([
                'success' => false,
                'message' => 'There was an error while sending the email. Please try again later.'
            ], 500);
        }
    }


    // public function productprice(request $request){
    //     $payoad = ['your_name'=>$request->your_name,'product_name'=>$request->product_name,'mail_id'=>$request->mail_id, 'mobilenumber'=>$request->mobilenumber,'countryName'=>$request->countryName,'requirment'=>$request->requirment];
    //     DB::table('productprice')->insert($payoad);

    //     $info = [
    //         'fullname' => $request->input('your_name'),
    //         'email' => $request->input('mail_id'),
    //         'phone' => $request->input('mobilenumber'),
    //         'country' => $request->input('countryName'),
    //         'requirementse' => $request->input('requirment'),
    //     ];
        
    //     $data['thankyou'] = 'Thank you ' . $info['fullname'] . ' for reaching out to Home-Allwin. We have received your inquiry. We will contact you soon for the same.';
        
    //     Mail::send('mail.thankyou', $data, function ($message) use ($info) {
    //         $message->to($info['email'])
    //             ->subject('Thank You');
    //     });
        
    //     Mail::send('mail.inquirydata', ['inquiryquote' => $info], function ($message) use ($info) {
    //         $message->to('sales@allwinrotoplast.com')
    //             ->subject('Contact Us Details');
    //     });
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'We Recived Request Our Team will Contact You Soon.'
    //     ]);
    // }


    public function categoryproductlist($title){
      
        $title = str_replace('-', ' ', $title);
   
         $id = DB::select("select id from categories where category_name='$title'");
         $id = $id[0]->id;
         #dd($title);
        if($title == 'plastic pallets') {
            $metatitle = "Plastic Pallets - Industrial Plastic Pallet Manufacturer";
            $metadescription = "Allwin, a leading plastic pallet manufacturer, uses high-quality materials to ensure durable, reliable solutions for every industry's storage and heavy loads.";
           $ogimage ="3-runner-4-way.png";
            #dd($title[0]);
        }
        elseif($title == 'fish tubs') {
            $metatitle = "Fish Tubs: Wholesale Prices & Bulk Supply";
            $ogimage ="9.webp";
            $metadescription = "Fish Tub – Buy durable Plastic Fish Tubs & Seafood Storage bins from Allwin, a trusted fish tub manufacturer (70-1250L). 9001:2008, CE & GMP Certified.";
        }
        elseif($title == 'ice box') {
            $metatitle = "Ice Box: Plastic Ice Box Manufacturer";
            $ogimage ="ARP-20-1.webp";
            $metadescription = "Allwin Ice Box, available in 20L-250L sizes, keeps food and drinks fresh anywhere! Durable plastic ice boxes, perfect for travel, camping, and adventures.";
        }
        elseif($title == 'doff basket') {
            $metatitle = "Doff Basket – Allwin Roto Plast";
            $ogimage ="ARP-260-210-C.webp";
            $metadescription = "Buy high-quality Doff Baskets for efficient yarn handling and storage. Durable, lightweight, and perfect for textile industries. Shop now!";
        }
        elseif($title == 'milk can') {
            $metatitle = "Plastic Milk Can – Milk Can Manufacturer India";
            $ogimage ="cane.png";
            $metadescription = "Allwin milk cans, 40L capacity, are durable, rust-resistant, and easy to clean—perfect for milk storage and transport in dairy farms and home use. Order Now";
        }
        elseif($title == 'roto moulded plastic dustbins') {
            $metatitle = "Roto Moulded Plastic Dustbins | Allwin Roto Plast";
            $ogimage ="ARP-60-DB.webp";
            $metadescription = "Buy Roto Moulded Plastic Dustbins from us, a prominent manufacturer, supplier, and exporter of Roto Moulded Garbage Dustbin based in Ahmedabad, Gujarat, India.";
        }
        elseif($title == 'dustbins') {
            $metatitle = "Dustbin: Plastic Dustbins Manufacturer  ";
            $ogimage ="ARP-60-DB.webp";
            $metadescription = "Buy dustbins online from Allwin, a leading plastic dustbin manufacturer in India. Get custom waste bins, garbage bins for home, commercial & industrial use. ";
        }
        elseif($title == 'safbin') {
            $metatitle = "Safbins and Storage Bins";
            $ogimage ="ARP-CV.webp";
            $metadescription = "Safbins & storage bins, crafted with robust roto-molding, offer durable, versatile storage solutions. Ideal for various uses, they stand out with solid construction.";
        }
      
        else{
            $metatitle = "Pallet Container";
            $ogimage ="ARP-1000-PLC.webp";
            $metadescription = "Allwin offers high-quality pallet containers for efficient storage and transportation. Durable, versatile, and perfect for industrial and commercial use.";
        }
        if($title == 'pallets') {
             $firstRecord = DB::table('application_products')->where('name','Pharmaceutical')
                ->orderBy('id', 'desc')
                ->select('id', 'name', 'image')
                ->first();
            
            $otherRecords = DB::table('application_products')->where('name','!=','Pharmaceutical')
                ->orderBy('id', 'desc')
                ->select('id', 'name', 'image')
                ->get();
            
            $datas = collect([$firstRecord])->concat($otherRecords);
         }else{
            $datas=  DB::table('application_products')->where('category_id','=', $id)->select('id','name','image')->get();
            $datas = DB::select("SELECT * FROM `application_products` where FIND_IN_SET(".$id.", category_id) AND is_delete = 1");
         }
        
         $title = DB::select('select category_name from categories where id='.$id);
         $title = $title[0]->category_name;
         
         $data = Product::where('category_id',$id)->get();
         
            ##d($datas);
            return view('front.productlist',compact('data','datas', 'ogimage', 'metatitle', 'metadescription','title')); 
    }

    public function poductdetail($id,$producturl) {
    
    // $productname = str_replace(',', '', str_replace('&', ' ', $productname));
   // dd($productname);
    //\DB::enableQueryLog();
        $data = Product::join('categories', 'categories.id', '=', 'product.category_id')->where('product.producturl', $producturl)->first();
      //  dd(\DB::getQueryLog());
        // dd($data);
        $data['productid'] = $data->id;
        $data['cert'] = Certificate::where('is_check', '0')->where('is_delete', '0')->get();
        $data['other'] = Product::join('categories', 'product.category_id', '=', 'categories.id')->where('category_id','!=',$data->category_id)->limit(5)->get();
        $metatitle = $data->meta_title;
        $ogimage = $data->product_image;
        $metadescription = $data->meta_description;
        return view('front.productfront', compact('data', 'ogimage', 'metatitle', 'metadescription')); 
    }
    
    public function poductdetailpallet($id){
        $metatitle = "Single Wall Spill Pallets | Allwin Roto Plast ";
        $metadescription = "Seeking Single Wall Spill Pallets? Our rackable model offers a 150L spill tank capacity. Contact us now for more information and to make a purchase!";
        $data = Product::join('categories', 'categories.id', '=', 'product.category_id')->where('product.id', $id)->first();
        $data['cert'] = Certificate::where('is_check', '0')->where('is_delete', '0')->get();
        $data['other'] = Product::where('is_popular','!=',$data->category_id)->limit(5)->get();
        return view('front.single-wall-spill-pallets',compact('data', 'metatitle', 'metadescription')); 
    }
        
    public function poductdetailspallet($id){
        $metatitle = "Double Wall Spill Pallets | Allwin Roto Plast";
        $metadescription = "Looking for Double Wall Spill Pallets? Our rackable model has a 150L spill tank capacity. Contact us for details and to place your order!";
        $data = Product::join('categories', 'categories.id', '=', 'product.category_id')->where('product.id', $id)->first();
        $data['cert'] = Certificate::where('is_check', '0')->where('is_delete', '0')->get();
        $data['other'] = Product::where('is_popular','!=',$data->category_id)->limit(5)->get();
        return view('front.double-wall-spill-pallets',compact('data', 'metatitle', 'metadescription')); 
    }
        
        public function getProductsByCategory($categoryId)
        {
            $products = Product::where('category_id', $categoryId)->get();
            return response()->json($products);
        }

        public function getAllProducts()
        {
            $products = Product::all();
            return response()->json($products);
        }
    }
