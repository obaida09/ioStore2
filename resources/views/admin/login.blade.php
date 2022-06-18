@extends('admin.layouts.auth')

@section('auth-content')



<div class="card-body p-0">
  <!-- Nested Row within Card Body -->
  <div class="row">
    <div class="col-lg-12">
      <div class="p-5">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
        </div>
        <form action="{{ route('login') }}" method="post" class="user">
          @csrf
          <div class="form-group">
            <input type="email" name='email' class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
          </div>
          <div class="form-group">
            <input type="password" name='password' class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="custom-control custom-checkbox small">
              <input type="checkbox" class="custom-control-input" name='remember' id="customCheck">
              <label class="custom-control-label" for="customCheck">Remember
                Me</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-user btn-block">
            Login
          </button>
          <hr>
        </form>
        <div class="text-center">
          <a class="small" href="{{ route('admin.forgotPassword') }}">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection
