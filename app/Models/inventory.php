<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Inventory extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'inventory';
    protected $fillable = [
        'inventory_id',
        'film_id',
        'store_id',
 
    ];
    public $timestamps = true;
}
