<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIAnalysis extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'document_path',
        'analysis_type',
        'status',
        'result',
        'confidence_score',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array',
        'result' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}