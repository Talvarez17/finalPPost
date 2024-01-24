<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class City extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'city';
    public $primaryKey = 'city_id';
    
    protected $fillable = [
        'city',
        'county_id',
    ];
    public $timestamps = false;
}
