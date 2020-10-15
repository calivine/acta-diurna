<?php


namespace App\Repository;
use App\Post;
use Carbon\Carbon;
use Request;


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

    public function getMostRecent()
    {
        $user = Request::user()->id;
        $key = "recent.{$user}";
        $cacheKey = $this->getCacheKey($key);
        return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function () use($user) {
            return Post::mostRecent($user);
        });
    }

    public function getCacheKey($key)
    {
        $key = strtoupper($key);

        return self::CACHE_KEY .".$key";
    }


}