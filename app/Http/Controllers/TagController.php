<?php

namespace App\Http\Controllers;

use App\Tag;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    public function videosByTag($tag)
    {

        $files = Tag::with('files')
            ->where('name', $tag)
            ->first();

        $files = $files->files()->paginate(20);
        Log::channel('system')->info($files);



        return view('content.gallery')->with(['files' => $files]);
    }

    /**
     * Recalculate tags' weight.
     */
    public function weight()
    {
        // Get number of videos associated to each tag.

        // Update the tags' weight value.

        $tags = Tag::withCount('files')
            ->get();

        foreach($tags as $tag) {
            $count = $tag->files_count;
            $weight = $count * .01 + 1;
            Log::channel('system')->info("{$tag->name}: {$count} ({$weight})");
            $t = Tag::where('name', $tag->name)
                ->first();

            Log::channel('system')->debug("{$t}");
            $t->weight = $count;
            $t->timestamps = false;
            $t->save();
            Log::channel('system')->debug("{$t}");

        }

        return;
    }

    /** Returns the top tags
     *
     */
    public function getTopTags()
    {
        // Re-weight tags before getting top ones.
        $this->weight();





    }
}
