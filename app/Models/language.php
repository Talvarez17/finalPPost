<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Language extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'language';
    protected $fillable = [
        'language_id',
        'name',
    
    ];
    public $timestamps = false;
}
