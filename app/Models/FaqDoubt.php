<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqDoubt extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'doubt',
        'is_reviewed',
    ];

    protected $casts = [
        'is_reviewed' => 'boolean',
    ];
}
