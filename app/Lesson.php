<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Lesson extends Model
{
    protected $fillable = ['title','body','same_bool'];
    // protected $hidden = ['title']; // will not dispaly title


    /**
     * The tags that belong to the lesson.
     */
    public function tags() {

        return $this->belongsToMany('App\Tag');
    }
}
