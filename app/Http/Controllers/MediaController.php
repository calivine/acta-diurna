<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Facades\App\Repository\Videos;


class MediaController extends Controller
{
    CONST VIEW_WATCH = 'content.media.watch';
    /**
     * GET
     * Watch media file.
     */
    public function watch($hash)
    {
        $file = Videos::findVideo($hash);


        $related_videos = Videos::findRelatedVideos($hash);

        return view(static::VIEW_WATCH)->with([
            'file' => $file,
            'related' => $related_videos
        ]);
    }

    /**
     * POST
     * Update view count
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addView(Request $request)
    {
        $hash = $request->header('X-Content-Id');
        if (isset($hash))
        {
            Video::where('hash', $hash)
                ->increment('views');

            return response()->json([
                'status' => 200
            ]);
        }
        else
        {
            return response()->json([
                'status' => 500
            ]);
        }
    }
}
