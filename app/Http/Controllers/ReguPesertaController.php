<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReguPesertaController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('regu_peserta');
    }
}
