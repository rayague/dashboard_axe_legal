@extends('dashboard.layout')

@section('title', 'Gestion des Administrateurs - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-shield text-danger mr-2"></i>
            Gestion des Administrateurs
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Utilisateurs</li>
                    <li class="breadcrumb-item active" aria-current="page">Administrateurs</li>
                </ol>
            </nav>
            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addAdminModal">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouvel Admin</span>
                <span class="d-sm-none">Ajouter</span>
            </button>
        </div>
    </div>

    <!-- Warning Alert -->
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-triangle mr-2"></i>
        <strong>Attention :</strong> La gestion des administrateurs est une section sensible. Toute modification peut affecter le fonctionnement du système.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Super Admins</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-crown fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Administrateurs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Modérateurs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-edit fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Actifs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">21</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity Log -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Administrators Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-danger mb-2 mb-sm-0">
                            <i class="fas fa-users-cog mr-2"></i>
                            Liste des Administrateurs
                        </h6>
                        <div class="d-flex">
                            <div class="input-group input-group-sm mr-2" style="width: 200px;">
                                <input type="text" class="form-control" placeholder="Rechercher..." id="searchAdmin">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <select class="form-control form-control-sm" style="width: 120px;" id="filterRole">
                                <option value="">Tous les rôles</option>
                                <option value="super-admin">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="moderateur">Modérateur</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="adminsTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Administrateur</th>
                                    <th class="d-none d-md-table-cell">Contact</th>
                                    <th class="d-none d-lg-table-cell">Rôle</th>
                                    <th class="d-none d-sm-table-cell">Dernière connexion</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Administrateur">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-3" src="https://ui-avatars.com/api/?name=Jean+Dupont&background=dc3545&color=fff" width="50" height="50">
                                            <div>
                                                <div class="font-weight-bold text-responsive">Jean Dupont</div>
                                                <div class="small text-muted">ID: #ADM001</div>
                                                <div class="small text-muted d-md-none">jean.dupont@axe-legal.fr</div>
                                                <div class="small text-muted d-lg-none">
                                                    <span class="badge badge-danger">Super Admin</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Contact" class="d-none d-md-table-cell">
                                        <div class="text-responsive">jean.dupont@axe-legal.fr</div>
                                        <div class="small text-muted">07 12 34 56 78</div>
                                    </td>
                                    <td data-label="Rôle" class="d-none d-lg-table-cell">
                                        <span class="badge badge-danger">Super Admin</span>
                                        <div class="small text-muted">Tous privilèges</div>
                                    </td>
                                    <td data-label="Dernière connexion" class="d-none d-sm-table-cell">
                                        <div class="font-weight-bold text-success">En ligne</div>
                                        <div class="small text-muted">Aujourd'hui 14:23</div>
                                    </td>
                                    <td data-label="Statut">
                                        <span class="badge badge-success">Actif</span>
                                    </td>
                                    <td data-label="Actions">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
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
                                                    <i class="fas fa-key mr-2"></i>Permissions
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-history mr-2"></i>Historique
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Administrateur">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-3" src="https://ui-avatars.com/api/?name=Marie+Martin&background=ffc107&color=000" width="50" height="50">
                                            <div>
                                                <div class="font-weight-bold text-responsive">Marie Martin</div>
                                                <div class="small text-muted">ID: #ADM002</div>
                                                <div class="small text-muted d-md-none">marie.martin@axe-legal.fr</div>
                                                <div class="small text-muted d-lg-none">
                                                    <span class="badge badge-warning">Admin</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Contact" class="d-none d-md-table-cell">
                                        <div class="text-responsive">marie.martin@axe-legal.fr</div>
                                        <div class="small text-muted">07 98 76 54 32</div>
                                    </td>
                                    <td data-label="Rôle" class="d-none d-lg-table-cell">
                                        <span class="badge badge-warning">Admin</span>
                                        <div class="small text-muted">Gestion utilisateurs</div>
                                    </td>
                                    <td data-label="Dernière connexion" class="d-none d-sm-table-cell">
                                        <div class="font-weight-bold">Il y a 2h</div>
                                        <div class="small text-muted">Aujourd'hui 12:15</div>
                                    </td>
                                    <td data-label="Statut">
                                        <span class="badge badge-success">Actif</span>
                                    </td>
                                    <td data-label="Actions">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
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
                                                    <i class="fas fa-key mr-2"></i>Permissions
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-history mr-2"></i>Historique
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-warning" href="#">
                                                    <i class="fas fa-ban mr-2"></i>Suspendre
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Administrateur">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-3" src="https://ui-avatars.com/api/?name=Pierre+Dubois&background=17a2b8&color=fff" width="50" height="50">
                                            <div>
                                                <div class="font-weight-bold text-responsive">Pierre Dubois</div>
                                                <div class="small text-muted">ID: #ADM003</div>
                                                <div class="small text-muted d-md-none">pierre.dubois@axe-legal.fr</div>
                                                <div class="small text-muted d-lg-none">
                                                    <span class="badge badge-info">Modérateur</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Contact" class="d-none d-md-table-cell">
                                        <div class="text-responsive">pierre.dubois@axe-legal.fr</div>
                                        <div class="small text-muted">07 55 44 33 22</div>
                                    </td>
                                    <td data-label="Rôle" class="d-none d-lg-table-cell">
                                        <span class="badge badge-info">Modérateur</span>
                                        <div class="small text-muted">Contenu, Formations</div>
                                    </td>
                                    <td data-label="Dernière connexion" class="d-none d-sm-table-cell">
                                        <div class="font-weight-bold">Il y a 1 jour</div>
                                        <div class="small text-muted">28/09/2025</div>
                                    </td>
                                    <td data-label="Statut">
                                        <span class="badge badge-success">Actif</span>
                                    </td>
                                    <td data-label="Actions">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
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
                                                    <i class="fas fa-key mr-2"></i>Permissions
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-history mr-2"></i>Historique
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-warning" href="#">
                                                    <i class="fas fa-ban mr-2"></i>Suspendre
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Recent Activity -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-clock mr-2"></i>
                        Activité Récente
                    </h6>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Connexion Admin</h6>
                                <p class="timeline-text">Jean Dupont s'est connecté</p>
                                <small class="text-muted">Il y a 5 minutes</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Modification Permissions</h6>
                                <p class="timeline-text">Marie Martin a modifié les permissions de Pierre</p>
                                <small class="text-muted">Il y a 2 heures</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-info"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Nouvel Administrateur</h6>
                                <p class="timeline-text">Sophie Bernard ajoutée comme modératrice</p>
                                <small class="text-muted">Hier</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-danger"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Tentative de connexion échouée</h6>
                                <p class="timeline-text">3 tentatives échouées pour admin.test</p>
                                <small class="text-muted">Il y a 2 jours</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-bolt mr-2"></i>
                        Actions Rapides
                    </h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-shield-alt text-danger mr-3"></i>
                            Audit de Sécurité
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-key text-warning mr-3"></i>
                            Gestion des Permissions
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-history text-info mr-3"></i>
                            Logs d'Activité
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-download text-success mr-3"></i>
                            Export des Données
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="addAdminModalLabel">
                        <i class="fas fa-user-shield mr-2"></i>
                        Nouvel Administrateur
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <strong>Attention :</strong> Vous créez un compte administrateur avec des privilèges élevés.
                    </div>
                    <form id="addAdminForm">
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
                                    <label for="telephone" class="font-weight-bold">Téléphone</label>
                                    <input type="tel" class="form-control" id="telephone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role" class="font-weight-bold">Rôle *</label>
                                    <select class="form-control" id="role" required>
                                        <option value="">Sélectionner un rôle</option>
                                        <option value="moderateur">Modérateur</option>
                                        <option value="admin">Administrateur</option>
                                        <option value="super-admin" class="text-danger">Super Administrateur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="font-weight-bold">Mot de passe temporaire *</label>
                                    <input type="password" class="form-control" id="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Permissions</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="perm-users">
                                        <label class="custom-control-label" for="perm-users">Gestion des utilisateurs</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="perm-content">
                                        <label class="custom-control-label" for="perm-content">Gestion du contenu</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="perm-formations">
                                        <label class="custom-control-label" for="perm-formations">Gestion des formations</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="perm-reports">
                                        <label class="custom-control-label" for="perm-reports">Rapports et statistiques</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="perm-system">
                                        <label class="custom-control-label" for="perm-system">Configuration système</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="perm-security">
                                        <label class="custom-control-label" for="perm-security">Sécurité avancée</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger">
                        <i class="fas fa-save mr-2"></i>
                        Créer l'administrateur
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .timeline {
        position: relative;
        padding-left: 20px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 20px;
        padding-left: 20px;
    }

    .timeline-marker {
        position: absolute;
        left: -25px;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 2px solid #fff;
        box-shadow: 0 0 0 2px #dee2e6;
    }

    .timeline-item:not(:last-child)::before {
        content: '';
        position: absolute;
        left: -19px;
        top: 17px;
        width: 2px;
        height: calc(100% + 5px);
        background-color: #dee2e6;
    }

    .timeline-title {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .timeline-text {
        font-size: 0.8rem;
        margin-bottom: 2px;
        color: #6c757d;
    }
</style>
@endsection

@section('scripts')
<script>
    // Search functionality
    document.getElementById('searchAdmin').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#adminsTable tbody tr');

        tableRows.forEach(row => {
            const adminName = row.querySelector('[data-label="Administrateur"] .font-weight-bold').textContent.toLowerCase();
            const adminEmail = row.querySelector('[data-label="Contact"] .text-responsive')?.textContent.toLowerCase() ||
                               row.querySelector('[data-label="Administrateur"] .small').textContent.toLowerCase();

            if (adminName.includes(searchTerm) || adminEmail.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Role filter
    document.getElementById('filterRole').addEventListener('change', function() {
        const roleFilter = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#adminsTable tbody tr');

        tableRows.forEach(row => {
            const role = row.querySelector('[data-label="Rôle"] .badge')?.textContent.toLowerCase() ||
                         row.querySelector('[data-label="Administrateur"] .badge').textContent.toLowerCase();

            if (!roleFilter || role.includes(roleFilter.replace('-', ' '))) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Role-based permissions
    document.getElementById('role').addEventListener('change', function() {
        const selectedRole = this.value;
        const checkboxes = document.querySelectorAll('[id^="perm-"]');

        // Reset all checkboxes
        checkboxes.forEach(cb => cb.checked = false);

        // Set permissions based on role
        if (selectedRole === 'moderateur') {
            document.getElementById('perm-content').checked = true;
            document.getElementById('perm-formations').checked = true;
        } else if (selectedRole === 'admin') {
            document.getElementById('perm-users').checked = true;
            document.getElementById('perm-content').checked = true;
            document.getElementById('perm-formations').checked = true;
            document.getElementById('perm-reports').checked = true;
        } else if (selectedRole === 'super-admin') {
            checkboxes.forEach(cb => cb.checked = true);
        }
    });

    // Modal form validation
    document.getElementById('addAdminForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Fonctionnalité à implémenter');
    });
</script>
@endsection
