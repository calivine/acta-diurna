<?php


namespace App\Services;

use FFMpeg\FFProbe;
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

        if ($ret_status != 0)
        {
            Log::channel('ffmpeg')->info($output);
        }

        // Get video attributes from ffmpeg output
        $attributes = FFMpeg::strip_attributes($output);

        return FFMpeg::get($ret_status, $attributes);
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

        $attributes = FFMpeg::strip_attributes($output);
        Log::channel('ffmpeg')->info($output);
        Log::channel('ffmpeg')->info($attributes);

        return FFMpeg::get($ret_status, $attributes);
    }

    private static function strip_attributes($output)
    {
        // Match width X height
        preg_match('/(\d{3,4})x(\d{3,4})/', $output[18], $match);
        // Match FPS
        preg_match('/(\d{2}\.?\d{0,3}) fps/', $output[18], $fpsmatch);

        $attributes = [
            'width' => $match[1] ?? 1280,
            'height' => $match[2] ?? 720,
            'fps' => $fpsmatch[1] ?? 24
        ];
        return $attributes;
    }

    private static function get($ret, $attr)
    {
        return [
            'status' => $ret,
            'data' => $attr
        ];
    }



}