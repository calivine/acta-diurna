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

        $videos = $videos->videos;

        return view('content.gallery')->with(['videos' => $videos]);
    }

    /**
     * Recalculate tags' weight.
     */
    public function weight()
    {
        // Get number of videos associated to each tag.

        // Update the tags' weight value.

        $tags = Tag::all();

        foreach($tags as $tag) {


            Log::channel('system')->info("{$tag->name}: {$tag->importance()} ({$tag->weight()})");
            $tag->importance = $tag->importance();
            $tag->weight = $tag->weight();
            $tag->save();
        }

        return response()->json(['status' => 200]);
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
