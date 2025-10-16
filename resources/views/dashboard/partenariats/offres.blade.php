@extends('dashboard.layout')

@section('title', 'Offres de Partenariat - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-gift text-primary mr-2"></i>
            Offres de Partenariat
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Partenariats</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Offres</li>
                </ol>
            </nav>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createOfferModal">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouvelle Offre</span>
                <span class="d-sm-none">Créer</span>
            </button>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Offres Actives</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Candidatures Reçues</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">147</div>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">En Négociation</div>
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
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Taux Conversion</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">34%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 34%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-lg-4 mb-3">
            <div class="card border-left-success shadow h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-lg mr-3">
                            <span class="avatar-title bg-success text-white rounded-circle">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-1">Créer une Offre</h6>
                            <p class="text-muted mb-0 small">Publier une nouvelle offre de partenariat</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-success btn-sm btn-block" onclick="createQuickOffer()">
                            <i class="fas fa-rocket mr-1"></i>Création rapide
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-3">
            <div class="card border-left-warning shadow h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-lg mr-3">
                            <span class="avatar-title bg-warning text-white rounded-circle">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-1">Rechercher Partenaires</h6>
                            <p class="text-muted mb-0 small">Trouver des partenaires potentiels</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-warning btn-sm btn-block" onclick="searchPartners()">
                            <i class="fas fa-binoculars mr-1"></i>Rechercher
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-3">
            <div class="card border-left-info shadow h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-lg mr-3">
                            <span class="avatar-title bg-info text-white rounded-circle">
                                <i class="fas fa-chart-bar"></i>
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-1">Analyser Performance</h6>
                            <p class="text-muted mb-0 small">Statistiques des offres publiées</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-info btn-sm btn-block" onclick="viewAnalytics()">
                            <i class="fas fa-analytics mr-1"></i>Voir stats
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Offres Actives -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-bullhorn mr-2"></i>
                Offres Actives
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <div class="dropdown-header">Actions groupées:</div>
                    <a class="dropdown-item" href="#" onclick="bulkPause()">
                        <i class="fas fa-pause fa-sm fa-fw mr-2 text-warning"></i>
                        Suspendre sélectionnées
                    </a>
                    <a class="dropdown-item" href="#" onclick="bulkActivate()">
                        <i class="fas fa-play fa-sm fa-fw mr-2 text-success"></i>
                        Activer sélectionnées
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="exportOffers()">
                        <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                        Exporter
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="activeOffersTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="selectAllActive">
                                    <label class="custom-control-label" for="selectAllActive"></label>
                                </div>
                            </th>
                            <th>Titre de l'Offre</th>
                            <th>Type</th>
                            <th>Région</th>
                            <th>Candidatures</th>
                            <th>Date Publication</th>
                            <th>Expiration</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="offer1">
                                    <label class="custom-control-label" for="offer1"></label>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <strong>Avocat spécialisé en droit pénal</strong><br>
                                    <small class="text-muted">Recherche partenaire pour affaires criminelles</small>
                                </div>
                            </td>
                            <td><span class="badge badge-danger">Cabinet d'avocats</span></td>
                            <td>Abidjan, San-Pédro</td>
                            <td>
                                <span class="badge badge-success">23 candidatures</span><br>
                                <small class="text-muted">5 en attente</small>
                            </td>
                            <td>15/12/2024<br><small class="text-muted">14:30</small></td>
                            <td><span class="text-success">15/02/2025</span></td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewOffer(1)" title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editOffer(1)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="viewCandidates(1)" title="Candidatures">
                                        <i class="fas fa-users"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="pauseOffer(1)" title="Suspendre">
                                        <i class="fas fa-pause"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="offer2">
                                    <label class="custom-control-label" for="offer2"></label>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <strong>Notaire pour actes immobiliers</strong><br>
                                    <small class="text-muted">Collaboration pour transactions immobilières</small>
                                </div>
                            </td>
                            <td><span class="badge badge-primary">Étude notariale</span></td>
                            <td>Bouaké, Korhogo</td>
                            <td>
                                <span class="badge badge-warning">8 candidatures</span><br>
                                <small class="text-muted">2 en attente</small>
                            </td>
                            <td>20/12/2024<br><small class="text-muted">09:15</small></td>
                            <td><span class="text-warning">20/01/2025</span></td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewOffer(2)" title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editOffer(2)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="viewCandidates(2)" title="Candidatures">
                                        <i class="fas fa-users"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="pauseOffer(2)" title="Suspendre">
                                        <i class="fas fa-pause"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="offer3">
                                    <label class="custom-control-label" for="offer3"></label>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <strong>Expert-comptable fiscaliste</strong><br>
                                    <small class="text-muted">Partenariat en fiscalité d'entreprise</small>
                                </div>
                            </td>
                            <td><span class="badge badge-success">Expert-comptable</span></td>
                            <td>Yamoussoukro</td>
                            <td>
                                <span class="badge badge-info">12 candidatures</span><br>
                                <small class="text-muted">1 en attente</small>
                            </td>
                            <td>28/12/2024<br><small class="text-muted">16:45</small></td>
                            <td><span class="text-danger">28/01/2025</span></td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewOffer(3)" title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editOffer(3)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="viewCandidates(3)" title="Candidatures">
                                        <i class="fas fa-users"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="pauseOffer(3)" title="Suspendre">
                                        <i class="fas fa-pause"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Historique des Offres -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-history mr-2"></i>
                Historique des Offres
            </h6>
        </div>
        <div class="card-body">
            <!-- Filter Section -->
            <div class="row mb-3">
                <div class="col-md-3 mb-2">
                    <select class="form-control" id="statusHistoryFilter">
                        <option value="">Tous les statuts</option>
                        <option value="active">Active</option>
                        <option value="paused">Suspendue</option>
                        <option value="expired">Expirée</option>
                        <option value="completed">Terminée</option>
                        <option value="cancelled">Annulée</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <select class="form-control" id="typeHistoryFilter">
                        <option value="">Tous les types</option>
                        <option value="law_firm">Cabinet d'avocats</option>
                        <option value="notary">Étude notariale</option>
                        <option value="consultant">Consultant</option>
                        <option value="expert">Expert-comptable</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchHistoryInput" placeholder="Rechercher une offre...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2">
                    <button class="btn btn-secondary btn-block" onclick="resetHistoryFilters()">
                        <i class="fas fa-undo mr-1"></i>Reset
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="historyOffersTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titre de l'Offre</th>
                            <th>Type</th>
                            <th>Candidatures</th>
                            <th>Sélectionnés</th>
                            <th>Date Publication</th>
                            <th>Date Fin</th>
                            <th>Statut Final</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <strong>Avocat en droit social</strong><br>
                                    <small class="text-muted">Partenariat droit du travail</small>
                                </div>
                            </td>
                            <td><span class="badge badge-warning">Consultant</span></td>
                            <td><span class="badge badge-success">34</span></td>
                            <td><span class="badge badge-primary">2</span></td>
                            <td>01/11/2024</td>
                            <td>15/12/2024</td>
                            <td><span class="badge badge-success">Terminée</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewOfferHistory(101)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="duplicateOffer(101)" title="Dupliquer">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <strong>Partenaire assurance</strong><br>
                                    <small class="text-muted">Protection juridique clients</small>
                                </div>
                            </td>
                            <td><span class="badge badge-info">Assurance</span></td>
                            <td><span class="badge badge-warning">12</span></td>
                            <td><span class="badge badge-danger">0</span></td>
                            <td>15/10/2024</td>
                            <td>15/11/2024</td>
                            <td><span class="badge badge-danger">Expirée</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewOfferHistory(102)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="republishOffer(102)" title="Republier">
                                    <i class="fas fa-redo"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <strong>Traducteur assermenté</strong><br>
                                    <small class="text-muted">Documents juridiques multilingues</small>
                                </div>
                            </td>
                            <td><span class="badge badge-secondary">Autre</span></td>
                            <td><span class="badge badge-success">18</span></td>
                            <td><span class="badge badge-success">3</span></td>
                            <td>20/09/2024</td>
                            <td>20/10/2024</td>
                            <td><span class="badge badge-success">Terminée</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewOfferHistory(103)" title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="duplicateOffer(103)" title="Dupliquer">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal: Nouvelle Offre -->
    <div class="modal fade" id="createOfferModal" tabindex="-1" role="dialog" aria-labelledby="createOfferModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createOfferModalLabel">
                        <i class="fas fa-plus mr-2"></i>
                        Créer une Nouvelle Offre
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createOfferForm">
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="offerTitle" class="form-label">Titre de l'offre</label>
                                <input type="text" class="form-control" id="offerTitle" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="offerType" class="form-label">Type de partenaire</label>
                                <select class="form-control" id="offerType" required>
                                    <option value="">Sélectionner</option>
                                    <option value="law_firm">Cabinet d'avocats</option>
                                    <option value="notary">Étude notariale</option>
                                    <option value="consultant">Consultant juridique</option>
                                    <option value="expert">Expert-comptable</option>
                                    <option value="insurance">Assurance</option>
                                    <option value="bank">Banque</option>
                                    <option value="other">Autre</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="offerDescription" class="form-label">Description détaillée</label>
                            <textarea class="form-control" id="offerDescription" rows="4" required placeholder="Décrivez le type de partenariat recherché, les missions, les avantages..."></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="offerSpecialty" class="form-label">Spécialité requise</label>
                                <select class="form-control" id="offerSpecialty">
                                    <option value="">Pas de spécialité particulière</option>
                                    <option value="civil">Droit Civil</option>
                                    <option value="commercial">Droit Commercial</option>
                                    <option value="penal">Droit Pénal</option>
                                    <option value="travail">Droit du Travail</option>
                                    <option value="famille">Droit de la Famille</option>
                                    <option value="fiscal">Droit Fiscal</option>
                                    <option value="immobilier">Droit Immobilier</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="offerExperience" class="form-label">Expérience minimale</label>
                                <select class="form-control" id="offerExperience">
                                    <option value="0">Aucune exigence</option>
                                    <option value="2">2 ans minimum</option>
                                    <option value="5">5 ans minimum</option>
                                    <option value="10">10 ans minimum</option>
                                    <option value="15">15 ans minimum</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="offerRegions" class="form-label">Régions ciblées</label>
                                <select class="form-control" id="offerRegions" multiple>
                                    <option value="abidjan">Abidjan</option>
                                    <option value="yamoussoukro">Yamoussoukro</option>
                                    <option value="bouake">Bouaké</option>
                                    <option value="san_pedro">San-Pédro</option>
                                    <option value="korhogo">Korhogo</option>
                                    <option value="daloa">Daloa</option>
                                    <option value="national">National</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="offerExpiry" class="form-label">Date d'expiration</label>
                                <input type="date" class="form-control" id="offerExpiry" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="offerRequirements" class="form-label">Exigences et critères</label>
                            <textarea class="form-control" id="offerRequirements" rows="3" placeholder="Documents requis, certifications, références..."></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="offerBenefits" class="form-label">Avantages proposés</label>
                                <textarea class="form-control" id="offerBenefits" rows="3" placeholder="Commission, visibilité, formation..."></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="offerContact" class="form-label">Contact pour candidatures</label>
                                <input type="email" class="form-control" id="offerContact" placeholder="Email de contact">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="offerUrgent">
                                    <label class="form-check-label" for="offerUrgent">
                                        Offre urgente (mise en avant)
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="offerPublic" checked>
                                    <label class="form-check-label" for="offerPublic">
                                        Publier immédiatement
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
                    <button type="button" class="btn btn-warning" onclick="saveOfferDraft()">
                        <i class="fas fa-save mr-1"></i>Sauvegarder Brouillon
                    </button>
                    <button type="button" class="btn btn-primary" onclick="publishOffer()">
                        <i class="fas fa-bullhorn mr-1"></i>Publier
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Voir les Candidatures -->
    <div class="modal fade" id="candidatesModal" tabindex="-1" role="dialog" aria-labelledby="candidatesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="candidatesModalLabel">
                        <i class="fas fa-users mr-2"></i>
                        Candidatures pour l'Offre
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="candidatesContent">
                        <!-- Contenu dynamique des candidatures -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Fermer
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
        $('#activeOffersTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 6, "asc" ]], // Sort by expiry date
            "pageLength": 10,
            "columnDefs": [
                { "orderable": false, "targets": [0, 8] }
            ]
        });

        $('#historyOffersTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 4, "desc" ]], // Sort by publication date
            "pageLength": 10
        });

        // Select all functionality
        $('#selectAllActive').change(function() {
            $('#activeOffersTable tbody input[type="checkbox"]').prop('checked', this.checked);
        });

        // Set minimum date for expiry
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('offerExpiry').min = today;
    });

    // Quick actions
    function createQuickOffer() {
        $('#createOfferModal').modal('show');
    }

    function searchPartners() {
        console.log('Opening partner search');
        // Implementation for partner search
    }

    function viewAnalytics() {
        console.log('Opening analytics view');
        // Implementation for analytics
    }

    // Offer management functions
    function viewOffer(id) {
        console.log('Viewing offer:', id);
        // Implementation for viewing offer details
    }

    function editOffer(id) {
        console.log('Editing offer:', id);
        // Implementation for editing offer
    }

    function viewCandidates(id) {
        // Load candidates for this offer
        $('#candidatesContent').html(`
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Candidat</th>
                            <th>Type</th>
                            <th>Expérience</th>
                            <th>Date Candidature</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cabinet Koné & Associés</td>
                            <td>Cabinet d'avocats</td>
                            <td>15 ans</td>
                            <td>08/01/2025</td>
                            <td><span class="badge badge-warning">En attente</span></td>
                            <td>
                                <button class="btn btn-success btn-sm">Accepter</button>
                                <button class="btn btn-danger btn-sm">Rejeter</button>
                            </td>
                        </tr>
                        <!-- More candidates... -->
                    </tbody>
                </table>
            </div>
        `);
        $('#candidatesModal').modal('show');
    }

    function pauseOffer(id) {
        if (confirm('Suspendre cette offre ?')) {
            console.log('Pausing offer:', id);
            alert('Offre suspendue !');
            location.reload();
        }
    }

    // History functions
    function viewOfferHistory(id) {
        console.log('Viewing offer history:', id);
        // Implementation for viewing offer history
    }

    function duplicateOffer(id) {
        if (confirm('Dupliquer cette offre ?')) {
            console.log('Duplicating offer:', id);
            alert('Offre dupliquée ! Vous pouvez maintenant la modifier.');
        }
    }

    function republishOffer(id) {
        if (confirm('Republier cette offre expirée ?')) {
            console.log('Republishing offer:', id);
            alert('Offre republiée avec succès !');
            location.reload();
        }
    }

    // Form submission
    function publishOffer() {
        const form = document.getElementById('createOfferForm');
        if (form.checkValidity()) {
            console.log('Publishing new offer');
            alert('Offre publiée avec succès !');
            $('#createOfferModal').modal('hide');
            location.reload();
        } else {
            form.reportValidity();
        }
    }

    function saveOfferDraft() {
        console.log('Saving offer draft');
        alert('Brouillon sauvegardé !');
        $('#createOfferModal').modal('hide');
    }

    // Bulk operations
    function bulkPause() {
        const selected = $('#activeOffersTable tbody input[type="checkbox"]:checked').length;
        if (selected === 0) {
            alert('Veuillez sélectionner au moins une offre.');
            return;
        }
        if (confirm(`Suspendre les ${selected} offres sélectionnées ?`)) {
            console.log('Bulk pausing offers');
            alert('Offres suspendues !');
            location.reload();
        }
    }

    function bulkActivate() {
        const selected = $('#activeOffersTable tbody input[type="checkbox"]:checked').length;
        if (selected === 0) {
            alert('Veuillez sélectionner au moins une offre.');
            return;
        }
        if (confirm(`Activer les ${selected} offres sélectionnées ?`)) {
            console.log('Bulk activating offers');
            alert('Offres activées !');
            location.reload();
        }
    }

    // Filter functions
    function resetHistoryFilters() {
        document.getElementById('statusHistoryFilter').value = '';
        document.getElementById('typeHistoryFilter').value = '';
        document.getElementById('searchHistoryInput').value = '';
        $('#historyOffersTable').DataTable().search('').draw();
    }

    // Export functions
    function exportOffers() {
        console.log('Exporting offers');
        alert('Export en cours...');
    }
</script>
@endsection
