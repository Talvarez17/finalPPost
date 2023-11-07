<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Film extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'film';
    protected $fillable = [
        'film_id',
        'title',
        'description',
        'release_year',
        'language_id',
        'original_language_id',
        'rental_duration',
        'rental_rate',
        'length',
        'replacement_cost',
        'rating',
        'special_features',
    ];
    public $timestamps = true;
}
