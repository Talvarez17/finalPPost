<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Actor extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'actor';
    public $primaryKey = 'actor_id';
    protected $fillable = [
        'first_name',
        'last_name',
    ];
    public $timestamps = true;
}
