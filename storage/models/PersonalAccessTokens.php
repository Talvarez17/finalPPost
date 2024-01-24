<?php

namespace App;

/**
 * Eloquent class to describe the personal_access_tokens table.
 *
 * automatically generated by ModelGenerator.php
 */
class PersonalAccessTokens extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'personal_access_tokens';

    protected $fillable = ['tokenable_type', 'tokenable_id', 'name', 'token', 'abilities', 'last_used_at',
        'expires_at'];

    public function getDates()
    {
        return ['last_used_at', 'expires_at'];
    }
}
