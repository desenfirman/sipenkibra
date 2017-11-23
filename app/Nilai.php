<?php

namespace SIPENKIBRA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nilai extends Model
{
    protected $table = 'nilai';

    public function juri()
    {
        return $this->belongsTo('SIPENKIBRA\Juri', 'id_juri');
    }

    public function regupeserta()
    {
        return $this->belongsTo('SIPENKIBRA\ReguPeserta', 'no_regu');
    }

    public static function ambilDataNilaiPerJuri($no_regu, $id_juri)
    {
        $nilai_gerakan_ditempat = Nilai::select([
            'no_regu',
            'id_juri',
            'istirahat_ditempat',
            'sikap_sempurna',
            'periksa_kerapian',
            'hormat',
            'berhitung',
            'setengah_lengan_lencang_kanan',
            'setengah_lengan_lencang_kiri',
            'lencang_kanan',
            'lencang_kiri',
            'hadap_kanan',
            'lencang_depan',
            'hadap_kiri',
            'hadap_serong_kanan',
            'hadap_serong_kiri',
            'balik_kanan',
            'jalan_ditempat'
        ])->whereRaw('no_regu LIKE ? and id_juri LIKE ?', [$no_regu, $id_juri])->get();

        $nilai_gerakan_berpindah_tempat = Nilai::select([
            'no_regu',
            'id_juri',
            'empat_langkah_kekanan',
            'empat_langkah_kebelakang',
            'empat_langkah_kekiri',
            'empat_langkah_kedepan'
        ])->whereRaw('no_regu LIKE ? and id_juri LIKE ?', [$no_regu, $id_juri])->get();

        $nilai_gerakan_berjalan_berhenti = Nilai::select([
            'no_regu',
            'id_juri',
            'langkah_tegap',
            'langkah_bias',
            'lari_maju'
        ])->whereRaw('no_regu LIKE ? and id_juri LIKE ?', [$no_regu, $id_juri])->get();

        $nilai_gerakan_berjalan_ke_berjalan = Nilai::select([
            'no_regu',
            'id_juri',
            'langkah_bias_kelangkah_tegap',
            'langkah_tegap_kehormat_kanan',
            'langkah_tegap_kelangkah_biasa',
            'langkah_perlahan',
            'ganti_langkah',
            'tiap_banjar_dua_kali_belok',
            'dua_kali_belok_kanan_atau_kiri',
            'buka_atau_tutup_barisan',
            'melintang_kanan_atau_kiri',
            'haluan_kanan_atau_kiri'
        ])->whereRaw('no_regu LIKE ? and id_juri LIKE ?', [$no_regu, $id_juri])->get();

        $gerakan_tambahan = Nilai::select([
            'no_regu',
            'id_juri',
            'bubar_kumpul_barisan'
        ])->whereRaw('no_regu LIKE ? and id_juri LIKE ?', [$no_regu, $id_juri])->get();

        $best_pasukan = Nilai::select([
            'no_regu',
            'id_juri',
            'kerapian_saff_dan_banjar',
            'keseragaman',
            'kekompakan',
            'penguasaan_teknik_pbb',
            'postur_tubuh_pasukan',
            'kegagahan',
            'hasil_akhir',
            'kualitas',
            'keserasian'
        ])->whereRaw('no_regu LIKE ? and id_juri LIKE ?', [$no_regu, $id_juri])->get();

        $best_variasi_dan_formasi = Nilai::select([
            'no_regu',
            'id_juri',
            'keindaan',
            'kerumitan',
            'tingkat_kreatifitas',
            'tingkat_kesulitan',
            'konsep_PBB'
        ])->whereRaw('no_regu LIKE ? and id_juri LIKE ?', [$no_regu, $id_juri])->get();

        $best_danton = Nilai::select([
            'no_regu',
            'id_juri',
            'sikap',
            'ketegasan_aba_aba',
            'kelantangan_aba_aba',
            'penguasaan_pasukan',
            'ketenangan',
            'penguasaan_aba_aba'
        ])->whereRaw('no_regu LIKE ? and id_juri LIKE ?', [$no_regu, $id_juri])->get();

        $nilai_per_regu = collect([
            'nilai_gerakan_ditempat' => $nilai_gerakan_ditempat,
            'nilai_gerakan_berpindah_tempat' =>  $nilai_gerakan_berpindah_tempat,
            'nilai_gerakan_berjalan_berhenti' =>  $nilai_gerakan_berjalan_berhenti,
            'nilai_gerakan_berjalan_ke_berjalan' =>  $nilai_gerakan_berjalan_ke_berjalan,
            'gerakan_tambahan' =>  $gerakan_tambahan,
            'best_pasukan' =>  $best_pasukan,
            'best_variasi_dan_formasi' =>  $best_variasi_dan_formasi,
            'best_danton' =>  $best_danton
        ]);
        return $nilai_per_regu;
    }

    public static function setNilai($no_regu, $id_juri, $aspek_penilaian, $nilai)
    {
        DB::beginTransaction();
        $status = 1; //0 = success, 1 = failed
        try {
            $affected = DB::update("UPDATE nilai SET $aspek_penilaian = ? WHERE no_regu = ? AND id_juri = ?", [$nilai, $no_regu, $id_juri]);
            DB::commit();
            $status = 0;
        } catch (\Exception $e) {
            DB::rollback();
        } finally {
            return $status;
        }
    }

    public static function setTelahTernilaiOleh($no_regu, $id_juri) //addition
    {
        $nilai;
        $nilai->status_penilaian = 1;
        $nilai->save();
    }

    public static function ambilRekapNilai($no_regu)
    {
        return Nilai::ambilDataNilaiPerJuri($no_regu, '%');
    }

    public static function ambilRekapNilaiSemuaRegu()
    {
        return Nilai::ambilRekapNilai('%');
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
