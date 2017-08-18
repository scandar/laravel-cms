@extends('layouts.admin')

@section('content')
  <h1 class="text-center">Edit Category: {{$category->name}}</h1>
  {!! Form::model($category,['action' => ['AdminCategoriesController@update', $category->id], 'class'=>'form-horizontal','method'=>'PATCH']) !!}
    <div class="form-group">
      {{Form::label('name', 'Category Name:', ['class'=>'control-label col-sm-2'])}}
      <div class="col-sm-10">
        {{Form::text('name',null, ['placeholder'=>'Name', 'class'=>'form-control'])}}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {{Form::submit('Update!', ['class'=>'btn btn-info btn-block'])}}
      </div>
    </div>
  {!! Form::close() !!}
  @include('partials.formErrors')
@endsection
