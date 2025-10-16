@extends('dashboard.layout')

@section('title', 'Historique des Consultations - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-history text-primary mr-2"></i>
            Historique des Consultations
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Services Juridiques</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Historique Consultations</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button class="btn btn-success btn-sm" onclick="exportHistory()">
                    <i class="fas fa-file-export mr-1"></i>
                    <span class="d-none d-sm-inline">Exporter</span>
                </button>
                <button class="btn btn-primary btn-sm" onclick="printHistory()">
                    <i class="fas fa-print mr-1"></i>
                    <span class="d-none d-sm-inline">Imprimer</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Consultations Totales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2,847</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gavel fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Revenus Générés</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">68.5M FCFA</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Taux Satisfaction</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">94%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 94%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-thumbs-up fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Durée Moyenne</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">42 min</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-filter mr-2"></i>
                        Filtres de Recherche
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="font-weight-bold text-sm">Période:</label>
                            <select class="form-control form-control-sm" id="periodFilter">
                                <option value="">Toutes les périodes</option>
                                <option value="today">Aujourd'hui</option>
                                <option value="week">Cette semaine</option>
                                <option value="month">Ce mois</option>
                                <option value="quarter">Ce trimestre</option>
                                <option value="year">Cette année</option>
                                <option value="custom">Période personnalisée</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="font-weight-bold text-sm">Statut:</label>
                            <select class="form-control form-control-sm" id="statusFilter">
                                <option value="">Tous les statuts</option>
                                <option value="completed">Terminées</option>
                                <option value="cancelled">Annulées</option>
                                <option value="no-show">Absence</option>
                                <option value="rescheduled">Reportées</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="font-weight-bold text-sm">Domaine juridique:</label>
                            <select class="form-control form-control-sm" id="domainFilter">
                                <option value="">Tous les domaines</option>
                                <option value="travail">Droit du travail</option>
                                <option value="affaires">Droit des affaires</option>
                                <option value="civil">Droit civil</option>
                                <option value="penal">Droit pénal</option>
                                <option value="immobilier">Droit immobilier</option>
                                <option value="fiscal">Droit fiscal</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="font-weight-bold text-sm">Avocat:</label>
                            <select class="form-control form-control-sm" id="lawyerFilter">
                                <option value="">Tous les avocats</option>
                                <option value="marie-dubois">Me Marie Dubois</option>
                                <option value="jean-martin">Me Jean Martin</option>
                                <option value="claire-bernard">Me Claire Bernard</option>
                                <option value="paul-leroy">Me Paul Leroy</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold text-sm">Recherche:</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" id="searchInput" placeholder="Nom client, sujet, numéro de dossier...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" onclick="applyFilters()">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 d-flex align-items-end">
                            <button class="btn btn-secondary btn-sm mr-2" onclick="resetFilters()">
                                <i class="fas fa-undo mr-1"></i>Réinitialiser
                            </button>
                            <button class="btn btn-info btn-sm" onclick="saveFilters()">
                                <i class="fas fa-save mr-1"></i>Sauvegarder
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Consultations History Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-list mr-2"></i>
                        Historique Détaillé des Consultations
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow">
                            <div class="dropdown-header">Actions:</div>
                            <a class="dropdown-item" href="#" onclick="bulkActions()">
                                <i class="fas fa-tasks fa-sm fa-fw mr-2 text-gray-400"></i>
                                Actions groupées
                            </a>
                            <a class="dropdown-item" href="#" onclick="generateReport()">
                                <i class="fas fa-chart-bar fa-sm fa-fw mr-2 text-gray-400"></i>
                                Générer rapport
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="advancedSearch()">
                                <i class="fas fa-search-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                                Recherche avancée
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="consultationsHistoryTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>Date</th>
                                    <th>Client</th>
                                    <th>Avocat</th>
                                    <th>Domaine</th>
                                    <th>Sujet</th>
                                    <th>Durée</th>
                                    <th>Montant</th>
                                    <th>Statut</th>
                                    <th>Satisfaction</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" class="consultation-checkbox" value="1"></td>
                                    <td>01/10/2025 14:30</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle bg-primary text-white mr-2">SB</div>
                                            <div>
                                                <div class="font-weight-bold">Sophie Bernard</div>
                                                <small class="text-muted">sophie.bernard@email.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Me Marie Dubois</td>
                                    <td><span class="badge badge-primary">Droit du travail</span></td>
                                    <td>Litige avec employeur</td>
                                    <td>45 min</td>
                                    <td class="font-weight-bold text-success">35 000 FCFA</td>
                                    <td><span class="badge badge-success">Terminée</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rating-stars mr-2">
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                            </div>
                                            <small class="text-muted">5.0</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-info btn-sm" onclick="viewConsultation(1)" title="Voir détails">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-success btn-sm" onclick="downloadReport(1)" title="Télécharger rapport">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-warning btn-sm" onclick="sendFollowUp(1)" title="Suivi">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="consultation-checkbox" value="2"></td>
                                    <td>30/09/2025 10:15</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle bg-success text-white mr-2">JM</div>
                                            <div>
                                                <div class="font-weight-bold">Jean Martin</div>
                                                <small class="text-muted">jean.martin@entreprise.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Me Claire Bernard</td>
                                    <td><span class="badge badge-info">Droit des affaires</span></td>
                                    <td>Création société SARL</td>
                                    <td>60 min</td>
                                    <td class="font-weight-bold text-success">75 000 FCFA</td>
                                    <td><span class="badge badge-success">Terminée</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rating-stars mr-2">
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="far fa-star text-muted"></i>
                                            </div>
                                            <small class="text-muted">4.0</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-info btn-sm" onclick="viewConsultation(2)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-success btn-sm" onclick="downloadReport(2)">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-warning btn-sm" onclick="sendFollowUp(2)">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="consultation-checkbox" value="3"></td>
                                    <td>29/09/2025 16:00</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle bg-warning text-white mr-2">AL</div>
                                            <div>
                                                <div class="font-weight-bold">Amélie Leclerc</div>
                                                <small class="text-muted">amelie.leclerc@email.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Me Paul Leroy</td>
                                    <td><span class="badge badge-secondary">Droit civil</span></td>
                                    <td>Succession familiale</td>
                                    <td>90 min</td>
                                    <td class="font-weight-bold text-success">125 000 FCFA</td>
                                    <td><span class="badge badge-danger">Annulée</span></td>
                                    <td>
                                        <small class="text-muted">N/A</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-info btn-sm" onclick="viewConsultation(3)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-primary btn-sm" onclick="rescheduleConsultation(3)" title="Reprogrammer">
                                                <i class="fas fa-calendar-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="consultation-checkbox" value="4"></td>
                                    <td>28/09/2025 11:30</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle bg-danger text-white mr-2">MD</div>
                                            <div>
                                                <div class="font-weight-bold">Marc Dupont</div>
                                                <small class="text-muted">marc.dupont@email.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Me Jean Martin</td>
                                    <td><span class="badge badge-dark">Droit pénal</span></td>
                                    <td>Défense pénale</td>
                                    <td>75 min</td>
                                    <td class="font-weight-bold text-success">95 000 FCFA</td>
                                    <td><span class="badge badge-success">Terminée</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rating-stars mr-2">
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                            </div>
                                            <small class="text-muted">5.0</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-info btn-sm" onclick="viewConsultation(4)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-success btn-sm" onclick="downloadReport(4)">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-warning btn-sm" onclick="sendFollowUp(4)">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="consultation-checkbox" value="5"></td>
                                    <td>27/09/2025 14:45</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle bg-info text-white mr-2">LT</div>
                                            <div>
                                                <div class="font-weight-bold">Lucie Tran</div>
                                                <small class="text-muted">lucie.tran@startup.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Me Marie Dubois</td>
                                    <td><span class="badge badge-success">Droit immobilier</span></td>
                                    <td>Achat immobilier</td>
                                    <td>30 min</td>
                                    <td class="font-weight-bold text-success">25 000 FCFA</td>
                                    <td><span class="badge badge-success">Terminée</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rating-stars mr-2">
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="far fa-star text-muted"></i>
                                            </div>
                                            <small class="text-muted">4.5</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-info btn-sm" onclick="viewConsultation(5)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-success btn-sm" onclick="downloadReport(5)">
                                                <i class="fas fa-download"></i>
                                            </buffer>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .avatar-circle {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        font-weight: bold;
    }

    .rating-stars i {
        font-size: 0.85rem;
    }

    .consultation-checkbox {
        transform: scale(1.1);
    }

    .table td {
        vertical-align: middle;
    }

    .btn-group .btn {
        margin-right: 2px;
    }

    .btn-group .btn:last-child {
        margin-right: 0;
    }

    @media (max-width: 768px) {
        .btn-group {
            flex-direction: column;
        }

        .btn-group .btn {
            margin-bottom: 2px;
            margin-right: 0;
        }

        .avatar-circle {
            width: 30px;
            height: 30px;
            font-size: 0.8rem;
        }

        .table-responsive {
            font-size: 0.875rem;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Initialize DataTable
    $(document).ready(function() {
        $('#consultationsHistoryTable').DataTable({
            "pageLength": 15,
            "order": [[ 1, "desc" ]],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "columnDefs": [
                { "orderable": false, "targets": [0, 10] },
                { "searchable": false, "targets": [0, 10] }
            ]
        });

        // Select all functionality
        $('#selectAll').change(function() {
            $('.consultation-checkbox').prop('checked', this.checked);
            updateBulkActions();
        });

        $('.consultation-checkbox').change(function() {
            updateBulkActions();
        });
    });

    function updateBulkActions() {
        const checkedBoxes = $('.consultation-checkbox:checked').length;
        if (checkedBoxes > 0) {
            // Show bulk actions
            console.log(`${checkedBoxes} consultations sélectionnées`);
        }
    }

    // Filter functions
    function applyFilters() {
        const period = $('#periodFilter').val();
        const status = $('#statusFilter').val();
        const domain = $('#domainFilter').val();
        const lawyer = $('#lawyerFilter').val();
        const search = $('#searchInput').val();

        console.log('Applying filters:', { period, status, domain, lawyer, search });

        // Apply filters to DataTable
        const table = $('#consultationsHistoryTable').DataTable();

        if (status) {
            table.column(8).search(status);
        }
        if (domain) {
            table.column(4).search(domain);
        }
        if (lawyer) {
            table.column(3).search(lawyer);
        }
        if (search) {
            table.search(search);
        }

        table.draw();

        Swal.fire({
            icon: 'success',
            title: 'Filtres appliqués',
            text: 'Les résultats ont été filtrés selon vos critères.',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function resetFilters() {
        $('#periodFilter').val('');
        $('#statusFilter').val('');
        $('#domainFilter').val('');
        $('#lawyerFilter').val('');
        $('#searchInput').val('');

        const table = $('#consultationsHistoryTable').DataTable();
        table.search('').columns().search('').draw();

        Swal.fire({
            icon: 'info',
            title: 'Filtres réinitialisés',
            text: 'Tous les filtres ont été supprimés.',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function saveFilters() {
        const filters = {
            period: $('#periodFilter').val(),
            status: $('#statusFilter').val(),
            domain: $('#domainFilter').val(),
            lawyer: $('#lawyerFilter').val(),
            search: $('#searchInput').val()
        };

        localStorage.setItem('consultationFilters', JSON.stringify(filters));

        Swal.fire({
            icon: 'success',
            title: 'Filtres sauvegardés',
            text: 'Vos préférences de filtrage ont été enregistrées.',
            timer: 2000,
            showConfirmButton: false
        });
    }

    // Action functions
    function viewConsultation(id) {
        Swal.fire({
            title: `Consultation #${id}`,
            html: `
                <div class="text-left">
                    <h6 class="font-weight-bold text-primary mb-3">Détails de la consultation</h6>
                    <div class="mb-2"><strong>Client:</strong> Sophie Bernard</div>
                    <div class="mb-2"><strong>Avocat:</strong> Me Marie Dubois</div>
                    <div class="mb-2"><strong>Date:</strong> 01/10/2025 14:30</div>
                    <div class="mb-2"><strong>Durée:</strong> 45 minutes</div>
                    <div class="mb-2"><strong>Sujet:</strong> Litige avec employeur</div>
                    <div class="mb-2"><strong>Montant:</strong> 35 000 FCFA</div>
                    <div class="mb-2"><strong>Statut:</strong> <span class="badge badge-success">Terminée</span></div>
                    <div class="mb-3"><strong>Notes:</strong> Le client souhaite engager une procédure contre son employeur pour licenciement abusif.</div>
                </div>
            `,
            width: 600,
            showConfirmButton: true,
            confirmButtonText: 'Fermer'
        });
    }

    function downloadReport(id) {
        Swal.fire({
            title: 'Téléchargement en cours...',
            text: `Génération du rapport de consultation #${id}`,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        setTimeout(() => {
            Swal.fire({
                icon: 'success',
                title: 'Rapport téléchargé',
                text: 'Le rapport de consultation a été téléchargé avec succès.',
                timer: 2000,
                showConfirmButton: false
            });
        }, 2000);
    }

    function sendFollowUp(id) {
        Swal.fire({
            title: 'Suivi client',
            input: 'textarea',
            inputLabel: 'Message de suivi',
            inputPlaceholder: 'Tapez votre message de suivi...',
            inputAttributes: {
                'aria-label': 'Message de suivi'
            },
            showCancelButton: true,
            confirmButtonText: 'Envoyer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    icon: 'success',
                    title: 'Message envoyé',
                    text: 'Le message de suivi a été envoyé au client.',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
    }

    function rescheduleConsultation(id) {
        Swal.fire({
            title: 'Reprogrammer la consultation',
            html: `
                <div class="form-group text-left">
                    <label for="newDate">Nouvelle date:</label>
                    <input type="date" class="form-control" id="newDate">
                </div>
                <div class="form-group text-left">
                    <label for="newTime">Nouvelle heure:</label>
                    <input type="time" class="form-control" id="newTime">
                </div>
                <div class="form-group text-left">
                    <label for="reason">Raison du changement:</label>
                    <textarea class="form-control" id="reason" rows="3"></textarea>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Reprogrammer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    icon: 'success',
                    title: 'Consultation reprogrammée',
                    text: 'La consultation a été reprogrammée et le client sera notifié.',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
    }

    function exportHistory() {
        Swal.fire({
            title: 'Exporter l\'historique',
            text: 'Choisissez le format d\'export',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Excel',
            cancelButtonText: 'PDF',
            showDenyButton: true,
            denyButtonText: 'CSV'
        }).then((result) => {
            let format = 'excel';
            if (result.isDenied) format = 'csv';
            if (result.dismiss === Swal.DismissReason.cancel) format = 'pdf';

            if (result.value || result.isDenied || result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    icon: 'success',
                    title: 'Export en cours',
                    text: `Génération du fichier ${format.toUpperCase()}...`,
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
    }

    function printHistory() {
        window.print();
    }

    function bulkActions() {
        const selectedItems = $('.consultation-checkbox:checked').length;
        if (selectedItems === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Aucune sélection',
                text: 'Veuillez sélectionner au moins une consultation.'
            });
            return;
        }

        Swal.fire({
            title: 'Actions groupées',
            text: `${selectedItems} consultation(s) sélectionnée(s)`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Exporter sélection',
            cancelButtonText: 'Envoyer suivi groupé',
            showDenyButton: true,
            denyButtonText: 'Archiver'
        }).then((result) => {
            if (result.value) {
                exportSelected();
            } else if (result.isDenied) {
                archiveSelected();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                sendBulkFollowUp();
            }
        });
    }

    function generateReport() {
        Swal.fire({
            title: 'Générer un rapport',
            html: `
                <div class="form-group text-left">
                    <label>Type de rapport:</label>
                    <select class="form-control" id="reportType">
                        <option value="monthly">Rapport mensuel</option>
                        <option value="quarterly">Rapport trimestriel</option>
                        <option value="annual">Rapport annuel</option>
                        <option value="custom">Période personnalisée</option>
                    </select>
                </div>
                <div class="form-group text-left">
                    <label>Inclure:</label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="includeStats" checked>
                        <label class="custom-control-label" for="includeStats">Statistiques</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="includeCharts" checked>
                        <label class="custom-control-label" for="includeCharts">Graphiques</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="includeDetails">
                        <label class="custom-control-label" for="includeDetails">Détails des consultations</label>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Générer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    icon: 'success',
                    title: 'Rapport en cours de génération',
                    text: 'Vous recevrez le rapport par email.',
                    timer: 3000,
                    showConfirmButton: false
                });
            }
        });
    }

    function advancedSearch() {
        Swal.fire({
            title: 'Recherche avancée',
            html: `
                <div class="row">
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" placeholder="Mots-clés dans les notes">
                    </div>
                    <div class="col-6 mb-3">
                        <input type="number" class="form-control" placeholder="Montant minimum (FCFA)">
                    </div>
                    <div class="col-6 mb-3">
                        <input type="number" class="form-control" placeholder="Montant maximum (FCFA)">
                    </div>
                    <div class="col-6 mb-3">
                        <input type="number" class="form-control" placeholder="Durée minimum (min)">
                    </div>
                    <div class="col-6 mb-3">
                        <input type="number" class="form-control" placeholder="Durée maximum (min)">
                    </div>
                    <div class="col-12">
                        <select class="form-control">
                            <option value="">Note de satisfaction</option>
                            <option value="5">5 étoiles</option>
                            <option value="4">4 étoiles et plus</option>
                            <option value="3">3 étoiles et plus</option>
                            <option value="2">2 étoiles et plus</option>
                            <option value="1">1 étoile et plus</option>
                        </select>
                    </div>
                </div>
            `,
            width: 600,
            showCancelButton: true,
            confirmButtonText: 'Rechercher',
            cancelButtonText: 'Annuler'
        });
    }

    // Helper functions
    function exportSelected() {
        console.log('Exporting selected consultations...');
    }

    function archiveSelected() {
        console.log('Archiving selected consultations...');
    }

    function sendBulkFollowUp() {
        console.log('Sending bulk follow-up messages...');
    }
</script>
@endsection
