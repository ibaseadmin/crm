<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ClientActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'agent_id',
        'activity_type',
        'activity_time',
    ];

    protected $casts = [
        'activity_time' => 'datetime',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}

