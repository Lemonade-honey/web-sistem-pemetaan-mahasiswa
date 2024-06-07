<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected function casts(): array
    {
        return [
            'statistik_scores' => 'array',
            'transkip_scores' => 'array',
            'transkip_badge' => 'array',
        ];
    }

    // relation
    public function oneUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
