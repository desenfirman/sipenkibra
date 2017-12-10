@extends('layouts.app')


@section('content')
<div class="container">
    <br>
    @if (Session::has('message'))
    <center>
      <div class="alert alert-warning" role="alert">
        {{Session::get('message')}}
      </div>
    </center
    @endif
    <br><br>
    <center><h1>DATA DIRI REGU PESERTA</h1></center>
    <br>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-2 col-lg-2 " align="center"></div>
                <div class=" col-md-8 col-lg-8 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>No. regu</td>
                        <td>{{$data['no_regu']}}</td>
                      </tr>
                      <tr>
                        <td>Nama Regu:</td>
                        <td>{{$data['nama_regu']}}</td>
                      </tr>
                      <tr>
                        <td>Asal Sekolah</td>
                        <td>{{$data['nama_sekolah']}}</td>
                      </tr>
                      <tr>
                        <td>Nama Official</td>
                        <td>{{$data['nama_official_regu']}}</td>
                      </tr>
                       <tr>
                        <td>Nama Anggota</td>
                        <td><?php echo $data['nama_anggota']; ?> </td>
                       </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <br>
              <br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <div class="alert alert-info" role="alert">
                    <p>
                      {{$data['msg_status_konfirmasi']}}
                    </p>
                  </div>
                  <div class="alert alert-info" role="alert">
                    <p>
                      {{$data['msg_nilai']}}
                    </p>
                 </div>
                 <div class="alert alert-info" role="alert">
                    <p>
                      {{$data['msg_nilai_semua_regu']}}
                    </p>
                 </div>
                 <div class="alert alert-info" role="alert">
                    <p>
                      {{$data['msg_peringkat']}}
                    </p>
                 </div>
            </div>
            </div>
            <br>
          </div>

@endsection
