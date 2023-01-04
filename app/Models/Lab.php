<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'visit_id',
        'result_id',
        'lab_type',
        'spec_type',
        'priority',
        'profile',
        'clinical_notes',
    ];
    
    protected $casts = [

    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class,'visit_id','id');
    }

}
