<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Address extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'address';
    protected $fillable = [
        'address_id',
        'address',
        'address2',
        'district',
        'city_id',
        'postal_code',
        'phone',
    ];
    public $timestamps = true;
}
