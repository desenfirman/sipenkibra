<?php

namespace SIPENKIBRA\Http\Controllers;

use Illuminate\Http\Request;

class RegistrasiPanitiaController extends Controller
{

    public function tambahPanitia(Request $request)
    {
        // if (code == true) {

        // }
    }

    public function authorizationCodeCheck($code)
    {
        if ($code == '1234') {
            return true;
        }
        return false;
    }

}
