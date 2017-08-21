@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	@if (count($posts))
				@include('partials.posts')
        	@else
				<h3 class="text-center">No Posts under this category :(</h3>
        	@endif
        </div>
    </div>
</div>
@endsection
