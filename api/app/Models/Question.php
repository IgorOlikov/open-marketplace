<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Question extends Model
{
    use HasFactory,HasUuids;

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }



}
