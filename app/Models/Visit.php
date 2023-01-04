<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'visitdate',
        'patient_id',
        'department_id',
        'entered_by',
        'category',
        'complaint',
        'discharge_date',
        'review_date',

    ];
    protected $casts = [
        'visitdate' => 'date',
        'discharge_date' => 'date',
        'review_date' => 'date',
    ];

    public function triages()
    {
        return $this->belongsToMany(Triage::class);
    }

    public function vitals()
    {
        return $this->hasMany(Vital::class);
    }
    public function diagnosis()
    {
        return $this->hasMany(Visit_diagnosis::class);
    }
    public function wards()
    {
        return $this->hasMany(Visit_ward::class);
    }

    public function treatments()
    {
        return $this->hasMany(Visit_treatment::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Visit_prescription::class);
    }

    public function admissions()
    {
        return $this->hasMany(Visit_admission::class);
    }

    public function labs()
    {
        return $this->hasMany(Lab::class);
    }
}
