<?php

namespace SIPENKIBRA\Http\Controllers;

use Illuminate\Http\Request;
use SIPENKIBRA\Panitia;

class RegistrasiPanitiaController extends Controller
{
    public function tambahPanitia(Request $request)
    {
        $id_panitia = $request->input('id_panitia');
        $username = $request->input('username');
        $password = $request->input('password');
        $nama_panitia = $request->input('nama_panitia');
        $input_code = $request->input('input_code');

        if ($this->authorizationCodeCheck($input_code)) {
            Panitia::tambahPanitia($id_panitia, $username, $password, $nama_panitia);
            return view('auth.login_page')->with('message', 'Panitia telah berhasil ditambahkan.');
        } else {
            return back();
        }

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
