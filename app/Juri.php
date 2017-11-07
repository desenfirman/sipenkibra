<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juri extends Model
{
    protected $table = 'juri';

    public function user()
    {
        $this->belongsTo('App\User');
    }
}
