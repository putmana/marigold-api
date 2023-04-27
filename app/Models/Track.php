<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Track extends Model
{  
    use HasFactory;

    protected $fillable = [
        'title',
        'duration',
        'path',
        'user_id',
        'album_id',
        'album_index'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function album(): BelongsTo {
        return $this->belongsTo(Album::class);
    }

    public function artists(): BelongsToMany {
        return $this->belongsToMany(Artist::class)
            ->orderByPivot('priority');
    }
}
