<?php
use App\User;
use App\Post;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('comment', 'UserCommentsController', ['only' => [
	'store', 'destroy'
]]);

Route::get('posts/{id}', function($id) {
    $post = Post::findOrFail($id);
    return view('posts.show', compact('post'));
})->name('posts.show');

Route::group(['middleware'=>'admin'], function()
{
  Route::get('/admin', function()
  {
    return view('admin.index');
  });

  Route::resource('admin/users', 'AdminUsersController', ['except' => ['show']]);
  Route::resource('admin/posts', 'AdminPostsController', ['except' => ['show']]);
  Route::resource('admin/categories', 'AdminCategoriesController', ['except' => ['show']]);
  Route::resource('admin/comments', 'AdminCommentsController', ['only' => ['index', 'destroy']]);
});
