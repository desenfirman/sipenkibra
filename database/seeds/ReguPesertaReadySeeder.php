<?php

use Illuminate\Database\Seeder;
use SIPENKIBRA\User;
use SIPENKIBRA\Nilai;
use SIPENKIBRA\ReguPeserta;
use Illuminate\Database\Eloquent\Model;

class ReguPesertaReadySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
                'username' => 'dese',
                'password' => bcrypt('secret'),
                'role' => 2
            ]);
        $user->save();

        $regu_peserta = new ReguPeserta([
                'username' => 'dese',
                'no_regu' => 7,
                'nama_regu' => 'SIPEN',
                'nama_sekolah' => 'SMAN 1 Purwosari',
                'nama_anggota_regu' => "Iskarimah Hidayatin\nRidwan Fajar Widodo\nGema Prajna Tri Pamungkas",
                'nama_official_regu' => 'Dese Narfa Firmansyah',
                'status_konfirmasi' => 0
            ]);
        $regu_peserta->user()->associate($user);
        $regu_peserta->save();

        foreach (SIPENKIBRA\Juri::get() as $juri) {
                $nilai = new Nilai([
                    'no_regu' => 7,
                    'id_juri' => $juri->id_juri
                ]);
                $nilai->juri()->associate($juri->id_juri);
                $nilai->regupeserta()->associate(7);
                $nilai->save();
        }

        $user1 = new User([
                'username' => 'ridwan',
                'password' => bcrypt('secret'),
                'role' => 2
            ]);
        $user1->save();

        $regu_peserta1 = new ReguPeserta([
                'username' => 'ridwan',
                'no_regu' => 1,
                'nama_regu' => 'KIBRA',
                'nama_sekolah' => 'SMAN 37 Jakarta',
                'nama_anggota_regu' => "Dese Narfa Firmansyah\nIskarimah Hidayatin\nGema Prajna Tri Pamungkas",
                'nama_official_regu' => "Ridwan Fajar Widodo",
                'status_konfirmasi' => 1
            ]);
        $regu_peserta1->user()->associate($user1);
        $regu_peserta1->save();

        foreach (SIPENKIBRA\Juri::get() as $juri) {
                $nilai = new Nilai([
                    'no_regu' => 1,
                    'id_juri' => $juri->id_juri
                ]);
                $nilai->juri()->associate($juri->id_juri);
                $nilai->regupeserta()->associate(1);
                $nilai->save();
        }
    }
}
