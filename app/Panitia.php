<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
    protected $table = 'panitia';

    public function user()
    {
        $this->belongsTo('App\User');
    }
}
