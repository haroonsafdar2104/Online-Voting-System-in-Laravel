<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voter extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function vote()
    {
    return $this->belongsTo(vote::class);
    }
    public function candidate_support()
    {
    return $this->belongsTo(candidate_support::class);
    }
}
