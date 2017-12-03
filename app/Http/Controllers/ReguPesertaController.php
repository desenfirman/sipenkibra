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

        if (ReguPeserta::ambilStatusKonfirmasiReguPeserta($no_regu) == 0) {
            return back();
        } else {
            $rekap_nilai = Nilai::ambilRekapNilai($no_regu);
            //dd($data);
            return view('regu_peserta.lihat_rekap_nilai')->with('rekap_nilai', $rekap_nilai);
        }
    }

    public function lihatRekapNilaiSemuaRegu()
    {
        $regu_pesertas = ReguPeserta::all();
        $rekap_nilai = Nilai::ambilRekapNilaiSemuaRegu();
        //dd($rekap_nilai_semua_regu);

        foreach ($regu_pesertas as $key => $regu_peserta) {
            foreach ($rekap_nilai[$regu_peserta->no_regu] as $kriteria_key => $value) {
                if ($kriteria_key == "total_nilai" || $kriteria_key == "nama_regu" || $kriteria_key == "nama_sekolah") {
                    continue;
                }
                $rekap_nilai[$regu_peserta->no_regu][$kriteria_key] = $value['total_kategori'];
            }
            $rekap_nilai[$regu_peserta->no_regu] = array('nama_sekolah' => $regu_peserta->nama_sekolah) + $rekap_nilai[$regu_peserta->no_regu];
            $rekap_nilai[$regu_peserta->no_regu] = array('nama_regu' => $regu_peserta->nama_regu) + $rekap_nilai[$regu_peserta->no_regu];
        }
        return view('regu_peserta.lihat_rekap_nilai_semua')->with('rekap_nilais', $rekap_nilai);
    }

    public function lihatPeringkat()
    {
        $regu_pesertas = ReguPeserta::all();
        $rekap_nilai = Nilai::ambilRekapNilaiSemuaRegu();
        $peringkat = array();
        foreach ($regu_pesertas as $key => $value) {
            $peringkat[$key]['no_regu'] = $value->no_regu;
            $peringkat[$key]['nama_regu'] = $value->nama_regu;
            $peringkat[$key]['nama_sekolah'] = $value->nama_sekolah;
            $peringkat[$key]['rekap_nilai'] = $rekap_nilai[$value->no_regu];
        }
        //dd($peringkat);
        $length = count($peringkat);
        for ($j = 0; $j < $length-1; $j++) {
            $iMax = $j;
            for ($i = $j+1; $i < $length; $i++) {
                if ($peringkat[$i]['rekap_nilai']['total_nilai'] > $peringkat[$iMax]['rekap_nilai']['total_nilai']) {
                    $iMax = $i;
                }
            }
            if ($iMax != $j) {
                $temp = $peringkat[$j];
                $peringkat[$j] = $peringkat[$iMax];
                $peringkat[$iMax] = $temp;
            }
        }
        return view('regu_peserta.lihat_peringkat')->with('peringkat', $peringkat);
    }
}
