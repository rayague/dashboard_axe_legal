@extends('dashboard.layout')

@section('title', 'Gestion des Participants - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-users text-primary mr-2"></i>
            Gestion des Participants
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('evenements.index') }}">Événements</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Participants</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary btn-sm" onclick="addParticipant()">
                    <i class="fas fa-user-plus mr-1"></i>
                    <span class="d-none d-sm-inline">Ajouter</span>
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="exportParticipants()">
                    <i class="fas fa-download mr-1"></i>
                    <span class="d-none d-sm-inline">Exporter</span>
                </button>
                <button type="button" class="btn btn-info btn-sm" onclick="sendBulkEmail()">
                    <i class="fas fa-envelope mr-1"></i>
                    <span class="d-none d-sm-inline">Email</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Participants</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1,247</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Confirmés</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">894</div>
                            <div class="text-xs text-success">+12% ce mois</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">En Attente</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">287</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-clock fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Taux Présence</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">87%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 87%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-pie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Selection and Filters -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-filter mr-2"></i>
                Filtres et Sélection d'Événement
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="eventFilter" class="form-label">Événement</label>
                    <select class="form-control" id="eventFilter" onchange="filterByEvent()">
                        <option value="">Tous les événements</option>
                        <option value="1" selected>Conférence Droit Pénal 2025</option>
                        <option value="2">Webinaire Nouveaux Codes</option>
                        <option value="3">Formation Droit Commercial</option>
                        <option value="4">Séminaire Droit du Travail</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="statusFilter" class="form-label">Statut</label>
                    <select class="form-control" id="statusFilter" onchange="filterByStatus()">
                        <option value="">Tous</option>
                        <option value="confirmed">Confirmé</option>
                        <option value="pending">En attente</option>
                        <option value="cancelled">Annulé</option>
                        <option value="attended">Présent</option>
                        <option value="absent">Absent</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="typeFilter" class="form-label">Type</label>
                    <select class="form-control" id="typeFilter" onchange="filterByType()">
                        <option value="">Tous</option>
                        <option value="lawyer">Avocat</option>
                        <option value="student">Étudiant</option>
                        <option value="professional">Professionnel</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="searchInput" class="form-label">Recherche</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="Nom, email...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 mb-3">
                    <label class="form-label">&nbsp;</label>
                    <button class="btn btn-secondary btn-block" onclick="resetFilters()">
                        <i class="fas fa-undo"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Participants Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table mr-2"></i>
                Liste des Participants
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <div class="dropdown-header">Actions en lot:</div>
                    <a class="dropdown-item" href="#" onclick="bulkConfirm()">
                        <i class="fas fa-check fa-sm fa-fw mr-2 text-gray-400"></i>
                        Confirmer sélectionnés
                    </a>
                    <a class="dropdown-item" href="#" onclick="bulkCancel()">
                        <i class="fas fa-times fa-sm fa-fw mr-2 text-gray-400"></i>
                        Annuler sélectionnés
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="bulkDelete()">
                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                        Supprimer sélectionnés
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="participantsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                </div>
                            </th>
                            <th>Participant</th>
                            <th>Événement</th>
                            <th>Type</th>
                            <th>Statut</th>
                            <th>Date Inscription</th>
                            <th>Paiement</th>
                            <th>Présence</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input participant-checkbox" type="checkbox" value="1">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <img src="{{ asset('dashboard/img/undraw_profile.svg') }}"
                                             class="avatar-img rounded-circle" alt="Avatar">
                                    </div>
                                    <div>
                                        <strong>Kouassi Marie</strong><br>
                                        <small class="text-muted">marie.kouassi@email.com</small><br>
                                        <small class="text-muted">+225 07 88 99 11</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="font-weight-bold">Conférence Droit Pénal 2025</span><br>
                                <small class="text-muted">15 Janvier 2025, 09:00</small>
                            </td>
                            <td><span class="badge badge-info">Avocat</span></td>
                            <td><span class="badge badge-success">Confirmé</span></td>
                            <td>
                                08/01/2025<br>
                                <small class="text-muted">Il y a 2 jours</small>
                            </td>
                            <td>
                                <span class="badge badge-success">Payé</span><br>
                                <small class="text-success">5,000 FCFA</small>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="attendance1" checked>
                                    <label class="form-check-label" for="attendance1">Présent</label>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewParticipant(1)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editParticipant(1)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-primary btn-sm" onclick="sendEmail(1)" title="Email">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteParticipant(1)" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input participant-checkbox" type="checkbox" value="2">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-primary text-white rounded-circle">AB</span>
                                    </div>
                                    <div>
                                        <strong>Assouman Boubacar</strong><br>
                                        <small class="text-muted">boubacar.a@email.com</small><br>
                                        <small class="text-muted">+225 05 66 77 88</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="font-weight-bold">Conférence Droit Pénal 2025</span><br>
                                <small class="text-muted">15 Janvier 2025, 09:00</small>
                            </td>
                            <td><span class="badge badge-warning">Étudiant</span></td>
                            <td><span class="badge badge-warning">En attente</span></td>
                            <td>
                                07/01/2025<br>
                                <small class="text-muted">Il y a 3 jours</small>
                            </td>
                            <td>
                                <span class="badge badge-warning">En attente</span><br>
                                <small class="text-warning">2,500 FCFA</small>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="attendance2">
                                    <label class="form-check-label" for="attendance2">Absent</label>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewParticipant(2)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editParticipant(2)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-primary btn-sm" onclick="sendEmail(2)" title="Email">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteParticipant(2)" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input participant-checkbox" type="checkbox" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-success text-white rounded-circle">FK</span>
                                    </div>
                                    <div>
                                        <strong>Fofana Kadija</strong><br>
                                        <small class="text-muted">kadija.fofana@email.com</small><br>
                                        <small class="text-muted">+225 01 23 45 67</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="font-weight-bold">Webinaire Nouveaux Codes</span><br>
                                <small class="text-muted">20 Janvier 2025, 14:00</small>
                            </td>
                            <td><span class="badge badge-primary">Professionnel</span></td>
                            <td><span class="badge badge-success">Confirmé</span></td>
                            <td>
                                05/01/2025<br>
                                <small class="text-muted">Il y a 5 jours</small>
                            </td>
                            <td>
                                <span class="badge badge-info">Gratuit</span><br>
                                <small class="text-info">0 FCFA</small>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="attendance3" checked>
                                    <label class="form-check-label" for="attendance3">Présent</label>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewParticipant(3)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editParticipant(3)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-primary btn-sm" onclick="sendEmail(3)" title="Email">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteParticipant(3)" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal: Add/Edit Participant -->
    <div class="modal fade" id="participantModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="participantModalLabel">
                        <i class="fas fa-user-plus mr-2"></i>
                        Ajouter un Participant
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="participantForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="participantName" class="form-label">Nom complet *</label>
                                <input type="text" class="form-control" id="participantName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="participantEmail" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="participantEmail" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="participantPhone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" id="participantPhone">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="participantType" class="form-label">Type *</label>
                                <select class="form-control" id="participantType" required>
                                    <option value="">Sélectionner...</option>
                                    <option value="lawyer">Avocat</option>
                                    <option value="student">Étudiant</option>
                                    <option value="professional">Professionnel</option>
                                    <option value="other">Autre</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="participantEvent" class="form-label">Événement *</label>
                                <select class="form-control" id="participantEvent" required>
                                    <option value="">Sélectionner...</option>
                                    <option value="1">Conférence Droit Pénal 2025</option>
                                    <option value="2">Webinaire Nouveaux Codes</option>
                                    <option value="3">Formation Droit Commercial</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="participantStatus" class="form-label">Statut</label>
                                <select class="form-control" id="participantStatus">
                                    <option value="pending">En attente</option>
                                    <option value="confirmed">Confirmé</option>
                                    <option value="cancelled">Annulé</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="participantOrganization" class="form-label">Organisation</label>
                            <input type="text" class="form-control" id="participantOrganization">
                        </div>
                        <div class="mb-3">
                            <label for="participantNotes" class="form-label">Notes</label>
                            <textarea class="form-control" id="participantNotes" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Annuler
                    </button>
                    <button type="button" class="btn btn-primary" onclick="saveParticipant()">
                        <i class="fas fa-save mr-1"></i>Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Participant Details -->
    <div class="modal fade" id="participantDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-user mr-2"></i>
                        Détails du Participant
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="participantDetailsContent">
                        <!-- Content populated by JavaScript -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Fermer
                    </button>
                    <button type="button" class="btn btn-warning" onclick="editParticipantFromDetails()">
                        <i class="fas fa-edit mr-1"></i>Modifier
                    </button>
                    <button type="button" class="btn btn-primary" onclick="sendEmailFromDetails()">
                        <i class="fas fa-envelope mr-1"></i>Envoyer Email
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Send Email -->
    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-envelope mr-2"></i>
                        Envoyer un Email
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="emailForm">
                        <div class="mb-3">
                            <label for="emailTo" class="form-label">Destinataire</label>
                            <input type="email" class="form-control" id="emailTo" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="emailSubject" class="form-label">Sujet</label>
                            <input type="text" class="form-control" id="emailSubject" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailTemplate" class="form-label">Modèle</label>
                            <select class="form-control" id="emailTemplate" onchange="loadEmailTemplate()">
                                <option value="">Personnalisé</option>
                                <option value="confirmation">Confirmation d'inscription</option>
                                <option value="reminder">Rappel d'événement</option>
                                <option value="certificate">Certificat de participation</option>
                                <option value="feedback">Demande de feedback</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="emailMessage" class="form-label">Message</label>
                            <textarea class="form-control" id="emailMessage" rows="6" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Annuler
                    </button>
                    <button type="button" class="btn btn-primary" onclick="sendEmailMessage()">
                        <i class="fas fa-paper-plane mr-1"></i>Envoyer
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#participantsTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 5, "desc" ]], // Sort by registration date
            "pageLength": 25,
            "columnDefs": [
                { "orderable": false, "targets": [0, 8] } // Disable sorting for checkbox and actions
            ]
        });

        // Select all checkbox functionality
        $('#selectAll').change(function() {
            $('.participant-checkbox').prop('checked', this.checked);
        });

        // Individual checkbox functionality
        $('.participant-checkbox').change(function() {
            if (!this.checked) {
                $('#selectAll').prop('checked', false);
            } else if ($('.participant-checkbox:checked').length === $('.participant-checkbox').length) {
                $('#selectAll').prop('checked', true);
            }
        });
    });

    // Filter functions
    function filterByEvent() {
        const eventId = document.getElementById('eventFilter').value;
        console.log('Filtering by event:', eventId);
        // Implementation for event filtering
    }

    function filterByStatus() {
        const status = document.getElementById('statusFilter').value;
        console.log('Filtering by status:', status);
        // Implementation for status filtering
    }

    function filterByType() {
        const type = document.getElementById('typeFilter').value;
        console.log('Filtering by type:', type);
        // Implementation for type filtering
    }

    function resetFilters() {
        document.getElementById('eventFilter').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('typeFilter').value = '';
        document.getElementById('searchInput').value = '';
        $('#participantsTable').DataTable().search('').draw();
    }

    // Participant management functions
    function addParticipant() {
        document.getElementById('participantModalLabel').innerHTML = '<i class="fas fa-user-plus mr-2"></i>Ajouter un Participant';
        document.getElementById('participantForm').reset();
        $('#participantModal').modal('show');
    }

    function editParticipant(id) {
        document.getElementById('participantModalLabel').innerHTML = '<i class="fas fa-user-edit mr-2"></i>Modifier le Participant';

        // Load participant data (simulated)
        document.getElementById('participantName').value = 'Kouassi Marie';
        document.getElementById('participantEmail').value = 'marie.kouassi@email.com';
        document.getElementById('participantPhone').value = '+225 07 88 99 11';
        document.getElementById('participantType').value = 'lawyer';
        document.getElementById('participantEvent').value = '1';
        document.getElementById('participantStatus').value = 'confirmed';

        $('#participantModal').data('participant-id', id);
        $('#participantModal').modal('show');
    }

    function viewParticipant(id) {
        // Generate participant details content
        const detailsHtml = `
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Informations personnelles</h6>
                            <table class="table table-borderless">
                                <tr><td><strong>Nom:</strong></td><td>Kouassi Marie</td></tr>
                                <tr><td><strong>Email:</strong></td><td>marie.kouassi@email.com</td></tr>
                                <tr><td><strong>Téléphone:</strong></td><td>+225 07 88 99 11</td></tr>
                                <tr><td><strong>Type:</strong></td><td>Avocat</td></tr>
                                <tr><td><strong>Organisation:</strong></td><td>Cabinet Kouassi & Associés</td></tr>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h6 class="card-title">Historique des événements</h6>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Événement</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th>Présence</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Conférence Droit Pénal 2025</td>
                                            <td>15/01/2025</td>
                                            <td><span class="badge badge-success">Confirmé</span></td>
                                            <td><span class="badge badge-success">Présent</span></td>
                                        </tr>
                                        <tr>
                                            <td>Formation Droit Commercial</td>
                                            <td>10/12/2024</td>
                                            <td><span class="badge badge-success">Confirmé</span></td>
                                            <td><span class="badge badge-success">Présent</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="avatar-lg mx-auto mb-3">
                                <img src="${assetUrl('dashboard/img/undraw_profile.svg')}"
                                     class="avatar-img rounded-circle" alt="Avatar">
                            </div>
                            <h6>Kouassi Marie</h6>
                            <p class="text-muted">Avocat</p>

                            <div class="row text-center mt-3">
                                <div class="col-6">
                                    <h6 class="text-primary">5</h6>
                                    <small class="text-muted">Événements</small>
                                </div>
                                <div class="col-6">
                                    <h6 class="text-success">100%</h6>
                                    <small class="text-muted">Présence</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h6>Informations d'inscription</h6>
                            <p><strong>Date:</strong> 08/01/2025</p>
                            <p><strong>Paiement:</strong> <span class="badge badge-success">Payé</span></p>
                            <p><strong>Montant:</strong> 5,000 FCFA</p>
                            <p><strong>Statut:</strong> <span class="badge badge-success">Confirmé</span></p>
                        </div>
                    </div>
                </div>
            </div>
        `;

        document.getElementById('participantDetailsContent').innerHTML = detailsHtml;
        $('#participantDetailsModal').data('participant-id', id);
        $('#participantDetailsModal').modal('show');
    }

    function saveParticipant() {
        const form = document.getElementById('participantForm');
        if (form.checkValidity()) {
            console.log('Saving participant...');
            alert('Participant enregistré avec succès !');
            $('#participantModal').modal('hide');
        } else {
            form.reportValidity();
        }
    }

    function deleteParticipant(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce participant ?')) {
            console.log('Deleting participant:', id);
            alert('Participant supprimé !');
        }
    }

    // Email functions
    function sendEmail(id) {
        document.getElementById('emailTo').value = 'marie.kouassi@email.com';
        document.getElementById('emailSubject').value = '';
        document.getElementById('emailMessage').value = '';
        $('#emailModal').data('participant-id', id);
        $('#emailModal').modal('show');
    }

    function sendEmailFromDetails() {
        const id = $('#participantDetailsModal').data('participant-id');
        $('#participantDetailsModal').modal('hide');
        sendEmail(id);
    }

    function loadEmailTemplate() {
        const template = document.getElementById('emailTemplate').value;
        const templates = {
            confirmation: {
                subject: 'Confirmation de votre inscription',
                message: 'Bonjour,\n\nNous confirmons votre inscription à l\'événement...'
            },
            reminder: {
                subject: 'Rappel - Événement à venir',
                message: 'Bonjour,\n\nNous vous rappelons que l\'événement auquel vous êtes inscrit(e) aura lieu...'
            },
            certificate: {
                subject: 'Certificat de participation',
                message: 'Bonjour,\n\nVeuillez trouver en pièce jointe votre certificat de participation...'
            },
            feedback: {
                subject: 'Votre avis nous intéresse',
                message: 'Bonjour,\n\nNous espérons que vous avez apprécié notre événement...'
            }
        };

        if (templates[template]) {
            document.getElementById('emailSubject').value = templates[template].subject;
            document.getElementById('emailMessage').value = templates[template].message;
        }
    }

    function sendEmailMessage() {
        const form = document.getElementById('emailForm');
        if (form.checkValidity()) {
            console.log('Sending email...');
            alert('Email envoyé avec succès !');
            $('#emailModal').modal('hide');
        } else {
            form.reportValidity();
        }
    }

    // Bulk actions
    function bulkConfirm() {
        const selected = $('.participant-checkbox:checked').length;
        if (selected > 0) {
            if (confirm(`Confirmer ${selected} participant(s) sélectionné(s) ?`)) {
                console.log('Bulk confirming participants');
                alert(`${selected} participant(s) confirmé(s) !`);
            }
        } else {
            alert('Veuillez sélectionner au moins un participant.');
        }
    }

    function bulkCancel() {
        const selected = $('.participant-checkbox:checked').length;
        if (selected > 0) {
            if (confirm(`Annuler l'inscription de ${selected} participant(s) sélectionné(s) ?`)) {
                console.log('Bulk cancelling participants');
                alert(`${selected} inscription(s) annulée(s) !`);
            }
        } else {
            alert('Veuillez sélectionner au moins un participant.');
        }
    }

    function bulkDelete() {
        const selected = $('.participant-checkbox:checked').length;
        if (selected > 0) {
            if (confirm(`Supprimer définitivement ${selected} participant(s) sélectionné(s) ?`)) {
                console.log('Bulk deleting participants');
                alert(`${selected} participant(s) supprimé(s) !`);
            }
        } else {
            alert('Veuillez sélectionner au moins un participant.');
        }
    }

    function sendBulkEmail() {
        const selected = $('.participant-checkbox:checked').length;
        if (selected > 0) {
            console.log(`Sending bulk email to ${selected} participants`);
            alert(`Préparation d'email groupé pour ${selected} participant(s)...`);
        } else {
            alert('Veuillez sélectionner au moins un participant.');
        }
    }

    // Export function
    function exportParticipants() {
        console.log('Exporting participants data');
        alert('Export des données en cours...');
    }

    // Helper functions
    function editParticipantFromDetails() {
        const id = $('#participantDetailsModal').data('participant-id');
        $('#participantDetailsModal').modal('hide');
        editParticipant(id);
    }

    function assetUrl(path) {
        return '/dashboard/' + path;
    }
</script>

<style>
    .avatar-sm {
        width: 40px;
        height: 40px;
    }

    .avatar-lg {
        width: 80px;
        height: 80px;
    }

    .avatar-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .avatar-title {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }

    .form-check-input:checked {
        background-color: #4e73df;
        border-color: #4e73df;
    }
</style>
@endsection
