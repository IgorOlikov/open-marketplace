<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Shop extends Model
{
    use HasFactory,HasUuids;

    public function image(): Morphone
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

}
