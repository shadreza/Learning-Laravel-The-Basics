<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // this will be bringing the posts and the users through the polymorphic relations

    public function imageable()
    {
        return $this->morphTo();
    }
}
