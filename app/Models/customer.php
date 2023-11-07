<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'customer_id',
        'store_id',
        'first_name',
        'last_name',
        'email',
        'address_id',
        'active',
    ];
    public $timestamps = true;
}
