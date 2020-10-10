<?php

namespace App\Listeners;

use Facades\App\Repository\Videos;
use App\Tag;
use App\Events\FileUploadSuccess;
use App\Exceptions\RejectTags;
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

        // Remove numbers and symbols from file name to process tags.
        $formatted = preg_replace('/[^a-zA-Z_]/', '', $event->filename);

        $words = explode("_", $formatted);

        // Convert to lower case for all words.
        // remove any common words from the list.
        $lower_case = array_map('strtolower', $words);

        $lower_case = array_filter($lower_case, function ($word) {
            return RejectTags::check($word);
        });

        // Load tags into database, checking if they exist first and updating the number of times
        // each tag occcurs.

        // Associate file and tags in the tag_file table
        foreach($lower_case as $tag) {
            $video_tag = Tag::firstOrCreate(['name' => $tag]);

            $video->tags()->save($video_tag);
        }
    }
}
