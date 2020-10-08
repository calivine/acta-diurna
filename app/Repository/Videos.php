<?php


namespace App\Repository;
use App\File;
use Exception;
use Carbon\Carbon;


class Videos
{
    CONST CACHE_KEY = 'FILES';

    public function all($perPage=15)
    {
        $key = "all";
        $cacheKey = $this->getCacheKey($key);
        try {
            return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function () use($perPage) {
                return File::with(['thumbnail', 'gif', 'tags'])
                    ->orderBy('created_at', 'desc')
                    ->get();
            });
        } catch (Exception $e) {
            report($e);
        }



    }

    public function getCacheKey($key)
    {
        $key = strtoupper($key);

        return self::CACHE_KEY .".$key";
    }

}