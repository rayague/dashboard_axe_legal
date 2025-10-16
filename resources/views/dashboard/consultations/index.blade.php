@extends('dashboard.layout')

@section('title', 'Consultations Juridiques - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-handshake text-primary mr-2"></i>
            Consultations Juridiques
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Consultations</li>
                </ol>
            </nav>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addConsultationModal">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouvelle Consultation</span>
                <span class="d-sm-none">Ajouter</span>
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Consultations</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2,847</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Revenus du Mois</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">45.750.000 FCFA</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">En Cours</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">156</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Taux de Satisfaction</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">96%</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-filter mr-2"></i>
                Filtres de Recherche
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-3">
                    <label for="searchConsultation" class="form-label font-weight-bold">Recherche</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchConsultation" placeholder="Client, avocat, domaine...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-3">
                    <label for="filterStatus" class="form-label font-weight-bold">Statut</label>
                    <select class="form-control" id="filterStatus">
                        <option value="">Tous</option>
                        <option value="en-attente">En attente</option>
                        <option value="confirmee">Confirmée</option>
                        <option value="en-cours">En cours</option>
                        <option value="terminee">Terminée</option>
                        <option value="annulee">Annulée</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 mb-3">
                    <label for="filterDomaine" class="form-label font-weight-bold">Domaine</label>
                    <select class="form-control" id="filterDomaine">
                        <option value="">Tous</option>
                        <option value="droit-des-affaires">Droit des affaires</option>
                        <option value="droit-du-travail">Droit du travail</option>
                        <option value="droit-penal">Droit pénal</option>
                        <option value="droit-de-la-famille">Droit de la famille</option>
                        <option value="droit-immobilier">Droit immobilier</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 mb-3">
                    <label for="filterDate" class="form-label font-weight-bold">Période</label>
                    <select class="form-control" id="filterDate">
                        <option value="">Toutes</option>
                        <option value="today">Aujourd'hui</option>
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                        <option value="custom">Personnalisée</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 mb-3">
                    <label for="filterAvocat" class="form-label font-weight-bold">Avocat</label>
                    <select class="form-control" id="filterAvocat">
                        <option value="">Tous</option>
                        <option value="marie-dubois">Me Marie Dubois</option>
                        <option value="pierre-martin">Me Pierre Martin</option>
                        <option value="sophie-bernard">Me Sophie Bernard</option>
                    </select>
                </div>
                <div class="col-lg-1 col-md-6 mb-3">
                    <label class="form-label font-weight-bold d-block">&nbsp;</label>
                    <button class="btn btn-outline-secondary btn-block" onclick="resetFilters()">
                        <i class="fas fa-undo"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Consultations Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary mb-2 mb-sm-0">
                    <i class="fas fa-list mr-2"></i>
                    Liste des Consultations
                </h6>
                <div class="d-flex">
                    <button class="btn btn-outline-primary btn-sm mr-2" onclick="exportData()">
                        <i class="fas fa-download mr-1"></i>
                        <span class="d-none d-sm-inline">Exporter</span>
                    </button>
                    <div class="dropdown">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="fas fa-eye mr-1"></i>
                            Vue
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item active" href="#" onclick="switchView('table')">
                                <i class="fas fa-table mr-2"></i>Tableau
                            </a>
                            <a class="dropdown-item" href="#" onclick="switchView('calendar')">
                                <i class="fas fa-calendar mr-2"></i>Calendrier
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive" id="tableView">
                <table class="table table-hover mb-0" id="consultationsTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Consultation</th>
                            <th class="d-none d-md-table-cell">Client</th>
                            <th class="d-none d-lg-table-cell">Avocat</th>
                            <th class="d-none d-sm-table-cell">Date & Heure</th>
                            <th class="d-none d-lg-table-cell">Tarif</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Consultation">
                                <div class="d-flex align-items-center">
                                    <div class="consultation-icon bg-primary text-white rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-responsive">Droit des Contrats</div>
                                        <div class="small text-muted">#CONS-2025-001</div>
                                        <div class="small text-muted d-md-none">Sophie Bernard • Me Marie Dubois</div>
                                        <div class="small text-muted d-sm-none">Demain 14h30 • 50.000 FCFA</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Client" class="d-none d-md-table-cell">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="https://ui-avatars.com/api/?name=Sophie+Bernard&background=8b5cf6&color=fff" width="30" height="30">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Sophie Bernard</div>
                                        <div class="small text-muted">Entrepreneuse</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Avocat" class="d-none d-lg-table-cell">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="https://ui-avatars.com/api/?name=Marie+Dubois&background=28a745&color=fff" width="30" height="30">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Me Marie Dubois</div>
                                        <div class="small text-muted">Droit des affaires</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Date & Heure" class="d-none d-sm-table-cell">
                                <div class="font-weight-bold">Demain</div>
                                <div class="small text-muted">14h30 - 15h30</div>
                            </td>
                            <td data-label="Tarif" class="d-none d-lg-table-cell">
                                <div class="font-weight-bold text-success">50.000 FCFA</div>
                                <div class="small text-muted">1h consultation</div>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-success">Confirmée</span>
                            </td>
                            <td data-label="Actions">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-eye mr-2"></i>Voir détails
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-video mr-2"></i>Rejoindre
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit mr-2"></i>Modifier
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-file-pdf mr-2"></i>Rapport
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-warning" href="#">
                                            <i class="fas fa-times mr-2"></i>Annuler
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Consultation">
                                <div class="d-flex align-items-center">
                                    <div class="consultation-icon bg-info text-white rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-responsive">Droit du Travail</div>
                                        <div class="small text-muted">#CONS-2025-002</div>
                                        <div class="small text-muted d-md-none">Michel Dubois • Me Pierre Martin</div>
                                        <div class="small text-muted d-sm-none">En cours • 40.000 FCFA</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Client" class="d-none d-md-table-cell">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="https://ui-avatars.com/api/?name=Michel+Dubois&background=28a745&color=fff" width="30" height="30">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Michel Dubois</div>
                                        <div class="small text-muted">Salarié</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Avocat" class="d-none d-lg-table-cell">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="https://ui-avatars.com/api/?name=Pierre+Martin&background=17a2b8&color=fff" width="30" height="30">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Me Pierre Martin</div>
                                        <div class="small text-muted">Droit du travail</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Date & Heure" class="d-none d-sm-table-cell">
                                <div class="font-weight-bold text-success">En cours</div>
                                <div class="small text-muted">Démarrée à 14h00</div>
                            </td>
                            <td data-label="Tarif" class="d-none d-lg-table-cell">
                                <div class="font-weight-bold text-info">40.000 FCFA</div>
                                <div class="small text-muted">1h consultation</div>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-info">En cours</span>
                            </td>
                            <td data-label="Actions">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-eye mr-2"></i>Voir détails
                                        </a>
                                        <a class="dropdown-item text-success" href="#">
                                            <i class="fas fa-video mr-2"></i>Rejoindre
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-pause mr-2"></i>Mettre en pause
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Consultation">
                                <div class="d-flex align-items-center">
                                    <div class="consultation-icon bg-warning text-dark rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-responsive">Droit Immobilier</div>
                                        <div class="small text-muted">#CONS-2025-003</div>
                                        <div class="small text-muted d-md-none">Isabelle Leroy • Me Sophie Bernard</div>
                                        <div class="small text-muted d-sm-none">Hier 16h00 • 60.000 FCFA</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Client" class="d-none d-md-table-cell">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="https://ui-avatars.com/api/?name=Isabelle+Leroy&background=dc3545&color=fff" width="30" height="30">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Isabelle Leroy</div>
                                        <div class="small text-muted">Propriétaire</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Avocat" class="d-none d-lg-table-cell">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="https://ui-avatars.com/api/?name=Sophie+Bernard&background=dc3545&color=fff" width="30" height="30">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Me Sophie Bernard</div>
                                        <div class="small text-muted">Droit immobilier</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Date & Heure" class="d-none d-sm-table-cell">
                                <div class="font-weight-bold">Hier</div>
                                <div class="small text-muted">16h00 - 17h00</div>
                            </td>
                            <td data-label="Tarif" class="d-none d-lg-table-cell">
                                <div class="font-weight-bold text-warning">60.000 FCFA</div>
                                <div class="small text-muted">1h consultation</div>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-primary">Terminée</span>
                            </td>
                            <td data-label="Actions">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-eye mr-2"></i>Voir détails
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-file-pdf mr-2"></i>Rapport final
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-star mr-2"></i>Évaluation
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-envelope mr-2"></i>Facture
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex flex-column flex-sm-row justify-content-between align-items-center">
            <div class="mb-2 mb-sm-0">
                <small class="text-muted">Affichage de 1 à 20 sur 2,847 consultations</small>
            </div>
            <nav aria-label="Consultations pagination">
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

    <!-- Add Consultation Modal -->
    <div class="modal fade" id="addConsultationModal" tabindex="-1" role="dialog" aria-labelledby="addConsultationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addConsultationModalLabel">
                        <i class="fas fa-plus mr-2"></i>
                        Nouvelle Consultation
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addConsultationForm">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold text-primary mb-3">
                                    <i class="fas fa-user mr-2"></i>Informations Client
                                </h6>
                                <div class="form-group">
                                    <label for="client" class="font-weight-bold">Client *</label>
                                    <select class="form-control" id="client" required>
                                        <option value="">Sélectionner un client</option>
                                        <option value="sophie-bernard">Sophie Bernard</option>
                                        <option value="michel-dubois">Michel Dubois</option>
                                        <option value="isabelle-leroy">Isabelle Leroy</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="domaine" class="font-weight-bold">Domaine juridique *</label>
                                    <select class="form-control" id="domaine" required>
                                        <option value="">Sélectionner un domaine</option>
                                        <option value="droit-des-affaires">Droit des affaires</option>
                                        <option value="droit-du-travail">Droit du travail</option>
                                        <option value="droit-penal">Droit pénal</option>
                                        <option value="droit-de-la-famille">Droit de la famille</option>
                                        <option value="droit-immobilier">Droit immobilier</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="font-weight-bold">Description du problème *</label>
                                    <textarea class="form-control" id="description" rows="4" required placeholder="Décrivez brièvement la situation..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold text-primary mb-3">
                                    <i class="fas fa-calendar mr-2"></i>Planification
                                </h6>
                                <div class="form-group">
                                    <label for="avocat" class="font-weight-bold">Avocat assigné *</label>
                                    <select class="form-control" id="avocat" required>
                                        <option value="">Sélectionner un avocat</option>
                                        <option value="marie-dubois">Me Marie Dubois - Droit des affaires</option>
                                        <option value="pierre-martin">Me Pierre Martin - Droit du travail</option>
                                        <option value="sophie-bernard">Me Sophie Bernard - Droit de la famille</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date" class="font-weight-bold">Date *</label>
                                            <input type="date" class="form-control" id="date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="heure" class="font-weight-bold">Heure *</label>
                                            <input type="time" class="form-control" id="heure" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="duree" class="font-weight-bold">Durée (minutes) *</label>
                                    <select class="form-control" id="duree" required>
                                        <option value="">Sélectionner la durée</option>
                                        <option value="30">30 minutes</option>
                                        <option value="60">1 heure</option>
                                        <option value="90">1h30</option>
                                        <option value="120">2 heures</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tarif" class="font-weight-bold">Tarif (FCFA) *</label>
                                    <input type="number" class="form-control" id="tarif" required placeholder="Ex: 50000">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notes" class="font-weight-bold">Notes additionnelles</label>
                            <textarea class="form-control" id="notes" rows="3" placeholder="Informations complémentaires..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        Programmer la consultation
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Search and filter functionality
    function filterConsultations() {
        const searchTerm = document.getElementById('searchConsultation').value.toLowerCase();
        const statusFilter = document.getElementById('filterStatus').value;
        const domaineFilter = document.getElementById('filterDomaine').value;
        const avocatFilter = document.getElementById('filterAvocat').value;

        const tableRows = document.querySelectorAll('#consultationsTable tbody tr');

        tableRows.forEach(row => {
            const consultationData = row.querySelector('[data-label="Consultation"] .font-weight-bold').textContent.toLowerCase();
            const clientData = row.querySelector('[data-label="Client"] .font-weight-bold')?.textContent.toLowerCase() || '';
            const avocatData = row.querySelector('[data-label="Avocat"] .font-weight-bold')?.textContent.toLowerCase() || '';
            const status = row.querySelector('[data-label="Statut"] .badge').textContent.toLowerCase();

            let show = true;

            // Search filter
            if (searchTerm && !consultationData.includes(searchTerm) && !clientData.includes(searchTerm) && !avocatData.includes(searchTerm)) {
                show = false;
            }

            // Status filter
            if (statusFilter && !status.includes(statusFilter.replace('-', ' '))) {
                show = false;
            }

            row.style.display = show ? '' : 'none';
        });
    }

    // Event listeners
    document.getElementById('searchConsultation').addEventListener('keyup', filterConsultations);
    document.getElementById('filterStatus').addEventListener('change', filterConsultations);
    document.getElementById('filterDomaine').addEventListener('change', filterConsultations);
    document.getElementById('filterAvocat').addEventListener('change', filterConsultations);

    // Reset filters
    function resetFilters() {
        document.getElementById('searchConsultation').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterDomaine').value = '';
        document.getElementById('filterDate').value = '';
        document.getElementById('filterAvocat').value = '';
        filterConsultations();
    }

    // Switch views
    function switchView(viewType) {
        if (viewType === 'calendar') {
            alert('Vue calendrier à implémenter');
        }
    }

    // Export data
    function exportData() {
        alert('Fonctionnalité d\'export à implémenter');
    }

    // Auto-calculate tariff based on lawyer and duration
    document.getElementById('avocat').addEventListener('change', calculateTariff);
    document.getElementById('duree').addEventListener('change', calculateTariff);

    function calculateTariff() {
        const avocat = document.getElementById('avocat').value;
        const duree = parseInt(document.getElementById('duree').value);

        if (avocat && duree) {
            let tarifHoraire = 50000; // Tarif par défaut en FCFA

            // Tarifs différents selon l'avocat
            switch(avocat) {
                case 'marie-dubois':
                    tarifHoraire = 60000;
                    break;
                case 'pierre-martin':
                    tarifHoraire = 45000;
                    break;
                case 'sophie-bernard':
                    tarifHoraire = 55000;
                    break;
            }

            const tarif = Math.round((tarifHoraire * duree) / 60);
            document.getElementById('tarif').value = tarif;
        }
    }

    // Modal form validation
    document.getElementById('addConsultationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Fonctionnalité à implémenter');
    });
</script>
@endsection
