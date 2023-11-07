<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Film_category extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'film_category';
    protected $fillable = [
        'film_id',
        'category_id',

    ];
    public $timestamps = true;
}
