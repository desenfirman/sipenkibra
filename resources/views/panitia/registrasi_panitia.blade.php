@extends('layouts.app')

@section('content')

<br><br>
	<div class = "container">
    <div class = "row">
      <div class="col-md-2"></div>
      <form class="col-md-8 login-from" method="POST" action="/tambah_panitia">
        {{csrf_field()}}
        <br><br>
          <h3><em class="glyphicon glyphicon-user"></em> REGISTRASI PANITIA</h3>
          <br>
              <div class="form-group">
                  <label >Id Panitia</label>
                  <input type="number" class="form-control" step="any" name="id_panitia" placeholder="No Urut" value="0" />
              </div>
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Username" />
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" />
              </div>
              <div class="form-group">
                  <label>Ulangi Password</label>
                  <input type="password" class="form-control" name="ulangi_password" placeholder="Password" />
              </div>
			         <div class="form-group">
                  <label>Nama Panitia</label>
                  <input type="text" class="form-control" name="nama_panitia" placeholder="Nama panitia" />
              </div>
              <div class="form-group">
                  <label>Kode Otorisasi</label>
                  <input type="password" class="form-control" name="input_code" placeholder="Kode Otorisasi" />
              </div>
             <div class="text-right">
                  <button type="submit" class="btn btn-primary"><span>Registrasi</span></button>
              </div>
        </form>
    </div>
    <br>
</div>
<br>
@endsection
