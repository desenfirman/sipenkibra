<?php

use App\User;
use App\Nilai;
use App\ReguPeserta;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ReguPesertaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            // Create dummy regu_peserta data table
            $username = $faker->username;
            $nama_regu = $faker->cityPrefix;
            $no_regu = $index;
            $nama_sekolah = "SMAN " . $faker->numberBetween($min = 1, $max = 10) . " " . $faker->state ;
            $nama_anggota_regu = "";
            foreach (range(1, 15) as $index) {
                $nama_anggota_regu += $faker->name . " \n";
            }
            $nama_official_regu = $faker->name;

            $user = new User([
                'username' => $username,
                'password' => bcrypt('secret'),
                'role' => 2
            ]);
            $user->save();

            $regu_peserta = new ReguPeserta([
                'username' => $username,
                'no_regu' => $no_regu,
                'nama_regu' => $nama_regu,
                'nama_sekolah' => $nama_sekolah,
                'nama_anggota_regu' => $nama_anggota_regu,
                'nama_official_regu' => $nama_official_regu,
                'status_konfirmasi' => 0
            ]);
            $regu_peserta->user()->associate($user);
            $regu_peserta->save();

            foreach (App\Juri::get() as $juri) {
                $nilai = new Nilai([
                    'no_regu' => $no_regu,
                    'id_juri' => $juri->id_juri
                ]);
                $nilai->juri()->associate($juri->id_juri);
                $nilai->regupeserta()->associate($no_regu);
                $nilai->save();
            }
        }
    }
}
