<?php

namespace App\Listeners;

use App\File;
use App\Tag;
use App\Events\FileUploadSuccess;
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

        $name = $event->filename;
        $hash = $event->hash;
        $formatted = preg_replace('/[-,+()0-9\']/', '', $name);
        Log::debug($formatted);
        $words = explode("_", $formatted);
        Log::debug($words);

        // Convert to lower case for all words.
        // remove any common words from the list.
        $lower_case = array_map('strtolower', $words);

        $lower_case = array_filter($lower_case, function ($word) {
            $common = ['and', 'his', 'gets', 'with', 'to', 'the', 'from', 'a', 'out', '', ' ', 'w', 'be', 'i', 'my', 'likes', 'at', 'in', 'your', 'for', 'the', 'night', 'by'];
            return !in_array($word, $common);
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


        foreach($lower_case as $tag) {
            $file_tag = Tag::where('name', $tag)
                ->first();
            $file->tags()->save($file_tag);
        }

        // Associate file and tags in the tag_file table

    }
}
