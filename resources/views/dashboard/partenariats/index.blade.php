@extends('dashboard.layout')

@section('title', 'Gestion des Partenariats - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-handshake text-primary mr-2"></i>
            Gestion des Partenariats
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Partenariats</li>
                </ol>
            </nav>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newPartnerModal">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouveau Partenaire</span>
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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Partenaires Actifs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Revenus Partenariats</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8,500,000 FCFA</div>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Projets Collaboratifs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
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
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">92%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 92%"></div>
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
                    <button class="btn btn-outline-primary btn-block" onclick="viewContracts()">
                        <i class="fas fa-file-contract d-block mb-2 fa-2x"></i>
                        <div class="font-weight-bold">Contrats</div>
                        <div class="small text-muted">Gérer les accords</div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <button class="btn btn-outline-success btn-block" onclick="viewFinances()">
                        <i class="fas fa-chart-pie d-block mb-2 fa-2x"></i>
                        <div class="font-weight-bold">Finances</div>
                        <div class="small text-muted">Revenus partagés</div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <button class="btn btn-outline-info btn-block" onclick="viewProjects()">
                        <i class="fas fa-tasks d-block mb-2 fa-2x"></i>
                        <div class="font-weight-bold">Projets</div>
                        <div class="small text-muted">Collaborations</div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <button class="btn btn-outline-warning btn-block" onclick="viewReports()">
                        <i class="fas fa-file-alt d-block mb-2 fa-2x"></i>
                        <div class="font-weight-bold">Rapports</div>
                        <div class="small text-muted">Analyses détaillées</div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Partners List -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-handshake mr-2"></i>
                Liste des Partenaires
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <div class="dropdown-header">Actions:</div>
                    <a class="dropdown-item" href="#" onclick="exportPartners()">
                        <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                        Exporter la liste
                    </a>
                    <a class="dropdown-item" href="#" onclick="importPartners()">
                        <i class="fas fa-upload fa-sm fa-fw mr-2 text-gray-400"></i>
                        Importer des partenaires
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Filters -->
            <div class="row mb-3">
                <div class="col-lg-3 col-md-6 mb-2">
                    <select class="form-control form-control-sm" id="typeFilter">
                        <option value="">Tous les types</option>
                        <option value="cabinet-juridique">Cabinet juridique</option>
                        <option value="notaire">Notaire</option>
                        <option value="expert-comptable">Expert-comptable</option>
                        <option value="consulting">Consulting</option>
                        <option value="tech-legal">Tech Legal</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-2">
                    <select class="form-control form-control-sm" id="statusFilter">
                        <option value="">Tous les statuts</option>
                        <option value="actif">Actif</option>
                        <option value="inactif">Inactif</option>
                        <option value="en-negociation">En négociation</option>
                        <option value="suspendu">Suspendu</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-2">
                    <input type="text" class="form-control form-control-sm" id="searchFilter" placeholder="Rechercher...">
                </div>
                <div class="col-lg-3 col-md-6 mb-2">
                    <button class="btn btn-primary btn-sm btn-block" onclick="applyFilters()">
                        <i class="fas fa-search mr-1"></i>
                        Filtrer
                    </button>
                </div>
            </div>

            <!-- Partners Grid -->
            <div class="row" id="partnersGrid">
                <!-- Partner Card 1 -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-left-primary h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary rounded-circle p-2 mr-3">
                                        <i class="fas fa-balance-scale text-white"></i>
                                    </div>
                                    <div>
                                        <h6 class="font-weight-bold mb-0">Cabinet Juridique SARL Expertise</h6>
                                        <div class="small text-muted">Cabinet juridique • Cotonou, Bénin</div>
                                    </div>
                                </div>
                                <span class="badge badge-success">Actif</span>
                            </div>

                            <div class="row text-sm mb-3">
                                <div class="col-6">
                                    <i class="fas fa-user-tie text-primary mr-1"></i>
                                    Me Antoine Kpako
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-phone text-primary mr-1"></i>
                                    +229 97 12 34 56
                                </div>
                            </div>

                            <div class="row text-sm mb-3">
                                <div class="col-6">
                                    <i class="fas fa-envelope text-primary mr-1"></i>
                                    contact@expertise.bj
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-calendar text-primary mr-1"></i>
                                    Depuis 2022
                                </div>
                            </div>

                            <div class="row text-sm mb-3">
                                <div class="col-6">
                                    <i class="fas fa-coins text-success mr-1"></i>
                                    <strong>2,450,000 FCFA</strong>
                                    <div class="small text-muted">Revenus générés</div>
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-handshake text-info mr-1"></i>
                                    <strong>24 projets</strong>
                                    <div class="small text-muted">Collaborations</div>
                                </div>
                            </div>

                            <div class="specialties mb-3">
                                <span class="badge badge-outline-primary mr-1">Droit des affaires</span>
                                <span class="badge badge-outline-primary mr-1">Droit commercial</span>
                                <span class="badge badge-outline-primary">Arbitrage</span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewPartnerDetails('partner-1')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="contactPartner('partner-1')">
                                        <i class="fas fa-comments"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="viewContracts('partner-1')">
                                        <i class="fas fa-file-contract"></i>
                                    </button>
                                </div>
                                <button class="btn btn-primary btn-sm" onclick="newCollaboration('partner-1')">
                                    <i class="fas fa-plus mr-1"></i>
                                    Collaborer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partner Card 2 -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-left-success h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success rounded-circle p-2 mr-3">
                                        <i class="fas fa-calculator text-white"></i>
                                    </div>
                                    <div>
                                        <h6 class="font-weight-bold mb-0">Fiduciaire Comptable SOGEFIC</h6>
                                        <div class="small text-muted">Expert-comptable • Porto-Novo, Bénin</div>
                                    </div>
                                </div>
                                <span class="badge badge-success">Actif</span>
                            </div>

                            <div class="row text-sm mb-3">
                                <div class="col-6">
                                    <i class="fas fa-user-tie text-success mr-1"></i>
                                    M. Jean-Baptiste Adjo
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-phone text-success mr-1"></i>
                                    +229 96 78 90 12
                                </div>
                            </div>

                            <div class="row text-sm mb-3">
                                <div class="col-6">
                                    <i class="fas fa-envelope text-success mr-1"></i>
                                    sogefic@gmail.com
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-calendar text-success mr-1"></i>
                                    Depuis 2021
                                </div>
                            </div>

                            <div class="row text-sm mb-3">
                                <div class="col-6">
                                    <i class="fas fa-coins text-success mr-1"></i>
                                    <strong>1,875,000 FCFA</strong>
                                    <div class="small text-muted">Revenus générés</div>
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-handshake text-info mr-1"></i>
                                    <strong>18 projets</strong>
                                    <div class="small text-muted">Collaborations</div>
                                </div>
                            </div>

                            <div class="specialties mb-3">
                                <span class="badge badge-outline-success mr-1">Audit comptable</span>
                                <span class="badge badge-outline-success mr-1">Fiscalité</span>
                                <span class="badge badge-outline-success">Conseil financier</span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-success" onclick="viewPartnerDetails('partner-2')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-primary" onclick="contactPartner('partner-2')">
                                        <i class="fas fa-comments"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="viewContracts('partner-2')">
                                        <i class="fas fa-file-contract"></i>
                                    </button>
                                </div>
                                <button class="btn btn-success btn-sm" onclick="newCollaboration('partner-2')">
                                    <i class="fas fa-plus mr-1"></i>
                                    Collaborer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partner Card 3 -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-left-info h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info rounded-circle p-2 mr-3">
                                        <i class="fas fa-stamp text-white"></i>
                                    </div>
                                    <div>
                                        <h6 class="font-weight-bold mb-0">Étude Notariale Maître Ahokpe</h6>
                                        <div class="small text-muted">Notaire • Abomey-Calavi, Bénin</div>
                                    </div>
                                </div>
                                <span class="badge badge-info">Actif</span>
                            </div>

                            <div class="row text-sm mb-3">
                                <div class="col-6">
                                    <i class="fas fa-user-tie text-info mr-1"></i>
                                    Me Sylvie Ahokpe
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-phone text-info mr-1"></i>
                                    +229 95 44 33 22
                                </div>
                            </div>

                            <div class="row text-sm mb-3">
                                <div class="col-6">
                                    <i class="fas fa-envelope text-info mr-1"></i>
                                    ahokpe.notaire@yahoo.fr
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-calendar text-info mr-1"></i>
                                    Depuis 2023
                                </div>
                            </div>

                            <div class="row text-sm mb-3">
                                <div class="col-6">
                                    <i class="fas fa-coins text-success mr-1"></i>
                                    <strong>3,125,000 FCFA</strong>
                                    <div class="small text-muted">Revenus générés</div>
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-handshake text-info mr-1"></i>
                                    <strong>31 projets</strong>
                                    <div class="small text-muted">Collaborations</div>
                                </div>
                            </div>

                            <div class="specialties mb-3">
                                <span class="badge badge-outline-info mr-1">Actes notariés</span>
                                <span class="badge badge-outline-info mr-1">Immobilier</span>
                                <span class="badge badge-outline-info">Successions</span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-info" onclick="viewPartnerDetails('partner-3')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-primary" onclick="contactPartner('partner-3')">
                                        <i class="fas fa-comments"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="viewContracts('partner-3')">
                                        <i class="fas fa-file-contract"></i>
                                    </button>
                                </div>
                                <button class="btn btn-info btn-sm" onclick="newCollaboration('partner-3')">
                                    <i class="fas fa-plus mr-1"></i>
                                    Collaborer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partner Card 4 -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-left-warning h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-warning rounded-circle p-2 mr-3">
                                        <i class="fas fa-laptop-code text-white"></i>
                                    </div>
                                    <div>
                                        <h6 class="font-weight-bold mb-0">TechLegal Solutions Afrique</h6>
                                        <div class="small text-muted">Tech Legal • Cotonou, Bénin</div>
                                    </div>
                                </div>
                                <span class="badge badge-warning">En négociation</span>
                            </div>

                            <div class="row text-sm mb-3">
                                <div class="col-6">
                                    <i class="fas fa-user-tie text-warning mr-1"></i>
                                    M. Rodrigue Dossou
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-phone text-warning mr-1"></i>
                                    +229 94 55 66 77
                                </div>
                            </div>

                            <div class="row text-sm mb-3">
                                <div class="col-6">
                                    <i class="fas fa-envelope text-warning mr-1"></i>
                                    contact@techlegal.africa
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-calendar text-warning mr-1"></i>
                                    En discussion
                                </div>
                            </div>

                            <div class="row text-sm mb-3">
                                <div class="col-6">
                                    <i class="fas fa-coins text-muted mr-1"></i>
                                    <strong>0 FCFA</strong>
                                    <div class="small text-muted">Revenus projetés</div>
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-handshake text-muted mr-1"></i>
                                    <strong>0 projets</strong>
                                    <div class="small text-muted">En attente</div>
                                </div>
                            </div>

                            <div class="specialties mb-3">
                                <span class="badge badge-outline-warning mr-1">IA juridique</span>
                                <span class="badge badge-outline-warning mr-1">Automatisation</span>
                                <span class="badge badge-outline-warning">LegalTech</span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-warning" onclick="viewPartnerDetails('partner-4')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-primary" onclick="contactPartner('partner-4')">
                                        <i class="fas fa-comments"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary" onclick="negotiateContract('partner-4')">
                                        <i class="fas fa-handshake"></i>
                                    </button>
                                </div>
                                <button class="btn btn-warning btn-sm" onclick="continueNegotiation('partner-4')">
                                    <i class="fas fa-clock mr-1"></i>
                                    Négocier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-4">
                <button class="btn btn-outline-primary" onclick="loadMorePartners()">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Charger plus de partenaires
                </button>
            </div>
        </div>
    </div>

    <!-- New Partner Modal -->
    <div class="modal fade" id="newPartnerModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-plus mr-2"></i>
                        Nouveau Partenaire
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="newPartnerForm">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="partnerName" class="font-weight-bold">Nom de l'organisation *</label>
                                    <input type="text" class="form-control" id="partnerName" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="partnerType" class="font-weight-bold">Type *</label>
                                    <select class="form-control" id="partnerType" required>
                                        <option value="">Sélectionner</option>
                                        <option value="cabinet-juridique">Cabinet juridique</option>
                                        <option value="notaire">Notaire</option>
                                        <option value="expert-comptable">Expert-comptable</option>
                                        <option value="consulting">Consulting</option>
                                        <option value="tech-legal">Tech Legal</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactName" class="font-weight-bold">Personne de contact *</label>
                                    <input type="text" class="form-control" id="contactName" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactTitle" class="font-weight-bold">Titre/Fonction</label>
                                    <input type="text" class="form-control" id="contactTitle">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactEmail" class="font-weight-bold">Email *</label>
                                    <input type="email" class="form-control" id="contactEmail" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactPhone" class="font-weight-bold">Téléphone *</label>
                                    <input type="tel" class="form-control" id="contactPhone" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="partnerAddress" class="font-weight-bold">Adresse</label>
                            <textarea class="form-control" id="partnerAddress" rows="2"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="specialties" class="font-weight-bold">Spécialités</label>
                            <input type="text" class="form-control" id="specialties" placeholder="Ex: Droit des affaires, Fiscalité, Immobilier">
                            <small class="form-text text-muted">Séparez les spécialités par des virgules</small>
                        </div>

                        <div class="form-group">
                            <label for="partnerDescription" class="font-weight-bold">Description</label>
                            <textarea class="form-control" id="partnerDescription" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="commissionRate" class="font-weight-bold">Taux de commission (%)</label>
                                    <input type="number" class="form-control" id="commissionRate" min="0" max="100" step="0.1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contractDuration" class="font-weight-bold">Durée du contrat (mois)</label>
                                    <input type="number" class="form-control" id="contractDuration" min="1">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="saveNewPartner()">
                        <i class="fas fa-save mr-1"></i>
                        Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .badge-outline-primary {
        color: #007bff;
        border: 1px solid #007bff;
        background-color: transparent;
    }

    .badge-outline-success {
        color: #28a745;
        border: 1px solid #28a745;
        background-color: transparent;
    }

    .badge-outline-info {
        color: #17a2b8;
        border: 1px solid #17a2b8;
        background-color: transparent;
    }

    .badge-outline-warning {
        color: #ffc107;
        border: 1px solid #ffc107;
        background-color: transparent;
    }

    .partner-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .partner-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .specialties .badge {
        font-size: 0.7rem;
        padding: 0.25rem 0.5rem;
    }

    @media (max-width: 768px) {
        .btn-group-sm .btn {
            padding: 0.25rem 0.4rem;
            font-size: 0.7rem;
        }

        .specialties .badge {
            font-size: 0.6rem;
            padding: 0.2rem 0.4rem;
            margin-bottom: 0.25rem;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Filter functionality
    function applyFilters() {
        const type = document.getElementById('typeFilter').value;
        const status = document.getElementById('statusFilter').value;
        const search = document.getElementById('searchFilter').value.toLowerCase();

        // Here you would typically make an AJAX call to filter partners
        console.log('Applying filters:', { type, status, search });

        Swal.fire({
            title: 'Filtres appliqués',
            text: 'La liste des partenaires a été mise à jour.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    }

    // Partner actions
    function viewPartnerDetails(partnerId) {
        // Open detailed view modal or redirect
        Swal.fire({
            title: 'Détails du partenaire',
            text: 'Ouverture de la fiche détaillée...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function contactPartner(partnerId) {
        // Open messaging or email interface
        Swal.fire({
            title: 'Contacter le partenaire',
            text: 'Ouverture de la messagerie...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function viewContracts(partnerId) {
        // Show partner contracts
        Swal.fire({
            title: 'Contrats du partenaire',
            text: 'Chargement des contrats...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function newCollaboration(partnerId) {
        // Start new collaboration
        Swal.fire({
            title: 'Nouvelle collaboration',
            text: 'Création d\'un nouveau projet collaboratif...',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function continueNegotiation(partnerId) {
        // Continue contract negotiation
        Swal.fire({
            title: 'Poursuivre les négociations',
            text: 'Ouverture de l\'interface de négociation...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function negotiateContract(partnerId) {
        // Start contract negotiation
        Swal.fire({
            title: 'Négociation de contrat',
            text: 'Démarrage des négociations...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    // Quick actions
    function viewContracts() {
        window.location.href = '#contracts'; // Replace with actual route
    }

    function viewFinances() {
        window.location.href = '#finances'; // Replace with actual route
    }

    function viewProjects() {
        window.location.href = '#projects'; // Replace with actual route
    }

    function viewReports() {
        window.location.href = '#reports'; // Replace with actual route
    }

    // Load more partners
    function loadMorePartners() {
        Swal.fire({
            title: 'Chargement...',
            text: 'Récupération de partenaires supplémentaires...',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }

    // Save new partner
    function saveNewPartner() {
        const form = document.getElementById('newPartnerForm');
        const formData = new FormData(form);

        // Basic validation
        const requiredFields = ['partnerName', 'partnerType', 'contactName', 'contactEmail', 'contactPhone'];
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
            $('#newPartnerModal').modal('hide');
            form.reset();

            Swal.fire({
                title: 'Partenaire créé !',
                text: 'Le nouveau partenaire a été ajouté avec succès.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                // Refresh partner list
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

    // Export functions
    function exportPartners() {
        Swal.fire({
            title: 'Export en cours...',
            text: 'Génération de la liste des partenaires...',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function importPartners() {
        Swal.fire({
            title: 'Import de partenaires',
            text: 'Sélectionnez un fichier CSV ou Excel...',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }

    // Initialize search functionality
    document.getElementById('searchFilter').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        // Filter visible partner cards based on search term
        // This would typically be handled by server-side filtering
    });

    // Mobile responsiveness
    function handleMobileView() {
        if (window.innerWidth < 768) {
            // Adjust layout for mobile
            document.querySelectorAll('.btn-group-sm').forEach(group => {
                group.classList.add('d-flex');
            });
        }
    }

    // Handle window resize
    window.addEventListener('resize', handleMobileView);

    // Initial mobile check
    handleMobileView();
</script>
@endsection
