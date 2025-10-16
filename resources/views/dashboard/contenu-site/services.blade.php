@extends('dashboard.layout')

@section('title', 'Gestion Page Services - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-briefcase text-primary mr-2"></i>
            Gestion Page Services
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Contenu du Site</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-info btn-sm" onclick="previewServicesPage()">
                    <i class="fas fa-eye mr-1"></i>
                    <span class="d-none d-sm-inline">Aperçu</span>
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="publishServicesPage()">
                    <i class="fas fa-globe mr-1"></i>
                    <span class="d-none d-sm-inline">Publier</span>
                </button>
                <button type="button" class="btn btn-warning btn-sm" onclick="saveDraftServices()">
                    <i class="fas fa-save mr-1"></i>
                    <span class="d-none d-sm-inline">Brouillon</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Services Management -->
    <div class="row">
        <!-- Services Categories -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-layer-group mr-2"></i>
                        Catégories de Services
                    </h6>
                    <button class="btn btn-primary btn-sm" onclick="addCategory()">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="card-body p-0">
                    <div id="categoriesList">
                        <div class="category-item p-3 border-bottom cursor-pointer" data-category="droit-penal" onclick="selectCategory(this)">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="font-weight-bold text-primary">Droit Pénal</div>
                                    <small class="text-muted">5 services</small>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="editCategory(this)">
                                            <i class="fas fa-edit mr-2"></i>Modifier
                                        </a>
                                        <a class="dropdown-item text-danger" href="#" onclick="deleteCategory(this)">
                                            <i class="fas fa-trash mr-2"></i>Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="category-item p-3 border-bottom cursor-pointer active" data-category="droit-civil" onclick="selectCategory(this)">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="font-weight-bold text-primary">Droit Civil</div>
                                    <small class="text-muted">4 services</small>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="editCategory(this)">
                                            <i class="fas fa-edit mr-2"></i>Modifier
                                        </a>
                                        <a class="dropdown-item text-danger" href="#" onclick="deleteCategory(this)">
                                            <i class="fas fa-trash mr-2"></i>Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="category-item p-3 border-bottom cursor-pointer" data-category="droit-commercial" onclick="selectCategory(this)">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="font-weight-bold text-primary">Droit Commercial</div>
                                    <small class="text-muted">6 services</small>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="editCategory(this)">
                                            <i class="fas fa-edit mr-2"></i>Modifier
                                        </a>
                                        <a class="dropdown-item text-danger" href="#" onclick="deleteCategory(this)">
                                            <i class="fas fa-trash mr-2"></i>Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="category-item p-3 cursor-pointer" data-category="droit-travail" onclick="selectCategory(this)">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="font-weight-bold text-primary">Droit du Travail</div>
                                    <small class="text-muted">3 services</small>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="editCategory(this)">
                                            <i class="fas fa-edit mr-2"></i>Modifier
                                        </a>
                                        <a class="dropdown-item text-danger" href="#" onclick="deleteCategory(this)">
                                            <i class="fas fa-trash mr-2"></i>Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category Statistics -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-chart-pie mr-2"></i>
                        Statistiques
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 text-center">
                            <div class="h4 mb-0 font-weight-bold text-primary">18</div>
                            <div class="text-xs text-gray-800 text-uppercase mb-1">Services Total</div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="h4 mb-0 font-weight-bold text-success">4</div>
                            <div class="text-xs text-gray-800 text-uppercase mb-1">Catégories</div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6 text-center">
                            <div class="h4 mb-0 font-weight-bold text-warning">12</div>
                            <div class="text-xs text-gray-800 text-uppercase mb-1">Publiés</div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="h4 mb-0 font-weight-bold text-info">6</div>
                            <div class="text-xs text-gray-800 text-uppercase mb-1">Brouillons</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Management Panel -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-cogs mr-2"></i>
                        <span id="currentCategoryTitle">Services - Droit Civil</span>
                    </h6>
                    <button class="btn btn-success btn-sm" onclick="addService()">
                        <i class="fas fa-plus mr-1"></i>Nouveau Service
                    </button>
                </div>
                <div class="card-body">
                    <div id="servicesContainer">
                        <!-- Service Item 1 -->
                        <div class="service-item card mb-3 border-left-success">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label font-weight-bold">Nom du Service</label>
                                            <input type="text" class="form-control" value="Divorce et Séparation">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label font-weight-bold">Description Courte</label>
                                            <textarea class="form-control" rows="2">Accompagnement complet dans toutes les procédures de divorce et de séparation avec protection des intérêts de chaque parti.</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label font-weight-bold">Description Détaillée</label>
                                            <textarea class="form-control" rows="4">Notre équipe spécialisée en droit de la famille vous accompagne dans toutes les étapes de la procédure de divorce : divorce par consentement mutuel, divorce pour faute, divorce pour altération définitive du lien conjugal. Nous gérons également les questions de garde d'enfants, pension alimentaire et partage des biens.</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label font-weight-bold">Tarif de Base</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" value="150000">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">FCFA</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label font-weight-bold">Durée Moyenne</label>
                                                <input type="text" class="form-control" value="3-6 mois">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label font-weight-bold">Icône du Service</label>
                                            <select class="form-control">
                                                <option value="fas fa-heart-broken" selected>Cœur brisé</option>
                                                <option value="fas fa-gavel">Marteau</option>
                                                <option value="fas fa-balance-scale">Balance</option>
                                                <option value="fas fa-users">Famille</option>
                                            </select>
                                            <div class="text-center mt-2">
                                                <i class="fas fa-heart-broken fa-3x text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label font-weight-bold">Image Illustrative</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" accept="image/*">
                                                <label class="custom-file-label">Choisir image...</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label font-weight-bold">Statut</label>
                                            <select class="form-control">
                                                <option value="published" selected>Publié</option>
                                                <option value="draft">Brouillon</option>
                                                <option value="inactive">Inactif</option>
                                            </select>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label">Service Populaire</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label">Consultation Gratuite</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-primary">
                                            <i class="fas fa-list-check mr-2"></i>Prestations Incluses
                                        </h6>
                                        <div id="prestations-1">
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" value="Consultation initiale">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger btn-sm" onclick="removePrestation(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" value="Rédaction requête">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger btn-sm" onclick="removePrestation(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" value="Représentation audience">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger btn-sm" onclick="removePrestation(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="addPrestation('prestations-1')">
                                            <i class="fas fa-plus mr-1"></i>Ajouter Prestation
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-warning">
                                            <i class="fas fa-file-contract mr-2"></i>Documents Requis
                                        </h6>
                                        <div id="documents-1">
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" value="Acte de mariage">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger btn-sm" onclick="removeDocument(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" value="Pièces d'identité">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger btn-sm" onclick="removeDocument(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-warning btn-sm" onclick="addDocument('documents-1')">
                                            <i class="fas fa-plus mr-1"></i>Ajouter Document
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="saveService(this)">
                                            <i class="fas fa-save mr-1"></i>Enregistrer
                                        </button>
                                        <button type="button" class="btn btn-info btn-sm" onclick="duplicateService(this)">
                                            <i class="fas fa-copy mr-1"></i>Dupliquer
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeService(this)">
                                        <i class="fas fa-trash mr-1"></i>Supprimer Service
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Service Item 2 -->
                        <div class="service-item card mb-3 border-left-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label font-weight-bold">Nom du Service</label>
                                            <input type="text" class="form-control" value="Succession et Héritage">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label font-weight-bold">Description Courte</label>
                                            <textarea class="form-control" rows="2">Gestion complète des procédures de succession et de partage d'héritage selon le droit ivoirien.</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label font-weight-bold">Description Détaillée</label>
                                            <textarea class="form-control" rows="4">Nous accompagnons les familles dans toutes les démarches successorales : ouverture de succession, inventaire des biens, règlement des dettes, partage entre héritiers. Notre expertise permet de résoudre les conflits familiaux et d'assurer un partage équitable selon la loi ivoirienne.</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label font-weight-bold">Tarif de Base</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" value="200000">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">FCFA</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label font-weight-bold">Durée Moyenne</label>
                                                <input type="text" class="form-control" value="6-12 mois">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label font-weight-bold">Icône du Service</label>
                                            <select class="form-control">
                                                <option value="fas fa-heart-broken">Cœur brisé</option>
                                                <option value="fas fa-gavel">Marteau</option>
                                                <option value="fas fa-balance-scale">Balance</option>
                                                <option value="fas fa-users" selected>Famille</option>
                                            </select>
                                            <div class="text-center mt-2">
                                                <i class="fas fa-users fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label font-weight-bold">Image Illustrative</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" accept="image/*">
                                                <label class="custom-file-label">Choisir image...</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label font-weight-bold">Statut</label>
                                            <select class="form-control">
                                                <option value="published" selected>Publié</option>
                                                <option value="draft">Brouillon</option>
                                                <option value="inactive">Inactif</option>
                                            </select>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label">Service Populaire</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label">Consultation Gratuite</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-primary">
                                            <i class="fas fa-list-check mr-2"></i>Prestations Incluses
                                        </h6>
                                        <div id="prestations-2">
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" value="Ouverture succession">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger btn-sm" onclick="removePrestation(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" value="Inventaire des biens">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger btn-sm" onclick="removePrestation(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="addPrestation('prestations-2')">
                                            <i class="fas fa-plus mr-1"></i>Ajouter Prestation
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-warning">
                                            <i class="fas fa-file-contract mr-2"></i>Documents Requis
                                        </h6>
                                        <div id="documents-2">
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" value="Acte de décès">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger btn-sm" onclick="removeDocument(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-warning btn-sm" onclick="addDocument('documents-2')">
                                            <i class="fas fa-plus mr-1"></i>Ajouter Document
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="saveService(this)">
                                            <i class="fas fa-save mr-1"></i>Enregistrer
                                        </button>
                                        <button type="button" class="btn btn-info btn-sm" onclick="duplicateService(this)">
                                            <i class="fas fa-copy mr-1"></i>Dupliquer
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeService(this)">
                                        <i class="fas fa-trash mr-1"></i>Supprimer Service
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Settings -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">
                <i class="fas fa-cogs mr-2"></i>
                Paramètres de la Page Services
            </h6>
        </div>
        <div class="card-body">
            <form id="pageServicesSettings">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="servicesPageTitle" class="form-label">Titre de la Page</label>
                            <input type="text" class="form-control" id="servicesPageTitle"
                                   value="Nos Services Juridiques">
                        </div>
                        <div class="mb-3">
                            <label for="servicesPageSubtitle" class="form-label">Sous-titre</label>
                            <textarea class="form-control" id="servicesPageSubtitle" rows="2">Des solutions juridiques complètes pour tous vos besoins en Côte d'Ivoire</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="servicesMetaDescription" class="form-label">Description SEO</label>
                            <textarea class="form-control" id="servicesMetaDescription" rows="3" maxlength="160">Découvrez tous les services juridiques du Cabinet Axe Legal : droit pénal, civil, commercial et du travail en Côte d'Ivoire.</textarea>
                            <small class="text-muted">135/160 caractères</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Options d'Affichage</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="showServicesPrices" checked>
                                <label class="form-check-label" for="showServicesPrices">
                                    Afficher les prix
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="showServicesDuration">
                                <label class="form-check-label" for="showServicesDuration">
                                    Afficher les durées
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="showServicesDocuments" checked>
                                <label class="form-check-label" for="showServicesDocuments">
                                    Afficher les documents requis
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enableServicesFilter" checked>
                                <label class="form-check-label" for="enableServicesFilter">
                                    Activer les filtres par catégorie
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="servicesLayout" class="form-label">Mise en page</label>
                            <select class="form-control" id="servicesLayout">
                                <option value="grid" selected>Grille</option>
                                <option value="list">Liste</option>
                                <option value="cards">Cartes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="servicesPerPage" class="form-label">Services par page</label>
                            <select class="form-control" id="servicesPerPage">
                                <option value="6">6 services</option>
                                <option value="9" selected>9 services</option>
                                <option value="12">12 services</option>
                                <option value="all">Tous</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-info" onclick="savePageServicesSettings()">
                    <i class="fas fa-save mr-1"></i>Enregistrer Paramètres
                </button>
            </form>
        </div>
    </div>

    <!-- Category Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter/Modifier Catégorie</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Nom de la Catégorie</label>
                            <input type="text" class="form-control" id="categoryName" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="categoryDescription" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="categoryIcon" class="form-label">Icône</label>
                            <select class="form-control" id="categoryIcon">
                                <option value="fas fa-gavel">Marteau (Gavel)</option>
                                <option value="fas fa-balance-scale">Balance</option>
                                <option value="fas fa-briefcase">Mallette</option>
                                <option value="fas fa-handshake">Poignée de main</option>
                                <option value="fas fa-shield-alt">Bouclier</option>
                                <option value="fas fa-users">Groupe</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="categoryColor" class="form-label">Couleur</label>
                            <input type="color" class="form-control" id="categoryColor" value="#4e73df">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="saveCategory()">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize services management
        initializeServicesManagement();
    });

    function initializeServicesManagement() {
        // File input labels
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
        });
    }

    // Category management
    function selectCategory(element) {
        $('.category-item').removeClass('active');
        $(element).addClass('active');

        const categoryName = $(element).find('.font-weight-bold').text();
        $('#currentCategoryTitle').text('Services - ' + categoryName);

        // Load services for this category (simulation)
        loadServicesForCategory($(element).data('category'));
    }

    function addCategory() {
        $('#categoryModal').modal('show');
        $('#categoryForm')[0].reset();
    }

    function editCategory(element) {
        const categoryItem = $(element).closest('.category-item');
        const categoryName = categoryItem.find('.font-weight-bold').text();

        $('#categoryName').val(categoryName);
        $('#categoryModal').modal('show');
    }

    function deleteCategory(element) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')) {
            $(element).closest('.category-item').remove();
            alert('Catégorie supprimée !');
        }
    }

    function saveCategory() {
        const categoryName = $('#categoryName').val();
        if (categoryName) {
            console.log('Saving category:', categoryName);
            $('#categoryModal').modal('hide');
            alert('Catégorie enregistrée avec succès !');
        }
    }

    // Service management
    function addService() {
        const serviceId = Date.now();
        const newService = `
            <div class="service-item card mb-3 border-left-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Nom du Service</label>
                                <input type="text" class="form-control" placeholder="Nom du nouveau service">
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Description Courte</label>
                                <textarea class="form-control" rows="2" placeholder="Description courte du service"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Description Détaillée</label>
                                <textarea class="form-control" rows="4" placeholder="Description détaillée du service"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label font-weight-bold">Tarif de Base</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="0">
                                        <div class="input-group-append">
                                            <span class="input-group-text">FCFA</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-weight-bold">Durée Moyenne</label>
                                    <input type="text" class="form-control" placeholder="Ex: 1-3 mois">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Icône du Service</label>
                                <select class="form-control">
                                    <option value="fas fa-gavel">Marteau</option>
                                    <option value="fas fa-balance-scale">Balance</option>
                                    <option value="fas fa-users">Famille</option>
                                    <option value="fas fa-briefcase">Mallette</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Statut</label>
                                <select class="form-control">
                                    <option value="draft" selected>Brouillon</option>
                                    <option value="published">Publié</option>
                                    <option value="inactive">Inactif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="font-weight-bold text-primary">
                                <i class="fas fa-list-check mr-2"></i>Prestations Incluses
                            </h6>
                            <div id="prestations-${serviceId}">
                                <!-- Prestations will be added here -->
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="addPrestation('prestations-${serviceId}')">
                                <i class="fas fa-plus mr-1"></i>Ajouter Prestation
                            </button>
                        </div>
                        <div class="col-md-6">
                            <h6 class="font-weight-bold text-warning">
                                <i class="fas fa-file-contract mr-2"></i>Documents Requis
                            </h6>
                            <div id="documents-${serviceId}">
                                <!-- Documents will be added here -->
                            </div>
                            <button type="button" class="btn btn-outline-warning btn-sm" onclick="addDocument('documents-${serviceId}')">
                                <i class="fas fa-plus mr-1"></i>Ajouter Document
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <button type="button" class="btn btn-primary btn-sm" onclick="saveService(this)">
                                <i class="fas fa-save mr-1"></i>Enregistrer
                            </button>
                            <button type="button" class="btn btn-info btn-sm" onclick="duplicateService(this)">
                                <i class="fas fa-copy mr-1"></i>Dupliquer
                            </button>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeService(this)">
                            <i class="fas fa-trash mr-1"></i>Supprimer Service
                        </button>
                    </div>
                </div>
            </div>
        `;

        $('#servicesContainer').append(newService);
    }

    function saveService(button) {
        const serviceCard = $(button).closest('.service-item');
        const serviceName = serviceCard.find('input[placeholder*="Nom"], input[value*="Divorce"], input[value*="Succession"]').first().val();

        console.log('Saving service:', serviceName);
        alert('Service enregistré avec succès !');
    }

    function duplicateService(button) {
        const serviceCard = $(button).closest('.service-item');
        const clonedService = serviceCard.clone();

        // Update IDs for prestations and documents
        const newId = Date.now();
        clonedService.find('[id^="prestations-"]').attr('id', 'prestations-' + newId);
        clonedService.find('[id^="documents-"]').attr('id', 'documents-' + newId);

        serviceCard.after(clonedService);
        alert('Service dupliqué avec succès !');
    }

    function removeService(button) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce service ?')) {
            $(button).closest('.service-item').remove();
            alert('Service supprimé !');
        }
    }

    // Prestations management
    function addPrestation(containerId) {
        const container = document.getElementById(containerId);
        const newPrestation = document.createElement('div');
        newPrestation.className = 'input-group mb-2';
        newPrestation.innerHTML = `
            <input type="text" class="form-control" placeholder="Nouvelle prestation">
            <div class="input-group-append">
                <button class="btn btn-danger btn-sm" onclick="removePrestation(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(newPrestation);
    }

    function removePrestation(button) {
        button.closest('.input-group').remove();
    }

    // Documents management
    function addDocument(containerId) {
        const container = document.getElementById(containerId);
        const newDocument = document.createElement('div');
        newDocument.className = 'input-group mb-2';
        newDocument.innerHTML = `
            <input type="text" class="form-control" placeholder="Nouveau document">
            <div class="input-group-append">
                <button class="btn btn-danger btn-sm" onclick="removeDocument(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(newDocument);
    }

    function removeDocument(button) {
        button.closest('.input-group').remove();
    }

    function loadServicesForCategory(categorySlug) {
        console.log('Loading services for category:', categorySlug);
        // Simulation of loading services based on category
    }

    // Page settings
    function savePageServicesSettings() {
        console.log('Saving page settings...');
        alert('Paramètres de page enregistrés avec succès !');
    }

    // Global actions
    function previewServicesPage() {
        console.log('Opening services page preview...');
        window.open('/services', '_blank');
    }

    function publishServicesPage() {
        if (confirm('Êtes-vous sûr de vouloir publier les modifications de la page Services ?')) {
            console.log('Publishing services page...');
            alert('Page Services publiée avec succès !');
        }
    }

    function saveDraftServices() {
        console.log('Saving services as draft...');
        alert('Brouillon de la page Services enregistré !');
    }
</script>

<style>
    .category-item {
        transition: all 0.2s;
        border-left: 3px solid transparent;
    }

    .category-item:hover {
        background-color: #f8f9fc;
        border-left-color: #4e73df;
    }

    .category-item.active {
        background-color: #e3f2fd;
        border-left-color: #4e73df;
    }

    .service-item {
        transition: transform 0.2s;
    }

    .service-item:hover {
        transform: translateY(-2px);
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .border-left-success {
        border-left: 0.25rem solid #1cc88a !important;
    }

    .border-left-primary {
        border-left: 0.25rem solid #4e73df !important;
    }

    .border-left-info {
        border-left: 0.25rem solid #36b9cc !important;
    }

    .custom-file-label.selected {
        color: #495057;
    }

    .input-group .btn {
        border-left: 0;
    }
</style>
@endsection
