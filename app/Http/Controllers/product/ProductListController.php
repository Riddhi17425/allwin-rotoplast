<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Certificate; 
use App\Models\ApplicationProduct;
use Illuminate\Support\Facades\DB;

class ProductListController extends Controller
{
    public function index()
    {
        $data = Product::all();
        $images = [];
        $datas =  DB::table('application_products')->orderBy('id', 'desc')->select('id','name','image')->get();
     # dd($datas);
        return view('front.productlist',compact('data','datas')); 

    }

    public function categoryproductlist($id){
        $data = Product::where('category_id',$id)->get();
        $datas=  DB::table('application_products')->orderBy('id', 'desc')->limit(5)->select('id','name','image')->get();
        return view('front.productlist',compact('data','datas')); 
    }

    public function poductdetail($id){
        $data = Product::where('id',$id)->first();
        $data['cert'] = Certificate::all();
        $data['other'] = Product::where('category_id','!=',$data->category_id)->limit(5)->get();
        return view('front.productfront',compact('data')); 
    }
  
    public function productprice(request $request){
        $payoad = ['name'=>$request->name,'product_name'=>$request->product_name,'email'=>$request->email, 'phone'=>$request->phone,'country'=>$request->country,'requirment'=>$request->requirment];
        DB::table('productprice')->insert($payoad);

        return response()->json([
            'success' => true,
            'message' => 'We Recived Request Our Team will Contact You Soon.'
        ]);
    }
}
