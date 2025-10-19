@extends('dashboard.index')

@section('dashboard-content')
<div class="container-fluid">
    <!-- En-tête -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-file-download text-primary"></i> Demandes de Documents
        </h1>
        <div class="d-flex gap-2">
            <a href="{{ route('dashboard.legal-tech.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Retour Legal Tech
            </a>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                En Attente
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $demandes->where('statut', 'en_attente')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                En Cours
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $demandes->where('statut', 'en_cours')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Traités
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $demandes->where('statut', 'traite')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $demandes->total() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- Table des demandes -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Liste des Demandes</h6>
        </div>
        <div class="card-body">
            @if($demandes->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Type</th>
                            <th>Document</th>
                            <th>Contact</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($demandes as $demande)
                        <tr>
                            <td class="font-weight-bold">#{{ $demande->id }}</td>
                            <td>
                                <div class="font-weight-bold">{{ $demande->nom }} {{ $demande->prenom }}</div>
                                @if($demande->entreprise)
                                <small class="text-muted">{{ $demande->entreprise }}</small>
                                @endif
                            </td>
                            <td>
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
                                <span class="badge badge-{{ $colors[$demande->document_type] ?? 'secondary' }}">
                                    <i class="fas {{ $icons[$demande->document_type] ?? 'fa-file' }}"></i>
                                    {{ $demande->document_type_name }}
                                </span>
                            </td>
                            <td>
                                <small class="text-muted">{{ Str::limit($demande->document_title, 30) }}</small>
                            </td>
                            <td>
                                <div><i class="fas fa-envelope text-info"></i> {{ $demande->email }}</div>
                                <div><i class="fas fa-phone text-success"></i> {{ $demande->telephone }}</div>
                            </td>
                            <td>{!! $demande->statut_badge !!}</td>
                            <td>
                                <small>{{ $demande->created_at->format('d/m/Y') }}</small><br>
                                <small class="text-muted">{{ $demande->created_at->format('H:i') }}</small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('dashboard.legal-tech.demandes.show', $demande) }}" 
                                       class="btn btn-info btn-sm" title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('dashboard.legal-tech.demandes.destroy', $demande) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')"
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $demandes->links() }}
            </div>
            @else
            <div class="text-center py-5">
                <i class="fas fa-inbox fa-3x text-gray-300 mb-3"></i>
                <h5 class="text-muted">Aucune demande pour le moment</h5>
                <p class="text-muted">Les demandes de documents apparaîtront ici.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
