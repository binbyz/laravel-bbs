<?php

namespace Beaverlabs\Board\Models\Board;

use Beaverlabs\Board\Models\Board\Types\BoardState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'state',
        'localization_id',
        'description',
        'slug',
        'metadata',
    ];

    protected $casts = [
        'state' => BoardState::class,
        'metadata' => 'array',
        'created_at' => 'immutable_datetime',
    ];
}
