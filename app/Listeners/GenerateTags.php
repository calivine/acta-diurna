<?php

namespace App\Listeners;

use App\File;
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
        // Create new Tag model to check possible new tags against.
        $tag_check = new Tag();

        $name = $event->filename;
        $hash = $event->hash;

        // Remove numbers and symbols from file name to process tags.
        $formatted = preg_replace('/[-,+!()0-9\']/', '', $event->filename);
        Log::debug($formatted);
        $words = explode("_", $formatted);
        Log::debug($words);

        // Convert to lower case for all words.
        // remove any common words from the list.
        $lower_case = array_map('strtolower', $words);

        $lower_case = array_filter($lower_case, function ($word) {
            return RejectTags::check($word);
        });

        Log::debug($lower_case);

        // Load tags into database, checking if they exist first and updating the number of times
        // each tag occcurs.
        $tag_to_insert = array();
        foreach($lower_case as $tag) {
            $tag_to_insert[] = ['name' => $tag];
        }

        DB::table('tags')
            ->insertOrIgnore($tag_to_insert);

        $file = File::where('hash', $hash)
                ->first();

        // Associate file and tags in the tag_file table
        foreach($lower_case as $tag) {
            $file_tag = Tag::where('name', $tag)
                ->first();

            $file->tags()->save($file_tag);
        }
    }
}
