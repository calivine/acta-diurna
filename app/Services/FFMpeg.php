<?php


namespace App\Services;

use Log;


class FFMpeg
{
    public static function thumbnail($file, $thumbnail)
    {
        $ffmpeg_src = config('app.ffmpeg');

        $cmd = $ffmpeg_src
            . " " . "-ss 07"                 // starting timestamp
            . " " . "-i {$file}"             // input file
            . " " . "-vframes 1"             // number of frames to grab
            . " " . "-q:v 2"
            . " " . "{$thumbnail} 2>&1";     // pipe for output

        exec($cmd, $output, $ret_status);
        Log::channel('ffmpeg')->info($cmd);
        Log::channel('upload')->info($ret_status);

        if ($ret_status == 0)
        {
            preg_match('/(\d{3,4})x(\d{3,4})/', $output[18], $match);
            preg_match('/(\d{2}\.?\d{0,3}) fps/', $output[18], $fpsmatch);
        }
        else
        {
            Log::channel('ffmpeg')->info($output);
        }

        $width = $match[1] ?? 1280;
        $height = $match[2] ?? 720;

        $fps = $fpsmatch[1] ?? 24;
        return ['width' => $width,
                'height' => $height,
                'fps' => $fps];
    }

    public static function gif($file, $gif_output)
    {
        $ffmpeg_src = config('app.ffmpeg');

        $ffmpeg_gif_opts = '"fps=10,scale=320:-1:flags=lanczos,split[s0][s1];[s0]palettegen[p];[s1][p]paletteuse"';

        $cmd = $ffmpeg_src
            . " " . "-ss 07"
            . " " . "-t 3"
            . " " . "-i {$file}"
            . " " . "-vf " . $ffmpeg_gif_opts
            . " " . "-loop 0"
            . " " . "{$gif_output} 2>&1";

        exec($cmd, $output, $ret_status);
        return $ret_status;
    }

}