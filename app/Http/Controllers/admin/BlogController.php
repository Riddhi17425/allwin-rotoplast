<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data =  Blog::orderBy('created_at','desc')->where('is_delete','0')->paginate(15);
        return view('admin.blog.bloglisting',compact('data'));
    }

    public function addblog()
    {
        return view('admin.blog.addblog');
    }

    protected function uploadImage($file)
    {
        $imageName = time() . '_' . uniqid() . '.' . $file->extension();
        $file->move(public_path('/images'), $imageName);

        return $imageName;
    }
 
    public function insertblog(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'conclusion' => 'nullable',
            'url' => 'required|string|max:255',
            'publish_date' => 'required',
            'short_description' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'status' => 'required|in:Active,InActive', 
            'blogimage' => 'nullable|image',
            'blogimage_front' => 'nullable|image',
            'cta_image' => 'nullable|image',
        ]);

        $payload = [
            'title' => $request->title,
            'description' => $request->description,
            'conclusion' => $request->conclusion,
            'url' => $request->url,
            'publish_date' => date('Y-m-d', strtotime($request->publish_date)),
            'is_delete' => 0,
            'status' => $request->status ?? 'Active',
            'short_description' => $request->short_description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ];

        if (isset($request->blogimage) && !empty($request->blogimage)) {
            $payload['image'] = $this->uploadImage($request->blogimage);
        }
        if (isset($request->blogimage_front) && !empty($request->blogimage_front)) {
            $payload['front_image'] = $this->uploadImage($request->blogimage_front);
        }

        if (isset($request->cta_image) && !empty($request->cta_image)) {
            $payload['cta_image'] = $this->uploadImage($request->cta_image);
        }

        DB::table('blog')->insert($payload);
        return redirect('admin/blog')->with('success', 'Your Blog has been added successfully!');;
    }

    public function deleteblog($id){
        $post = Blog::find($id);
        $post->is_delete = '1';
        $post->update();
        return redirect()->back()->with('success', 'Your Blog has been Deleted successfully!');
    }

    public function editblog($id){
        $data =  Blog::where('id',$id)->where('is_delete','0')->first();
        return view('admin.blog.editblog',compact('data'));
    }

    public function updateblog(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'conclusion' => 'nullable',
            'url' => 'required|string|max:255',
            'publish_date' => 'required',
            'short_description' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'status' => 'required|in:Active,InActive',
            'blogimage' => 'nullable|image',
            'blogimage_front' => 'nullable|image',
            'cta_image' => 'nullable|image',
        ]);

        $payload = [
            'title' => $request->title,
            'description' => $request->description,
            'conclusion' => $request->conclusion,
            'url' => $request->url,
            'publish_date' => date('Y-m-d', strtotime($request->publish_date)),
            'is_delete' => 0,
            'status' => $request->status ?? 'Active',
            'short_description' => $request->short_description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ];

        if (isset($request->blogimage) && !empty($request->blogimage)) {
            $payload['image'] = $this->uploadImage($request->blogimage);
        }
        if (isset($request->blogimage_front) && !empty($request->blogimage_front)) {
            $payload['front_image'] = $this->uploadImage($request->blogimage_front);
        }   
        if (isset($request->cta_image) && !empty($request->cta_image)) {
            $payload['cta_image'] = $this->uploadImage($request->cta_image);
        }

        DB::table('blog')->where('id',$request->id)->update($payload);
        
        return redirect('admin/blog')->with('success', 'Your Blog has been Updated successfully!');
    }

}
