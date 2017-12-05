@extends('layouts.app')

@section('content')
    <div class="container">
        <br><br>
      <center>
          <h1>Form Tambah Regu Peserta</h1>
        </center>
      <form id="tambahregupeserta" class="modal-body" method="POST" action="/panitia/tambah_regu_peserta">
        {{csrf_field()}}
        <div class="login-from">
              <div class="form-group">
                  <label >No. Urut</label>
                  <input type="number" class="form-control" step="any" name="no_regu" placeholder="No Urut" value="0" />
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label class="col-form-label">Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Username" />
                  </div>
                  <div class="form-group col-md-6">
                      <label class="col-form-label">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password" />
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama Sekolah</label>
                  <div class="col-md-8"><input type="text" class="form-control" name="nama_sekolah" placeholder="Nama sekolah" /></div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama Regu Peserta</label>
                  <div class="col-md-8"><input type="text" class="form-control" name="nama_regu" placeholder="Nama regu peserta" /></div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama Anggota Peserta</label>
                  <div class="col-md-8"><textarea class="form-control" name="nama_anggota_regu" rows="3" placeholder="Nama-nama anggota regu" form="tambahregupeserta"></textarea></div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama Official Regu</label>
                  <div class="col-md-8"><input type="text" class=" form-control" name="nama_official_regu" placeholder="Nama official regu" /></div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><span>Menambahkan Regu Peserta</span></button>
      </div>
    </form>
    </div>
@endsection
