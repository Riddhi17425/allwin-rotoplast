<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distributor;
use DB;
class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributor = Distributor::orderBy('created_at', 'desc')->where('type','distributor')->paginate(15);
        return view('admin.distributor.distributorlistng',compact('distributor'));
    }
    public function ventureforproduct()
    {
        $distributor = Distributor::orderBy('created_at', 'desc')->where('type','venture')->paginate(15);
        return view('admin.venture.venturelistng',compact('distributor'));
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

    public function searchinquirylistdist(Request $request){
$distributor = DB::table('distributor')
    ->where(function ($query) use ($request) {
        $s = $request->s;
        if ($s) {
            $query->where('type', 'distributor')
                ->where(function ($query) use ($s) {
                    $query->where('name', 'LIKE', '%' . $s . '%')
                        ->orWhere('email', 'LIKE', '%' . $s . '%')
                        ->orWhere('phone', 'LIKE', '%' . $s . '%')
                        ->orWhere('country', 'LIKE', '%' . $s . '%')
                        ->orWhere('requirment', 'LIKE', '%' . $s . '%');
                });
        } else {
            $query->where('type', 'distributor');
        }
    })
    ->whereNotNull('name')
    ->paginate(10);
        return view('admin.distributor.distributorlistng',compact('distributor'));
    }
    
    public function searchinquirylistvent(Request $request){
$distributor = DB::table('distributor')
    ->where(function ($query) use ($request) {
        $s = $request->s;
        if ($s) {
            $query->where('type', 'venture')
                ->where(function ($query) use ($s) {
                    $query->where('name', 'LIKE', '%' . $s . '%')
                        ->orWhere('email', 'LIKE', '%' . $s . '%')
                        ->orWhere('phone', 'LIKE', '%' . $s . '%')
                        ->orWhere('country', 'LIKE', '%' . $s . '%')
                        ->orWhere('requirment', 'LIKE', '%' . $s . '%');
                });
        } else {
            $query->where('type', 'venture');
        }
    })
    ->whereNotNull('name')
    ->paginate(10);
        return view('admin.venture.venturelistng',compact('distributor'));
    }
}
