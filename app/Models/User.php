<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_role_id',
        'user_department_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'user_role_id', 'id');
    }


    //admission
    public function admission_by()
    {
        return $this->hasOne(Visit_admission::class, 'id', 'admission_by');
    }

    public function doctor_incharge()
    {
        return $this->hasOne(Visit_admission::class, 'id', 'user_id');
    }

    public function entered_by()
    {
        return $this->hasOne(Visit_admission::class, 'id', 'entered_by');
    }

















    public function hasAnyRole($role)
    {
        return null !== $this->role()->where('role_desc',$role)->first();
    }


    public function hasAnyRoles($role)
    {
        return null !== $this->role()->where('role_desc',$role)->first();
    }



    //Department LAB
    public function department()
    {
        return $this->belongsTo(Department::class, 'user_department_id', 'id');
    }

    public function hasAnyLab($department)
    {
        return null !== $this->department()->where('department_desc',$department)->first();
    }

    public function hasAnyLabs($department)
    {
        return null !== $this->department()->where('department_desc',$department)->first();
    }

    //EMERGENCY

    public function hasAnyEmergency($department)
    {
        return null !== $this->department()->where('department_desc',$department)->first();
    }

    public function hasAnyEmergencies($department)
    {
        return null !== $this->department()->where('department_desc',$department)->first();
    }   
    
    //Internal Medicine

    public function hasAnyInternalMedicine($department)
    {
        return null !== $this->department()->where('department_desc',$department)->first();
    }

    public function hasAnyInternalMedicines($department)
    {
        return null !== $this->department()->where('department_desc',$department)->first();
    }   

}
