<?php

use Illuminate\Database\Seeder;
use SIPENKIBRA\User;
use SIPENKIBRA\Juri;
use Illuminate\Eloquent\Database\Model;

class JuriReadySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User([
                'username' => 'iska',
                'role' => 1,
                'password' => bcrypt('secret')
            ]);
            $user->save();

            $juri = new Juri([
                'username' => 'iska',
                'id_juri' => 5,
                'nama_juri' => 'Iskarimah Hidayatin'
            ]);
            $juri->user()->associate($user);
            $juri->save();

        $user1 = new User([
                'username' => 'gema',
                'role' => 1,
                'password' => bcrypt('secret')
            ]);
            $user1->save();

            $juri1 = new Juri([
                'username' => 'gema',
                'id_juri' => 17,
                'nama_juri' => 'Gema Prajna Tri Pamungkas'
            ]);
            $juri1->user()->associate($user1);
            $juri1->save();
    }
}
