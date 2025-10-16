@extends('dashboard.layout')

@section('title', 'Gestion Médiathèque - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-photo-video text-primary mr-2"></i>
            Gestion Médiathèque
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Contenu du Site</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Médiathèque</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#uploadModal">
                    <i class="fas fa-upload mr-1"></i>
                    <span class="d-none d-sm-inline">Upload</span>
                </button>
                <button type="button" class="btn btn-info btn-sm" onclick="previewMediatheque()">
                    <i class="fas fa-eye mr-1"></i>
                    <span class="d-none d-sm-inline">Aperçu</span>
                </button>
                <button type="button" class="btn btn-warning btn-sm" onclick="organizeMedia()">
                    <i class="fas fa-folder-tree mr-1"></i>
                    <span class="d-none d-sm-inline">Organiser</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Media Statistics -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Fichiers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">247</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Images</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">156</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-image fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Documents</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">78</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-pdf fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Espace Utilisé</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">67%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" style="width: 67%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hdd fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Media Management Interface -->
    <div class="row">
        <!-- Filters and Categories -->
        <div class="col-lg-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-filter mr-2"></i>
                        Filtres & Catégories
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Type de Fichier</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterImages" checked>
                            <label class="form-check-label" for="filterImages">
                                <i class="fas fa-image text-success mr-1"></i>Images (156)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterDocuments" checked>
                            <label class="form-check-label" for="filterDocuments">
                                <i class="fas fa-file-pdf text-danger mr-1"></i>Documents PDF (45)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterVideos">
                            <label class="form-check-label" for="filterVideos">
                                <i class="fas fa-video text-info mr-1"></i>Vidéos (8)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterOffice">
                            <label class="form-check-label" for="filterOffice">
                                <i class="fas fa-file-word text-primary mr-1"></i>Documents Office (25)
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Catégories</label>
                        <div class="category-tree">
                            <div class="category-item">
                                <i class="fas fa-folder text-warning mr-1"></i>
                                <span class="category-name">Images du Cabinet</span>
                                <small class="text-muted">(42)</small>
                            </div>
                            <div class="category-item ml-3">
                                <i class="fas fa-folder-open text-warning mr-1"></i>
                                <span class="category-name">Équipe</span>
                                <small class="text-muted">(12)</small>
                            </div>
                            <div class="category-item ml-3">
                                <i class="fas fa-folder-open text-warning mr-1"></i>
                                <span class="category-name">Bureaux</span>
                                <small class="text-muted">(18)</small>
                            </div>
                            <div class="category-item ml-3">
                                <i class="fas fa-folder-open text-warning mr-1"></i>
                                <span class="category-name">Événements</span>
                                <small class="text-muted">(12)</small>
                            </div>

                            <div class="category-item">
                                <i class="fas fa-folder text-warning mr-1"></i>
                                <span class="category-name">Documents Juridiques</span>
                                <small class="text-muted">(89)</small>
                            </div>
                            <div class="category-item ml-3">
                                <i class="fas fa-folder-open text-warning mr-1"></i>
                                <span class="category-name">Modèles Contrats</span>
                                <small class="text-muted">(23)</small>
                            </div>
                            <div class="category-item ml-3">
                                <i class="fas fa-folder-open text-warning mr-1"></i>
                                <span class="category-name">Jurisprudence</span>
                                <small class="text-muted">(31)</small>
                            </div>
                            <div class="category-item ml-3">
                                <i class="fas fa-folder-open text-warning mr-1"></i>
                                <span class="category-name">Formulaires</span>
                                <small class="text-muted">(35)</small>
                            </div>

                            <div class="category-item">
                                <i class="fas fa-folder text-warning mr-1"></i>
                                <span class="category-name">Ressources Client</span>
                                <small class="text-muted">(67)</small>
                            </div>
                            <div class="category-item ml-3">
                                <i class="fas fa-folder-open text-warning mr-1"></i>
                                <span class="category-name">Guides Pratiques</span>
                                <small class="text-muted">(24)</small>
                            </div>
                            <div class="category-item ml-3">
                                <i class="fas fa-folder-open text-warning mr-1"></i>
                                <span class="category-name">FAQ Juridiques</span>
                                <small class="text-muted">(15)</small>
                            </div>

                            <div class="category-item">
                                <i class="fas fa-folder text-warning mr-1"></i>
                                <span class="category-name">Marketing</span>
                                <small class="text-muted">(49)</small>
                            </div>
                            <div class="category-item ml-3">
                                <i class="fas fa-folder-open text-warning mr-1"></i>
                                <span class="category-name">Brochures</span>
                                <small class="text-muted">(16)</small>
                            </div>
                            <div class="category-item ml-3">
                                <i class="fas fa-folder-open text-warning mr-1"></i>
                                <span class="category-name">Logos & Identité</span>
                                <small class="text-muted">(33)</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Date d'ajout</label>
                        <select class="form-control">
                            <option value="all">Tous les fichiers</option>
                            <option value="today">Aujourd'hui</option>
                            <option value="week">Cette semaine</option>
                            <option value="month">Ce mois</option>
                            <option value="custom">Période personnalisée</option>
                        </select>
                    </div>

                    <button class="btn btn-outline-primary btn-sm btn-block" onclick="applyFilters()">
                        <i class="fas fa-search mr-1"></i>Appliquer Filtres
                    </button>
                </div>
            </div>
        </div>

        <!-- Media Grid -->
        <div class="col-lg-9">
            <!-- Search and Actions Bar -->
            <div class="card shadow mb-4">
                <div class="card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Rechercher dans la médiathèque..." id="mediaSearch">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" onclick="searchMedia()">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group mr-2">
                                    <button class="btn btn-outline-secondary btn-sm active" onclick="setViewMode('grid')" id="gridView">
                                        <i class="fas fa-th"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary btn-sm" onclick="setViewMode('list')" id="listView">
                                        <i class="fas fa-list"></i>
                                    </button>
                                </div>
                                <select class="form-control form-control-sm" style="width: auto;" onchange="sortMedia(this.value)">
                                    <option value="date_desc">Plus récent</option>
                                    <option value="date_asc">Plus ancien</option>
                                    <option value="name_asc">Nom A-Z</option>
                                    <option value="name_desc">Nom Z-A</option>
                                    <option value="size_desc">Taille décroissante</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Media Content -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-images mr-2"></i>
                        Fichiers Multimédias
                    </h6>
                    <div class="d-flex align-items-center">
                        <span class="text-muted mr-3">247 fichiers</span>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-outline-info" onclick="selectAllMedia()">
                                <i class="fas fa-check-square mr-1"></i>Tout sélectionner
                            </button>
                            <button class="btn btn-sm btn-outline-danger" onclick="deleteSelectedMedia()" disabled id="deleteSelected">
                                <i class="fas fa-trash mr-1"></i>Supprimer sélection
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="mediaGrid" class="media-grid">
                        <!-- Image Files -->
                        <div class="media-item" data-type="image" data-category="equipe">
                            <div class="media-card">
                                <div class="media-checkbox">
                                    <input type="checkbox" class="media-select" onchange="updateSelectionCount()">
                                </div>
                                <div class="media-thumbnail">
                                    <img src="{{ asset('images/team-placeholder.jpg') }}" alt="Photo équipe" class="img-fluid">
                                    <div class="media-overlay">
                                        <button class="btn btn-sm btn-primary" onclick="editMedia(this)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info" onclick="viewMedia(this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteMedia(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="media-info">
                                    <div class="media-name">equipe-cabinet-2024.jpg</div>
                                    <div class="media-details">
                                        <small class="text-muted">1.2 MB • 1920x1080 • 05/01/2025</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="media-item" data-type="image" data-category="bureaux">
                            <div class="media-card">
                                <div class="media-checkbox">
                                    <input type="checkbox" class="media-select" onchange="updateSelectionCount()">
                                </div>
                                <div class="media-thumbnail">
                                    <img src="{{ asset('images/office-placeholder.jpg') }}" alt="Bureau" class="img-fluid">
                                    <div class="media-overlay">
                                        <button class="btn btn-sm btn-primary" onclick="editMedia(this)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info" onclick="viewMedia(this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteMedia(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="media-info">
                                    <div class="media-name">bureau-principal.jpg</div>
                                    <div class="media-details">
                                        <small class="text-muted">856 KB • 1440x960 • 03/01/2025</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PDF Documents -->
                        <div class="media-item" data-type="document" data-category="modeles">
                            <div class="media-card">
                                <div class="media-checkbox">
                                    <input type="checkbox" class="media-select" onchange="updateSelectionCount()">
                                </div>
                                <div class="media-thumbnail document-thumbnail">
                                    <i class="fas fa-file-pdf fa-4x text-danger"></i>
                                    <div class="media-overlay">
                                        <button class="btn btn-sm btn-primary" onclick="editMedia(this)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info" onclick="viewMedia(this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteMedia(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="media-info">
                                    <div class="media-name">modele-contrat-bail.pdf</div>
                                    <div class="media-details">
                                        <small class="text-muted">245 KB • PDF • 02/01/2025</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="media-item" data-type="document" data-category="guides">
                            <div class="media-card">
                                <div class="media-checkbox">
                                    <input type="checkbox" class="media-select" onchange="updateSelectionCount()">
                                </div>
                                <div class="media-thumbnail document-thumbnail">
                                    <i class="fas fa-file-word fa-4x text-primary"></i>
                                    <div class="media-overlay">
                                        <button class="btn btn-sm btn-primary" onclick="editMedia(this)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info" onclick="viewMedia(this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteMedia(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="media-info">
                                    <div class="media-name">guide-divorce-procedure.docx</div>
                                    <div class="media-details">
                                        <small class="text-muted">156 KB • Word • 01/01/2025</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Video Files -->
                        <div class="media-item" data-type="video" data-category="marketing">
                            <div class="media-card">
                                <div class="media-checkbox">
                                    <input type="checkbox" class="media-select" onchange="updateSelectionCount()">
                                </div>
                                <div class="media-thumbnail video-thumbnail">
                                    <i class="fas fa-play-circle fa-4x text-info"></i>
                                    <div class="video-duration">02:34</div>
                                    <div class="media-overlay">
                                        <button class="btn btn-sm btn-primary" onclick="editMedia(this)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info" onclick="viewMedia(this)">
                                            <i class="fas fa-play"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteMedia(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="media-info">
                                    <div class="media-name">presentation-cabinet.mp4</div>
                                    <div class="media-details">
                                        <small class="text-muted">12.5 MB • MP4 • 30/12/2024</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- More media items... -->
                        <div class="media-item" data-type="image" data-category="evenements">
                            <div class="media-card">
                                <div class="media-checkbox">
                                    <input type="checkbox" class="media-select" onchange="updateSelectionCount()">
                                </div>
                                <div class="media-thumbnail">
                                    <img src="{{ asset('images/event-placeholder.jpg') }}" alt="Événement" class="img-fluid">
                                    <div class="media-overlay">
                                        <button class="btn btn-sm btn-primary" onclick="editMedia(this)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info" onclick="viewMedia(this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteMedia(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="media-info">
                                    <div class="media-name">conference-droit-2024.jpg</div>
                                    <div class="media-details">
                                        <small class="text-muted">2.1 MB • 2048x1365 • 28/12/2024</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Pagination -->
                    <nav class="mt-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Précédent</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Suivant</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-upload text-success mr-2"></i>
                        Télécharger des Fichiers
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="upload-zone" id="uploadZone">
                                <div class="upload-content">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                    <h5>Glissez vos fichiers ici</h5>
                                    <p>ou <button type="button" class="btn btn-link p-0" onclick="document.getElementById('fileInput').click()">parcourez votre ordinateur</button></p>
                                    <input type="file" id="fileInput" multiple style="display: none;" accept="image/*,.pdf,.doc,.docx,.mp4,.avi">
                                    <small class="text-muted">Formats supportés: Images, PDF, Word, Vidéos (Max: 50MB par fichier)</small>
                                </div>
                            </div>

                            <div id="uploadProgress" class="mt-3" style="display: none;">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                                </div>
                                <small class="text-muted">Téléchargement en cours...</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h6 class="font-weight-bold">Informations des Fichiers</h6>
                            <div class="mb-3">
                                <label for="uploadCategory" class="form-label">Catégorie</label>
                                <select class="form-control" id="uploadCategory">
                                    <option value="">Sélectionner une catégorie</option>
                                    <option value="equipe">Images Équipe</option>
                                    <option value="bureaux">Images Bureaux</option>
                                    <option value="evenements">Images Événements</option>
                                    <option value="modeles">Modèles de Documents</option>
                                    <option value="guides">Guides Pratiques</option>
                                    <option value="formulaires">Formulaires</option>
                                    <option value="marketing">Marketing</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="uploadTags" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="uploadTags" placeholder="droit, contrat, avocat...">
                                <small class="text-muted">Séparez les tags par des virgules</small>
                            </div>
                            <div class="mb-3">
                                <label for="uploadDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="uploadDescription" rows="3" placeholder="Description des fichiers..."></textarea>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="uploadPublic">
                                <label class="form-check-label" for="uploadPublic">
                                    Visible sur le site public
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-success" onclick="startUpload()" disabled id="uploadBtn">
                        <i class="fas fa-upload mr-1"></i>Télécharger
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Media Edit Modal -->
    <div class="modal fade" id="editMediaModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit text-primary mr-2"></i>
                        Modifier le Fichier
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="editMediaPreview" class="text-center mb-3">
                                <!-- Preview will be loaded here -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form id="editMediaForm">
                                <div class="mb-3">
                                    <label for="editFileName" class="form-label">Nom du fichier</label>
                                    <input type="text" class="form-control" id="editFileName">
                                </div>
                                <div class="mb-3">
                                    <label for="editFileCategory" class="form-label">Catégorie</label>
                                    <select class="form-control" id="editFileCategory">
                                        <option value="equipe">Images Équipe</option>
                                        <option value="bureaux">Images Bureaux</option>
                                        <option value="evenements">Images Événements</option>
                                        <option value="modeles">Modèles de Documents</option>
                                        <option value="guides">Guides Pratiques</option>
                                        <option value="formulaires">Formulaires</option>
                                        <option value="marketing">Marketing</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="editFileTags" class="form-label">Tags</label>
                                    <input type="text" class="form-control" id="editFileTags">
                                </div>
                                <div class="mb-3">
                                    <label for="editFileDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="editFileDescription" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="editFileAlt" class="form-label">Texte alternatif (images)</label>
                                    <input type="text" class="form-control" id="editFileAlt">
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="editFilePublic">
                                    <label class="form-check-label" for="editFilePublic">
                                        Visible sur le site public
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="saveMediaChanges()">
                        <i class="fas fa-save mr-1"></i>Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize media management
        initializeMediaManagement();

        // Setup drag and drop
        setupDragAndDrop();
    });

    function initializeMediaManagement() {
        // Category item clicks
        $('.category-item').on('click', function() {
            $('.category-item').removeClass('active');
            $(this).addClass('active');

            const category = $(this).find('.category-name').text().toLowerCase();
            filterByCategory(category);
        });

        // File input change
        $('#fileInput').on('change', function() {
            handleFileSelect(this.files);
        });
    }

    function setupDragAndDrop() {
        const uploadZone = document.getElementById('uploadZone');

        uploadZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('drag-over');
        });

        uploadZone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('drag-over');
        });

        uploadZone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('drag-over');

            const files = e.dataTransfer.files;
            handleFileSelect(files);
        });
    }

    function handleFileSelect(files) {
        const fileList = Array.from(files);
        let filesInfo = '';

        fileList.forEach((file, index) => {
            filesInfo += `<div class="file-info mb-2">
                <i class="fas fa-file mr-2"></i>
                <strong>${file.name}</strong> (${formatFileSize(file.size)})
            </div>`;
        });

        if (fileList.length > 0) {
            document.getElementById('uploadBtn').disabled = false;
            alert(`${fileList.length} fichier(s) sélectionné(s)`);
        }
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function startUpload() {
        document.getElementById('uploadProgress').style.display = 'block';
        const progressBar = document.querySelector('#uploadProgress .progress-bar');

        // Simulate upload progress
        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.random() * 30;
            if (progress >= 100) {
                progress = 100;
                clearInterval(interval);
                setTimeout(() => {
                    $('#uploadModal').modal('hide');
                    alert('Fichiers téléchargés avec succès !');
                    location.reload();
                }, 500);
            }
            progressBar.style.width = progress + '%';
        }, 200);
    }

    // Media management functions
    function editMedia(button) {
        const mediaItem = $(button).closest('.media-item');
        const fileName = mediaItem.find('.media-name').text();

        $('#editFileName').val(fileName);
        $('#editMediaModal').modal('show');
    }

    function viewMedia(button) {
        const mediaItem = $(button).closest('.media-item');
        const fileName = mediaItem.find('.media-name').text();

        alert('Ouverture du fichier: ' + fileName);
    }

    function deleteMedia(button) {
        const mediaItem = $(button).closest('.media-item');
        const fileName = mediaItem.find('.media-name').text();

        if (confirm(`Êtes-vous sûr de vouloir supprimer "${fileName}" ?`)) {
            mediaItem.fadeOut(() => {
                mediaItem.remove();
                alert('Fichier supprimé avec succès !');
            });
        }
    }

    function saveMediaChanges() {
        const fileName = $('#editFileName').val();
        console.log('Saving changes for:', fileName);

        $('#editMediaModal').modal('hide');
        alert('Modifications enregistrées avec succès !');
    }

    // Selection functions
    function selectAllMedia() {
        const checkboxes = document.querySelectorAll('.media-select');
        const allChecked = Array.from(checkboxes).every(cb => cb.checked);

        checkboxes.forEach(cb => {
            cb.checked = !allChecked;
        });

        updateSelectionCount();
    }

    function updateSelectionCount() {
        const checkedBoxes = document.querySelectorAll('.media-select:checked');
        const deleteButton = document.getElementById('deleteSelected');

        if (checkedBoxes.length > 0) {
            deleteButton.disabled = false;
            deleteButton.innerHTML = `<i class="fas fa-trash mr-1"></i>Supprimer (${checkedBoxes.length})`;
        } else {
            deleteButton.disabled = true;
            deleteButton.innerHTML = '<i class="fas fa-trash mr-1"></i>Supprimer sélection';
        }
    }

    function deleteSelectedMedia() {
        const checkedBoxes = document.querySelectorAll('.media-select:checked');

        if (checkedBoxes.length > 0 && confirm(`Supprimer ${checkedBoxes.length} fichier(s) sélectionné(s) ?`)) {
            checkedBoxes.forEach(cb => {
                $(cb).closest('.media-item').fadeOut(() => {
                    $(cb).closest('.media-item').remove();
                });
            });

            setTimeout(() => {
                alert(`${checkedBoxes.length} fichier(s) supprimé(s) !`);
                updateSelectionCount();
            }, 500);
        }
    }

    // View and filter functions
    function setViewMode(mode) {
        $('.btn-group .btn').removeClass('active');

        if (mode === 'grid') {
            $('#gridView').addClass('active');
            $('#mediaGrid').removeClass('list-view').addClass('grid-view');
        } else {
            $('#listView').addClass('active');
            $('#mediaGrid').removeClass('grid-view').addClass('list-view');
        }
    }

    function sortMedia(sortBy) {
        console.log('Sorting by:', sortBy);
        // Implementation for sorting would go here
    }

    function applyFilters() {
        const imageFilter = document.getElementById('filterImages').checked;
        const documentFilter = document.getElementById('filterDocuments').checked;
        const videoFilter = document.getElementById('filterVideos').checked;
        const officeFilter = document.getElementById('filterOffice').checked;

        $('.media-item').each(function() {
            const type = $(this).data('type');
            let show = false;

            if (type === 'image' && imageFilter) show = true;
            if (type === 'document' && documentFilter) show = true;
            if (type === 'video' && videoFilter) show = true;
            if (type === 'office' && officeFilter) show = true;

            $(this).toggle(show);
        });

        alert('Filtres appliqués !');
    }

    function searchMedia() {
        const searchTerm = document.getElementById('mediaSearch').value.toLowerCase();

        $('.media-item').each(function() {
            const fileName = $(this).find('.media-name').text().toLowerCase();
            const match = fileName.includes(searchTerm);
            $(this).toggle(match);
        });
    }

    function filterByCategory(category) {
        console.log('Filtering by category:', category);
        // Implementation for category filtering would go here
    }

    // Global actions
    function previewMediatheque() {
        console.log('Opening mediatheque preview...');
        window.open('/mediatheque', '_blank');
    }

    function organizeMedia() {
        alert('Fonction d\'organisation des médias à venir...');
    }
</script>

<style>
    .media-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
    }

    .media-grid.list-view {
        grid-template-columns: 1fr;
    }

    .media-card {
        position: relative;
        border: 1px solid #e3e6f0;
        border-radius: 0.35rem;
        transition: all 0.2s;
        background: white;
    }

    .media-card:hover {
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        transform: translateY(-2px);
    }

    .media-checkbox {
        position: absolute;
        top: 8px;
        left: 8px;
        z-index: 3;
    }

    .media-thumbnail {
        position: relative;
        height: 150px;
        overflow: hidden;
        border-radius: 0.35rem 0.35rem 0 0;
        background: #f8f9fc;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .media-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .document-thumbnail, .video-thumbnail {
        background: linear-gradient(135deg, #f8f9fc 0%, #e3e6f0 100%);
    }

    .media-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        opacity: 0;
        transition: opacity 0.2s;
    }

    .media-thumbnail:hover .media-overlay {
        opacity: 1;
    }

    .video-duration {
        position: absolute;
        bottom: 8px;
        right: 8px;
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 0.75rem;
    }

    .media-info {
        padding: 12px;
    }

    .media-name {
        font-weight: 600;
        font-size: 0.875rem;
        color: #5a5c69;
        margin-bottom: 4px;
        word-break: break-word;
    }

    .media-details {
        font-size: 0.75rem;
        color: #858796;
    }

    .category-tree .category-item {
        padding: 8px 0;
        cursor: pointer;
        transition: color 0.2s;
        border-left: 3px solid transparent;
        padding-left: 8px;
        margin-bottom: 4px;
    }

    .category-tree .category-item:hover {
        color: #4e73df;
        border-left-color: #4e73df;
        background-color: rgba(78, 115, 223, 0.1);
    }

    .category-tree .category-item.active {
        color: #4e73df;
        border-left-color: #4e73df;
        background-color: rgba(78, 115, 223, 0.15);
        font-weight: 600;
    }

    .upload-zone {
        border: 2px dashed #d1d3e2;
        border-radius: 0.35rem;
        padding: 40px;
        text-align: center;
        transition: all 0.2s;
        cursor: pointer;
    }

    .upload-zone:hover,
    .upload-zone.drag-over {
        border-color: #4e73df;
        background-color: rgba(78, 115, 223, 0.05);
    }

    .upload-content {
        pointer-events: none;
    }

    .btn-link {
        color: #4e73df !important;
        text-decoration: none !important;
    }

    .btn-link:hover {
        text-decoration: underline !important;
    }
</style>
@endsection
