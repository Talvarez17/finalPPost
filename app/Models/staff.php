<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'staff';
    public $primaryKey = 'staff_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'address_id',
        'picture',
        'email',
        'store_id',
        'active',
        'username',
        'password',
 
    ];
    public $timestamps = true;
}
