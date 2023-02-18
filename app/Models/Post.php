<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // by default the table name is sensed as "posts" [lowering + plural]
    // if the table name is not then have to do that explicitly
    //  protected $table = 'post_table';

    // by default the table ha a primary key named 'id'
    // but if we have something else than this name
    // protected $primaryKey = 'post_id';

    use HasFactory;
    use SoftDeletes;

    public $directory  = '/images';

    // have to add the columns that can be created via the create method
    // for mass assigning
    protected $fillable = [
        'title',
        'content',
        'path'
    ];

    protected $dates = ['deleted_at'];

    public function see_user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


    // for the polymorphic relation

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }



    // tags methods

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }






    // -------------------------------------------
    // query scope added here
    // -------------------------------------------
    // add the static keyword
    // convention -> static + name [in camel case]
    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public static function scopeLatestById($query)
    {
        return $query->latest()->get();
    }

    // adding accessor
    // as the attribute was path so automatically does this
    // no need to call the function
    public function getPathAttribute($value)
    {
        return $this->directory . '/' . $value;
    }
}





/*
|--------------------------------------------------------------------------
| Tinker CLI
|--------------------------------------------------------------------------
*/

// the following codes will be executing via the tinker cli

// php artisan tinker




// add a post [create]
// $post = App\Models\Post::create('title'=>'Tinker', 'content'=>'this is from the tinker cli');

// making an object of the model and then putting data and then saving to the DB [create]

// $post = new App\Models\Post
// $post->title = 'New Title from Tinker'
// $post->content = 'New Content from Tinker'
// $post->save();




// read a post [read]

// $post = App\Models\Post::find(4);


// using conditions

// $post = App\Models\Post::where('id', 7)->first()




// update a post [update]

// $post = App\Models\Post::find(3)
// $post->title = 'updated title from tnker'
// $post->save()




// delete a post [delete]

// $post->delete()
// $post->forceDelete()




// working with relationships

// $user = App\Models\User::find(1)
// $user->roles
