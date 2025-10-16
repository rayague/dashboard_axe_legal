@extends('dashboard.layout')

@section('title', 'Confirmations de Rendez-vous - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-check-circle text-primary mr-2"></i>
            Confirmations de Rendez-vous
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Rendez-vous</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Confirmations</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-success btn-sm" onclick="confirmAllPending()">
                    <i class="fas fa-check-double mr-1"></i>
                    <span class="d-none d-sm-inline">Confirmer Tout</span>
                </button>
                <button type="button" class="btn btn-info btn-sm" onclick="sendReminders()">
                    <i class="fas fa-bell mr-1"></i>
                    <span class="d-none d-sm-inline">Rappels</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">En Attente</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Confirmés Aujourd'hui</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">23</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Annulés</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">7</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Taux Confirmation</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">82%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 82%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-percentage fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtres -->
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
                    <label for="statusFilter" class="form-label">Statut</label>
                    <select class="form-control" id="statusFilter">
                        <option value="">Tous les statuts</option>
                        <option value="pending">En attente</option>
                        <option value="confirmed">Confirmé</option>
                        <option value="cancelled">Annulé</option>
                        <option value="rescheduled">Reporté</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="lawyerFilter" class="form-label">Avocat</label>
                    <select class="form-control" id="lawyerFilter">
                        <option value="">Tous les avocats</option>
                        <option value="1">Me. Kouadio Adjoa</option>
                        <option value="2">Me. Traoré Moussa</option>
                        <option value="3">Me. Koné Fatima</option>
                        <option value="4">Me. Diabaté Sekou</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="dateFilter" class="form-label">Date</label>
                    <input type="date" class="form-control" id="dateFilter" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="urgencyFilter" class="form-label">Urgence</label>
                    <select class="form-control" id="urgencyFilter">
                        <option value="">Toutes urgences</option>
                        <option value="low">Faible</option>
                        <option value="normal">Normale</option>
                        <option value="high">Élevée</option>
                        <option value="urgent">Urgente</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Rendez-vous en Attente de Confirmation -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                Rendez-vous en Attente de Confirmation
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <div class="dropdown-header">Actions groupées:</div>
                    <a class="dropdown-item" href="#" onclick="confirmSelected()">
                        <i class="fas fa-check fa-sm fa-fw mr-2 text-success"></i>
                        Confirmer sélectionnés
                    </a>
                    <a class="dropdown-item" href="#" onclick="cancelSelected()">
                        <i class="fas fa-times fa-sm fa-fw mr-2 text-danger"></i>
                        Annuler sélectionnés
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="exportPending()">
                        <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                        Exporter
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="pendingTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="selectAllPending">
                                    <label class="custom-control-label" for="selectAllPending"></label>
                                </div>
                            </th>
                            <th>RDV</th>
                            <th>Client</th>
                            <th>Avocat</th>
                            <th>Date & Heure</th>
                            <th>Type</th>
                            <th>Urgence</th>
                            <th>Délai</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="rdv847">
                                    <label class="custom-control-label" for="rdv847"></label>
                                </div>
                            </td>
                            <td><strong>#RDV2025-0847</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-primary text-white rounded-circle">KA</span>
                                    </div>
                                    <div>
                                        <strong>Kouassi Alain</strong><br>
                                        <small class="text-muted">+225 07 88 99 11</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-success text-white rounded-circle">KA</span>
                                    </div>
                                    <div>
                                        <strong>Me. Kouadio Adjoa</strong><br>
                                        <small class="text-muted">Droit Civil</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <strong>10/01/2025</strong><br>
                                <small class="text-muted">14:30 - 15:30</small>
                            </td>
                            <td><span class="badge badge-info">Consultation</span></td>
                            <td><span class="badge badge-danger">Urgent</span></td>
                            <td><span class="text-danger"><i class="fas fa-clock mr-1"></i>2h restantes</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-success btn-sm" onclick="confirmAppointment(847)" title="Confirmer">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="rescheduleAppointment(847)" title="Reporter">
                                        <i class="fas fa-calendar-alt"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="cancelAppointment(847)" title="Annuler">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <button class="btn btn-info btn-sm" onclick="viewDetails(847)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="rdv848">
                                    <label class="custom-control-label" for="rdv848"></label>
                                </div>
                            </td>
                            <td><strong>#RDV2025-0848</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-warning text-white rounded-circle">YM</span>
                                    </div>
                                    <div>
                                        <strong>Yao Marie</strong><br>
                                        <small class="text-muted">+225 05 44 77 88</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-danger text-white rounded-circle">TM</span>
                                    </div>
                                    <div>
                                        <strong>Me. Traoré Moussa</strong><br>
                                        <small class="text-muted">Droit Commercial</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <strong>10/01/2025</strong><br>
                                <small class="text-muted">16:00 - 17:00</small>
                            </td>
                            <td><span class="badge badge-primary">Négociation</span></td>
                            <td><span class="badge badge-warning">Normale</span></td>
                            <td><span class="text-success"><i class="fas fa-clock mr-1"></i>4h restantes</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-success btn-sm" onclick="confirmAppointment(848)" title="Confirmer">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="rescheduleAppointment(848)" title="Reporter">
                                        <i class="fas fa-calendar-alt"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="cancelAppointment(848)" title="Annuler">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <button class="btn btn-info btn-sm" onclick="viewDetails(848)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="rdv849">
                                    <label class="custom-control-label" for="rdv849"></label>
                                </div>
                            </td>
                            <td><strong>#RDV2025-0849</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-info text-white rounded-circle">DJ</span>
                                    </div>
                                    <div>
                                        <strong>Diallo Joseph</strong><br>
                                        <small class="text-muted">+225 01 23 45 67</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-primary text-white rounded-circle">KF</span>
                                    </div>
                                    <div>
                                        <strong>Me. Koné Fatima</strong><br>
                                        <small class="text-muted">Droit Famille</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <strong>11/01/2025</strong><br>
                                <small class="text-muted">09:00 - 10:00</small>
                            </td>
                            <td><span class="badge badge-success">Médiation</span></td>
                            <td><span class="badge badge-info">Faible</span></td>
                            <td><span class="text-info"><i class="fas fa-clock mr-1"></i>24h restantes</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-success btn-sm" onclick="confirmAppointment(849)" title="Confirmer">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="rescheduleAppointment(849)" title="Reporter">
                                        <i class="fas fa-calendar-alt"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="cancelAppointment(849)" title="Annuler">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <button class="btn btn-info btn-sm" onclick="viewDetails(849)" title="Détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Confirmations Récentes -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-history mr-2"></i>
                Confirmations Récentes
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="recentConfirmationsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>RDV</th>
                            <th>Client</th>
                            <th>Avocat</th>
                            <th>Date RDV</th>
                            <th>Confirmé le</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>#RDV2025-0846</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-success text-white rounded-circle">AB</span>
                                    </div>
                                    <div>
                                        <strong>Assi Brigitte</strong><br>
                                        <small class="text-muted">+225 07 11 22 33</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-success text-white rounded-circle">KA</span>
                                    </div>
                                    <div>
                                        <strong>Me. Kouadio Adjoa</strong><br>
                                        <small class="text-muted">Droit du Travail</small>
                                    </div>
                                </div>
                            </td>
                            <td>09/01/2025<br><small class="text-muted">11:00</small></td>
                            <td>08/01/2025<br><small class="text-muted">15:30</small></td>
                            <td><span class="badge badge-success">Confirmé</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewConfirmation(846)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="sendNotification(846)" title="Notifier">
                                    <i class="fas fa-bell"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>#RDV2025-0845</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-warning text-white rounded-circle">TK</span>
                                    </div>
                                    <div>
                                        <strong>Touré Koffi</strong><br>
                                        <small class="text-muted">+225 05 77 88 99</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-danger text-white rounded-circle">TM</span>
                                    </div>
                                    <div>
                                        <strong>Me. Traoré Moussa</strong><br>
                                        <small class="text-muted">Droit Pénal</small>
                                    </div>
                                </div>
                            </td>
                            <td>09/01/2025<br><small class="text-muted">14:30</small></td>
                            <td>08/01/2025<br><small class="text-muted">12:15</small></td>
                            <td><span class="badge badge-success">Confirmé</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewConfirmation(845)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="sendNotification(845)" title="Notifier">
                                    <i class="fas fa-bell"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>#RDV2025-0844</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-info text-white rounded-circle">KS</span>
                                    </div>
                                    <div>
                                        <strong>Konan Sylvie</strong><br>
                                        <small class="text-muted">+225 01 55 66 77</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-primary text-white rounded-circle">KF</span>
                                    </div>
                                    <div>
                                        <strong>Me. Koné Fatima</strong><br>
                                        <small class="text-muted">Droit Civil</small>
                                    </div>
                                </div>
                            </td>
                            <td>08/01/2025<br><small class="text-muted">16:00</small></td>
                            <td>07/01/2025<br><small class="text-muted">18:45</small></td>
                            <td><span class="badge badge-danger">Annulé</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewConfirmation(844)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="rescheduleFromHistory(844)" title="Reporter">
                                    <i class="fas fa-calendar-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal: Confirmer Rendez-vous -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">
                        <i class="fas fa-check-circle mr-2"></i>
                        Confirmer le Rendez-vous
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="confirmDetails">
                        <!-- Details will be loaded here -->
                    </div>
                    <div class="form-group mt-3">
                        <label for="confirmNotes">Notes de confirmation</label>
                        <textarea class="form-control" id="confirmNotes" rows="3" placeholder="Notes supplémentaires (optionnel)"></textarea>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="notifyClient" checked>
                        <label class="form-check-label" for="notifyClient">
                            Notifier le client par SMS et email
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="notifyLawyer" checked>
                        <label class="form-check-label" for="notifyLawyer">
                            Notifier l'avocat
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Annuler
                    </button>
                    <button type="button" class="btn btn-success" onclick="processConfirmation()">
                        <i class="fas fa-check mr-1"></i>Confirmer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Reporter Rendez-vous -->
    <div class="modal fade" id="rescheduleModal" tabindex="-1" role="dialog" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rescheduleModalLabel">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Reporter le Rendez-vous
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="rescheduleDetails">
                        <!-- Details will be loaded here -->
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="newDate">Nouvelle date</label>
                            <input type="date" class="form-control" id="newDate" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="newTime">Nouvelle heure</label>
                            <input type="time" class="form-control" id="newTime" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rescheduleReason">Raison du report</label>
                        <select class="form-control" id="rescheduleReason" required>
                            <option value="">Sélectionner une raison</option>
                            <option value="client_request">Demande du client</option>
                            <option value="lawyer_unavailable">Avocat indisponible</option>
                            <option value="emergency">Urgence</option>
                            <option value="technical_issue">Problème technique</option>
                            <option value="other">Autre</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rescheduleNotes">Notes complémentaires</label>
                        <textarea class="form-control" id="rescheduleNotes" rows="3" placeholder="Détails supplémentaires"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Annuler
                    </button>
                    <button type="button" class="btn btn-warning" onclick="processReschedule()">
                        <i class="fas fa-calendar-alt mr-1"></i>Reporter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Annuler Rendez-vous -->
    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel">
                        <i class="fas fa-times-circle mr-2"></i>
                        Annuler le Rendez-vous
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Cette action annulera définitivement le rendez-vous.
                    </div>
                    <div id="cancelDetails">
                        <!-- Details will be loaded here -->
                    </div>
                    <div class="form-group">
                        <label for="cancelReason">Raison de l'annulation</label>
                        <select class="form-control" id="cancelReason" required>
                            <option value="">Sélectionner une raison</option>
                            <option value="client_cancel">Annulation client</option>
                            <option value="lawyer_unavailable">Avocat indisponible</option>
                            <option value="no_response">Pas de réponse du client</option>
                            <option value="duplicate">Doublon</option>
                            <option value="other">Autre</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cancelNotes">Notes d'annulation</label>
                        <textarea class="form-control" id="cancelNotes" rows="3" placeholder="Détails de l'annulation"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Fermer
                    </button>
                    <button type="button" class="btn btn-danger" onclick="processCancel()">
                        <i class="fas fa-trash mr-1"></i>Annuler le RDV
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    // Initialize DataTables
    $(document).ready(function() {
        $('#pendingTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 7, "asc" ]], // Sort by deadline
            "pageLength": 10,
            "columnDefs": [
                { "orderable": false, "targets": [0, 8] } // Disable sorting for checkbox and actions
            ]
        });

        $('#recentConfirmationsTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 4, "desc" ]], // Sort by confirmation date
            "pageLength": 10
        });

        // Select all functionality
        $('#selectAllPending').change(function() {
            $('tbody input[type="checkbox"]').prop('checked', this.checked);
        });
    });

    // Confirm appointment
    function confirmAppointment(id) {
        // Load appointment details
        $('#confirmDetails').html(`
            <div class="card border-success">
                <div class="card-body">
                    <h6>Détails du rendez-vous #RDV2025-${id}</h6>
                    <p><strong>Client:</strong> [Client Name]</p>
                    <p><strong>Avocat:</strong> [Lawyer Name]</p>
                    <p><strong>Date:</strong> [Date & Time]</p>
                    <p><strong>Type:</strong> [Type]</p>
                </div>
            </div>
        `);
        $('#confirmModal').data('appointment-id', id);
        $('#confirmModal').modal('show');
    }

    // Process confirmation
    function processConfirmation() {
        const id = $('#confirmModal').data('appointment-id');
        const notes = document.getElementById('confirmNotes').value;
        const notifyClient = document.getElementById('notifyClient').checked;
        const notifyLawyer = document.getElementById('notifyLawyer').checked;

        // Implementation for confirmation
        console.log('Confirming appointment:', id, {notes, notifyClient, notifyLawyer});

        alert('Rendez-vous confirmé avec succès !');
        $('#confirmModal').modal('hide');
        location.reload();
    }

    // Reschedule appointment
    function rescheduleAppointment(id) {
        // Load appointment details
        $('#rescheduleDetails').html(`
            <div class="card border-warning">
                <div class="card-body">
                    <h6>Rendez-vous actuel #RDV2025-${id}</h6>
                    <p><strong>Date actuelle:</strong> [Current Date & Time]</p>
                    <p><strong>Client:</strong> [Client Name]</p>
                    <p><strong>Avocat:</strong> [Lawyer Name]</p>
                </div>
            </div>
        `);
        $('#rescheduleModal').data('appointment-id', id);
        $('#rescheduleModal').modal('show');
    }

    // Process reschedule
    function processReschedule() {
        const id = $('#rescheduleModal').data('appointment-id');
        const newDate = document.getElementById('newDate').value;
        const newTime = document.getElementById('newTime').value;
        const reason = document.getElementById('rescheduleReason').value;
        const notes = document.getElementById('rescheduleNotes').value;

        if (!newDate || !newTime || !reason) {
            alert('Veuillez remplir tous les champs obligatoires.');
            return;
        }

        // Implementation for rescheduling
        console.log('Rescheduling appointment:', id, {newDate, newTime, reason, notes});

        alert('Rendez-vous reporté avec succès !');
        $('#rescheduleModal').modal('hide');
        location.reload();
    }

    // Cancel appointment
    function cancelAppointment(id) {
        // Load appointment details
        $('#cancelDetails').html(`
            <div class="card border-danger">
                <div class="card-body">
                    <h6>Rendez-vous #RDV2025-${id}</h6>
                    <p><strong>Client:</strong> [Client Name]</p>
                    <p><strong>Avocat:</strong> [Lawyer Name]</p>
                    <p><strong>Date:</strong> [Date & Time]</p>
                </div>
            </div>
        `);
        $('#cancelModal').data('appointment-id', id);
        $('#cancelModal').modal('show');
    }

    // Process cancellation
    function processCancel() {
        const id = $('#cancelModal').data('appointment-id');
        const reason = document.getElementById('cancelReason').value;
        const notes = document.getElementById('cancelNotes').value;

        if (!reason) {
            alert('Veuillez sélectionner une raison d\'annulation.');
            return;
        }

        // Implementation for cancellation
        console.log('Cancelling appointment:', id, {reason, notes});

        alert('Rendez-vous annulé avec succès !');
        $('#cancelModal').modal('hide');
        location.reload();
    }

    // View appointment details
    function viewDetails(id) {
        // Implementation for viewing details
        console.log('Viewing details for appointment:', id);
    }

    // View confirmation details
    function viewConfirmation(id) {
        // Implementation for viewing confirmation details
        console.log('Viewing confirmation for appointment:', id);
    }

    // Send notification
    function sendNotification(id) {
        if (confirm('Envoyer une notification de rappel ?')) {
            console.log('Sending notification for appointment:', id);
            alert('Notification envoyée !');
        }
    }

    // Reschedule from history
    function rescheduleFromHistory(id) {
        rescheduleAppointment(id);
    }

    // Confirm all pending
    function confirmAllPending() {
        if (confirm('Confirmer tous les rendez-vous en attente ?')) {
            console.log('Confirming all pending appointments');
            alert('Tous les rendez-vous ont été confirmés !');
            location.reload();
        }
    }

    // Send reminders
    function sendReminders() {
        if (confirm('Envoyer des rappels à tous les clients ?')) {
            console.log('Sending reminders');
            alert('Rappels envoyés avec succès !');
        }
    }

    // Group actions
    function confirmSelected() {
        const selected = $('tbody input[type="checkbox"]:checked').length;
        if (selected === 0) {
            alert('Veuillez sélectionner au moins un rendez-vous.');
            return;
        }
        if (confirm(`Confirmer les ${selected} rendez-vous sélectionnés ?`)) {
            console.log('Confirming selected appointments');
            alert('Rendez-vous confirmés !');
            location.reload();
        }
    }

    function cancelSelected() {
        const selected = $('tbody input[type="checkbox"]:checked').length;
        if (selected === 0) {
            alert('Veuillez sélectionner au moins un rendez-vous.');
            return;
        }
        if (confirm(`Annuler les ${selected} rendez-vous sélectionnés ?`)) {
            console.log('Cancelling selected appointments');
            alert('Rendez-vous annulés !');
            location.reload();
        }
    }

    // Export functions
    function exportPending() {
        console.log('Exporting pending appointments');
        alert('Export en cours...');
    }
</script>
@endsection
