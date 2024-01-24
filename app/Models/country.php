<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Country extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'country';
    public $primaryKey = 'country_id';

    protected $fillable = [
        'country',
    ];
    public $timestamps = false;
}
