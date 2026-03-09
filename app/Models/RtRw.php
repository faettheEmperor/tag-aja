<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RtRw extends Model
{
    protected $table = 'rt_rws';

    protected $fillable = [
        'kelurahan_id',
        'rt',
        'rw',
        'kode_sls'
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}