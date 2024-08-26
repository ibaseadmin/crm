<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'location',
        'agent_id',
        'source',
        'unqualified_reason',
        'unqualified_at',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'unqualified_at', // Asigură-te că `unqualified_at` este tratat ca un obiect Carbon
    ];
    // Relația cu modelul User (agent)
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
