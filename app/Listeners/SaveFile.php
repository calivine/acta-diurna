<?php

namespace App\Listeners;

use App\Video;
use App\Thumbnail;
use App\Gif;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Events\FinishedUploadingChunks;
use App\Events\FileUploadSuccess;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveFile
{
    /**
     * Handle the event.
     *
     * @param  FinishedUploadingChunks  $event
     * @return void
     */
    public function handle(FinishedUploadingChunks $event)
    {
        $user = Auth::user();
        $video = new Video();

        $video->hash = $event->hash;
        $video->size = $event->size;
        $video->filename = $event->filename;
        $video->path = $event->path;
        $video->width = $event->width;
        $video->height = $event->height;
        $video->fps = $event->fps;
        $video->user()->associate($user);
        $video->save();

        $thumb = new Thumbnail();
        $thumb->hash = $event->hash;
        $thumb->path = $event->path_to_thumb;
        $thumb->video()->associate($video);
        $thumb->save();

        $gif = new Gif();
        $gif->hash = $event->hash;
        $gif->path = $event->path_to_gif;
        $gif->video()->associate($video);
        $gif->save();

        event(new FileUploadSuccess($video->filename, $video->hash));

        // Update: generate tags here.
    }
}
