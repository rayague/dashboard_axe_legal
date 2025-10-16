@extends('dashboard.layout')

@section('title', 'Inscriptions Formations - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-graduate text-warning mr-2"></i>
            Inscriptions aux Formations
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.formations.liste') }}">Formations</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inscriptions</li>
            </ol>
        </nav>
    </div>

    <!-- Statistics Row -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Inscriptions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">342</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Confirmées</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">298</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">32</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Annulées</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-filter mr-2"></i>
                Filtres
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="filterFormation" class="form-label font-weight-bold">Formation</label>
                    <select class="form-control form-control-sm" id="filterFormation">
                        <option value="">Toutes les formations</option>
                        <option>Droit des Contrats</option>
                        <option>Droit Immobilier</option>
                        <option>Droit de la Famille</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="filterStatus" class="form-label font-weight-bold">Statut</label>
                    <select class="form-control form-control-sm" id="filterStatus">
                        <option value="">Tous les statuts</option>
                        <option value="confirmee">Confirmée</option>
                        <option value="attente">En attente</option>
                        <option value="annulee">Annulée</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="filterDate" class="form-label font-weight-bold">Date</label>
                    <input type="date" class="form-control form-control-sm" id="filterDate">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="searchParticipant" class="form-label font-weight-bold">Recherche</label>
                    <input type="text" class="form-control form-control-sm" id="searchParticipant" placeholder="Nom du participant...">
                </div>
            </div>
        </div>
    </div>

    <!-- Inscriptions Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-column flex-sm-row justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-users mr-2"></i>
                Liste des Inscriptions
            </h6>
            <div class="mt-2 mt-sm-0">
                <button class="btn btn-success btn-sm mr-2">
                    <i class="fas fa-download mr-1"></i>
                    <span class="d-none d-sm-inline">Exporter</span>
                </button>
                <button class="btn btn-primary btn-sm">
                    <i class="fas fa-envelope mr-1"></i>
                    <span class="d-none d-sm-inline">Email groupé</span>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="inscriptionsTable">
                    <thead class="thead-light">
                        <tr>
                            <th>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="selectAll">
                                    <label class="custom-control-label" for="selectAll"></label>
                                </div>
                            </th>
                            <th>Participant</th>
                            <th class="d-none d-md-table-cell">Formation</th>
                            <th class="d-none d-lg-table-cell">Date d'inscription</th>
                            <th class="d-none d-sm-table-cell">Paiement</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input row-checkbox" id="check1">
                                    <label class="custom-control-label" for="check1"></label>
                                </div>
                            </td>
                            <td data-label="Participant">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="https://ui-avatars.com/api/?name=Marie+Dupont&background=3b82f6&color=fff" width="40" height="40">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Marie Dupont</div>
                                        <div class="small text-muted">marie.dupont@email.com</div>
                                        <div class="small text-muted d-md-none">Droit des Contrats • 149.500 FCFA</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Formation" class="d-none d-md-table-cell">
                                <div class="font-weight-bold text-primary">Droit des Contrats</div>
                                <div class="small text-muted">20h • 149.500 FCFA</div>
                            </td>
                            <td data-label="Date d'inscription" class="d-none d-lg-table-cell">
                                <div>25/09/2025</div>
                                <div class="small text-muted">14:30</div>
                            </td>
                            <td data-label="Paiement" class="d-none d-sm-table-cell">
                                <span class="badge badge-success">Payé</span>
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
                                            <i class="fas fa-envelope mr-2"></i>Envoyer email
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#">
                                            <i class="fas fa-times mr-2"></i>Annuler
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input row-checkbox" id="check2">
                                    <label class="custom-control-label" for="check2"></label>
                                </div>
                            </td>
                            <td data-label="Participant">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="https://ui-avatars.com/api/?name=Jean+Martin&background=28a745&color=fff" width="40" height="40">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Jean Martin</div>
                                        <div class="small text-muted">jean.martin@email.com</div>
                                        <div class="small text-muted d-md-none">Droit Immobilier • 225.000 FCFA</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Formation" class="d-none d-md-table-cell">
                                <div class="font-weight-bold text-primary">Droit Immobilier</div>
                                <div class="small text-muted">35h • 225.000 FCFA</div>
                            </td>
                            <td data-label="Date d'inscription" class="d-none d-lg-table-cell">
                                <div>20/09/2025</div>
                                <div class="small text-muted">09:15</div>
                            </td>
                            <td data-label="Paiement" class="d-none d-sm-table-cell">
                                <span class="badge badge-warning">En attente</span>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-warning">En attente</span>
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
                                            <i class="fas fa-check mr-2"></i>Confirmer
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-envelope mr-2"></i>Rappel paiement
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#">
                                            <i class="fas fa-times mr-2"></i>Annuler
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
                <small class="text-muted">Affichage de 1 à 20 sur 342 inscriptions</small>
            </div>
            <nav aria-label="Inscriptions pagination">
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
                        <a class="page-link" href="#">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Select all functionality
    document.getElementById('selectAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    // Search and filter functionality
    function filterTable() {
        const searchTerm = document.getElementById('searchParticipant').value.toLowerCase();
        const statusFilter = document.getElementById('filterStatus').value;
        const formationFilter = document.getElementById('filterFormation').value;
        const rows = document.querySelectorAll('#inscriptionsTable tbody tr');

        rows.forEach(row => {
            const participantName = row.querySelector('[data-label="Participant"] .font-weight-bold').textContent.toLowerCase();
            const status = row.querySelector('[data-label="Statut"] .badge').textContent.toLowerCase();
            const formation = row.querySelector('[data-label="Formation"] .font-weight-bold')?.textContent ||
                             row.querySelector('[data-label="Participant"] .small:last-child').textContent;

            let showRow = true;

            if (searchTerm && !participantName.includes(searchTerm)) {
                showRow = false;
            }

            if (statusFilter && !status.includes(statusFilter)) {
                showRow = false;
            }

            if (formationFilter && !formation.includes(formationFilter)) {
                showRow = false;
            }

            row.style.display = showRow ? '' : 'none';
        });
    }

    // Add event listeners for filters
    document.getElementById('searchParticipant').addEventListener('keyup', filterTable);
    document.getElementById('filterStatus').addEventListener('change', filterTable);
    document.getElementById('filterFormation').addEventListener('change', filterTable);
    document.getElementById('filterDate').addEventListener('change', filterTable);
</script>
@endsection
