<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Rental extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'rental';
    protected $fillable = [
        'rental_id',
        'rental_date',
        'inventory_id',
        'customer_id',
        'return_date',
        'staff_id',
 
    ];
    public $timestamps = true;
}
