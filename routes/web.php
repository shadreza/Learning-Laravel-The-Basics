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

Route::get('/about', function () {
    return "This is the about part";
});

// Route::get('/contact', function () {
//     return "Hi let's connect";
// });

Route::get('/post/{id}', function ($id) {
    return "This is post no # " . $id;
});

Route::get('/post/{id}/{name}', function ($id, $name) {
    return "This is post no # " . $id . " And the name is # " . $name;
});

Route::get('/admin/post/example/sth', array('as' => 'admin.home', function () {
    $url = route('admin.home');
    return $url;
}));

// by naming this url we can make these long urls and use them in short hands in the code like
// <a href="route('admin.home')"> Admin Home </a>

Route::get('/posts/{id}', [PostsController::class, 'idPassing']);

Route::get('/photo', [PostsController::class, 'index']);

// Route::resource('/all-posts', PostsController::class);

Route::get('/contact', [PostsController::class, 'contact']);

Route::get('/pass/{name}/{age}/{misc}', [PostsController::class, 'passName']);
