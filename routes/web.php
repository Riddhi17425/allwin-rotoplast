<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\inqueryheaderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\ApplicationProductController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProductFrontController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\superAdminController;
use App\Http\Controllers\VideoFrontController;
use App\Models\application_product;
use App\Models\Product;
use App\Models\Certificate;
use App\Models\productprice;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\certificateController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\ourclientsController;
use App\Http\Controllers\admin\videoController;
use App\Http\Controllers\admin\whatourclientsaysController;
use App\Http\Controllers\admin\CmsController;
use App\Http\Controllers\admin\InquiryController;
use App\Http\Controllers\admin\DistributorController;
use App\Http\Controllers\admin\CatelogueController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\ProductPriceListingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    //Front route
    Route::get('/', [dashboardController::class, 'index']);
    Route::get('/case-studies', [dashboardController::class, 'casestudy'])->name('case-studies');
    Route::get('/contact-us', [dashboardController::class, 'contactus'])->name('contact-us');
    Route::get('/custom-rotational-moulding', [dashboardController::class, 'customrotational'])->name('custom-rotational-moulding');
    Route::get('/uk/insulated-fish-tubs', [dashboardController::class, 'fishtabuk'])->name('fish-tab-uk');
      Route::get('/uk/insulated-ice-boxes', [dashboardController::class, 'insulated_fish_tubs'])->name('insulated-ice-boxes');
    Route::get('/uk/plastic-pallets-supplier', [dashboardController::class, 'plastic_pallets_supplier'])->name('plastic-pallets-supplier');
    Route::get('/about-us', [dashboardController::class, 'aboutus'])->name('about-us');

    Route::get('login', [dashboardController::class, 'login'])->name('login');
   
    //blog 
    Route::get('/blog',[dashboardController::class,'blog'])->name('blog');
    Route::get('/blog/{id}', [dashboardController::class, 'blogdetail'])->name('blogdetail');

    //case study
    Route::get('/case-studies', [dashboardController::class, 'casestudy'])->name('case-studies');
    
    Route::post('/whatsaapinquiry', [dashboardController::class, 'whatsaapinquiry'])->name('whatsaapinquiry');
    //download catelogue and category
    Route::get('/download', [dashboardController::class, 'download'])->name('download');
Route::get('/thank-you', [dashboardController::class, 'thankyou'])->name('thank-you');
    //video
    Route::get('/gallary-videos', [VideoFrontController::class, 'index'])->name('gallary-videos');

    //product 
    Route::get('/productlist',[ProductListController::class,'index'])->name('productlist');
    Route::get('productshow/{id}', [ProductFrontController::class, 'show'])->name('productshow');
    Route::get('/productfront',[ProductFrontController::class,'index'])->name('productfront');


//     Route::get('poduct-detail-pallet/{id}', [ProductListController::class, 'poductdetailpallet'])->name('poduct-detail-pallet');
//     Route::get('product-details-pallet/{id}', [ProductListController::class, 'poductdetailspallet'])->name('product-details-pallet');
    // Route::get('poduct-list/{title}',[ProductListController::class,'categoryproductlist'])->name('poduct-list');
Route::get('product-list/{title}',[ProductListController::class,'categoryproductlist'])->name('poduct-list');

    //footer inquiry
    Route::post('/submitenquiry', [dashboardController::class, 'submitenquiry'])->name('submitenquiry');
    //product price inquiry
    Route::post('/submitproductprice',[ProductListController::class,'productprice'])->name('submitproductprice');
    //distributor Quote inquiry
    Route::get('/distributor',[dashboardController::class,'distributor'])->name('distributor');
    Route::get('/jointventure',[dashboardController::class,'jointventure'])->name('jointventure');
    Route::post('/distributorstore',[dashboardController::class,'distributorstore'])->name('distributorstore');
    //quote header inquiry
    Route::get('/inquiryqoute',[dashboardController::class,'inquiryqoute'])->name('inquiryqoute');
    Route::post('/inquiryqoutestore',[dashboardController::class,'inquiryqoutestore'])->name('inquiryqoutestore');
    //catelogue inquiry
    Route::post('/cataloguestore', [dashboardController::class, 'cataloguestore'])->name('cataloguestore');
    // Route::post('/testmail', [dashboardController::class, 'testmail'])->name('testmail');
    Route::get('/getProductsByCategory/{categoryId}', [ProductListController::class, 'getProductsByCategory']);
    Route::get('/getAllProducts', [ProductListController::class, 'getAllProducts']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', [usersController::class, 'user'])->name('user');
 Route::get('/admin/dashboard',[dashboardController::class, 'admin'])->name('/admin/dashboard');

    //video route
    Route::get('/admin/displayvideo', [videoController::class, 'index'])->name('admin/displayvideo');
    Route::get('/admin/addvideo', [videoController::class, 'create'])->name('admin/addvideo');
    Route::post('/admin/storevideo', [videoController::class, 'store'])->name('admin/storevideo');
    Route::get('/admin/editVideo/{id}', [videoController::class, 'edit'])->name('admin/editVideo');
    Route::post('/admin/updatevideo', [videoController::class, 'update'])->name('admin/updatevideo');
    Route::get('/admin/deletevideo/{id}', [videoController::class, 'destroy'])->name('admin/deletevideo');

    //our clients route
    Route::get('/admin/displayourclient', [ourclientsController::class, 'index'])->name('admin/displayourclient');
    Route::get('/admin/ourclients', [ourclientsController::class, 'create'])->name('admin/ourclients');
    Route::post('/admin/storeclientlogo', [ourclientsController::class, 'store'])->name('admin/storeclientlogo');
    Route::get('/admin/editclientlogo/{id}', [ourclientsController::class, 'edit'])->name('admin/editclientlogo');
    Route::post('/admin/updateclientlogo', [ourclientsController::class, 'update'])->name('admin/updateclientlogo');
    Route::get('/admin/deletelogo/{id}', [ourclientsController::class, 'destroy'])->name('admin/deletelogo');

    //blog route
    Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin/blog');
    Route::get('/admin/addblog', [BlogController::class, 'addblog'])->name('admin/addblog');
    Route::post('/admin/insertblog', [BlogController::class, 'insertblog'])->name('admin/insertblog');
    Route::get('/admin/deleteblog/{id}', [BlogController::class, 'deleteblog'])->name('admin/deleteblog');
    Route::get('/admin/editblog/{id}', [BlogController::class, 'editblog'])->name('admin/editblog/{id}');
    Route::post('/admin/updateblog', [BlogController::class, 'updateblog'])->name('admin/updateblog');


//faq route
    Route::get('/admin/faq', [FaqController::class, 'index'])->name('admin/faq');
    Route::get('/admin/addfaq', [FaqController::class, 'addfaq'])->name('admin/addfaq');
    Route::post('/admin/insertfaq', [FaqController::class, 'insertfaq'])->name('admin/insertfaq');
    Route::get('/admin/deletefaq/{id}', [FaqController::class, 'deletefaq'])->name('admin/deletefaq');
    Route::get('/admin/editfaq/{id}', [FaqController::class, 'editfaq'])->name('admin/editfaq/{id}');
    Route::post('/admin/updatefaq', [FaqController::class, 'updatefaq'])->name('admin/updatefaq');
    
    //what our client says route
    Route::get('/admin/whatourclientsay', [whatourclientsaysController::class, 'index'])->name('admin/whatourclientsay');
    Route::get('/admin/addwhatourclientsay', [whatourclientsaysController::class, 'create'])->name('admin/addwhatourclientsay');
    Route::post('/admin/storewhatourclientsays', [whatourclientsaysController::class, 'store'])->name('admin/storewhatourclientsays');
    Route::get('/admin/editwhatourclientsay/{id}', [whatourclientsaysController::class, 'edit'])->name('admin/editwhatourclientsay');
    Route::post('/admin/updatewhatourclientsays', [whatourclientsaysController::class, 'update'])->name('admin/updatewhatourclientsays');
    Route::get('/admin/deletewhatourclientsays/{id}', [whatourclientsaysController::class, 'destroy'])->name('admin/deletewhatourclientsays');

    //certificate route
    Route::get('/admin/certificate', [certificateController::class, 'index'])->name('admin/certificate');
    Route::get('/admin/addcertificate', [certificateController::class, 'create'])->name('admin/addcertificate');
    Route::post('/admin/storecertificate', [certificateController::class, 'store'])->name('admin/storecertificate');
    Route::get('/admin/editcertificate/{id}', [certificateController::class, 'edit'])->name('admin/editcertificate');
    Route::post('/admin/updatecertificate{id}', [certificateController::class, 'update'])->name('admin/updatecertificate');
    Route::get('/admin/deletecertificate/{id}', [certificateController::class, 'destroy'])->name('admin/deletecertificate');


    //socialmedai links 
    Route::get('/admin/socialmedia', [SocialMediaController::class, 'index'])->name('admin/socialmedia');
    Route::get('/admin/addsocialmedia', [SocialMediaController::class, 'addsocialmedia'])->name('admin/addsocialmedia');
    Route::post('/admin/insertsocialmedia', [SocialMediaController::class, 'insertsocialmedia'])->name('admin/insertsocialmedia');
    Route::get('/admin/deletesocialmedia/{id}', [SocialMediaController::class, 'deletesocialmedia'])->name('admin/deletesocialmedia');
    Route::get('/admin/editsocialmedia/{id}', [SocialMediaController::class, 'editsocialmedia'])->name('admin/editsocialmedia/{id}');
    Route::post('admin/updatesocialmedia', [SocialMediaController::class, 'updatesocialmedia'])->name('admin/updatesocialmedia');

    Route::get('/admin/dashboard', [adminController::class, 'admin'])->name('admin/dashboard');
    Route::get('/superAdmin', [superAdminController::class, 'superAdmin'])->name('superAdmin');

    //cms pages content
    Route::get('/admin/cms', [CmsController::class, 'index'])->name('admin/cms');
    Route::get('/admin/addcms', [CmsController::class, 'addcms'])->name('admin/addcms');
    Route::post('/admin/insertcms', [CmsController::class, 'insertcms'])->name('admin/insertcms');
    Route::get('/admin/editcms/{id}', [CmsController::class, 'editcms'])->name('admin/editcms/{id}');
    Route::post('admin/updatecms', [CmsController::class, 'updatecms'])->name('admin/updatecms');

    //product route
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin/product');
    Route::get('/admin/addproduct', [ProductController::class, 'create'])->name('admin/addproduct');
    Route::post('/admin/storeproduct', [ProductController::class, 'store'])->name('admin/storeproduct');
    Route::get('/admin/editproduct/{id}', [ProductController::class, 'edit'])->name('admin/editproduct');
    Route::post('/admin/updateproduct/{id}', [ProductController::class, 'update'])->name('admin/updateproduct');
    Route::get('/admin/deleteproduct/{id}', [ProductController::class, 'destroy'])->name('admin/deleteproduct');
    // Route::get('/admin/popular',[ProductController::class,'popular'])->name('admin/popular');


    //category route
    Route::get('/admin/category',[CategoryController::class,'index'])->name('admin/category');
    Route::get('/admin/addcategory', [CategoryController::class, 'create'])->name('admin/addcategory');
    Route::post('/admin/storecategory', [CategoryController::class, 'store'])->name('admin/storecategory');
    Route::get('/admin/editcategory/{id}', [CategoryController::class, 'edit'])->name('admin/editcategory');
    Route::post('/admin/updatecategory{id}', [CategoryController::class, 'update'])->name('admin/updatecategory');
    Route::get('admin/deletecategories/{id}', [CategoryController::class, 'destroy'])->name('admin/deletecategories');
    
    //application controller
    Route::get('/admin/productapp',[ApplicationProductController::class,'index'])->name('admin/productapp');
    // Route::get('/admin/addcategory', [ApplicationProductController::class, 'create'])->name('admin/productcreate');
    Route::get('/admin/addapplication', [ApplicationProductController::class, 'create'])->name('admin/productcreate');

    Route::post('/admin/storeproductapp', [ApplicationProductController::class, 'store'])->name('admin/storeproductapp');
    Route::get('/admin/editapp/{id}', [ApplicationProductController::class, 'edit'])->name('admin/editapp');
    Route::post('/admin/updateapp{id}', [ApplicationProductController::class, 'update'])->name('admin/updateapp');
    Route::get('admin/deleteapp/{id}', [ApplicationProductController::class, 'destroy'])->name('admin/deleteapp');

     //case Study
    Route::get('/admin/casestudy',[CaseStudyController::class,'index'])->name('admin/casestudy');
    Route::get('/admin/addcasestudy', [CaseStudyController::class, 'create'])->name('admin/addcasestudy');
    Route::post('/admin/storecasestudy',[CaseStudyController::class,'store'])->name('admin/storecasestudy');
    Route::get('/admin/editcasestudy/{id}', [CaseStudyController::class, 'edit'])->name('admin/editcasestudy');
    Route::post('/admin/updatecasestudy{id}', [CaseStudyController::class, 'update'])->name('admin/updatecasestudy');
    Route::get('admin/deletecasestudy/{id}', [CaseStudyController::class, 'destroy'])->name('admin/deletecasestudy');
    

    //price Inquiry
    Route::get('/admin/productpricelist',[ProductPriceListingController::class,'index'])->name('admin/productpricelist');
    Route::get('/admin/searchinquirylist', [ProductPriceListingController::class, 'searchinquirylist'])->name('admin/searchinquirylist');

    //Quote Inquiry 
    Route::get('/admin/qouteinquiry',[InquiryController::class,'index'])->name('admin/qouteinquiry');
    Route::get('/admin/searchinquirylist', [InquiryController::class, 'searchinquirylist'])->name('admin/searchinquirylist');
    
   //distributor
    Route::get('admin/distributor',[DistributorController::class,'index'])->name('admin/distributor');
    Route::get('admin/venture',[DistributorController::class,'ventureforproduct'])->name('admin/venture');
    Route::get('/admin/searchinquirylistdist', [DistributorController::class, 'searchinquirylistdist'])->name('admin/searchinquirylistdist');
    Route::get('/admin/searchinquirylistvent', [DistributorController::class, 'searchinquirylistvent'])->name('admin/searchinquirylistvent');

    //inqueryheader
    Route::get('admin/inquiryheader',[inqueryheaderController::class,'index'])->name('admin/inquiryheader');
    Route::get('/admin/searchinquiryhead', [inqueryheaderController::class, 'searchinquiryhead'])->name('admin/searchinquiryhead');

    //Catelogue
    Route::get('admin/Catelogue',[CatelogueController::class,'index'])->name('admin/Catelogue');
    Route::get('/admin/searchcatelogue', [CatelogueController::class, 'searchcatelogue'])->name('admin/searchcatelogue');

});
Route::get('{title}/{name}', [ProductListController::class, 'poductdetail'])->name('poduct-detail');