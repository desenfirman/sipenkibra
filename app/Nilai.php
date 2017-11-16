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

    public static function ambilDataNilaiPerJuri($no_regu, $id_juri)
    {
        $nilai_per_juri = Nilai::where([
            'no_regu' => $no_regu,
            'id_juri' => $id_juri
        ])->first();
        return $nilai_per_juri; //return instance of Nilai
    }

    public function setNilai($no_regu, $id_juri, $aspek_penilaian, $nilai)
    {
    }

    public static function setTelahTernilaiOleh($no_regu, $id_juri) //addition
    {
        $nilai = Nilai::ambilDataNilaiPerJuri($no_regu, $id_juri);
        $nilai->status_penilaian = 1;
        $nilai->save();
    }

    public static function ambilRekapNilai($no_regu)
    {
        $nilai_per_regu = Nilai::where(['no_regu' => $no_regu])->get();
        return $nilai_per_regu;
    }

    public static function ambilRekapNilaiSemuaRegu()
    {
        $nilais = Nilai::get();
        return $nilais;
    }

    public static function ambilStatusNilaiReguPeserta($no_regu)
    {
        $status_nilai_per_regu = Nilai::ambilRekapNilai($no_regu)->pluck('status_penilaian')->toArray();
        return $status_nilai_per_regu;
    }

    public static function ambilStatusNilaiSemuaReguPeserta()
    {
        $status_nilais = Nilai::get()->pluck('status_penilaian')->toArray();
        return $status_nilais;
    }

    public function createEntryNilai($no_regu, $id_juri)
    {
        $nilai = new Nilai([
            'no_regu' => $no_regu,
            'id_juri' => $id_juri
        ]);
        $nilai->juri()->associate($id_juri);
        $nilai->regupeserta()->associate($no_regu);
        $nilai->save();
    }
}
