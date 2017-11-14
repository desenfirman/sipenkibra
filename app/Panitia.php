<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
    protected $table = 'panitia';

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function ambilDataPanitia($id_panitia)
    {
    }
}
