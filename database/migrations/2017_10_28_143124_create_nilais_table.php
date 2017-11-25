<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_regu');
            $table->integer('id_juri');
            $table->integer('status_penilaian')->default(0);


            //kriteria penilaian

            //gerakan ditempat
            $table->integer('istirahat_ditempat')->default(0);
            $table->integer('sikap_sempurna')->default(0);
            $table->integer('periksa_kerapian')->default(0);
            $table->integer('hormat')->default(0);
            $table->integer('berhitung')->default(0);
            $table->integer('setengah_lengan_lencang_kanan')->default(0);
            $table->integer('setengah_lengan_lencang_kiri')->default(0);
            $table->integer('lencang_kanan')->default(0);
            $table->integer('lencang_kiri')->default(0);
            $table->integer('hadap_kanan')->default(0);
            $table->integer('lencang_depan')->default(0);
            $table->integer('hadap_kiri')->default(0);
            $table->integer('hadap_serong_kanan')->default(0);
            $table->integer('hadap_serong_kiri')->default(0);
            $table->integer('balik_kanan')->default(0);
            $table->integer('jalan_ditempat')->default(0);

            //gerakan berpindah tempat
            $table->integer('empat_langkah_kekanan')->default(0);
            $table->integer('empat_langkah_kebelakang')->default(0);
            $table->integer('empat_langkah_kekiri')->default(0);
            $table->integer('empat_langkah_kedepan')->default(0);

            //gerakan berjalan berhenti
            $table->integer('langkah_tegap')->default(0);
            $table->integer('langkah_bias')->default(0);
            $table->integer('lari_maju')->default(0);

            //
            $table->integer('langkah_bias_kelangkah_tegap')->default(0);
            $table->integer('langkah_tegap_kehormat_kanan')->default(0);
            $table->integer('langkah_tegap_kelangkah_biasa')->default(0);
            $table->integer('langkah_perlahan')->default(0);
            $table->integer('ganti_langkah')->default(0);
            $table->integer('tiap_banjar_dua_kali_belok')->default(0);
            $table->integer('dua_kali_belok_kanan_atau_kiri')->default(0);
            $table->integer('buka_atau_tutup_barisan')->default(0);
            $table->integer('melintang_kanan_atau_kiri')->default(0);
            $table->integer('haluan_kanan_atau_kiri')->default(0);

            //gerakan tambahan
            $table->integer('bubar_kumpul_barisan')->default(0);

            //best pasukan
            $table->integer('kerapian_saff_dan_banjar')->default(0);
            $table->integer('keseragaman')->default(0);
            $table->integer('kekompakan')->default(0);
            $table->integer('penguasaan_teknik_pbb')->default(0);
            $table->integer('postur_tubuh_pasukan')->default(0);
            $table->integer('kegagahan')->default(0);
            $table->integer('hasil_akhir')->default(0);
            $table->integer('kualitas')->default(0);
            $table->integer('keserasian')->default(0);

            //best variasi & formasi
            $table->integer('keindaan')->default(0);
            $table->integer('kerumitan')->default(0);
            $table->integer('tingkat_kreatifitas')->default(0);
            $table->integer('tingkat_kesulitan')->default(0);
            $table->integer('konsep_PBB')->default(0);

            //best_danton
            $table->integer('sikap')->default(0);
            $table->integer('ketegasan_aba_aba')->default(0);
            $table->integer('kelantangan_aba_aba')->default(0);
            $table->integer('penguasaan_pasukan')->default(0);
            $table->integer('ketenangan')->default(0);
            $table->integer('penguasaan_aba_aba')->default(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
