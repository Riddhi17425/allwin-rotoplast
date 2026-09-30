<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Socialmedia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SocialMediaController extends Controller
{

    public function index(){
        $data =  DB::table('socialmedia')->where('is_delete','0')->paginate(15);
        return view('admin.socialmedia.socialmedialist',compact('data'));
    }

    public function addsocialmedia()
    {
        return view('admin.socialmedia.addsocialmedia');
    }

    public function insertsocialmedia(Request $request){
        $validatedData = $request->validate(
            [
                'socialname' => 'required',
                'link' => 'required',
            ],
            [
                'socialname.required' => 'Please enter a social media name.',
                'link.required' => 'Please enter link for social media.',
            ]
        );
        $payload = ['socialname' => $request->socialname, 'link' =>$request->link];
        DB::table('socialmedia')->insert($payload);
        return redirect('admin/socialmedia')->with('success', 'Your Social Media Link has been added successfully!');;
    }


    public function deletesocialmedia($id){
        $post = Socialmedia::find($id);
        $post->is_delete = '1';
        $post->update();
        return redirect()->back()->with('success', 'Your News has been Deleted successfully!');
    }

    public function editsocialmedia($id){
        $data =  Socialmedia::where('id',$id)->where('is_delete','0')->first();
        return view('admin.socialmedia.editsocialmedia',compact('data'));
    }
   
    
    public function updatesocialmedia(Request $request){
        $validatedData = $request->validate(
            [
                'socialname' => 'required',
                'link' => 'required',
            ],
            [
                'socialname.required' => 'Please enter a social media name.',
                'link.required' => 'Please enter link for social media.',
            ]
        );
        $payload = ['socialname' => $request->socialname, 'link' =>$request->link];
        DB::table('socialmedia')->where('id',$request->id)->update($payload);
        return redirect('admin/socialmedia')->with('success', 'Social Media Link has been Updated successfully!');
    }
}
