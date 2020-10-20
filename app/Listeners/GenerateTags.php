<?php

namespace App\Listeners;

use Facades\App\Repository\Videos;
use App\Tag;
use App\Events\FileUploadSuccess;
use App\Exceptions\RejectTags;
use App\Services\Formatter;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class GenerateTags
{
    /**
     * Handle the event.
     *
     * @param  FileUploadSuccess  $event
     * @return void
     */
    public function handle(FileUploadSuccess $event)
    {
        $video = Videos::findVideo($event->hash);
        $tags = $event->tags;
        // Load tags into database, checking if they exist first and updating the number of times
        // each tag occcurs.

        // Associate file and tags in the tag_file table
        foreach($tags as $tag) {
            $video_tag = Tag::firstOrCreate(['name' => $tag]);
            $video->tags()->save($video_tag);

            // Weigh the tag
            $video_tag->importance = $video_tag->importance();
            $video_tag->weight = $video_tag->weight();
            $video_tag->save();
        }
    }
}
