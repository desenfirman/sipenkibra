@extends('layouts.app')

@section('content')
  <br><br><br>

  <div class="container" style="background-color: #f4f4f4;">
      <br><br><br>
      <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-5">
          <h2> Apa itu SIPENKIBRA</h2>
          <hr>
          <p>   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non quidem saepe fugit. Nobis voluptates molestias aut praesentium est, dolore nulla perferendis iste velit culpa saepe sit unde amet voluptatibus provident, qui vel, perspiciatis possimus consequuntur. Distinctio, aspernatur earum aperiam aut optio quisquam dolorum nobis inventore. Quidem necessitatibus consectetur quas neque.</p>
      </div>
      <div class="col-lg-5">
          <form class="" method="POST" action="/">
            {{ csrf_field() }}
          <h3><em class="glyphicon glyphicon-user"></em> LOGIN</h3>
          <hr>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" />
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" />
              </div>
             <div class="text-right">
                  <button type="submit" class="btn btn-primary"><span>Login</span></button>
              </div>
            </form>
      </div>
      </div>
      <br><br><br>
  </div>
@endsection
