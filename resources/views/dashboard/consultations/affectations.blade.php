@extends('dashboard.layout')

@section('title', 'Affectations des Consultations - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-check text-primary mr-2"></i>
            Affectations des Consultations
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Services Juridiques</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Affectations</li>
                </ol>
            </nav>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#assignmentModal">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouvelle Affectation</span>
                <span class="d-sm-none">Affecter</span>
            </button>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">En Attente</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">23</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Affectées Aujourd'hui</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Avocats Actifs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">28</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Charge Moyenne</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">67%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 67%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter and Search Section -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-filter mr-2"></i>
                Filtres et Recherche
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="statusFilter" class="form-label">Statut</label>
                    <select class="form-control" id="statusFilter">
                        <option value="">Tous les statuts</option>
                        <option value="pending">En attente</option>
                        <option value="assigned">Affectée</option>
                        <option value="accepted">Acceptée</option>
                        <option value="declined">Refusée</option>
                        <option value="completed">Terminée</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="lawyerFilter" class="form-label">Avocat</label>
                    <select class="form-control" id="lawyerFilter">
                        <option value="">Tous les avocats</option>
                        <option value="1">Me. Kouadio Adjoa</option>
                        <option value="2">Me. Traoré Moussa</option>
                        <option value="3">Me. Koné Fatima</option>
                        <option value="4">Me. Diabaté Sekou</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="domainFilter" class="form-label">Domaine Juridique</label>
                    <select class="form-control" id="domainFilter">
                        <option value="">Tous les domaines</option>
                        <option value="civil">Droit Civil</option>
                        <option value="commercial">Droit Commercial</option>
                        <option value="penal">Droit Pénal</option>
                        <option value="travail">Droit du Travail</option>
                        <option value="famille">Droit de la Famille</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="dateFilter" class="form-label">Période</label>
                    <input type="date" class="form-control" id="dateFilter">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="searchInput" class="form-label">Recherche</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="Rechercher par nom du client, numéro de dossier...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 d-flex align-items-end">
                    <button class="btn btn-secondary mr-2" onclick="resetFilters()">
                        <i class="fas fa-undo mr-1"></i>
                        Réinitialiser
                    </button>
                    <button class="btn btn-info" onclick="exportAssignments()">
                        <i class="fas fa-download mr-1"></i>
                        Exporter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Consultations en Attente d'Affectation -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-exclamation-circle mr-2"></i>
                Consultations en Attente d'Affectation
            </h6>
            <span class="badge badge-warning badge-counter">23</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="pendingAssignmentsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Dossier</th>
                            <th>Client</th>
                            <th>Domaine</th>
                            <th>Urgence</th>
                            <th>Date Demande</th>
                            <th>Délai</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>#CNS2024-0847</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-primary text-white rounded-circle">KA</span>
                                    </div>
                                    <div>
                                        <strong>Kouassi Alain</strong><br>
                                        <small class="text-muted">Client particulier</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-info">Droit Civil</span></td>
                            <td><span class="badge badge-danger">Urgent</span></td>
                            <td>08/01/2025<br><small class="text-muted">14:30</small></td>
                            <td><span class="text-warning"><i class="fas fa-clock mr-1"></i>2h restantes</span></td>
                            <td>
                                <button class="btn btn-success btn-sm" onclick="quickAssign(847)" title="Affectation rapide">
                                    <i class="fas fa-bolt"></i>
                                </button>
                                <button class="btn btn-primary btn-sm" onclick="manualAssign(847)" title="Affectation manuelle">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button class="btn btn-info btn-sm" onclick="viewDetails(847)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>#CNS2024-0848</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-success text-white rounded-circle">YM</span>
                                    </div>
                                    <div>
                                        <strong>Yao Marie</strong><br>
                                        <small class="text-muted">Entreprise</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-warning">Droit Commercial</span></td>
                            <td><span class="badge badge-warning">Normale</span></td>
                            <td>08/01/2025<br><small class="text-muted">09:15</small></td>
                            <td><span class="text-success"><i class="fas fa-clock mr-1"></i>6h restantes</span></td>
                            <td>
                                <button class="btn btn-success btn-sm" onclick="quickAssign(848)" title="Affectation rapide">
                                    <i class="fas fa-bolt"></i>
                                </button>
                                <button class="btn btn-primary btn-sm" onclick="manualAssign(848)" title="Affectation manuelle">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button class="btn btn-info btn-sm" onclick="viewDetails(848)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>#CNS2024-0849</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-info text-white rounded-circle">DJ</span>
                                    </div>
                                    <div>
                                        <strong>Diallo Joseph</strong><br>
                                        <small class="text-muted">Client particulier</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">Droit Famille</span></td>
                            <td><span class="badge badge-info">Faible</span></td>
                            <td>07/01/2025<br><small class="text-muted">16:45</small></td>
                            <td><span class="text-info"><i class="fas fa-clock mr-1"></i>1 jour</span></td>
                            <td>
                                <button class="btn btn-success btn-sm" onclick="quickAssign(849)" title="Affectation rapide">
                                    <i class="fas fa-bolt"></i>
                                </button>
                                <button class="btn btn-primary btn-sm" onclick="manualAssign(849)" title="Affectation manuelle">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button class="btn btn-info btn-sm" onclick="viewDetails(849)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Affectations Récentes -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-history mr-2"></i>
                Affectations Récentes
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="recentAssignmentsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Dossier</th>
                            <th>Client</th>
                            <th>Avocat Affecté</th>
                            <th>Date Affectation</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>#CNS2024-0846</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-primary text-white rounded-circle">AB</span>
                                    </div>
                                    <div>
                                        <strong>Assi Brigitte</strong><br>
                                        <small class="text-muted">Droit du Travail</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-success text-white rounded-circle">KA</span>
                                    </div>
                                    <div>
                                        <strong>Me. Kouadio Adjoa</strong><br>
                                        <small class="text-muted">Spécialiste Travail</small>
                                    </div>
                                </div>
                            </td>
                            <td>08/01/2025<br><small class="text-muted">11:20</small></td>
                            <td><span class="badge badge-success">Acceptée</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewAssignment(846)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="reassign(846)" title="Réaffecter">
                                    <i class="fas fa-exchange-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>#CNS2024-0845</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-warning text-white rounded-circle">TK</span>
                                    </div>
                                    <div>
                                        <strong>Touré Koffi</strong><br>
                                        <small class="text-muted">Droit Pénal</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-danger text-white rounded-circle">TM</span>
                                    </div>
                                    <div>
                                        <strong>Me. Traoré Moussa</strong><br>
                                        <small class="text-muted">Spécialiste Pénal</small>
                                    </div>
                                </div>
                            </td>
                            <td>08/01/2025<br><small class="text-muted">10:45</small></td>
                            <td><span class="badge badge-warning">En attente</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewAssignment(845)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="reassign(845)" title="Réaffecter">
                                    <i class="fas fa-exchange-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>#CNS2024-0844</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-info text-white rounded-circle">KS</span>
                                    </div>
                                    <div>
                                        <strong>Konan Sylvie</strong><br>
                                        <small class="text-muted">Droit Civil</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-primary text-white rounded-circle">KF</span>
                                    </div>
                                    <div>
                                        <strong>Me. Koné Fatima</strong><br>
                                        <small class="text-muted">Spécialiste Civil</small>
                                    </div>
                                </div>
                            </td>
                            <td>08/01/2025<br><small class="text-muted">09:30</small></td>
                            <td><span class="badge badge-danger">Refusée</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewAssignment(844)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="reassign(844)" title="Réaffecter">
                                    <i class="fas fa-exchange-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Charge de Travail des Avocats -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-chart-bar mr-2"></i>
                Charge de Travail des Avocats
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Me. Kouadio Adjoa</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">12 dossiers</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%"></div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <span class="text-success">60%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-sm btn-outline-success" onclick="assignToLawyer(1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Me. Traoré Moussa</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">18 dossiers</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 85%"></div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <span class="text-warning">85%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-sm btn-outline-warning" onclick="assignToLawyer(2)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Me. Koné Fatima</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">14 dossiers</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 70%"></div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <span class="text-info">70%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-sm btn-outline-info" onclick="assignToLawyer(3)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Me. Diabaté Sekou</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">9 dossiers</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 45%"></div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <span class="text-primary">45%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-sm btn-outline-primary" onclick="assignToLawyer(4)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Nouvelle Affectation -->
    <div class="modal fade" id="assignmentModal" tabindex="-1" role="dialog" aria-labelledby="assignmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignmentModalLabel">
                        <i class="fas fa-user-plus mr-2"></i>
                        Nouvelle Affectation
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="assignmentForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="consultationSelect" class="form-label">Consultation</label>
                                <select class="form-control" id="consultationSelect" required>
                                    <option value="">Sélectionner une consultation</option>
                                    <option value="847">#CNS2024-0847 - Kouassi Alain (Urgent)</option>
                                    <option value="848">#CNS2024-0848 - Yao Marie</option>
                                    <option value="849">#CNS2024-0849 - Diallo Joseph</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lawyerSelect" class="form-label">Avocat</label>
                                <select class="form-control" id="lawyerSelect" required>
                                    <option value="">Sélectionner un avocat</option>
                                    <option value="1">Me. Kouadio Adjoa (12 dossiers - 60%)</option>
                                    <option value="2">Me. Traoré Moussa (18 dossiers - 85%)</option>
                                    <option value="3">Me. Koné Fatima (14 dossiers - 70%)</option>
                                    <option value="4">Me. Diabaté Sekou (9 dossiers - 45%)</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="prioritySelect" class="form-label">Priorité</label>
                                <select class="form-control" id="prioritySelect">
                                    <option value="low">Faible</option>
                                    <option value="normal" selected>Normale</option>
                                    <option value="high">Élevée</option>
                                    <option value="urgent">Urgente</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="deadlineInput" class="form-label">Délai de réponse</label>
                                <input type="datetime-local" class="form-control" id="deadlineInput" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="notesTextarea" class="form-label">Notes pour l'avocat</label>
                            <textarea class="form-control" id="notesTextarea" rows="3" placeholder="Instructions spéciales, contexte supplémentaire..."></textarea>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="notifyLawyer" checked>
                            <label class="form-check-label" for="notifyLawyer">
                                Notifier l'avocat par email et SMS
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="notifyClient">
                            <label class="form-check-label" for="notifyClient">
                                Notifier le client de l'affectation
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Annuler
                    </button>
                    <button type="button" class="btn btn-primary" onclick="submitAssignment()">
                        <i class="fas fa-check mr-1"></i>Affecter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Affectation Rapide -->
    <div class="modal fade" id="quickAssignModal" tabindex="-1" role="dialog" aria-labelledby="quickAssignModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quickAssignModalLabel">
                        <i class="fas fa-bolt mr-2"></i>
                        Affectation Rapide
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-2"></i>
                        L'algorithme sélectionnera automatiquement l'avocat le plus adapté basé sur :
                        <ul class="mb-0 mt-2">
                            <li>La spécialité juridique</li>
                            <li>La charge de travail actuelle</li>
                            <li>La disponibilité</li>
                            <li>L'historique de performance</li>
                        </ul>
                    </div>
                    <div id="quickAssignSuggestion" class="d-none">
                        <h6>Suggestion d'affectation :</h6>
                        <div class="card border-success">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-lg mr-3">
                                        <span class="avatar-title bg-success text-white rounded-circle h4 mb-0">KA</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Me. Kouadio Adjoa</h6>
                                        <p class="mb-1 text-muted">Spécialiste en Droit Civil</p>
                                        <small class="text-success">
                                            <i class="fas fa-star mr-1"></i>
                                            Score de compatibilité : 96%
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Annuler
                    </button>
                    <button type="button" class="btn btn-success" onclick="confirmQuickAssign()">
                        <i class="fas fa-bolt mr-1"></i>Affecter Automatiquement
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    // Initialize DataTables
    $(document).ready(function() {
        $('#pendingAssignmentsTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 4, "asc" ]], // Sort by date
            "pageLength": 10
        });

        $('#recentAssignmentsTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 3, "desc" ]], // Sort by assignment date
            "pageLength": 10
        });
    });

    // Quick assignment function
    function quickAssign(consultationId) {
        // Show suggestion
        $('#quickAssignSuggestion').removeClass('d-none');
        $('#quickAssignModal').modal('show');

        // Store consultation ID for later use
        $('#quickAssignModal').data('consultation-id', consultationId);
    }

    // Manual assignment function
    function manualAssign(consultationId) {
        // Pre-select the consultation in the form
        $('#consultationSelect').val(consultationId);
        $('#assignmentModal').modal('show');
    }

    // View consultation details
    function viewDetails(consultationId) {
        // Implementation for viewing consultation details
        console.log('Viewing details for consultation:', consultationId);
        // You would typically make an AJAX call here
    }

    // View assignment details
    function viewAssignment(consultationId) {
        // Implementation for viewing assignment details
        console.log('Viewing assignment for consultation:', consultationId);
    }

    // Reassign consultation
    function reassign(consultationId) {
        if (confirm('Êtes-vous sûr de vouloir réaffecter cette consultation ?')) {
            // Implementation for reassignment
            console.log('Reassigning consultation:', consultationId);
        }
    }

    // Assign to specific lawyer
    function assignToLawyer(lawyerId) {
        $('#lawyerSelect').val(lawyerId);
        $('#assignmentModal').modal('show');
    }

    // Submit assignment form
    function submitAssignment() {
        const form = document.getElementById('assignmentForm');
        if (form.checkValidity()) {
            // Implementation for form submission
            console.log('Submitting assignment form');

            // Show success message
            alert('Affectation créée avec succès !');
            $('#assignmentModal').modal('hide');

            // Refresh the page or update the tables
            location.reload();
        } else {
            form.reportValidity();
        }
    }

    // Confirm quick assignment
    function confirmQuickAssign() {
        const consultationId = $('#quickAssignModal').data('consultation-id');

        // Implementation for quick assignment
        console.log('Quick assigning consultation:', consultationId);

        // Show success message
        alert('Affectation automatique effectuée avec succès !');
        $('#quickAssignModal').modal('hide');

        // Refresh the page or update the tables
        location.reload();
    }

    // Reset filters
    function resetFilters() {
        document.getElementById('statusFilter').value = '';
        document.getElementById('lawyerFilter').value = '';
        document.getElementById('domainFilter').value = '';
        document.getElementById('dateFilter').value = '';
        document.getElementById('searchInput').value = '';

        // Refresh tables
        $('#pendingAssignmentsTable').DataTable().search('').draw();
        $('#recentAssignmentsTable').DataTable().search('').draw();
    }

    // Export assignments
    function exportAssignments() {
        // Implementation for export functionality
        console.log('Exporting assignments');
        alert('Export en cours... Le fichier sera téléchargé dans quelques instants.');
    }

    // Real-time updates (optional)
    function updateAssignmentStats() {
        // Implementation for real-time stats updates
        // This could use WebSocket or periodic AJAX calls
    }

    // Initialize real-time updates every 30 seconds
    setInterval(updateAssignmentStats, 30000);
</script>
@endsection
