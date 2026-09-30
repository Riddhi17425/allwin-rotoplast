<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoFrontController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $metatitle = "Allwin Roto Plast Videos ";
        $metadescription = "Explore our latest videos showcasing ice boxes, dustbins, insulated fish tubs, shipping boxes, pallets, and more at Allwin Roto Plast.";
        $data = Video::where('is_delete', '1')->get();
        return view('front.videos', compact('data', 'metatitle', 'metadescription'));
    }
}