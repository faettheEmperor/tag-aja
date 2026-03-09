<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $fillable = [
        'nama', 
        'kecamatan', 
        'kode_desa', 
        'kode_kec', 
        'kode_kab', 
        'kode_prov'
    ];
    
    public function rtRw()
    {
        return $this->hasMany(RtRw::class);
    }
}