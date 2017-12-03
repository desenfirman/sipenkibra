@extends('layouts.app')

@section('content')
    <div class="container">
      <form class="modal-body" method="POST" action="/panitia/tambahregupeserta">
        {{csrf_field()}}
        <div class="login-from">
              <div class="form-group">
                  <label >No. Urut</label>
                  <input type="number" class="form-control" name="noUrut" placeholder="No Urut" value="0" />
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
                  <div class="col-md-8"><input type="text" class=" form-control" name="namaSekolah" placeholder="Nama sekolah" /></div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama Regu Peserta</label>
                  <div class="col-md-8"><input type="text" class=" form-control" name="namaReguPeserta" placeholder="Nama regu peserta" /></div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama Anggota Peserta</label>
                  <div class="col-md-8"><textarea class="form-control" id="namaAnggotaPeserta" rows="3" placeholder="Nama-nama anggota regu"></textarea></div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama Official Regu</label>
                  <div class="col-md-8"><input type="text" class=" form-control" name="namaOfficial" placeholder="Nama official regu" /></div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><span>Menambahkan Regu Peserta</span></button>
      </div>
    </form>
    </div>
@endsection
