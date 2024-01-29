<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Seller extends Model
{
    use HasFactory,HasUuids;

    public function image(): Morphone
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function shop(): HasOne
    {
        return $this->hasOne(Shop::class);
    }

}
