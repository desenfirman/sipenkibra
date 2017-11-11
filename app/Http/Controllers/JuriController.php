<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
