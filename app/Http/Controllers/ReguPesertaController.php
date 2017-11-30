<?php

namespace SIPENKIBRA\Http\Controllers;

use Illuminate\Http\Request;
use SIPENKIBRA\ReguPeserta;
use SIPENKIBRA\Nilai;
use Illuminate\Support\Facades\Auth;

class ReguPesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('regu_peserta');
    }

    //Implementasi lihat dashboard
    public function index()
    {
        $regu_peserta_active_session = ReguPeserta::find(Auth::user()->id);
        $no_regu = $regu_peserta_active_session->no_regu;
        $nama_regu = $regu_peserta_active_session->nama_regu;
        $nama_sekolah = $regu_peserta_active_session->nama_sekolah;
        $nama_official_regu =$regu_peserta_active_session->nama_official_regu;
        $nama_anggota = $regu_peserta_active_session->nama_anggota_regu;
        $status_konfirmasi = $regu_peserta_active_session->status_konfirmasi;

        $data = array(
            'no_regu' => $no_regu,
            'nama_regu' => $nama_regu,
            'nama_sekolah' => $nama_sekolah,
            'nama_official_regu' => $nama_official_regu,
            'nama_anggota' => $nama_anggota,
            'status_konfirmasi' => $status_konfirmasi
        );
        return view('regu_peserta.dashboard')->with('data', $data);
    }

    public function lihatRekapNilai()
    {
        $regu_peserta_active_session = ReguPeserta::find(Auth::user()->id);
        $no_regu = $regu_peserta_active_session->no_regu;

        $rekap_nilai = Nilai::ambilRekapNilai($no_regu)->toArray();
        $total_nilai = 0;
        foreach ($rekap_nilai as $key => $value) {
            $kategori = $value;
            //dd($kategori);
            $kategori['jumlah'] = array();
            foreach ($kategori[0] as $kriteria => $value) {
                $kategori['jumlah'][$kriteria] = 0;
                for ($i=0; $i < sizeOf($kategori) - 1 ; $i++) {
                    $kategori['jumlah'][$kriteria] += $kategori[$i][$kriteria];
                }
                $total_nilai += $kategori['jumlah'][$kriteria];
                $rekap_nilai[$key] = $kategori;
            }
        }

        $data = array(
                'rekap_nilai' => $rekap_nilai,
                'total_nilai' => $total_nilai
        );
        return view('regu_peserta.lihat_rekap_nilai')->with('data', $data);
    }

    public function lihatRekapNilaiSemuaRegu()
    {
        $rekap_nilai_semua_regu = Nilai::ambilRekapNilaiSemuaRegu();
        dd($rekap_nilai_semua_regu);
        return view('regu_peserta.lihat_rekap_nilai_semua');
    }
}
