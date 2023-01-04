<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'department_desc',

    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

}
