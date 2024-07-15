<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProject extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected function casts(): array
    {
        return [
            'scores' => 'array',
            'labels' => 'array'
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
