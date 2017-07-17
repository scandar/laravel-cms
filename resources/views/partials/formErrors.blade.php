@if (count($errors) || session('password'))
  <div class="alert alert-danger">
    <ul>
      @if (count($errors))
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      @endif
      @if (session('password'))
        <li>{{session('password')}}</li>
      @endif
    </ul>
  </div>
@endif
