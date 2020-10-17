<?php

namespace App\Http\Controllers;

use App\Events\FinishedUploadingChunks;
use App\Services\FFMpeg;
use App\Services\Formatter;
use App\Video;
use Exception;
use Illuminate\Http\Request;
use Log;

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
        //
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

        $start = $request->input('start');
        $end = $request->input('end');
        $total_size = $request->header('X-Content-Length');
        $chunk_id = $request->header('X-Chunk-Id');
        $file_name = $request->header('X-Content-Name');
        $file_id = $request->header('X-Content-Id');

        // Remove file suffix
        $file_name = substr($file_name, 0, -4);

        // Temporary location for file chunks.
        $temp_loc = "tmp/{$file_id}/";

        // Calculate progress uploading total file.
        $progress = $total_size > 0 ? round(($end / $total_size) * 100) : 100;

        Log::channel('upload')->info("Chunk {$chunk_id}: Bytes {$start} to {$end} of {$total_size}");

        // If there is a file, save to 'app/public/tmp/{file_id}/'
        if ($request->hasFile('file'))
        {
            $request->file->storeAs($temp_loc, $chunk_id);
        }

        // If we're on the last chunk of data, put them all together.
        if ($end == $total_size)
        {
            $clean_filename = Formatter::clean($file_name);
            $unique_filename = "{$file_id}_{$clean_filename}";
            Log::channel('upload')->info("Attempting to write {$unique_filename} to disk.");


            $path_to_file = storage_path("app/public/videos/" . $unique_filename . ".mp4");
            for ($i = 0; $i <= $chunk_id; $i++)
            {
                $path_to_chunk = storage_path("app/" . $temp_loc . $i);

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
                rmdir(storage_path('app/' . $temp_loc));
            }
            catch (Exception $e)
            {
                Log::debug($e->getMessage());
            }

            $path_to_thumb = "{$THUMBNAIL_PATH}{$file_id}.jpg";
            $ffmpeg_gif_output = "{$GIF_PATH}{$file_id}.gif";

            $output = FFMpeg::thumbnail($path_to_file, $path_to_thumb);

            $ret_status = FFMpeg::gif($path_to_file, $ffmpeg_gif_output);

            Log::channel('upload')->info($ret_status);

            // $file_location, $thumb_location
            if ($ret_status == 0)
            {
                $path_to_thumb = "{$file_id}.jpg";
                $path_to_file = "{$unique_filename}.mp4";
                $path_to_gif = "{$file_id}.gif";

                $file_paths = [
                    'file' => $path_to_file,
                    'thumbnail' => $path_to_thumb,
                    'gif' => $path_to_gif
                ];

                $file_attributes = [
                    'size' => $total_size,
                    'width' => $output['width'],
                    'height' => $output['height'],
                    'fps' => $output['fps']
                ];

                $filename = Formatter::title($clean_filename);

                $tags = Formatter::tokenize($filename);

                event(new FinishedUploadingChunks($file_paths, $filename, $file_id, $file_attributes, $tags));

                $status = 'complete';
                $thumbnail = $path_to_thumb;
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
