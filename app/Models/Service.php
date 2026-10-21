<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'provider_name', 'category', 'title', 'slug', 'summary',
        'description', 'price_from', 'rating', 'orders_count',
        'delivery_days', 'is_featured', 'is_active', 'cover_url',
    ];

    protected function casts(): array
    {
        return [
            'price_from' => 'decimal:2',
            'rating' => 'decimal:1',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}
