<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\whatourclientsays;
use Illuminate\Http\Request;

class whatourclientsaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientsay = whatourclientsays::orderBy('created_at','desc')->where('is_delete', '1')->paginate(15);
        return view('admin.what_our_client_says.listingwhatourclientsays', compact('clientsay'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.what_our_client_says.whatourclientsays');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'client_name' => 'required',
                'client_company_name' => 'required',
                'description' => 'required',
            ],
            [
                'client_name.required' => 'Please enter the client name.',
                'client_company_name.required' => 'Please enter the client company name.',
                'description.required' => 'Please enter the description.',
            ]
        );
        $post = new whatourclientsays;
        $post->client_name = $request->get('client_name');
        $post->client_company_name = $request->get('client_company_name');
        $post->description = $request->get('description');
        $post->save();
        return redirect('/admin/whatourclientsay')->with('success', 'What Our Client Says Added successfully');
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
        $clientsays = whatourclientsays::find($id);
        return view('admin.what_our_client_says.editwhatourclientsays',compact('clientsays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $validatedData = $request->validate(
            [
                'client_name' => 'required',
                'client_company_name' => 'required',
                'description' => 'required',
            ],
            [
                'client_name.required' => 'Please enter the client name.',
                'client_company_name.required' => 'Please enter the client company name.',
                'description.required' => 'Please enter the description.',
            ]
        );
        $post = whatourclientsays::find($id);
        $post->client_name = $request->get('client_name');
        $post->client_company_name = $request->get('client_company_name');
        $post->description = $request->get('description');
        $post->update();
        return redirect('/admin/whatourclientsay')->with('success', 'What Our Client Says Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delet = whatourclientsays::find($id);
        $delet->is_delete = '0';
        $delet->update();
        return redirect('/admin/whatourclientsay')->with('success', 'What Our Client Says Deleted successfully');
    }
}