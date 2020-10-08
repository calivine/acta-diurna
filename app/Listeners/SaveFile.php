<?php

namespace App\Listeners;

use App\File;
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
        $file = new File();

        $file->hash = $event->hash;
        $file->size = $event->size;
        $file->filename = $event->filename;
        $file->path = $event->path;
        $file->width = $event->width;
        $file->height = $event->height;
        $file->fps = $event->fps;
        $file->user()->associate($user);
        $file->save();

        $thumb = new Thumbnail();
        $thumb->hash = $event->hash;
        $thumb->path = $event->path_to_thumb;
        $thumb->file()->associate($file);
        $thumb->save();

        $gif = new Gif();
        $gif->hash = $event->hash;
        $gif->path = $event->path_to_gif;
        $gif->file()->associate($file);
        $gif->save();

        event(new FileUploadSuccess($file->filename, $file->hash));

        // Update: generate tags here.
    }
}
