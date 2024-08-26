<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', // ID-ul clientului de care aparține contractul
        'document_name', // Numele documentului contractului
        'file_path', // Calea către fișierul stocat
        'created_at', // Data creării contractului
        'updated_at', // Data ultimei actualizări
    ];

    // Relația cu clientul
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
