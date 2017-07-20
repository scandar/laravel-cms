@if (session('success'))
  <div class="alert alert-success">
    <p>{{session('success')}}</p>
  </div>
@endif
@if (session('error'))
  <div class="alert alert-danger">
    <p>{{session('error')}}</p>
  </div>
@endif
