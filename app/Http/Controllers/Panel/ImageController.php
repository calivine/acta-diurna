<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Image;
use App\Podcast;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Podcast $podcast)
    {
        dump($podcast);
        dump($request->file('uploadFile'));
        dump($request->input('caption'));

        $file = $request->file('uploadFile')[0];
        // Save as Image
        $path = $request->file('uploadFile')[0]->storeAs('public/assets', $request->input('filename') . '.jpg');
        $image = Image::create([
            'filename' => $request->input('filename'),
            'caption' => $request->input('caption')
        ]);
        /*
        $filename = Str::snake($request->input('title') . '_title');
        $path = $request->file('uploadFile')->storeAs('public/assets', Str::snake($request->input('title') . '_title' . '.jpg'));
        $image = Image::create([
            'filename' => $filename
        ]);
        */
        # Associate the new image with the podcast.
        $image->podcast()->associate($podcast);
        $image->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {

        if ($request->has('caption'))
        {
            dump($request->input('caption'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
