<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory,HasUuids;

    public function cartProduct(): HasOne
    {
        return $this->hasOne(CartProduct::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
