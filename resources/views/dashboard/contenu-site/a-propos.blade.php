@extends('dashboard.layout')

@section('title', 'Gestion Page À Propos - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-info-circle text-primary mr-2"></i>
            Gestion Page À Propos
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Contenu du Site</a></li>
                    <li class="breadcrumb-item active" aria-current="page">À Propos</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-info btn-sm" onclick="previewPage()">
                    <i class="fas fa-eye mr-1"></i>
                    <span class="d-none d-sm-inline">Aperçu</span>
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="publishPage()">
                    <i class="fas fa-globe mr-1"></i>
                    <span class="d-none d-sm-inline">Publier</span>
                </button>
                <button type="button" class="btn btn-warning btn-sm" onclick="saveDraftPage()">
                    <i class="fas fa-save mr-1"></i>
                    <span class="d-none d-sm-inline">Brouillon</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Content Management Tabs -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="aboutTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="intro-tab" data-toggle="tab" href="#intro" role="tab">
                        <i class="fas fa-play-circle mr-1"></i>Introduction
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab">
                        <i class="fas fa-history mr-1"></i>Histoire
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mission-tab" data-toggle="tab" href="#mission" role="tab">
                        <i class="fas fa-bullseye mr-1"></i>Mission & Vision
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="team-tab" data-toggle="tab" href="#team" role="tab">
                        <i class="fas fa-users mr-1"></i>Équipe
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="values-tab" data-toggle="tab" href="#values" role="tab">
                        <i class="fas fa-heart mr-1"></i>Valeurs
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="achievements-tab" data-toggle="tab" href="#achievements" role="tab">
                        <i class="fas fa-trophy mr-1"></i>Réalisations
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="aboutTabsContent">
                <!-- Introduction Section -->
                <div class="tab-pane fade show active" id="intro" role="tabpanel">
                    <form id="introForm">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label for="introTitle" class="form-label">Titre Principal</label>
                                    <input type="text" class="form-control" id="introTitle"
                                           value="À Propos d'Axe Legal">
                                </div>
                                <div class="mb-3">
                                    <label for="introSubtitle" class="form-label">Sous-titre</label>
                                    <textarea class="form-control" id="introSubtitle" rows="2">Votre partenaire juridique de confiance depuis plus de 15 ans en Côte d'Ivoire</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="introContent" class="form-label">Contenu Principal</label>
                                    <textarea class="form-control" id="introContent" rows="8">Le Cabinet Axe Legal est un cabinet d'avocats spécialisé dans plusieurs domaines du droit ivoirien. Fondé en 2008, notre cabinet s'est imposé comme une référence dans l'accompagnement juridique des particuliers et des entreprises.

Dirigé par Maître Diabaté, avocat inscrit au Barreau de Côte d'Ivoire depuis plus de 15 ans, notre équipe pluridisciplinaire met son expertise au service de vos problématiques juridiques.

Notre approche se base sur l'écoute, la rigueur et l'excellence pour vous offrir des solutions juridiques adaptées à vos besoins spécifiques.</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mots-clés Principaux</label>
                                    <div class="d-flex flex-wrap" id="keywordsContainer">
                                        <span class="badge badge-primary mr-2 mb-2">
                                            Expertise juridique
                                            <button type="button" class="btn btn-sm p-0 ml-1" onclick="removeKeyword(this)">
                                                <i class="fas fa-times text-white"></i>
                                            </button>
                                        </span>
                                        <span class="badge badge-primary mr-2 mb-2">
                                            15 ans d'expérience
                                            <button type="button" class="btn btn-sm p-0 ml-1" onclick="removeKeyword(this)">
                                                <i class="fas fa-times text-white"></i>
                                            </button>
                                        </span>
                                        <span class="badge badge-primary mr-2 mb-2">
                                            Approche personnalisée
                                            <button type="button" class="btn btn-sm p-0 ml-1" onclick="removeKeyword(this)">
                                                <i class="fas fa-times text-white"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="input-group mt-2">
                                        <input type="text" class="form-control" id="newKeyword" placeholder="Ajouter un mot-clé">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-primary" onclick="addKeyword()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="introImage" class="form-label">Image Principale</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="introImage" accept="image/*">
                                        <label class="custom-file-label" for="introImage">Choisir image...</label>
                                    </div>
                                    <div class="mt-2">
                                        <img id="introImagePreview" src="{{ asset('images/about-intro.jpg') }}"
                                             class="img-fluid rounded" alt="Intro preview" style="max-height: 200px;">
                                    </div>
                                </div>
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <h6 class="text-primary">Statistiques Clés</h6>
                                        <div class="mb-2">
                                            <label>Années d'expérience</label>
                                            <input type="number" class="form-control" value="15">
                                        </div>
                                        <div class="mb-2">
                                            <label>Clients accompagnés</label>
                                            <input type="number" class="form-control" value="1200">
                                        </div>
                                        <div class="mb-2">
                                            <label>Affaires traitées</label>
                                            <input type="number" class="form-control" value="2500">
                                        </div>
                                        <div class="mb-2">
                                            <label>Taux de réussite (%)</label>
                                            <input type="number" class="form-control" value="95">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="saveIntroSection()">
                            <i class="fas fa-save mr-1"></i>Enregistrer Introduction
                        </button>
                    </form>
                </div>

                <!-- History Section -->
                <div class="tab-pane fade" id="history" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5>Histoire du Cabinet</h5>
                        <button class="btn btn-success btn-sm" onclick="addHistoryMilestone()">
                            <i class="fas fa-plus mr-1"></i>Ajouter Étape
                        </button>
                    </div>
                    <div id="historyContainer">
                        <div class="history-item card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Année</label>
                                            <input type="number" class="form-control" value="2008" min="1900" max="2025">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-2">
                                            <label class="form-label">Titre de l'étape</label>
                                            <input type="text" class="form-control" value="Création du Cabinet">
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="3">Fondation du Cabinet Axe Legal par Maître Diabaté, jeune avocat diplômé avec une vision d'excellence dans l'accompagnement juridique en Côte d'Ivoire.</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger btn-sm" onclick="removeHistoryItem(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="history-item card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Année</label>
                                            <input type="number" class="form-control" value="2012" min="1900" max="2025">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-2">
                                            <label class="form-label">Titre de l'étape</label>
                                            <input type="text" class="form-control" value="Expansion des Services">
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="3">Élargissement des domaines d'expertise avec l'intégration du droit commercial et du droit du travail. Première équipe d'avocats collaborateurs.</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger btn-sm" onclick="removeHistoryItem(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="history-item card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Année</label>
                                            <input type="number" class="form-control" value="2018" min="1900" max="2025">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-2">
                                            <label class="form-label">Titre de l'étape</label>
                                            <input type="text" class="form-control" value="Modernisation et Digitalisation">
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="3">Lancement de notre plateforme digitale pour faciliter l'accès aux services juridiques et améliorer le suivi des dossiers clients.</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger btn-sm" onclick="removeHistoryItem(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveHistorySection()">
                        <i class="fas fa-save mr-1"></i>Enregistrer Histoire
                    </button>
                </div>

                <!-- Mission & Vision Section -->
                <div class="tab-pane fade" id="mission" role="tabpanel">
                    <form id="missionForm">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card border-primary mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <h6 class="m-0"><i class="fas fa-bullseye mr-2"></i>Notre Mission</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="missionTitle" class="form-label">Titre</label>
                                            <input type="text" class="form-control" id="missionTitle"
                                                   value="Défendre vos droits avec excellence">
                                        </div>
                                        <div class="mb-3">
                                            <label for="missionContent" class="form-label">Description</label>
                                            <textarea class="form-control" id="missionContent" rows="6">Accompagner nos clients dans la défense de leurs droits et intérêts avec professionnalisme, intégrité et excellence. Nous nous engageons à fournir des conseils juridiques de qualité supérieure, adaptés aux spécificités du contexte ivoirien.</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="missionImage" class="form-label">Image Mission</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="missionImage" accept="image/*">
                                                <label class="custom-file-label" for="missionImage">Choisir image...</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card border-info mb-4">
                                    <div class="card-header bg-info text-white">
                                        <h6 class="m-0"><i class="fas fa-eye mr-2"></i>Notre Vision</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="visionTitle" class="form-label">Titre</label>
                                            <input type="text" class="form-control" id="visionTitle"
                                                   value="Leader du conseil juridique en Côte d'Ivoire">
                                        </div>
                                        <div class="mb-3">
                                            <label for="visionContent" class="form-label">Description</label>
                                            <textarea class="form-control" id="visionContent" rows="6">Devenir le cabinet de référence en Côte d'Ivoire, reconnu pour son expertise, son éthique et sa contribution à l'évolution du système juridique ivoirien. Nous aspirons à être le partenaire privilégié des acteurs économiques et sociaux du pays.</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="visionImage" class="form-label">Image Vision</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="visionImage" accept="image/*">
                                                <label class="custom-file-label" for="visionImage">Choisir image...</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="saveMissionSection()">
                            <i class="fas fa-save mr-1"></i>Enregistrer Mission & Vision
                        </button>
                    </form>
                </div>

                <!-- Team Section -->
                <div class="tab-pane fade" id="team" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5>Équipe du Cabinet</h5>
                        <button class="btn btn-success btn-sm" onclick="addTeamMember()">
                            <i class="fas fa-plus mr-1"></i>Ajouter Membre
                        </button>
                    </div>
                    <div id="teamContainer" class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="team-member card h-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">Photo</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" accept="image/*">
                                                    <label class="custom-file-label">Photo...</label>
                                                </div>
                                                <div class="mt-2">
                                                    <img src="{{ asset('images/team-placeholder.jpg') }}"
                                                         class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-2">
                                                <label class="form-label">Nom Complet</label>
                                                <input type="text" class="form-control" value="Maître Diabaté Koffi">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Fonction</label>
                                                <input type="text" class="form-control" value="Avocat Associé - Directeur">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Spécialités</label>
                                                <input type="text" class="form-control" value="Droit Pénal, Droit Civil">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label class="form-label">Biographie</label>
                                        <textarea class="form-control" rows="4">Plus de 15 ans d'expérience en droit ivoirien. Diplômé de l'Université Félix Houphouët-Boigny, spécialisé en droit pénal et civil. Fondateur du cabinet Axe Legal.</textarea>
                                    </div>
                                    <div class="mt-2">
                                        <label class="form-label">Contact</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="email" class="form-control" placeholder="Email" value="k.diabate@axelegal.ci">
                                            </div>
                                            <div class="col-6">
                                                <input type="tel" class="form-control" placeholder="Téléphone" value="+225 01 02 03 04 05">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label">Afficher sur le site</label>
                                        </div>
                                        <button class="btn btn-danger btn-sm" onclick="removeTeamMember(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="team-member card h-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">Photo</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" accept="image/*">
                                                    <label class="custom-file-label">Photo...</label>
                                                </div>
                                                <div class="mt-2">
                                                    <img src="{{ asset('images/team-placeholder.jpg') }}"
                                                         class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-2">
                                                <label class="form-label">Nom Complet</label>
                                                <input type="text" class="form-control" value="Maître Kouamé Adjoa">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Fonction</label>
                                                <input type="text" class="form-control" value="Avocate Associée">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Spécialités</label>
                                                <input type="text" class="form-control" value="Droit Commercial, Droit du Travail">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label class="form-label">Biographie</label>
                                        <textarea class="form-control" rows="4">Avocate expérimentée en droit des affaires et droit du travail. Diplômée en droit commercial avec 10 ans d'expérience dans l'accompagnement des entreprises.</textarea>
                                    </div>
                                    <div class="mt-2">
                                        <label class="form-label">Contact</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="email" class="form-control" placeholder="Email" value="a.kouame@axelegal.ci">
                                            </div>
                                            <div class="col-6">
                                                <input type="tel" class="form-control" placeholder="Téléphone" value="+225 01 02 03 04 06">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label">Afficher sur le site</label>
                                        </div>
                                        <button class="btn btn-danger btn-sm" onclick="removeTeamMember(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveTeamSection()">
                        <i class="fas fa-save mr-1"></i>Enregistrer Équipe
                    </button>
                </div>

                <!-- Values Section -->
                <div class="tab-pane fade" id="values" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5>Nos Valeurs</h5>
                        <button class="btn btn-success btn-sm" onclick="addValue()">
                            <i class="fas fa-plus mr-1"></i>Ajouter Valeur
                        </button>
                    </div>
                    <div id="valuesContainer" class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="value-item card h-100 border-primary">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <select class="form-control">
                                            <option value="fas fa-gavel" selected>Balance/Gavel</option>
                                            <option value="fas fa-shield-alt">Bouclier</option>
                                            <option value="fas fa-heart">Cœur</option>
                                            <option value="fas fa-handshake">Poignée de main</option>
                                            <option value="fas fa-star">Étoile</option>
                                            <option value="fas fa-lightbulb">Ampoule</option>
                                        </select>
                                        <div class="mt-2">
                                            <i class="fas fa-gavel fa-3x text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <input type="text" class="form-control text-center font-weight-bold" value="Intégrité">
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control" rows="4" placeholder="Description de la valeur">Nous agissons avec honnêteté, transparence et éthique dans tous nos rapports professionnels et personnels.</textarea>
                                    </div>
                                    <button class="btn btn-danger btn-sm" onclick="removeValue(this)">
                                        <i class="fas fa-trash mr-1"></i>Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4">
                            <div class="value-item card h-100 border-success">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <select class="form-control">
                                            <option value="fas fa-gavel">Balance/Gavel</option>
                                            <option value="fas fa-shield-alt">Bouclier</option>
                                            <option value="fas fa-heart">Cœur</option>
                                            <option value="fas fa-handshake" selected>Poignée de main</option>
                                            <option value="fas fa-star">Étoile</option>
                                            <option value="fas fa-lightbulb">Ampoule</option>
                                        </select>
                                        <div class="mt-2">
                                            <i class="fas fa-handshake fa-3x text-success"></i>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <input type="text" class="form-control text-center font-weight-bold" value="Excellence">
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control" rows="4" placeholder="Description de la valeur">Nous visons l'excellence dans chaque mission, en apportant un service juridique de la plus haute qualité.</textarea>
                                    </div>
                                    <button class="btn btn-danger btn-sm" onclick="removeValue(this)">
                                        <i class="fas fa-trash mr-1"></i>Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4">
                            <div class="value-item card h-100 border-info">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <select class="form-control">
                                            <option value="fas fa-gavel">Balance/Gavel</option>
                                            <option value="fas fa-shield-alt">Bouclier</option>
                                            <option value="fas fa-heart" selected>Cœur</option>
                                            <option value="fas fa-handshake">Poignée de main</option>
                                            <option value="fas fa-star">Étoile</option>
                                            <option value="fas fa-lightbulb">Ampoule</option>
                                        </select>
                                        <div class="mt-2">
                                            <i class="fas fa-heart fa-3x text-info"></i>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <input type="text" class="form-control text-center font-weight-bold" value="Proximité">
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control" rows="4" placeholder="Description de la valeur">Nous cultivons des relations de proximité avec nos clients, basées sur l'écoute et la compréhension.</textarea>
                                    </div>
                                    <button class="btn btn-danger btn-sm" onclick="removeValue(this)">
                                        <i class="fas fa-trash mr-1"></i>Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveValuesSection()">
                        <i class="fas fa-save mr-1"></i>Enregistrer Valeurs
                    </button>
                </div>

                <!-- Achievements Section -->
                <div class="tab-pane fade" id="achievements" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5>Réalisations & Reconnaissances</h5>
                        <button class="btn btn-success btn-sm" onclick="addAchievement()">
                            <i class="fas fa-plus mr-1"></i>Ajouter Réalisation
                        </button>
                    </div>
                    <div id="achievementsContainer">
                        <div class="achievement-item card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Année</label>
                                            <input type="number" class="form-control" value="2023" min="2008" max="2025">
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Type</label>
                                            <select class="form-control">
                                                <option value="award" selected>Prix/Distinction</option>
                                                <option value="certification">Certification</option>
                                                <option value="milestone">Étape importante</option>
                                                <option value="recognition">Reconnaissance</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-2">
                                            <label class="form-label">Titre</label>
                                            <input type="text" class="form-control" value="Meilleur Cabinet Juridique de l'année">
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="3">Reconnaissance par l'Association des Avocats de Côte d'Ivoire pour l'excellence de nos services et notre contribution au développement du droit ivoirien.</textarea>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Organisme/Institution</label>
                                            <input type="text" class="form-control" value="Association des Avocats de Côte d'Ivoire">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger btn-sm" onclick="removeAchievement(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="achievement-item card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Année</label>
                                            <input type="number" class="form-control" value="2020" min="2008" max="2025">
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Type</label>
                                            <select class="form-control">
                                                <option value="award">Prix/Distinction</option>
                                                <option value="certification">Certification</option>
                                                <option value="milestone" selected>Étape importante</option>
                                                <option value="recognition">Reconnaissance</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-2">
                                            <label class="form-label">Titre</label>
                                            <input type="text" class="form-control" value="1000ème Client Accompagné">
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="3">Franchise symbolique des 1000 clients accompagnés avec succès depuis la création du cabinet, marquant notre croissance et la confiance de nos clients.</textarea>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Organisme/Institution</label>
                                            <input type="text" class="form-control" value="Cabinet Axe Legal">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger btn-sm" onclick="removeAchievement(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveAchievementsSection()">
                        <i class="fas fa-save mr-1"></i>Enregistrer Réalisations
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Settings -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-warning">
                <i class="fas fa-cogs mr-2"></i>
                Paramètres de Page
            </h6>
        </div>
        <div class="card-body">
            <form id="pageSettingsForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pageMetaTitle" class="form-label">Titre SEO</label>
                            <input type="text" class="form-control" id="pageMetaTitle"
                                   value="À Propos - Cabinet Axe Legal Côte d'Ivoire" maxlength="60">
                            <small class="text-muted">50/60 caractères</small>
                        </div>
                        <div class="mb-3">
                            <label for="pageMetaDescription" class="form-label">Description SEO</label>
                            <textarea class="form-control" id="pageMetaDescription" rows="3" maxlength="160">Découvrez l'histoire, la mission et l'équipe du Cabinet Axe Legal. Plus de 15 ans d'expertise juridique en Côte d'Ivoire.</textarea>
                            <small class="text-muted">112/160 caractères</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Options d'affichage</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="showBreadcrumb" checked>
                                <label class="form-check-label" for="showBreadcrumb">
                                    Afficher le fil d'Ariane
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="showSocialShare" checked>
                                <label class="form-check-label" for="showSocialShare">
                                    Boutons de partage social
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="showContactCTA" checked>
                                <label class="form-check-label" for="showContactCTA">
                                    Call-to-action Contact
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="pageTemplate" class="form-label">Template de page</label>
                            <select class="form-control" id="pageTemplate">
                                <option value="default" selected>Par défaut</option>
                                <option value="full-width">Pleine largeur</option>
                                <option value="sidebar">Avec sidebar</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-warning" onclick="savePageSettings()">
                    <i class="fas fa-cogs mr-1"></i>Enregistrer Paramètres
                </button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize about page management
        initializeAboutManagement();
    });

    function initializeAboutManagement() {
        // File input labels
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
        });

        // Image preview functionality
        $('#introImage').on('change', function() {
            previewImage(this, 'introImagePreview');
        });
    }

    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Keywords management
    function addKeyword() {
        const input = document.getElementById('newKeyword');
        const keyword = input.value.trim();

        if (keyword) {
            const container = document.getElementById('keywordsContainer');
            const badge = document.createElement('span');
            badge.className = 'badge badge-primary mr-2 mb-2';
            badge.innerHTML = `
                ${keyword}
                <button type="button" class="btn btn-sm p-0 ml-1" onclick="removeKeyword(this)">
                    <i class="fas fa-times text-white"></i>
                </button>
            `;
            container.appendChild(badge);
            input.value = '';
        }
    }

    function removeKeyword(button) {
        button.closest('.badge').remove();
    }

    // History management
    function addHistoryMilestone() {
        const container = document.getElementById('historyContainer');
        const newMilestone = document.createElement('div');
        newMilestone.className = 'history-item card mb-3';
        newMilestone.innerHTML = `
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label">Année</label>
                            <input type="number" class="form-control" value="${new Date().getFullYear()}" min="1900" max="2025">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="mb-2">
                            <label class="form-label">Titre de l'étape</label>
                            <input type="text" class="form-control" placeholder="Titre de cette étape">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Description détaillée de cette étape"></textarea>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger btn-sm" onclick="removeHistoryItem(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(newMilestone);
    }

    function removeHistoryItem(button) {
        button.closest('.history-item').remove();
    }

    // Team management
    function addTeamMember() {
        const container = document.getElementById('teamContainer');
        const newMember = document.createElement('div');
        newMember.className = 'col-lg-6 mb-4';
        newMember.innerHTML = `
            <div class="team-member card h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-label">Photo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/*">
                                    <label class="custom-file-label">Photo...</label>
                                </div>
                                <div class="mt-2">
                                    <img src="{{ asset('images/team-placeholder.jpg') }}"
                                         class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-2">
                                <label class="form-label">Nom Complet</label>
                                <input type="text" class="form-control" placeholder="Nom et prénom">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Fonction</label>
                                <input type="text" class="form-control" placeholder="Fonction dans le cabinet">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Spécialités</label>
                                <input type="text" class="form-control" placeholder="Domaines de spécialité">
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Biographie</label>
                        <textarea class="form-control" rows="4" placeholder="Biographie professionnelle"></textarea>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Contact</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-6">
                                <input type="tel" class="form-control" placeholder="Téléphone">
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Afficher sur le site</label>
                        </div>
                        <button class="btn btn-danger btn-sm" onclick="removeTeamMember(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(newMember);
    }

    function removeTeamMember(button) {
        button.closest('.col-lg-6').remove();
    }

    // Values management
    function addValue() {
        const container = document.getElementById('valuesContainer');
        const colors = ['primary', 'success', 'info', 'warning', 'danger', 'secondary'];
        const randomColor = colors[Math.floor(Math.random() * colors.length)];

        const newValue = document.createElement('div');
        newValue.className = 'col-lg-4 mb-4';
        newValue.innerHTML = `
            <div class="value-item card h-100 border-${randomColor}">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <select class="form-control">
                            <option value="fas fa-gavel">Balance/Gavel</option>
                            <option value="fas fa-shield-alt">Bouclier</option>
                            <option value="fas fa-heart">Cœur</option>
                            <option value="fas fa-handshake">Poignée de main</option>
                            <option value="fas fa-star" selected>Étoile</option>
                            <option value="fas fa-lightbulb">Ampoule</option>
                        </select>
                        <div class="mt-2">
                            <i class="fas fa-star fa-3x text-${randomColor}"></i>
                        </div>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control text-center font-weight-bold" placeholder="Nom de la valeur">
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control" rows="4" placeholder="Description de la valeur"></textarea>
                    </div>
                    <button class="btn btn-danger btn-sm" onclick="removeValue(this)">
                        <i class="fas fa-trash mr-1"></i>Supprimer
                    </button>
                </div>
            </div>
        `;
        container.appendChild(newValue);
    }

    function removeValue(button) {
        button.closest('.col-lg-4').remove();
    }

    // Achievements management
    function addAchievement() {
        const container = document.getElementById('achievementsContainer');
        const newAchievement = document.createElement('div');
        newAchievement.className = 'achievement-item card mb-3';
        newAchievement.innerHTML = `
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label">Année</label>
                            <input type="number" class="form-control" value="${new Date().getFullYear()}" min="2008" max="2025">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Type</label>
                            <select class="form-control">
                                <option value="award">Prix/Distinction</option>
                                <option value="certification">Certification</option>
                                <option value="milestone">Étape importante</option>
                                <option value="recognition">Reconnaissance</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="mb-2">
                            <label class="form-label">Titre</label>
                            <input type="text" class="form-control" placeholder="Titre de la réalisation">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Description détaillée"></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Organisme/Institution</label>
                            <input type="text" class="form-control" placeholder="Organisme qui a décerné cette reconnaissance">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger btn-sm" onclick="removeAchievement(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(newAchievement);
    }

    function removeAchievement(button) {
        button.closest('.achievement-item').remove();
    }

    // Save functions
    function saveIntroSection() {
        console.log('Saving introduction section...');
        alert('Section Introduction enregistrée avec succès !');
    }

    function saveHistorySection() {
        console.log('Saving history section...');
        alert('Section Histoire enregistrée avec succès !');
    }

    function saveMissionSection() {
        console.log('Saving mission section...');
        alert('Section Mission & Vision enregistrée avec succès !');
    }

    function saveTeamSection() {
        console.log('Saving team section...');
        alert('Section Équipe enregistrée avec succès !');
    }

    function saveValuesSection() {
        console.log('Saving values section...');
        alert('Section Valeurs enregistrée avec succès !');
    }

    function saveAchievementsSection() {
        console.log('Saving achievements section...');
        alert('Section Réalisations enregistrée avec succès !');
    }

    function savePageSettings() {
        console.log('Saving page settings...');
        alert('Paramètres de page enregistrés avec succès !');
    }

    // Global actions
    function previewPage() {
        console.log('Opening page preview...');
        window.open('/a-propos', '_blank');
    }

    function publishPage() {
        if (confirm('Êtes-vous sûr de vouloir publier les modifications de la page À Propos ?')) {
            console.log('Publishing page...');
            alert('Page À Propos publiée avec succès !');
        }
    }

    function saveDraftPage() {
        console.log('Saving page as draft...');
        alert('Brouillon de la page enregistré !');
    }
</script>

<style>
    .nav-tabs .nav-link {
        color: #858796;
    }

    .nav-tabs .nav-link.active {
        color: #4e73df;
        border-color: #4e73df #4e73df #fff;
    }

    .history-item, .achievement-item {
        border-left: 4px solid #4e73df;
    }

    .team-member {
        border-left: 4px solid #1cc88a;
    }

    .value-item {
        transition: transform 0.2s;
    }

    .value-item:hover {
        transform: translateY(-2px);
    }

    .badge .btn {
        font-size: 0.7rem;
        line-height: 1;
    }

    .custom-file-label.selected {
        color: #495057;
    }

    .form-check-label {
        line-height: 1.4;
    }
</style>
@endsection
