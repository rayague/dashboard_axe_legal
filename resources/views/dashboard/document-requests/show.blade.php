@extends('dashboard.index')

@section('dashboard-content')
<div class="container-fluid">
    <!-- En-tête -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-file-download text-primary"></i> Demande #{{ $documentRequest->id }}
        </h1>
        <div class="d-flex gap-2">
            <a href="{{ route('dashboard.legal-tech.demandes') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
            <form action="{{ route('dashboard.legal-tech.demandes.destroy', $documentRequest) }}" 
                  method="POST" 
                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')"
                  style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Supprimer
                </button>
            </form>
        </div>
    </div>

    <!-- Messages -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <!-- Informations du client -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-user"></i> Informations du Client
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong><i class="fas fa-user text-primary"></i> Nom complet :</strong>
                            <p class="ml-4">{{ $documentRequest->nom }} {{ $documentRequest->prenom }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong><i class="fas fa-building text-info"></i> Entreprise :</strong>
                            <p class="ml-4">{{ $documentRequest->entreprise ?? 'Non renseignée' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong><i class="fas fa-envelope text-success"></i> Email :</strong>
                            <p class="ml-4">
                                <a href="mailto:{{ $documentRequest->email }}">{{ $documentRequest->email }}</a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <strong><i class="fas fa-phone text-warning"></i> Téléphone :</strong>
                            <p class="ml-4">
                                <a href="tel:{{ $documentRequest->telephone }}">{{ $documentRequest->telephone }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Détails de la demande -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-file-alt"></i> Détails de la Demande
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong><i class="fas fa-folder text-info"></i> Type de document :</strong>
                        @php
                        $icons = [
                            'immobilier' => 'fa-home',
                            'travail' => 'fa-briefcase',
                            'entreprise' => 'fa-building'
                        ];
                        $colors = [
                            'immobilier' => 'primary',
                            'travail' => 'purple',
                            'entreprise' => 'success'
                        ];
                        @endphp
                        <span class="badge badge-{{ $colors[$documentRequest->document_type] ?? 'secondary' }} ml-2">
                            <i class="fas {{ $icons[$documentRequest->document_type] ?? 'fa-file' }}"></i>
                            {{ $documentRequest->document_type_name }}
                        </span>
                    </div>
                    <div class="mb-3">
                        <strong><i class="fas fa-file-pdf text-danger"></i> Titre du document :</strong>
                        <p class="ml-4">{{ $documentRequest->document_title }}</p>
                    </div>
                    <div class="mb-3">
                        <strong><i class="fas fa-comment-dots text-info"></i> Description :</strong>
                        <div class="card bg-light mt-2">
                            <div class="card-body">
                                {{ $documentRequest->description }}
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <strong><i class="fas fa-calendar text-primary"></i> Date de demande :</strong>
                        <p class="ml-4">
                            {{ $documentRequest->created_at->format('d/m/Y à H:i') }}
                            <small class="text-muted">({{ $documentRequest->created_at->diffForHumans() }})</small>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Notes internes -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-sticky-note"></i> Notes Internes
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.legal-tech.demandes.statut', $documentRequest) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="statut" value="{{ $documentRequest->statut }}">
                        <div class="form-group">
                            <textarea name="note_admin" 
                                      class="form-control" 
                                      rows="4" 
                                      placeholder="Ajoutez des notes internes (visibles uniquement par les administrateurs)...">{{ old('note_admin', $documentRequest->note_admin) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i> Enregistrer les notes
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar - Statut et actions -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-tasks"></i> Statut de la Demande
                    </h6>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        {!! $documentRequest->statut_badge !!}
                    </div>
                    
                    <form action="{{ route('dashboard.legal-tech.demandes.statut', $documentRequest) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="statut">Changer le statut :</label>
                            <select name="statut" id="statut" class="form-control">
                                <option value="en_attente" {{ $documentRequest->statut == 'en_attente' ? 'selected' : '' }}>
                                    En attente
                                </option>
                                <option value="en_cours" {{ $documentRequest->statut == 'en_cours' ? 'selected' : '' }}>
                                    En cours
                                </option>
                                <option value="traite" {{ $documentRequest->statut == 'traite' ? 'selected' : '' }}>
                                    Traité
                                </option>
                                <option value="rejete" {{ $documentRequest->statut == 'rejete' ? 'selected' : '' }}>
                                    Rejeté
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-check"></i> Mettre à jour
                        </button>
                    </form>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bolt"></i> Actions Rapides
                    </h6>
                </div>
                <div class="card-body">
                    <a href="mailto:{{ $documentRequest->email }}" class="btn btn-success btn-block mb-2">
                        <i class="fas fa-envelope"></i> Envoyer un Email
                    </a>
                    <a href="tel:{{ $documentRequest->telephone }}" class="btn btn-info btn-block mb-2">
                        <i class="fas fa-phone"></i> Appeler
                    </a>
                    <button onclick="window.print()" class="btn btn-secondary btn-block">
                        <i class="fas fa-print"></i> Imprimer
                    </button>
                </div>
            </div>

            <!-- Informations système -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info-circle"></i> Informations Système
                    </h6>
                </div>
                <div class="card-body">
                    <p class="small mb-1">
                        <strong>ID:</strong> #{{ $documentRequest->id }}
                    </p>
                    <p class="small mb-1">
                        <strong>Créé le:</strong> {{ $documentRequest->created_at->format('d/m/Y H:i') }}
                    </p>
                    <p class="small mb-0">
                        <strong>Modifié le:</strong> {{ $documentRequest->updated_at->format('d/m/Y H:i') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
