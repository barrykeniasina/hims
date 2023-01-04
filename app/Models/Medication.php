<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */



    protected $fillable = [
        'visit_id',
        'drug_name',
        'concentration',
        'entered_by',

    ];
    protected $casts = [

    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class,'visit_id','id');
    }

}
