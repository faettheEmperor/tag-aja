<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    protected $fillable = [
        'family_id',
        'full_name',
        'nik',
        'status_in_family',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'marital_status',
        'ethnic',
        'highest_education_level',
        'highest_education_certificate',
        'employment_status',
        'employment_position',
        'main_occupation',
        'health_insurance',
        'stunting',
        'disability',
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
