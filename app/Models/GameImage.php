<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'caption',
        'original_name',
        'mime_type',
        'size',
        'file_hash',
        'game_id',
    ];

    protected $casts = [
        'image' => 'array',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
