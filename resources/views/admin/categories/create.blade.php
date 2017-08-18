@extends('layouts.admin')

@section('content')
  <h1 class="text-center">Create Category!</h1>
  {!! Form::open(['action' => 'AdminCategoriesController@store', 'class'=>'form-horizontal']) !!}
    <div class="form-group">
      {{Form::label('name', 'Category Name:', ['class'=>'control-label col-sm-2'])}}
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
