@extends('main')
@section('title', 'Home')
@section('content')
<!-- navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="javascript:void();" role="tab"
      aria-controls="pills-register" aria-selected="false">Register</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="tab-login" data-mdb-toggle="pill" href="{{url('/login')}}" role="tab"
      aria-controls="pills-login" aria-selected="true">Login</a>
  </li>
</ul>
<!-- navs -->

<!-- content -->
<div class="tab-content">
  <div class="tab-pane" id="pills-register" role="tabpanel" aria-labelledby="tab-register" style="display:block;">
    <form class="register-frm" id="registration-frm">
      @csrf
      <div class="text-center mb-3">

      <div class="form-outline mb-4">
        <input type="text" id="registerName" name="registerName" class="form-control" />
        <label class="form-label" for="registerName">Name</label>
      </div>

      <div class="form-outline mb-4">
        <input type="email" id="registerEmail" name="registerEmail" class="form-control" />
        <label class="form-label" for="registerEmail">Email</label>
      </div>

      <!-- Status -->
      <!-- <div class="form-outline mb-4">
        <input type="text" id="registerStatus" name="registerStatus" class="form-control" />
        <label class="form-label" for="registerStatus">Status</label>
      </div> -->

      <div class="form-outline mb-4">
        <input type="text" id="registerAddress1" name="registerAddress1" class="form-control" maxlength="50"/>
        <label class="form-label" for="registerAddress1">Address 1</label>
      </div>

      <div class="form-outline mb-4">
        <input type="text" id="registerAddress2" name="registerAddress2" class="form-control" maxlength="50"/>
        <label class="form-label" for="registerAddress2">Address 2</label>
      </div>

      <div class="form-outline mb-4">
        <input type="text" id="registerCity" name="registerCity" class="form-control" />
        <label class="form-label" for="registerCity">City</label>
      </div>

      <div class="form-outline mb-4">
        <input type="text" id="registerCountry" name="registerCountry" class="form-control" />
        <label class="form-label" for="registerCountry">Country</label>
      </div>

      <div class="form-outline mb-4">
        <input type="password" id="password" name="password" class="form-control" />
        <label class="form-label" for="password">Password</label>
      </div>

      <div class="form-outline mb-4">
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" />
        <label class="form-label" for="password_confirmation">Confirm password</label>
      </div>

      <input type="radio" name="gender" value="male"> Male<br>
      <input type="radio" name="gender" value="female"> Female<br>

      <button type="button" class="btn btn-primary btn-block mb-3" id="signin">Sign in</button>

    </form>
    <div id="messages"></div>
  </div>
</div>

@endsection
