<?php

namespace SIPENKIBRA\Http\Controllers;

use Illuminate\Http\Request;
use SIPENKIBRA\ReguPeserta;
use Illuminate\Support\Facades\DB;
use SIPENKIBRA\Juri;
use SIPENKIBRA\Nilai;

class PanitiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('panitia');
    }

    //Implementasi Lihat Dashboard
    public function lihatDashboard()
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

    public function tambahReguPeserta(Request $request)
    {
        $no_regu = (int) $request->input('no_regu');
        $username = $request->input('username');
        $password = $request->input('password');
        $nama_regu = $request->input('nama_regu');
        $nama_sekolah = $request->input('nama_sekolah');
        $nama_anggota_regu = $request->input('nama_anggota_regu');
        $nama_official_regu = $request->input('nama_official_regu');

        echo($nama_anggota_regu);
        // try {
        $status = 1;
        $status_tambah_regu = ReguPeserta::tambahRegu(
                $no_regu,
                $username,
                $password,
                $nama_regu,
                $nama_sekolah,
                $nama_anggota_regu,
                $nama_official_regu
            );

        $status_tambah_nilai = 1;
        $juris = Juri::all();
        foreach ($juris as $juri) {
            $status_tambah_nilai = Nilai::createEntryNilai($no_regu, $juri->id_juri);
            if ($status_tambah_nilai == 1) {
                break;
            }
        }
        if ($status_tambah_regu == 0 && $status_tambah_nilai == 0) {
            return redirect('/panitia')->with('message', 'Regu peserta telah berhasil ditambahkan');
        }
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
        $id_juri = $request->input('id_juri');
        $nama_juri = $request->input('nama_juri');
        $username = $request->input('username');
        $password = $request->input('password');

        // try {
        $status = 1;
        $status_tambah_juri = Juri::tambahJuri(
                $id_juri,
                $nama_juri,
                $username,
                $password
            );

        $regu_pesertas = ReguPeserta::all();
        foreach ($regu_pesertas as $regu_peserta) {
            $status_tambah_nilai = Nilai::createEntryNilai($regu_peserta->no_regu, $id_juri);
            if ($status_tambah_nilai == 1) {
                break;
            }
        }
        if ($status_tambah_juri == 0 && $status_tambah_nilai == 0) {
            $status = 0;
            return redirect('/panitia')->with('message', 'Juri telah berhasil ditambahkan');
        }
    }
}
