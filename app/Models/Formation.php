<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'image',
        'category_id',
        'duree',
        'nombre_lecons',
        'prix',
        'niveau',
        'description',
        'objectifs',
        'populaire',
        'note',
        'nombre_avis',
    ];

    protected $casts = [
        'duree' => 'integer',
        'nombre_lecons' => 'integer',
        'prix' => 'integer',
        'populaire' => 'boolean',
        'note' => 'decimal:1',
        'nombre_avis' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(FormationCategory::class, 'category_id');
    }

    public function inscriptions()
    {
        return $this->hasMany(FormationInscription::class);
    }
}
