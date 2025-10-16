@extends('dashboard.layout')

@section('title', 'Gestion Page d\'Accueil - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-home text-primary mr-2"></i>
            Gestion Page d'Accueil
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Contenu du Site</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Page d'Accueil</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-info btn-sm" onclick="previewSite()">
                    <i class="fas fa-eye mr-1"></i>
                    <span class="d-none d-sm-inline">Aperçu</span>
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="publishChanges()">
                    <i class="fas fa-globe mr-1"></i>
                    <span class="d-none d-sm-inline">Publier</span>
                </button>
                <button type="button" class="btn btn-warning btn-sm" onclick="saveDraft()">
                    <i class="fas fa-save mr-1"></i>
                    <span class="d-none d-sm-inline">Brouillon</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Content Management Tabs -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="contentTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="hero-tab" data-toggle="tab" href="#hero" role="tab">
                        <i class="fas fa-star mr-1"></i>Section Héro
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="services-tab" data-toggle="tab" href="#services" role="tab">
                        <i class="fas fa-briefcase mr-1"></i>Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab">
                        <i class="fas fa-info-circle mr-1"></i>À Propos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="testimonials-tab" data-toggle="tab" href="#testimonials" role="tab">
                        <i class="fas fa-quote-left mr-1"></i>Témoignages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="blog-tab" data-toggle="tab" href="#blog" role="tab">
                        <i class="fas fa-newspaper mr-1"></i>Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab">
                        <i class="fas fa-envelope mr-1"></i>Contact
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="contentTabsContent">
                <!-- Hero Section -->
                <div class="tab-pane fade show active" id="hero" role="tabpanel">
                    <form id="heroForm">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label for="heroTitle" class="form-label">Titre Principal</label>
                                    <input type="text" class="form-control" id="heroTitle"
                                           value="Votre Cabinet Juridique de Confiance en Côte d'Ivoire">
                                </div>
                                <div class="mb-3">
                                    <label for="heroSubtitle" class="form-label">Sous-titre</label>
                                    <textarea class="form-control" id="heroSubtitle" rows="3">Expert en droit pénal, civil, commercial et du travail. Plus de 15 ans d'expérience au service de la justice ivoirienne.</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="heroCTA1" class="form-label">Bouton Principal</label>
                                        <input type="text" class="form-control" id="heroCTA1" value="Consultation Gratuite">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="heroCTA2" class="form-label">Bouton Secondaire</label>
                                        <input type="text" class="form-control" id="heroCTA2" value="Nos Services">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="heroImage" class="form-label">Image Héro</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="heroImage" accept="image/*">
                                        <label class="custom-file-label" for="heroImage">Choisir image...</label>
                                    </div>
                                    <div class="mt-2">
                                        <img id="heroImagePreview" src="{{ asset('images/hero-default.jpg') }}"
                                             class="img-fluid rounded" alt="Hero preview" style="max-height: 200px;">
                                    </div>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="heroVideoBackground">
                                    <label class="form-check-label" for="heroVideoBackground">
                                        Fond vidéo animé
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="heroParallax" checked>
                                    <label class="form-check-label" for="heroParallax">
                                        Effet parallaxe
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="saveHeroSection()">
                            <i class="fas fa-save mr-1"></i>Enregistrer Section Héro
                        </button>
                    </form>
                </div>

                <!-- Services Section -->
                <div class="tab-pane fade" id="services" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5>Services Mis en Avant</h5>
                        <button class="btn btn-success btn-sm" onclick="addService()">
                            <i class="fas fa-plus mr-1"></i>Ajouter Service
                        </button>
                    </div>
                    <div id="servicesContainer">
                        <div class="service-item card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-2">
                                            <label class="form-label">Titre du Service</label>
                                            <input type="text" class="form-control" value="Droit Pénal">
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="2">Défense pénale experte pour tous types d'infractions. Assistance complète de l'enquête au jugement.</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Icône</label>
                                            <select class="form-control">
                                                <option value="fas fa-gavel" selected>Marteau (Gavel)</option>
                                                <option value="fas fa-shield-alt">Bouclier</option>
                                                <option value="fas fa-balance-scale">Balance</option>
                                                <option value="fas fa-user-tie">Avocat</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Couleur</label>
                                            <input type="color" class="form-control" value="#4e73df">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger btn-sm" onclick="removeService(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="service-item card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-2">
                                            <label class="form-label">Titre du Service</label>
                                            <input type="text" class="form-control" value="Droit Civil">
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="2">Gestion complète des litiges civils, contrats, et droit de la famille.</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Icône</label>
                                            <select class="form-control">
                                                <option value="fas fa-gavel">Marteau (Gavel)</option>
                                                <option value="fas fa-shield-alt">Bouclier</option>
                                                <option value="fas fa-balance-scale" selected>Balance</option>
                                                <option value="fas fa-user-tie">Avocat</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Couleur</label>
                                            <input type="color" class="form-control" value="#1cc88a">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger btn-sm" onclick="removeService(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveServicesSection()">
                        <i class="fas fa-save mr-1"></i>Enregistrer Services
                    </button>
                </div>

                <!-- About Section -->
                <div class="tab-pane fade" id="about" role="tabpanel">
                    <form id="aboutForm">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label for="aboutTitle" class="form-label">Titre Section</label>
                                    <input type="text" class="form-control" id="aboutTitle"
                                           value="Pourquoi Choisir Axe Legal ?">
                                </div>
                                <div class="mb-3">
                                    <label for="aboutContent" class="form-label">Contenu</label>
                                    <textarea class="form-control" id="aboutContent" rows="6">Fort de plus de 15 ans d'expérience, notre cabinet se distingue par son expertise reconnue dans tous les domaines du droit ivoirien. Nous mettons notre savoir-faire au service de particuliers et d'entreprises pour garantir la meilleure défense de leurs intérêts.</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Points Clés</label>
                                    <div id="keyPointsContainer">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" value="Plus de 15 ans d'expérience">
                                            <div class="input-group-append">
                                                <button class="btn btn-danger" onclick="removeKeyPoint(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" value="Expertise reconnue">
                                            <div class="input-group-append">
                                                <button class="btn btn-danger" onclick="removeKeyPoint(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" value="Approche personnalisée">
                                            <div class="input-group-append">
                                                <button class="btn btn-danger" onclick="removeKeyPoint(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-success btn-sm" onclick="addKeyPoint()">
                                        <i class="fas fa-plus mr-1"></i>Ajouter Point
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="aboutImage" class="form-label">Image Section</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="aboutImage" accept="image/*">
                                        <label class="custom-file-label" for="aboutImage">Choisir image...</label>
                                    </div>
                                    <div class="mt-2">
                                        <img id="aboutImagePreview" src="{{ asset('images/about-default.jpg') }}"
                                             class="img-fluid rounded" alt="About preview" style="max-height: 200px;">
                                    </div>
                                </div>
                                <div class="card border-info">
                                    <div class="card-body">
                                        <h6 class="text-info">Statistiques</h6>
                                        <div class="mb-2">
                                            <label>Années d'expérience</label>
                                            <input type="number" class="form-control" value="15">
                                        </div>
                                        <div class="mb-2">
                                            <label>Clients satisfaits</label>
                                            <input type="number" class="form-control" value="500">
                                        </div>
                                        <div class="mb-2">
                                            <label>Affaires gagnées (%)</label>
                                            <input type="number" class="form-control" value="95">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="saveAboutSection()">
                            <i class="fas fa-save mr-1"></i>Enregistrer Section À Propos
                        </button>
                    </form>
                </div>

                <!-- Testimonials Section -->
                <div class="tab-pane fade" id="testimonials" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5>Témoignages Clients</h5>
                        <button class="btn btn-success btn-sm" onclick="addTestimonial()">
                            <i class="fas fa-plus mr-1"></i>Ajouter Témoignage
                        </button>
                    </div>
                    <div id="testimonialsContainer">
                        <div class="testimonial-item card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-2">
                                            <label class="form-label">Témoignage</label>
                                            <textarea class="form-control" rows="3">"Excellent service juridique ! Me. Diabaté m'a parfaitement défendu et obtenu un résultat favorable. Je recommande vivement ce cabinet."</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Nom du Client</label>
                                                <input type="text" class="form-control" value="Kouassi Alain">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Fonction/Entreprise</label>
                                                <input type="text" class="form-control" value="Directeur Commercial">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Note (/5)</label>
                                            <select class="form-control">
                                                <option value="5" selected>5 étoiles</option>
                                                <option value="4">4 étoiles</option>
                                                <option value="3">3 étoiles</option>
                                            </select>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label">Publié</label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger btn-sm" onclick="removeTestimonial(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-item card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-2">
                                            <label class="form-label">Témoignage</label>
                                            <textarea class="form-control" rows="3">"Professionnel, compétent et à l'écoute. Le cabinet Axe Legal a su résoudre mon litige commercial avec efficacité."</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Nom du Client</label>
                                                <input type="text" class="form-control" value="Fofana Mariame">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Fonction/Entreprise</label>
                                                <input type="text" class="form-control" value="Entrepreneuse">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Note (/5)</label>
                                            <select class="form-control">
                                                <option value="5" selected>5 étoiles</option>
                                                <option value="4">4 étoiles</option>
                                                <option value="3">3 étoiles</option>
                                            </select>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label">Publié</label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger btn-sm" onclick="removeTestimonial(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveTestimonialsSection()">
                        <i class="fas fa-save mr-1"></i>Enregistrer Témoignages
                    </button>
                </div>

                <!-- Blog Section -->
                <div class="tab-pane fade" id="blog" role="tabpanel">
                    <div class="mb-3">
                        <h5>Articles du Blog sur l'Accueil</h5>
                        <p class="text-muted">Sélectionnez les articles à mettre en avant sur la page d'accueil</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="showBlogSection" checked>
                                <label class="form-check-label" for="showBlogSection">
                                    Afficher la section blog
                                </label>
                            </div>
                            <div class="mb-3">
                                <label for="blogSectionTitle" class="form-label">Titre de la section</label>
                                <input type="text" class="form-control" id="blogSectionTitle"
                                       value="Derniers Articles Juridiques">
                            </div>
                            <div class="mb-3">
                                <label for="blogCount" class="form-label">Nombre d'articles à afficher</label>
                                <select class="form-control" id="blogCount">
                                    <option value="3" selected>3 articles</option>
                                    <option value="4">4 articles</option>
                                    <option value="6">6 articles</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0">Articles Récents</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label">
                                            <strong>Nouveau Code Pénal 2025</strong><br>
                                            <small class="text-muted">Publié le 05/01/2025</small>
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label">
                                            <strong>Droit du Travail : Nouvelles Lois</strong><br>
                                            <small class="text-muted">Publié le 03/01/2025</small>
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label">
                                            <strong>Guide du Droit Commercial</strong><br>
                                            <small class="text-muted">Publié le 01/01/2025</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveBlogSection()">
                        <i class="fas fa-save mr-1"></i>Enregistrer Section Blog
                    </button>
                </div>

                <!-- Contact Section -->
                <div class="tab-pane fade" id="contact" role="tabpanel">
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="contactTitle" class="form-label">Titre Section</label>
                                    <input type="text" class="form-control" id="contactTitle"
                                           value="Contactez-Nous">
                                </div>
                                <div class="mb-3">
                                    <label for="contactSubtitle" class="form-label">Sous-titre</label>
                                    <textarea class="form-control" id="contactSubtitle" rows="2">Nous sommes à votre disposition pour répondre à vos questions et vous accompagner dans vos démarches juridiques.</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="contactPhone" class="form-label">Téléphone</label>
                                        <input type="tel" class="form-control" id="contactPhone"
                                               value="+225 27 20 30 40 50">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="contactEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="contactEmail"
                                               value="contact@axelegal.ci">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="contactAddress" class="form-label">Adresse</label>
                                    <textarea class="form-control" id="contactAddress" rows="3">Plateau, Rue des Jardins
                                    Immeuble les Harmonies, 3ème étage
                                    Abidjan, Côte d'Ivoire</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Horaires d'ouverture</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control mb-2" value="Lundi - Vendredi">
                                            <input type="text" class="form-control mb-2" value="Samedi">
                                            <input type="text" class="form-control mb-2" value="Dimanche">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control mb-2" value="8h00 - 18h00">
                                            <input type="text" class="form-control mb-2" value="8h00 - 12h00">
                                            <input type="text" class="form-control mb-2" value="Fermé">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="showMap" checked>
                                    <label class="form-check-label" for="showMap">
                                        Afficher la carte Google Maps
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="showContactForm" checked>
                                    <label class="form-check-label" for="showContactForm">
                                        Afficher le formulaire de contact
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="saveContactSection()">
                            <i class="fas fa-save mr-1"></i>Enregistrer Section Contact
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SEO and Meta Settings -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-warning">
                <i class="fas fa-search mr-2"></i>
                Référencement SEO
            </h6>
        </div>
        <div class="card-body">
            <form id="seoForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="metaTitle" class="form-label">Titre de la page (Meta Title)</label>
                            <input type="text" class="form-control" id="metaTitle"
                                   value="Axe Legal - Cabinet d'Avocat en Côte d'Ivoire" maxlength="60">
                            <div class="progress mt-1" style="height: 3px;">
                                <div class="progress-bar bg-success" style="width: 70%"></div>
                            </div>
                            <small class="text-muted">42/60 caractères</small>
                        </div>
                        <div class="mb-3">
                            <label for="metaDescription" class="form-label">Description (Meta Description)</label>
                            <textarea class="form-control" id="metaDescription" rows="3" maxlength="160">Cabinet d'avocat expert en droit pénal, civil et commercial. Plus de 15 ans d'expérience en Côte d'Ivoire. Consultation gratuite.</textarea>
                            <div class="progress mt-1" style="height: 3px;">
                                <div class="progress-bar bg-success" style="width: 80%"></div>
                            </div>
                            <small class="text-muted">128/160 caractères</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="metaKeywords" class="form-label">Mots-clés</label>
                            <textarea class="form-control" id="metaKeywords" rows="2">avocat côte d'ivoire, cabinet juridique abidjan, droit pénal, droit civil, conseil juridique</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ogImage" class="form-label">Image de partage (Open Graph)</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="ogImage" accept="image/*">
                                <label class="custom-file-label" for="ogImage">Choisir image...</label>
                            </div>
                            <small class="form-text text-muted">Recommandé: 1200x630 pixels</small>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-warning" onclick="saveSEOSettings()">
                    <i class="fas fa-search mr-1"></i>Enregistrer SEO
                </button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize content management
        initializeContentManagement();

        // Update character counters
        updateCharacterCounters();
    });

    function initializeContentManagement() {
        // File input labels
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
        });

        // Image preview functionality
        $('#heroImage').on('change', function() {
            previewImage(this, 'heroImagePreview');
        });

        $('#aboutImage').on('change', function() {
            previewImage(this, 'aboutImagePreview');
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

    function updateCharacterCounters() {
        const metaTitle = document.getElementById('metaTitle');
        const metaDescription = document.getElementById('metaDescription');

        metaTitle.addEventListener('input', function() {
            const length = this.value.length;
            const progress = (length / 60) * 100;
            const progressBar = this.parentElement.querySelector('.progress-bar');
            const counter = this.parentElement.querySelector('small');

            progressBar.style.width = Math.min(progress, 100) + '%';
            progressBar.className = `progress-bar ${progress > 100 ? 'bg-danger' : progress > 80 ? 'bg-warning' : 'bg-success'}`;
            counter.textContent = `${length}/60 caractères`;
        });

        metaDescription.addEventListener('input', function() {
            const length = this.value.length;
            const progress = (length / 160) * 100;
            const progressBar = this.parentElement.querySelector('.progress-bar');
            const counter = this.parentElement.querySelector('small');

            progressBar.style.width = Math.min(progress, 100) + '%';
            progressBar.className = `progress-bar ${progress > 100 ? 'bg-danger' : progress > 80 ? 'bg-warning' : 'bg-success'}`;
            counter.textContent = `${length}/160 caractères`;
        });
    }

    // Services management
    function addService() {
        const container = document.getElementById('servicesContainer');
        const newService = document.createElement('div');
        newService.className = 'service-item card mb-3';
        newService.innerHTML = `
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-2">
                            <label class="form-label">Titre du Service</label>
                            <input type="text" class="form-control" placeholder="Nom du service">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="2" placeholder="Description du service"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                            <label class="form-label">Icône</label>
                            <select class="form-control">
                                <option value="fas fa-gavel">Marteau (Gavel)</option>
                                <option value="fas fa-shield-alt">Bouclier</option>
                                <option value="fas fa-balance-scale">Balance</option>
                                <option value="fas fa-user-tie">Avocat</option>
                                <option value="fas fa-briefcase">Mallette</option>
                                <option value="fas fa-handshake">Poignée de main</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Couleur</label>
                            <input type="color" class="form-control" value="#f6c23e">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger btn-sm" onclick="removeService(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(newService);
    }

    function removeService(button) {
        button.closest('.service-item').remove();
    }

    // Key points management
    function addKeyPoint() {
        const container = document.getElementById('keyPointsContainer');
        const newPoint = document.createElement('div');
        newPoint.className = 'input-group mb-2';
        newPoint.innerHTML = `
            <input type="text" class="form-control" placeholder="Nouveau point clé">
            <div class="input-group-append">
                <button class="btn btn-danger" onclick="removeKeyPoint(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(newPoint);
    }

    function removeKeyPoint(button) {
        button.closest('.input-group').remove();
    }

    // Testimonials management
    function addTestimonial() {
        const container = document.getElementById('testimonialsContainer');
        const newTestimonial = document.createElement('div');
        newTestimonial.className = 'testimonial-item card mb-3';
        newTestimonial.innerHTML = `
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-2">
                            <label class="form-label">Témoignage</label>
                            <textarea class="form-control" rows="3" placeholder="Témoignage du client..."></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Nom du Client</label>
                                <input type="text" class="form-control" placeholder="Nom complet">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fonction/Entreprise</label>
                                <input type="text" class="form-control" placeholder="Fonction ou entreprise">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                            <label class="form-label">Note (/5)</label>
                            <select class="form-control">
                                <option value="5" selected>5 étoiles</option>
                                <option value="4">4 étoiles</option>
                                <option value="3">3 étoiles</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Publié</label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger btn-sm" onclick="removeTestimonial(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(newTestimonial);
    }

    function removeTestimonial(button) {
        button.closest('.testimonial-item').remove();
    }

    // Save functions
    function saveHeroSection() {
        console.log('Saving hero section...');
        alert('Section Héro enregistrée avec succès !');
    }

    function saveServicesSection() {
        console.log('Saving services section...');
        alert('Section Services enregistrée avec succès !');
    }

    function saveAboutSection() {
        console.log('Saving about section...');
        alert('Section À Propos enregistrée avec succès !');
    }

    function saveTestimonialsSection() {
        console.log('Saving testimonials section...');
        alert('Section Témoignages enregistrée avec succès !');
    }

    function saveBlogSection() {
        console.log('Saving blog section...');
        alert('Section Blog enregistrée avec succès !');
    }

    function saveContactSection() {
        console.log('Saving contact section...');
        alert('Section Contact enregistrée avec succès !');
    }

    function saveSEOSettings() {
        console.log('Saving SEO settings...');
        alert('Paramètres SEO enregistrés avec succès !');
    }

    // Global actions
    function previewSite() {
        console.log('Opening site preview...');
        window.open('/preview', '_blank');
    }

    function publishChanges() {
        if (confirm('Êtes-vous sûr de vouloir publier les modifications sur le site ?')) {
            console.log('Publishing changes...');
            alert('Modifications publiées avec succès !');
        }
    }

    function saveDraft() {
        console.log('Saving as draft...');
        alert('Brouillon enregistré !');
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

    .service-item, .testimonial-item {
        border-left: 4px solid #4e73df;
    }

    .form-check-label {
        line-height: 1.4;
    }

    .progress {
        border-radius: 10px;
    }

    .input-group .btn {
        border-left: 0;
    }

    .custom-file-label.selected {
        color: #495057;
    }
</style>
@endsection
