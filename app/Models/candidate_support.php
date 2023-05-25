<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidate_support extends Model
{
    use HasFactory;
    public function voters()
    {
    return $this->hasMany(voter::class);
    }
    public function candidates()
    {
    return $this->hasMany(candidate::class);
    }
}
