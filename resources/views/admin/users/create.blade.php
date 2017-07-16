@extends('layouts.admin')

@section('content')
  {!! Form::open(['action' => 'AdminUsersController@store', 'class'=>'form-horizontal', 'files'=>true]) !!}
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
      {{Form::select('role_id',$roles,3,['placeholder'=>'role id', 'class'=>'form-control'])}}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {{Form::submit('Create!', ['class'=>'btn btn-primary'])}}
      </div>
    </div>
  {!! Form::close() !!}
  @include('partials.formErrors')
@endsection
