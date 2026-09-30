<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\CategoryController;
use App\Models\Product;
use App\Models\Category;    
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('created_at', 'desc')->where('is_delete', '0')->paginate(15);
        return view('admin.products.productlisting', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        //dd($category);
        return view('admin.products.addproduct',compact('category'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'product_description' => 'required',
            'product_color' => 'required',
            'features' => 'required',
            'technical_details' => 'required',
            'product_image' => 'required',
            'producturl' => 'required',
        ], [
                'product_name.required' => 'Please enter the product name.',
                'product_code.required' => 'Please enter the product code.',
                'producturl.required' => 'Please enter the product Url.',
                'product_description.required' => 'Please enter the product description.',
                'product_color.required' => 'Please enter the product color.',
                'features.required' => 'The features must be an png or jpeg file.',
                'technical_details.required' => 'Please Enter technical details.',
                'product_image.image' => 'The product image must be an png or jpeg file.',
            ]);
        $post = new Product;
        $post->category_id = $request->get('category_id');
        $post->product_name = $request->get('product_name');
        $post->product_code = $request->get('product_code');
        $post->product_description = $request->get('product_description');
        $post->product_shortdescription = $request->get('product_shortdescription');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->product_color = implode(',', $request->product_color);
        $post->features = $request->get('features');
        $post->producturl = $request->get('producturl');

        $post->is_popular = $request->is_popular ? '1' : '0';
      

       $post->technical_details = $request->get('technical_details');

        if ($request->hasFile('product_image')) {
            $files = $request->file('product_image');
            $upload_images = [];
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/Product_Images');
                $file->move($path, $filename);
                $upload_images[] = $filename;
            }
            $post->product_image = implode(',', $upload_images);
        }        
        // dd($post);
        $post->save();
        return redirect('/admin/product')->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $data = Product::find($id);
        $values = explode(',', $data->product_color);
        return view('admin.products.editproduct', compact('data','category'))->with('values', $values);
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
        $post = Product::find($id);
        $post->category_id = $request->get('category_id');
        $post->product_name = $request->get('product_name');
        $post->product_code = $request->get('product_code');
        $post->product_description = $request->get('product_description');
        $post->product_shortdescription = $request->get('product_shortdescription');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->technical_details = $request->get('technical_details');
        $post->product_color = implode(',',$request->product_color);
        $post->features = $request->get('features');
        $post->producturl = $request->get('producturl');
        $post->is_popular = $request->is_popular ? '1' : '0';
    
        if ($request->hasFile('product_image')) {
            $files = $request->file('product_image');
            $upload_images = [];
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/Product_Images');
                $file->move($path, $filename);
                $upload_images[] = $filename;
            }
            $post->product_image = implode(',', $upload_images);
        }
       // dd($post);
        $post->update();
        return redirect('/admin/product')->with('success', 'Product Updated Successfully');

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
       $data = Product::find($id);
       $data->is_delete = '1';
       //dd($data);
       $data->update();
       
       return redirect()->back()->with('success', 'Your product has been Deleted successfully!');
      
    }

}
