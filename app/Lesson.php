<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title','body','same_bool'];

    // protected $hidden = ['title']; // will not dispaly title
}
