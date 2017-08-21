{!! Form::open([
	'action' => 'UserCommentsController@store', 
	'class'=>'form-horizontal'
]) !!}

<div class="form-group">
  <div class="col-sm-12">
        {{Form::text('body',null, [
	        'placeholder'=>'Leave a comment...',
	        'class'=>'form-control',
        	'autocomplete' => 'off'
        ])}}
        {{Form::hidden('post_id',$post->id)}}
        {{Form::submit('Comment!', ['class'=>'btn btn-primary btn-block'])}}
  </div>
</div>

{!! Form::close() !!}