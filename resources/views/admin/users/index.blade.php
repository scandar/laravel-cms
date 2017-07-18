@extends('layouts.admin')

@section('content')
  @if (session('success'))
    <div class="alert alert-success">
      <p>{{session('success')}}</p>
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger">
      <p>{{session('error')}}</p>
    </div>
  @endif
  @if ($users)
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Image</th>
          <th>Role</th>
          <th>Email</th>
          <th>Active</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            @if ($user->photo)
              @php
              $path = Storage::url($user->photo->path)
              @endphp
            @else
              @php
              $path = Storage::url(App\Photo::find(1)->path)
              @endphp
            @endif
            <td><img src="{{asset($path)}}" width="50"></td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->is_active ? 'Yes':'No'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td><a href="{{route('users.edit', $user) }}" class="btn btn-info btn-sm">Edit</a></td>
            <td>
              {{-- delete form --}}
              {!! Form::open(['action'=>['AdminUsersController@destroy',$user->id],'method'=>'DELETE']) !!}
                {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h2>No users</h2>
  @endif
@endsection
