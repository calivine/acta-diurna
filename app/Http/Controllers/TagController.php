<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    public function videosByTag($tag)
    {
        $videos = Tag::with('videos')
            ->where('name', $tag)
            ->first();

        $videos = $videos->videos()->paginate(20);

        return view('content.gallery')->with(['videos' => $videos]);
    }

    /**
     * Recalculate tags' weight.
     */
    public function weight()
    {
        // Get number of videos associated to each tag.

        // Update the tags' weight value.

        $tags = Tag::withCount('videos')
            ->get();

        foreach($tags as $tag) {
            $count = $tag->videos_count;
            $weight = $count * .01 + 1;
            Log::channel('system')->info("{$tag->name}: {$count} ({$weight})");
            $t = Tag::where('name', $tag->name)
                ->first();


            $t->weight = $count;
            $t->timestamps = false;
            $t->save();


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
