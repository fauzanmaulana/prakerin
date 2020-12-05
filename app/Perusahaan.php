<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan');
    }

    public function kelas()
    {
        return $this->hasMany('App\Kelas');
    }
}
