<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;  
use App\Models\ApplicationProduct;

class ApplicationProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ApplicationProduct::orderBy('created_at', 'desc')->where('is_delete', '0')->paginate(15);
        return view('admin.productapp.applisting',compact('data')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $category = Category::all();
        return view('admin.productapp.addproduct',compact('category'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required',
        ], [
                'name.required' => 'Please enter the product name.',
                'image.image' => 'The image must be an png or jpeg file.',
            ]);
        $store = new ApplicationProduct;
        $store->category_id= implode(',',$request->category_id);
        $store->name = $request->get('name');
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $upload_images = [];
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/appimage');
                $file->move($path, $filename);
                $upload_images[] = $filename;
            }
            $store->image = implode(',', $upload_images);
        } 
        $store->save();
        return redirect('admin/productapp')->with('success', 'Application Added Successfully');
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
        $data = ApplicationProduct::find($id);
        $category = Category::all();
        return view('admin.productapp.editapp', compact('data','category'));
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
        $store = ApplicationProduct::find($id);
        $store->name = $request->get('name');
        $store->category_id= implode(',',$request->category_id);
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $upload_images = [];
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/appimage');
                $file->move($path, $filename);
                $upload_images[] = $filename;
            }
            $store->image = implode(',', $upload_images);
        }
        $store->update();
        return redirect('/admin/productapp')->with('success', 'Category Updated Successfully');
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
        $data = ApplicationProduct::find($id);
        $data->is_delete = '1';
        $data->update();
        
        return redirect('/admin/productapp')->with('success', 'Your app product has been Deleted successfully!');
    }
}
