<?php

namespace SIPENKIBRA;

use Illuminate\Database\Eloquent\Model;

class ReguPeserta extends Model
{
    protected $table = 'regu_peserta';

    public function user()
    {
        return $this->belongsTo('SIPENKIBRA\User', 'id');
    }

    public static function ambilDataNomorUrutSemuaReguPeserta()
    {
        $regu_pesertas = ReguPeserta::get(array('id'));
        return $regu_pesertas;
    }

    public static function ambilbiodataReguPeserta($no_regu)
    {
        $regu_peserta = ReguPeserta::findOrFail($no_regu);
        return $regu_peserta;
    }

    public static function ambilStatusKonfirmasiSemuaReguPeserta()
    {
        $regu_pesertas = ReguPeserta::get(array('id', 'status_konfirmasi'));
        return $regu_pesertas;
    }

    public static function tambahRegu(Request $data_regu)
    {
        $username = $data_regu->input('username');
        $password = $data_regu->input('password');
        $nama_regu = $data_regu->input('nama_regu');
        $nama_sekolah = $data_regu->input('nama_sekolah');
        $nama_anggota_regu = $data_regu->input('nama_anggota_regu');
        $nama_official_regu = $data_regu->input('nama_official_regu');

        $user = new User([
                'username' => $username,
                'password' => $password,
            ]);
        $user->save();

        $regu_peserta = new ReguPeserta([
            'username' => $username,
            'nama_regu' => $nama_regu,
            'nama_sekolah' => $nama_sekolah,
            'nama_anggota_regu' => $nama_anggota_regu,
            'nama_official_regu' => $nama_official_regu,
            'status_konfirmasi' => 0
        ]);
        $regu_peserta->user()->associate($user);
        $regu_peserta->save();
    }

    public function setConfirmationStatus($no_regu, $status_konfirmasi)
    {
        $regu_peserta = ReguPeserta::find($no_regu);
        $regu_peserta->confirmation_status = $status_konfirmasi;
        $regu_peserta->save();
    }
}
