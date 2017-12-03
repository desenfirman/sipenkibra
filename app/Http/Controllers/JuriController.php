<?php

namespace SIPENKIBRA\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use SIPENKIBRA\Juri;
use SIPENKIBRA\ReguPeserta;
use SIPENKIBRA\Nilai;

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
        $juri_active_session = Juri::find(Auth::user()->id);
        $id_juri = $juri_active_session->id_juri;
        $username = $juri_active_session->username;
        $nama_juri = $juri_active_session->nama_juri;

        $no_urut = ReguPeserta::ambilDataNomorUrutSemuaReguPeserta();
        $status_konfirmasi = ReguPeserta::ambilStatusKonfirmasiSemuaReguPeserta();
        $color_code = array();
        $status = array();
        //dd($count_peserta);
        foreach ($status_konfirmasi as $key => $value) {
            $btn_color = "";
            $status_msg = "";
            if ($value == 0) {
                $status_msg = "Regu peserta belum melakukan konfirmasi";
                $btn_color = "danger";
            } else {
                $btn_color = "primary";
                $status_msg = "Regu peserta telah melakukan konfirmasi";
            }
            array_push($color_code, $btn_color);
            array_push($status, $status_msg);
        }
        $data = array(
                'no_urut' => $no_urut,
                'color_code' => $color_code,
                'status' => $status
        );
        return view('juri.dashboard')->with('data', $data);
    }

    public function tampilkanFormPenilaian($no_regu)
    {
        $juri_active_session = Juri::find(Auth::user()->id);
        $id_juri = $juri_active_session->id_juri;
        $data_regu_peserta = ReguPeserta::ambilDataReguPeserta($no_regu);
        $nilai = Nilai::ambilDataNilaiPerJuri($no_regu, $id_juri);

        return view('juri.form_penilaian')->with(compact('nilai', 'data_regu_peserta'));
    }

    public function updateNilai($no_regu, $aspek_penilaian, Request $request)
    {
        $nilai = $request->nilai;
        $juri_active_session = Juri::find(Auth::user()->id);
        $id_juri = $juri_active_session->id_juri;
        $status = Nilai::setNilai($no_regu, $id_juri, $aspek_penilaian, $nilai);

        return [
            'status' => $status
        ];
    }

    public function submitNilai($no_regu)
    {
        $juri_active_session = Juri::find(Auth::user()->id);
        $id_juri = $juri_active_session->id_juri;
        $status = Nilai::setTelahTernilaiOleh($no_regu, $id_juri);
        return redirect('/juri');
    }
}
