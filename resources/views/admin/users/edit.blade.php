@extends('layouts.admin')

@section('content')
  <h1 class="text-center">Edit user: {{$user->name}}</h1>
  <div class="row">

    <div class="col-md-3">
      @if ($user->photo)
        @php
        $path = Storage::url($user->photo->path)
        @endphp
      @else
        @php
        $path = Storage::url(App\Photo::find(1)->path)
        @endphp
      @endif
      <img src="{{asset($path)}}" class="img-responsive img-rounded">
    </div>
    <div class="col-md-9">
      {!! Form::model($user, ['action' => ['AdminUsersController@update', $user->id], 'method'=>'PATCH', 'class'=>'form-horizontal', 'files'=>true]) !!}
      {!! Form::hidden('id', $user->id) !!}

        <div class="form-group">
          {{Form::label('name', 'Name:', ['class'=>'control-label col-sm-2'])}}
          <div class="col-sm-10">
            {{Form::text('name',null, ['placeholder'=>'Name', 'class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group">
          {{Form::label('email', 'Email:', ['class'=>'control-label col-sm-2'])}}
          <div class="col-sm-10">
          {{Form::email('email',null, ['placeholder'=>'user@mail.com', 'class'=>'form-control col-sm-10'])}}
          </div>
        </div>
        <div class="form-group">
          {{Form::label('old_password', 'Old Password:', ['class'=>'control-label col-sm-2'])}}
          <div class="col-sm-10">
          {{Form::password('old_password', ['placeholder'=>'Old Password', 'class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group">
          {{Form::label('password', 'Password:', ['class'=>'control-label col-sm-2'])}}
          <div class="col-sm-10">
          {{Form::password('password', ['placeholder'=>'Password', 'class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group">
          {{Form::label('password_confirmation', 'Confirm Password:', ['class'=>'control-label col-sm-2'])}}
          <div class="col-sm-10">
          {{Form::password('password_confirmation', ['placeholder'=>'Repeat Password', 'class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group">
          {{Form::label('photo', 'Photo:', ['class'=>'control-label col-sm-2'])}}
          <div class="col-sm-10">
            {{Form::file('photo', ['class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group">
          {{Form::label('role_id', 'Role:', ['class'=>'control-label col-sm-2'])}}
          <div class="col-sm-10">
          {{Form::select('role_id',$roles,null,['placeholder'=>'role id', 'class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            {{Form::submit('Update!', ['class'=>'btn btn-primary'])}}
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
  <div class="row">
    @include('partials.formErrors')
  </div>
@endsection
