<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReguPeserta extends Model
{
    protected $table = 'regu_peserta';

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function ambilDataNomorUrutSemuaReguPeserta()
    {
        $regu_pesertas = ReguPeserta::all()->only(['id']);
        return $regu_pesertas;
    }

    public function ambilbiodataReguPeserta($no_regu)
    {
        $regu_pesertas = ReguPeserta::all()->except(['status_konfirmasi']);
        return $regu_pesertas;
    }

    public function ambilStatusKonfirmasiSemuaReguPeserta()
    {
        $regu_pesertas = ReguPeserta::all()->only(['id', 'status_konfirmasi']);
        return $regu_pesertas;
    }

    public function tambahRegu(Request $data_regu)
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

        $regu_peserta = new ReguPeserta();
        $regu_peserta->username = $username;
        $regu_peserta->nama_regu = $nama_regu;
        $regu_peserta->nama_sekolah = $nama_sekolah;
        $regu_peserta->nama_anggota_regu = $nama_anggota_regu;
        $regu_peserta->nama_official_regu = $nama_official_regu;
        $regu_peserta->status_konfirmasi = 0;
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
