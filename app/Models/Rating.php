<?php

namespace App\Models;

use App\Enums\RatingType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'score',
        'title',
        'description',
    ];

    protected $casts = [
        'type' => RatingType::class,
    ];
}
