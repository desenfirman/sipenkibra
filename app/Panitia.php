<?php

namespace SIPENKIBRA;

use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
    protected $table = 'panitia';
    protected $fillable = array('username', 'nama_panitia', 'id_panitia');

    public function user()
    {
        return $this->belongsTo('SIPENKIBRA\User', 'id');
    }

    public function ambilDataPanitia($id_panitia)
    {
        $panitia = Panitia::where('id_panitia', $id_panitia)->get();
        return $panitia;
    }

    public static function tambahPanitia($id_panitia, $username, $password, $nama_panitia)
    {
        $user = new User([
                    'username' => $username,
                    'password' => bcrypt($password),
                    'role' => 0
                ]);
        $user->save();

        $panitia = new Panitia([
                'id_panitia' => $id_panitia,
                'username' => $username,
                'nama_panitia' => $nama_panitia
        ]);
        $panitia->user()->associate($user);
        $panitia->save();
    }
}
