<?php

namespace App;

/**
 * Eloquent class to describe the category table.
 *
 * automatically generated by ModelGenerator.php
 */
class Category extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'category';

    public $primaryKey = '';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = ['category_id', 'name'];
}