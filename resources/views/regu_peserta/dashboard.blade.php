@extends('layouts.app')


@section('content')
<br><br>
<div class="container">
    <br><br><br>
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
                        <!-- <td>Nama Anggota</td>
                        <td></td> -->
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
                    <div class="alert alert-warning" role="alert">
                      <h4 class="alert-heading">Pemberitahuan</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam odio nisi, eligendi repellendus laboriosam rem distinctio nesciunt cum ipsam magni, voluptatibus praesentium sed fugiat optio, harum. Blanditiis, nam officia assumenda.</p>
                      <hr>
                      <p class="mb-0">Status Konfirmasi</p>
                    </div>
            </div>
                </div>
            </div>

            <br>
@endsection
