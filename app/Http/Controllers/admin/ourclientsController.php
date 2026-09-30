<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OurClients;
use Illuminate\Http\Request;

class ourclientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = OurClients::orderBy('created_at', 'desc')->where('is_delete', '1')->paginate(15);
        return view('admin.our_clients.displayourclients', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.our_clients.ourclients');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_name' => 'required',
            'client_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
                'client_name.required' => 'Please enter the client name.',
                'client_logo.required' => 'Please enter the client name.',
                'client_logo.image' => 'The client logo must be an image file.',
                'client_logo.mimes' => 'The client logo must be a file of type: jpeg, png, jpg, gif.',
                'client_logo.max' => 'The client logo size should not exceed 2MB.',
            ]);

        $post = new OurClients;
        $post->client_name = $request->get('client_name');

        if ($request->hasFile('client_logo')) {
            $file = $request->file('client_logo');
            $filename = uniqid() . '.png';
            $path = public_path('/ClientLogo');
            $file->move($path, $filename);
            $post->client_logo = $filename;
        }
        $post->save();

        return redirect('admin/displayourclient')->with('success', 'Client Added Successfully');
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
        $logo = OurClients::find($id);
        return view('admin.our_clients.editourclients', compact('logo'));
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
        $validatedData = $request->validate([
            'client_name' => 'required',
            'client_logo' => 'required|image',
        ], [
                'client_name.required' => 'Please enter the client name.',
                'client_logo.required' => 'Please enter the client logo.',
                'client_logo.image' => 'The client logo must be an image file.',
            ]);

        $post = OurClients::find($id);
        $post->client_name = $request->get('client_name');

        if ($request->hasFile('client_logo')) {
            $file = $request->file('client_logo');
            $filename = uniqid() . '.png';
            $path = public_path('/ClientLogo');
            $file->move($path, $filename);
            $post->client_logo = $filename;
        }

        $post->update();

        return redirect('admin/displayourclient')->with('success', 'Client Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delet = OurClients::find($id);
        $delet->is_delete = '0';
        $delet->update();
        return redirect('/admin/displayourclient')->with('success', 'Client Deleted Successfully');
    }
}

