<?php


namespace App\Repository;

use App\Video;
use App\Tag;
use Exception;
use Carbon\Carbon;
use Request;


class Videos
{
    CONST CACHE_KEY = 'VIDEOS';

    public function all()
    {
        $key = "all";
        $cacheKey = $this->getCacheKey($key);
        return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function () {
            return Video::with(['thumbnail', 'gif', 'tags'])
                ->orderBy('created_at', 'desc')
                ->get();
        });
    }

    public function allFromUser($perPage=15)
    {
        $page = Request::input('page', 1);
        $user = Request::user()->id;
        $key = "user{$user}.all.{$perPage}perPage.page{$page}";
        $cacheKey = $this->getCacheKey($key);
        return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function () use ($perPage, $user) {
            return Video::with(['thumbnail', 'gif', 'tags'])
                ->where('user_id', $user)
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
        });
    }

    public function dashboardVideos()
    {
        $user = Request::user()->id;
        $key = "{$user}.dash";
        $cacheKey = $this->getCacheKey($key);
        return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function () use ($user) {
            return Video::with(['thumbnail', 'gif', 'tags'])
                ->where('user_id', $user)
                ->orderBy('created_at', 'desc')
                ->take(6)
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