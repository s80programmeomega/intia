<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location'];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function policies()
    {
        return $this->hasMany(Policy::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
