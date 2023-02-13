<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Models\Post;

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
