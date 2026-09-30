<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Faq;
use Illuminate\Http\Request;
use DB;
use App\Models\CaseStudy;
use App\Models\Quote;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Distributor;
use App\Models\Certificate;
use App\Models\inquiryqoute;
use App\Models\catalogue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Swift_TransportException;
use Illuminate\Support\Carbon;
use App\Models\WhatsappInquiry;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function login(){
         return view('auth.login');
     }
     public function admin(){
         return view('admin.admin');
     }
    public function index()
    {
        $metatitle = "Roto Mould Plastic Pallet | Insulated Ice Boxes & Tubs";
        $metadescription = "Allwin is a leading manufacturer of fish tubs, plastic pallets, ice boxes, milk cans, dustbins, and pallet containers, with wholesale pricing available.";
        $data['certificates'] = DB::table('certificate')->where('is_delete','0')->where('is_check','0')->get();
        //dd($data['certificates']);
        $data['popular_product'] = DB::table('product')->join('categories', 'categories.id', '=', 'product.category_id')->where('product.is_popular', '0')->select('product.*','categories.category_name')->get();
// dd($data['popular_product']);
        $data['clients'] = DB::table('our_clients')->where('is_delete','1')->get();
        $data['what_our_client'] = DB::table('whatourclientsays')->where('is_delete','1')->get();
       
        //dd($data['what_our_client']);
        return view('front.dashboard',compact('data', 'metatitle', 'metadescription'));
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

   
    
     public function submitenquiry(request $request) {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|min:10|max:15',
            'country' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        
        ]);
        
        $inquiryqoute = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'message' => $request->message,
        ];
        DB::table('quote')->insert($inquiryqoute);
        
        $info = [
            'fullname' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'requirementse' => $request->input('message'),
        ];

        $sheetsData = [
            'from_type' => 'Contact Us',
            'fullname' => $request->name,
            'product' => "",
            'category'=> "",
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'requirement' => $request->message,
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

        
        $data['thankyou'] = 'Thank you ' . $info['fullname'] . ' for reaching out to Home-Allwin. We have received your inquiry. We will contact you soon for the same.';
        
        try {
            Mail::send('mail.thankyou', $data, function ($message) use ($info) {
                $message->to($info['email'])->subject('Thank You');
            });
    
            Mail::send('mail.inquirydata', ['inquiryquote' => $info], function ($message) use ($info) {
                $message->to('sales@allwinrotoplast.com')
                    ->subject('Contact Us Details');
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

    
     // public function submitenquiry(Request $request){
        //     //dd($request->all());
        // //   $request->validate([
        // //     'g-recaptcha-response' => 'required|captcha',
        // //     // Add other validation rules for your form fields
        // // ]);
        //     $payoad = ['name'=>$request->name,'email'=>$request->email, 'phone'=>$request->phone,'country'=>$request->country,'message'=>$request->message];
        //     DB::table('quote')->insert($payoad);
        //   $info = [
        //         'fullname' => $request->input('name'),
        //         'email' => $request->input('email'),
        //         'phone' => $request->input('phone'),
        //         'country' => $request->input('country'),
        //         'requirementse' => $request->input('message'),
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
        // //   return response()->json([
        // //         'success' => true,
        // //         'message' => 'We Recived Request Our Team will Contact You Soon.'
        // //     ]);
        //  return redirect('thank-you');
        // }
        
    public function aboutus(){
        $metatitle = "About Us - Allwin Roto Plast";
        $metadescription = "Allwin Roto Plast is a manufacturer based in Ahmedabad, Gujarat, specializing in insulated ice boxes, fish tubs, cool boxes, plastic pallets, milk cans, and more.";
        $ogimage = "";
        return view('front.about', compact('metatitle', 'ogimage', 'metadescription'));
    }

    public function contactus(){
        $metatitle = "Contact Us - Allwin Roto Plast";
        $metadescription = "Need assistance or have inquiries about our products? Reach out to us through our contact form, email, or phone. We're here to help!";
         $ogimage = "about-img-1.png";
        return view('front.contact', compact('metatitle', 'ogimage', 'metadescription'));
    }
    
    public function customrotational(){
        $metatitle = "Custom Rotational Moulding – Allwin";
        $metadescription = " Allwin offers custom rotational moulding solutions for prototypes, low-volume production & new product development—design to finished product. Contact Us.";
         $ogimage = "";
        return view('front.custom-rotational-moulding', compact('metatitle', 'ogimage', 'metadescription'));
    }
    
    public function fishtabuk(){
        $metatitle = "Insulated Fish Tubs Supplier In UK – Allwin ";
        $metadescription = "Allwin is a top UK supplier of insulated fish tubs, containers, bins & boxes. Custom sizes, colours & logo printing for businesses needing quality storage.";
         $ogimage = "";
        return view('front.fish-tab-uk', compact('metatitle', 'ogimage', 'metadescription'));
    }

 public function insulated_fish_tubs(){
        $metatitle = "Insulated Ice Boxes For UK Businesses – Allwin";
        $metadescription = "Allwin offers a range of insulated ice boxes in various sizes, ideal for UK businesses. Customisable solutions designed to meet storage & transport needs.";
        $ogimage = "";
        return view('front.insulated-box-uk', compact('metatitle', 'ogimage', 'metadescription'));
    }
    public function plastic_pallets_supplier(){
        $metatitle = "Plastic Pallets in The UK – All Styles & Sizes";
        $metadescription = "Allwin is a leading UK supplier of plastic pallets, offering a wide range of colours, sizes, and custom options to meet the needs of all industries.";
        $ogimage = "";
        return view('front.plastic-pallets-uk', compact('metatitle', 'ogimage', 'metadescription'));
    }
    public function casestudy(){
        $metatitle = "Allwin Roto Plast - Case Studies";
        $metadescription = "Discover our latest collection of case studies for valuable insights and practical examples.";
        $data = CaseStudy::where('is_delete','0')->get();
        $ogimage = "Milma-Case-studies-01.webp";
        return view('front.casestudy',compact('data', 'ogimage', 'metatitle', 'metadescription'));
    }

    public function distributor(){
        $metatitle = "Business Opportunity | Allwin Roto Plast";
        $metadescription = "Need more info on our plastic pallets products, services, or a custom offer? We're here to help. Share your details, and we'll get in touch promptly.";
        $countries = DB::select(DB::raw("SELECT name from countries"));
        return view('front.distributor',compact('countries', 'metatitle', 'metadescription'));
    }
    public function jointventure(){
        $metatitle = "Unlock Prosperity with Our Rotomold Product Joint Venture";
        $metadescription = "Partner with Allwin Roto Plast for a lucrative joint venture in the world of rotomolded products. Join hands for innovation and growth. Your success, our commitment.";
        $countries = DB::select(DB::raw("SELECT name from countries"));
        return view('front.jointventureforproduct',compact('countries', 'metatitle', 'metadescription'));
    }
    
    
    public function distributorstore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:30',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:15',
            'country' => 'required',
            'requirment' => 'required',
            'g-recaptcha-response' => 'required',
        ], [
            'name.required' => 'Please enter the name.',
            'name.regex' => 'Please enter a valid name.',
            'name.max' => 'Please enter a maximum of 30 characters.',
            'email.required' => 'Please enter the email.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Please enter the phone.',
            'phone.max' => 'Please enter a maximum of 15 characters.',
            'country.required' => 'Please enter the country.',
            'requirment.required' => 'Please enter the requirement.',
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.',
        ]);
    
        $post = new Distributor;
        $post->name = $request->name;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->country = $request->country;
        $post->type = $request->type;
        $post->requirment = $request->requirment;
    
        $info = [
            'fullname' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'requirementse' => $request->requirment,
        ];
    
        $sheetsData = [
            'from_type' => "Distributor",
            'fullname' => $request->name,
            'product' => '',
            'category' => '',
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'requirement' => $request->requirment,
            'formattedDate' => now()->format('Y-m-d'),
        ];
    
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post('https://script.google.com/macros/s/AKfycbzUdU-WKJDn4oA0zCjLydp5yVes-SKuJZnHYNkXWBgBnj5Eswz4XcPL0DW42j0yEUbn/exec', $sheetsData);
    
            if (!$response->successful()) {
                \Log::error('Google Sheets Error:', [
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
    
        $data['thankyou'] = 'Thank you ' . $info['fullname'] . ' for reaching out to Home-Allwin. We have received your inquiry. We will contact you soon.';
    
        try {
            Mail::send('mail.thankyou', $data, function ($message) use ($info) {
                $message->to($info['email'])->subject('Thank You');
            });
    
            Mail::send('mail.inquirydata', ['inquiryquote' => $info], function ($message) {
                $message->to('sales@allwinrotoplast.com')->subject('Contact Us Details');
            });
    
            $post->save();
    
        } catch (\Exception $e) {
            \Log::error('Email Error: ' . $e->getMessage());
            return response()->json(['error' => 'There was an issue sending your email. Please try again later.'], 500);
        }
    
        return response()->json([
            'success' => true,
            'redirect' => url('thank-you'), 
            'message' => 'Thank You for Your Request. Our Team Will Contact You Soon.'
        ]);
    
    }
    
    
    
//     public function distributorstore(Request $request)
//     {
//     // Validate the incoming request
//     $validatedData = $request->validate([
//         'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:30',
//         'email' => 'required|email',  // Added email validation
//         'phone' => 'required|max:10',
//         'country' => 'required',
//         'requirment' => 'required', 
//     ], 
//     [
//         'name.required' => 'Please enter the name.',
//         'name.regex' => 'Please enter a valid name.',
//         'name.max' => 'Please enter a maximum of 30 characters.',
//         'email.required' => 'Please enter the email.',
//         'email.email' => 'Please enter a valid email address.', // Error message for invalid email
//         'phone.required' => 'Please enter the phone.',
//         'phone.max' => 'Please enter a maximum of 10 characters.',
//         'country.required' => 'Please enter the country.',
//         'requirment.required' => 'Please enter the requirement.',
//     ]);
    
//     // Create a new Distributor instance
//     $post = new Distributor;
//     $post->name = $request->get('name');
//     $post->email = $request->get('email');
//     $post->phone = $request->get('phone');
//     $post->country = $request->get('country');
//     $post->type = $request->get('type');
//     $post->requirment = $request->get('requirment');
    
//     $info = [
//         'fullname' => $request->input('name'),
//         'email' => $request->input('email'),
//         'phone' => $request->input('phone'),
//         'country' => $request->input('country'),
//         'requirementse' => $request->input('requirment'),
//     ];

//     $sheetsData = [
//             'from_type' => "Distributor",
//             'fullname' => $request->name,
//             'product' =>'',
//             'category'=> '',
//             'email' => $request->email,
//             'phone' => $request->phone,
//             'country' => $request->country,
//             'requirement' => $request->requirment,
//             'formattedDate'=> now()->format('Y-m-d'),
//         ];

//         try {
//             $response = Http::withHeaders([
//                 'Content-Type' => 'application/json'
//             ])->post('https://script.google.com/macros/s/AKfycbzUdU-WKJDn4oA0zCjLydp5yVes-SKuJZnHYNkXWBgBnj5Eswz4XcPL0DW42j0yEUbn/exec', $sheetsData);
    
//             \Log::info('Google Sheets Response:', [
//                 'status' => $response->status(),
//                 'headers' => $response->headers(),
//                 'body' => $response->body(),
//             ]);
    
//             if (!$response->successful()) {
//                 \Log::error('Google Sheets Error Response:', [
//                     'status' => $response->status(),
//                     'body' => $response->body(),
//                     'data_sent' => $sheetsData
//                 ]);
//             }
    
//         } catch (\Exception $e) {
//             \Log::error('Google Sheets Exception:', [
//                 'message' => $e->getMessage(),
//                 'trace' => $e->getTraceAsString(),
//                 'data_sent' => $sheetsData
//             ]);
//         }

//     $data['thankyou'] = 'Thank you ' . $info['fullname'] . ' for reaching out to Home-Allwin. We have received your inquiry. We will contact you soon for the same.';
    
//     try {
//         // Send thank you email
//         Mail::send('mail.thankyou', $data, function ($message) use ($info) {
//             $message->to($info['email'])
//                 ->subject('Thank You');
//         });

//         // Send inquiry data email
//         Mail::send('mail.inquirydata', ['inquiryquote' => $info], function ($message) use ($info) {
//             $message->to('sales@allwinrotoplast.com')
//                 ->subject('Contact Us Details');
//         });

//         // Save distributor data
//         $post->save();
        
//     } catch (Swift_TransportException $e) {
//         // Log the error message
//         \Log::error('Email sending failed: ' . $e->getMessage());
        
//         // Return a response with an error message
//         return redirect()->back()->with('error', 'There was an issue sending your email. Please try again later.');
//     }

//     // Redirect back with a success message
//     return redirect('thank-you')->with('success', 'Thank You for Your Request. Our Team Will Contact You Soon.');
// }



    public function inquiryqoute(){

        $countries = DB::select(DB::raw("SELECT name from countries"));
        return view('front.dashboard',compact('countries'));
    }
    
    
    
        public function inquiryqoutestore(Request $request) {
        // Validation
        $request->validate([
            'fullname' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'sub_product' => 'nullable|string|max:255',
            'mail' => 'required|email|max:255',
            'mobile' => 'required|digits_between:10,15',
            'countries' => 'required|string|max:255',
            'requirments' => 'required|string',
        ]);
    
        $inquiryqoute = [
            'fullname' => $request->fullname,
            'product' => $request->product,
            'sub_product' => $request->sub_product,
            'mail' => $request->mail,
            'mobile' => $request->mobile,
            'countries' => $request->countries,
            'requirments' => $request->requirments,
        ];
    
        try {
            DB::table('inquiryqoute')->insert($inquiryqoute);
    
            $sheetsData = [
                'from_type' => 'Inquiry From Home',
                'fullname' => $request->fullname,
                'product' => $request->product,
                'category' => $request->sub_product,
                'email' => $request->mail,
                'phone' => $request->mobile,
                'country' => $request->countries,
                'requirement' => $request->requirments,
                'formattedDate' => now()->format('Y-m-d'),
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
                'fullname' => $request->input('fullname'),
                'product' => $request->input('product'),
                'sub_product' => $request->input('sub_product'),
                'email' => $request->input('mail'),
                'phone' => $request->input('mobile'),
                'country' => $request->input('countries'),
                'requirementse' => $request->input('requirments'),
            ];
    
            try {
                $data['thankyou'] = 'Thank you ' . $info['fullname'] . ' for reaching out to Home-Allwin. We have received your inquiry. We will contact you soon for the same.';
                
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
        } catch (\Exception $e) {
            \Log::error('Database Insertion Error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data_sent' => $inquiryqoute
            ]);
    
            return response()->json([
                'success' => false,
                'message' => 'There was an error while storing your inquiry. Please try again later.'
            ], 500);
        }
    }
    
    public function cataloguestore(Request $request)
    {
        // Validation
        $request->validate([
            'catalogueTitle' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'email_address' => 'required|email|max:255',
            'mob' => 'required|numeric|digits_between:10,15',
            'country_name' => 'required|string|max:255',
        ]);
    
        $cataloguestore = [
            'catalogueTitle' => $request->catalogueTitle,
            'full_name' => $request->full_name,
            'email_address' => $request->email_address,
            'mob' => $request->mob,
            'country_name' => $request->country_name
        ];
        
        DB::table('catalogue')->insert($cataloguestore);
    
        $info = [
            'fullname' => $request->input('full_name'),
            'email_address' => $request->input('email_address'),
            'mobmob' => $request->input('mob'),
            'country_name' => $request->input('country_name'),
        ];
    
        $data['thankyou'] = 'Thank you ' . $info['fullname'] . ' for reaching out to Home-Allwin. We have received your inquiry. We will contact you soon for the same.';
    
        try {
            Mail::send('mail.thankyou', $data, function ($message) use ($info) {
                $message->to($info['email_address'])->subject('Thank You');
            });
    
            Mail::send('mail.catalogue', ['cataloguedata' => $info], function ($message) use ($info) {
                $message->to('sales@allwinrotoplast.com')->subject('REQUESTED CATALOGUE')
                    ->attach(public_path('/CertificateFiles/Master-brochure.pdf'), [
                        'as' => 'download.pdf',
                        'mime' => 'application/pdf'
                    ]);
            });
        } catch (Swift_TransportException $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'There was an issue sending your email. Please try again later.']);
        }
    
        return response()->json(['success' => true, 'message' => 'We Received Your Request. Our Team will Contact You Soon.']);
    }

     
    
    public function blog(){
        $metatitle = "Allwin Roto Plast - Blogs";
        $metadescription = "Explore our latest blog covering topics on ice boxes, dustbins, insulated fish tubs, shipping boxes, pallets, and more at Allwin Roto Plast.";
            $datas=  DB::table('blog')->where('is_delete','0')->where('status', 'Active')->orderBy('id', 'desc')->select('id','title','front_image','short_description','publish_date','url')->get();
            return view('front.blog',compact('datas', 'metatitle', 'metadescription')); 
    }
        
    public function blogdetail($id){
        $data = DB::table('blog') 
        ->leftjoin('faq', 'faq.blog_id', '=', 'blog.id')
        ->where('blog.url', $id)
        ->where('blog.is_delete', '0')
        ->where('blog.status', 'Active')
        ->get();

        abort_if($data->isEmpty(), 404);

        $finaldata = $data[0];
        $ogimage = "";
        $metatitle = $finaldata->meta_title;
        $metadescription = $finaldata->meta_description;
        $og_image = $finaldata->image ?? '';
        
        return view('front.blogdetails',compact('finaldata', 'ogimage', 'metatitle', 'metadescription', 'og_image')); 
    } 

    public function download(){
        $metatitle = "Download Catalogs | Allwin Roto Plast";
        $metadescription = "Download brochures from Allwin Roto Plast to explore our complete range of plastic pallets, pallet boxes, and small containers.";
        $datas =  DB::table('certificate')->where('is_check','1')->orderBy('id', 'desc')->select('id','certificate_name','certificate_logo','certificate_file')->get();
        $data = DB::table('categories')->where('is_delete','0')->orderBy('id', 'desc')->select('id','category_name')->get();
        //dd($data);
        return view('front.download',compact('datas','data', 'metatitle', 'metadescription'));
    }
  
    

    public function thankyou(){
        // $data['thankyou'] = 'Thank you Yamini Patel for reaching out to Home-Allwin. We have received your inquiry. We will contact you soon for the same.';

        // try {
        //     Mail::send('mail.thankyou', $data, function ($message) {
        //         $message->to('webdeveloper3.intelliworkz@gmail.com')
        //             ->subject('Thank You');
        //     });
        
        //     // Log a success message or perform any other action after successful email sending.
        //     echo "Email sent successfully!";
        // } catch (Swift_TransportException $e) {
        //     // If an error occurs, print the exception message.
        //     echo 'Failed to send email. Error: ' . $e->getMessage();
        // }


         $metatitle = "Thankyou | Allwin Roto Plast";
        $metadescription = "Allwin Roto Plast to explore our complete range of plastic pallets, pallet boxes, and small containers.";
        $ogimage = "";
          return view('front.thankyou',compact('metatitle', 'ogimage', 'metadescription'));
    }
    
    // public function testmail() {
    //     dd('ghare javu');
    //     try {
    //         $data['thankyou'] = 'Thank you Jeet Thaker for reaching out to Home-Allwin. We have received your inquiry. We will contact you soon for the same.';
            
    //         Mail::send('mail.thankyou', $data, function ($message) {
    //             $message->to('webdeveloper3.intelliworkz@gmail.com')
    //                     ->subject('Thank You');
    //         });
    
    //         return 'Mail sent successfully!';
    
    //     } catch (\Exception $e) {
    //         // Log the error for debugging
    //         Log::error('Mail sending failed: ' . $e->getMessage());
    
    //         return 'Mail sending failed: ' . $e->getMessage();
    //     }
    // }

    public function whatsaapinquiry(Request $request)
    {
        WhatsappInquiry::create([
           
            'number'  => $request->number,
            'message'  => $request->message,
        ]);
    
        $timestamp = Carbon::now()->format('Y-m-d H:i:s');
    
        // Google Sheet expects:
        // form_type, contact, message, date
        $sheetsData = [
            'form_type' => 'whatsapp inquiry',
            'contact'   => $request->number,
            'message'  => $request->message,
            'date'      => $timestamp,
        ];
        try {
            Http::withHeaders(['Content-Type' => 'application/json'])
                ->post('https://script.google.com/macros/s/AKfycbyVHcGTd70zhZ1D9J8VdNt8UjfoAKfd29VtLbf_YE4tueRzN1k28H7NfgPs_ACxFP_m8A/exec', 
                    $sheetsData
                );
        } catch (\Exception $e) {
            \Log::error('Google Sheets Exception (WhatsApp Inquiry):', [
                'message'   => $e->getMessage(),
                'trace'     => $e->getTraceAsString(),
                'data_sent' => $sheetsData
            ]);
        }
    
        $number = '919712930708';
        //$number = '918469000194'; // Change if needed
        $message = 'Inquiry from the website.';
        $whatsappUrl = "https://api.whatsapp.com/send/?phone={$number}&text=" . urlencode($message);
    
        return redirect()->away($whatsappUrl);
    }
  
}