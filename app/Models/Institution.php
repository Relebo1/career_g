<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Institution extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    // An institution has many faculties and courses
    public function faculties()
    {
        return $this->hasMany(Faculty::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
