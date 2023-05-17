<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voter extends Model
{
    use HasFactory;
   // protected $fillable = ['candidate_name'];
   // protected $table = 'voters';
   // protected $primaryKey = 'id';
    // protected $fillable = ['id','candidate_name', 'CNIC', 'party_name','Electoral','image'];
    protected $guarded = []; 
}
