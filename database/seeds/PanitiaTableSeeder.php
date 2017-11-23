<?php

use SIPENKIBRA\User;
use SIPENKIBRA\Panitia;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PanitiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // Create dummy panitia data table
        $username = $faker->username;
        $nama_panitia = $faker->name;

        $user = new User([
            'username' => $username,
            'password' => bcrypt('secret'),
            'role' => 0
        ]);
        $user->save();

        $panitia = new Panitia();
        $panitia->username = $username;
        $panitia->nama_panitia = $nama_panitia;
        $panitia->user()->associate($user);
        $panitia->save();
    }
}
