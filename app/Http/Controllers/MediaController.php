<?php

namespace App\Http\Controllers;

use App\File;
use App\Post;
use App\Thumbnail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class MediaController extends Controller
{
    CONST VIEW_WATCH = 'content.watch';
    /**
     * GET
     * Watch media file.
     */
    public function watch($hash)
    {
        $file = File::with(['thumbnail', 'tags'])
            ->where('hash', $hash)
            ->first();

        Log::channel('system')->info($file);

        $related = $file->tags;
        Log::channel('system')->info($related);
        
        return view(static::VIEW_WATCH)->with([
            'file' => $file
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
            $file = File::where('hash', $request->header('X-Content-Id'))
                ->first();
            $file->views += 1;
            $file->save();

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
