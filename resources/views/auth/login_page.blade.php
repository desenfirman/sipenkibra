@extends('layouts.app')

@section('content')

  <div class="container-fluid">
      <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-4" style="background-color: #f4f4f4; padding: 40px;">
          <h2> Apa itu SIPENKIBRA</h2>
          <hr>
          <p>   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non quidem saepe fugit. Nobis voluptates molestias aut praesentium est, dolore nulla perferendis iste velit culpa saepe sit unde amet voluptatibus provident, qui vel, perspiciatis possimus consequuntur. Distinctio, aspernatur earum aperiam aut optio quisquam dolorum nobis inventore. Quidem necessitatibus consectetur quas neque.</p>
      </div>
      <div class="col-lg-4" style="background-color: #f4f4f4; padding: 40px;">
          <h3><em class="glyphicon glyphicon-user"></em> LOGIN</h3>
          <hr>
          <form class="" method="POST" action="/">
            {{ csrf_field() }}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" />
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" />
                  <br>
                  @if ($errors->has('password'))
                    <div class="alert alert-warning" role="alert">
                        Login gagal.
                    </div>
                  @endif
                  @if (Session:has('message'))
                    <div class="alert alert-warning" role="alert">
                        {{Session:get('message')}}
                    </div>
                  @endif
              </div>
             <div class="text-right">
                  <button type="submit" class="btn btn-primary"><span>Login</span></button>
              </div>
            </form>
      </div>
      </div>
  </div>
@endsection
