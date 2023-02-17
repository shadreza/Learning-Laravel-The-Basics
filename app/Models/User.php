<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function see_post()
    {
        // return $this->hasOne('App\Models\Post', 'user_id', 'post_id');
        // return $this->hasOne('App\Models\Post', 'user_id');
        // by default user_id is there
        return $this->hasOne('App\Models\Post');
    }

    public function see_posts()
    {
        // return $this->hasOne('App\Models\Post', 'user_id', 'post_id');
        // return $this->hasOne('App\Models\Post', 'user_id');
        // by default user_id is there
        return $this->hasMany('App\Models\Post');
    }

    public function roles()
    {

        // if the table name is not like the convention

        // return $this->belongsToMany('App\Models\Role', 'name_of_the_table', 'foreign_key_user_table', 'foreign_key_role_table');

        // when the pivot table is as the convention [role_user -> pivot table]
        // [singular + _ in between + alphabetically sorted] -> pivot table convention

        return $this->belongsToMany('App\Models\Role')->withPivot('created_at');
    }


    // for the polymorphic relation

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }



    /*
    |--------------------------------------------------------------------------
    | Forms Working Bellow
    |--------------------------------------------------------------------------
    */

    






}
