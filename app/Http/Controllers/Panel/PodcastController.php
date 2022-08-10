<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Podcast;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PodcastController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Podcast::all()->sortByDesc();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dump(1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $title = $request->input('title');


        $description = $request->input('description');


        $published = $request->input('published');


        $season = $request->input('season');


        $episode = $request->input('episode');


        $rss = $request->input('rss', 'Pending');


        $filename = Str::snake($request->input('title') . '_title');


        $path = $request->file('uploadFile')->storeAs('public/assets', Str::snake($request->input('title') . '_title' . '.jpg'));


        $pending = $request->boolean('draft');


        $podcast = Podcast::create([
            'title' => $title,
            'description' => $description,
            'published' => $published,
            'season' => $season,
            'episode' => $episode,
            'rss' => $rss ?? 'Pending',
            'thumbnail' => $filename
        ]);

        $image = Image::create([
            'filename' => $filename
        ]);

        $image->podcast()->associate($podcast);
        $image->save();

        return redirect(route('panel'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function show(Podcast $podcast)
    {
        return view('panel.edit')->with(['podcast' => $podcast]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function edit(Podcast $podcast)
    {
        return view('panel.edit')->with(['podcast' => $podcast]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Podcast $podcast)
    {



        // $path = $request->file('uploadFile')[1]->store('public/assets');
        if ($request->hasFile('uploadFile'))
        {
            foreach($request->file('uploadFile') as $file)
            {

                $path = $file->storeAs('public/assets', $file->getClientOriginalName());

                // Save as Image
                $image = Image::create([
                    'filename' => $file->getClientOriginalName()
                ]);


                // Associate with podcast
                $image->podcast()->associate($podcast);
                $image->save();
            }
        }

        if ($request->has('description'))
        {
            $podcast->description = $request->input('description');
            $podcast->save();
        }

        // dump($request->files('uploadFile')->store('public/assets'));

        // associate with podcast
        return redirect(route('podcasts.edit', $podcast->id));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Podcast $podcast)
    {
        //
    }

    /**
     * Update the resource's associated image
     *
     * @param \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function updateImage(Request $request, Image $image)
    {

    }

    /**
     * Store a newly created image resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request, Podcast $podcast)
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


}
