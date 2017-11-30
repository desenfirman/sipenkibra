<?php

namespace SIPENKIBRA\Http\Controllers;

use Illuminate\Http\Request;
use SIPENKIBRA\ReguPeserta;

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
        $biodata_regu_peserta = ReguPeserta::ambilDataSemuaReguPeserta();
        $status_konfirmasi = ReguPeserta::ambilStatusKonfirmasiSemuaReguPeserta();

        $status_konfirmasi_msg = array();
        $color_code = array();
        foreach ($status_konfirmasi as $key => $value) {
            $msg = "Belum terkonfirmasi";
            $color = "";
            if ($value == 1) {
                $msg = "Sudah terkonfirmasi";
                $color = "success";
            }
            array_push($status_konfirmasi_msg, $msg);
            array_push($color_code, $color);
        }

        $data  = array(
                'biodata_regu_peserta' => $biodata_regu_peserta,
                'status_konfirmasi_msg' => $status_konfirmasi_msg,
                'color_code' => $color_code
        );

        return view('panitia.dashboard')->with('data', $data);
    }

    public function tambahRegu(Request $request)
    {
    }

    public function konfirmasi(Request $request)
    {
        $no_regu = $request->no_regu;
        //dd($no_regu);
        ReguPeserta::setConfirmationStatus($no_regu, 1);
        return redirect('/panitia');
    }

    public function tambahJuri(Request $request)
    {
    }
}
