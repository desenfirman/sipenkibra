<?php

namespace SIPENKIBRA\Http\Controllers;

use Illuminate\Http\Request;

class ReguPesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('regu_peserta');
    }

    //Implementasi lihat dashboard
    public function index()
    {
        echo "You are authenticated as Regu Peserta";
    }

    public function lihatRekapNilai()
    {
    }

    public function lihatRekapNilaiSemuaRegu()
    {
    }

    public function unduhRekapNilai()
    {
    }

    public function lihatPemberitahuan()
    {
    }
}
