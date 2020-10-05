<?php


namespace App\Http\Controllers;

use App\File;
use App\Events\FinishedUploadingChunks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;



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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        // $temp_loc = 'tmp/' . $file_id . '/';
        $temp_loc = "tmp/{$file_id}/";

        // Calculate progress uploading total file.
        $progress = $total_size > 0 ? round(($end / $total_size) * 100) : 100;
        // $progress = round(($end / $total_size) * 100);
        Log::channel('upload')->info("Chunk {$chunk_id}: Bytes {$start} to {$end} of {$total_size}");

        // If there is a file, save to 'app/public/tmp/{file_id}/'
        if ($request->hasFile('file'))
        {
            $request->file->storeAs($temp_loc, $chunk_id);
        }

        // If we're on the last chunk of data, put them all together.
        if ($end == $total_size)
        {
            $file_location = preg_replace('/[\'-+()0-9][^4]/', '', $file_name);
            $file_location = rand_alphanum(10) . $file_location;
            Log::channel('upload')->info("Attempting to write {$file_location} to disk.");

            $path_to_file = storage_path('app/public/videos/'.$file_location . ".mp4");
            for ($i = 0; $i <= $chunk_id; $i++) {
                $path_to_chunk = storage_path('app/' . $temp_loc . $i);
                try {
                    $file = fopen($path_to_chunk, 'rb');
                    $buff = fread($file, $BUFFER_SIZE);
                    fclose($file);

                    $final = fopen($path_to_file, 'ab');
                    $write = fwrite($final, $buff);
                    fclose($final);
                    unlink($path_to_chunk);

                } catch (ErrorException $e) {
                    Log::debug($e->getMessage());
                }
            }
            // Delete temp directory
            rmdir(storage_path('app/' . $temp_loc));

            $thumb = [];
            $ret_status;
            $path_to_thumb = storage_path('app/public/thumbnails/') . $file_id . ".jpg ";

            $ffmpeg_cmd = env('LIB_FFMPEG');
            //$ffmpeg_cmd = "/usr/local/bin/ffmpeg ";
            $ffmpeg_ts = " -ss 00:00:07 -i ";

            $ffmpeg_frames = " -vframes 1 -q:v 2 ";
            $ffmpeg_pipe = " 2>&1";
            $ffmpeg = $ffmpeg_cmd . $ffmpeg_ts . $path_to_file . $ffmpeg_frames . $path_to_thumb . $ffmpeg_pipe;

            $cmd = $ffmpeg_cmd
                . " " . "-ss 07"                 // starting timestamp
                . " " . "-i {$path_to_file}"     // input file
                . " " . "-vframes 1"             // number of frames to grab
                . " " . "-q:v 2"
                . " " . "{$path_to_thumb} 2>&1"; // pipe for output

            exec($cmd, $thumb, $ret_status);
            // exec("/usr/local/bin/ffmpeg -ss 00:00:07 -i " . $path_to_file .  " -vframes 1 -q:v 2 " . $path_to_thumb . " 2>&1", $thumb, $ret_status);

            Log::channel('upload')->info($ret_status);
            Log::channel('ffmpeg')->info($thumb);
            $match = null;
            $fpsmatch = null;
            if ($ret_status == 0)
            {
                preg_match('/(\d{3,4})x(\d{3,4})/', $thumb[18], $match);
                preg_match('/(\d{2}\.?\d{0,3}) fps/', $thumb[18], $fpsmatch);
            }
            $width = $match[1] ?? 1280;
            $height = $match[2] ?? 720;

            $fps = $fpsmatch[1] ?? 24;

            $ffmpeg_gif_output = storage_path('app/public/gifs/') . $file_id . ".gif";

            $ffmpeg_gif_opts = '"fps=10,scale=320:-1:flags=lanczos,split[s0][s1];[s0]palettegen[p];[s1][p]paletteuse"';

            $cmd = $ffmpeg_cmd
                . " " . "-ss 07"
                . " " . "-t 3"
                . " " . "-i {$path_to_file}"
                . " " . "-vf " . $ffmpeg_gif_opts
                . " " . "-loop 0"
                . " " . "{$ffmpeg_gif_output} 2>&1";

            // $ffmpeg_gif_ts = " -ss 07 -t 3 -i ";
            // $ffmpeg_loops = " -loop 0 ";
            // $ffmpeg_gif = $ffmpeg_cmd . $ffmpeg_gif_ts . $path_to_file . $ffmpeg_gif_opts . $ffmpeg_loops . $ffmpeg_gif_output . $ffmpeg_pipe;
            // Log::channel('ffmpeg')->info($ffmpeg_gif);
            exec($cmd, $thumb, $ret_status);

            Log::channel('upload')->info($ret_status);
            Log::channel('ffmpeg')->info($thumb);
            // $file_location, $thumb_location
            if ($ret_status == 0)
            {
                $path_to_thumb = $file_id . ".jpg";
                $path_to_file = $file_location . ".mp4";
                $path_to_gif = $file_id . ".gif";

                $file_paths = [
                    'file' => $path_to_file,
                    'thumbnail' => $path_to_thumb,
                    'gif' => $path_to_gif
                ];

                $file_attributes = [
                    'size' => $total_size,
                    'width' => $width,
                    'height' => $height,
                    'fps' => $fps
                ];

                event(new FinishedUploadingChunks($file_paths, $file_name, $file_id, $file_attributes));

                //Storage::disk('local')->put('output.jpg', $thumb);
                $status = 'complete';
            }
            else
            {
                $status = 'error';

            }
            return response()->json([
                'status' => $status,
                'progress' => $progress,
                'data' => $file_name
            ]);

        }
        else
        {
            return response()->json([
                'status' => 'in_progress',
                'progress' => $progress,
                'data' => $file_name
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
