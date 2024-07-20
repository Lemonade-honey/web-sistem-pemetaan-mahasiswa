<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) \Ramsey\Uuid\Uuid::uuid7();
            }
        });
    }

    protected function casts(): array
    {
        return [
            'scores' => 'array',
            'labels' => 'array'
        ];
    }
}
