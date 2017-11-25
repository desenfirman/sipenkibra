<?php

namespace SIPENKIBRA\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SIPENKIBRA\Juri;

class JuriController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('juri');
    }

    //Implementasi lihat dashboard
    public function index()
    {
        $juri = Juri::find(Auth::user()->id);
        $id_juri = $juri->id_juri;
        $username = $juri->username;
        $nama_juri = $juri->nama_juri;
        echo "You are authenticated as Regu Peserta";
    }

    public function tampilkanFormPenilaian($no_regu, $id_juri)
    {

    }

    public function updateNilai($aspek_penilaian, $nilai)
    {
    }

    public function submitNilai()
    {
    }
}
