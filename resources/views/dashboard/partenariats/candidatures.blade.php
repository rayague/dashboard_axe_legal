@extends('dashboard.layout')

@section('title', 'Candidatures de Partenariat - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-plus text-primary mr-2"></i>
            Candidatures de Partenariat
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Partenariats</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Candidatures</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-info btn-sm" onclick="exportCandidatures()">
                    <i class="fas fa-download mr-1"></i>
                    <span class="d-none d-sm-inline">Exporter</span>
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="bulkApprove()">
                    <i class="fas fa-check-double mr-1"></i>
                    <span class="d-none d-sm-inline">Approuver Multiples</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">En Attente</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Approuvées</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">34</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Rejetées</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Taux d'Approbation</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">81%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 81%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-percentage fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtres et Recherche -->
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
                        <option value="approved">Approuvée</option>
                        <option value="rejected">Rejetée</option>
                        <option value="under_review">En cours d'examen</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="typeFilter" class="form-label">Type de Partenariat</label>
                    <select class="form-control" id="typeFilter">
                        <option value="">Tous les types</option>
                        <option value="law_firm">Cabinet d'avocats</option>
                        <option value="notary">Étude notariale</option>
                        <option value="consultant">Consultant juridique</option>
                        <option value="expert">Expert-comptable</option>
                        <option value="insurance">Assurance</option>
                        <option value="bank">Banque</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="dateFilter" class="form-label">Période</label>
                    <input type="date" class="form-control" id="dateFilter">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="regionFilter" class="form-label">Région</label>
                    <select class="form-control" id="regionFilter">
                        <option value="">Toutes les régions</option>
                        <option value="abidjan">Abidjan</option>
                        <option value="yamoussoukro">Yamoussoukro</option>
                        <option value="bouake">Bouaké</option>
                        <option value="san_pedro">San-Pédro</option>
                        <option value="korhogo">Korhogo</option>
                        <option value="daloa">Daloa</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="searchInput" class="form-label">Recherche</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="Rechercher par nom, entreprise, email...">
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
                    <button class="btn btn-primary" onclick="applyFilters()">
                        <i class="fas fa-filter mr-1"></i>
                        Appliquer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Candidatures Récentes -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-inbox mr-2"></i>
                Nouvelles Candidatures
            </h6>
            <span class="badge badge-warning badge-counter">12</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="newCandidatesTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="selectAllNew">
                                    <label class="custom-control-label" for="selectAllNew"></label>
                                </div>
                            </th>
                            <th>Candidat</th>
                            <th>Type</th>
                            <th>Spécialité</th>
                            <th>Région</th>
                            <th>Date Candidature</th>
                            <th>Priorité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="candidate1">
                                    <label class="custom-control-label" for="candidate1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-primary text-white rounded-circle">KB</span>
                                    </div>
                                    <div>
                                        <strong>Cabinet Koné & Associés</strong><br>
                                        <small class="text-muted">Me. Koné Bamba - koné@cabinet.ci</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-primary">Cabinet d'avocats</span></td>
                            <td>Droit Commercial</td>
                            <td>Abidjan</td>
                            <td>08/01/2025<br><small class="text-muted">14:30</small></td>
                            <td><span class="badge badge-danger">Haute</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewCandidate(1)" title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-success btn-sm" onclick="approveCandidate(1)" title="Approuver">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="requestMoreInfo(1)" title="Plus d'infos">
                                        <i class="fas fa-question-circle"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="rejectCandidate(1)" title="Rejeter">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="candidate2">
                                    <label class="custom-control-label" for="candidate2"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-success text-white rounded-circle">ES</span>
                                    </div>
                                    <div>
                                        <strong>Étude Soro Notaires</strong><br>
                                        <small class="text-muted">Me. Soro Evelyne - contact@soro-notaires.ci</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">Étude notariale</span></td>
                            <td>Droit Immobilier</td>
                            <td>Bouaké</td>
                            <td>08/01/2025<br><small class="text-muted">10:15</small></td>
                            <td><span class="badge badge-warning">Normale</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewCandidate(2)" title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-success btn-sm" onclick="approveCandidate(2)" title="Approuver">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="requestMoreInfo(2)" title="Plus d'infos">
                                        <i class="fas fa-question-circle"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="rejectCandidate(2)" title="Rejeter">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="candidate3">
                                    <label class="custom-control-label" for="candidate3"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-warning text-white rounded-circle">TA</span>
                                    </div>
                                    <div>
                                        <strong>Traoré & Associés</strong><br>
                                        <small class="text-muted">Me. Traoré Aminata - aminata@traore-associes.ci</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-info">Consultant juridique</span></td>
                            <td>Droit du Travail</td>
                            <td>Yamoussoukro</td>
                            <td>07/01/2025<br><small class="text-muted">16:45</small></td>
                            <td><span class="badge badge-info">Faible</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewCandidate(3)" title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-success btn-sm" onclick="approveCandidate(3)" title="Approuver">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="requestMoreInfo(3)" title="Plus d'infos">
                                        <i class="fas fa-question-circle"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="rejectCandidate(3)" title="Rejeter">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Toutes les Candidatures -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-list mr-2"></i>
                Historique des Candidatures
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="allCandidatesTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Candidat</th>
                            <th>Type</th>
                            <th>Spécialité</th>
                            <th>Date Candidature</th>
                            <th>Date Traitement</th>
                            <th>Statut</th>
                            <th>Traité par</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-success text-white rounded-circle">DA</span>
                                    </div>
                                    <div>
                                        <strong>Cabinet Diabaté</strong><br>
                                        <small class="text-muted">Me. Diabaté Alassane</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-primary">Cabinet d'avocats</span></td>
                            <td>Droit Pénal</td>
                            <td>05/01/2025</td>
                            <td>07/01/2025</td>
                            <td><span class="badge badge-success">Approuvée</span></td>
                            <td>Admin Kouadio</td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewDetails(101)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="viewContract(101)" title="Contrat">
                                    <i class="fas fa-file-contract"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-danger text-white rounded-circle">KB</span>
                                    </div>
                                    <div>
                                        <strong>Koffi & Partners</strong><br>
                                        <small class="text-muted">Me. Koffi Bernard</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-warning">Expert-comptable</span></td>
                            <td>Droit Fiscal</td>
                            <td>03/01/2025</td>
                            <td>06/01/2025</td>
                            <td><span class="badge badge-danger">Rejetée</span></td>
                            <td>Admin Yao</td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewDetails(102)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="reconsider(102)" title="Reconsidérer">
                                    <i class="fas fa-redo"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-info text-white rounded-circle">AF</span>
                                    </div>
                                    <div>
                                        <strong>Assurance AXA CI</strong><br>
                                        <small class="text-muted">Assi Fatou - Directrice</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-info">Assurance</span></td>
                            <td>Protection Juridique</td>
                            <td>02/01/2025</td>
                            <td>04/01/2025</td>
                            <td><span class="badge badge-success">Approuvée</span></td>
                            <td>Admin Kouadio</td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewDetails(103)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="viewContract(103)" title="Contrat">
                                    <i class="fas fa-file-contract"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal: Détails de la Candidature -->
    <div class="modal fade" id="candidateModal" tabindex="-1" role="dialog" aria-labelledby="candidateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="candidateModalLabel">
                        <i class="fas fa-user-plus mr-2"></i>
                        Détails de la Candidature
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="candidateDetails">
                        <!-- Contenu dynamique -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Fermer
                    </button>
                    <button type="button" class="btn btn-danger" onclick="rejectFromModal()">
                        <i class="fas fa-times mr-1"></i>Rejeter
                    </button>
                    <button type="button" class="btn btn-warning" onclick="requestInfoFromModal()">
                        <i class="fas fa-question-circle mr-1"></i>Plus d'infos
                    </button>
                    <button type="button" class="btn btn-success" onclick="approveFromModal()">
                        <i class="fas fa-check mr-1"></i>Approuver
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Demande d'informations -->
    <div class="modal fade" id="requestInfoModal" tabindex="-1" role="dialog" aria-labelledby="requestInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestInfoModalLabel">
                        <i class="fas fa-question-circle mr-2"></i>
                        Demander des Informations Complémentaires
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="requestInfoForm">
                        <div class="form-group">
                            <label for="infoSubject">Sujet</label>
                            <input type="text" class="form-control" id="infoSubject" required>
                        </div>
                        <div class="form-group">
                            <label for="infoMessage">Message</label>
                            <textarea class="form-control" id="infoMessage" rows="4" required placeholder="Précisez les informations ou documents requis..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="infoDeadline">Délai de réponse</label>
                            <select class="form-control" id="infoDeadline">
                                <option value="3">3 jours</option>
                                <option value="7" selected>7 jours</option>
                                <option value="14">14 jours</option>
                                <option value="30">30 jours</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Annuler
                    </button>
                    <button type="button" class="btn btn-primary" onclick="sendInfoRequest()">
                        <i class="fas fa-paper-plane mr-1"></i>Envoyer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Rejet de Candidature -->
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">
                        <i class="fas fa-times-circle mr-2"></i>
                        Rejeter la Candidature
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Cette action rejettera définitivement la candidature.
                    </div>
                    <form id="rejectForm">
                        <div class="form-group">
                            <label for="rejectReason">Raison du rejet</label>
                            <select class="form-control" id="rejectReason" required>
                                <option value="">Sélectionner une raison</option>
                                <option value="incomplete">Dossier incomplet</option>
                                <option value="not_qualified">Non qualifié</option>
                                <option value="no_need">Pas de besoin actuel</option>
                                <option value="competition">Concurrence directe</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rejectMessage">Message personnalisé</label>
                            <textarea class="form-control" id="rejectMessage" rows="3" placeholder="Message optionnel pour le candidat..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Annuler
                    </button>
                    <button type="button" class="btn btn-danger" onclick="processRejection()">
                        <i class="fas fa-trash mr-1"></i>Confirmer le Rejet
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
        $('#newCandidatesTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 5, "desc" ]], // Sort by date
            "pageLength": 10,
            "columnDefs": [
                { "orderable": false, "targets": [0, 7] }
            ]
        });

        $('#allCandidatesTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 3, "desc" ]], // Sort by application date
            "pageLength": 15
        });

        // Select all functionality
        $('#selectAllNew').change(function() {
            $('#newCandidatesTable tbody input[type="checkbox"]').prop('checked', this.checked);
        });
    });

    // View candidate details
    function viewCandidate(id) {
        // Load candidate details dynamically
        $('#candidateDetails').html(`
            <div class="row">
                <div class="col-md-8">
                    <h6>Informations générales</h6>
                    <table class="table table-borderless">
                        <tr><td><strong>Nom/Entreprise:</strong></td><td>Cabinet Koné & Associés</td></tr>
                        <tr><td><strong>Contact:</strong></td><td>Me. Koné Bamba</td></tr>
                        <tr><td><strong>Email:</strong></td><td>koné@cabinet.ci</td></tr>
                        <tr><td><strong>Téléphone:</strong></td><td>+225 07 88 99 11</td></tr>
                        <tr><td><strong>Spécialité:</strong></td><td>Droit Commercial</td></tr>
                        <tr><td><strong>Années d'expérience:</strong></td><td>15 ans</td></tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <h6>Documents fournis</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-file-pdf text-danger mr-2"></i>CV détaillé</li>
                        <li><i class="fas fa-file-pdf text-danger mr-2"></i>Diplômes</li>
                        <li><i class="fas fa-file-pdf text-danger mr-2"></i>Références</li>
                        <li><i class="fas fa-file-pdf text-danger mr-2"></i>Portfolio</li>
                    </ul>
                </div>
            </div>
            <hr>
            <h6>Motivation</h6>
            <p class="text-muted">
                Fort de 15 années d'expérience en droit commercial, notre cabinet souhaite rejoindre le réseau Axe Legal
                pour élargir notre clientèle et bénéficier de la notoriété de votre plateforme...
            </p>
        `);

        $('#candidateModal').data('candidate-id', id);
        $('#candidateModal').modal('show');
    }

    // Approve candidate
    function approveCandidate(id) {
        if (confirm('Approuver cette candidature ?')) {
            console.log('Approving candidate:', id);
            alert('Candidature approuvée ! Un email de confirmation a été envoyé.');
            location.reload();
        }
    }

    // Request more information
    function requestMoreInfo(id) {
        $('#requestInfoModal').data('candidate-id', id);
        $('#requestInfoModal').modal('show');
    }

    // Reject candidate
    function rejectCandidate(id) {
        $('#rejectModal').data('candidate-id', id);
        $('#rejectModal').modal('show');
    }

    // Modal actions
    function approveFromModal() {
        const id = $('#candidateModal').data('candidate-id');
        $('#candidateModal').modal('hide');
        approveCandidate(id);
    }

    function requestInfoFromModal() {
        const id = $('#candidateModal').data('candidate-id');
        $('#candidateModal').modal('hide');
        requestMoreInfo(id);
    }

    function rejectFromModal() {
        const id = $('#candidateModal').data('candidate-id');
        $('#candidateModal').modal('hide');
        rejectCandidate(id);
    }

    // Send information request
    function sendInfoRequest() {
        const form = document.getElementById('requestInfoForm');
        if (form.checkValidity()) {
            const id = $('#requestInfoModal').data('candidate-id');
            console.log('Sending info request to candidate:', id);
            alert('Demande d\'informations envoyée !');
            $('#requestInfoModal').modal('hide');
        } else {
            form.reportValidity();
        }
    }

    // Process rejection
    function processRejection() {
        const form = document.getElementById('rejectForm');
        if (form.checkValidity()) {
            const id = $('#rejectModal').data('candidate-id');
            console.log('Rejecting candidate:', id);
            alert('Candidature rejetée. Un email a été envoyé au candidat.');
            $('#rejectModal').modal('hide');
            location.reload();
        } else {
            form.reportValidity();
        }
    }

    // Bulk operations
    function bulkApprove() {
        const selected = $('#newCandidatesTable tbody input[type="checkbox"]:checked').length;
        if (selected === 0) {
            alert('Veuillez sélectionner au moins une candidature.');
            return;
        }
        if (confirm(`Approuver les ${selected} candidatures sélectionnées ?`)) {
            console.log('Bulk approving candidates');
            alert('Candidatures approuvées !');
            location.reload();
        }
    }

    // View details for approved/rejected candidates
    function viewDetails(id) {
        console.log('Viewing details for candidate:', id);
        // Implementation for detailed view
    }

    function viewContract(id) {
        console.log('Viewing contract for partner:', id);
        // Implementation for contract view
    }

    function reconsider(id) {
        if (confirm('Reconsidérer cette candidature rejetée ?')) {
            console.log('Reconsidering candidate:', id);
            alert('Candidature remise en examen !');
            location.reload();
        }
    }

    // Filter functions
    function resetFilters() {
        document.getElementById('statusFilter').value = '';
        document.getElementById('typeFilter').value = '';
        document.getElementById('dateFilter').value = '';
        document.getElementById('regionFilter').value = '';
        document.getElementById('searchInput').value = '';
        applyFilters();
    }

    function applyFilters() {
        // Implementation for applying filters
        console.log('Applying filters');
        $('#newCandidatesTable').DataTable().draw();
        $('#allCandidatesTable').DataTable().draw();
    }

    // Export functions
    function exportCandidatures() {
        console.log('Exporting candidates');
        alert('Export en cours...');
    }
</script>
@endsection
