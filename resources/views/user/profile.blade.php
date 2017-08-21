@extends('layouts.app')

@section('content')
	@if ($user)
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					@if ($user->photo)
						@php
							$path = Storage::url($user->photo->path)
						@endphp
						<img src="{{asset($path)}}" class="img-responsive img-rounded">
					@endif
						<h3>{{$user->name}}</h3>
						<small title="{{$user->created_at}}">Joined: {{$user->created_at->diffForHumans()}}</small>
				</div>
				<div class="col-md-10">
					
					@if (count($user->posts))
						<h4 class="text-center">{{$user->name}}'s Posts</h4>
						@include('partials.posts')
					@else 
						<h4 class="text-center">{{$user->name}} has no posts yet :(</h4>
					@endif
				</div>
			</div>
		</div>
	@else
		<h3 class="text-center">User not found :(</h3>
	@endif
@endsection