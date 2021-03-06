@extends('layouts.app')

@section('content')

<div class="container" style="background-color: #f4f4f4;">
  <br>
  @if (Session::has('submit_nilai_sukses'))
    <center>
      <div class="alert alert-success" role="alert">
        {{Session::get('submit_nilai_sukses')}}
      </div>
    </center
  @endif
  @if (Session::has('message'))
    <center>
      <div class="alert alert-warning" role="alert">
        {{Session::get('message')}}
      </div>
    </center
  @endif
  <br>
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
                    <p class="card-text">Juri tidak dapat membuka form penilaian regu peserta yang belum melakukan konfirmasi</p>
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
      <br>
  </div>
@endsection
