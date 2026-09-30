<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Http\Request;

class adminController extends Controller
{
        public function admin(){
             $productcount = Product::count(); 
        return view('admin.admin',compact('productcount'));
    }
}
