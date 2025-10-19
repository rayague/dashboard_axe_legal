<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationInscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'formation_id',
        'nom',
        'prenom',
        'email',
        'telephone',
        'entreprise',
        'fonction',
        'message',
        'statut',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}