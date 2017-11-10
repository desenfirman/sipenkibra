@extends('layout.master')

@section('content')
    <!-- Main -->
      <section id="main" class="wrapper" >
        <div class="container">
            <h2 style="text-align: center;">Login Page</h2>
            <form action="/login" method="POST" style="margin-left:35%;
            margin-right:35%;max-width: 100%;">
            {{csrf_field()}}
              <input id="email" size="50" type="email" name="email" placeholder="email">
              <br>
              <input id="password" type="password" name="password" placeholder="password">
              <br>
              <div style="text-align: right;">
                <input type="submit" value="Login" \>
              <div>
              <br>
              <p style="text-align:center;">Don't have an account? <a href="/register">Sign Up</a></p>
            </form>
          </div>
        </div>
      </section>
@endsection
