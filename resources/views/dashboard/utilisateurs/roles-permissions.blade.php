@extends('dashboard.layout')

@section('title', 'Rôles et Permissions - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-key text-warning mr-2"></i>
            Rôles et Permissions
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Utilisateurs</li>
                    <li class="breadcrumb-item active" aria-current="page">Rôles et Permissions</li>
                </ol>
            </nav>
            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addRoleModal">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouveau Rôle</span>
                <span class="d-sm-none">Ajouter</span>
            </button>
        </div>
    </div>

    <!-- Info Alert -->
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle mr-2"></i>
        <strong>Information :</strong> Cette section permet de gérer les rôles et permissions des utilisateurs. Les modifications prennent effet immédiatement.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Rôles Actifs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tag fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Permissions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">47</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shield-alt fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Utilisateurs Assignés</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1,453</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Dernière Maj</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Aujourd'hui</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Roles List -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-warning mb-2 mb-sm-0">
                            <i class="fas fa-list mr-2"></i>
                            Liste des Rôles
                        </h6>
                        <div class="d-flex">
                            <div class="input-group input-group-sm mr-2" style="width: 200px;">
                                <input type="text" class="form-control" placeholder="Rechercher..." id="searchRole">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="rolesTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>Rôle</th>
                                    <th class="d-none d-md-table-cell">Description</th>
                                    <th class="d-none d-lg-table-cell">Permissions</th>
                                    <th class="d-none d-sm-table-cell">Utilisateurs</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Rôle">
                                        <div class="d-flex align-items-center">
                                            <div class="role-icon bg-danger text-white rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="fas fa-crown"></i>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold text-responsive">Super Administrateur</div>
                                                <div class="small text-muted">super-admin</div>
                                                <div class="small text-muted d-md-none">Accès complet au système</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Description" class="d-none d-md-table-cell">
                                        <div class="text-responsive">Accès complet au système</div>
                                        <div class="small text-muted">Toutes les permissions</div>
                                    </td>
                                    <td data-label="Permissions" class="d-none d-lg-table-cell">
                                        <span class="badge badge-success">47/47</span>
                                        <div class="small text-muted">Tous les modules</div>
                                    </td>
                                    <td data-label="Utilisateurs" class="d-none d-sm-table-cell">
                                        <div class="font-weight-bold">3 utilisateurs</div>
                                        <div class="small text-muted">Assignés</div>
                                    </td>
                                    <td data-label="Statut">
                                        <span class="badge badge-success">Actif</span>
                                    </td>
                                    <td data-label="Actions">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-warning btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" onclick="viewRole('super-admin')">
                                                    <i class="fas fa-eye mr-2"></i>Voir détails
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-users mr-2"></i>Utilisateurs assignés
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-muted" href="#" style="cursor: not-allowed;">
                                                    <i class="fas fa-lock mr-2"></i>Non modifiable
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Rôle">
                                        <div class="d-flex align-items-center">
                                            <div class="role-icon bg-warning text-dark rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="fas fa-user-cog"></i>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold text-responsive">Administrateur</div>
                                                <div class="small text-muted">admin</div>
                                                <div class="small text-muted d-md-none">Gestion des utilisateurs et contenu</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Description" class="d-none d-md-table-cell">
                                        <div class="text-responsive">Gestion des utilisateurs et contenu</div>
                                        <div class="small text-muted">Permissions étendues</div>
                                    </td>
                                    <td data-label="Permissions" class="d-none d-lg-table-cell">
                                        <span class="badge badge-warning">35/47</span>
                                        <div class="small text-muted">Modules principaux</div>
                                    </td>
                                    <td data-label="Utilisateurs" class="d-none d-sm-table-cell">
                                        <div class="font-weight-bold">8 utilisateurs</div>
                                        <div class="small text-muted">Assignés</div>
                                    </td>
                                    <td data-label="Statut">
                                        <span class="badge badge-success">Actif</span>
                                    </td>
                                    <td data-label="Actions">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-warning btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" onclick="viewRole('admin')">
                                                    <i class="fas fa-eye mr-2"></i>Voir détails
                                                </a>
                                                <a class="dropdown-item" href="#" onclick="editRole('admin')">
                                                    <i class="fas fa-edit mr-2"></i>Modifier
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-users mr-2"></i>Utilisateurs assignés
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-warning" href="#">
                                                    <i class="fas fa-pause mr-2"></i>Désactiver
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Rôle">
                                        <div class="d-flex align-items-center">
                                            <div class="role-icon bg-info text-white rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="fas fa-user-edit"></i>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold text-responsive">Modérateur</div>
                                                <div class="small text-muted">moderateur</div>
                                                <div class="small text-muted d-md-none">Gestion du contenu</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Description" class="d-none d-md-table-cell">
                                        <div class="text-responsive">Gestion du contenu</div>
                                        <div class="small text-muted">Formations, articles</div>
                                    </td>
                                    <td data-label="Permissions" class="d-none d-lg-table-cell">
                                        <span class="badge badge-info">18/47</span>
                                        <div class="small text-muted">Contenu uniquement</div>
                                    </td>
                                    <td data-label="Utilisateurs" class="d-none d-sm-table-cell">
                                        <div class="font-weight-bold">12 utilisateurs</div>
                                        <div class="small text-muted">Assignés</div>
                                    </td>
                                    <td data-label="Statut">
                                        <span class="badge badge-success">Actif</span>
                                    </td>
                                    <td data-label="Actions">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-warning btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" onclick="viewRole('moderateur')">
                                                    <i class="fas fa-eye mr-2"></i>Voir détails
                                                </a>
                                                <a class="dropdown-item" href="#" onclick="editRole('moderateur')">
                                                    <i class="fas fa-edit mr-2"></i>Modifier
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-users mr-2"></i>Utilisateurs assignés
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-warning" href="#">
                                                    <i class="fas fa-pause mr-2"></i>Désactiver
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Rôle">
                                        <div class="d-flex align-items-center">
                                            <div class="role-icon bg-success text-white rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="fas fa-balance-scale"></i>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold text-responsive">Avocat</div>
                                                <div class="small text-muted">avocat</div>
                                                <div class="small text-muted d-md-none">Consultations et formations</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Description" class="d-none d-md-table-cell">
                                        <div class="text-responsive">Consultations et formations</div>
                                        <div class="small text-muted">Profil professionnel</div>
                                    </td>
                                    <td data-label="Permissions" class="d-none d-lg-table-cell">
                                        <span class="badge badge-primary">25/47</span>
                                        <div class="small text-muted">Consultations</div>
                                    </td>
                                    <td data-label="Utilisateurs" class="d-none d-sm-table-cell">
                                        <div class="font-weight-bold">147 utilisateurs</div>
                                        <div class="small text-muted">Assignés</div>
                                    </td>
                                    <td data-label="Statut">
                                        <span class="badge badge-success">Actif</span>
                                    </td>
                                    <td data-label="Actions">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-warning btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" onclick="viewRole('avocat')">
                                                    <i class="fas fa-eye mr-2"></i>Voir détails
                                                </a>
                                                <a class="dropdown-item" href="#" onclick="editRole('avocat')">
                                                    <i class="fas fa-edit mr-2"></i>Modifier
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-users mr-2"></i>Utilisateurs assignés
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Rôle">
                                        <div class="d-flex align-items-center">
                                            <div class="role-icon bg-primary text-white rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold text-responsive">Client</div>
                                                <div class="small text-muted">client</div>
                                                <div class="small text-muted d-md-none">Accès consultation</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Description" class="d-none d-md-table-cell">
                                        <div class="text-responsive">Accès consultation</div>
                                        <div class="small text-muted">Utilisateur standard</div>
                                    </td>
                                    <td data-label="Permissions" class="d-none d-lg-table-cell">
                                        <span class="badge badge-secondary">8/47</span>
                                        <div class="small text-muted">Accès limité</div>
                                    </td>
                                    <td data-label="Utilisateurs" class="d-none d-sm-table-cell">
                                        <div class="font-weight-bold">1,283 utilisateurs</div>
                                        <div class="small text-muted">Assignés</div>
                                    </td>
                                    <td data-label="Statut">
                                        <span class="badge badge-success">Actif</span>
                                    </td>
                                    <td data-label="Actions">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-warning btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" onclick="viewRole('client')">
                                                    <i class="fas fa-eye mr-2"></i>Voir détails
                                                </a>
                                                <a class="dropdown-item" href="#" onclick="editRole('client')">
                                                    <i class="fas fa-edit mr-2"></i>Modifier
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-users mr-2"></i>Utilisateurs assignés
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

        <!-- Permissions Management -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Permissions par Catégorie
                    </h6>
                </div>
                <div class="card-body">
                    <div class="accordion" id="permissionsAccordion">
                        <!-- User Management -->
                        <div class="card">
                            <div class="card-header" id="headingUsers">
                                <h6 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseUsers">
                                        <i class="fas fa-users mr-2"></i>Gestion Utilisateurs
                                        <span class="badge badge-primary ml-2">12</span>
                                    </button>
                                </h6>
                            </div>
                            <div id="collapseUsers" class="collapse" data-parent="#permissionsAccordion">
                                <div class="card-body">
                                    <div class="small">
                                        <div class="mb-1">• Créer utilisateur</div>
                                        <div class="mb-1">• Modifier utilisateur</div>
                                        <div class="mb-1">• Supprimer utilisateur</div>
                                        <div class="mb-1">• Voir profils</div>
                                        <div class="mb-1">• Assigner rôles</div>
                                        <div class="text-muted">+ 7 autres...</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Management -->
                        <div class="card">
                            <div class="card-header" id="headingContent">
                                <h6 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseContent">
                                        <i class="fas fa-file-alt mr-2"></i>Gestion Contenu
                                        <span class="badge badge-info ml-2">8</span>
                                    </button>
                                </h6>
                            </div>
                            <div id="collapseContent" class="collapse" data-parent="#permissionsAccordion">
                                <div class="card-body">
                                    <div class="small">
                                        <div class="mb-1">• Créer article</div>
                                        <div class="mb-1">• Modifier article</div>
                                        <div class="mb-1">• Publier contenu</div>
                                        <div class="mb-1">• Modérer commentaires</div>
                                        <div class="text-muted">+ 4 autres...</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Formations -->
                        <div class="card">
                            <div class="card-header" id="headingFormations">
                                <h6 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFormations">
                                        <i class="fas fa-graduation-cap mr-2"></i>Formations
                                        <span class="badge badge-success ml-2">6</span>
                                    </button>
                                </h6>
                            </div>
                            <div id="collapseFormations" class="collapse" data-parent="#permissionsAccordion">
                                <div class="card-body">
                                    <div class="small">
                                        <div class="mb-1">• Créer formation</div>
                                        <div class="mb-1">• Gérer inscriptions</div>
                                        <div class="mb-1">• Voir statistiques</div>
                                        <div class="text-muted">+ 3 autres...</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Consultations -->
                        <div class="card">
                            <div class="card-header" id="headingConsultations">
                                <h6 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseConsultations">
                                        <i class="fas fa-handshake mr-2"></i>Consultations
                                        <span class="badge badge-warning ml-2">9</span>
                                    </button>
                                </h6>
                            </div>
                            <div id="collapseConsultations" class="collapse" data-parent="#permissionsAccordion">
                                <div class="card-body">
                                    <div class="small">
                                        <div class="mb-1">• Programmer consultation</div>
                                        <div class="mb-1">• Gérer planning</div>
                                        <div class="mb-1">• Accepter demandes</div>
                                        <div class="text-muted">+ 6 autres...</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- System -->
                        <div class="card">
                            <div class="card-header" id="headingSystem">
                                <h6 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSystem">
                                        <i class="fas fa-cog mr-2"></i>Système
                                        <span class="badge badge-danger ml-2">12</span>
                                    </button>
                                </h6>
                            </div>
                            <div id="collapseSystem" class="collapse" data-parent="#permissionsAccordion">
                                <div class="card-body">
                                    <div class="small">
                                        <div class="mb-1">• Configuration système</div>
                                        <div class="mb-1">• Gestion base données</div>
                                        <div class="mb-1">• Logs d'audit</div>
                                        <div class="mb-1">• Sauvegardes</div>
                                        <div class="text-muted">+ 8 autres...</div>
                                    </div>
                                </div>
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
                        <a href="#" class="list-group-item list-group-item-action" onclick="exportRoles()">
                            <i class="fas fa-download text-primary mr-3"></i>
                            Exporter les rôles
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-sync-alt text-success mr-3"></i>
                            Synchroniser permissions
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-history text-info mr-3"></i>
                            Historique des modifications
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-shield-alt text-warning mr-3"></i>
                            Audit de sécurité
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Role Modal -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="addRoleModalLabel">
                        <i class="fas fa-plus mr-2"></i>
                        Nouveau Rôle
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addRoleForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roleName" class="font-weight-bold">Nom du rôle *</label>
                                    <input type="text" class="form-control" id="roleName" required>
                                </div>
                                <div class="form-group">
                                    <label for="roleSlug" class="font-weight-bold">Identifiant (slug) *</label>
                                    <input type="text" class="form-control" id="roleSlug" required>
                                    <small class="form-text text-muted">Ex: editeur-contenu</small>
                                </div>
                                <div class="form-group">
                                    <label for="roleDescription" class="font-weight-bold">Description</label>
                                    <textarea class="form-control" id="roleDescription" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="roleColor" class="font-weight-bold">Couleur</label>
                                    <select class="form-control" id="roleColor">
                                        <option value="primary">Bleu (Primary)</option>
                                        <option value="success">Vert (Success)</option>
                                        <option value="info">Cyan (Info)</option>
                                        <option value="warning">Jaune (Warning)</option>
                                        <option value="danger">Rouge (Danger)</option>
                                        <option value="secondary">Gris (Secondary)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold mb-3">Permissions</h6>
                                <div class="permissions-grid" style="max-height: 400px; overflow-y: auto;">
                                    <div class="card mb-2">
                                        <div class="card-header py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="perm-users-all">
                                                <label class="custom-control-label font-weight-bold" for="perm-users-all">
                                                    <i class="fas fa-users mr-2"></i>Gestion Utilisateurs
                                                </label>
                                            </div>
                                        </div>
                                        <div class="card-body py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input perm-users" id="perm-users-create">
                                                <label class="custom-control-label" for="perm-users-create">Créer utilisateur</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input perm-users" id="perm-users-edit">
                                                <label class="custom-control-label" for="perm-users-edit">Modifier utilisateur</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input perm-users" id="perm-users-delete">
                                                <label class="custom-control-label" for="perm-users-delete">Supprimer utilisateur</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-2">
                                        <div class="card-header py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="perm-content-all">
                                                <label class="custom-control-label font-weight-bold" for="perm-content-all">
                                                    <i class="fas fa-file-alt mr-2"></i>Gestion Contenu
                                                </label>
                                            </div>
                                        </div>
                                        <div class="card-body py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input perm-content" id="perm-content-create">
                                                <label class="custom-control-label" for="perm-content-create">Créer contenu</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input perm-content" id="perm-content-edit">
                                                <label class="custom-control-label" for="perm-content-edit">Modifier contenu</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input perm-content" id="perm-content-publish">
                                                <label class="custom-control-label" for="perm-content-publish">Publier contenu</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-2">
                                        <div class="card-header py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="perm-formations-all">
                                                <label class="custom-control-label font-weight-bold" for="perm-formations-all">
                                                    <i class="fas fa-graduation-cap mr-2"></i>Formations
                                                </label>
                                            </div>
                                        </div>
                                        <div class="card-body py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input perm-formations" id="perm-formations-create">
                                                <label class="custom-control-label" for="perm-formations-create">Créer formation</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input perm-formations" id="perm-formations-manage">
                                                <label class="custom-control-label" for="perm-formations-manage">Gérer inscriptions</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-warning">
                        <i class="fas fa-save mr-2"></i>
                        Créer le rôle
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Role Details Modal -->
    <div class="modal fade" id="roleDetailsModal" tabindex="-1" role="dialog" aria-labelledby="roleDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="roleDetailsModalLabel">
                        <i class="fas fa-eye mr-2"></i>
                        Détails du Rôle
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="roleDetailsContent">
                    <!-- Content will be loaded dynamically -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Search functionality
    document.getElementById('searchRole').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#rolesTable tbody tr');

        tableRows.forEach(row => {
            const roleName = row.querySelector('[data-label="Rôle"] .font-weight-bold').textContent.toLowerCase();
            const roleDescription = row.querySelector('[data-label="Description"] .text-responsive')?.textContent.toLowerCase() || '';

            if (roleName.includes(searchTerm) || roleDescription.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Auto-generate slug from role name
    document.getElementById('roleName').addEventListener('input', function() {
        const slug = this.value.toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/(^-|-$)/g, '');
        document.getElementById('roleSlug').value = slug;
    });

    // Handle permission group checkboxes
    ['users', 'content', 'formations'].forEach(group => {
        const allCheckbox = document.getElementById(`perm-${group}-all`);
        const groupCheckboxes = document.querySelectorAll(`.perm-${group}`);

        allCheckbox?.addEventListener('change', function() {
            groupCheckboxes.forEach(cb => cb.checked = this.checked);
        });

        groupCheckboxes.forEach(cb => {
            cb.addEventListener('change', function() {
                const checkedCount = Array.from(groupCheckboxes).filter(c => c.checked).length;
                allCheckbox.checked = checkedCount === groupCheckboxes.length;
                allCheckbox.indeterminate = checkedCount > 0 && checkedCount < groupCheckboxes.length;
            });
        });
    });

    // View role details
    function viewRole(roleSlug) {
        const roleData = {
            'super-admin': {
                name: 'Super Administrateur',
                description: 'Accès complet au système avec tous les privilèges',
                permissions: 47,
                users: 3,
                color: 'danger'
            },
            'admin': {
                name: 'Administrateur',
                description: 'Gestion des utilisateurs et du contenu',
                permissions: 35,
                users: 8,
                color: 'warning'
            },
            'moderateur': {
                name: 'Modérateur',
                description: 'Gestion du contenu et des formations',
                permissions: 18,
                users: 12,
                color: 'info'
            },
            'avocat': {
                name: 'Avocat',
                description: 'Gestion des consultations et du profil professionnel',
                permissions: 25,
                users: 147,
                color: 'success'
            },
            'client': {
                name: 'Client',
                description: 'Accès aux consultations et formations',
                permissions: 8,
                users: 1283,
                color: 'primary'
            }
        };

        const role = roleData[roleSlug];
        if (role) {
            document.getElementById('roleDetailsContent').innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Informations générales</h6>
                        <p><strong>Nom :</strong> ${role.name}</p>
                        <p><strong>Identifiant :</strong> ${roleSlug}</p>
                        <p><strong>Description :</strong> ${role.description}</p>
                        <p><strong>Couleur :</strong> <span class="badge badge-${role.color}">${role.color}</span></p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Statistiques</h6>
                        <p><strong>Permissions :</strong> ${role.permissions}/47</p>
                        <p><strong>Utilisateurs assignés :</strong> ${role.users}</p>
                        <p><strong>Statut :</strong> <span class="badge badge-success">Actif</span></p>
                        <p><strong>Dernière modification :</strong> Il y a 2 jours</p>
                    </div>
                </div>
            `;
            $('#roleDetailsModal').modal('show');
        }
    }

    // Edit role
    function editRole(roleSlug) {
        alert(`Fonctionnalité d'édition à implémenter pour le rôle: ${roleSlug}`);
    }

    // Export roles
    function exportRoles() {
        alert('Fonctionnalité d\'export à implémenter');
    }

    // Modal form validation
    document.getElementById('addRoleForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Fonctionnalité à implémenter');
    });
</script>
@endsection
