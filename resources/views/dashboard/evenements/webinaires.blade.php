@extends('dashboard.layout')

@section('title', 'Gestion des Webinaires - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-laptop text-primary mr-2"></i>
            Gestion des Webinaires
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('evenements.index') }}">Événements</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Webinaires</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary btn-sm" onclick="createWebinar()">
                    <i class="fas fa-plus mr-1"></i>
                    <span class="d-none d-sm-inline">Nouveau</span>
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="startLiveWebinar()">
                    <i class="fas fa-video mr-1"></i>
                    <span class="d-none d-sm-inline">Live</span>
                </button>
                <button type="button" class="btn btn-info btn-sm" onclick="viewAnalytics()">
                    <i class="fas fa-chart-line mr-1"></i>
                    <span class="d-none d-sm-inline">Analytics</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Webinar Stats -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Webinaires</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">24</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-laptop fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Participants Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2,847</div>
                            <div class="text-xs text-success">+18% ce mois</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">En Direct</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                            <div class="text-xs text-warning">Actuellement live</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-broadcast-tower fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Temps Moyen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">87 min</div>
                            <div class="text-xs text-info">Durée par session</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Webinars Alert -->
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <i class="fas fa-video mr-2"></i>
        <strong>2 webinaires en direct :</strong>
        <a href="#" class="alert-link">"Nouveau Code Pénal"</a> (45 participants) |
        <a href="#" class="alert-link">"Droit du Travail 2025"</a> (28 participants)
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- Webinar Filters -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-filter mr-2"></i>
                Filtres et Actions
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="statusFilter" class="form-label">Statut</label>
                    <select class="form-control" id="statusFilter" onchange="filterWebinars()">
                        <option value="">Tous les statuts</option>
                        <option value="scheduled">Programmé</option>
                        <option value="live">En direct</option>
                        <option value="completed">Terminé</option>
                        <option value="cancelled">Annulé</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="categoryFilter" class="form-label">Catégorie</label>
                    <select class="form-control" id="categoryFilter" onchange="filterWebinars()">
                        <option value="">Toutes catégories</option>
                        <option value="droit_penal">Droit Pénal</option>
                        <option value="droit_civil">Droit Civil</option>
                        <option value="droit_commercial">Droit Commercial</option>
                        <option value="droit_travail">Droit du Travail</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="searchWebinar" class="form-label">Recherche</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchWebinar" placeholder="Titre, animateur...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label">&nbsp;</label>
                    <button class="btn btn-secondary btn-block" onclick="resetWebinarFilters()">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Webinars List -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-list mr-2"></i>
                Liste des Webinaires
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <div class="dropdown-header">Actions:</div>
                    <a class="dropdown-item" href="#" onclick="exportWebinars()">
                        <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                        Exporter données
                    </a>
                    <a class="dropdown-item" href="#" onclick="importWebinars()">
                        <i class="fas fa-upload fa-sm fa-fw mr-2 text-gray-400"></i>
                        Importer webinaires
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="generateReport()">
                        <i class="fas fa-chart-bar fa-sm fa-fw mr-2 text-gray-400"></i>
                        Rapport d'audience
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="webinarsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Webinaire</th>
                            <th>Statut</th>
                            <th>Date & Heure</th>
                            <th>Durée</th>
                            <th>Participants</th>
                            <th>Animateur</th>
                            <th>Plateforme</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="webinar-thumbnail mr-3">
                                        <img src="{{ asset('dashboard/img/webinar-thumb.jpg') }}"
                                             alt="Thumbnail" class="img-thumbnail" style="width: 60px; height: 40px;">
                                    </div>
                                    <div>
                                        <strong>Les Nouvelles Réformes du Code Pénal</strong><br>
                                        <small class="text-muted">Analyse détaillée des changements 2025</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-danger badge-pulse">
                                    <i class="fas fa-circle mr-1"></i>En Direct
                                </span>
                            </td>
                            <td>
                                <strong>10/01/2025</strong><br>
                                <small class="text-muted">14:00 - 16:00</small>
                            </td>
                            <td>
                                <span class="badge badge-info">120 min</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="progress flex-grow-1 mr-2" style="height: 10px;">
                                        <div class="progress-bar bg-success" style="width: 75%"></div>
                                    </div>
                                    <small><strong>45/60</strong></small>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-primary text-white rounded-circle">DR</span>
                                    </div>
                                    <div>
                                        <small><strong>Dr. Diabaté</strong><br>Expert Pénal</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-primary">
                                    <i class="fab fa-zoom mr-1"></i>Zoom
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-success btn-sm" onclick="joinWebinar(1)" title="Rejoindre">
                                        <i class="fas fa-video"></i>
                                    </button>
                                    <button class="btn btn-info btn-sm" onclick="viewWebinar(1)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editWebinar(1)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="webinar-thumbnail mr-3">
                                        <img src="{{ asset('dashboard/img/webinar-thumb2.jpg') }}"
                                             alt="Thumbnail" class="img-thumbnail" style="width: 60px; height: 40px;">
                                    </div>
                                    <div>
                                        <strong>Droit du Travail : Nouvelles Dispositions</strong><br>
                                        <small class="text-muted">Impact sur les entreprises ivoiriennes</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-warning badge-pulse">
                                    <i class="fas fa-circle mr-1"></i>En Direct
                                </span>
                            </td>
                            <td>
                                <strong>10/01/2025</strong><br>
                                <small class="text-muted">16:30 - 18:00</small>
                            </td>
                            <td>
                                <span class="badge badge-info">90 min</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="progress flex-grow-1 mr-2" style="height: 10px;">
                                        <div class="progress-bar bg-warning" style="width: 56%"></div>
                                    </div>
                                    <small><strong>28/50</strong></small>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-success text-white rounded-circle">ME</span>
                                    </div>
                                    <div>
                                        <small><strong>Me. Evelyne</strong><br>Droit Social</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-success">
                                    <i class="fab fa-microsoft mr-1"></i>Teams
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-success btn-sm" onclick="joinWebinar(2)" title="Rejoindre">
                                        <i class="fas fa-video"></i>
                                    </button>
                                    <button class="btn btn-info btn-sm" onclick="viewWebinar(2)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editWebinar(2)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="webinar-thumbnail mr-3">
                                        <img src="{{ asset('dashboard/img/webinar-thumb3.jpg') }}"
                                             alt="Thumbnail" class="img-thumbnail" style="width: 60px; height: 40px;">
                                    </div>
                                    <div>
                                        <strong>Pratique du Droit Commercial</strong><br>
                                        <small class="text-muted">Contrats et négociations</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-primary">Programmé</span>
                            </td>
                            <td>
                                <strong>15/01/2025</strong><br>
                                <small class="text-muted">10:00 - 12:00</small>
                            </td>
                            <td>
                                <span class="badge badge-info">120 min</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="progress flex-grow-1 mr-2" style="height: 10px;">
                                        <div class="progress-bar bg-info" style="width: 80%"></div>
                                    </div>
                                    <small><strong>80/100</strong></small>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-warning text-white rounded-circle">KB</span>
                                    </div>
                                    <div>
                                        <small><strong>Me. Koffi</strong><br>Droit Commercial</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-primary">
                                    <i class="fab fa-zoom mr-1"></i>Zoom
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-secondary btn-sm" disabled title="Pas encore démarré">
                                        <i class="fas fa-video"></i>
                                    </button>
                                    <button class="btn btn-info btn-sm" onclick="viewWebinar(3)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editWebinar(3)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="webinar-thumbnail mr-3">
                                        <img src="{{ asset('dashboard/img/webinar-thumb4.jpg') }}"
                                             alt="Thumbnail" class="img-thumbnail" style="width: 60px; height: 40px;">
                                    </div>
                                    <div>
                                        <strong>Introduction au Droit Fiscal</strong><br>
                                        <small class="text-muted">Concepts de base et applications</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-success">Terminé</span>
                            </td>
                            <td>
                                <strong>05/01/2025</strong><br>
                                <small class="text-muted">14:00 - 15:30</small>
                            </td>
                            <td>
                                <span class="badge badge-success">90 min</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="progress flex-grow-1 mr-2" style="height: 10px;">
                                        <div class="progress-bar bg-success" style="width: 100%"></div>
                                    </div>
                                    <small><strong>75/75</strong></small>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-info text-white rounded-circle">AT</span>
                                    </div>
                                    <div>
                                        <small><strong>Me. Traoré</strong><br>Droit Fiscal</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-success">
                                    <i class="fab fa-microsoft mr-1"></i>Teams
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary btn-sm" onclick="viewRecording(4)" title="Voir enregistrement">
                                        <i class="fas fa-play"></i>
                                    </button>
                                    <button class="btn btn-info btn-sm" onclick="viewWebinar(4)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="downloadRecording(4)" title="Télécharger">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal: Create/Edit Webinar -->
    <div class="modal fade" id="webinarModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="webinarModalLabel">
                        <i class="fas fa-laptop mr-2"></i>
                        Nouveau Webinaire
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="webinarForm">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="webinarTitle" class="form-label">Titre du webinaire *</label>
                                    <input type="text" class="form-control" id="webinarTitle" required>
                                </div>
                                <div class="mb-3">
                                    <label for="webinarDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="webinarDescription" rows="3"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="webinarDate" class="form-label">Date *</label>
                                        <input type="date" class="form-control" id="webinarDate" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="webinarStartTime" class="form-label">Heure début *</label>
                                        <input type="time" class="form-control" id="webinarStartTime" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="webinarDuration" class="form-label">Durée (min) *</label>
                                        <input type="number" class="form-control" id="webinarDuration" min="30" max="480" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="webinarPlatform" class="form-label">Plateforme *</label>
                                        <select class="form-control" id="webinarPlatform" required>
                                            <option value="">Sélectionner...</option>
                                            <option value="zoom">Zoom</option>
                                            <option value="teams">Microsoft Teams</option>
                                            <option value="meet">Google Meet</option>
                                            <option value="webex">Cisco Webex</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="webinarCapacity" class="form-label">Capacité maximale</label>
                                        <input type="number" class="form-control" id="webinarCapacity" min="1" value="100">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="webinarHost" class="form-label">Animateur principal *</label>
                                    <select class="form-control" id="webinarHost" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="1">Dr. Diabaté (Expert Pénal)</option>
                                        <option value="2">Me. Evelyne (Droit Social)</option>
                                        <option value="3">Me. Koffi (Droit Commercial)</option>
                                        <option value="4">Me. Traoré (Droit Fiscal)</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="webinarCategory" class="form-label">Catégorie</label>
                                    <select class="form-control" id="webinarCategory">
                                        <option value="">Sélectionner...</option>
                                        <option value="droit_penal">Droit Pénal</option>
                                        <option value="droit_civil">Droit Civil</option>
                                        <option value="droit_commercial">Droit Commercial</option>
                                        <option value="droit_travail">Droit du Travail</option>
                                        <option value="droit_fiscal">Droit Fiscal</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="webinarPrice" class="form-label">Prix (FCFA)</label>
                                    <input type="number" class="form-control" id="webinarPrice" min="0" value="0">
                                    <small class="text-muted">0 = Gratuit</small>
                                </div>
                                <div class="mb-3">
                                    <label for="webinarThumbnail" class="form-label">Image de couverture</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="webinarThumbnail" accept="image/*">
                                        <label class="custom-file-label" for="webinarThumbnail">Choisir image...</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Advanced Settings -->
                        <hr>
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-cogs mr-2"></i>
                            Paramètres Avancés
                        </h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="recordWebinar" checked>
                                    <label class="form-check-label" for="recordWebinar">
                                        Enregistrer automatiquement
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="requireRegistration" checked>
                                    <label class="form-check-label" for="requireRegistration">
                                        Inscription obligatoire
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="sendReminders" checked>
                                    <label class="form-check-label" for="sendReminders">
                                        Envoyer des rappels
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="enableChat">
                                    <label class="form-check-label" for="enableChat">
                                        Activer le chat
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="enableQA" checked>
                                    <label class="form-check-label" for="enableQA">
                                        Session Q&A
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="sendCertificate">
                                    <label class="form-check-label" for="sendCertificate">
                                        Certificat de participation
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Annuler
                    </button>
                    <button type="button" class="btn btn-primary" onclick="saveWebinar()">
                        <i class="fas fa-save mr-1"></i>Enregistrer
                    </button>
                    <button type="button" class="btn btn-success" onclick="scheduleWebinar()">
                        <i class="fas fa-calendar-plus mr-1"></i>Programmer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Webinar Details -->
    <div class="modal fade" id="webinarDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-info-circle mr-2"></i>
                        Détails du Webinaire
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="webinarDetailsContent">
                        <!-- Content populated by JavaScript -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Fermer
                    </button>
                    <button type="button" class="btn btn-warning" onclick="editWebinarFromDetails()">
                        <i class="fas fa-edit mr-1"></i>Modifier
                    </button>
                    <button type="button" class="btn btn-success" onclick="joinWebinarFromDetails()">
                        <i class="fas fa-video mr-1"></i>Rejoindre
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
        $('#webinarsTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 2, "desc" ]], // Sort by date
            "pageLength": 10
        });

        // Set minimum date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('webinarDate').setAttribute('min', today);

        // Auto-refresh live status every 30 seconds
        setInterval(updateLiveStatus, 30000);
    });

    // Filter functions
    function filterWebinars() {
        const status = document.getElementById('statusFilter').value;
        const category = document.getElementById('categoryFilter').value;
        console.log('Filtering webinars:', { status, category });
        // Implementation for filtering
    }

    function resetWebinarFilters() {
        document.getElementById('statusFilter').value = '';
        document.getElementById('categoryFilter').value = '';
        document.getElementById('searchWebinar').value = '';
        $('#webinarsTable').DataTable().search('').draw();
    }

    // Webinar management functions
    function createWebinar() {
        document.getElementById('webinarModalLabel').innerHTML = '<i class="fas fa-laptop mr-2"></i>Nouveau Webinaire';
        document.getElementById('webinarForm').reset();
        $('#webinarModal').modal('show');
    }

    function editWebinar(id) {
        document.getElementById('webinarModalLabel').innerHTML = '<i class="fas fa-edit mr-2"></i>Modifier le Webinaire';

        // Load webinar data (simulated)
        document.getElementById('webinarTitle').value = 'Les Nouvelles Réformes du Code Pénal';
        document.getElementById('webinarDescription').value = 'Analyse détaillée des changements 2025';
        document.getElementById('webinarDate').value = '2025-01-10';
        document.getElementById('webinarStartTime').value = '14:00';
        document.getElementById('webinarDuration').value = '120';
        document.getElementById('webinarPlatform').value = 'zoom';
        document.getElementById('webinarCapacity').value = '60';
        document.getElementById('webinarHost').value = '1';
        document.getElementById('webinarCategory').value = 'droit_penal';

        $('#webinarModal').data('webinar-id', id);
        $('#webinarModal').modal('show');
    }

    function viewWebinar(id) {
        // Generate webinar details content
        const detailsHtml = `
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Les Nouvelles Réformes du Code Pénal</h5>
                            <p class="card-text">Analyse détaillée des changements apportés au Code Pénal ivoirien en 2025. Cette session couvrira les principales modifications, leur impact sur la pratique juridique et les stratégies d'adaptation pour les professionnels du droit.</p>

                            <h6>Informations pratiques</h6>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-calendar mr-2"></i><strong>Date:</strong> 10 Janvier 2025</li>
                                <li><i class="fas fa-clock mr-2"></i><strong>Horaire:</strong> 14:00 - 16:00 (120 min)</li>
                                <li><i class="fas fa-laptop mr-2"></i><strong>Plateforme:</strong> Zoom</li>
                                <li><i class="fas fa-users mr-2"></i><strong>Participants:</strong> 45/60</li>
                                <li><i class="fas fa-user-tie mr-2"></i><strong>Animateur:</strong> Dr. Diabaté (Expert Pénal)</li>
                            </ul>

                            <h6>Contenu du webinaire</h6>
                            <ul>
                                <li>Introduction aux nouvelles dispositions</li>
                                <li>Analyse comparative avec l'ancien code</li>
                                <li>Impact sur la procédure pénale</li>
                                <li>Session questions-réponses</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="webinar-status mb-3">
                                <span class="badge badge-danger badge-lg">
                                    <i class="fas fa-circle mr-1"></i>En Direct
                                </span>
                            </div>
                            <img src="${assetUrl('dashboard/img/webinar-thumb.jpg')}"
                                 class="img-fluid rounded mb-3" alt="Webinar thumbnail">

                            <div class="webinar-stats">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <h6 class="text-primary">45</h6>
                                        <small class="text-muted">Participants</small>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="text-success">87%</h6>
                                        <small class="text-muted">Engagement</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h6>Actions disponibles</h6>
                            <div class="d-grid gap-2">
                                <button class="btn btn-success btn-sm" onclick="joinWebinar(${id})">
                                    <i class="fas fa-video mr-1"></i>Rejoindre
                                </button>
                                <button class="btn btn-info btn-sm" onclick="shareWebinar(${id})">
                                    <i class="fas fa-share mr-1"></i>Partager
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="manageParticipants(${id})">
                                    <i class="fas fa-users mr-1"></i>Participants
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        document.getElementById('webinarDetailsContent').innerHTML = detailsHtml;
        $('#webinarDetailsModal').data('webinar-id', id);
        $('#webinarDetailsModal').modal('show');
    }

    function saveWebinar() {
        const form = document.getElementById('webinarForm');
        if (form.checkValidity()) {
            console.log('Saving webinar...');
            alert('Webinaire enregistré avec succès !');
            $('#webinarModal').modal('hide');
        } else {
            form.reportValidity();
        }
    }

    function scheduleWebinar() {
        const form = document.getElementById('webinarForm');
        if (form.checkValidity()) {
            console.log('Scheduling webinar...');
            alert('Webinaire programmé avec succès !');
            $('#webinarModal').modal('hide');
        } else {
            form.reportValidity();
        }
    }

    // Live webinar functions
    function joinWebinar(id) {
        console.log('Joining webinar:', id);
        // Open webinar platform
        window.open('https://zoom.us/j/123456789', '_blank');
    }

    function startLiveWebinar() {
        console.log('Starting new live webinar');
        alert('Démarrage d\'un nouveau webinaire en direct...');
    }

    function updateLiveStatus() {
        console.log('Updating live webinar status...');
        // Update live status indicators
    }

    // Recording functions
    function viewRecording(id) {
        console.log('Viewing recording for webinar:', id);
        window.open('/webinars/recording/' + id, '_blank');
    }

    function downloadRecording(id) {
        console.log('Downloading recording for webinar:', id);
        alert('Téléchargement de l\'enregistrement...');
    }

    // Analytics and reporting
    function viewAnalytics() {
        console.log('Viewing webinar analytics');
        alert('Analytics des webinaires disponibles bientôt.');
    }

    function generateReport() {
        console.log('Generating webinar report');
        alert('Génération du rapport d\'audience...');
    }

    // Import/Export functions
    function exportWebinars() {
        console.log('Exporting webinars');
        alert('Export des données des webinaires...');
    }

    function importWebinars() {
        console.log('Importing webinars');
        alert('Import de webinaires disponible bientôt.');
    }

    // Modal helper functions
    function editWebinarFromDetails() {
        const id = $('#webinarDetailsModal').data('webinar-id');
        $('#webinarDetailsModal').modal('hide');
        editWebinar(id);
    }

    function joinWebinarFromDetails() {
        const id = $('#webinarDetailsModal').data('webinar-id');
        $('#webinarDetailsModal').modal('hide');
        joinWebinar(id);
    }

    function shareWebinar(id) {
        console.log('Sharing webinar:', id);
        if (navigator.share) {
            navigator.share({
                title: 'Webinaire Axe Legal',
                text: 'Rejoignez notre webinaire sur le droit',
                url: window.location.origin + '/webinars/' + id
            });
        } else {
            alert('Lien de partage copié dans le presse-papiers');
        }
    }

    function manageParticipants(id) {
        console.log('Managing participants for webinar:', id);
        // Redirect to participants management
        window.location.href = '/admin/evenements/participants?webinar=' + id;
    }

    function assetUrl(path) {
        return '/dashboard/' + path;
    }
</script>

<style>
    .badge-pulse {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }

    .webinar-thumbnail img {
        object-fit: cover;
        border-radius: 4px;
    }

    .avatar-sm {
        width: 40px;
        height: 40px;
    }

    .avatar-title {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }

    .badge-lg {
        font-size: 0.9em;
        padding: 8px 12px;
    }

    .progress {
        height: 8px;
    }

    .webinar-stats .row {
        margin: 0;
    }

    .webinar-stats .col-6 {
        padding: 5px;
    }
</style>
@endsection
