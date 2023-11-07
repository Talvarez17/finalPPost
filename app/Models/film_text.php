<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Film_text extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'film_text';
    protected $fillable = [
        'film_id',
        'title',
        'description',
    ];
    public $timestamps = true;
}
