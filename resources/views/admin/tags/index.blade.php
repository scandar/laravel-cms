@extends('layouts.admin')
@section('content')
  @include('partials.feedback')
  @if (count($tags))
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tags as $tag)
          <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->name}}</td>
            <td>{{$tag->created_at}}</td>
            <td>{{$tag->updated_at}}</td>
            <td><a href="{{route('tags.edit', $tag)}}" class="btn btn-info btn-sm">Edit</a></td>
            <td>
              {!!Form::open(['action'=>['AdminTagsController@destroy', $tag->id],'method'=>'DELETE'])!!}
                {!! Form::submit('Delete!',['class'=>'btn btn-sm btn-danger']) !!}
              {!!Form::close()!!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h3>No Tags :(</h3>
  @endif
@endsection
