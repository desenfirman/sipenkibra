<?php

namespace SIPENKIBRA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReguPeserta extends Model
{
    protected $table = 'regu_peserta';
    protected $fillable = array('no_regu', 'username', 'nama_regu', 'nama_sekolah', 'nama_anggota_regu', 'nama_official_regu');

    public function user()
    {
        return $this->belongsTo('SIPENKIBRA\User', 'id');
    }

    public static function ambilDataNomorUrutSemuaReguPeserta()
    {
        $regu_pesertas = ReguPeserta::pluck('no_regu');
        return $regu_pesertas->toArray();
    }

    public static function ambilDataReguPeserta($no_regu)
    {
        $regu_peserta = ReguPeserta::where('no_regu', $no_regu)->first();
        return $regu_peserta;
    }

    public static function ambilDataSemuaReguPeserta()
    {
        $regu_peserta = ReguPeserta::all();
        return $regu_peserta->toArray();
    }

    public static function ambilStatusKonfirmasiReguPeserta($no_regu)
    {
        $regu_peserta = ReguPeserta::where('no_regu', $no_regu)->first();
        return $regu_peserta->status_konfirmasi;
    }

    public static function ambilStatusKonfirmasiSemuaReguPeserta()
    {
        $regu_pesertas = ReguPeserta::pluck('status_konfirmasi');
        return $regu_pesertas->toArray();
    }

    public static function tambahRegu($no_regu, $username, $password, $nama_regu, $nama_sekolah, $nama_anggota_regu, $nama_official_regu)
    {
        $status = 1; //0 = success, 1 = failed
        // try {
        $user = new User([
                    'username' => $username,
                    'password' => bcrypt($password),
                    'role' => 2
                ]);
        $user->save();

        $regu_peserta = new ReguPeserta([
                'no_regu' => $no_regu,
                'username' => $username,
                'nama_regu' => $nama_regu,
                'nama_sekolah' => $nama_sekolah,
                'nama_anggota_regu' => $nama_anggota_regu,
                'nama_official_regu' => $nama_official_regu
            ]);
        $regu_peserta->user()->associate($user);
        $regu_peserta->save();
        $status = 0;
        // } catch (Exception $e) {
        // } finally {
        //     return $status;
        // }
    }

    public static function setConfirmationStatus($no_regu, $status_konfirmasi)
    {
        $regu_peserta = ReguPeserta::where('no_regu', $no_regu)->update(['status_konfirmasi' => $status_konfirmasi]);
    }
}
