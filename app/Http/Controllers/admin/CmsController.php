<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Cms;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data =  Cms::get();
        return view('admin.cms.cmslisting',compact('data'));
    }

    public function addcms()
    {
        return view('admin.cms.addcms');
    }

    public function insertcms(Request $request){
        $validatedData = $request->validate(
            [
                'description' => 'required',
                'pagename' => 'required',
            ],
            [
                'description.required' => 'Please enter a description.',
                'pagename.required' => 'Please Enter PageName.',
            ]
        );
        
        $payload = ['description' => $request->description, 'pagename' =>$request->pagename, 'meta_title'=>$request->get('meta_title'), 'meta_description'=>$request->get('meta_description')];
        DB::table('cms')->insert($payload);
        return redirect('admin/cms')->with('success', 'Your Page has been added successfully!');;
    }

    public function editcms($id){
        $data =  Cms::where('id',$id)->first();
        return view('admin.cms.editcms',compact('data'));
    }

    public function updatecms(Request $request){
        $validatedData = $request->validate(
            [
                'description' => 'required',
            ],
            [
                'description.required' => 'Please enter a description.',
            ]
        );
      
        $payload = ['description' => $request->description, 'pagename' =>$request->pagename, 'meta_title'=>$request->get('meta_title'), 'meta_description'=>$request->get('meta_description')];
        DB::table('cms')->where('id',$request->id)->update($payload);
        
        return redirect('admin/cms')->with('success', 'Your Page Has Been Updated Successfully!');
    }
}
