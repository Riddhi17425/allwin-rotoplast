<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catalogue;
use DB;

class CatelogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $catelogue = catalogue::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.catelogue.cateloguelist',compact('catelogue'));
    
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

    public function searchcatelogue(Request $request){
        $catelogue = DB::table('catalogue')->where([
            ['full_name', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('full_name', 'LIKE', '%' . $s . '%')
                        ->orWhere('catalogueTitle', 'LIKE', '%' . $s . '%')
                        ->orWhere('email_address', 'LIKE', '%' . $s . '%')
                        ->orWhere('mob', 'LIKE', '%' . $s . '%')
                        ->orWhere('country_name', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->paginate(10);
        return view('admin.catelogue.cateloguelist',compact('catelogue'));
    }
}
