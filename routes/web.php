<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

    DB::insert('insert into posts(title, content) values(?, ?)', ['NEXT', 'MERN is new but great till then']);
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

    return $results[0]->title;
});


// return the affected row / row no
Route::get('/update', function () {

    $updated = DB::update('update posts set title = "LARAVEL" where id = ?', [1]);

    return $updated;
});
