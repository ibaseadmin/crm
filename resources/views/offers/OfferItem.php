<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferItem extends Model
{
    protected $fillable = ['offer_id', 'name', 'quantity', 'unit_price', 'total'];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
