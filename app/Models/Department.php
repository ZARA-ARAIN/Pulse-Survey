<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // A department has many users
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // A department can have many insights
    public function insights()
    {
        return $this->hasMany(Insight::class);
    }
}
