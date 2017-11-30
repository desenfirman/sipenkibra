<nav class="navbar navbar-expand-lg bg-dark" style= "background-color: #002266">
  <a class="navbar-brand" style="color:white;" href="#">SIPENKIBRA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     @if (Auth::user())
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      @if (Auth::user()->role == 0)
      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#daftarReguPesertaModal">Tambah Regu peserta <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#daftarJuriModal">Tambah Juri <span class="sr-only">(current)</span></a>
      </li>
      @endif
      @if (Auth::user()->role == 2)
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdownLihatRekapNilai" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="glyphicon glyphicon-file">Lihat Rekap Nilai <span class="sr-only">(current)</span></a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownLihatRekapNilai" role="menu">
            <a class="dropdown-item" href='/regu_peserta/rekap_nilai'>Lihat Regu Peserta</a>
            <a class="dropdown-item" href='/regu_peserta/rekap_nilai_semua'>Semua Regu Peserta</a>
            <a class="dropdown-item" href='/regu_peserta/lihat_peringkat'>Lihat Peringkat</a>
          </div>
        </li>
      @endif

    </ul>
        <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{Auth::user()->username}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" role="menu">
          <a class="dropdown-item" href="/logout">Logout</a>
        </div>
      </div>
      @endif
  </div>
</nav>