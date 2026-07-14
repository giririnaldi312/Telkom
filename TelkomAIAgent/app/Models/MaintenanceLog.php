<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceLog extends Model
{
    protected $fillable = [
        'site_id',
        'sender_name',
        'username',
        'telegram_id',
        'message',
        'response',
        'status',
    ];
}
