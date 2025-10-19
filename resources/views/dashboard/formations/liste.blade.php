@extends('dashboard.layout')

@section('title', 'Liste des Formations - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-list text-warning mr-2"></i>
            Liste des Formations
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formations</li>
                </ol>
            </nav>
            <a href="{{ route('dashboard.formations.ajouter') }}" class="btn btn-warning btn-sm">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Ajouter Formation</span>
                <span class="d-sm-none">Ajouter</span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Statistics Cards -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Formations</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $formations->count() }}</div>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Formations Actives</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Inscriptions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">342</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Revenus</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">26.200.000 FCFA</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Formations Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-column flex-sm-row justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table mr-2"></i>
                Formations Disponibles
            </h6>
            <div class="ml-auto">
                <div class="dropdown d-inline-block">
                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fas fa-download mr-1"></i> Exporter
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('dashboard.formations.export', 'pdf') }}">
                            <i class="fas fa-file-pdf text-danger mr-1"></i> PDF
                        </a>
                        <a class="dropdown-item" href="{{ route('dashboard.formations.export', 'excel') }}">
                            <i class="fas fa-file-excel text-success mr-1"></i> Excel
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Filtres de recherche -->
            <form action="{{ route('dashboard.formations.liste') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="search">Rechercher</label>
                            <input type="text" class="form-control" id="search" name="search" 
                                   value="{{ request('search') }}" placeholder="Titre ou description...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="niveau">Niveau</label>
                            <select class="form-control" id="niveau" name="niveau">
                                <option value="">Tous les niveaux</option>
                                <option value="debutant" {{ request('niveau') == 'debutant' ? 'selected' : '' }}>Débutant</option>
                                <option value="intermediaire" {{ request('niveau') == 'intermediaire' ? 'selected' : '' }}>Intermédiaire</option>
                                <option value="avance" {{ request('niveau') == 'avance' ? 'selected' : '' }}>Avancé</option>
                                <option value="expert" {{ request('niveau') == 'expert' ? 'selected' : '' }}>Expert</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="prix_min">Prix min</label>
                            <input type="number" class="form-control" id="prix_min" name="prix_min" 
                                   value="{{ request('prix_min') }}" placeholder="Min">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="prix_max">Prix max</label>
                            <input type="number" class="form-control" id="prix_max" name="prix_max" 
                                   value="{{ request('prix_max') }}" placeholder="Max">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label class="d-block">&nbsp;</label>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Durée</th>
                            <th>Prix</th>
                            <th>Niveau</th>
                            <th>Objectifs</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($formations as $formation)
                            <tr>
                                <td>{{ $formation->titre }}</td>
                                <td>{{ Str::limit($formation->description, 100) }}</td>
                                <td>{{ $formation->duree }}h</td>
                                <td>{{ number_format($formation->prix, 0, ',', ' ') }} FCFA</td>
                                <td>
                                    @switch($formation->niveau)
                                        @case('debutant')
                                            <span class="badge badge-success">Débutant</span>
                                            @break
                                        @case('intermediaire')
                                            <span class="badge badge-info">Intermédiaire</span>
                                            @break
                                        @case('avance')
                                            <span class="badge badge-warning">Avancé</span>
                                            @break
                                        @case('expert')
                                            <span class="badge badge-danger">Expert</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>{{ $formation->objectifs ? Str::limit($formation->objectifs, 100) : 'Non définis' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" 
                                                data-target="#detailsModal{{ $formation->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a href="{{ route('dashboard.formations.edit', $formation) }}" 
                                           class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('dashboard.formations.delete', $formation) }}" 
                                              method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Modal de détails -->
                                    <div class="modal fade" id="detailsModal{{ $formation->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title text-white">
                                                        <i class="fas fa-info-circle mr-2"></i>
                                                        Détails de la formation
                                                    </h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <dl class="row">
                                                        <dt class="col-sm-3">Titre</dt>
                                                        <dd class="col-sm-9">{{ $formation->titre }}</dd>

                                                        <dt class="col-sm-3">Description</dt>
                                                        <dd class="col-sm-9">{{ $formation->description }}</dd>

                                                        <dt class="col-sm-3">Durée</dt>
                                                        <dd class="col-sm-9">{{ $formation->duree }} heures</dd>

                                                        <dt class="col-sm-3">Prix</dt>
                                                        <dd class="col-sm-9">{{ number_format($formation->prix, 0, ',', ' ') }} FCFA</dd>

                                                        <dt class="col-sm-3">Niveau</dt>
                                                        <dd class="col-sm-9">{{ ucfirst($formation->niveau) }}</dd>

                                                        <dt class="col-sm-3">Objectifs</dt>
                                                        <dd class="col-sm-9">{{ $formation->objectifs ?: 'Non définis' }}</dd>

                                                        <dt class="col-sm-3">Créée le</dt>
                                                        <dd class="col-sm-9">{{ $formation->created_at->format('d/m/Y H:i') }}</dd>

                                                        <dt class="col-sm-3">Dernière modification</dt>
                                                        <dd class="col-sm-9">{{ $formation->updated_at->format('d/m/Y H:i') }}</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Aucune formation trouvée</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <div class="mt-4">
                    {{ $formations->withQueryString()->links() }}
                </div>
            </div>
            </h6>
            <div class="d-flex flex-column flex-sm-row mt-2 mt-sm-0">
                <div class="input-group input-group-sm mb-2 mb-sm-0 mr-sm-2" style="width: 250px;">
                    <input type="text" class="form-control" placeholder="Rechercher..." id="searchInput">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <select class="form-control form-control-sm" style="width: 150px;">
                    <option>Tous les niveaux</option>
                    <option>Débutant</option>
                    <option>Intermédiaire</option>
                    <option>Avancé</option>
                    <option>Expert</option>
                </select>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="formationsTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Formation</th>
                            <th class="d-none d-md-table-cell">Niveau</th>
                            <th class="d-none d-lg-table-cell">Durée</th>
                            <th class="d-none d-sm-table-cell">Prix</th>
                            <th class="d-none d-lg-table-cell">Inscriptions</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Formation">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-gavel text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-responsive">Droit des Contrats Commerciaux</div>
                                        <div class="small text-muted d-md-none">Intermédiaire • 20h • 149.500 FCFA</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Niveau" class="d-none d-md-table-cell">
                                <span class="badge badge-info">Intermédiaire</span>
                            </td>
                            <td data-label="Durée" class="d-none d-lg-table-cell">20h</td>
                            <td data-label="Prix" class="d-none d-sm-table-cell">149.500 FCFA</td>
                            <td data-label="Inscriptions" class="d-none d-lg-table-cell">
                                <span class="text-success font-weight-bold">24/30</span>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-success">Actif</span>
                            </td>
                            <td data-label="Actions">
                                <div class="btn-group btn-group-sm" role="group">
                                    <button class="btn btn-outline-primary btn-sm" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-sm d-none d-sm-inline" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm d-none d-md-inline" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Formation">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-building text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-responsive">Droit Immobilier Avancé</div>
                                        <div class="small text-muted d-md-none">Expert • 35h • 225.000 FCFA</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Niveau" class="d-none d-md-table-cell">
                                <span class="badge badge-danger">Expert</span>
                            </td>
                            <td data-label="Durée" class="d-none d-lg-table-cell">35h</td>
                            <td data-label="Prix" class="d-none d-sm-table-cell">225.000 FCFA</td>
                            <td data-label="Inscriptions" class="d-none d-lg-table-cell">
                                <span class="text-warning font-weight-bold">12/15</span>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-success">Actif</span>
                            </td>
                            <td data-label="Actions">
                                <div class="btn-group btn-group-sm" role="group">
                                    <button class="btn btn-outline-primary btn-sm" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-sm d-none d-sm-inline" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm d-none d-md-inline" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Formation">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-family text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-responsive">Introduction au Droit de la Famille</div>
                                        <div class="small text-muted d-md-none">Débutant • 15h • 99.500 FCFA</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Niveau" class="d-none d-md-table-cell">
                                <span class="badge badge-success">Débutant</span>
                            </td>
                            <td data-label="Durée" class="d-none d-lg-table-cell">15h</td>
                            <td data-label="Prix" class="d-none d-sm-table-cell">99.500 FCFA</td>
                            <td data-label="Inscriptions" class="d-none d-lg-table-cell">
                                <span class="text-danger font-weight-bold">8/25</span>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-warning">En pause</span>
                            </td>
                            <td data-label="Actions">
                                <div class="btn-group btn-group-sm" role="group">
                                    <button class="btn btn-outline-primary btn-sm" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-sm d-none d-sm-inline" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm d-none d-md-inline" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <nav aria-label="Formations pagination">
                <ul class="pagination pagination-sm justify-content-center mb-0">
                    <li class="page-item disabled">
                        <span class="page-link">Précédent</span>
                    </li>
                    <li class="page-item active">
                        <span class="page-link">1</span>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#formationsTable tbody tr');

        tableRows.forEach(row => {
            const formationName = row.querySelector('td:first-child .font-weight-bold').textContent.toLowerCase();
            if (formationName.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Mobile responsive table improvements
    function adjustTableForMobile() {
        if (window.innerWidth <= 768) {
            document.querySelectorAll('.btn-group').forEach(group => {
                group.classList.add('btn-group-vertical');
                group.classList.remove('btn-group');
            });
        } else {
            document.querySelectorAll('.btn-group-vertical').forEach(group => {
                group.classList.remove('btn-group-vertical');
                group.classList.add('btn-group');
            });
        }
    }

    window.addEventListener('resize', adjustTableForMobile);
    adjustTableForMobile();
</script>
@endsection
