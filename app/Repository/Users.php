<?php


namespace App\Repository;
use App\User;


class Users
{
    CONST CACHE_KEY = 'USERS';

    public function all($orderBy)
    {
        return User::orderBy($orderBy)->get();

    }

    public function get($id)
    {

    }

    public function getCacheKey($key)
    {
        $key = strtoupper($key);

        return self::CACHE_KEY .".$key";
    }

}