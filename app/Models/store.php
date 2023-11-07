<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Store extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'store';
    protected $fillable = [
        'store_id',
        'manager_staff_id',
        'address_id',
 
    ];
    public $timestamps = true;
}
