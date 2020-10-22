<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Exceptions\RejectTags;
use DB;
use Facades\App\Repository\Videos;
use Illuminate\Support\Facades\Log;


class TagController extends Controller
{
    /**
     * Get all videos associated with tag
     * @param String $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function videosByTag(String $tag)
    {
        $videos = Videos::findVideosByTag($tag);

        return view('content.media.gallery')->with(['files' => $videos]);
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
            Log::channel('system')->info($tag->videoCount());
            $tag->importance = $tag->importance();
            $tag->weight = $tag->videoCount();
            $tag->save();
        }

        return redirect()->route('home');
    }

    /** Returns the top tags
     *
     */
    public function getTopTags()
    {
        // Re-weight tags before getting top ones.
        $this->weight();
    }

    /**
     *  Remove blacklisted tags
     */
    public function cleanUpTags()
    {
        $tags = Tag::all();
        $tags = $tags->filter(function($tag) {
            return !RejectTags::check($tag->name);
        });
        foreach($tags as $tag) {
            DB::table('tag_video')->where('tag_id', $tag->id)
                ->delete();
            DB::table('tags')->where('name', $tag->name)
                ->delete();
        }
        return redirect()->route('weight');
    }

}
