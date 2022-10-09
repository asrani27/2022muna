<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{

    protected $table = 'permohonan';
    protected $guarded = ['id'];
    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok_id');
    }
    public function penyuluh()
    {
        return $this->belongsTo(Penyuluh::class, 'penyuluh_id');
    }
    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class, 'bantuan_id');
    }
}
