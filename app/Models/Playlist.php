<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Playlist extends Model
{
    use HasFactory;

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function cover(): HasOne {
        return $this->hasOne(PlaylistCover::class);
    }

    public function tracks(): BelongsToMany {
        return $this->belongsToMany(Track::class)
            ->orderByPivot('position');
    }
}
