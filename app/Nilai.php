<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';

    public function juri()
    {
        return $this->belongsTo('App\Juri', 'id_juri');
    }

    public function regupeserta()
    {
        return $this->belongsTo('App\ReguPeserta', 'no_regu');
    }


    public function ambilDataNilaiPerJuri($no_regu, $id_juri)
    {
        $nilai_per_juri = App\Nilai::where([
            'no_regu' => $no_regu,
            $id_juri => $id_juri
        ]);
        return $nilai_per_juri;
    }

    public function setNilai($no_regu, $id_juri, $aspek_penilaian, $nilai)
    {
    }

    public function setTelahTernilaiOleh($no_regu, $id_juri) //addition
    {
        $nilai_per_juri = App\Nilai::where([
            'no_regu' => $no_regu,
            $id_juri => $id_juri
        ]);
        $nilai_per_juri->status_penilaian = 1;
        $nilai_per_juri->save();
    }

    public function ambilRekapNilai($no_regu)
    {
    }

    public function ambilRekapNilaiSemuaRegu()
    {
    }

    public function ambilStatusNilaiReguPeserta($no_regu)
    {
    }

    public function ambilStatusNilaiSemuaReguPeserta()
    {
    }

    public function createEntryNilai($no_regu, $id_juri)
    {
    }
}
