<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Tienda extends Model
{
    use HasApiTokens, HasFactory;
    protected $table = 'tienda';
    protected $fillable = [
        'id',
        'nombre',
        'edad',
    ];
    public $timestamps = true;
}
