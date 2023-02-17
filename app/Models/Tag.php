<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;


    // many to many + polymorphic relation

    public function posts()
    {
        // morphed by many -> will be sharing by many
        // takes the single name of the taggables table
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }

    public function videos()
    {
        // takes the single name of the taggables table
        return $this->morphedByMany('App\Models\Video', 'taggable');
    }
}
