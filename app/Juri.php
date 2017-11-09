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

    public function ambilDataJuri($id_juri)
    {

    }

    public function tambahJuri($data_juri)
    {

    }


}
