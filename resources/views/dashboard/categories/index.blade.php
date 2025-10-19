@extends('dashboard.layout')

@section('title', 'Catégories de Formations - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-folder text-warning mr-2"></i>
            Catégories de Formations
        </h1>
        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-warning text-white">
            <i class="fas fa-plus-circle mr-2"></i>
            Nouvelle Catégorie
        </a>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle mr-2"></i>
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Categories Grid -->
    <div class="row">
        @forelse($categories as $category)
        <div class="col-xl-4 col-lg-6 mb-4">
            <div class="card shadow-sm h-100" style="border-left: 4px solid {{ $category->color }};">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle" style="
                                width: 50px;
                                height: 50px;
                                border-radius: 50%;
                                background: {{ $category->color }}15;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-right: 15px;
                            ">
                                <i class="fas {{ $category->icon }} fa-lg" style="color: {{ $category->color }};"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 font-weight-bold">{{ $category->nom }}</h5>
                                <small class="text-muted">{{ $category->slug }}</small>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('dashboard.categories.show', $category) }}">
                                    <i class="fas fa-eye mr-2"></i>Voir les formations
                                </a>
                                <a class="dropdown-item" href="{{ route('dashboard.categories.edit', $category) }}">
                                    <i class="fas fa-edit mr-2"></i>Modifier
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('dashboard.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-trash mr-2"></i>Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <p class="text-muted mb-3">{{ $category->description ?: 'Aucune description' }}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="badge badge-pill" style="background: {{ $category->color }}; color: white;">
                                <i class="fas fa-graduation-cap mr-1"></i>
                                {{ $category->formations_count }} formation(s)
                            </span>
                        </div>
                        <div class="text-muted small">
                            <i class="fas fa-clock mr-1"></i>
                            {{ $category->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Aucune catégorie trouvée</h5>
                    <p class="text-muted">Créez votre première catégorie pour organiser vos formations</p>
                    <a href="{{ route('dashboard.categories.create') }}" class="btn btn-warning text-white mt-3">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Créer une catégorie
                    </a>
                </div>
            </div>
        </div>
        @endforelse
    </div>
@endsection
