@extends('layouts.app')

@section('content')
<br><br><br>

<div class="container" style="background-color: #f4f4f4;">
      <br><br><br>
        <center>
          <div class="col-md-4">
            <label>
              <h1> DAFTAR NO URUT <br> REGU PESERTA </h1>
              <hr>
            </label>
          </div>
                <div class="card text-white bg-info mb-3 d-flex" >
                  <div class="card-body">
                    <h5 class="card-title">Petunjuk</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
                </div>
                <br>    <br>
      </center>
      <div class="card-deck">
        @for($i = 0; $i < sizeOf($data['no_urut']); $i++)
              <div class="col-md-4" style="padding-bottom: 50px;">
                  <div class="card text-right">
                    <h6 class="card-header mb-2 text-muted">No urut</h6>
                    <div class="card-body">
                      <h1 class="card-title">{{$data['no_urut'][$i]}} </h1>
                      <a href="/juri/{{$data['no_urut'][$i]}}" class="card-link">Buka form penilaian</a>
                    </div>
                    <div class="card-footer bg-{{$data['color_code'][$i]}}">
                      <small >{{$data['status'][$i]}}</small>
                    </div>
                  </div>
              </div>
        @endfor
      </div>
      <br><br><br>
  </div>

@endsection
