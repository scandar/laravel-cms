@extends('layouts.admin')
@section('content')
  @include('partials.feedback')
  @if (count($comments))
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>body</th>
          <th>Author</th>
          <th>Post</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($comments as $comment)
          <td>{{$comment->id}}</td>
          <td>{{$comment->body}}</td>
          <td>{{$comment->user->name}}</td>
          <td>{{$comment->post->title}}</td>
          <td>{{$comment->created_at}}</td>
          <td>{{$comment->updated_at}}</td>
          <td>
            {!! Form::open(['action'=>['AdminCommentsController@destroy',$comment->id],'method'=>'DELETE']) !!}
              {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
            {!! Form::close() !!}
          </td>
        @endforeach
      </tbody>
    </table>
  @else
    <h2>No comments</h2>
  @endif
@endsection
