@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
              @foreach ($posts as $post)
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
                </div>
              @endforeach
        </div>
    </div>
</div>
@endsection
