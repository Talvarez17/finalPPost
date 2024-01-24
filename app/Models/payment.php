<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Payment extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'payment';
    public $primaryKey = 'payment_id';
    protected $fillable = [
        'customer_id',
        'staff_id',
        'rental_id',
        'amount',
        'payment_date',
 
    ];
    public $timestamps = true;
}
