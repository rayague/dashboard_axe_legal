@extends('dashboard.layout')

@section('title', 'Gestion Contact - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-address-book text-primary mr-2"></i>
            Gestion Contact & Coordonnées
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Messages & Contact</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-info btn-sm" onclick="previewContactPage()">
                    <i class="fas fa-eye mr-1"></i>
                    <span class="d-none d-sm-inline">Aperçu</span>
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="publishContactInfo()">
                    <i class="fas fa-globe mr-1"></i>
                    <span class="d-none d-sm-inline">Publier</span>
                </button>
                <button type="button" class="btn btn-warning btn-sm" onclick="saveContactDraft()">
                    <i class="fas fa-save mr-1"></i>
                    <span class="d-none d-sm-inline">Brouillon</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Contact Information Management -->
    <div class="row">
        <!-- Main Contact Information -->
        <div class="col-lg-8">
            <!-- General Contact Info -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info-circle mr-2"></i>
                        Informations Générales
                    </h6>
                </div>
                <div class="card-body">
                    <form id="generalContactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cabinetName" class="form-label font-weight-bold">Nom du Cabinet</label>
                                    <input type="text" class="form-control" id="cabinetName" value="Cabinet Axe Legal">
                                </div>
                                <div class="mb-3">
                                    <label for="mainPhone" class="form-label font-weight-bold">Téléphone Principal</label>
                                    <input type="tel" class="form-control" id="mainPhone" value="+225 27 20 30 40 50">
                                </div>
                                <div class="mb-3">
                                    <label for="secondaryPhone" class="form-label font-weight-bold">Téléphone Secondaire</label>
                                    <input type="tel" class="form-control" id="secondaryPhone" value="+225 07 08 09 10 11">
                                </div>
                                <div class="mb-3">
                                    <label for="faxNumber" class="form-label font-weight-bold">Fax</label>
                                    <input type="tel" class="form-control" id="faxNumber" value="+225 27 20 30 40 51">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mainEmail" class="form-label font-weight-bold">Email Principal</label>
                                    <input type="email" class="form-control" id="mainEmail" value="contact@axelegal.ci">
                                </div>
                                <div class="mb-3">
                                    <label for="infoEmail" class="form-label font-weight-bold">Email Information</label>
                                    <input type="email" class="form-control" id="infoEmail" value="info@axelegal.ci">
                                </div>
                                <div class="mb-3">
                                    <label for="urgentEmail" class="form-label font-weight-bold">Email Urgence</label>
                                    <input type="email" class="form-control" id="urgentEmail" value="urgence@axelegal.ci">
                                </div>
                                <div class="mb-3">
                                    <label for="websiteUrl" class="form-label font-weight-bold">Site Web</label>
                                    <input type="url" class="form-control" id="websiteUrl" value="https://www.axelegal.ci">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="saveGeneralContact()">
                            <i class="fas fa-save mr-1"></i>Enregistrer Informations Générales
                        </button>
                    </form>
                </div>
            </div>

            <!-- Physical Address -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Adresse Physique
                    </h6>
                </div>
                <div class="card-body">
                    <form id="addressForm">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="streetAddress" class="form-label font-weight-bold">Adresse</label>
                                    <input type="text" class="form-control" id="streetAddress" value="Rue des Jardins, Immeuble les Harmonies">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="city" class="form-label font-weight-bold">Ville</label>
                                            <input type="text" class="form-control" id="city" value="Abidjan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="district" class="form-label font-weight-bold">Commune/Quartier</label>
                                            <input type="text" class="form-control" id="district" value="Plateau">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="postalCode" class="form-label font-weight-bold">Code Postal</label>
                                            <input type="text" class="form-control" id="postalCode" value="BP 1234">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="country" class="form-label font-weight-bold">Pays</label>
                                            <input type="text" class="form-control" id="country" value="Côte d'Ivoire">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="addressDetails" class="form-label font-weight-bold">Détails d'accès</label>
                                    <textarea class="form-control" id="addressDetails" rows="3">3ème étage, bureau 305
Face à la station Total du Plateau
Ascenseur disponible, parking gratuit</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label font-weight-bold">Coordonnées GPS</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Lat</span>
                                        </div>
                                        <input type="text" class="form-control" id="latitude" value="5.325524">
                                    </div>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Lng</span>
                                        </div>
                                        <input type="text" class="form-control" id="longitude" value="-4.024429">
                                    </div>
                                    <button type="button" class="btn btn-outline-info btn-sm btn-block" onclick="getLocationFromAddress()">
                                        <i class="fas fa-map-pin mr-1"></i>Obtenir GPS
                                    </button>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="showOnMap" checked>
                                    <label class="form-check-label" for="showOnMap">
                                        Afficher sur la carte Google Maps
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="allowDirections" checked>
                                    <label class="form-check-label" for="allowDirections">
                                        Permettre l'itinéraire
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success" onclick="saveAddress()">
                            <i class="fas fa-save mr-1"></i>Enregistrer Adresse
                        </button>
                    </form>
                </div>
            </div>

            <!-- Business Hours -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-clock mr-2"></i>
                        Horaires d'Ouverture
                    </h6>
                </div>
                <div class="card-body">
                    <form id="businessHoursForm">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Jour</th>
                                        <th>Ouvert</th>
                                        <th>Ouverture</th>
                                        <th>Fermeture</th>
                                        <th>Pause</th>
                                        <th>Début Pause</th>
                                        <th>Fin Pause</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Lundi</strong></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" value="08:00"></td>
                                        <td><input type="time" class="form-control form-control-sm" value="18:00"></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" value="12:30"></td>
                                        <td><input type="time" class="form-control form-control-sm" value="14:00"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mardi</strong></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" value="08:00"></td>
                                        <td><input type="time" class="form-control form-control-sm" value="18:00"></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" value="12:30"></td>
                                        <td><input type="time" class="form-control form-control-sm" value="14:00"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mercredi</strong></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" value="08:00"></td>
                                        <td><input type="time" class="form-control form-control-sm" value="18:00"></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" value="12:30"></td>
                                        <td><input type="time" class="form-control form-control-sm" value="14:00"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Jeudi</strong></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" value="08:00"></td>
                                        <td><input type="time" class="form-control form-control-sm" value="18:00"></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" value="12:30"></td>
                                        <td><input type="time" class="form-control form-control-sm" value="14:00"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vendredi</strong></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" value="08:00"></td>
                                        <td><input type="time" class="form-control form-control-sm" value="18:00"></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" value="12:30"></td>
                                        <td><input type="time" class="form-control form-control-sm" value="14:00"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Samedi</strong></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" value="08:00"></td>
                                        <td><input type="time" class="form-control form-control-sm" value="12:00"></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" disabled></td>
                                        <td><input type="time" class="form-control form-control-sm" disabled></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Dimanche</strong></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" disabled></td>
                                        <td><input type="time" class="form-control form-control-sm" disabled></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                            </div>
                                        </td>
                                        <td><input type="time" class="form-control form-control-sm" disabled></td>
                                        <td><input type="time" class="form-control form-control-sm" disabled></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="holidayNote" class="form-label font-weight-bold">Note Jours Fériés</label>
                                    <textarea class="form-control" id="holidayNote" rows="2">Fermé les jours fériés ivoiriens. Consultations d'urgence sur rendez-vous.</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="vacationNote" class="form-label font-weight-bold">Note Congés</label>
                                    <textarea class="form-control" id="vacationNote" rows="2">Fermeture annuelle du 15 au 31 août. Service d'urgence assuré.</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-info" onclick="saveBusinessHours()">
                            <i class="fas fa-save mr-1"></i>Enregistrer Horaires
                        </button>
                    </form>
                </div>
            </div>

            <!-- Social Media & Online Presence -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">
                        <i class="fas fa-share-alt mr-2"></i>
                        Présence en Ligne & Réseaux Sociaux
                    </h6>
                </div>
                <div class="card-body">
                    <form id="socialMediaForm">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold text-primary mb-3">Réseaux Sociaux</h6>
                                <div class="mb-3">
                                    <label for="facebookUrl" class="form-label">
                                        <i class="fab fa-facebook text-primary mr-2"></i>Facebook
                                    </label>
                                    <input type="url" class="form-control" id="facebookUrl" value="https://facebook.com/axelegal">
                                </div>
                                <div class="mb-3">
                                    <label for="linkedinUrl" class="form-label">
                                        <i class="fab fa-linkedin text-info mr-2"></i>LinkedIn
                                    </label>
                                    <input type="url" class="form-control" id="linkedinUrl" value="https://linkedin.com/company/axelegal">
                                </div>
                                <div class="mb-3">
                                    <label for="twitterUrl" class="form-label">
                                        <i class="fab fa-twitter text-info mr-2"></i>Twitter/X
                                    </label>
                                    <input type="url" class="form-control" id="twitterUrl" value="https://twitter.com/axelegal">
                                </div>
                                <div class="mb-3">
                                    <label for="instagramUrl" class="form-label">
                                        <i class="fab fa-instagram text-danger mr-2"></i>Instagram
                                    </label>
                                    <input type="url" class="form-control" id="instagramUrl" value="https://instagram.com/axelegal">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold text-success mb-3">Plateformes Professionnelles</h6>
                                <div class="mb-3">
                                    <label for="googleBusiness" class="form-label">
                                        <i class="fab fa-google text-danger mr-2"></i>Google My Business
                                    </label>
                                    <input type="url" class="form-control" id="googleBusiness" value="">
                                    <small class="text-muted">URL de votre fiche Google Business</small>
                                </div>
                                <div class="mb-3">
                                    <label for="whatsappNumber" class="form-label">
                                        <i class="fab fa-whatsapp text-success mr-2"></i>WhatsApp Business
                                    </label>
                                    <input type="tel" class="form-control" id="whatsappNumber" value="+225 07 08 09 10 11">
                                </div>
                                <div class="mb-3">
                                    <label for="youtubeChannel" class="form-label">
                                        <i class="fab fa-youtube text-danger mr-2"></i>Chaîne YouTube
                                    </label>
                                    <input type="url" class="form-control" id="youtubeChannel" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="telegramChannel" class="form-label">
                                        <i class="fab fa-telegram text-info mr-2"></i>Canal Telegram
                                    </label>
                                    <input type="url" class="form-control" id="telegramChannel" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6 class="font-weight-bold text-info mb-3">Options d'Affichage</h6>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="showSocialIcons" checked>
                                            <label class="form-check-label" for="showSocialIcons">
                                                Afficher icônes réseaux sociaux
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="showWhatsappButton" checked>
                                            <label class="form-check-label" for="showWhatsappButton">
                                                Bouton WhatsApp flottant
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="showGoogleReviews" checked>
                                            <label class="form-check-label" for="showGoogleReviews">
                                                Avis Google
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableSocialShare">
                                            <label class="form-check-label" for="enableSocialShare">
                                                Partage social activé
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning mt-3" onclick="saveSocialMedia()">
                            <i class="fas fa-save mr-1"></i>Enregistrer Réseaux Sociaux
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Contact Form Settings & Emergency Info -->
        <div class="col-lg-4">
            <!-- Contact Form Configuration -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-wpforms mr-2"></i>
                        Configuration Formulaire
                    </h6>
                </div>
                <div class="card-body">
                    <form id="contactFormConfig">
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Champs Obligatoires</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="requireName" checked>
                                <label class="form-check-label" for="requireName">
                                    Nom complet
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="requireEmail" checked>
                                <label class="form-check-label" for="requireEmail">
                                    Adresse email
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="requirePhone" checked>
                                <label class="form-check-label" for="requirePhone">
                                    Numéro de téléphone
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="requireSubject">
                                <label class="form-check-label" for="requireSubject">
                                    Sujet du message
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="requireLegalArea">
                                <label class="form-check-label" for="requireLegalArea">
                                    Domaine juridique
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="autoReplyTemplate" class="form-label font-weight-bold">Réponse Automatique</label>
                            <textarea class="form-control" id="autoReplyTemplate" rows="4">Merci pour votre message. Nous accusons réception de votre demande et vous répondrons dans les plus brefs délais.

L'équipe du Cabinet Axe Legal</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Notifications</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="emailNotification" checked>
                                <label class="form-check-label" for="emailNotification">
                                    Notification par email
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="smsNotification">
                                <label class="form-check-label" for="smsNotification">
                                    Notification par SMS
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="slackNotification">
                                <label class="form-check-label" for="slackNotification">
                                    Notification Slack
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="maxFileSize" class="form-label font-weight-bold">Taille Max Fichiers (MB)</label>
                            <input type="number" class="form-control" id="maxFileSize" value="10" min="1" max="50">
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="enableCaptcha" checked>
                            <label class="form-check-label" for="enableCaptcha">
                                Activer CAPTCHA anti-spam
                            </label>
                        </div>

                        <button type="button" class="btn btn-success btn-sm btn-block" onclick="saveContactFormConfig()">
                            <i class="fas fa-save mr-1"></i>Enregistrer Configuration
                        </button>
                    </form>
                </div>
            </div>

            <!-- Emergency Contact -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Contact d'Urgence
                    </h6>
                </div>
                <div class="card-body">
                    <form id="emergencyContactForm">
                        <div class="mb-3">
                            <label for="emergencyPhone" class="form-label font-weight-bold">Téléphone d'Urgence</label>
                            <input type="tel" class="form-control" id="emergencyPhone" value="+225 01 02 03 04 05">
                        </div>
                        <div class="mb-3">
                            <label for="emergencyEmail" class="form-label font-weight-bold">Email d'Urgence</label>
                            <input type="email" class="form-control" id="emergencyEmail" value="urgence@axelegal.ci">
                        </div>
                        <div class="mb-3">
                            <label for="emergencyHours" class="form-label font-weight-bold">Horaires d'Urgence</label>
                            <textarea class="form-control" id="emergencyHours" rows="3">Disponible 24h/24 et 7j/7 pour les urgences pénales et civiles.

Tarif majoré de 50% en dehors des heures ouvrables.</textarea>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="showEmergencyInfo" checked>
                            <label class="form-check-label" for="showEmergencyInfo">
                                Afficher les informations d'urgence
                            </label>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm btn-block" onclick="saveEmergencyContact()">
                            <i class="fas fa-save mr-1"></i>Enregistrer Contact d'Urgence
                        </button>
                    </form>
                </div>
            </div>

            <!-- Quick Statistics -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-chart-bar mr-2"></i>
                        Statistiques Contact
                    </h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-6">
                                <div class="h5 mb-0 font-weight-bold text-primary">1,247</div>
                                <div class="text-xs text-gray-800 text-uppercase">Messages reçus</div>
                            </div>
                            <div class="col-6">
                                <div class="h5 mb-0 font-weight-bold text-success">98.5%</div>
                                <div class="text-xs text-gray-800 text-uppercase">Taux réponse</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div class="h5 mb-0 font-weight-bold text-warning">2.4h</div>
                                <div class="text-xs text-gray-800 text-uppercase">Temps moyen</div>
                            </div>
                            <div class="col-6">
                                <div class="h5 mb-0 font-weight-bold text-info">342</div>
                                <div class="text-xs text-gray-800 text-uppercase">Ce mois</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Preview -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-secondary">
                        <i class="fas fa-map mr-2"></i>
                        Aperçu Carte
                    </h6>
                </div>
                <div class="card-body text-center">
                    <div class="map-placeholder bg-light p-4 rounded">
                        <i class="fas fa-map-marked-alt fa-3x text-muted mb-2"></i>
                        <p class="text-muted">Aperçu de votre localisation sur Google Maps</p>
                        <button class="btn btn-outline-info btn-sm" onclick="openFullMap()">
                            <i class="fas fa-external-link-alt mr-1"></i>Voir carte complète
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize contact management
        initializeContactManagement();
        
        // Setup business hours toggles
        setupBusinessHoursToggles();
    });

    function initializeContactManagement() {
        // Auto-format phone numbers
        $('input[type="tel"]').on('input', function() {
            formatPhoneNumber(this);
        });

        // Validate email addresses
        $('input[type="email"]').on('blur', function() {
            validateEmail(this);
        });

        // GPS coordinates validation
        $('#latitude, #longitude').on('input', function() {
            validateCoordinates();
        });
    }

    function setupBusinessHoursToggles() {
        // Handle day open/close toggles
        $('tbody tr').each(function() {
            const $row = $(this);
            const $openCheckbox = $row.find('td:nth-child(2) input[type="checkbox"]');
            const $pauseCheckbox = $row.find('td:nth-child(5) input[type="checkbox"]');
            
            $openCheckbox.on('change', function() {
                const isOpen = $(this).is(':checked');
                $row.find('input[type="time"]').prop('disabled', !isOpen);
                $pauseCheckbox.prop('disabled', !isOpen);
                
                if (!isOpen) {
                    $pauseCheckbox.prop('checked', false);
                }
            });
            
            $pauseCheckbox.on('change', function() {
                const hasPause = $(this).is(':checked');
                $row.find('td:nth-child(6) input, td:nth-child(7) input').prop('disabled', !hasPause);
            });
        });
    }

    function formatPhoneNumber(input) {
        let value = input.value.replace(/\D/g, '');
        
        // Format for Ivorian numbers
        if (value.startsWith('225')) {
            value = value.replace(/(\d{3})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/, '+$1 $2 $3 $4 $5 $6');
        } else if (value.length === 10) {
            value = value.replace(/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/, '$1 $2 $3 $4 $5');
        }
        
        input.value = value;
    }

    function validateEmail(input) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const isValid = emailRegex.test(input.value);
        
        if (input.value && !isValid) {
            $(input).addClass('is-invalid');
        } else {
            $(input).removeClass('is-invalid');
        }
    }

    function validateCoordinates() {
        const lat = parseFloat($('#latitude').val());
        const lng = parseFloat($('#longitude').val());
        
        const latValid = lat >= -90 && lat <= 90;
        const lngValid = lng >= -180 && lng <= 180;
        
        $('#latitude').toggleClass('is-invalid', !latValid);
        $('#longitude').toggleClass('is-invalid', !lngValid);
    }

    function getLocationFromAddress() {
        const address = $('#streetAddress').val() + ', ' + $('#city').val() + ', ' + $('#country').val();
        
        // Simulate geocoding (in real implementation, use Google Geocoding API)
        console.log('Geocoding address:', address);
        
        // Mock coordinates for Abidjan Plateau
        $('#latitude').val('5.325524');
        $('#longitude').val('-4.024429');
        
        alert('Coordonnées GPS obtenues avec succès !');
    }

    // Save functions
    function saveGeneralContact() {
        const formData = {
            cabinetName: $('#cabinetName').val(),
            mainPhone: $('#mainPhone').val(),
            secondaryPhone: $('#secondaryPhone').val(),
            faxNumber: $('#faxNumber').val(),
            mainEmail: $('#mainEmail').val(),
            infoEmail: $('#infoEmail').val(),
            urgentEmail: $('#urgentEmail').val(),
            websiteUrl: $('#websiteUrl').val()
        };
        
        console.log('Saving general contact:', formData);
        alert('Informations générales enregistrées avec succès !');
    }

    function saveAddress() {
        const addressData = {
            streetAddress: $('#streetAddress').val(),
            city: $('#city').val(),
            district: $('#district').val(),
            postalCode: $('#postalCode').val(),
            country: $('#country').val(),
            addressDetails: $('#addressDetails').val(),
            latitude: $('#latitude').val(),
            longitude: $('#longitude').val(),
            showOnMap: $('#showOnMap').is(':checked'),
            allowDirections: $('#allowDirections').is(':checked')
        };
        
        console.log('Saving address:', addressData);
        alert('Adresse enregistrée avec succès !');
    }

    function saveBusinessHours() {
        const hoursData = [];
        
        $('tbody tr').each(function() {
            const $row = $(this);
            const day = $row.find('td:first strong').text();
            const isOpen = $row.find('td:nth-child(2) input[type="checkbox"]').is(':checked');
            
            hoursData.push({
                day: day,
                isOpen: isOpen,
                openTime: $row.find('td:nth-child(3) input').val(),
                closeTime: $row.find('td:nth-child(4) input').val(),
                hasPause: $row.find('td:nth-child(5) input[type="checkbox"]').is(':checked'),
                pauseStart: $row.find('td:nth-child(6) input').val(),
                pauseEnd: $row.find('td:nth-child(7) input').val()
            });
        });
        
        console.log('Saving business hours:', hoursData);
        alert('Horaires d\'ouverture enregistrés avec succès !');
    }

    function saveSocialMedia() {
        const socialData = {
            facebook: $('#facebookUrl').val(),
            linkedin: $('#linkedinUrl').val(),
            twitter: $('#twitterUrl').val(),
            instagram: $('#instagramUrl').val(),
            googleBusiness: $('#googleBusiness').val(),
            whatsapp: $('#whatsappNumber').val(),
            youtube: $('#youtubeChannel').val(),
            telegram: $('#telegramChannel').val(),
            showIcons: $('#showSocialIcons').is(':checked'),
            showWhatsapp: $('#showWhatsappButton').is(':checked'),
            showReviews: $('#showGoogleReviews').is(':checked'),
            enableShare: $('#enableSocialShare').is(':checked')
        };
        
        console.log('Saving social media:', socialData);
        alert('Réseaux sociaux enregistrés avec succès !');
    }

    function saveContactFormConfig() {
        const configData = {
            requiredFields: {
                name: $('#requireName').is(':checked'),
                email: $('#requireEmail').is(':checked'),
                phone: $('#requirePhone').is(':checked'),
                subject: $('#requireSubject').is(':checked'),
                legalArea: $('#requireLegalArea').is(':checked')
            },
            autoReply: $('#autoReplyTemplate').val(),
            notifications: {
                email: $('#emailNotification').is(':checked'),
                sms: $('#smsNotification').is(':checked'),
                slack: $('#slackNotification').is(':checked')
            },
            maxFileSize: $('#maxFileSize').val(),
            enableCaptcha: $('#enableCaptcha').is(':checked')
        };
        
        console.log('Saving contact form config:', configData);
        alert('Configuration du formulaire enregistrée avec succès !');
    }

    function saveEmergencyContact() {
        const emergencyData = {
            phone: $('#emergencyPhone').val(),
            email: $('#emergencyEmail').val(),
            hours: $('#emergencyHours').val(),
            showInfo: $('#showEmergencyInfo').is(':checked')
        };
        
        console.log('Saving emergency contact:', emergencyData);
        alert('Contact d\'urgence enregistré avec succès !');
    }

    // Global actions
    function previewContactPage() {
        console.log('Opening contact page preview...');
        window.open('/contact', '_blank');
    }

    function publishContactInfo() {
        if (confirm('Êtes-vous sûr de vouloir publier les informations de contact ?')) {
            console.log('Publishing contact information...');
            alert('Informations de contact publiées avec succès !');
        }
    }

    function saveContactDraft() {
        console.log('Saving contact as draft...');
        alert('Brouillon des informations de contact enregistré !');
    }

    function openFullMap() {
        const lat = $('#latitude').val() || '5.325524';
        const lng = $('#longitude').val() || '-4.024429';
        const mapUrl = `https://www.google.com/maps?q=${lat},${lng}`;
        
        window.open(mapUrl, '_blank');
    }
</script>

<style>
    .table th {
        font-size: 0.85rem;
        background-color: #f8f9fc;
        border-color: #e3e6f0;
    }

    .table td {
        vertical-align: middle;
    }

    .form-control-sm {
        font-size: 0.8rem;
    }

    .form-check {
        margin-bottom: 0.5rem;
    }

    .form-check-input:checked {
        background-color: #4e73df;
        border-color: #4e73df;
    }

    .is-invalid {
        border-color: #e74a3b;
    }

    .map-placeholder {
        min-height: 150px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .fab {
        width: 20px;
    }

    .input-group-text {
        font-size: 0.85rem;
        background-color: #f8f9fc;
        border-color: #d1d3e2;
    }

    @media (max-width: 768px) {
        .table-responsive {
            font-size: 0.8rem;
        }
        
        .btn-block {
            margin-bottom: 10px;
        }
    }
</style>
@endsection