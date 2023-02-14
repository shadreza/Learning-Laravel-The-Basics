<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function posts()
    {
        // without the convention
        // return $this->hasManyThrough('App\Post', 'App\User', 'country_id', 'user_id');

        // User is the intermediate table and has the country id
        return $this->hasManyThrough('App\Models\Post', 'App\Models\User');
    }
}
