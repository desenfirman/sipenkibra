<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuriController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('juri');
    }
    public function index()
    {

    }

}
