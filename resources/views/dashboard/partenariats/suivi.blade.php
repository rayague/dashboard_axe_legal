@extends('dashboard.layout')

@section('title', 'Suivi des Partenariats - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-chart-line text-primary mr-2"></i>
            Suivi des Partenariats
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Partenariats</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Suivi</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-info btn-sm" onclick="generateReport()">
                    <i class="fas fa-file-alt mr-1"></i>
                    <span class="d-none d-sm-inline">Rapport</span>
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="exportData()">
                    <i class="fas fa-download mr-1"></i>
                    <span class="d-none d-sm-inline">Exporter</span>
                </button>
            </div>
        </div>
    </div>

    <!-- KPI Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Partenaires Actifs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">23</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">4.8M FCFA</div>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Affaires Référées</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">127</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-share-alt fa-2x text-gray-300"></i>
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
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">91%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 91%"></div>
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
    </div>

    <!-- Performance Charts -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-area mr-2"></i>
                        Évolution des Partenariats
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow">
                            <div class="dropdown-header">Période:</div>
                            <a class="dropdown-item" href="#" onclick="updateChart('month')">Ce mois</a>
                            <a class="dropdown-item" href="#" onclick="updateChart('quarter')">Ce trimestre</a>
                            <a class="dropdown-item" href="#" onclick="updateChart('year')">Cette année</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="partnershipChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-pie mr-2"></i>
                        Répartition par Type
                    </h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="typeChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2"><i class="fas fa-circle text-primary"></i> Cabinets</span>
                        <span class="mr-2"><i class="fas fa-circle text-success"></i> Notaires</span>
                        <span class="mr-2"><i class="fas fa-circle text-info"></i> Experts</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Performance Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table mr-2"></i>
                Performance des Partenaires
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <div class="dropdown-header">Actions:</div>
                    <a class="dropdown-item" href="#" onclick="exportPerformance()">
                        <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                        Exporter données
                    </a>
                    <a class="dropdown-item" href="#" onclick="scheduleReport()">
                        <i class="fas fa-calendar fa-sm fa-fw mr-2 text-gray-400"></i>
                        Programmer rapport
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="sendFeedback()">
                        <i class="fas fa-comments fa-sm fa-fw mr-2 text-gray-400"></i>
                        Envoyer feedback
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Filters -->
            <div class="row mb-3">
                <div class="col-md-3 mb-2">
                    <select class="form-control" id="performanceTypeFilter">
                        <option value="">Tous les types</option>
                        <option value="law_firm">Cabinet d'avocats</option>
                        <option value="notary">Étude notariale</option>
                        <option value="consultant">Consultant</option>
                        <option value="expert">Expert-comptable</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <select class="form-control" id="performancePeriodFilter">
                        <option value="month">Ce mois</option>
                        <option value="quarter" selected>Ce trimestre</option>
                        <option value="year">Cette année</option>
                        <option value="all">Toute période</option>
                    </select>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="input-group">
                        <input type="text" class="form-control" id="performanceSearchInput" placeholder="Rechercher un partenaire...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2">
                    <button class="btn btn-secondary btn-block" onclick="resetPerformanceFilters()">
                        <i class="fas fa-undo mr-1"></i>Reset
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="performanceTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Partenaire</th>
                            <th>Type</th>
                            <th>Région</th>
                            <th>Affaires Référées</th>
                            <th>Revenus Générés</th>
                            <th>Taux Conversion</th>
                            <th>Satisfaction Client</th>
                            <th>Dernière Activité</th>
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
                            <td>Abidjan</td>
                            <td>
                                <span class="badge badge-success">34</span><br>
                                <small class="text-success"><i class="fas fa-arrow-up mr-1"></i>+12%</small>
                            </td>
                            <td>
                                <strong>850,000 FCFA</strong><br>
                                <small class="text-success"><i class="fas fa-arrow-up mr-1"></i>+18%</small>
                            </td>
                            <td>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 87%"></div>
                                </div>
                                <small>87%</small>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">4.8</span>
                                    <div>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-success">Aujourd'hui</span><br>
                                <small class="text-muted">Nouvelle affaire</small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewPartnerDetails(1)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="contactPartner(1)" title="Contacter">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="viewContract(1)" title="Contrat">
                                        <i class="fas fa-file-contract"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-primary text-white rounded-circle">ES</span>
                                    </div>
                                    <div>
                                        <strong>Étude Soro Notaires</strong><br>
                                        <small class="text-muted">Me. Soro Evelyne</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">Étude notariale</span></td>
                            <td>Bouaké</td>
                            <td>
                                <span class="badge badge-warning">18</span><br>
                                <small class="text-danger"><i class="fas fa-arrow-down mr-1"></i>-5%</small>
                            </td>
                            <td>
                                <strong>420,000 FCFA</strong><br>
                                <small class="text-warning"><i class="fas fa-minus mr-1"></i>±0%</small>
                            </td>
                            <td>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 72%"></div>
                                </div>
                                <small>72%</small>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">4.5</span>
                                    <div>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted">Il y a 3 jours</span><br>
                                <small class="text-muted">Mise à jour profil</small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewPartnerDetails(2)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="contactPartner(2)" title="Contacter">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="viewContract(2)" title="Contrat">
                                        <i class="fas fa-file-contract"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-info text-white rounded-circle">KB</span>
                                    </div>
                                    <div>
                                        <strong>Koffi & Partners</strong><br>
                                        <small class="text-muted">Me. Koffi Bernard</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-warning">Expert-comptable</span></td>
                            <td>Yamoussoukro</td>
                            <td>
                                <span class="badge badge-success">25</span><br>
                                <small class="text-success"><i class="fas fa-arrow-up mr-1"></i>+8%</small>
                            </td>
                            <td>
                                <strong>580,000 FCFA</strong><br>
                                <small class="text-success"><i class="fas fa-arrow-up mr-1"></i>+22%</small>
                            </td>
                            <td>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 89%"></div>
                                </div>
                                <small>89%</small>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">4.7</span>
                                    <div>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-warning">Hier</span><br>
                                <small class="text-muted">Affaire terminée</small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewPartnerDetails(3)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="contactPartner(3)" title="Contacter">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="viewContract(3)" title="Contrat">
                                        <i class="fas fa-file-contract"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Activity Feed -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bell mr-2"></i>
                        Activités Récentes
                    </h6>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Nouvelle affaire référée</h6>
                                <p class="text-muted mb-1">Cabinet Diabaté - Droit commercial</p>
                                <small class="text-muted">Il y a 2 heures</small>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-marker bg-info"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Paiement reçu</h6>
                                <p class="text-muted mb-1">Étude Soro - Commission 45,000 FCFA</p>
                                <small class="text-muted">Il y a 5 heures</small>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Évaluation client</h6>
                                <p class="text-muted mb-1">Koffi & Partners - Note: 4.8/5</p>
                                <small class="text-muted">Hier</small>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-marker bg-danger"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Contrat expirant</h6>
                                <p class="text-muted mb-1">Cabinet Traoré - Expire dans 15 jours</p>
                                <small class="text-muted">Il y a 2 jours</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-tasks mr-2"></i>
                        Actions Recommandées
                    </h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Renouveler contrats</div>
                                <small class="text-muted">3 contrats expirent ce mois</small>
                            </div>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </div>

                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Suivre performances</div>
                                <small class="text-muted">2 partenaires sous-performent</small>
                            </div>
                            <span class="badge bg-warning rounded-pill">2</span>
                        </div>

                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Demander feedback</div>
                                <small class="text-muted">Évaluation trimestrielle due</small>
                            </div>
                            <span class="badge bg-info rounded-pill">5</span>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm btn-block" onclick="viewAllTasks()">
                            <i class="fas fa-list mr-1"></i>Voir toutes les tâches
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Détails du Partenaire -->
    <div class="modal fade" id="partnerDetailsModal" tabindex="-1" role="dialog" aria-labelledby="partnerDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="partnerDetailsModalLabel">
                        <i class="fas fa-user-tie mr-2"></i>
                        Détails du Partenaire
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="partnerDetailsContent">
                        <!-- Contenu dynamique -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Fermer
                    </button>
                    <button type="button" class="btn btn-warning" onclick="editPartnerFromModal()">
                        <i class="fas fa-edit mr-1"></i>Modifier
                    </button>
                    <button type="button" class="btn btn-primary" onclick="contactPartnerFromModal()">
                        <i class="fas fa-envelope mr-1"></i>Contacter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Contact Partenaire -->
    <div class="modal fade" id="contactPartnerModal" tabindex="-1" role="dialog" aria-labelledby="contactPartnerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactPartnerModalLabel">
                        <i class="fas fa-envelope mr-2"></i>
                        Contacter le Partenaire
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contactSubject" class="form-label">Sujet</label>
                                <select class="form-control" id="contactSubject" required>
                                    <option value="">Sélectionner un sujet</option>
                                    <option value="referral">Nouvelle affaire à référer</option>
                                    <option value="performance">Discussion performance</option>
                                    <option value="contract">Renouvellement contrat</option>
                                    <option value="feedback">Demande de feedback</option>
                                    <option value="other">Autre</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contactPriority" class="form-label">Priorité</label>
                                <select class="form-control" id="contactPriority">
                                    <option value="low">Faible</option>
                                    <option value="normal" selected>Normale</option>
                                    <option value="high">Élevée</option>
                                    <option value="urgent">Urgente</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="contactMessage" class="form-label">Message</label>
                            <textarea class="form-control" id="contactMessage" rows="5" required placeholder="Votre message..."></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sendCopy" checked>
                                    <label class="form-check-label" for="sendCopy">
                                        M'envoyer une copie
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="scheduleFollowup">
                                    <label class="form-check-label" for="scheduleFollowup">
                                        Programmer un suivi
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
                    <button type="button" class="btn btn-primary" onclick="sendContactMessage()">
                        <i class="fas fa-paper-plane mr-1"></i>Envoyer
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="{{ asset('dashboard/vendor/chart.js/Chart.min.js') }}"></script>
<script>
    // Initialize DataTable
    $(document).ready(function() {
        $('#performanceTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 4, "desc" ]], // Sort by revenue
            "pageLength": 10
        });

        // Initialize charts
        initializeCharts();
    });

    // Initialize charts
    function initializeCharts() {
        // Partnership evolution chart
        var ctx1 = document.getElementById("partnershipChart");
        var partnershipChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Déc"],
                datasets: [{
                    label: "Partenaires actifs",
                    data: [12, 15, 18, 20, 22, 21, 23, 24, 25, 23, 24, 25],
                    backgroundColor: "rgba(78, 115, 223, 0.1)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    borderWidth: 2
                }, {
                    label: "Revenus (K FCFA)",
                    data: [2800, 3200, 3800, 4100, 4500, 4200, 4800, 5100, 5300, 4900, 5200, 5400],
                    backgroundColor: "rgba(28, 200, 138, 0.1)",
                    borderColor: "rgba(28, 200, 138, 1)",
                    borderWidth: 2
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        // Type distribution chart
        var ctx2 = document.getElementById("typeChart");
        var typeChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Cabinets d\'avocats', 'Études notariales', 'Experts-comptables', 'Autres'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f4b619'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    }

    // Chart update function
    function updateChart(period) {
        console.log('Updating chart for period:', period);
        // Implementation for chart updates based on period
    }

    // Performance functions
    function viewPartnerDetails(id) {
        // Load partner details
        $('#partnerDetailsContent').html(`
            <div class="row">
                <div class="col-md-8">
                    <h6>Informations générales</h6>
                    <table class="table table-borderless">
                        <tr><td><strong>Nom:</strong></td><td>Cabinet Diabaté</td></tr>
                        <tr><td><strong>Contact:</strong></td><td>Me. Diabaté Alassane</td></tr>
                        <tr><td><strong>Email:</strong></td><td>diabate@cabinet.ci</td></tr>
                        <tr><td><strong>Téléphone:</strong></td><td>+225 07 88 99 11</td></tr>
                        <tr><td><strong>Spécialité:</strong></td><td>Droit Pénal</td></tr>
                        <tr><td><strong>Date partenariat:</strong></td><td>15/03/2024</td></tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <h6>Statistiques</h6>
                    <div class="card border-success">
                        <div class="card-body text-center">
                            <h4 class="text-success">34</h4>
                            <small>Affaires référées</small>
                        </div>
                    </div>
                    <div class="card border-primary mt-2">
                        <div class="card-body text-center">
                            <h4 class="text-primary">850K FCFA</h4>
                            <small>Revenus générés</small>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h6>Historique des affaires</h6>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Type</th>
                            <th>Commission</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>08/01/2025</td>
                            <td>Kouassi Alain</td>
                            <td>Droit Pénal</td>
                            <td>45,000 FCFA</td>
                            <td><span class="badge badge-success">Terminée</span></td>
                        </tr>
                        <!-- More entries... -->
                    </tbody>
                </table>
            </div>
        `);

        $('#partnerDetailsModal').data('partner-id', id);
        $('#partnerDetailsModal').modal('show');
    }

    function contactPartner(id) {
        $('#contactPartnerModal').data('partner-id', id);
        $('#contactPartnerModal').modal('show');
    }

    function viewContract(id) {
        console.log('Viewing contract for partner:', id);
        // Implementation for contract viewing
    }

    // Modal actions
    function editPartnerFromModal() {
        const id = $('#partnerDetailsModal').data('partner-id');
        $('#partnerDetailsModal').modal('hide');
        console.log('Editing partner:', id);
        // Implementation for partner editing
    }

    function contactPartnerFromModal() {
        const id = $('#partnerDetailsModal').data('partner-id');
        $('#partnerDetailsModal').modal('hide');
        contactPartner(id);
    }

    function sendContactMessage() {
        const form = document.getElementById('contactForm');
        if (form.checkValidity()) {
            const id = $('#contactPartnerModal').data('partner-id');
            console.log('Sending message to partner:', id);
            alert('Message envoyé avec succès !');
            $('#contactPartnerModal').modal('hide');
        } else {
            form.reportValidity();
        }
    }

    // Report and export functions
    function generateReport() {
        console.log('Generating partnership report');
        alert('Génération du rapport en cours...');
    }

    function exportData() {
        console.log('Exporting partnership data');
        alert('Export des données en cours...');
    }

    function exportPerformance() {
        console.log('Exporting performance data');
        alert('Export des données de performance...');
    }

    function scheduleReport() {
        console.log('Scheduling report');
        alert('Programmation de rapport disponible bientôt.');
    }

    function sendFeedback() {
        console.log('Sending feedback');
        alert('Envoi de feedback aux partenaires...');
    }

    // Task management
    function viewAllTasks() {
        console.log('Viewing all tasks');
        // Implementation for task management
    }

    // Filter functions
    function resetPerformanceFilters() {
        document.getElementById('performanceTypeFilter').value = '';
        document.getElementById('performancePeriodFilter').value = 'quarter';
        document.getElementById('performanceSearchInput').value = '';
        $('#performanceTable').DataTable().search('').draw();
    }
</script>

<style>
    .timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e3e6f0;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 20px;
    }

    .timeline-marker {
        position: absolute;
        left: -37px;
        top: 0;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 2px solid #fff;
        box-shadow: 0 0 0 2px #e3e6f0;
    }

    .timeline-content {
        background: #f8f9fc;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }

    .timeline-title {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .avatar-sm {
        width: 40px;
        height: 40px;
    }

    .avatar-lg {
        width: 60px;
        height: 60px;
    }

    .avatar-title {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }
</style>
@endsection
