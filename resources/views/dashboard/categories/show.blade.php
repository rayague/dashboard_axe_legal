@extends('dashboard.layout')

@section('title', $category->nom . ' - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <div class="icon-circle mr-3" style="
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background: {{ $category->color }}15;
                display: flex;
                align-items: center;
                justify-content: center;
            ">
                <i class="fas {{ $category->icon }} fa-lg" style="color: {{ $category->color }};"></i>
            </div>
            <div>
                <h1 class="h3 mb-0 text-gray-800">{{ $category->nom }}</h1>
                <p class="mb-0 text-muted">{{ $category->description }}</p>
            </div>
        </div>
        <div>
            <a href="{{ route('dashboard.categories.edit', $category) }}" class="btn btn-warning text-white">
                <i class="fas fa-edit mr-2"></i>
                Modifier
            </a>
            <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>
                Retour
            </a>
        </div>
    </div>

    <!-- Statistics -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2" style="border-left: 4px solid {{ $category->color }};">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: {{ $category->color }};">
                                Total Formations
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $category->formations()->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
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
                                Formations Populaires
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $category->formations()->where('populaire', true)->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fire fa-2x text-gray-300"></i>
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
                                Prix Moyen
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($category->formations()->avg('prix') ?? 0, 0, ',', ' ') }} FCFA
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Durée Totale
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $category->formations()->sum('duree') }} heures
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Formations List -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: {{ $category->color }};">
                <i class="fas fa-list mr-2"></i>
                Formations dans cette catégorie
            </h6>
        </div>
        <div class="card-body">
            @if($formations->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Formation</th>
                                <th>Durée</th>
                                <th>Prix</th>
                                <th>Niveau</th>
                                <th>Note</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($formations as $formation)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($formation->image)
                                            <img src="{{ asset('storage/' . $formation->image) }}" 
                                                alt="{{ $formation->titre }}" 
                                                class="rounded mr-2" 
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="rounded mr-2" style="
                                                width: 50px; 
                                                height: 50px; 
                                                background: {{ $category->color }}15;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                            ">
                                                <i class="fas {{ $category->icon }}" style="color: {{ $category->color }};"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="font-weight-bold">{{ $formation->titre }}</div>
                                            <small class="text-muted">
                                                {{ $formation->nombre_lecons ? $formation->nombre_lecons . ' leçons' : '' }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $formation->duree }}h</td>
                                <td>{{ number_format($formation->prix, 0, ',', ' ') }} FCFA</td>
                                <td>
                                    <span class="badge badge-info">{{ ucfirst($formation->niveau) }}</span>
                                </td>
                                <td>
                                    @if($formation->note > 0)
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-star text-warning mr-1"></i>
                                            {{ number_format($formation->note, 1) }}
                                            <small class="text-muted ml-1">({{ $formation->nombre_avis }})</small>
                                        </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($formation->populaire)
                                        <span class="badge badge-danger">
                                            <i class="fas fa-fire mr-1"></i>Populaire
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.formations.edit', $formation) }}" 
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $formations->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Aucune formation dans cette catégorie</h5>
                    <p class="text-muted">Créez votre première formation pour cette catégorie</p>
                    <a href="{{ route('dashboard.formations.ajouter') }}" class="btn btn-warning text-white mt-3">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Créer une formation
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
