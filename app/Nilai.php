<?php

namespace SIPENKIBRA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = array('no_regu', 'id_juri');

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
            'empat_langkah_kekanan',
            'empat_langkah_kebelakang',
            'empat_langkah_kekiri',
            'empat_langkah_kedepan'
        ])->whereRaw('no_regu LIKE ? and id_juri LIKE ?', [$no_regu, $id_juri])->get();

        $nilai_gerakan_berjalan_berhenti = Nilai::select([
            'langkah_tegap',
            'langkah_bias',
            'lari_maju'
        ])->whereRaw('no_regu LIKE ? and id_juri LIKE ?', [$no_regu, $id_juri])->get();

        $nilai_gerakan_berjalan_ke_berjalan = Nilai::select([
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
            'bubar_kumpul_barisan'
        ])->whereRaw('no_regu LIKE ? and id_juri LIKE ?', [$no_regu, $id_juri])->get();

        $best_pasukan = Nilai::select([
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
            'keindaan',
            'kerumitan',
            'tingkat_kreatifitas',
            'tingkat_kesulitan',
            'konsep_PBB'
        ])->whereRaw('no_regu LIKE ? and id_juri LIKE ?', [$no_regu, $id_juri])->get();

        $best_danton = Nilai::select([
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
        //dd($nilai_per_regu);
        return $nilai_per_regu;
    }

    public static function ambilRekapNilai($no_regu)
    {
        $rekap_nilai = Nilai::ambilDataNilaiPerJuri($no_regu, '%')->toArray();
        $total_nilai = 0;
        foreach ($rekap_nilai as $key_kategori => $value) {
            $kategori = $value;
            //dd($kategori);
            $total_kategori = 0;
            $kategori['jumlah'] = array();
            foreach ($kategori[0] as $kriteria => $value) {
                $kategori['jumlah'][$kriteria] = 0;
                for ($i = 0; $i < sizeOf($kategori) - 1; $i++) {
                    $kategori['jumlah'][$kriteria] += $kategori[$i][$kriteria];
                }
                $total_kategori += $kategori['jumlah'][$kriteria];
                $rekap_nilai[$key_kategori] = $kategori;
            }

            $total_nilai += $total_kategori;
            $rekap_nilai[$key_kategori]['total_kategori'] = $total_kategori;
        }
        $data = array();
        foreach ($rekap_nilai as $key => $value) {
            $data[$key] = $value;
        }
        $data['total_nilai'] = $total_nilai;
        return $data;
    }

    public static function ambilRekapNilaiSemuaRegu()
    {
        $nilai_regu_pesertas = array();
        $regu_pesertas = ReguPeserta::all();

        foreach ($regu_pesertas as $regu_peserta) {
            $no_regu = $regu_peserta->no_regu;
            $rekap_nilai = Nilai::ambilRekapNilai($no_regu);
            $nilai_regu_pesertas[$no_regu] = $rekap_nilai;
            unset($nilai_regu_pesertas[$no_regu]['no_regu']);
        }
        return $nilai_regu_pesertas;
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
        DB::beginTransaction();
        $status = 1; //0 = success, 1 = failed
        try {
            $nilai = Nilai::where('no_regu', $no_regu)
                      ->where('id_juri', $id_juri)
                      ->update(['status_penilaian' => 1]);
            DB::commit();
            $status = 0;
        } catch (\Exception $e) {
            DB::rollback();
        } finally {
            return $status;
        }
    }

    public static function ambilStatusNilaiReguPeserta($no_regu)
    {
        $status_nilais = Nilai::where('no_regu', $no_regu)->get()->pluck('status_penilaian');
        foreach ($status_nilais as $key => $status_nilai) {
            if ($status_nilai == 0) {
                return false;
            }
        }
        return true;
    }

    public static function ambilStatusNilaiSemuaReguPeserta()
    {
        $status_nilais = Nilai::get()->pluck('status_penilaian');
        foreach ($status_nilais as $key => $status_nilai) {
            if ($status_nilai == 0) {
                return false;
            }
        }
        return true;
    }

    public static function createEntryNilai($no_regu, $id_juri)
    {
        try {
            $nilai = new \SIPENKIBRA\Nilai([
                'no_regu' => $no_regu,
                'id_juri' => $id_juri
            ]);
            $nilai->juri()->associate($id_juri);
            $nilai->regupeserta()->associate($no_regu);
            $nilai->save();
        } catch (Exception $e) {
        }
    }
}
