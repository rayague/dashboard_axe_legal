@extends('dashboard.layout')

@section('title', 'Historique des Rendez-vous - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-history text-info mr-2"></i>
            Historique des Rendez-vous
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Rendez-vous</li>
                    <li class="breadcrumb-item active" aria-current="page">Historique</li>
                </ol>
            </nav>
            <div class="btn-group btn-group-sm">
                <a href="{{ route('dashboard.rendez-vous.nouveau') }}" class="btn btn-success">
                    <i class="fas fa-plus mr-1"></i>
                    <span class="d-none d-sm-inline">Nouveau</span>
                </a>
                <a href="{{ route('dashboard.rendez-vous.planning') }}" class="btn btn-outline-primary">
                    <i class="fas fa-calendar mr-1"></i>
                    <span class="d-none d-sm-inline">Planning</span>
                </a>
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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total RDV</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1,247</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Revenus Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">74,820,000 FCFA</div>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Taux Satisfaction</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">94%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 94%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Durée Moyenne</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1h 15min</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
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
            <form id="filterForm">
                <div class="row">
                    <div class="col-lg-2 col-md-6 mb-3">
                        <label for="dateFrom" class="font-weight-bold">Du</label>
                        <input type="date" class="form-control form-control-sm" id="dateFrom">
                    </div>
                    <div class="col-lg-2 col-md-6 mb-3">
                        <label for="dateTo" class="font-weight-bold">Au</label>
                        <input type="date" class="form-control form-control-sm" id="dateTo">
                    </div>
                    <div class="col-lg-2 col-md-6 mb-3">
                        <label for="clientFilter" class="font-weight-bold">Client</label>
                        <input type="text" class="form-control form-control-sm" id="clientFilter" placeholder="Nom du client">
                    </div>
                    <div class="col-lg-2 col-md-6 mb-3">
                        <label for="lawyerFilter" class="font-weight-bold">Avocat</label>
                        <select class="form-control form-control-sm" id="lawyerFilter">
                            <option value="">Tous</option>
                            <option value="marie-dubois">Me Marie Dubois</option>
                            <option value="pierre-martin">Me Pierre Martin</option>
                            <option value="sophie-bernard">Me Sophie Bernard</option>
                            <option value="jean-dupont">Me Jean Dupont</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-3">
                        <label for="statusFilter" class="font-weight-bold">Statut</label>
                        <select class="form-control form-control-sm" id="statusFilter">
                            <option value="">Tous</option>
                            <option value="realise">Réalisé</option>
                            <option value="annule">Annulé</option>
                            <option value="reporte">Reporté</option>
                            <option value="no-show">Absence</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-3">
                        <label for="typeFilter" class="font-weight-bold">Type</label>
                        <select class="form-control form-control-sm" id="typeFilter">
                            <option value="">Tous</option>
                            <option value="consultation">Consultation</option>
                            <option value="signature">Signature</option>
                            <option value="suivi">Suivi</option>
                            <option value="mediation">Médiation</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary btn-sm" onclick="applyFilters()">
                            <i class="fas fa-search mr-1"></i>
                            Rechercher
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-sm ml-2" onclick="resetFilters()">
                            <i class="fas fa-undo mr-1"></i>
                            Réinitialiser
                        </button>
                        <button type="button" class="btn btn-outline-success btn-sm ml-2" onclick="exportHistory()">
                            <i class="fas fa-download mr-1"></i>
                            Exporter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- History Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table mr-2"></i>
                Historique Détaillé
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <div class="dropdown-header">Actions:</div>
                    <a class="dropdown-item" href="#" onclick="exportToPDF()">
                        <i class="fas fa-file-pdf fa-sm fa-fw mr-2 text-gray-400"></i>
                        Export PDF
                    </a>
                    <a class="dropdown-item" href="#" onclick="exportToExcel()">
                        <i class="fas fa-file-excel fa-sm fa-fw mr-2 text-gray-400"></i>
                        Export Excel
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="historyTable" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>Date & Heure</th>
                            <th>Client</th>
                            <th class="d-none d-md-table-cell">Avocat</th>
                            <th class="d-none d-lg-table-cell">Type</th>
                            <th>Durée</th>
                            <th class="d-none d-md-table-cell">Montant</th>
                            <th>Statut</th>
                            <th class="d-none d-lg-table-cell">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="font-weight-bold">15/01/2024</div>
                                <div class="small text-muted">14:30</div>
                            </td>
                            <td>
                                <div class="font-weight-bold">Sophie Bernard</div>
                                <div class="small text-muted">06 12 34 56 78</div>
                            </td>
                            <td class="d-none d-md-table-cell">Me Marie Dubois</td>
                            <td class="d-none d-lg-table-cell">
                                <span class="badge badge-info">Consultation</span>
                            </td>
                            <td>1h 15min</td>
                            <td class="d-none d-md-table-cell">
                                <div class="font-weight-bold text-success">75,000 FCFA</div>
                            </td>
                            <td>
                                <span class="badge badge-success">Réalisé</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <button class="btn btn-outline-primary btn-sm" onclick="viewDetails('rdv-001')" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-outline-info btn-sm ml-1" onclick="generateInvoice('rdv-001')" title="Facture">
                                    <i class="fas fa-file-invoice"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="font-weight-bold">14/01/2024</div>
                                <div class="small text-muted">10:00</div>
                            </td>
                            <td>
                                <div class="font-weight-bold">Michel Dubois</div>
                                <div class="small text-muted">06 98 76 54 32</div>
                            </td>
                            <td class="d-none d-md-table-cell">Me Pierre Martin</td>
                            <td class="d-none d-lg-table-cell">
                                <span class="badge badge-primary">Suivi</span>
                            </td>
                            <td>45min</td>
                            <td class="d-none d-md-table-cell">
                                <div class="font-weight-bold text-success">33,750 FCFA</div>
                            </td>
                            <td>
                                <span class="badge badge-success">Réalisé</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <button class="btn btn-outline-primary btn-sm" onclick="viewDetails('rdv-002')" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-outline-info btn-sm ml-1" onclick="generateInvoice('rdv-002')" title="Facture">
                                    <i class="fas fa-file-invoice"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="font-weight-bold">13/01/2024</div>
                                <div class="small text-muted">16:00</div>
                            </td>
                            <td>
                                <div class="font-weight-bold">Isabelle Leroy</div>
                                <div class="small text-muted">06 55 44 33 22</div>
                            </td>
                            <td class="d-none d-md-table-cell">Me Sophie Bernard</td>
                            <td class="d-none d-lg-table-cell">
                                <span class="badge badge-warning">Médiation</span>
                            </td>
                            <td>2h 00min</td>
                            <td class="d-none d-md-table-cell">
                                <div class="font-weight-bold text-success">110,000 FCFA</div>
                            </td>
                            <td>
                                <span class="badge badge-success">Réalisé</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <button class="btn btn-outline-primary btn-sm" onclick="viewDetails('rdv-003')" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-outline-info btn-sm ml-1" onclick="generateInvoice('rdv-003')" title="Facture">
                                    <i class="fas fa-file-invoice"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="font-weight-bold">12/01/2024</div>
                                <div class="small text-muted">11:30</div>
                            </td>
                            <td>
                                <div class="font-weight-bold">Jean Martin</div>
                                <div class="small text-muted">06 77 88 99 00</div>
                            </td>
                            <td class="d-none d-md-table-cell">Me Jean Dupont</td>
                            <td class="d-none d-lg-table-cell">
                                <span class="badge badge-secondary">Signature</span>
                            </td>
                            <td>30min</td>
                            <td class="d-none d-md-table-cell">
                                <div class="font-weight-bold text-success">32,500 FCFA</div>
                            </td>
                            <td>
                                <span class="badge badge-success">Réalisé</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <button class="btn btn-outline-primary btn-sm" onclick="viewDetails('rdv-004')" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-outline-info btn-sm ml-1" onclick="generateInvoice('rdv-004')" title="Facture">
                                    <i class="fas fa-file-invoice"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="font-weight-bold">11/01/2024</div>
                                <div class="small text-muted">09:15</div>
                            </td>
                            <td>
                                <div class="font-weight-bold">Marie Lecomte</div>
                                <div class="small text-muted">06 33 22 11 00</div>
                            </td>
                            <td class="d-none d-md-table-cell">Me Marie Dubois</td>
                            <td class="d-none d-lg-table-cell">
                                <span class="badge badge-info">Consultation</span>
                            </td>
                            <td>-</td>
                            <td class="d-none d-md-table-cell">
                                <div class="text-muted">0 FCFA</div>
                            </td>
                            <td>
                                <span class="badge badge-danger">Absence</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <button class="btn btn-outline-primary btn-sm" onclick="viewDetails('rdv-005')" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-outline-warning btn-sm ml-1" onclick="reschedule('rdv-005')" title="Reprogrammer">
                                    <i class="fas fa-calendar-plus"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="font-weight-bold">10/01/2024</div>
                                <div class="small text-muted">15:45</div>
                            </td>
                            <td>
                                <div class="font-weight-bold">Paul Durand</div>
                                <div class="small text-muted">06 11 22 33 44</div>
                            </td>
                            <td class="d-none d-md-table-cell">Me Pierre Martin</td>
                            <td class="d-none d-lg-table-cell">
                                <span class="badge badge-info">Consultation</span>
                            </td>
                            <td>-</td>
                            <td class="d-none d-md-table-cell">
                                <div class="text-muted">0 FCFA</div>
                            </td>
                            <td>
                                <span class="badge badge-secondary">Annulé</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <button class="btn btn-outline-primary btn-sm" onclick="viewDetails('rdv-006')" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-outline-warning btn-sm ml-1" onclick="reschedule('rdv-006')" title="Reprogrammer">
                                    <i class="fas fa-calendar-plus"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center mt-4">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Details Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-info-circle mr-2"></i>
                        Détails du Rendez-vous
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalContent">
                    <!-- Content will be loaded dynamically -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" onclick="generateInvoice(currentRdvId)">
                        <i class="fas fa-file-invoice mr-1"></i>
                        Générer Facture
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    let currentRdvId = null;

    // Initialize DataTable
    $(document).ready(function() {
        $('#historyTable').DataTable({
            "order": [[ 0, "desc" ]],
            "pageLength": 25,
            "responsive": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            }
        });

        // Set default date range (last 30 days)
        const today = new Date();
        const thirtyDaysAgo = new Date(today.getTime() - (30 * 24 * 60 * 60 * 1000));

        document.getElementById('dateTo').value = today.toISOString().split('T')[0];
        document.getElementById('dateFrom').value = thirtyDaysAgo.toISOString().split('T')[0];
    });

    // Filter functions
    function applyFilters() {
        const dateFrom = document.getElementById('dateFrom').value;
        const dateTo = document.getElementById('dateTo').value;
        const client = document.getElementById('clientFilter').value;
        const lawyer = document.getElementById('lawyerFilter').value;
        const status = document.getElementById('statusFilter').value;
        const type = document.getElementById('typeFilter').value;

        // Apply filters to DataTable
        const table = $('#historyTable').DataTable();

        // Clear previous search
        table.search('').columns().search('').draw();

        // Apply individual column filters
        if (client) {
            table.column(1).search(client);
        }
        if (lawyer) {
            table.column(2).search(lawyer);
        }
        if (status) {
            table.column(6).search(status);
        }
        if (type) {
            table.column(3).search(type);
        }

        table.draw();

        Swal.fire({
            title: 'Filtres appliqués',
            text: 'Les résultats ont été mis à jour.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function resetFilters() {
        document.getElementById('filterForm').reset();

        // Reset date range
        const today = new Date();
        const thirtyDaysAgo = new Date(today.getTime() - (30 * 24 * 60 * 60 * 1000));

        document.getElementById('dateTo').value = today.toISOString().split('T')[0];
        document.getElementById('dateFrom').value = thirtyDaysAgo.toISOString().split('T')[0];

        // Clear DataTable filters
        $('#historyTable').DataTable().search('').columns().search('').draw();
    }

    // View details function
    function viewDetails(rdvId) {
        currentRdvId = rdvId;

        // Mock data - replace with actual AJAX call
        const mockData = {
            'rdv-001': {
                client: 'Sophie Bernard',
                lawyer: 'Me Marie Dubois',
                date: '15/01/2024',
                time: '14:30 - 15:45',
                type: 'Consultation juridique',
                subject: 'Révision contrat de travail',
                room: 'Salle A',
                duration: '1h 15min',
                amount: '75,000 FCFA',
                status: 'Réalisé',
                notes: 'Client satisfait, contrat révisé selon les nouvelles dispositions légales.',
                documents: ['Contrat initial', 'Avenant proposé', 'Note de synthèse']
            }
        };

        const data = mockData[rdvId] || mockData['rdv-001'];

        const content = `
            <div class="row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-primary mb-3">Informations Générales</h6>
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td class="font-weight-bold">Client:</td>
                            <td>${data.client}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Avocat:</td>
                            <td>${data.lawyer}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Date:</td>
                            <td>${data.date}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Horaire:</td>
                            <td>${data.time}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Durée:</td>
                            <td>${data.duration}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Salle:</td>
                            <td>${data.room}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-success mb-3">Détails Financiers</h6>
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td class="font-weight-bold">Type:</td>
                            <td><span class="badge badge-info">${data.type}</span></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Objet:</td>
                            <td>${data.subject}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Montant:</td>
                            <td class="font-weight-bold text-success">${data.amount}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Statut:</td>
                            <td><span class="badge badge-success">${data.status}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <h6 class="font-weight-bold text-info mb-3">Notes et Observations</h6>
                    <p class="bg-light p-3 rounded">${data.notes}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h6 class="font-weight-bold text-warning mb-3">Documents Associés</h6>
                    <ul class="list-group list-group-flush">
                        ${data.documents.map(doc => `<li class="list-group-item"><i class="fas fa-file-alt mr-2"></i>${doc}</li>`).join('')}
                    </ul>
                </div>
            </div>
        `;

        document.getElementById('modalContent').innerHTML = content;
        $('#detailsModal').modal('show');
    }

    // Generate invoice
    function generateInvoice(rdvId) {
        Swal.fire({
            title: 'Génération de facture',
            text: 'La facture est en cours de génération...',
            icon: 'info',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            Swal.fire({
                title: 'Facture générée !',
                text: 'La facture a été créée et envoyée au client.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    }

    // Reschedule appointment
    function reschedule(rdvId) {
        Swal.fire({
            title: 'Reprogrammer le rendez-vous',
            text: 'Redirection vers la page de programmation...',
            icon: 'info',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = "{{ route('dashboard.rendez-vous.nouveau') }}";
        });
    }

    // Export functions
    function exportHistory() {
        Swal.fire({
            title: 'Sélectionner le format',
            text: 'Dans quel format souhaitez-vous exporter ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Excel',
            cancelButtonText: 'PDF',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                exportToExcel();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                exportToPDF();
            }
        });
    }

    function exportToPDF() {
        Swal.fire({
            title: 'Export en cours...',
            text: 'Génération du fichier PDF',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function exportToExcel() {
        Swal.fire({
            title: 'Export en cours...',
            text: 'Génération du fichier Excel',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }
</script>
@endsection
