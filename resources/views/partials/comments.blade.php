@if (count($post->comments))
	@foreach ($post->comments as $comment)
		<div class="col-sm-12">
			<span class="lead">
				<a href="{{ route('profile', $comment->user->id) }}">
        			{{ $comment->user->name }}
        		</a>
			</span> 
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