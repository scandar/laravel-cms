@extends('layouts.app')

@section('content')
	@if ($post)
		<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-2">
	                <div class="panel panel-default">
	                  <div class="panel-heading">
	                    <h3>{{ $post->title }} 
	                    	<small>
	                    		<a href="{{ route('profile', $post->user->id) }}">
	                    			{{ $post->user->name }}
	                    		</a>
                    		</small>
                    	</h3>
	                    <p class="text-muted" title="{{ $post->created_at }}">{{$post->created_at->diffForHumans()}}</p>
	                  </div>
	                  <div class="panel-body">
	                        @if ($post->photo)
	                          @php
	                          $path = Storage::url($post->photo->path)
	                          @endphp
	                          <img src="{{asset($path)}}" class="img-responsive">
	                        @endif
	                        <p>{{$post->content}}</p>
	                        <small>
	                        	category: 
	                        	<a href="{{ route('category', $post->category->name) }}">
	                        		<mark>{{$post->category->name}}</mark>
	                        	</a>
	                        </small>
	                   </div>

	                  {{-- comment section --}}
	                  <div class="panel-body">
	                        @include('partials.commentinput')
						<div class="row">
							<h4 class="text-center">Comments</h4>
							@include('partials.comments')
						</div>
	                  </div>
	                </div>
		        </div>
		    </div>
		</div>
	@else
		<h3 class="text-center">we couldn't find what you're looking for :^(</h3>
	@endif
@endsection