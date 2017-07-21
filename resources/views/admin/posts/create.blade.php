@extends('layouts.admin')

@section('content')
  <h1 class="text-center">Create post!</h1>
  {!! Form::open(['action' => 'AdminPostsController@store', 'class'=>'form-horizontal', 'files'=>true]) !!}
    <div class="form-group">
      {{Form::label('title', 'Title:', ['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">
        {{Form::text('title',null, ['placeholder'=>'Post Title...', 'class'=>'form-control'])}}
      </div>
    </div>
    <div class="form-group">
      {{Form::label('content', 'Content:', ['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">
        {{Form::textarea('content',null, ['placeholder'=>'Post Content .....', 'class'=>'form-control'])}}
      </div>
    </div>
    <div class="form-group">
      {{Form::label('photo', 'Photo:', ['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">
        {{Form::file('photo', ['class'=>'form-control'])}}
      </div>
    </div>
    <div class="form-group">
      {{Form::label('tag', 'Role:', ['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">
        {{Form::select('tag',$tags,null,['placeholder'=>'tags', 'class'=>'form-control'])}}
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
