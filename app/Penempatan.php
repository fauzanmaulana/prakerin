<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penempatan extends Model
{
    protected $fillable = ['perusahaan_id', 'siswa_id'];


    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }
}
