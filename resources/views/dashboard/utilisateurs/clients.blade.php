@extends('dashboard.layout')

@section('title', 'Gestion des Clients - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-tie text-purple mr-2"></i>
            Gestion des Clients
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Utilisateurs</li>
                    <li class="breadcrumb-item active" aria-current="page">Clients</li>
                </ol>
            </nav>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addClientModal">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouveau Client</span>
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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Clients</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1,259</div>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Clients Actifs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1,087</div>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nouveaux (30j)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">43</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Consultations</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2,847</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Clients Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary mb-2 mb-sm-0">
                    <i class="fas fa-table mr-2"></i>
                    Liste des Clients
                </h6>
                <div class="d-flex flex-column flex-sm-row">
                    <div class="input-group input-group-sm mb-2 mb-sm-0 mr-sm-2" style="width: 250px;">
                        <input type="text" class="form-control" placeholder="Rechercher un client..." id="searchClient">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <select class="form-control form-control-sm" style="width: 150px;" id="filterStatus">
                        <option value="">Tous les statuts</option>
                        <option value="actif">Actif</option>
                        <option value="inactif">Inactif</option>
                        <option value="suspendu">Suspendu</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="clientsTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Client</th>
                            <th class="d-none d-md-table-cell">Contact</th>
                            <th class="d-none d-lg-table-cell">Inscription</th>
                            <th class="d-none d-sm-table-cell">Consultations</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Client">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-3" src="https://ui-avatars.com/api/?name=Sophie+Bernard&background=8b5cf6&color=fff" width="50" height="50">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Sophie Bernard</div>
                                        <div class="small text-muted">ID: #CL001259</div>
                                        <div class="small text-muted d-md-none">sophie.bernard@email.com • 06 12 34 56 78</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Contact" class="d-none d-md-table-cell">
                                <div class="text-responsive">sophie.bernard@email.com</div>
                                <div class="small text-muted">06 12 34 56 78</div>
                            </td>
                            <td data-label="Inscription" class="d-none d-lg-table-cell">
                                <div>15/03/2024</div>
                                <div class="small text-muted">Il y a 6 mois</div>
                            </td>
                            <td data-label="Consultations" class="d-none d-sm-table-cell">
                                <span class="badge badge-info">7 consultations</span>
                                <div class="small text-muted">Dernière: 12/09/2025</div>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-success">Actif</span>
                            </td>
                            <td data-label="Actions">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
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
                                            <i class="fas fa-calendar mr-2"></i>Nouvelle consultation
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-envelope mr-2"></i>Envoyer message
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
                            <td data-label="Client">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-3" src="https://ui-avatars.com/api/?name=Michel+Dubois&background=28a745&color=fff" width="50" height="50">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Michel Dubois</div>
                                        <div class="small text-muted">ID: #CL001258</div>
                                        <div class="small text-muted d-md-none">michel.dubois@email.com • 06 98 76 54 32</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Contact" class="d-none d-md-table-cell">
                                <div class="text-responsive">michel.dubois@email.com</div>
                                <div class="small text-muted">06 98 76 54 32</div>
                            </td>
                            <td data-label="Inscription" class="d-none d-lg-table-cell">
                                <div>08/01/2024</div>
                                <div class="small text-muted">Il y a 9 mois</div>
                            </td>
                            <td data-label="Consultations" class="d-none d-sm-table-cell">
                                <span class="badge badge-primary">12 consultations</span>
                                <div class="small text-muted">Dernière: 28/09/2025</div>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-success">Actif</span>
                            </td>
                            <td data-label="Actions">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
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
                                            <i class="fas fa-calendar mr-2"></i>Nouvelle consultation
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-envelope mr-2"></i>Envoyer message
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
                            <td data-label="Client">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-3" src="https://ui-avatars.com/api/?name=Isabelle+Leroy&background=dc3545&color=fff" width="50" height="50">
                                    <div>
                                        <div class="font-weight-bold text-responsive">Isabelle Leroy</div>
                                        <div class="small text-muted">ID: #CL001257</div>
                                        <div class="small text-muted d-md-none">isabelle.leroy@email.com • 06 55 44 33 22</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Contact" class="d-none d-md-table-cell">
                                <div class="text-responsive">isabelle.leroy@email.com</div>
                                <div class="small text-muted">06 55 44 33 22</div>
                            </td>
                            <td data-label="Inscription" class="d-none d-lg-table-cell">
                                <div>22/06/2023</div>
                                <div class="small text-muted">Il y a 1 an</div>
                            </td>
                            <td data-label="Consultations" class="d-none d-sm-table-cell">
                                <span class="badge badge-secondary">3 consultations</span>
                                <div class="small text-muted">Dernière: 15/01/2025</div>
                            </td>
                            <td data-label="Statut">
                                <span class="badge badge-warning">Inactif</span>
                            </td>
                            <td data-label="Actions">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
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
                                            <i class="fas fa-play mr-2"></i>Réactiver
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-envelope mr-2"></i>Relance
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
                <small class="text-muted">Affichage de 1 à 20 sur 1,259 clients</small>
            </div>
            <nav aria-label="Clients pagination">
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

    <!-- Add Client Modal -->
    <div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addClientModalLabel">
                        <i class="fas fa-user-plus mr-2"></i>
                        Nouveau Client
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addClientForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prenom" class="font-weight-bold">Prénom *</label>
                                    <input type="text" class="form-control" id="prenom" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nom" class="font-weight-bold">Nom *</label>
                                    <input type="text" class="form-control" id="nom" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold">Email *</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telephone" class="font-weight-bold">Téléphone *</label>
                                    <input type="tel" class="form-control" id="telephone" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="adresse" class="font-weight-bold">Adresse</label>
                            <textarea class="form-control" id="adresse" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codePostal" class="font-weight-bold">Code Postal</label>
                                    <input type="text" class="form-control" id="codePostal">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="ville" class="font-weight-bold">Ville</label>
                                    <input type="text" class="form-control" id="ville">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        Créer le client
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Search functionality
    document.getElementById('searchClient').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#clientsTable tbody tr');

        tableRows.forEach(row => {
            const clientName = row.querySelector('[data-label="Client"] .font-weight-bold').textContent.toLowerCase();
            const clientEmail = row.querySelector('[data-label="Contact"] .text-responsive')?.textContent.toLowerCase() ||
                               row.querySelector('[data-label="Client"] .small:last-child').textContent.toLowerCase();

            if (clientName.includes(searchTerm) || clientEmail.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Status filter
    document.getElementById('filterStatus').addEventListener('change', function() {
        const statusFilter = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#clientsTable tbody tr');

        tableRows.forEach(row => {
            const status = row.querySelector('[data-label="Statut"] .badge').textContent.toLowerCase();

            if (!statusFilter || status.includes(statusFilter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Modal form validation
    document.getElementById('addClientForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // Add form validation logic here
        alert('Fonctionnalité à implémenter');
    });
</script>
@endsection
