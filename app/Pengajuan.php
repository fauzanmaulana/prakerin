<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan');
    }
}
