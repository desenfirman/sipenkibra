<?php

use SIPENKIBRA\User;
use SIPENKIBRA\Juri;
use Illuminate\Eloquent\Database\Model;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class JuriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 2) as $index) {
            // Create dummy juri data table
            $username = $faker->username;
            $nama_juri = $faker->name;

            $user = new User([
                'username' => $username,
                'role' => 1,
                'password' => bcrypt('secret')
            ]);
            $user->save();

            $juri = new Juri([
                'username' => $username,
                'id_juri' => $index,
                'nama_juri' => $nama_juri
            ]);
            $juri->user()->associate($user);
            $juri->save();
        }
    }
}
