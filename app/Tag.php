<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model implements Searchable
{

    use SoftDeletes;


    public function getSearchResult(): SearchResult
     {
     
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name
         );
     }


    public function arts()
    {
        return $this->morphedByMany('App\Art', 'taggable');
    }

    public function prearts()
    {
        return $this->morphedByMany('App\PreArt', 'taggable');
    }
}
