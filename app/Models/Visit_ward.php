<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit_ward extends Model
{
    use HasFactory;

  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'visit_id',
        'ward_id',
        'detail',
    ];
    protected $casts = [

    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class,'visit_id','id');
    }

}
