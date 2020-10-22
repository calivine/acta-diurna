<?php

namespace App\Http\Controllers;

use App\Events\FinishedUploadingChunks;
use App\Services\FFMpeg;
use App\Services\Formatter;
use App\Video;
use Exception;
use Illuminate\Http\Request;
use Log;
use Storage;
use URL;

class FileController extends Controller
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
        return view('content.media.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $GIF_PATH = storage_path('app/public/gifs/');
        $THUMBNAIL_PATH = storage_path('app/public/thumbnails/');
        $BUFFER_SIZE = 1024 * 1024; //

        preg_match('/(\d+)-(\d+)\/(\d+)/', $request->header('Content-Range'), $output);

        $start = $output[1];
        $end = $output[2];
        /**
         * Matching groups:
         * 0: Full Match
         * 1: Chunk ID
         * 2: File ID
         * 3: Filename
         * 4: File Type
         * 5: File Size
         */
        preg_match('/^(\d+):(\d+)-([a-zA-Z0-9_ -.]+)-([A-Za-z0-9]+?\/[a-zA-Z0-9]{1,5})-([0-9]+)/', $request->header('Content-Disposition'), $output);

        $file_name = $output[3];
        $total_size = $output[5];
        $chunk_id = $output[1];
        $file_id = $output[2];
        // Remove file suffix
        $file_name = substr($file_name, 0, -4);

        // Temporary location for file chunks.
        $temp_loc = "tmp/{$file_id}/";

        // Calculate progress uploading total file.
        $progress = $total_size > 0 ? round(($end / $total_size) * 100) : 100;

        // If there is a file, save to 'app/public/tmp/{file_id}/'
        if ($request->hasFile('file'))
        {
            $request->file->storeAs($temp_loc, $chunk_id);
        }

        // If we're on the last chunk of data, put them all together.
        if ($end == $total_size)
        {
            Log::channel('upload')->info($file_name);
            $file_nameT  = Formatter::format($file_name);
            Log::channel('upload')->info($file_nameT);
            $clean_filename = Formatter::clean($file_name);
            Log::channel('upload')->info($clean_filename);

            $path_to_file = storage_path("app/public/videos/" . $file_id . ".mp4");

            for ($i = 0; $i <= $chunk_id; $i++)
            {
                $path_to_chunk = storage_path("app/" . $temp_loc . $i);

                // $path_to_chunk = Storage::url("{$temp_loc}{$i}");
                try
                {
                    $file = fopen($path_to_chunk, 'rb');
                    $buff = fread($file, $BUFFER_SIZE);
                    fclose($file);

                    $final = fopen($path_to_file, 'ab');
                    $write = fwrite($final, $buff);
                    fclose($final);
                    unlink($path_to_chunk);

                } catch (Exception $e)
                {
                    Log::debug($e->getMessage());
                }
            }
            // Delete temp directory
            try
            {
                // rmdir(storage_path('app/' . $temp_loc));
                Storage::deleteDirectory($temp_loc);
            }
            catch (Exception $e)
            {
                Log::debug($e->getMessage());
            }

            $path_to_thumbnail = "{$THUMBNAIL_PATH}{$file_id}.jpg";
            $ffmpeg_gif_output = "{$GIF_PATH}{$file_id}.gif";

            $thumbnail_output = FFMpeg::thumbnail($path_to_file, $path_to_thumbnail);
            $gif_output = FFMpeg::gif($path_to_file, $ffmpeg_gif_output);

            // $file_location, $thumb_location
            if ($thumbnail_output['status'] == 0)
            {
                $path_to_thumbnail = "{$file_id}.jpg";
                $path_to_file = "{$file_id}.mp4";
                $path_to_gif = "{$file_id}.gif";

                $file_paths = [
                    'file' => $path_to_file,
                    'thumbnail' => $path_to_thumbnail,
                    'gif' => $path_to_gif
                ];

                $file_attributes = [
                    'size' => $total_size,
                    'width' => $thumbnail_output['data']['width'],
                    'height' => $thumbnail_output['data']['height'],
                    'fps' => $thumbnail_output['data']['fps']
                ];

                $filename = Formatter::title($clean_filename);
                Log::channel('upload')->info($filename);

                $tags = Formatter::tokenize($filename);

                event(new FinishedUploadingChunks($file_paths, $filename, $file_id, $file_attributes, $tags));

                $status = 'complete';

                $thumbnail = asset('storage/thumbnails/' . $path_to_thumbnail);

            }
            else
            {
                $status = 'error';
                $thumbnail = 'none';
            }
            return response()->json([
                'status' => $status,
                'progress' => $progress,
                'data' => $file_name,
                'thumbnail' => $thumbnail
            ]);

        }
        else
        {
            return response()->json([
                'status' => 'in_progress',
                'progress' => $progress,
                'data' => $file_name,
                'thumbnail' => 'none'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Video $file
     * @return \Illuminate\Http\Response
     */
    public function show(Video $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Video $file
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Video $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Video $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $file)
    {
        //
    }
}
