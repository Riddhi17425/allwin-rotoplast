<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = CaseStudy::orderBy('created_at', 'desc')->where('is_delete', '0')->paginate(15);
        return view('admin.casestudy.listingcase',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.casestudy.case');
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
        ], [
                'name.required' => 'Please enter the product name.',
            ]);
        $store = new CaseStudy;
        $store->name = $request->get('name');

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $upload_images = [];
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/caseimages');
                $file->move($path, $filename);
                $upload_images[] = $filename;
            }
            $store->image = implode(',', $upload_images);
        }    
       
        $store->save();
        return redirect('admin/casestudy')->with('success', 'Application Added Successfully');
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
        $data = CaseStudy::find($id);
        return view('admin.casestudy.editcase', compact('data'));
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
        $store = CaseStudy::find($id);
       
        $store->name = $request->get('name');
       

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $upload_images = [];
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/caseimages');
                $file->move($path, $filename);
                $upload_images[] = $filename;
            }
            $store->image = implode(',', $upload_images);
        }
        $store->update();
        return redirect('/admin/casestudy')->with('success', 'Category Updated Successfully');
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
        $data = CaseStudy::find($id);
        $data->is_delete = '1';
        $data->update();
        
        return redirect()->back()->with('success', 'Your case has been Deleted successfully!');
    }
}
