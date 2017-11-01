<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('panitia');
    }
}
