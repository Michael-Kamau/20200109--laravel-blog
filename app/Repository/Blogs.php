<?php

namespace App\Repository;

use App\Blog;
use Carbon\Carbon;


class Blogs
{

    CONST CACHE_KEY = 'id';


    public function all($orderBy)
    {
        $key = "all.{$orderBy}";
        $cacheKey = $this->getCacheKey($key);

        return cache()->remember($cacheKey,Carbon::now()->addMinutes(5),function() use($orderBy){
            return Blog::orderBy($orderBy)->get();
    });
        return $blogs = Blog::all();
    }
    public function get($id)
    {

    }

    public function getCacheKey($key){
        $key=strtoupper(($key));
        return self::CACHE_KEY."$key";
    }
}
