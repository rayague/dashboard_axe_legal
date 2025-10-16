@extends('dashboard.layout')

@section('title', 'Gestion des Avocats - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-balance-scale text-success mr-2"></i>
            Gestion des Avocats
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Utilisateurs</li>
                    <li class="breadcrumb-item active" aria-current="page">Avocats</li>
                </ol>
            </nav>
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addLawyerModal">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouvel Avocat</span>
                <span class="d-sm-none">Ajouter</span>
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Avocats</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">147</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Actifs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">132</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Spécialisations</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">23</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">En consultation</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">28</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">
                <i class="fas fa-filter mr-2"></i>
                Filtres de Recherche
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-3">
                    <label for="searchLawyer" class="form-label font-weight-bold">Recherche</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchLawyer" placeholder="Nom, email, spécialisation...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-3">
                    <label for="filterSpecialty" class="form-label font-weight-bold">Spécialisation</label>
                    <select class="form-control" id="filterSpecialty">
                        <option value="">Toutes</option>
                        <option value="droit-des-affaires">Droit des affaires</option>
                        <option value="droit-du-travail">Droit du travail</option>
                        <option value="droit-penal">Droit pénal</option>
                        <option value="droit-de-la-famille">Droit de la famille</option>
                        <option value="droit-immobilier">Droit immobilier</option>
                        <option value="droit-fiscal">Droit fiscal</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 mb-3">
                    <label for="filterStatus" class="form-label font-weight-bold">Statut</label>
                    <select class="form-control" id="filterStatus">
                        <option value="">Tous</option>
                        <option value="actif">Actif</option>
                        <option value="inactif">Inactif</option>
                        <option value="suspendu">Suspendu</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 mb-3">
                    <label for="filterExperience" class="form-label font-weight-bold">Expérience</label>
                    <select class="form-control" id="filterExperience">
                        <option value="">Toute</option>
                        <option value="junior">0-5 ans</option>
                        <option value="senior">5-15 ans</option>
                        <option value="expert">15+ ans</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 mb-3">
                    <label class="form-label font-weight-bold d-block">&nbsp;</label>
                    <button class="btn btn-outline-secondary btn-block" onclick="resetFilters()">
                        <i class="fas fa-undo mr-1"></i>
                        Reset
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Lawyers List -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-success mb-2 mb-sm-0">
                    <i class="fas fa-users mr-2"></i>
                    Liste des Avocats
                </h6>
                <div class="d-flex">
                    <button class="btn btn-outline-success btn-sm mr-2" onclick="exportData()">
                        <i class="fas fa-download mr-1"></i>
                        <span class="d-none d-sm-inline">Exporter</span>
                    </button>
                    <div class="dropdown">
                        <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="fas fa-eye mr-1"></i>
                            Vue
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item active" href="#" onclick="switchView('table')">
                                <i class="fas fa-table mr-2"></i>Tableau
                            </a>
                            <a class="dropdown-item" href="#" onclick="switchView('cards')">
                                <i class="fas fa-th-large mr-2"></i>Cartes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive" id="tableView">
                <table class="table table-hover mb-0" id="lawyersTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Avocat</th>
                            <th class="d-none d-md-table-cell">Contact</th>
                            <th class="d-none d-lg-table-cell">Spécialisation</th>
                            <th class="d-none d-sm-table-cell">Expérience</th>
                            <th class="d-none d-lg-table-cell">Consultations</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Avocat">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-3" src="https://ui-avatars.com/api/?name=Marie+Dubois&background=28a745&color=fff" width="50" height="50">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Me Marie Dubois</div>
                                        <div class="small text-muted">Barreau de Paris • #AV001</div>
                                        <div class="small text-muted d-md-none">marie.dubois@cabinet-legal.fr • 01 45 67 89 12</div>
                                        <div class="small text-muted d-lg-none">Droit des affaires • 12 ans d'expérience</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Contact" class="d-none d-md-table-cell">
                                <div class="text-responsive">marie.dubois@cabinet-legal.fr</div>
                                <div class="small text-muted">01 45 67 89 12</div>
                            </td>
                            <td data-label="Spécialisation" class="d-none d-lg-table-cell">
                                <span class="badge badge-primary">Droit des affaires</span>
                                <div class="small text-muted">Droit fiscal</div>
                            </td>
                            <td data-label="Expérience" class="d-none d-sm-table-cell">
                                <div class="font-weight-bold">12 ans</div>
                                <div class="small text-muted">Senior</div>
                            </td>
                            <td data-label="Consultations" class="d-none d-lg-table-cell">
                                <div class="font-weight-bold text-success">89 consultations</div>
                                <div class="small text-muted">Note: 4.8/5</div>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-success">Actif</span>
                                <div class="small text-success">En ligne</div>
                            </td>
                            <td data-label="Actions">
                                <div class="dropdown">
                                    <button class="btn btn-outline-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-eye mr-2"></i>Voir profil
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit mr-2"></i>Modifier
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-calendar mr-2"></i>Planning
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-chart-bar mr-2"></i>Statistiques
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-warning" href="#">
                                            <i class="fas fa-pause mr-2"></i>Suspendre
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Avocat">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-3" src="https://ui-avatars.com/api/?name=Pierre+Martin&background=17a2b8&color=fff" width="50" height="50">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Me Pierre Martin</div>
                                        <div class="small text-muted">Barreau de Lyon • #AV002</div>
                                        <div class="small text-muted d-md-none">pierre.martin@avocat-lyon.fr • 04 78 45 67 89</div>
                                        <div class="small text-muted d-lg-none">Droit du travail • 8 ans d'expérience</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Contact" class="d-none d-md-table-cell">
                                <div class="text-responsive">pierre.martin@avocat-lyon.fr</div>
                                <div class="small text-muted">04 78 45 67 89</div>
                            </td>
                            <td data-label="Spécialisation" class="d-none d-lg-table-cell">
                                <span class="badge badge-info">Droit du travail</span>
                                <div class="small text-muted">Droit social</div>
                            </td>
                            <td data-label="Expérience" class="d-none d-sm-table-cell">
                                <div class="font-weight-bold">8 ans</div>
                                <div class="small text-muted">Senior</div>
                            </td>
                            <td data-label="Consultations" class="d-none d-lg-table-cell">
                                <div class="font-weight-bold text-info">67 consultations</div>
                                <div class="small text-muted">Note: 4.6/5</div>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-success">Actif</span>
                                <div class="small text-warning">Occupé</div>
                            </td>
                            <td data-label="Actions">
                                <div class="dropdown">
                                    <button class="btn btn-outline-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-eye mr-2"></i>Voir profil
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit mr-2"></i>Modifier
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-calendar mr-2"></i>Planning
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-chart-bar mr-2"></i>Statistiques
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Avocat">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-3" src="https://ui-avatars.com/api/?name=Sophie+Bernard&background=dc3545&color=fff" width="50" height="50">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Me Sophie Bernard</div>
                                        <div class="small text-muted">Barreau de Marseille • #AV003</div>
                                        <div class="small text-muted d-md-none">sophie.bernard@droit-famille.fr • 04 91 23 45 67</div>
                                        <div class="small text-muted d-lg-none">Droit de la famille • 15 ans d'expérience</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Contact" class="d-none d-md-table-cell">
                                <div class="text-responsive">sophie.bernard@droit-famille.fr</div>
                                <div class="small text-muted">04 91 23 45 67</div>
                            </td>
                            <td data-label="Spécialisation" class="d-none d-lg-table-cell">
                                <span class="badge badge-danger">Droit de la famille</span>
                                <div class="small text-muted">Divorce, Succession</div>
                            </td>
                            <td data-label="Expérience" class="d-none d-sm-table-cell">
                                <div class="font-weight-bold">15 ans</div>
                                <div class="small text-muted">Expert</div>
                            </td>
                            <td data-label="Consultations" class="d-none d-lg-table-cell">
                                <div class="font-weight-bold text-danger">156 consultations</div>
                                <div class="small text-muted">Note: 4.9/5</div>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-success">Actif</span>
                                <div class="small text-success">Disponible</div>
                            </td>
                            <td data-label="Actions">
                                <div class="dropdown">
                                    <button class="btn btn-outline-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-eye mr-2"></i>Voir profil
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit mr-2"></i>Modifier
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-calendar mr-2"></i>Planning
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-chart-bar mr-2"></i>Statistiques
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Cards View (Hidden by default) -->
            <div class="row p-3 d-none" id="cardsView">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <img class="rounded-circle mr-3" src="https://ui-avatars.com/api/?name=Marie+Dubois&background=28a745&color=fff" width="60" height="60">
                                <div>
                                    <h6 class="card-title mb-1">Me Marie Dubois</h6>
                                    <p class="card-text small text-muted mb-0">Barreau de Paris</p>
                                    <span class="badge badge-success">Actif</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <span class="badge badge-primary">Droit des affaires</span>
                                <span class="badge badge-outline-primary">Droit fiscal</span>
                            </div>
                            <div class="row small">
                                <div class="col-6">
                                    <strong>Expérience:</strong><br>12 ans
                                </div>
                                <div class="col-6">
                                    <strong>Consultations:</strong><br>89 (4.8/5)
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="btn-group btn-group-sm w-100">
                                <button class="btn btn-outline-success">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-outline-success">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-outline-success">
                                    <i class="fas fa-calendar"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add more cards here -->
            </div>
        </div>
        <div class="card-footer d-flex flex-column flex-sm-row justify-content-between align-items-center">
            <div class="mb-2 mb-sm-0">
                <small class="text-muted">Affichage de 1 à 20 sur 147 avocats</small>
            </div>
            <nav aria-label="Lawyers pagination">
                <ul class="pagination pagination-sm mb-0">
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

    <!-- Add Lawyer Modal -->
    <div class="modal fade" id="addLawyerModal" tabindex="-1" role="dialog" aria-labelledby="addLawyerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="addLawyerModalLabel">
                        <i class="fas fa-user-plus mr-2"></i>
                        Nouvel Avocat
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addLawyerForm">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold text-success mb-3">
                                    <i class="fas fa-user mr-2"></i>Informations Personnelles
                                </h6>
                                <div class="form-group">
                                    <label for="prenom" class="font-weight-bold">Prénom *</label>
                                    <input type="text" class="form-control" id="prenom" required>
                                </div>
                                <div class="form-group">
                                    <label for="nom" class="font-weight-bold">Nom *</label>
                                    <input type="text" class="form-control" id="nom" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold">Email *</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="telephone" class="font-weight-bold">Téléphone *</label>
                                    <input type="tel" class="form-control" id="telephone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold text-success mb-3">
                                    <i class="fas fa-graduation-cap mr-2"></i>Informations Professionnelles
                                </h6>
                                <div class="form-group">
                                    <label for="barreau" class="font-weight-bold">Barreau *</label>
                                    <select class="form-control" id="barreau" required>
                                        <option value="">Sélectionner un barreau</option>
                                        <option value="paris">Barreau de Paris</option>
                                        <option value="lyon">Barreau de Lyon</option>
                                        <option value="marseille">Barreau de Marseille</option>
                                        <option value="toulouse">Barreau de Toulouse</option>
                                        <option value="autre">Autre</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="specialisations" class="font-weight-bold">Spécialisations *</label>
                                    <select class="form-control" id="specialisations" multiple>
                                        <option value="droit-des-affaires">Droit des affaires</option>
                                        <option value="droit-du-travail">Droit du travail</option>
                                        <option value="droit-penal">Droit pénal</option>
                                        <option value="droit-de-la-famille">Droit de la famille</option>
                                        <option value="droit-immobilier">Droit immobilier</option>
                                        <option value="droit-fiscal">Droit fiscal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="experience" class="font-weight-bold">Années d'expérience *</label>
                                    <input type="number" class="form-control" id="experience" min="0" required>
                                </div>
                                <div class="form-group">
                                    <label for="tarif" class="font-weight-bold">Tarif horaire (FCFA)</label>
                                    <input type="number" class="form-control" id="tarif" min="0" step="10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="biographie" class="font-weight-bold">Biographie</label>
                            <textarea class="form-control" id="biographie" rows="4" placeholder="Présentation professionnelle de l'avocat..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-save mr-2"></i>
                        Créer l'avocat
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Search and filter functionality
    function filterLawyers() {
        const searchTerm = document.getElementById('searchLawyer').value.toLowerCase();
        const specialtyFilter = document.getElementById('filterSpecialty').value;
        const statusFilter = document.getElementById('filterStatus').value;
        const experienceFilter = document.getElementById('filterExperience').value;

        const tableRows = document.querySelectorAll('#lawyersTable tbody tr');

        tableRows.forEach(row => {
            const lawyerName = row.querySelector('[data-label="Avocat"] .font-weight-bold').textContent.toLowerCase();
            const lawyerEmail = row.querySelector('[data-label="Contact"] .text-responsive')?.textContent.toLowerCase() || '';
            const specialty = row.querySelector('[data-label="Spécialisation"] .badge')?.textContent.toLowerCase() || '';
            const status = row.querySelector('[data-label="Statut"] .badge').textContent.toLowerCase();

            let show = true;

            // Search filter
            if (searchTerm && !lawyerName.includes(searchTerm) && !lawyerEmail.includes(searchTerm) && !specialty.includes(searchTerm)) {
                show = false;
            }

            // Status filter
            if (statusFilter && !status.includes(statusFilter)) {
                show = false;
            }

            row.style.display = show ? '' : 'none';
        });
    }

    // Event listeners
    document.getElementById('searchLawyer').addEventListener('keyup', filterLawyers);
    document.getElementById('filterSpecialty').addEventListener('change', filterLawyers);
    document.getElementById('filterStatus').addEventListener('change', filterLawyers);
    document.getElementById('filterExperience').addEventListener('change', filterLawyers);

    // Reset filters
    function resetFilters() {
        document.getElementById('searchLawyer').value = '';
        document.getElementById('filterSpecialty').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterExperience').value = '';
        filterLawyers();
    }

    // Switch between table and cards view
    function switchView(viewType) {
        const tableView = document.getElementById('tableView');
        const cardsView = document.getElementById('cardsView');
        const menuItems = document.querySelectorAll('.dropdown-item');

        menuItems.forEach(item => item.classList.remove('active'));

        if (viewType === 'table') {
            tableView.classList.remove('d-none');
            cardsView.classList.add('d-none');
            event.target.classList.add('active');
        } else {
            tableView.classList.add('d-none');
            cardsView.classList.remove('d-none');
            event.target.classList.add('active');
        }
    }

    // Export data
    function exportData() {
        alert('Fonctionnalité d\'export à implémenter');
    }

    // Modal form validation
    document.getElementById('addLawyerForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Fonctionnalité à implémenter');
    });
</script>
@endsection
