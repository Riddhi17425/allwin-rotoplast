<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class videoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $video = Video::orderBy('created_at','desc')->where('is_delete', '1')->paginate(15);
        return view('admin.videos.displayvideos', compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.video');
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
        if ($request->radio1 == 'youtube') {
            $validatedData = $request->validate(
                [
                    'video_title' => 'required',
                    'youtube_video_link' => 'url',
                ],
                [
                    'video_title.required' => 'Please enter a title for your video.',
                    'youtube_video_link.url' => 'Please enter a valid YouTube video link.',
                ]
            );
        } elseif($request->radio1 == 'upload') {
            $validatedData = $request->validate(
                [
                    'video_title' => 'required',
                    'upload_video' => 'mimes:mp4,mov,avi',
                ],
                [
                    'video_title.required' => 'Please enter a title for your video.',
                    'upload_video.mimes' => 'Please upload a video file in MP4, MOV, or AVI format.',
                ]
            );
        }

        $post = new Video;
        $post->video_title = $request['video_title'];
        $post->youtube_video_link = $request['youtube_video_link'];

        if ($request->hasFile('upload_video')) {
            $file = $request->file('upload_video');
            $filename = $file->getClientOriginalName();
            $path = public_path('/uploaded video');
            $file->move($path, $filename);
            $post->upload_video = $filename;
        }

        $post->save();
        return redirect('/admin/displayvideo')->with('success', 'Video Added Successfully');
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
        $data = Video::find($id);
        return view('admin.videos.editvideo', compact('data'));
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
        if ($request->youtube_video_link == '') {
            $validatedData = $request->validate(
                [
                    'video_title' => 'required',
                    'youtube_video_link' => 'url',
                ],
                [
                    'video_title.required' => 'Please enter a title for your video.',
                    'youtube_video_link.url' => 'Please enter a valid YouTube video link.',
                ]
            );
        } else {
            $validatedData = $request->validate(
                [
                    'video_title' => 'required',
                    'upload_video' => 'mimes:mp4,mov,avi|max:2048',
                ],
                [
                    'video_title.required' => 'Please enter a title for your video.',
                    'upload_video.mimes' => 'Please upload a video file in MP4, MOV, or AVI format.',
                ]
            );
        }

        $post = Video::find($id);
        $post->video_title = $request->get('video_title');
        $post->youtube_video_link = $request->get('youtube_video_link');

        if ($request->hasFile('upload_video')) {
            $file = $request->file('upload_video');
            $filename = $file->getClientOriginalName();
            $path = public_path('/uploaded video');
            $file->move($path, $filename);
            $post->upload_video = $filename;
        }
        $post->update();
        return redirect('/admin/displayvideo')->with('success', 'Video Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delet = Video::find($id);
        $delet->is_delete = '0';
        $delet->update();
        return redirect('/admin/displayvideo')->with('success', 'Video Deleted Successfully');
    }
}
