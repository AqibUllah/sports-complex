<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
        'email',
        'subscribed_at',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'subscribed_at' => 'timestamp',
            'status' => 'boolean',
        ];
    }
}
