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
        $podcasts = Podcast::all()->sortByDesc('id');

        return view('content.podcast.directory')->with(['podcasts' => $podcasts]);

    }


    public function panelIndex()
    {
        $podcasts = Podcast::all()->sortByDesc('id');

        return view('panel.index')->with(['podcasts' => $podcasts]);
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
     * @return \Illuminate\Http\RedirectResponse
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

        return redirect()->route('panel')->with(['alert' => 'New Episode Added']);

        // return redirect(route('panel'))->with(['alert' => 'New Episode Added']);

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Podcast $podcast)
    {
        // $path = $request->file('uploadFile')[1]->store('public/assets');

        // Update the Thumbnail Image
        if ($request->hasFile('uploadFile'))
        {
            $file = $request->file('uploadFile');

            // $path = $file->storeAs('public/assets', $file->getClientOriginalName());

            // Delete Old Thumbnail
            $old_thumbnail = Image::where('filename', $podcast->thumbnail)->first();

            Image::destroy($old_thumbnail->id);

            $path = $file->storeAs('public/assets', Str::snake($podcast->title . '_title' . '.jpg'));
            // Save as Image
            $image = Image::create([
                'filename' => $podcast->thumbnail
            ]);

            // Associate with podcast
            $image->podcast()->associate($podcast);
            $image->save();
        }

        if ($request->has('description'))
        {
            $podcast->description = $request->input('description');
            $podcast->save();
        }

        // dump($request->files('uploadFile')->store('public/assets'));

        // associate with podcast
        return redirect()->route('podcasts.edit', $podcast->id);
        // return redirect(route('podcasts.edit', $podcast->id));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Podcast $podcast)
    {

        $image_ids = $podcast->images->pluck('id');

        Image::destroy($image_ids);
        Podcast::destroy($podcast->id);
        return redirect()->route('panel');
        // return redirect(route('podcasts.index'));
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
     * Set podcast resource to published (public)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publish(Request $request, Podcast $podcast): \Illuminate\Http\Response
    {
        $rss = $request->input('rss');
        $podcast->rss = $rss;
        $podcast->save();
        return redirect()->route('panel');
        // return redirect(route('panel'));
    }




}
