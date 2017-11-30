@extends('layouts.app')

@section('content')
    <!-- Button trigger modal -->

<div class="container" style="background-color: #f4f4f4;">
      <br><br><br>
        <center>
          <div class="col-md-4">
            <label>
              <h1> DAFTAR <br> REGU PESERTA </h1>
              <hr>
            </label>
          </div>
                <div class="card text-white bg-info mb-3 d-flex" >
                  <div class="card-body">
                    <h5 class="card-title">Petunjuk</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
                </div>
                <br><br>
      </center>
      <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No urut regu</th>
                  <th>Nama regu</th>
                  <th>Asal sekolah</th>
                  <th>Nama official</th>
                  <th>Status Konfirmasi</th>
                  <th>Konfirmasi</th>
                </tr>
              </thead>
              <tbody>
        @for($i = 0; $i < sizeOf($data['biodata_regu_peserta']); $i++)
                <tr>
                  <td>{{($i+1)}}</td>
                  <td>{{$data['biodata_regu_peserta'][$i]['nama_regu']}}</td>
                  <td>{{$data['biodata_regu_peserta'][$i]['nama_sekolah']}}</td>
                  <td>{{$data['biodata_regu_peserta'][$i]['nama_official_regu']}}</td>
                  <td>{{$data['status_konfirmasi_msg'][$i]}}</td>
                  <td>
                    <form method="POST" action="/panitia">
                        {{csrf_field()}}
                  @if ($data['biodata_regu_peserta'][$i]['status_konfirmasi'] == 0)
                        <input type="hidden" name="no_regu" value="{{$data['biodata_regu_peserta'][$i]['no_regu']}}">
                        <input type="submit" class="btn btn-outline-primary btn-md"  value="Konfirmasi"> </input>
                  @else
                        <input type="submit" class="btn btn-outline-success btn-md" disabled value="Sudah terkonfirmasi"></input>
                  @endif
                    </form>
                    </td>
                </tr>
        @endfor
      </tbody>
    </table>
    </div>
      <br><br><br>
  </div>



@endsection
