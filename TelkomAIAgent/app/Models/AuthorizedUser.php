<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorizedUser extends Model
{
    protected $fillable = [
        'name',
        'telegram_id',
        'is_active',
    ];
}
