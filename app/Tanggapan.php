<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $guarded = ['id'];

    public function keluhan()
    {
        return $this->belongsTo(Keluhan::class, 'keluhan_id');
    }

    public function penyuluh()
    {
        return $this->belongsTo(Penyuluh::class, 'penyuluh_id');
    }
}
