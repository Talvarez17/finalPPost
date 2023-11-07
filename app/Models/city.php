<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class City extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'city';
    protected $fillable = [
        'city_id',
        'city',
        'county_id',
    ];
    public $timestamps = false;
}
