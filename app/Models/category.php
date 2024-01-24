<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Category extends Model{ 
    
    use HasApiTokens, HasFactory;
    protected $table = 'category';
    public $primaryKey = 'category_id';
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;
}
