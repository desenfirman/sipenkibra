<?php

use App\User;
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
            $nama_sekolah = "SMAN " . $faker->numberBetween($min = 1, $max = 10) . " " . $faker->state ;
            $nama_anggota_regu = "";
            foreach (range(1, 15)){
                $nama_anggota_regu += $faker->name . " \n";
            }
            $nama_official_regu = $faker->name;

            $user = new User([
                'username' => $username,
                'password' => bcrypt('secret');
            ]);
            $user->save();

            $reguPeserta = new ReguPeserta([
                'username' => $username,
                'nama_regu' => $nama_regu,
                'nama_sekolah' => $nama_sekolah,
                'nama_anggota_regu' => $nama_anggota_regu,
                'nama_official_regu' => $nama_official_regu,
                'status_konfirmasi' => 0
            ]);
            $reguPeserta->user()->associate($user);
            $reguPeserta->save();
        }
    }
}
