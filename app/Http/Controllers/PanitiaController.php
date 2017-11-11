<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('panitia');
    }


    //Implementasi Lihat Dashboard
    public function index()
    {
    }

    public function tambahRegu(Request $request)
    {
    }

    public function konfirmasi($no_regu)
    {
    }

    public function tambahJuri(Request $request)
    {
    }
}
