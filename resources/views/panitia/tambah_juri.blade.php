@extends('layouts.app')

@section('content')
<br>
<br>
<div class="container">
      <br><br>
        <center>
          <h1>Form Tambah Juri</h1>
        </center>
      <form class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">
          <br><br>
              <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama Juri</label>
                  <div class="col-md-8"><input type="text" class=" form-control" name="namaJuri" placeholder="Nama juri" /></div>
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
              <button type="submit" class="btn btn-primary"><span>Menambahkan Juri</span></button>
          </div>

    </form>
    <br>
          <br>
          <br>
          <br>
    </div>
@endsection
