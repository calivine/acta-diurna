<?php


namespace App\Repository;

use App\Video;
use App\Tag;
use Exception;
use Carbon\Carbon;


class Videos
{
    CONST CACHE_KEY = 'FILES';

    public function all($perPage = 15)
    {
        $key = "all";
        $cacheKey = $this->getCacheKey($key);
        return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function () use ($perPage) {
            return Video::with(['thumbnail', 'gif', 'tags'])
                ->orderBy('created_at', 'desc')
                ->get();
        });

    }

    public function findVideo($hash)
    {
        $key = "findVideo.{$hash}";
        $cacheKey = $this->getCacheKey($key);

        return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function () use ($hash) {
            return Video::with(['thumbnail', 'tags', 'gif'])
                ->where('hash', $hash)
                ->first();
        });

    }

    public function findRelatedVideos($hash)
    {
        $video = $this->findVideo($hash);
        $key = "findRelatedVideos.{$hash}";
        $cacheKey = $this->getCacheKey($key);
        return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function () use ($video) {
            // Get related videos based on tags
            $related_tags = $video->tags;
            $related_videos = collect();

            // Grab each tag's associated videos
            foreach($related_tags as $tag) {
                if ($tag->weight >= 1.02)
                {
                    // Merge them into one collection
                    $related_videos = $related_videos->merge($tag->videos);
                }
            }
            // Remove the currently playing video from list.
            $related_videos = $related_videos->reject(function($vid) use($video) {
                return $vid->id == $video->id;
            });

            // Return shuffled list of unique values.
            return $related_videos->unique('id')->shuffle();
        });
    }

    public function findVideosByTag($tag)
    {
        $key = "findVideosByTag.{$tag}";
        $cacheKey = $this->getCacheKey($key);

        return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function () use ($tag) {
            $videos = Tag::with('videos')
                ->where('name', $tag)
                ->first();
            return $videos->videos;
        });


    }

    public function getCacheKey($key)
    {
        $key = strtoupper($key);

        return self::CACHE_KEY . ".$key";
    }

}