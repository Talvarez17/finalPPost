<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Film_actor extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'film_actor';
    protected $fillable = [
        'actor_id',
        'film_id',
    ];
    public $timestamps = true;
}
