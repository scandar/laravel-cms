@extends('layouts.admin')
@section('content')
  @include('partials.feedback')
  @if ($posts)
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Image</th>
          <th>Content</th>
          <th>Author</th>
          <th>Tags</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            @if ($post->photo)
              @php
              $path = Storage::url($post->photo->path)
              @endphp
              <td><img src="{{asset($path)}}" width="50"></td>
            @else
              <td>no image</td>
            @endif
            <td>{{substr($post->content,0,99)}}</td>
            <td>{{$post->user->name}}</td>
            <td>
              @if (!count($post->tags))
                no tags
              @else
                @foreach ($post->tags as $tag)
                  {{$tag->name}}
                @endforeach
              @endif
            </td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
            <td><a href="{{route('posts.edit', $post)}}" class="btn btn-info btn-sm">Edit</a></td>
            <td>
              {!! Form::open(['action'=>['AdminPostsController@destroy',$post->id],'method'=>'DELETE']) !!}
                {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h2>No posts</h2>
  @endif
@endsection
