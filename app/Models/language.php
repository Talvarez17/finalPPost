<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Language extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'language';
    public $primaryKey = 'languaje_id';

    protected $fillable = [
        'name',
    
    ];
    public $timestamps = false;
}
