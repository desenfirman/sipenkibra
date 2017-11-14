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
        //return no_urut;
    }

    public function ambilbiodataReguPeserta($no_regu)
    {
    }

    public function ambilStatusKonfirmasiSemuaReguPeserta()
    {
    }

    public function tambahRegu($data_regu)
    {
    }

    public function setConfirmationStatus($no_regu, $statusKonfirmasi)
    {
    }
}
