<?php

namespace SIPENKIBRA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Juri extends Model
{
    protected $table = 'juri';
    protected $fillable = array('id_juri', 'nama_juri', 'username', 'role');
    public function user()
    {
        return $this->belongsTo('SIPENKIBRA\User', 'id');
    }

    public static function ambilDataJuri($id_user)
    {
        $juri = Juri::find($id_user);
        return $juri;
    }

    public static function tambahJuri($id_juri, $nama_juri, $username, $password)
    {
        $user = new User([
            'username' => $username,
            'role' => 1,
            'password' => bcrypt($password)
        ]);
        $user->save();

        $juri = new Juri([
            'username' => $username,
            'id_juri' => $id_juri,
            'nama_juri' => $nama_juri
        ]);
        $juri->user()->associate($user);
        $juri->save();
    }
}
