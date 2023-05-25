<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidate extends Model
{
    use HasFactory;
    public function vote()
    {
    return $this->belongsTo(vote::class);
    }
    public function candidate_support()
    {
    return $this->belongsTo(candidate_support::class);
    }
}
