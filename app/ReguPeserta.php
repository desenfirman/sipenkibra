<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReguPeserta extends Model
{
    protected $table = 'regu_peserta';

    public function user()
    {
        $this->belongsTo('App\User');
    }

}
