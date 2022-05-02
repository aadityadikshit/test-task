@extends('main')
@section('title', 'Home')
@section('content')
<!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="{{url('/register')}}" role="tab"
      aria-controls="pills-register" aria-selected="false">Register</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="javascript:void();" role="tab"
      aria-controls="pills-login" aria-selected="true">Login</a>
  </li>
</ul>
<!-- Pills navs -->

<div class="tab-content">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <form action="{{url('/setlogin')}}" class="login-frm" id="login-frm" method="POST">
      @csrf
      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="loginName" name="loginName" class="form-control" />
        <label class="form-label" for="loginName">Email or username</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="loginPassword" name="loginPassword" class="form-control" />
        <label class="form-label" for="loginPassword">Password</label>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

      <div class="message">{{isset($message) ? $message : ''}}</div>

      <!-- Register buttons -->
      <div class="text-center">
        <p>Not a member? <a href="{{url('/register')}}">Register</a></p>
      </div>
    </form>
  </div>
</div>
@endsection