<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Inventory extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'inventory';
    public $primaryKey = 'inventory_id';

    protected $fillable = [
        'film_id',
        'store_id',
 
    ];
    public $timestamps = true;
}
