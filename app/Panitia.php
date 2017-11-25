<?php

namespace SIPENKIBRA;

use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
    protected $table = 'panitia';

    public function user()
    {
        return $this->belongsTo('SIPENKIBRA\User', 'id');
    }

    public function ambilDataPanitia($id_panitia)
    {
        $panitias = Panitia::all();
        return $panitias;
    }
}
