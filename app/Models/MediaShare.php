<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaShare extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_file_id',
        'token',
        'expires_at',
        'download_limit',
        'download_count'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'download_limit' => 'integer',
        'download_count' => 'integer'
    ];

    public function file()
    {
        return $this->belongsTo(MediaFile::class);
    }

    public function isValid()
    {
        if ($this->expires_at && now()->isAfter($this->expires_at)) {
            return false;
        }

        if ($this->download_limit && $this->download_count >= $this->download_limit) {
            return false;
        }

        return true;
    }

    public function incrementDownloadCount()
    {
        $this->increment('download_count');
    }
}