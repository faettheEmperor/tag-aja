<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{

    protected $fillable = [
        'number_kk',
        'ownership_kk',
        'number_of_family_member',
        'rt_address',
        'ktp_address',
        'city_address',
        'latitude',
        'longitude',
        'house_photo',
        'bpnt',
        'pkh',
        'blt_elderly',
        'blt_village',
        'other_assistance',
        'created_by',

    ];

    public function members()
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function getKepalaKeluargaAttribute()
    {
        return $this->members->firstWhere('status_in_family', 'Kepala Keluarga');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function rtRw()
    {
        return $this->belongsTo(RtRw::class, 'rt_rw_id');
    }
}
