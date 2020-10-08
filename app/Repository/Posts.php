<?php


namespace App\Repository;
use App\Post;
use Carbon\Carbon;


class Posts
{
    CONST CACHE_KEY = 'POSTS';

    public function all($orderBy)
    {
        $key = "all.{$orderBy}";
        $cacheKey = $this->getCacheKey($key);
        return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function () use($orderBy) {
            return Post::orderBy($orderBy)->get();
        });
    }

    public function get($id)
    {

    }

    public function getMostRecent($id)
    {
        $key = "recent.{$id}";
        $cacheKey = $this->getCacheKey($key);
        return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function () use($id) {
            return Post::mostRecent($id);
        });
    }

    public function getCacheKey($key)
    {
        $key = strtoupper($key);

        return self::CACHE_KEY .".$key";
    }


}