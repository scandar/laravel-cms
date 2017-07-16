<?php
use App\User;
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

Route::get('/admin', function()
{
  return view('admin.index');
});

Route::resource('admin/users', 'AdminUsersController');

Route::get('/image/{id}', function($id)
{
  $path = User::find($id)->photo->path;
  $path = Storage::url($path);
  return "<img src='" .asset($path). "' />";
  // return "<img src='/public/storage/images/tJCGdfQYvxh6OERmd2bM52l3ulfehp7gS9W8RBRD.jpeg' />";
});
