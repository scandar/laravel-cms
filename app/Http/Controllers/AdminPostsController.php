<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::get();
      return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objs = Category::select('name','id')->get();
        foreach ($objs as $category) {
          $categories[$category->id] = $category->name;
        }
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
      $user = Auth::user();
      $post = $user->posts()->create([
          'title' => $request->title,
          'content' => $request->content,
          'cat_id' => $request->cat_id,
      ]);
      if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $path = Storage::put('public/images', $request->file('photo'));
        $post->photo()->create(['path'=>$path]);
      }

      return redirect('admin/posts');
      // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::findOrFail($id);
      $objs = Category::select('name','id')->get();
      foreach ($objs as $category) {
        $categories[$category->id] = $category->name;
      }
      return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update([
          'title' => $request->title,
          'content' => $request->content,
          'cat_id' => $request->cat_id,
        ]);
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
          $path = Storage::put('public/images', $request->file('photo'));
          if (!$post->photo) {
            $post->photo()->create(['path'=>$path]);
          } else {
            $post->photo()->update(['path'=>$path]);
          }
        }

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->photo) {
          Storage::delete($post->photo->path);
        }
        if ($post->delete()) {
          return redirect('admin/posts')->with('success', 'Post deleted!');
        }
        return redirect('admin/posts')->with('error', 'Something went wrong!');
    }
}
