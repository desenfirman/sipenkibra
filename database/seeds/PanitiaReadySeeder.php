<?php

use Illuminate\Database\Seeder;
use SIPENKIBRA\User;
use SIPENKIBRA\Panitia;
use Illuminate\Database\Eloquent\Model;

class PanitiaReadySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'username' => 'panitia',
            'password' => bcrypt('secret'),
            'role' => 0
        ]);
        $user->save();

        $panitia = new Panitia();
        $panitia->username = 'panitia';
        $panitia->nama_panitia = 'Panitia 1';
        $panitia->id_panitia = 1;
        $panitia->user()->associate($user);
        $panitia->save();
    }
}
