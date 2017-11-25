<?php

namespace SIPENKIBRA;

use Illuminate\Database\Eloquent\Model;

class Juri extends Model
{
    protected $table = 'juri';

    public function user()
    {
        return $this->belongsTo('SIPENKIBRA\User', 'id');
    }

    public function ambilDataJuri($id_juri)
    {
        $juris = Juri::all();
        return $juris;
    }

    public function tambahJuri(Request $data_juri)
    {
        $username = $data_juri->input('username');
        $nama_juri = $data_juri->input('name');
        $password = bcrypt($data_juri->input('password'));

        $user = new User([
            'username' => $username,
            'password' => $password
        ]);
        $user->save();

        $juri = new Juri([
            'username' => $username,
            'nama_juri' => $nama_juri
        ]);
        $juri->user()->associate($user);
        $juri->save();
    }
}
