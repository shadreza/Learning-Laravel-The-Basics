<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Models\Country;
use App\Models\Post;
use App\Models\User;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Tag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return "This is the about part";
// });

// Route::get('/contact', function () {
//     return "Hi let's connect";
// });

// Route::get('/post/{id}', function ($id) {
//     return "This is post no # " . $id;
// });

// Route::get('/post/{id}/{name}', function ($id, $name) {
//     return "This is post no # " . $id . " And the name is # " . $name;
// });

// Route::get('/admin/post/example/sth', array('as' => 'admin.home', function () {
//     $url = route('admin.home');
//     return $url;
// }));

// by naming this url we can make these long urls and use them in short hands in the code like
// <a href="route('admin.home')"> Admin Home </a>

// Route::get('/posts/{id}', [PostsController::class, 'idPassing']);

// Route::get('/photo', [PostsController::class, 'index']);

// Route::resource('/all-posts', PostsController::class);

// Route::get('/contact', [PostsController::class, 'contact']);

// Route::get('/pass/{name}/{age}/{misc}', [PostsController::class, 'passName']);


/*
|--------------------------------------------------------------------------
| Databse Raw SQL Queries
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\DB;

Route::get('/insert', function () {

    DB::insert('insert into posts(title, content) values(?, ?)', ['LARAVEL', 'MERN is new but great till then']);
});


Route::get('/read', function () {

    $results = DB::select('select * from posts where id = ?', [1]);

    // return $results;

    // for ($i = 0; $i < count($results); $i++) {
    //     print $results[$i]->title;
    // }

    // foreach($results as $post) {
    //     return $post->title;
    // }

    // return var_dump($results);

    if (count($results) > 0)
        return $results[0]->title;

    return "No Data";
});


// return the affected row / row no
Route::get('/update', function () {

    $updated = DB::update('update posts set title = "LARAVEL" where id = ?', [1]);

    return $updated;
});

// return the affected row / row no
Route::get('/delete/{id}', function ($id) {

    $deleted = DB::delete('delete from posts where id = ?', [$id]);

    return $deleted;
});





/*
|--------------------------------------------------------------------------
| Eloquent ORM
|--------------------------------------------------------------------------
*/

// retrieving all data from database using eloquent
Route::get('/find', function () {

    // this is pulling all the records
    $posts = Post::all();

    if ($posts) {
        return $posts;
    }

    return "No data found";

    // $res = 0;

    // foreach ($posts as $post) {
    //     return $post->title;
    // }
});


// retrieving a specific data from database using eloquent
Route::get('/find/{id}', function ($id) {

    // this is pulling all the records
    $post = Post::find($id);
    if ($post) {
        return $post->title;
    }

    return "Data Not Found";
});


// retrieving a specific data with constraints from database using eloquent
Route::get('/findwhere', function () {

    // this is pulling all the records
    $post = Post::where('id', 7)->orderBy('id', 'desc')->take(1)->get();

    if ($post) {
        return $post;
    }

    return "Data Not Found";

    // return Post::where('id', 6)->get();
});


// retrieving a specific data from database using eloquent but if not then give exception
Route::get('/findmore', function () {

    // this is pulling all the records
    $post = Post::findOrFail(5);
    return $post;

    // return Post::where('id', 6)->get();
});


// retrieving a specific data from database using eloquent but if not then give exception with constraint
Route::get('/findmoremore', function () {

    // this is pulling all the records
    $post = Post::where('user_count', '<', 50)->firstOrFail();
    return $post;

    // return Post::where('id', 6)->get();
});

// inserting data using eloquent
Route::get('sendelq', function () {
    $post = new Post;

    $post->title = "new ORM set title";
    $post->content = "just wow eloquent";

    // save() will insert and even update
    $post->save();
    return "data saved";
});

// updating data using eloquent
Route::get('updateelq', function () {
    $post = Post::find(6);

    $post->title = "new title";
    $post->content = "lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem ";

    // save() will insert and even update
    $post->save();
    return "data updated";
});


// creating data
Route::get('/createelq', function () {

    // have to add the array of the fillable prop in the model
    // for mass assigning
    Post::create(['title' => '4', 'content' => 'learning alot with new things']);
});


// updating data
Route::get('/updateelq', function () {

    // have to add the array of the fillable prop in the model
    // for mass assigning
    Post::where('id', 6)->where('is_admin', 1)->update(['is_admin' => 0]);
});


// delete data
Route::get('/deleteelq', function () {

    // prc # 1
    // $post = Post::find(7);
    // $post->delete();

    // prc # 2
    // Post::destroy(5);

    // prc # 3
    // Post::destroy([4, 6]);

    // prc # 4
    Post::where('title', 'new ORM set title')->delete();
});


// soft deleting
// delete to the trash
// its not deleted unless we force it to
Route::get('/softdelete', function () {
    Post::find(18)->delete();
});


// read soft delete
Route::get('/readsoftdelete', function () {

    // $post = Post::find(10);

    // $post = Post::withTrashed()->where('id', 10)->get();
    // return $post;

    $post = Post::onlyTrashed()->where('id', 9)->get();
    return $post;
});


// restoring the soft deleted item
Route::get('/restore', function () {
    $post = Post::withTrashed()->where('is_admin', 1)->restore();
    return $post;
});


// deleting permanently
Route::get('/forcedelete', function () {
    $post = Post::onlyTrashed()->where('is_admin', 1)->forceDelete();
    return $post;
});



/*
|--------------------------------------------------------------------------
| Eloquent Relationship
|--------------------------------------------------------------------------
*/

// one to one rel

// getting the post of the passed user
Route::get('/user/{id}/post', function ($id) {
    return User::find($id)->see_post->title;
});


// getting the user of the passed post
Route::get('/post/{id}/user', function ($id) {
    return Post::find($id)->see_user->name;
});





// one to many rel

// get all the posts of a user
Route::get('/allposts/{user_id}', function ($user_id) {
    $user = User::find($user_id);
    $posts = [];
    foreach ($user->see_posts as $post) {
        echo $post->title . '<br>';
        // array_push($posts, $post);
    }
    // return $posts;
});





// many to many rel

// get the role of a user
Route::get('/user/{id}/role', function ($id) {

    // prc # 1

    // $user = User::find($id);
    // $roles = [];
    // foreach ($user->roles as $role) {
    //     echo $role->name . '<br>';
    //     // array_push($posts, $post);
    // }
    // // return $roles;




    // prc # 2

    $user = User::find($id)->roles()->orderBy('name', 'desc')->get();

    return $user;
});




// Accessing the pivot / intermediate table

Route::get('user/{id}/pivot', function ($id) {
    $user = User::find($id);
    foreach ($user->roles as $role) {
        echo $role->pivot->created_at . "<br>";
    }
});



// using the intermediate table and using hasManyThrough

Route::get('user/country', function () {
    $country = Country::find(1);
    foreach ($country->posts as $post) {
        return $post->title;
    }
});





/*
|--------------------------------------------------------------------------
| Polymorphic Relationship
|--------------------------------------------------------------------------
*/


// get the user photo -> polymorphic

Route::get('/user/{user_id}/photo', function ($user_id) {
    $user = User::find($user_id);

    // return $user;

    foreach ($user->photos as $photo) {
        return $photo;
    }
});



// get the post photo -> polymorphic

Route::get('/post/{post_id}/photo', function ($post_id) {
    $post = Post::find($post_id);

    // return $user;

    foreach ($post->photos as $photo) {
        echo $photo->path . "<br>";
    }
});



// get the owner of a photo by id -> inverse polymorphic
Route::get('photo/{photo_id}/owner', function ($photo_id) {
    $photo = Photo::findOrFail($photo_id);
    return $photo->imageable;
});



// polymorphic many to many
Route::get('post/{id}/tag', function ($id) {
    $post = Post::findOrFail($id);
    foreach ($post->tags as $tag) {
        echo $tag->name . '<br>';
    }
});


// polymorphic many to many
Route::get('video/{id}/tag', function ($id) {
    $video = Video::findOrFail($id);
    foreach ($video->tags as $tag) {
        echo $tag->name . '<br>';
    }
});


// get the owner using polymorphic many to many
Route::get('tag/{tag_id}/post/owner', function ($tag_id) {
    $tag = Tag::findOrFail($tag_id);
    foreach ($tag->posts as $post) {
        echo $post->title . '<br>';
    }
});

// get the owner using polymorphic many to many
Route::get('tag/{tag_id}/video/owner', function ($tag_id) {
    $tag = Tag::findOrFail($tag_id);
    foreach ($tag->videos as $video) {
        echo $video->name . '<br>';
    }
});
