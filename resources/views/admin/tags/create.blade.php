@extends('layouts.admin')

@section('content')
  <h1 class="text-center">Create Tag!</h1>
  {!! Form::open(['action' => 'AdminTagsController@store', 'class'=>'form-horizontal']) !!}
    <div class="form-group">
      {{Form::label('name', 'Tag Name:', ['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">
        {{Form::text('name',null, ['placeholder'=>'Name', 'class'=>'form-control'])}}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {{Form::submit('Create!', ['class'=>'btn btn-primary btn-block'])}}
      </div>
    </div>
  {!! Form::close() !!}
  @include('partials.formErrors')
@endsection
