<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'date_of_birth', 'branch_id'];

    protected $casts = ['date_of_birth' => 'date'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function policies()
    {
        return $this->hasMany(Policy::class);
    }
}
