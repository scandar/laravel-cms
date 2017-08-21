<?php
use App\User;
use App\Post;
use App\Category;
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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('comment', 'UserCommentsController', ['only' => [
	'store', 'destroy'
]]);

Route::get('posts/{id}', function($id) {
    $post = Post::find($id);
    return view('posts.show', compact('post'));
})->name('posts.show');

Route::get('category/{name}', function($name) {
    $category = Category::where('name', $name)->first();
    $posts = NULL;
    if($category) {
      $posts = Post::where('cat_id', $category->id)->get();
    }
    return view('categories.index', compact('posts'));
})->name('category');

Route::get('profile/{id}', function($id) {
    $user = User::find($id);
    $posts = NULL;
    if ($user) {
      $posts = $user->posts()->get();
    }
    return view('user.profile', compact('user', 'posts'));
})->name('profile');

Route::group(['middleware'=>'admin'], function()
{
  Route::get('/admin', function()
  {
    return view('admin.index');
  })->name('admin');

  Route::resource('admin/users', 'AdminUsersController', ['except' => ['show']]);
  Route::resource('admin/posts', 'AdminPostsController', ['except' => ['show']]);
  Route::resource('admin/categories', 'AdminCategoriesController', ['except' => ['show']]);
  Route::resource('admin/comments', 'AdminCommentsController', ['only' => ['index', 'destroy']]);
});

Route::get('*', function() {
    return redirect('home');
});