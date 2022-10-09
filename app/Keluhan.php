<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    protected $table = 'keluhan';
    protected $guarded = ['id'];
    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok_id');
    }
}
