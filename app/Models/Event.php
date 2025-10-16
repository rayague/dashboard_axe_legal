<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'starts_at',
        'ends_at',
        'location',
        'image',
        'published',
        'event_type',
        'webinar_link',
        'max_participants',
        'materials',
        'organizer_id'
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'published' => 'boolean',
        'materials' => 'array'
    ];

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'event_participants')
                    ->withTimestamps()
                    ->withPivot(['status', 'attended']);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('starts_at', '>', now())
                    ->orderBy('starts_at', 'asc');
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function isWebinar()
    {
        return $this->event_type === 'webinar';
    }

    public function hasAvailableSpots()
    {
        return !$this->max_participants || $this->participants()->count() < $this->max_participants;
    }

    public function getRemainingSpots()
    {
        if (!$this->max_participants) {
            return null;
        }
        return $this->max_participants - $this->participants()->count();
    }

    public function isParticipant($userId)
    {
        return $this->participants()->where('user_id', $userId)->exists();
    }

    public function markAttendance($userId, $attended = true)
    {
        $this->participants()->updateExistingPivot($userId, ['attended' => $attended]);
    }

    public function updateParticipantStatus($userId, $status)
    {
        $this->participants()->updateExistingPivot($userId, ['status' => $status]);
    }
}
