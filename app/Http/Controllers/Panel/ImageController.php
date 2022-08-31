<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Image;
use App\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Log;

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
     * Store a newly created image resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Podcast $podcast
     */
    public function store(Request $request, Podcast $podcast)
    {
        if ($request->header('Content-Range') !== null) {
            preg_match('/(\d+)-(\d+)\/(\d+)/', $request->header('Content-Range'), $output);

            $start = $output[1];
            $end = $output[2];
            /**
             * Matching groups:
             * 0: Full Match
             * 1: Chunk ID
             * 2: Filename
             * 3: File Type
             * 4: File Size
             */
            preg_match('/^(\d+):([a-zA-Z0-9_ -.&!@]+)-([A-Za-z0-9]+?\/[a-zA-Z0-9]{1,5})-([0-9]+)/', $request->header('Content-Disposition'), $output);

            $file_name = $output[2];
            $total_size = $output[4];
            $chunk_id = $output[1];
            $file_id = md5($file_name);

            // Remove file suffix
            $file_name = substr($file_name, 0, -4);

            // Temporary location for file chunks.
            $temp_loc = "tmp/{$file_id}/";

            // Calculate progress uploading total file.
            $progress = $total_size > 0 ? round(($end / $total_size) * 100) : 100;

            // If there is a file, save to 'app/public/tmp/{file_id}/'
            if ($request->hasFile('file')) {

                $request->file->storeAs($temp_loc, $chunk_id);
            }

            if ($end == $total_size) {
                // Remove prefix and/or suffix garbage and any special characters we don't want.

                $path_to_file = storage_path("app/public/assets/" . $file_id . '.jpg');

                for ($i = 0; $i <= $chunk_id; $i++) {
                    $path_to_chunk = storage_path("app/" . $temp_loc . $i);

                    // $path_to_chunk = Storage::url("{$temp_loc}{$i}");

                    write_chunks_to_file($path_to_chunk, $path_to_file);
                }
                // Delete temp directory
                try {
                    // rmdir(storage_path('app/' . $temp_loc));
                    Storage::deleteDirectory($temp_loc);
                } catch (Exception $e) {
                    Log::debug($e->getMessage());
                }

                $positions = $podcast->images->pluck('position');
                $max = $positions->max();

                if ($max == null) {
                    // set position to 1.
                    $position = 1;
                }
                else {
                    $position = $max + 1;
                }

                $image = Image::create([
                    'filename' => $file_id,
                    'position' => $position
                ]);

                # Associate the new image with the podcast.
                $image->podcast()->associate($podcast);
                $image->save();


                // $file_location, $thumb_location
                $status = 'complete';



            } else {
                $status = 'uploading';


            }

            return response()->json([
                'status' => $status,
                'progress' => $progress,
                'data' => $file_name,
                'file' => $file_id ?? 'Pending',
                'url' => asset("/storage/assets/" . $file_id . ".jpg")
            ]);


        }
        else {
            // Save as Image
            if ($request->input('filename') != null) {
                $path = $request->file('uploadFile')[0]->storeAs('public/assets', $request->input('filename') . '.jpg');

                $filename = $request->input('filename');
            } else {
                $filename = Str::random(24);
                $path = $request->file('uploadFile')[0]->storeAs('public/assets', $filename . '.jpg');
            }

            $positions = $podcast->images->pluck('position');
            $max = $positions->max();

            if ($max == null) {
                // set position to 1.
                $position = 1;
            }
            else {
                $position = $max + 1;
            }


            $image = Image::create([
                'filename' => $filename,
                'position' => $position
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
            return redirect()->route('podcasts.edit', $podcast->id);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Podcast $podcast
     * @param \App\Image $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Podcast $podcast, Image $image)
    {
        if ($request->has('caption')) {
            $image->caption = $request->input('caption');
            $image->save();
        }
        return redirect()->route('podcasts.edit', $podcast->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Image $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Image $image)
    {
        $pid = $image->podcast->id;
        Image::destroy($image->id);
        return redirect()->route('podcasts.edit', $pid)->with(['alert' => 'Image Deleted']);
    }

    public function setOrder() {
        // 155
        // 159
        $image1 = Image::find(156);
        $image2 = Image::find(159);
        $pid = $image1->podcast->id;
        $temp2 = $image2->id;
        $image2->id = 9999;
        $image2->save();
        $temp = $image1->id;
        $image1->id = $temp2;
        $image1->save();
        $image2->id = $temp;
        $image2->save();

        return redirect()->route('podcasts.edit', $pid)->with(['alert' => 'Image Order Updated']);

    }
}
