<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable 
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'password'];

    // A student can apply to many courses
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }
}
