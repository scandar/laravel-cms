@foreach ($posts as $post)
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>
        <a href="{{route('posts.show', $post)}}">{{$post->title}}</a> 
        <small><a href="{{ route('profile', $post->user->id) }}">{{$post->user->name}}</a></small>
      </h3>
      <p class="text-muted">
        <span title="{{$post->created_at}}">{{$post->created_at->diffForHumans()}}</span>
        <span title="category">
          <small>
            <a href="{{ route('category', $post->category->name) }}">
              <mark>{{$post->category->name}}</mark>
            </a>
          </small>
        </span>
      </p>
    </div>
    <div class="panel-body">
          @if ($post->photo)
            @php
            $path = Storage::url($post->photo->path)
            @endphp
            <img src="{{asset($path)}}" class="img-responsive img-rounded">
          @endif
          <p>{{$post->content}}</p>
    </div>
  </div>
@endforeach