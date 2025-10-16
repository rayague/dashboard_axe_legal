@extends('dashboard.layout')

@section('title', 'Gestion du Contenu - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-newspaper text-primary mr-2"></i>
            Gestion du Contenu
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contenu</li>
                </ol>
            </nav>
            <div class="btn-group btn-group-sm">
                <button class="btn btn-primary" data-toggle="modal" data-target="#newContentModal">
                    <i class="fas fa-plus mr-1"></i>
                    <span class="d-none d-sm-inline">Nouveau Contenu</span>
                    <span class="d-sm-none">Nouveau</span>
                </button>
                <button class="btn btn-outline-success" onclick="manageCategories()">
                    <i class="fas fa-tags mr-1"></i>
                    <span class="d-none d-sm-inline">Catégories</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Articles Publiés</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">127</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Vues Totales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">45,324</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-eye fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Brouillons</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-edit fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Engagement Moyen</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">87%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 87%"></div>
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

    <!-- Content Types & Quick Actions -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-layer-group mr-2"></i>
                        Types de Contenu
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="content-type-card" onclick="filterByType('article')">
                                <div class="card border-left-primary h-100">
                                    <div class="card-body text-center py-4">
                                        <i class="fas fa-newspaper fa-3x text-primary mb-3"></i>
                                        <h6 class="font-weight-bold text-primary">Articles Juridiques</h6>
                                        <div class="text-muted small">67 articles</div>
                                        <div class="mt-2">
                                            <span class="badge badge-primary">15 cette semaine</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="content-type-card" onclick="filterByType('actualite')">
                                <div class="card border-left-success h-100">
                                    <div class="card-body text-center py-4">
                                        <i class="fas fa-bullhorn fa-3x text-success mb-3"></i>
                                        <h6 class="font-weight-bold text-success">Actualités</h6>
                                        <div class="text-muted small">34 actualités</div>
                                        <div class="mt-2">
                                            <span class="badge badge-success">8 cette semaine</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="content-type-card" onclick="filterByType('guide')">
                                <div class="card border-left-info h-100">
                                    <div class="card-body text-center py-4">
                                        <i class="fas fa-book fa-3x text-info mb-3"></i>
                                        <h6 class="font-weight-bold text-info">Guides Pratiques</h6>
                                        <div class="text-muted small">18 guides</div>
                                        <div class="mt-2">
                                            <span class="badge badge-info">3 cette semaine</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="content-type-card" onclick="filterByType('documentation')">
                                <div class="card border-left-warning h-100">
                                    <div class="card-body text-center py-4">
                                        <i class="fas fa-folder-open fa-3x text-warning mb-3"></i>
                                        <h6 class="font-weight-bold text-warning">Documentation</h6>
                                        <div class="text-muted small">8 documents</div>
                                        <div class="mt-2">
                                            <span class="badge badge-warning">2 cette semaine</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <!-- Popular Content -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-fire mr-2"></i>
                        Contenu Populaire
                    </h6>
                </div>
                <div class="card-body">
                    <div class="popular-content-list">
                        <div class="popular-item mb-3 p-2 border-left-success">
                            <h6 class="font-weight-bold mb-1">Nouveau Code du Travail 2025</h6>
                            <div class="small text-muted mb-1">
                                <i class="fas fa-eye mr-1"></i>2,456 vues • 
                                <i class="fas fa-thumbs-up mr-1"></i>127 likes
                            </div>
                            <div class="small text-success">
                                <i class="fas fa-trending-up mr-1"></i>+15% cette semaine
                            </div>
                        </div>

                        <div class="popular-item mb-3 p-2 border-left-primary">
                            <h6 class="font-weight-bold mb-1">Guide Création d'Entreprise</h6>
                            <div class="small text-muted mb-1">
                                <i class="fas fa-eye mr-1"></i>1,987 vues • 
                                <i class="fas fa-thumbs-up mr-1"></i>98 likes
                            </div>
                            <div class="small text-primary">
                                <i class="fas fa-chart-line mr-1"></i>Stable
                            </div>
                        </div>

                        <div class="popular-item mb-3 p-2 border-left-info">
                            <h6 class="font-weight-bold mb-1">Fiscalité Numérique UEMOA</h6>
                            <div class="small text-muted mb-1">
                                <i class="fas fa-eye mr-1"></i>1,654 vues • 
                                <i class="fas fa-thumbs-up mr-1"></i>89 likes
                            </div>
                            <div class="small text-info">
                                <i class="fas fa-arrow-up mr-1"></i>+8% cette semaine
                            </div>
                        </div>

                        <div class="popular-item mb-3 p-2 border-left-warning">
                            <h6 class="font-weight-bold mb-1">Contrats de Partenariat</h6>
                            <div class="small text-muted mb-1">
                                <i class="fas fa-eye mr-1"></i>1,234 vues • 
                                <i class="fas fa-thumbs-up mr-1"></i>67 likes
                            </div>
                            <div class="small text-warning">
                                <i class="fas fa-minus mr-1"></i>-2% cette semaine
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button class="btn btn-outline-success btn-sm" onclick="viewAnalytics()">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Voir les analyses
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Management Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table mr-2"></i>
                Gestion du Contenu
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <div class="dropdown-header">Actions en masse:</div>
                    <a class="dropdown-item" href="#" onclick="bulkPublish()">
                        <i class="fas fa-globe fa-sm fa-fw mr-2 text-gray-400"></i>
                        Publier sélection
                    </a>
                    <a class="dropdown-item" href="#" onclick="bulkArchive()">
                        <i class="fas fa-archive fa-sm fa-fw mr-2 text-gray-400"></i>
                        Archiver sélection
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="exportContent()">
                        <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                        Exporter
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
                        <option value="article">Article</option>
                        <option value="actualite">Actualité</option>
                        <option value="guide">Guide</option>
                        <option value="documentation">Documentation</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 mb-2">
                    <select class="form-control form-control-sm" id="statusFilter">
                        <option value="">Tous les statuts</option>
                        <option value="publie">Publié</option>
                        <option value="brouillon">Brouillon</option>
                        <option value="revision">En révision</option>
                        <option value="archive">Archivé</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 mb-2">
                    <select class="form-control form-control-sm" id="categoryFilter">
                        <option value="">Toutes catégories</option>
                        <option value="droit-affaires">Droit des affaires</option>
                        <option value="droit-travail">Droit du travail</option>
                        <option value="droit-famille">Droit de la famille</option>
                        <option value="fiscalite">Fiscalité</option>
                        <option value="legal-tech">Legal Tech</option>
                    </select>
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
                <table class="table table-hover" id="contentTable" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th width="30">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="selectAll">
                                    <label class="custom-control-label" for="selectAll"></label>
                                </div>
                            </th>
                            <th>Titre</th>
                            <th class="d-none d-md-table-cell">Type</th>
                            <th class="d-none d-lg-table-cell">Catégorie</th>
                            <th class="d-none d-md-table-cell">Auteur</th>
                            <th>Date</th>
                            <th class="d-none d-lg-table-cell">Vues</th>
                            <th>Statut</th>
                            <th class="d-none d-lg-table-cell">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input content-checkbox" id="content1">
                                    <label class="custom-control-label" for="content1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="font-weight-bold">Nouveau Code du Travail 2025</div>
                                <div class="small text-muted">Analyse des principales modifications...</div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <span class="badge badge-primary">Article</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <span class="badge badge-outline-info">Droit du travail</span>
                            </td>
                            <td class="d-none d-md-table-cell">Me Marie Dubois</td>
                            <td>
                                <div class="font-weight-bold">28/09/2025</div>
                                <div class="small text-muted">14h30</div>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="font-weight-bold text-success">2,456</div>
                                <div class="small text-muted">+15% ↗</div>
                            </td>
                            <td>
                                <span class="badge badge-success">Publié</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewContent('content-1')" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="editContent('content-1')" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="duplicateContent('content-1')" title="Dupliquer">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input content-checkbox" id="content2">
                                    <label class="custom-control-label" for="content2"></label>
                                </div>
                            </td>
                            <td>
                                <div class="font-weight-bold">Guide Création d'Entreprise au Bénin</div>
                                <div class="small text-muted">Procédures simplifiées étape par étape...</div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <span class="badge badge-info">Guide</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <span class="badge badge-outline-primary">Droit des affaires</span>
                            </td>
                            <td class="d-none d-md-table-cell">Me Pierre Martin</td>
                            <td>
                                <div class="font-weight-bold">25/09/2025</div>
                                <div class="small text-muted">10h15</div>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="font-weight-bold text-primary">1,987</div>
                                <div class="small text-muted">Stable</div>
                            </td>
                            <td>
                                <span class="badge badge-success">Publié</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewContent('content-2')" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="editContent('content-2')" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="duplicateContent('content-2')" title="Dupliquer">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input content-checkbox" id="content3">
                                    <label class="custom-control-label" for="content3"></label>
                                </div>
                            </td>
                            <td>
                                <div class="font-weight-bold">Fiscalité Numérique en Zone UEMOA</div>
                                <div class="small text-muted">Impact des nouvelles réglementations...</div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <span class="badge badge-success">Actualité</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <span class="badge badge-outline-warning">Fiscalité</span>
                            </td>
                            <td class="d-none d-md-table-cell">Me Sophie Bernard</td>
                            <td>
                                <div class="font-weight-bold">22/09/2025</div>
                                <div class="small text-muted">16h45</div>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="font-weight-bold text-info">1,654</div>
                                <div class="small text-muted">+8% ↗</div>
                            </td>
                            <td>
                                <span class="badge badge-success">Publié</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewContent('content-3')" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="editContent('content-3')" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="duplicateContent('content-3')" title="Dupliquer">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input content-checkbox" id="content4">
                                    <label class="custom-control-label" for="content4"></label>
                                </div>
                            </td>
                            <td>
                                <div class="font-weight-bold">Modèles de Contrats 2025</div>
                                <div class="small text-muted">Brouillon - Collection mise à jour...</div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <span class="badge badge-warning">Documentation</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <span class="badge badge-outline-secondary">Général</span>
                            </td>
                            <td class="d-none d-md-table-cell">Me Jean Dupont</td>
                            <td>
                                <div class="font-weight-bold">20/09/2025</div>
                                <div class="small text-muted">09h30</div>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="text-muted">-</div>
                                <div class="small text-muted">Non publié</div>
                            </td>
                            <td>
                                <span class="badge badge-warning">Brouillon</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="previewContent('content-4')" title="Aperçu">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="editContent('content-4')" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="publishContent('content-4')" title="Publier">
                                        <i class="fas fa-globe"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- New Content Modal -->
    <div class="modal fade" id="newContentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-plus mr-2"></i>
                        Nouveau Contenu
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="newContentForm">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="contentTitle" class="font-weight-bold">Titre *</label>
                                    <input type="text" class="form-control" id="contentTitle" required>
                                </div>

                                <div class="form-group">
                                    <label for="contentExcerpt" class="font-weight-bold">Résumé</label>
                                    <textarea class="form-control" id="contentExcerpt" rows="2" placeholder="Courte description du contenu..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="contentBody" class="font-weight-bold">Contenu *</label>
                                    <div id="contentEditor" style="height: 400px;">
                                        <!-- Rich text editor will be loaded here -->
                                    </div>
                                    <textarea class="form-control d-none" id="contentBody" rows="15" required></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contentTags" class="font-weight-bold">Mots-clés</label>
                                            <input type="text" class="form-control" id="contentTags" placeholder="Séparez par des virgules">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contentSource" class="font-weight-bold">Source/Référence</label>
                                            <input type="text" class="form-control" id="contentSource" placeholder="URL ou référence">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-lg-4">
                                <h6 class="font-weight-bold text-primary mb-3">
                                    <i class="fas fa-cogs mr-2"></i>Configuration
                                </h6>

                                <div class="form-group">
                                    <label for="contentType" class="font-weight-bold">Type *</label>
                                    <select class="form-control" id="contentType" required>
                                        <option value="">Sélectionner</option>
                                        <option value="article">Article juridique</option>
                                        <option value="actualite">Actualité</option>
                                        <option value="guide">Guide pratique</option>
                                        <option value="documentation">Documentation</option>
                                        <option value="case-study">Étude de cas</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="contentCategory" class="font-weight-bold">Catégorie *</label>
                                    <select class="form-control" id="contentCategory" required>
                                        <option value="">Sélectionner</option>
                                        <option value="droit-affaires">Droit des affaires</option>
                                        <option value="droit-travail">Droit du travail</option>
                                        <option value="droit-famille">Droit de la famille</option>
                                        <option value="droit-penal">Droit pénal</option>
                                        <option value="fiscalite">Fiscalité</option>
                                        <option value="legal-tech">Legal Tech</option>
                                        <option value="immobilier">Immobilier</option>
                                        <option value="international">Droit international</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="contentAuthor" class="font-weight-bold">Auteur</label>
                                    <select class="form-control" id="contentAuthor">
                                        <option value="">Sélectionner</option>
                                        <option value="marie-dubois">Me Marie Dubois</option>
                                        <option value="pierre-martin">Me Pierre Martin</option>
                                        <option value="sophie-bernard">Me Sophie Bernard</option>
                                        <option value="jean-dupont">Me Jean Dupont</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="contentStatus" class="font-weight-bold">Statut</label>
                                    <select class="form-control" id="contentStatus">
                                        <option value="brouillon">Brouillon</option>
                                        <option value="revision">En révision</option>
                                        <option value="publie">Publier immédiatement</option>
                                        <option value="programme">Programmé</option>
                                    </select>
                                </div>

                                <div class="form-group" id="publishDateGroup" style="display: none;">
                                    <label for="publishDate" class="font-weight-bold">Date de publication</label>
                                    <input type="datetime-local" class="form-control" id="publishDate">
                                </div>

                                <div class="form-group">
                                    <label for="featuredImage" class="font-weight-bold">Image à la une</label>
                                    <input type="file" class="form-control-file" id="featuredImage" accept="image/*">
                                    <small class="form-text text-muted">Format recommandé: 1200x600px</small>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Options</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="allowComments">
                                        <label class="custom-control-label" for="allowComments">Autoriser les commentaires</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="featuredContent">
                                        <label class="custom-control-label" for="featuredContent">Contenu mis en avant</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="sendNotification">
                                        <label class="custom-control-label" for="sendNotification">Notifier les abonnés</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="readingTime" class="font-weight-bold">Temps de lecture (min)</label>
                                    <input type="number" class="form-control" id="readingTime" min="1" placeholder="Auto-calculé">
                                </div>

                                <div class="form-group">
                                    <label for="contentPriority" class="font-weight-bold">Priorité</label>
                                    <select class="form-control" id="contentPriority">
                                        <option value="normale">Normale</option>
                                        <option value="haute">Haute</option>
                                        <option value="urgente">Urgente</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-outline-primary" onclick="saveDraftContent()">
                        <i class="fas fa-save mr-1"></i>
                        Sauvegarder brouillon
                    </button>
                    <button type="button" class="btn btn-primary" onclick="saveNewContent()">
                        <i class="fas fa-check mr-1"></i>
                        Créer le contenu
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<!-- Quill Editor CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<style>
    .content-type-card {
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .content-type-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    
    .popular-item {
        transition: all 0.2s;
        border-radius: 5px;
    }
    
    .popular-item:hover {
        transform: translateX(5px);
        background-color: #f8f9fc;
    }
    
    .badge-outline-primary {
        color: #007bff;
        border: 1px solid #007bff;
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
    
    .badge-outline-secondary {
        color: #6c757d;
        border: 1px solid #6c757d;
        background-color: transparent;
    }
    
    #contentEditor {
        border: 1px solid #d1d3e2;
        border-radius: 0.35rem;
    }
    
    .ql-toolbar {
        border-top: 1px solid #d1d3e2;
        border-left: 1px solid #d1d3e2;
        border-right: 1px solid #d1d3e2;
        border-bottom: none;
    }
    
    .ql-container {
        border-left: 1px solid #d1d3e2;
        border-right: 1px solid #d1d3e2;
        border-bottom: 1px solid #d1d3e2;
        border-top: none;
    }
    
    @media (max-width: 768px) {
        .btn-group-sm .btn {
            padding: 0.25rem 0.4rem;
            font-size: 0.7rem;
        }
        
        .content-type-card {
            margin-bottom: 1rem;
        }
    }
</style>
@endsection

@section('scripts')
<!-- Quill Editor JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
    let quill;
    
    // Initialize Quill editor
    $(document).ready(function() {
        // Initialize DataTable
        $('#contentTable').DataTable({
            "order": [[ 5, "desc" ]],
            "pageLength": 15,
            "responsive": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            }
        });
        
        // Initialize Quill when modal opens
        $('#newContentModal').on('shown.bs.modal', function () {
            if (!quill) {
                quill = new Quill('#contentEditor', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{ 'color': [] }, { 'background': [] }],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            [{ 'indent': '-1'}, { 'indent': '+1' }],
                            [{ 'align': [] }],
                            ['link', 'image', 'video'],
                            ['blockquote', 'code-block'],
                            ['clean']
                        ]
                    }
                });
                
                // Sync Quill content with hidden textarea
                quill.on('text-change', function() {
                    document.getElementById('contentBody').value = quill.root.innerHTML;
                });
            }
        });
    });

    // Content status change handler
    document.getElementById('contentStatus').addEventListener('change', function() {
        const publishDateGroup = document.getElementById('publishDateGroup');
        if (this.value === 'programme') {
            publishDateGroup.style.display = 'block';
            document.getElementById('publishDate').required = true;
        } else {
            publishDateGroup.style.display = 'none';
            document.getElementById('publishDate').required = false;
        }
    });

    // Filter functions
    function filterByType(type) {
        document.getElementById('typeFilter').value = type;
        applyFilters();
    }

    function applyFilters() {
        const type = document.getElementById('typeFilter').value;
        const status = document.getElementById('statusFilter').value;
        const category = document.getElementById('categoryFilter').value;
        const search = document.getElementById('searchFilter').value;
        
        const table = $('#contentTable').DataTable();
        
        // Clear previous search
        table.search('').columns().search('').draw();
        
        // Apply individual column filters
        if (type) {
            table.column(2).search(type);
        }
        if (status) {
            table.column(7).search(status);
        }
        if (category) {
            table.column(3).search(category);
        }
        if (search) {
            table.search(search);
        }
        
        table.draw();
        
        Swal.fire({
            title: 'Filtres appliqués',
            text: 'La liste du contenu a été mise à jour.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function resetFilters() {
        document.getElementById('typeFilter').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('categoryFilter').value = '';
        document.getElementById('searchFilter').value = '';
        
        $('#contentTable').DataTable().search('').columns().search('').draw();
    }

    // Content actions
    function viewContent(contentId) {
        Swal.fire({
            title: 'Affichage du contenu',
            text: 'Ouverture en mode lecture...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function editContent(contentId) {
        Swal.fire({
            title: 'Modification du contenu',
            text: 'Ouverture de l\'éditeur...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function duplicateContent(contentId) {
        Swal.fire({
            title: 'Dupliquer le contenu ?',
            text: 'Une copie sera créée en mode brouillon.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Oui, dupliquer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire('Dupliqué !', 'Le contenu a été copié avec succès.', 'success');
            }
        });
    }

    function previewContent(contentId) {
        Swal.fire({
            title: 'Aperçu du contenu',
            text: 'Ouverture de l\'aperçu...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function publishContent(contentId) {
        Swal.fire({
            title: 'Publier le contenu ?',
            text: 'Le contenu sera visible publiquement.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Oui, publier',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire('Publié !', 'Le contenu est maintenant en ligne.', 'success');
            }
        });
    }

    // Bulk actions
    function bulkPublish() {
        const selected = document.querySelectorAll('.content-checkbox:checked').length;
        if (selected === 0) {
            Swal.fire('Aucune sélection', 'Veuillez sélectionner au moins un élément.', 'warning');
            return;
        }
        
        Swal.fire({
            title: `Publier ${selected} élément(s) ?`,
            text: 'Ces contenus seront visibles publiquement.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Oui, publier',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire('Publié !', `${selected} contenu(s) publié(s) avec succès.`, 'success');
            }
        });
    }

    function bulkArchive() {
        const selected = document.querySelectorAll('.content-checkbox:checked').length;
        if (selected === 0) {
            Swal.fire('Aucune sélection', 'Veuillez sélectionner au moins un élément.', 'warning');
            return;
        }
        
        Swal.fire({
            title: `Archiver ${selected} élément(s) ?`,
            text: 'Ces contenus ne seront plus visibles publiquement.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, archiver',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire('Archivé !', `${selected} contenu(s) archivé(s) avec succès.`, 'success');
            }
        });
    }

    // Utility functions
    function manageCategories() {
        Swal.fire({
            title: 'Gestion des catégories',
            text: 'Ouverture du gestionnaire de catégories...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function viewAnalytics() {
        Swal.fire({
            title: 'Analyses de contenu',
            text: 'Ouverture des statistiques détaillées...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function exportContent() {
        Swal.fire({
            title: 'Export en cours...',
            text: 'Génération du fichier d\'export...',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }

    // Select all checkbox functionality
    document.getElementById('selectAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.content-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    // Auto-calculate reading time based on content length
    function calculateReadingTime() {
        if (quill) {
            const text = quill.getText();
            const wordsPerMinute = 200;
            const wordCount = text.trim().split(/\s+/).length;
            const readingTime = Math.ceil(wordCount / wordsPerMinute);
            document.getElementById('readingTime').value = readingTime;
        }
    }

    // Form validation and submission
    function saveNewContent() {
        const form = document.getElementById('newContentForm');
        const requiredFields = ['contentTitle', 'contentType', 'contentCategory'];
        let isValid = true;
        
        // Sync Quill content
        if (quill) {
            document.getElementById('contentBody').value = quill.root.innerHTML;
        }
        
        // Validate required fields
        requiredFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        // Validate content body
        if (!document.getElementById('contentBody').value.trim()) {
            Swal.fire('Erreur', 'Le contenu ne peut pas être vide.', 'error');
            isValid = false;
        }
        
        if (isValid) {
            $('#newContentModal').modal('hide');
            form.reset();
            if (quill) {
                quill.setContents([]);
            }
            
            Swal.fire({
                title: 'Contenu créé !',
                text: 'Le nouveau contenu a été enregistré avec succès.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                // Refresh content list
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

    function saveDraftContent() {
        // Sync Quill content
        if (quill) {
            document.getElementById('contentBody').value = quill.root.innerHTML;
        }
        
        Swal.fire({
            title: 'Brouillon sauvegardé',
            text: 'Vous pouvez reprendre la rédaction plus tard.',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    }

    // Auto-save functionality (every 2 minutes)
    setInterval(function() {
        if (quill && quill.getLength() > 1) {
            console.log('Auto-sauvegarde du brouillon...');
            // Here you would typically save to server
        }
    }, 120000);
</script>
@endsection