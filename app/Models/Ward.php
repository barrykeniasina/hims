<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'department_id',
        'ward_detail',


    ];

    public function departments()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function beds()
    {
        return $this->hasMany(Bed::class);
    }

    //Admission
    public function refered_from()
    {
        return $this->hasOne(Visit_admission::class, 'id','refered_from');
    }

    public function refered_to()
    {
        return $this->hasOne(Visit_admission::class, 'id', 'ward_id');
    }

}
