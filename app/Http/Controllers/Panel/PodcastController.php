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
        //
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
        dump($request->file('uploadFile'));
        dump($request->input('title'));
        $title = $request->input('title');
        dump($request->input('description'));
        $description = $request->input('description');
        dump($request->input('published'));
        $published = $request->input('published');
        dump($request->input('season'));
        $season = $request->input('season');
        dump($request->input('episode'));
        $episode = $request->input('episode');
        dump($request->input('rss'));
        $rss = $request->input('rss');
        dump(Str::snake($request->input('title') . '_title'));
        $filename = Str::snake($request->input('title') . '_title');
        $path = $request->file('uploadFile')->storeAs('public/assets', Str::snake($request->input('title') . '_title' . '.jpg'));
        dump($path);

        $podcast = Podcast::create([
            'title' => $title,
            'description' => $description,
            'published' => $published,
            'season' => $season,
            'episode' => $episode,
            'rss' => $rss,
            'thumbnail' => $filename
        ]);

        $image = Image::create([
            'filename' => $filename
        ]);

        $image->podcast()->associate($podcast);
        $image->save();

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
}
