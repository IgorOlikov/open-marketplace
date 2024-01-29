<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory,HasUuids;

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function parentComment(): BelongsTo
    {
        return $this->belongsTo(Comment::class,'parent_id','id');
    }

    public function childComments(): HasMany
    {
        return $this->hasMany(Comment::class,'parent_id','id');
    }

   public function owner(): BelongsTo
   {
       return $this->belongsTo(User::class);
   }




}
