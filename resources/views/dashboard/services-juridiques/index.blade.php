@extends('dashboard.layout')

@section('title', 'Services Juridiques - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-balance-scale text-primary mr-2"></i>
            Services Juridiques
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Services Juridiques</li>
                </ol>
            </nav>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addServiceModal">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouveau Service</span>
                <span class="d-sm-none">Ajouter</span>
            </button>
        </div>
    </div>

    <!-- Statistics Overview -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Services Actifs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Demandes Ce Mois</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">847</div>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Revenus Générés</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8.4M FCFA</div>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Satisfaction</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">94%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 94%"></div>
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

    <!-- Services Categories -->
    <div class="row mb-4">
        <div class="col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-gavel mr-2"></i>
                        Droit Civil
                    </h6>
                    <span class="badge badge-primary badge-counter">156</span>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Services disponibles</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">4 services</div>
                        </div>
                    </div>
                    <ul class="list-unstyled mb-3">
                        <li><i class="fas fa-check text-success mr-2"></i>Contrats et obligations</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Responsabilité civile</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Droit immobilier</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Droit des successions</li>
                    </ul>
                    <div class="text-center">
                        <button class="btn btn-primary btn-sm" onclick="manageCategory('civil')">
                            <i class="fas fa-cog mr-1"></i>Gérer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-briefcase mr-2"></i>
                        Droit Commercial
                    </h6>
                    <span class="badge badge-success badge-counter">203</span>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Services disponibles</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">5 services</div>
                        </div>
                    </div>
                    <ul class="list-unstyled mb-3">
                        <li><i class="fas fa-check text-success mr-2"></i>Création d'entreprises</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Contrats commerciaux</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Recouvrement de créances</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Droit des sociétés</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Propriété intellectuelle</li>
                    </ul>
                    <div class="text-center">
                        <button class="btn btn-success btn-sm" onclick="manageCategory('commercial')">
                            <i class="fas fa-cog mr-1"></i>Gérer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Droit Pénal
                    </h6>
                    <span class="badge badge-danger badge-counter">89</span>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Services disponibles</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">3 services</div>
                        </div>
                    </div>
                    <ul class="list-unstyled mb-3">
                        <li><i class="fas fa-check text-success mr-2"></i>Défense pénale</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Assistance garde à vue</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Appels et cassation</li>
                    </ul>
                    <div class="text-center">
                        <button class="btn btn-danger btn-sm" onclick="manageCategory('penal')">
                            <i class="fas fa-cog mr-1"></i>Gérer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-warning">
                        <i class="fas fa-users mr-2"></i>
                        Droit du Travail
                    </h6>
                    <span class="badge badge-warning badge-counter">124</span>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Services disponibles</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">4 services</div>
                        </div>
                    </div>
                    <ul class="list-unstyled mb-3">
                        <li><i class="fas fa-check text-success mr-2"></i>Licenciements</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Harcèlement</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Accidents du travail</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Négociation collective</li>
                    </ul>
                    <div class="text-center">
                        <button class="btn btn-warning btn-sm" onclick="manageCategory('travail')">
                            <i class="fas fa-cog mr-1"></i>Gérer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-heart mr-2"></i>
                        Droit de la Famille
                    </h6>
                    <span class="badge badge-info badge-counter">275</span>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Services disponibles</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">5 services</div>
                        </div>
                    </div>
                    <ul class="list-unstyled mb-3">
                        <li><i class="fas fa-check text-success mr-2"></i>Divorces</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Garde d'enfants</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Pensions alimentaires</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Adoptions</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Tutelles</li>
                    </ul>
                    <div class="text-center">
                        <button class="btn btn-info btn-sm" onclick="manageCategory('famille')">
                            <i class="fas fa-cog mr-1"></i>Gérer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-secondary">
                        <i class="fas fa-plus mr-2"></i>
                        Autres Services
                    </h6>
                    <span class="badge badge-secondary badge-counter">45</span>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Services disponibles</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">3 services</div>
                        </div>
                    </div>
                    <ul class="list-unstyled mb-3">
                        <li><i class="fas fa-check text-success mr-2"></i>Droit administratif</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Droit fiscal</li>
                        <li><i class="fas fa-check text-success mr-2"></i>Médiation</li>
                    </ul>
                    <div class="text-center">
                        <button class="btn btn-secondary btn-sm" onclick="manageCategory('autres')">
                            <i class="fas fa-cog mr-1"></i>Gérer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services List -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-list-ul mr-2"></i>
                Liste des Services Juridiques
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <div class="dropdown-header">Actions:</div>
                    <a class="dropdown-item" href="#" onclick="exportServices()">
                        <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                        Exporter
                    </a>
                    <a class="dropdown-item" href="#" onclick="printServices()">
                        <i class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i>
                        Imprimer
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="bulkUpdate()">
                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                        Modification groupée
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Filter Section -->
            <div class="row mb-3">
                <div class="col-md-3 mb-2">
                    <select class="form-control" id="categoryFilter">
                        <option value="">Toutes les catégories</option>
                        <option value="civil">Droit Civil</option>
                        <option value="commercial">Droit Commercial</option>
                        <option value="penal">Droit Pénal</option>
                        <option value="travail">Droit du Travail</option>
                        <option value="famille">Droit de la Famille</option>
                        <option value="autres">Autres</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <select class="form-control" id="statusFilter">
                        <option value="">Tous les statuts</option>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                        <option value="draft">Brouillon</option>
                    </select>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="Rechercher un service...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2">
                    <button class="btn btn-secondary btn-block" onclick="resetFilters()">
                        <i class="fas fa-undo mr-1"></i>Reset
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="servicesTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Durée Moy.</th>
                            <th>Demandes</th>
                            <th>Satisfaction</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-primary text-white rounded-circle">
                                            <i class="fas fa-file-contract"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <strong>Rédaction de contrats</strong><br>
                                        <small class="text-muted">Contrats commerciaux et civils</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-primary">Droit Civil</span></td>
                            <td><strong>75,000 FCFA</strong></td>
                            <td>3-5 jours</td>
                            <td><span class="badge badge-success">156</span></td>
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
                            <td><span class="badge badge-success">Actif</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewService(1)" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editService(1)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="duplicateService(1)" title="Dupliquer">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-success text-white rounded-circle">
                                            <i class="fas fa-building"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <strong>Création d'entreprise</strong><br>
                                        <small class="text-muted">SARL, SA, SAS, etc.</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">Droit Commercial</span></td>
                            <td><strong>250,000 FCFA</strong></td>
                            <td>7-10 jours</td>
                            <td><span class="badge badge-success">203</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">4.9</span>
                                    <div>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">Actif</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewService(2)" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editService(2)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="duplicateService(2)" title="Dupliquer">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-danger text-white rounded-circle">
                                            <i class="fas fa-shield-alt"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <strong>Défense pénale</strong><br>
                                        <small class="text-muted">Assistance devant les tribunaux</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-danger">Droit Pénal</span></td>
                            <td><strong>Sur devis</strong></td>
                            <td>Variable</td>
                            <td><span class="badge badge-warning">89</span></td>
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
                            <td><span class="badge badge-success">Actif</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewService(3)" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editService(3)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="duplicateService(3)" title="Dupliquer">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-info text-white rounded-circle">
                                            <i class="fas fa-heart"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <strong>Procédure de divorce</strong><br>
                                        <small class="text-muted">Divorce par consentement mutuel</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-info">Droit Famille</span></td>
                            <td><strong>150,000 FCFA</strong></td>
                            <td>2-4 semaines</td>
                            <td><span class="badge badge-success">275</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">4.6</span>
                                    <div>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">Actif</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewService(4)" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editService(4)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="duplicateService(4)" title="Dupliquer">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <span class="avatar-title bg-warning text-white rounded-circle">
                                            <i class="fas fa-users"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <strong>Licenciement abusif</strong><br>
                                        <small class="text-muted">Défense des salariés</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-warning">Droit Travail</span></td>
                            <td><strong>100,000 FCFA</strong></td>
                            <td>1-3 mois</td>
                            <td><span class="badge badge-warning">124</span></td>
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
                            <td><span class="badge badge-success">Actif</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm" onclick="viewService(5)" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editService(5)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="duplicateService(5)" title="Dupliquer">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-line mr-2"></i>
                        Performance des Services
                    </h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="servicesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        Actions Rapides
                    </h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" onclick="newServiceQuick()">
                            <div>
                                <i class="fas fa-plus-circle text-primary mr-2"></i>
                                <strong>Nouveau Service</strong><br>
                                <small class="text-muted">Créer un nouveau service juridique</small>
                            </div>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" onclick="viewAnalytics()">
                            <div>
                                <i class="fas fa-chart-bar text-success mr-2"></i>
                                <strong>Analyses Détaillées</strong><br>
                                <small class="text-muted">Voir les statistiques avancées</small>
                            </div>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" onclick="managePricing()">
                            <div>
                                <i class="fas fa-tags text-warning mr-2"></i>
                                <strong>Gestion des Tarifs</strong><br>
                                <small class="text-muted">Modifier les prix des services</small>
                            </div>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" onclick="clientFeedback()">
                            <div>
                                <i class="fas fa-comments text-info mr-2"></i>
                                <strong>Retours Clients</strong><br>
                                <small class="text-muted">Consulter les avis et suggestions</small>
                            </div>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Nouveau Service -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addServiceModalLabel">
                        <i class="fas fa-plus mr-2"></i>
                        Nouveau Service Juridique
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addServiceForm">
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="serviceName" class="form-label">Nom du service</label>
                                <input type="text" class="form-control" id="serviceName" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="serviceCategory" class="form-label">Catégorie</label>
                                <select class="form-control" id="serviceCategory" required>
                                    <option value="">Sélectionner</option>
                                    <option value="civil">Droit Civil</option>
                                    <option value="commercial">Droit Commercial</option>
                                    <option value="penal">Droit Pénal</option>
                                    <option value="travail">Droit du Travail</option>
                                    <option value="famille">Droit de la Famille</option>
                                    <option value="autres">Autres</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="serviceDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="serviceDescription" rows="3" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="servicePrice" class="form-label">Prix (FCFA)</label>
                                <input type="number" class="form-control" id="servicePrice" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="serviceDuration" class="form-label">Durée estimée</label>
                                <input type="text" class="form-control" id="serviceDuration" placeholder="ex: 3-5 jours">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="serviceStatus" class="form-label">Statut</label>
                                <select class="form-control" id="serviceStatus">
                                    <option value="active">Actif</option>
                                    <option value="inactive">Inactif</option>
                                    <option value="draft">Brouillon</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="serviceRequirements" class="form-label">Documents requis</label>
                            <textarea class="form-control" id="serviceRequirements" rows="2" placeholder="Liste des documents nécessaires"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="onlineConsultation">
                                    <label class="form-check-label" for="onlineConsultation">
                                        Consultation en ligne disponible
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="urgentService">
                                    <label class="form-check-label" for="urgentService">
                                        Service d'urgence disponible
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
                    <button type="button" class="btn btn-primary" onclick="submitService()">
                        <i class="fas fa-save mr-1"></i>Enregistrer
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
        $('#servicesTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 4, "desc" ]], // Sort by requests count
            "pageLength": 10
        });

        // Initialize chart
        initializeServicesChart();
    });

    // Services performance chart
    function initializeServicesChart() {
        var ctx = document.getElementById("servicesChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Déc"],
                datasets: [{
                    label: "Demandes",
                    data: [45, 52, 38, 67, 89, 78, 92, 87, 95, 102, 89, 94],
                    backgroundColor: "rgba(78, 115, 223, 0.1)",
                    borderColor: "rgba(78, 115, 223, 1)",
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
    }

    // Service management functions
    function viewService(id) {
        console.log('Viewing service:', id);
        // Implementation for viewing service details
    }

    function editService(id) {
        console.log('Editing service:', id);
        // Implementation for editing service
    }

    function duplicateService(id) {
        if (confirm('Dupliquer ce service ?')) {
            console.log('Duplicating service:', id);
            alert('Service dupliqué avec succès !');
        }
    }

    function manageCategory(category) {
        console.log('Managing category:', category);
        // Implementation for category management
    }

    // Quick actions
    function newServiceQuick() {
        $('#addServiceModal').modal('show');
    }

    function viewAnalytics() {
        console.log('Opening analytics view');
        // Implementation for analytics
    }

    function managePricing() {
        console.log('Opening pricing management');
        // Implementation for pricing management
    }

    function clientFeedback() {
        console.log('Opening client feedback');
        // Implementation for feedback management
    }

    // Form submission
    function submitService() {
        const form = document.getElementById('addServiceForm');
        if (form.checkValidity()) {
            // Implementation for form submission
            console.log('Submitting new service');
            alert('Service créé avec succès !');
            $('#addServiceModal').modal('hide');
            location.reload();
        } else {
            form.reportValidity();
        }
    }

    // Filter functions
    function resetFilters() {
        document.getElementById('categoryFilter').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('searchInput').value = '';
        $('#servicesTable').DataTable().search('').draw();
    }

    // Export functions
    function exportServices() {
        console.log('Exporting services');
        alert('Export en cours...');
    }

    function printServices() {
        window.print();
    }

    function bulkUpdate() {
        console.log('Opening bulk update');
        // Implementation for bulk updates
    }
</script>
@endsection
