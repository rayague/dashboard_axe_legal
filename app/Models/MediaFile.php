<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaFile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'file_path',
        'mime_type',
        'collection',
        'size_in_bytes',
        'metadata',
        'uploaded_by',
        'is_public'
    ];

    protected $casts = [
        'metadata' => 'array',
        'is_public' => 'boolean',
        'size_in_bytes' => 'integer'
    ];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function shares()
    {
        return $this->hasMany(MediaShare::class);
    }

    public function getPublicUrl()
    {
        return $this->is_public ? url('storage/' . $this->file_path) : null;
    }

    public function getSizeForHumans()
    {
        $bytes = $this->size_in_bytes;
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    
        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }
    
        return round($bytes, 2) . ' ' . $units[$i];
    }
}