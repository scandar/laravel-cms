@extends('layouts.admin')
@section('content')
  @include('partials.feedback')
  @if (count($categories))
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
        @foreach ($categories as $category)
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at}}</td>
            <td><a href="{{route('categories.edit', $category)}}" class="btn btn-info btn-sm">Edit</a></td>
            <td>
              {!!Form::open(['action'=>['AdminCategoriesController@destroy', $category->id],'method'=>'DELETE'])!!}
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
