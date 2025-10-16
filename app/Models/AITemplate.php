<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AITemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'template_data',
        'is_active'
    ];

    protected $casts = [
        'template_data' => 'array',
        'is_active' => 'boolean'
    ];
}