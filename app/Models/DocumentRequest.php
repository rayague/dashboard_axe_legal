<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentRequest extends Model
{
    protected $fillable = [
        'document_type',
        'document_title',
        'nom',
        'prenom',
        'email',
        'telephone',
        'entreprise',
        'description',
        'statut',
        'note_admin'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Méthode helper pour obtenir le badge de statut
    public function getStatutBadgeAttribute()
    {
        return match($this->statut) {
            'en_attente' => '<span class="badge badge-warning">En attente</span>',
            'en_cours' => '<span class="badge badge-info">En cours</span>',
            'traite' => '<span class="badge badge-success">Traité</span>',
            'rejete' => '<span class="badge badge-danger">Rejeté</span>',
            default => '<span class="badge badge-secondary">Inconnu</span>',
        };
    }

    // Méthode helper pour le type de document
    public function getDocumentTypeNameAttribute()
    {
        return match($this->document_type) {
            'immobilier' => 'Immobilier',
            'travail' => 'Droit du Travail',
            'entreprise' => 'Entreprise',
            default => ucfirst($this->document_type),
        };
    }
}
