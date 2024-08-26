<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Offer; // Asigurați-vă că aveți acest model definit
use App\Models\Contract; // Asigurați-vă că aveți acest model definit

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
        'orders',
        'spent',
        'status',
        'agent_id',
        'location',
    ];

    // Relația cu agentul
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    // Relația cu ofertele
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    // Relația cu contractele
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function activities()
{
    return $this->hasMany(ClientActivity::class);
}

}

