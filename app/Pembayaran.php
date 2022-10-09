<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $guarded = ['id'];
    public function sppd()
    {
        return $this->belongsTo(Sppd::class, 'sppd_id');
    }
    public function bendahara()
    {
        return $this->belongsTo(Bendahara::class, 'bendahara_id');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
