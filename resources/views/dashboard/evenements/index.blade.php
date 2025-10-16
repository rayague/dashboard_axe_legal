@extends('dashboard.layout')

@section('title', 'Gestion des Événements - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-calendar-alt text-primary mr-2"></i>
            Gestion des Événements
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Événements</li>
                </ol>
            </nav>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newEventModal">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouvel Événement</span>
                <span class="d-sm-none">Nouveau</span>
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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Événements Actifs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Revenus Événements</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">15,750,000 FCFA</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Participants Inscrits</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">347</div>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Taux Satisfaction</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">96%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 96%"></div>
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

    <!-- Quick Actions -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-bolt mr-2"></i>
                Actions Rapides
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-3">
                    <button class="btn btn-outline-primary btn-block" onclick="viewConferences()">
                        <i class="fas fa-microphone d-block mb-2 fa-2x"></i>
                        <div class="font-weight-bold">Conférences</div>
                        <div class="small text-muted">Événements majeurs</div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <button class="btn btn-outline-success btn-block" onclick="viewSeminars()">
                        <i class="fas fa-chalkboard-teacher d-block mb-2 fa-2x"></i>
                        <div class="font-weight-bold">Séminaires</div>
                        <div class="small text-muted">Formations spécialisées</div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <button class="btn btn-outline-info btn-block" onclick="viewWorkshops()">
                        <i class="fas fa-users-cog d-block mb-2 fa-2x"></i>
                        <div class="font-weight-bold">Ateliers</div>
                        <div class="small text-muted">Sessions pratiques</div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <button class="btn btn-outline-warning btn-block" onclick="viewWebinars()">
                        <i class="fas fa-video d-block mb-2 fa-2x"></i>
                        <div class="font-weight-bold">Webinaires</div>
                        <div class="small text-muted">Sessions en ligne</div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Events Calendar -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-calendar fa-fw mr-2"></i>
                        Calendrier des Événements
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow">
                            <div class="dropdown-header">Vues:</div>
                            <a class="dropdown-item" href="#" onclick="switchCalendarView('month')">
                                <i class="fas fa-calendar fa-sm fa-fw mr-2 text-gray-400"></i>
                                Vue Mensuelle
                            </a>
                            <a class="dropdown-item" href="#" onclick="switchCalendarView('week')">
                                <i class="fas fa-calendar-week fa-sm fa-fw mr-2 text-gray-400"></i>
                                Vue Hebdomadaire
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="exportCalendar()">
                                <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                                Exporter
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div id="eventsCalendar">
                        <!-- Calendar will be rendered here -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead class="bg-light">
                                    <tr class="text-center">
                                        <th>Lun</th>
                                        <th>Mar</th>
                                        <th>Mer</th>
                                        <th>Jeu</th>
                                        <th>Ven</th>
                                        <th>Sam</th>
                                        <th>Dim</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="calendar-day">1</td>
                                        <td class="calendar-day">2</td>
                                        <td class="calendar-day">3
                                            <div class="event-item bg-primary text-white">
                                                <small>Conférence Droit Numérique</small>
                                            </div>
                                        </td>
                                        <td class="calendar-day">4</td>
                                        <td class="calendar-day">5
                                            <div class="event-item bg-success text-white">
                                                <small>Séminaire Fiscalité</small>
                                            </div>
                                        </td>
                                        <td class="calendar-day">6</td>
                                        <td class="calendar-day">7</td>
                                    </tr>
                                    <tr>
                                        <td class="calendar-day">8</td>
                                        <td class="calendar-day">9</td>
                                        <td class="calendar-day">10
                                            <div class="event-item bg-info text-white">
                                                <small>Atelier Contrats</small>
                                            </div>
                                        </td>
                                        <td class="calendar-day">11</td>
                                        <td class="calendar-day">12</td>
                                        <td class="calendar-day">13</td>
                                        <td class="calendar-day">14</td>
                                    </tr>
                                    <tr>
                                        <td class="calendar-day">15
                                            <div class="event-item bg-warning text-dark">
                                                <small>Webinaire IA</small>
                                            </div>
                                        </td>
                                        <td class="calendar-day">16</td>
                                        <td class="calendar-day">17</td>
                                        <td class="calendar-day">18</td>
                                        <td class="calendar-day">19</td>
                                        <td class="calendar-day">20
                                            <div class="event-item bg-danger text-white">
                                                <small>Congrès Avocats</small>
                                            </div>
                                        </td>
                                        <td class="calendar-day">21</td>
                                    </tr>
                                    <tr>
                                        <td class="calendar-day">22</td>
                                        <td class="calendar-day">23</td>
                                        <td class="calendar-day">24</td>
                                        <td class="calendar-day">25
                                            <div class="event-item bg-secondary text-white">
                                                <small>Forum Entreprises</small>
                                            </div>
                                        </td>
                                        <td class="calendar-day">26</td>
                                        <td class="calendar-day">27</td>
                                        <td class="calendar-day">28</td>
                                    </tr>
                                    <tr>
                                        <td class="calendar-day">29</td>
                                        <td class="calendar-day">30</td>
                                        <td class="calendar-day">31</td>
                                        <td class="calendar-day text-muted">1</td>
                                        <td class="calendar-day text-muted">2</td>
                                        <td class="calendar-day text-muted">3</td>
                                        <td class="calendar-day text-muted">4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <!-- Upcoming Events -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-clock mr-2"></i>
                        Événements Prochains
                    </h6>
                </div>
                <div class="card-body">
                    <div class="event-list">
                        <div class="event-item-small border-left-primary mb-3 p-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="font-weight-bold mb-1">Conférence Droit Numérique</h6>
                                    <div class="small text-muted">
                                        <i class="fas fa-calendar mr-1"></i>3 Oct 2025, 14h00
                                    </div>
                                    <div class="small text-muted">
                                        <i class="fas fa-map-marker-alt mr-1"></i>Centre Songhaï, Cotonou
                                    </div>
                                    <div class="small text-success font-weight-bold">
                                        <i class="fas fa-coins mr-1"></i>125,000 FCFA
                                    </div>
                                </div>
                                <span class="badge badge-primary">45 inscrits</span>
                            </div>
                        </div>

                        <div class="event-item-small border-left-success mb-3 p-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="font-weight-bold mb-1">Séminaire Fiscalité Entreprise</h6>
                                    <div class="small text-muted">
                                        <i class="fas fa-calendar mr-1"></i>5 Oct 2025, 09h00
                                    </div>
                                    <div class="small text-muted">
                                        <i class="fas fa-map-marker-alt mr-1"></i>Hôtel Novotel, Cotonou
                                    </div>
                                    <div class="small text-success font-weight-bold">
                                        <i class="fas fa-coins mr-1"></i>75,000 FCFA
                                    </div>
                                </div>
                                <span class="badge badge-success">32 inscrits</span>
                            </div>
                        </div>

                        <div class="event-item-small border-left-info mb-3 p-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="font-weight-bold mb-1">Atelier Rédaction Contrats</h6>
                                    <div class="small text-muted">
                                        <i class="fas fa-calendar mr-1"></i>10 Oct 2025, 10h00
                                    </div>
                                    <div class="small text-muted">
                                        <i class="fas fa-map-marker-alt mr-1"></i>Salle de formation Axe Legal
                                    </div>
                                    <div class="small text-success font-weight-bold">
                                        <i class="fas fa-coins mr-1"></i>50,000 FCFA
                                    </div>
                                </div>
                                <span class="badge badge-info">18 inscrits</span>
                            </div>
                        </div>

                        <div class="event-item-small border-left-warning mb-3 p-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="font-weight-bold mb-1">Webinaire IA & Droit</h6>
                                    <div class="small text-muted">
                                        <i class="fas fa-calendar mr-1"></i>15 Oct 2025, 16h00
                                    </div>
                                    <div class="small text-muted">
                                        <i class="fas fa-video mr-1"></i>En ligne (Zoom)
                                    </div>
                                    <div class="small text-success font-weight-bold">
                                        <i class="fas fa-coins mr-1"></i>25,000 FCFA
                                    </div>
                                </div>
                                <span class="badge badge-warning">67 inscrits</span>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button class="btn btn-outline-primary btn-sm" onclick="viewAllEvents()">
                            <i class="fas fa-eye mr-1"></i>
                            Voir tous les événements
                        </button>
                    </div>
                </div>
            </div>

            <!-- Event Types -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-chart-pie mr-2"></i>
                        Répartition par Type
                    </h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="eventTypesChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Conférences
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Séminaires
                        </span>
                        <br class="d-sm-none">
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Ateliers
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Webinaires
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Events Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-list mr-2"></i>
                Liste Complète des Événements
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <div class="dropdown-header">Actions:</div>
                    <a class="dropdown-item" href="#" onclick="exportEvents()">
                        <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                        Exporter la liste
                    </a>
                    <a class="dropdown-item" href="#" onclick="printEvents()">
                        <i class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i>
                        Imprimer
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Filters -->
            <div class="row mb-3">
                <div class="col-lg-2 col-md-6 mb-2">
                    <select class="form-control form-control-sm" id="typeFilter">
                        <option value="">Tous les types</option>
                        <option value="conference">Conférence</option>
                        <option value="seminaire">Séminaire</option>
                        <option value="atelier">Atelier</option>
                        <option value="webinaire">Webinaire</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 mb-2">
                    <select class="form-control form-control-sm" id="statusFilter">
                        <option value="">Tous les statuts</option>
                        <option value="planifie">Planifié</option>
                        <option value="en-cours">En cours</option>
                        <option value="termine">Terminé</option>
                        <option value="annule">Annulé</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 mb-2">
                    <input type="date" class="form-control form-control-sm" id="dateFilter">
                </div>
                <div class="col-lg-3 col-md-6 mb-2">
                    <input type="text" class="form-control form-control-sm" id="searchFilter" placeholder="Rechercher...">
                </div>
                <div class="col-lg-3 col-md-12 mb-2">
                    <button class="btn btn-primary btn-sm mr-2" onclick="applyFilters()">
                        <i class="fas fa-search mr-1"></i>
                        Filtrer
                    </button>
                    <button class="btn btn-outline-secondary btn-sm" onclick="resetFilters()">
                        <i class="fas fa-undo mr-1"></i>
                        Reset
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover" id="eventsTable" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>Événement</th>
                            <th class="d-none d-md-table-cell">Type</th>
                            <th>Date & Heure</th>
                            <th class="d-none d-lg-table-cell">Lieu</th>
                            <th>Inscrits</th>
                            <th class="d-none d-md-table-cell">Prix</th>
                            <th>Statut</th>
                            <th class="d-none d-lg-table-cell">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="font-weight-bold">Conférence Droit Numérique</div>
                                <div class="small text-muted">Transformation digitale du secteur juridique</div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <span class="badge badge-primary">Conférence</span>
                            </td>
                            <td>
                                <div class="font-weight-bold">3 Oct 2025</div>
                                <div class="small text-muted">14h00 - 18h00</div>
                            </td>
                            <td class="d-none d-lg-table-cell">Centre Songhaï, Cotonou</td>
                            <td>
                                <div class="font-weight-bold">45/60</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" style="width: 75%"></div>
                                </div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <div class="font-weight-bold text-success">125,000 FCFA</div>
                            </td>
                            <td>
                                <span class="badge badge-success">Planifié</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewEvent('event-1')" title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="manageRegistrations('event-1')" title="Inscriptions">
                                        <i class="fas fa-users"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="editEvent('event-1')" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="font-weight-bold">Séminaire Fiscalité Entreprise</div>
                                <div class="small text-muted">Nouvelles réglementations fiscales 2025</div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <span class="badge badge-success">Séminaire</span>
                            </td>
                            <td>
                                <div class="font-weight-bold">5 Oct 2025</div>
                                <div class="small text-muted">09h00 - 17h00</div>
                            </td>
                            <td class="d-none d-lg-table-cell">Hôtel Novotel, Cotonou</td>
                            <td>
                                <div class="font-weight-bold">32/40</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" style="width: 80%"></div>
                                </div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <div class="font-weight-bold text-success">75,000 FCFA</div>
                            </td>
                            <td>
                                <span class="badge badge-success">Planifié</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewEvent('event-2')" title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="manageRegistrations('event-2')" title="Inscriptions">
                                        <i class="fas fa-users"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="editEvent('event-2')" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="font-weight-bold">Atelier Rédaction Contrats</div>
                                <div class="small text-muted">Techniques avancées de rédaction juridique</div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <span class="badge badge-info">Atelier</span>
                            </td>
                            <td>
                                <div class="font-weight-bold">10 Oct 2025</div>
                                <div class="small text-muted">10h00 - 16h00</div>
                            </td>
                            <td class="d-none d-lg-table-cell">Salle formation Axe Legal</td>
                            <td>
                                <div class="font-weight-bold">18/25</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-info" style="width: 72%"></div>
                                </div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <div class="font-weight-bold text-success">50,000 FCFA</div>
                            </td>
                            <td>
                                <span class="badge badge-success">Planifié</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewEvent('event-3')" title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="manageRegistrations('event-3')" title="Inscriptions">
                                        <i class="fas fa-users"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="editEvent('event-3')" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- New Event Modal -->
    <div class="modal fade" id="newEventModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-plus mr-2"></i>
                        Nouvel Événement
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="newEventForm">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-lg-6">
                                <h6 class="font-weight-bold text-primary mb-3">
                                    <i class="fas fa-info-circle mr-2"></i>Informations Générales
                                </h6>
                                
                                <div class="form-group">
                                    <label for="eventTitle" class="font-weight-bold">Titre de l'événement *</label>
                                    <input type="text" class="form-control" id="eventTitle" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eventType" class="font-weight-bold">Type *</label>
                                            <select class="form-control" id="eventType" required>
                                                <option value="">Sélectionner</option>
                                                <option value="conference">Conférence</option>
                                                <option value="seminaire">Séminaire</option>
                                                <option value="atelier">Atelier</option>
                                                <option value="webinaire">Webinaire</option>
                                                <option value="forum">Forum</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eventCategory" class="font-weight-bold">Catégorie</label>
                                            <select class="form-control" id="eventCategory">
                                                <option value="">Sélectionner</option>
                                                <option value="droit-affaires">Droit des affaires</option>
                                                <option value="droit-travail">Droit du travail</option>
                                                <option value="droit-famille">Droit de la famille</option>
                                                <option value="droit-penal">Droit pénal</option>
                                                <option value="fiscalite">Fiscalité</option>
                                                <option value="legal-tech">Legal Tech</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="eventDescription" class="font-weight-bold">Description *</label>
                                    <textarea class="form-control" id="eventDescription" rows="4" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="eventObjectives" class="font-weight-bold">Objectifs</label>
                                    <textarea class="form-control" id="eventObjectives" rows="3"></textarea>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-lg-6">
                                <h6 class="font-weight-bold text-success mb-3">
                                    <i class="fas fa-calendar-alt mr-2"></i>Planification
                                </h6>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eventDate" class="font-weight-bold">Date *</label>
                                            <input type="date" class="form-control" id="eventDate" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eventDuration" class="font-weight-bold">Durée (heures)</label>
                                            <input type="number" class="form-control" id="eventDuration" min="1" max="12" step="0.5">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eventStartTime" class="font-weight-bold">Heure de début *</label>
                                            <input type="time" class="form-control" id="eventStartTime" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eventEndTime" class="font-weight-bold">Heure de fin</label>
                                            <input type="time" class="form-control" id="eventEndTime">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="eventLocation" class="font-weight-bold">Lieu *</label>
                                    <input type="text" class="form-control" id="eventLocation" required>
                                </div>

                                <div class="form-group">
                                    <label for="eventAddress" class="font-weight-bold">Adresse complète</label>
                                    <textarea class="form-control" id="eventAddress" rows="2"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="maxParticipants" class="font-weight-bold">Nb max participants</label>
                                            <input type="number" class="form-control" id="maxParticipants" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eventPrice" class="font-weight-bold">Prix (FCFA)</label>
                                            <input type="number" class="form-control" id="eventPrice" min="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Full Width Section -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <h6 class="font-weight-bold text-info mb-3">
                                    <i class="fas fa-cogs mr-2"></i>Configuration Avancée
                                </h6>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="speakers" class="font-weight-bold">Intervenants</label>
                                            <textarea class="form-control" id="speakers" rows="3" placeholder="Noms et titres des intervenants"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="targetAudience" class="font-weight-bold">Public cible</label>
                                            <textarea class="form-control" id="targetAudience" rows="3" placeholder="Avocats, juristes, étudiants..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Options</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="certificateProvided">
                                                <label class="custom-control-label" for="certificateProvided">Certificat de participation</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="materialsProvided">
                                                <label class="custom-control-label" for="materialsProvided">Support de formation</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="recordingAllowed">
                                                <label class="custom-control-label" for="recordingAllowed">Enregistrement autorisé</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Services inclus</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="refreshmentsIncluded">
                                                <label class="custom-control-label" for="refreshmentsIncluded">Pauses café</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="lunchIncluded">
                                                <label class="custom-control-label" for="lunchIncluded">Déjeuner</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="parkingIncluded">
                                                <label class="custom-control-label" for="parkingIncluded">Parking gratuit</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="registrationDeadline" class="font-weight-bold">Date limite inscription</label>
                                            <input type="date" class="form-control" id="registrationDeadline">
                                        </div>
                                        <div class="form-group">
                                            <label for="cancellationPolicy" class="font-weight-bold">Politique d'annulation</label>
                                            <select class="form-control" id="cancellationPolicy">
                                                <option value="flexible">Flexible (24h avant)</option>
                                                <option value="moderate">Modérée (48h avant)</option>
                                                <option value="strict">Stricte (7 jours avant)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="specialRequirements" class="font-weight-bold">Exigences particulières</label>
                                    <textarea class="form-control" id="specialRequirements" rows="2" placeholder="Équipements spéciaux, accessibilité, etc."></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-outline-primary" onclick="saveDraftEvent()">
                        <i class="fas fa-save mr-1"></i>
                        Sauvegarder brouillon
                    </button>
                    <button type="button" class="btn btn-primary" onclick="saveNewEvent()">
                        <i class="fas fa-calendar-plus mr-1"></i>
                        Créer l'événement
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .calendar-day {
        height: 100px;
        width: 14.28%;
        vertical-align: top;
        position: relative;
        padding: 5px;
        border: 1px solid #e3e6f0;
    }
    
    .event-item {
        font-size: 0.65rem;
        padding: 2px 4px;
        margin-bottom: 2px;
        border-radius: 3px;
        cursor: pointer;
        transition: all 0.2s;
    }
    
    .event-item:hover {
        transform: scale(1.05);
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .event-item-small {
        transition: all 0.2s;
        border-radius: 5px;
    }
    
    .event-item-small:hover {
        transform: translateX(5px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    .chart-pie {
        position: relative;
        height: 15rem;
    }
    
    @media (max-width: 768px) {
        .calendar-day {
            height: 80px;
            font-size: 0.8rem;
        }
        
        .event-item {
            font-size: 0.55rem;
            padding: 1px 2px;
        }
        
        .btn-group-sm .btn {
            padding: 0.25rem 0.4rem;
            font-size: 0.7rem;
        }
    }
    
    @media (max-width: 576px) {
        .calendar-day {
            height: 60px;
            padding: 2px;
        }
        
        .event-item {
            font-size: 0.5rem;
            padding: 1px;
        }
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart.js configuration for event types pie chart
    var ctx = document.getElementById("eventTypesChart");
    var eventTypesChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Conférences", "Séminaires", "Ateliers", "Webinaires"],
            datasets: [{
                data: [30, 25, 20, 25],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f4b619']
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

    // Initialize DataTable
    $(document).ready(function() {
        $('#eventsTable').DataTable({
            "order": [[ 2, "desc" ]],
            "pageLength": 10,
            "responsive": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            }
        });
        
        // Set minimum date to today
        document.getElementById('eventDate').min = new Date().toISOString().split('T')[0];
        document.getElementById('registrationDeadline').min = new Date().toISOString().split('T')[0];
    });

    // Quick actions
    function viewConferences() {
        applyTypeFilter('conference');
    }

    function viewSeminars() {
        applyTypeFilter('seminaire');
    }

    function viewWorkshops() {
        applyTypeFilter('atelier');
    }

    function viewWebinars() {
        applyTypeFilter('webinaire');
    }

    function applyTypeFilter(type) {
        document.getElementById('typeFilter').value = type;
        applyFilters();
    }

    // Filter functions
    function applyFilters() {
        const type = document.getElementById('typeFilter').value;
        const status = document.getElementById('statusFilter').value;
        const date = document.getElementById('dateFilter').value;
        const search = document.getElementById('searchFilter').value;
        
        const table = $('#eventsTable').DataTable();
        
        // Clear previous search
        table.search('').columns().search('').draw();
        
        // Apply individual column filters
        if (type) {
            table.column(1).search(type);
        }
        if (status) {
            table.column(6).search(status);
        }
        if (search) {
            table.search(search);
        }
        
        table.draw();
        
        Swal.fire({
            title: 'Filtres appliqués',
            text: 'La liste des événements a été mise à jour.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function resetFilters() {
        document.getElementById('typeFilter').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('dateFilter').value = '';
        document.getElementById('searchFilter').value = '';
        
        $('#eventsTable').DataTable().search('').columns().search('').draw();
    }

    // Event actions
    function viewEvent(eventId) {
        Swal.fire({
            title: 'Détails de l\'événement',
            text: 'Ouverture de la fiche détaillée...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function manageRegistrations(eventId) {
        Swal.fire({
            title: 'Gestion des inscriptions',
            text: 'Ouverture de la liste des participants...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function editEvent(eventId) {
        Swal.fire({
            title: 'Modification de l\'événement',
            text: 'Ouverture du formulaire d\'édition...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    // Calendar functions
    function switchCalendarView(view) {
        console.log('Switching to', view, 'view');
        // Here you would typically reload the calendar with the new view
    }

    function exportCalendar() {
        Swal.fire({
            title: 'Export du calendrier',
            text: 'Génération du fichier calendrier...',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }

    // Export functions
    function exportEvents() {
        Swal.fire({
            title: 'Export en cours...',
            text: 'Génération de la liste des événements...',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function printEvents() {
        window.print();
    }

    function viewAllEvents() {
        // Scroll to events table
        document.getElementById('eventsTable').scrollIntoView({ behavior: 'smooth' });
    }

    // Auto-calculate end time based on duration
    document.getElementById('eventDuration').addEventListener('input', function() {
        const startTime = document.getElementById('eventStartTime').value;
        const duration = parseFloat(this.value);
        
        if (startTime && duration) {
            const [hours, minutes] = startTime.split(':').map(Number);
            const startDate = new Date();
            startDate.setHours(hours, minutes, 0, 0);
            
            const endDate = new Date(startDate.getTime() + duration * 60 * 60 * 1000);
            const endTime = endDate.toTimeString().slice(0, 5);
            
            document.getElementById('eventEndTime').value = endTime;
        }
    });

    // Form validation and submission
    function saveNewEvent() {
        const form = document.getElementById('newEventForm');
        const requiredFields = ['eventTitle', 'eventType', 'eventDescription', 'eventDate', 'eventStartTime', 'eventLocation'];
        let isValid = true;
        
        requiredFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        if (isValid) {
            $('#newEventModal').modal('hide');
            form.reset();
            
            Swal.fire({
                title: 'Événement créé !',
                text: 'Le nouvel événement a été ajouté avec succès.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                // Refresh events list
                location.reload();
            });
        } else {
            Swal.fire({
                title: 'Erreur',
                text: 'Veuillez remplir tous les champs obligatoires.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }

    function saveDraftEvent() {
        Swal.fire({
            title: 'Brouillon sauvegardé',
            text: 'Vous pouvez reprendre la création plus tard.',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    }

    // Calendar event clicks
    document.addEventListener('click', function(e) {
        if (e.target.closest('.event-item')) {
            const eventElement = e.target.closest('.event-item');
            const eventTitle = eventElement.textContent.trim();
            
            Swal.fire({
                title: eventTitle,
                text: 'Voir les détails de cet événement ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Voir détails',
                cancelButtonText: 'Fermer'
            }).then((result) => {
                if (result.value) {
                    // Open event details
                    viewEvent('event-' + Math.random().toString(36).substr(2, 9));
                }
            });
        }
    });

    // Mobile responsiveness
    function handleMobileView() {
        if (window.innerWidth < 768) {
            // Adjust calendar for mobile
            document.querySelectorAll('.calendar-day').forEach(day => {
                day.style.fontSize = '0.7rem';
            });
        }
    }

    // Handle window resize
    window.addEventListener('resize', handleMobileView);

    // Initial mobile check
    handleMobileView();
</script>
@endsection