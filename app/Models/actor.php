<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Actor extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'actor';
    protected $fillable = [
        'actor_id',
        'first_name',
        'last_name',
    ];
    public $timestamps = true;
}
