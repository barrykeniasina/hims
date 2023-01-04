<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit_admission extends Model
{
    use HasFactory;

  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'visit_id',
        'type',
        'admission_by',
        'refered_from',
        'ward_id',
        'user_id',
        'entered_by',
        'transport',
        'remarks',
        'approved',


    ];
    protected $casts = [

    ];

    //visit
    public function visit()
    {
        return $this->belongsTo(Visit::class,'visit_id','id');
    }


/*
    //User
    public function admission_by()
    {
        return $this->belongsTo(User::class,'admission_by','id');
    }
    
    public function doctor_incharge()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function entered_by()
    {
        return $this->belongsTo(User::class,'entered_by','id');
    }   



    //Ward
    public function refered_from()
    {
       // return $this->belongsTo(Ward::class,'refered_from','id');
    } 


    public function refered_to()
    {
      //  return $this->belongsTo(Ward::class,'ward_id','id');
    } 
*/
}
