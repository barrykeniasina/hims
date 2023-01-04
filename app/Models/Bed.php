<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'ward_id',
        'type',
        'code',


    ];
    
    protected $casts = [

    ];

    public function wards()
    {
        return $this->belongsTo(Visit_ward::class,'ward_id','id');
    }

}
