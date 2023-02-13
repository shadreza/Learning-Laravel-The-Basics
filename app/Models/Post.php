<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // by default the table name is sensed as "posts" [lowering + plural]
    // if the table name is not then have to do that explicitly
    //  protected $table = 'post_table';

    // by default the table ha a primary key named 'id'
    // but if we have something else than this name
    // protected $primaryKey = 'post_id';

    use HasFactory;

    
}
