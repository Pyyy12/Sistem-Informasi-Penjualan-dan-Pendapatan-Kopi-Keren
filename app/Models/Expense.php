<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    protected $fillable = ['cart_id', 'date', 'title', 'amount'];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
}