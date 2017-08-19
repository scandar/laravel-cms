@extends('layouts.app')

@section('content')
	@if ($post->title)
		<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-2">
	                <div class="panel panel-default">
	                  <div class="panel-heading">
	                    <h3>{{$post->title}} <small>{{$post->user->name}}</small></h3>
	                    <p class="text-muted">{{$post->created_at}}</p>
	                  </div>
	                  <div class="panel-body">
	                        @if ($post->photo)
	                          @php
	                          $path = Storage::url($post->photo->path)
	                          @endphp
	                          <img src="{{asset($path)}}" class="img-responsive">
	                        @endif
	                        <p>{{$post->content}}</p>
	                   </div>
	                  <div class="panel-body">

	                        {!! Form::open(['action' => 'UserCommentsController@store', 
	                        	'class'=>'form-horizontal']) !!}
							    <div class="form-group">
							      <div class="col-sm-12">
								        {{Form::textarea('body',null, ['placeholder'=>'Leave a comment...', 'class'=>'form-control', 'rows'=>1])}}
								        {{Form::hidden('post_id',$post->id)}}
								        {{Form::submit('Comment!', ['class'=>'btn btn-primary btn-block'])}}
							      </div>
							    </div>
						  	{!! Form::close() !!}
						<div class="row">
							@if (count($post->comments))
								@foreach ($post->comments as $comment)
									<div class="col-sm-12">
										<span class="lead">{{$comment->user->name}}</span> 
										<p>{{$comment->body}}</p>
											@if (Auth::user() && Auth::user()->id == $comment->user->id)
												{!! Form::open([
													'method' =>'DELETE',
													'action' => [
													'UserCommentsController@destroy', 
													$comment->id],
												]) !!}
													{{Form::hidden('post_id',$post->id)}}
											        {{Form::submit('Delete!', ['class'=>'btn btn-danger btn-sm'])}}
										  		{!! Form::close() !!}
											@endif
										<hr>
									</div>
								@endforeach
							@endif
						</div>
	                  </div>
	                </div>
		        </div>
		    </div>
		</div>
	@endif
@endsection