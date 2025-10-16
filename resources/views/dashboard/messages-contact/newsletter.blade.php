@extends('dashboard.layout')

@section('title', 'Gestion Newsletter - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-envelope-open-text text-primary mr-2"></i>
            Gestion Newsletter & Campagnes Email
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Messages & Contact</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createCampaignModal">
                    <i class="fas fa-plus mr-1"></i>
                    <span class="d-none d-sm-inline">Nouvelle Campagne</span>
                </button>
                <button type="button" class="btn btn-info btn-sm" onclick="importSubscribers()">
                    <i class="fas fa-upload mr-1"></i>
                    <span class="d-none d-sm-inline">Importer</span>
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="exportSubscribers()">
                    <i class="fas fa-download mr-1"></i>
                    <span class="d-none d-sm-inline">Exporter</span>
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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Abonnés
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2,847</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="text-success text-sm">
                            <i class="fas fa-arrow-up mr-1"></i>+12% ce mois
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Taux d'Ouverture
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">24.8%</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="text-success text-sm">
                            <i class="fas fa-arrow-up mr-1"></i>+3.2% depuis hier
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Campagnes Actives
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">7</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="text-info text-sm">
                            <i class="fas fa-clock mr-1"></i>3 programmées
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Taux de Clic
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8.3%</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-mouse-pointer fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="text-warning text-sm">
                            <i class="fas fa-arrow-down mr-1"></i>-1.1% cette semaine
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Campaign Management -->
        <div class="col-lg-8">
            <!-- Campaigns List -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-campaign mr-2"></i>
                        Campagnes Newsletter
                    </h6>
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-primary active" onclick="filterCampaigns('all')">Toutes</button>
                        <button class="btn btn-outline-success" onclick="filterCampaigns('sent')">Envoyées</button>
                        <button class="btn btn-outline-warning" onclick="filterCampaigns('scheduled')">Programmées</button>
                        <button class="btn btn-outline-info" onclick="filterCampaigns('draft')">Brouillons</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="campaignsTable">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="selectAllCampaigns">
                                        </div>
                                    </th>
                                    <th>Campagne</th>
                                    <th>Statut</th>
                                    <th>Abonnés</th>
                                    <th>Ouvertures</th>
                                    <th>Clics</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-status="sent">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input campaign-checkbox" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="campaign-icon bg-success text-white rounded-circle mr-2 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                                <i class="fas fa-gavel text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold">Nouveau Code Civil 2024</div>
                                                <small class="text-muted">Mise à jour législative importante</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">
                                            <i class="fas fa-check mr-1"></i>Envoyée
                                        </span>
                                    </td>
                                    <td>
                                        <span class="font-weight-bold text-primary">2,847</span>
                                        <small class="text-muted d-block">100%</small>
                                    </td>
                                    <td>
                                        <span class="font-weight-bold text-success">742</span>
                                        <small class="text-muted d-block">26.1%</small>
                                    </td>
                                    <td>
                                        <span class="font-weight-bold text-info">156</span>
                                        <small class="text-muted d-block">5.5%</small>
                                    </td>
                                    <td>
                                        <div class="text-sm">25 Sept 2024</div>
                                        <small class="text-muted">14:30</small>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" onclick="viewCampaignStats(1)">
                                                    <i class="fas fa-chart-bar mr-2"></i>Statistiques
                                                </a>
                                                <a class="dropdown-item" href="#" onclick="duplicateCampaign(1)">
                                                    <i class="fas fa-copy mr-2"></i>Dupliquer
                                                </a>
                                                <a class="dropdown-item" href="#" onclick="exportCampaign(1)">
                                                    <i class="fas fa-download mr-2"></i>Exporter
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="#" onclick="archiveCampaign(1)">
                                                    <i class="fas fa-archive mr-2"></i>Archiver
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr data-status="scheduled">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input campaign-checkbox" type="checkbox" value="2">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="campaign-icon bg-warning text-white rounded-circle mr-2 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                                <i class="fas fa-calendar text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold">Webinaire Droit des Affaires</div>
                                                <small class="text-muted">Invitation événement en ligne</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">
                                            <i class="fas fa-clock mr-1"></i>Programmée
                                        </span>
                                    </td>
                                    <td>
                                        <span class="font-weight-bold text-primary">2,847</span>
                                        <small class="text-muted d-block">100%</small>
                                    </td>
                                    <td>
                                        <span class="text-muted">-</span>
                                    </td>
                                    <td>
                                        <span class="text-muted">-</span>
                                    </td>
                                    <td>
                                        <div class="text-sm text-warning">05 Oct 2024</div>
                                        <small class="text-muted">09:00</small>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" onclick="editCampaign(2)">
                                                    <i class="fas fa-edit mr-2"></i>Modifier
                                                </a>
                                                <a class="dropdown-item" href="#" onclick="sendTestCampaign(2)">
                                                    <i class="fas fa-paper-plane mr-2"></i>Test
                                                </a>
                                                <a class="dropdown-item" href="#" onclick="sendNowCampaign(2)">
                                                    <i class="fas fa-rocket mr-2"></i>Envoyer maintenant
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="#" onclick="cancelCampaign(2)">
                                                    <i class="fas fa-times mr-2"></i>Annuler
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr data-status="draft">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input campaign-checkbox" type="checkbox" value="3">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="campaign-icon bg-secondary text-white rounded-circle mr-2 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                                <i class="fas fa-edit text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold">Newsletter Octobre 2024</div>
                                                <small class="text-muted">Actualités juridiques mensuelles</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-secondary">
                                            <i class="fas fa-pencil-alt mr-1"></i>Brouillon
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-muted">En attente</span>
                                    </td>
                                    <td>
                                        <span class="text-muted">-</span>
                                    </td>
                                    <td>
                                        <span class="text-muted">-</span>
                                    </td>
                                    <td>
                                        <div class="text-sm">Créée le</div>
                                        <small class="text-muted">30 Sept 2024</small>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" onclick="editCampaign(3)">
                                                    <i class="fas fa-edit mr-2"></i>Continuer édition
                                                </a>
                                                <a class="dropdown-item" href="#" onclick="previewCampaign(3)">
                                                    <i class="fas fa-eye mr-2"></i>Aperçu
                                                </a>
                                                <a class="dropdown-item" href="#" onclick="sendTestCampaign(3)">
                                                    <i class="fas fa-paper-plane mr-2"></i>Test
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="#" onclick="deleteCampaign(3)">
                                                    <i class="fas fa-trash mr-2"></i>Supprimer
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr data-status="sent">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input campaign-checkbox" type="checkbox" value="4">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="campaign-icon bg-info text-white rounded-circle mr-2 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                                <i class="fas fa-handshake text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold">Nouveaux Services Médiation</div>
                                                <small class="text-muted">Lancement service médiation civile</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">
                                            <i class="fas fa-check mr-1"></i>Envoyée
                                        </span>
                                    </td>
                                    <td>
                                        <span class="font-weight-bold text-primary">2,803</span>
                                        <small class="text-muted d-block">98.5%</small>
                                    </td>
                                    <td>
                                        <span class="font-weight-bold text-success">521</span>
                                        <small class="text-muted d-block">18.6%</small>
                                    </td>
                                    <td>
                                        <span class="font-weight-bold text-info">89</span>
                                        <small class="text-muted d-block">3.2%</small>
                                    </td>
                                    <td>
                                        <div class="text-sm">20 Sept 2024</div>
                                        <small class="text-muted">10:15</small>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" onclick="viewCampaignStats(4)">
                                                    <i class="fas fa-chart-bar mr-2"></i>Statistiques
                                                </a>
                                                <a class="dropdown-item" href="#" onclick="duplicateCampaign(4)">
                                                    <i class="fas fa-copy mr-2"></i>Dupliquer
                                                </a>
                                                <a class="dropdown-item" href="#" onclick="exportCampaign(4)">
                                                    <i class="fas fa-download mr-2"></i>Exporter
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Bulk Actions -->
                    <div class="d-flex justify-content-between align-items-center mt-3" id="bulkActions" style="display: none !important;">
                        <div>
                            <span class="text-muted" id="selectedCount">0 campagne(s) sélectionnée(s)</span>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-info" onclick="bulkExport()">
                                <i class="fas fa-download mr-1"></i>Exporter
                            </button>
                            <button class="btn btn-sm btn-warning" onclick="bulkArchive()">
                                <i class="fas fa-archive mr-1"></i>Archiver
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="bulkDelete()">
                                <i class="fas fa-trash mr-1"></i>Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter Templates -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-layer-group mr-2"></i>
                        Modèles de Newsletter
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card border-success">
                                <div class="card-header bg-success text-white text-center py-2">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="card-title">Newsletter Classique</h6>
                                    <p class="card-text text-muted small">Modèle standard avec header, contenu et footer</p>
                                    <button class="btn btn-success btn-sm" onclick="useTemplate('classic')">
                                        <i class="fas fa-plus mr-1"></i>Utiliser
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card border-info">
                                <div class="card-header bg-info text-white text-center py-2">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="card-title">Invitation Événement</h6>
                                    <p class="card-text text-muted small">Invitation webinaire, conférence ou formation</p>
                                    <button class="btn btn-info btn-sm" onclick="useTemplate('event')">
                                        <i class="fas fa-plus mr-1"></i>Utiliser
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card border-warning">
                                <div class="card-header bg-warning text-white text-center py-2">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="card-title">Alerte Juridique</h6>
                                    <p class="card-text text-muted small">Annonce urgente ou mise à jour législative</p>
                                    <button class="btn btn-warning btn-sm" onclick="useTemplate('alert')">
                                        <i class="fas fa-plus mr-1"></i>Utiliser
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribers & Settings -->
        <div class="col-lg-4">
            <!-- Subscriber Management -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-users mr-2"></i>
                        Gestion Abonnés
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Rechercher un abonné..." id="searchSubscriber">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-sm" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="subscriber-stats mb-3">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="h6 mb-0 text-success">2,589</div>
                                <div class="text-xs text-muted">Actifs</div>
                            </div>
                            <div class="col-4">
                                <div class="h6 mb-0 text-warning">258</div>
                                <div class="text-xs text-muted">Inactifs</div>
                            </div>
                            <div class="col-4">
                                <div class="h6 mb-0 text-danger">127</div>
                                <div class="text-xs text-muted">Désabonnés</div>
                            </div>
                        </div>
                    </div>

                    <div class="recent-subscribers">
                        <h6 class="font-weight-bold text-gray-800 mb-2">Nouveaux Abonnés</h6>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item px-0 py-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle bg-success text-white mr-2">ML</div>
                                    <div class="flex-grow-1">
                                        <div class="font-weight-bold text-sm">Marie Lagrange</div>
                                        <div class="text-xs text-muted">marie.lagrange@gmail.com</div>
                                    </div>
                                    <small class="text-muted">Hier</small>
                                </div>
                            </div>
                            <div class="list-group-item px-0 py-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle bg-info text-white mr-2">JD</div>
                                    <div class="flex-grow-1">
                                        <div class="font-weight-bold text-sm">Jean Dupont</div>
                                        <div class="text-xs text-muted">j.dupont@outlook.fr</div>
                                    </div>
                                    <small class="text-muted">2j</small>
                                </div>
                            </div>
                            <div class="list-group-item px-0 py-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle bg-primary text-white mr-2">SK</div>
                                    <div class="flex-grow-1">
                                        <div class="font-weight-bold text-sm">Sophie Kouamé</div>
                                        <div class="text-xs text-muted">s.kouame@yahoo.fr</div>
                                    </div>
                                    <small class="text-muted">3j</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addSubscriberModal">
                            <i class="fas fa-user-plus mr-1"></i>Ajouter Abonné
                        </button>
                        <button class="btn btn-outline-info btn-sm btn-block" onclick="manageSubscribers()">
                            <i class="fas fa-cog mr-1"></i>Gérer Tous les Abonnés
                        </button>
                    </div>
                </div>
            </div>

            <!-- Email Settings -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-cog mr-2"></i>
                        Paramètres Email
                    </h6>
                </div>
                <div class="card-body">
                    <form id="emailSettingsForm">
                        <div class="mb-3">
                            <label for="senderName" class="form-label font-weight-bold">Nom de l'expéditeur</label>
                            <input type="text" class="form-control form-control-sm" id="senderName" value="Cabinet Axe Legal">
                        </div>

                        <div class="mb-3">
                            <label for="senderEmail" class="form-label font-weight-bold">Email expéditeur</label>
                            <input type="email" class="form-control form-control-sm" id="senderEmail" value="newsletter@axelegal.ci">
                        </div>

                        <div class="mb-3">
                            <label for="replyEmail" class="form-label font-weight-bold">Email de réponse</label>
                            <input type="email" class="form-control form-control-sm" id="replyEmail" value="contact@axelegal.ci">
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Options d'envoi</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enableTracking" checked>
                                <label class="form-check-label" for="enableTracking">
                                    Suivi des ouvertures
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enableClickTracking" checked>
                                <label class="form-check-label" for="enableClickTracking">
                                    Suivi des clics
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enableUnsubscribe" checked>
                                <label class="form-check-label" for="enableUnsubscribe">
                                    Lien de désabonnement
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="sendFrequency" class="form-label font-weight-bold">Fréquence d'envoi max</label>
                            <select class="form-control form-control-sm" id="sendFrequency">
                                <option value="unlimited">Illimitée</option>
                                <option value="daily" selected>1 par jour</option>
                                <option value="weekly">1 par semaine</option>
                                <option value="monthly">1 par mois</option>
                            </select>
                        </div>

                        <button type="button" class="btn btn-info btn-sm btn-block" onclick="saveEmailSettings()">
                            <i class="fas fa-save mr-1"></i>Enregistrer Paramètres
                        </button>
                    </form>
                </div>
            </div>

            <!-- Analytics Summary -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-chart-line mr-2"></i>
                        Performance Récente
                    </h6>
                </div>
                <div class="card-body">
                    <div class="performance-item mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-sm">Taux d'ouverture moyen</span>
                            <span class="font-weight-bold text-success">24.8%</span>
                        </div>
                        <div class="progress mt-1" style="height: 4px;">
                            <div class="progress-bar bg-success" style="width: 24.8%"></div>
                        </div>
                    </div>

                    <div class="performance-item mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-sm">Taux de clic moyen</span>
                            <span class="font-weight-bold text-info">8.3%</span>
                        </div>
                        <div class="progress mt-1" style="height: 4px;">
                            <div class="progress-bar bg-info" style="width: 8.3%"></div>
                        </div>
                    </div>

                    <div class="performance-item mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-sm">Taux de désabonnement</span>
                            <span class="font-weight-bold text-warning">1.2%</span>
                        </div>
                        <div class="progress mt-1" style="height: 4px;">
                            <div class="progress-bar bg-warning" style="width: 1.2%"></div>
                        </div>
                    </div>

                    <div class="performance-item mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-sm">Croissance abonnés</span>
                            <span class="font-weight-bold text-primary">+12%</span>
                        </div>
                        <div class="progress mt-1" style="height: 4px;">
                            <div class="progress-bar bg-primary" style="width: 60%"></div>
                        </div>
                    </div>

                    <button class="btn btn-outline-success btn-sm btn-block" onclick="viewDetailedAnalytics()">
                        <i class="fas fa-chart-bar mr-1"></i>Voir Analyse Complète
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Campaign Modal -->
    <div class="modal fade" id="createCampaignModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus-circle text-primary mr-2"></i>
                        Créer une Nouvelle Campagne
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createCampaignForm">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="campaignName" class="form-label font-weight-bold">Nom de la campagne</label>
                                    <input type="text" class="form-control" id="campaignName" placeholder="Ex: Newsletter Octobre 2024">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="campaignType" class="form-label font-weight-bold">Type</label>
                                    <select class="form-control" id="campaignType">
                                        <option value="newsletter">Newsletter</option>
                                        <option value="event">Invitation Événement</option>
                                        <option value="alert">Alerte Juridique</option>
                                        <option value="promotion">Promotion Services</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="campaignSubject" class="form-label font-weight-bold">Objet de l'email</label>
                            <input type="text" class="form-control" id="campaignSubject" placeholder="Objet accrocheur de votre email">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="campaignTemplate" class="form-label font-weight-bold">Modèle</label>
                                    <select class="form-control" id="campaignTemplate">
                                        <option value="">Sélectionner un modèle</option>
                                        <option value="classic">Newsletter Classique</option>
                                        <option value="event">Invitation Événement</option>
                                        <option value="alert">Alerte Juridique</option>
                                        <option value="custom">Modèle Personnalisé</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="targetAudience" class="form-label font-weight-bold">Audience cible</label>
                                    <select class="form-control" id="targetAudience">
                                        <option value="all">Tous les abonnés (2,847)</option>
                                        <option value="active">Abonnés actifs (2,589)</option>
                                        <option value="professionals">Professionnels (1,234)</option>
                                        <option value="individuals">Particuliers (1,613)</option>
                                        <option value="custom">Segmentation personnalisée</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Programmation d'envoi</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sendOption" id="sendNow" value="now" checked>
                                <label class="form-check-label" for="sendNow">
                                    Envoyer maintenant
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sendOption" id="scheduleSend" value="schedule">
                                <label class="form-check-label" for="scheduleSend">
                                    Programmer l'envoi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sendOption" id="saveDraft" value="draft">
                                <label class="form-check-label" for="saveDraft">
                                    Enregistrer comme brouillon
                                </label>
                            </div>
                        </div>

                        <div class="schedule-options" style="display: none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="scheduleDate" class="form-label">Date d'envoi</label>
                                        <input type="date" class="form-control" id="scheduleDate">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="scheduleTime" class="form-label">Heure d'envoi</label>
                                        <input type="time" class="form-control" id="scheduleTime" value="09:00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="createCampaign()">
                        <i class="fas fa-plus mr-1"></i>Créer la Campagne
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Subscriber Modal -->
    <div class="modal fade" id="addSubscriberModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-user-plus text-primary mr-2"></i>
                        Ajouter un Abonné
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addSubscriberForm">
                        <div class="mb-3">
                            <label for="subscriberEmail" class="form-label font-weight-bold">Adresse email</label>
                            <input type="email" class="form-control" id="subscriberEmail" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="subscriberFirstName" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="subscriberFirstName">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="subscriberLastName" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="subscriberLastName">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="subscriberType" class="form-label">Type d'abonné</label>
                            <select class="form-control" id="subscriberType">
                                <option value="individual">Particulier</option>
                                <option value="professional">Professionnel</option>
                                <option value="student">Étudiant</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sendWelcome" checked>
                            <label class="form-check-label" for="sendWelcome">
                                Envoyer email de bienvenue
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="addSubscriber()">
                        <i class="fas fa-user-plus mr-1"></i>Ajouter
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize newsletter management
        initializeNewsletterManagement();
        
        // Setup campaign filtering
        setupCampaignFilters();
        
        // Setup bulk selection
        setupBulkSelection();
        
        // Setup schedule options
        setupScheduleOptions();
    });

    function initializeNewsletterManagement() {
        // Auto-update statistics
        updateStatistics();
        
        // Setup search functionality
        setupSubscriberSearch();
        
        // Refresh data every 30 seconds
        setInterval(function() {
            updateStatistics();
        }, 30000);
    }

    function setupCampaignFilters() {
        // No need for additional setup, handled by onclick events
    }

    function setupBulkSelection() {
        // Select all checkbox
        $('#selectAllCampaigns').on('change', function() {
            const isChecked = $(this).is(':checked');
            $('.campaign-checkbox').prop('checked', isChecked);
            updateBulkActions();
        });

        // Individual checkboxes
        $('.campaign-checkbox').on('change', function() {
            updateBulkActions();
            
            // Update select all state
            const totalCheckboxes = $('.campaign-checkbox').length;
            const checkedCheckboxes = $('.campaign-checkbox:checked').length;
            
            $('#selectAllCampaigns').prop('indeterminate', checkedCheckboxes > 0 && checkedCheckboxes < totalCheckboxes);
            $('#selectAllCampaigns').prop('checked', checkedCheckboxes === totalCheckboxes);
        });
    }

    function setupScheduleOptions() {
        $('input[name="sendOption"]').on('change', function() {
            if ($(this).val() === 'schedule') {
                $('.schedule-options').show();
                $('#scheduleDate').attr('required', true);
            } else {
                $('.schedule-options').hide();
                $('#scheduleDate').removeAttr('required');
            }
        });
    }

    function setupSubscriberSearch() {
        $('#searchSubscriber').on('keyup', function() {
            const searchTerm = $(this).val().toLowerCase();
            console.log('Searching subscribers:', searchTerm);
            // Implementation for real-time subscriber search
        });
    }

    function updateBulkActions() {
        const selectedCount = $('.campaign-checkbox:checked').length;
        
        if (selectedCount > 0) {
            $('#bulkActions').show();
            $('#selectedCount').text(`${selectedCount} campagne(s) sélectionnée(s)`);
        } else {
            $('#bulkActions').hide();
        }
    }

    function updateStatistics() {
        // Simulate real-time statistics update
        console.log('Updating newsletter statistics...');
    }

    // Campaign Management Functions
    function filterCampaigns(status) {
        // Update active filter button
        $('.btn-group .btn').removeClass('active');
        $(`button[onclick="filterCampaigns('${status}')"]`).addClass('active');
        
        // Show/hide campaigns based on filter
        if (status === 'all') {
            $('#campaignsTable tbody tr').show();
        } else {
            $('#campaignsTable tbody tr').hide();
            $(`#campaignsTable tbody tr[data-status="${status}"]`).show();
        }
        
        console.log('Filtering campaigns by:', status);
    }

    function createCampaign() {
        const formData = {
            name: $('#campaignName').val(),
            type: $('#campaignType').val(),
            subject: $('#campaignSubject').val(),
            template: $('#campaignTemplate').val(),
            audience: $('#targetAudience').val(),
            sendOption: $('input[name="sendOption"]:checked').val(),
            scheduleDate: $('#scheduleDate').val(),
            scheduleTime: $('#scheduleTime').val()
        };
        
        // Validate required fields
        if (!formData.name || !formData.subject) {
            alert('Veuillez remplir tous les champs obligatoires.');
            return;
        }
        
        console.log('Creating campaign:', formData);
        
        // Close modal and show success message
        $('#createCampaignModal').modal('hide');
        alert('Campagne créée avec succès !');
        
        // Reset form
        $('#createCampaignForm')[0].reset();
    }

    function addSubscriber() {
        const subscriberData = {
            email: $('#subscriberEmail').val(),
            firstName: $('#subscriberFirstName').val(),
            lastName: $('#subscriberLastName').val(),
            type: $('#subscriberType').val(),
            sendWelcome: $('#sendWelcome').is(':checked')
        };
        
        // Validate email
        if (!subscriberData.email) {
            alert('Veuillez saisir une adresse email.');
            return;
        }
        
        console.log('Adding subscriber:', subscriberData);
        
        // Close modal and show success
        $('#addSubscriberModal').modal('hide');
        alert('Abonné ajouté avec succès !');
        
        // Reset form
        $('#addSubscriberForm')[0].reset();
    }

    // Template Functions
    function useTemplate(templateType) {
        console.log('Using template:', templateType);
        $('#createCampaignModal').modal('show');
        $('#campaignTemplate').val(templateType);
        
        // Pre-fill based on template type
        switch(templateType) {
            case 'classic':
                $('#campaignType').val('newsletter');
                $('#campaignName').val('Newsletter ' + new Date().toLocaleDateString('fr-FR', {month: 'long', year: 'numeric'}));
                break;
            case 'event':
                $('#campaignType').val('event');
                $('#campaignName').val('Invitation Événement');
                break;
            case 'alert':
                $('#campaignType').val('alert');
                $('#campaignName').val('Alerte Juridique');
                break;
        }
    }

    // Campaign Actions
    function viewCampaignStats(campaignId) {
        console.log('Viewing stats for campaign:', campaignId);
        alert(`Statistiques détaillées de la campagne ${campaignId} (fonctionnalité à implémenter)`);
    }

    function editCampaign(campaignId) {
        console.log('Editing campaign:', campaignId);
        alert(`Édition de la campagne ${campaignId} (fonctionnalité à implémenter)`);
    }

    function duplicateCampaign(campaignId) {
        if (confirm('Voulez-vous dupliquer cette campagne ?')) {
            console.log('Duplicating campaign:', campaignId);
            alert('Campagne dupliquée avec succès !');
        }
    }

    function sendTestCampaign(campaignId) {
        const testEmail = prompt('Adresse email pour le test :');
        if (testEmail) {
            console.log('Sending test campaign to:', testEmail);
            alert('Email de test envoyé avec succès !');
        }
    }

    function sendNowCampaign(campaignId) {
        if (confirm('Êtes-vous sûr de vouloir envoyer cette campagne maintenant ?')) {
            console.log('Sending campaign now:', campaignId);
            alert('Campagne envoyée avec succès !');
        }
    }

    function previewCampaign(campaignId) {
        console.log('Previewing campaign:', campaignId);
        window.open(`/newsletter/preview/${campaignId}`, '_blank');
    }

    function cancelCampaign(campaignId) {
        if (confirm('Êtes-vous sûr de vouloir annuler cette campagne programmée ?')) {
            console.log('Canceling campaign:', campaignId);
            alert('Campagne annulée avec succès !');
        }
    }

    function archiveCampaign(campaignId) {
        if (confirm('Archiver cette campagne ?')) {
            console.log('Archiving campaign:', campaignId);
            alert('Campagne archivée avec succès !');
        }
    }

    function deleteCampaign(campaignId) {
        if (confirm('Êtes-vous sûr de vouloir supprimer définitivement cette campagne ?')) {
            console.log('Deleting campaign:', campaignId);
            alert('Campagne supprimée avec succès !');
        }
    }

    function exportCampaign(campaignId) {
        console.log('Exporting campaign:', campaignId);
        alert('Export de la campagne en cours...');
    }

    // Bulk Actions
    function bulkExport() {
        const selectedCampaigns = $('.campaign-checkbox:checked').map(function() {
            return this.value;
        }).get();
        
        console.log('Bulk exporting campaigns:', selectedCampaigns);
        alert(`Export de ${selectedCampaigns.length} campagnes en cours...`);
    }

    function bulkArchive() {
        const selectedCount = $('.campaign-checkbox:checked').length;
        
        if (confirm(`Archiver ${selectedCount} campagne(s) sélectionnée(s) ?`)) {
            console.log('Bulk archiving campaigns');
            alert('Campagnes archivées avec succès !');
        }
    }

    function bulkDelete() {
        const selectedCount = $('.campaign-checkbox:checked').length;
        
        if (confirm(`Supprimer définitivement ${selectedCount} campagne(s) sélectionnée(s) ?`)) {
            console.log('Bulk deleting campaigns');
            alert('Campagnes supprimées avec succès !');
        }
    }

    // Subscriber Functions
    function manageSubscribers() {
        console.log('Opening subscriber management...');
        alert('Interface de gestion complète des abonnés (fonctionnalité à implémenter)');
    }

    function importSubscribers() {
        console.log('Importing subscribers...');
        alert('Import d\'abonnés (fonctionnalité à implémenter)');
    }

    function exportSubscribers() {
        console.log('Exporting subscribers...');
        alert('Export des abonnés en cours...');
    }

    // Settings Functions
    function saveEmailSettings() {
        const settingsData = {
            senderName: $('#senderName').val(),
            senderEmail: $('#senderEmail').val(),
            replyEmail: $('#replyEmail').val(),
            enableTracking: $('#enableTracking').is(':checked'),
            enableClickTracking: $('#enableClickTracking').is(':checked'),
            enableUnsubscribe: $('#enableUnsubscribe').is(':checked'),
            sendFrequency: $('#sendFrequency').val()
        };
        
        console.log('Saving email settings:', settingsData);
        alert('Paramètres email enregistrés avec succès !');
    }

    function viewDetailedAnalytics() {
        console.log('Opening detailed analytics...');
        window.open('/newsletter/analytics', '_blank');
    }
</script>

<style>
    .campaign-icon {
        font-size: 0.8rem;
        flex-shrink: 0;
    }

    .avatar-circle {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: bold;
        flex-shrink: 0;
    }

    .subscriber-stats {
        background-color: #f8f9fc;
        border-radius: 0.25rem;
        padding: 1rem;
    }

    .performance-item .progress {
        background-color: #e3e6f0;
    }

    .list-group-item {
        border: none;
        border-bottom: 1px solid #e3e6f0;
    }

    .list-group-item:last-child {
        border-bottom: none;
    }

    .table th {
        font-size: 0.85rem;
        background-color: #f8f9fc;
        border-color: #e3e6f0;
    }

    .table td {
        vertical-align: middle;
        font-size: 0.9rem;
    }

    .badge {
        font-size: 0.75rem;
    }

    .btn-group .btn.active {
        background-color: #4e73df;
        border-color: #4e73df;
        color: white;
    }

    .form-check-input:checked {
        background-color: #4e73df;
        border-color: #4e73df;
    }

    .card-header.bg-success,
    .card-header.bg-info,
    .card-header.bg-warning {
        font-size: 1.2rem;
    }

    @media (max-width: 768px) {
        .table-responsive {
            font-size: 0.8rem;
        }
        
        .btn-group {
            flex-direction: column;
        }
        
        .btn-group .btn {
            margin-bottom: 5px;
        }
        
        .subscriber-stats .row {
            text-align: center;
        }
    }

    .modal-lg {
        max-width: 800px;
    }

    .schedule-options {
        background-color: #f8f9fc;
        padding: 1rem;
        border-radius: 0.25rem;
        margin-top: 0.5rem;
    }
</style>
@endsection