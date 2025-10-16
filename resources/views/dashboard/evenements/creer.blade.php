@extends('dashboard.layout')

@section('title', 'Créer un Événement - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-plus-circle text-primary mr-2"></i>
            Créer un Événement
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('evenements.index') }}">Événements</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Créer</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <a href="{{ route('evenements.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left mr-1"></i>
                    <span class="d-none d-sm-inline">Retour</span>
                </a>
                <button type="button" class="btn btn-info btn-sm" onclick="previewEvent()">
                    <i class="fas fa-eye mr-1"></i>
                    <span class="d-none d-sm-inline">Aperçu</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Event Creation Form -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info-circle mr-2"></i>
                        Informations de l'Événement
                    </h6>
                </div>
                <div class="card-body">
                    <form id="eventForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="eventTitle" class="form-label">Titre de l'événement *</label>
                                <input type="text" class="form-control" id="eventTitle" name="title" required
                                       placeholder="Ex: Conférence sur le Nouveau Code Pénal">
                                <div class="invalid-feedback">
                                    Veuillez saisir un titre pour l'événement.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="eventType" class="form-label">Type d'événement *</label>
                                <select class="form-control" id="eventType" name="type" required>
                                    <option value="">Sélectionner...</option>
                                    <option value="conference">Conférence</option>
                                    <option value="seminar">Séminaire</option>
                                    <option value="webinar">Webinaire</option>
                                    <option value="workshop">Atelier</option>
                                    <option value="training">Formation</option>
                                    <option value="networking">Networking</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="eventDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="eventDescription" name="description" rows="4"
                                      placeholder="Description détaillée de l'événement..."></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="eventDate" class="form-label">Date de l'événement *</label>
                                <input type="date" class="form-control" id="eventDate" name="date" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="eventStartTime" class="form-label">Heure de début *</label>
                                <input type="time" class="form-control" id="eventStartTime" name="start_time" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="eventEndTime" class="form-label">Heure de fin *</label>
                                <input type="time" class="form-control" id="eventEndTime" name="end_time" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="eventLocation" class="form-label">Lieu</label>
                                <input type="text" class="form-control" id="eventLocation" name="location"
                                       placeholder="Ex: Hôtel Ivoire, Salle Eburnéenne">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="eventCapacity" class="form-label">Capacité maximale</label>
                                <input type="number" class="form-control" id="eventCapacity" name="capacity"
                                       min="1" placeholder="Ex: 100">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="eventPrice" class="form-label">Prix (FCFA)</label>
                                <input type="number" class="form-control" id="eventPrice" name="price"
                                       min="0" placeholder="0 = Gratuit">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="eventCategory" class="form-label">Catégorie</label>
                                <select class="form-control" id="eventCategory" name="category">
                                    <option value="">Sélectionner...</option>
                                    <option value="droit_penal">Droit Pénal</option>
                                    <option value="droit_civil">Droit Civil</option>
                                    <option value="droit_commercial">Droit Commercial</option>
                                    <option value="droit_travail">Droit du Travail</option>
                                    <option value="droit_fiscal">Droit Fiscal</option>
                                    <option value="droit_famille">Droit de la Famille</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>
                        </div>

                        <!-- Event Image -->
                        <div class="mb-3">
                            <label for="eventImage" class="form-label">Image de l'événement</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="eventImage" name="image"
                                       accept="image/*" onchange="previewImage(this)">
                                <label class="custom-file-label" for="eventImage">Choisir une image...</label>
                            </div>
                            <small class="form-text text-muted">Formats acceptés: JPG, PNG, GIF. Taille max: 2MB</small>
                            <div id="imagePreview" class="mt-2" style="display: none;">
                                <img id="previewImg" src="" alt="Aperçu" class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        </div>

                        <!-- Event Speakers -->
                        <div class="mb-3">
                            <label class="form-label">Intervenants</label>
                            <div id="speakersContainer">
                                <div class="speaker-item mb-2">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="speakers[0][name]"
                                                   placeholder="Nom de l'intervenant">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="speakers[0][title]"
                                                   placeholder="Titre/Fonction">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="speakers[0][company]"
                                                   placeholder="Organisation">
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="removeSpeaker(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="addSpeaker()">
                                <i class="fas fa-plus mr-1"></i>Ajouter un intervenant
                            </button>
                        </div>

                        <!-- Registration Settings -->
                        <div class="card border-left-info mb-3">
                            <div class="card-body">
                                <h6 class="text-info mb-3">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Paramètres d'inscription
                                </h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="requiresRegistration"
                                                   name="requires_registration" checked>
                                            <label class="form-check-label" for="requiresRegistration">
                                                Inscription requise
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="isPublic"
                                                   name="is_public" checked>
                                            <label class="form-check-label" for="isPublic">
                                                Événement public
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="registrationDeadline" class="form-label">Date limite d'inscription</label>
                                        <input type="date" class="form-control" id="registrationDeadline"
                                               name="registration_deadline">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="mb-3">
                            <label for="eventNotes" class="form-label">Notes supplémentaires</label>
                            <textarea class="form-control" id="eventNotes" name="notes" rows="3"
                                      placeholder="Instructions spéciales, prérequis, matériel nécessaire..."></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Event Summary Card -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-check-circle mr-2"></i>
                        Résumé de l'Événement
                    </h6>
                </div>
                <div class="card-body">
                    <div id="eventSummary">
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-calendar-plus fa-3x mb-3"></i>
                            <p>Remplissez le formulaire pour voir le résumé</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-4">
                        <button type="button" class="btn btn-success btn-block" onclick="saveEvent()">
                            <i class="fas fa-save mr-2"></i>
                            Créer l'Événement
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-block" onclick="saveDraft()">
                            <i class="fas fa-file-alt mr-2"></i>
                            Enregistrer comme brouillon
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">
                        <i class="fas fa-bolt mr-2"></i>
                        Actions Rapides
                    </h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <button class="list-group-item list-group-item-action" onclick="useTemplate()">
                            <i class="fas fa-copy text-info mr-2"></i>
                            Utiliser un modèle
                        </button>
                        <button class="list-group-item list-group-item-action" onclick="duplicateEvent()">
                            <i class="fas fa-clone text-warning mr-2"></i>
                            Dupliquer un événement
                        </button>
                        <button class="list-group-item list-group-item-action" onclick="importEvent()">
                            <i class="fas fa-upload text-success mr-2"></i>
                            Importer depuis un fichier
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tips Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-lightbulb mr-2"></i>
                        Conseils
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-check text-success mr-2"></i>
                            <small>Ajoutez une image attractive pour plus de visibilité</small>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success mr-2"></i>
                            <small>Précisez le niveau de compétence requis</small>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success mr-2"></i>
                            <small>Définissez une date limite d'inscription</small>
                        </li>
                        <li class="mb-0">
                            <i class="fas fa-check text-success mr-2"></i>
                            <small>Mentionnez le matériel nécessaire</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Template Selection Modal -->
    <div class="modal fade" id="templateModal" tabindex="-1" role="dialog" aria-labelledby="templateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="templateModalLabel">
                        <i class="fas fa-copy mr-2"></i>
                        Choisir un Modèle
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card template-card" onclick="applyTemplate('conference')">
                                <div class="card-body text-center">
                                    <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                    <h6>Conférence</h6>
                                    <small class="text-muted">Format présentation avec intervenants</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card template-card" onclick="applyTemplate('webinar')">
                                <div class="card-body text-center">
                                    <i class="fas fa-laptop fa-2x text-success mb-2"></i>
                                    <h6>Webinaire</h6>
                                    <small class="text-muted">Événement en ligne interactif</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card template-card" onclick="applyTemplate('workshop')">
                                <div class="card-body text-center">
                                    <i class="fas fa-tools fa-2x text-warning mb-2"></i>
                                    <h6>Atelier</h6>
                                    <small class="text-muted">Session pratique et interactive</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card template-card" onclick="applyTemplate('training')">
                                <div class="card-body text-center">
                                    <i class="fas fa-graduation-cap fa-2x text-info mb-2"></i>
                                    <h6>Formation</h6>
                                    <small class="text-muted">Programme d'apprentissage structuré</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">
                        <i class="fas fa-eye mr-2"></i>
                        Aperçu de l'Événement
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="eventPreviewContent">
                        <!-- Preview content will be populated by JavaScript -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Fermer
                    </button>
                    <button type="button" class="btn btn-success" onclick="saveEventFromPreview()">
                        <i class="fas fa-save mr-1"></i>Créer l'Événement
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    let speakerCount = 1;

    $(document).ready(function() {
        // Initialize form validation
        initializeFormValidation();

        // Update summary on form changes
        $('#eventForm').on('input change', function() {
            updateEventSummary();
        });

        // Set minimum date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('eventDate').setAttribute('min', today);
        document.getElementById('registrationDeadline').setAttribute('min', today);
    });

    function initializeFormValidation() {
        // Bootstrap validation
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    }

    function updateEventSummary() {
        const title = document.getElementById('eventTitle').value;
        const type = document.getElementById('eventType').value;
        const date = document.getElementById('eventDate').value;
        const startTime = document.getElementById('eventStartTime').value;
        const endTime = document.getElementById('eventEndTime').value;
        const location = document.getElementById('eventLocation').value;
        const capacity = document.getElementById('eventCapacity').value;
        const price = document.getElementById('eventPrice').value;

        if (!title) {
            document.getElementById('eventSummary').innerHTML = `
                <div class="text-center text-muted py-4">
                    <i class="fas fa-calendar-plus fa-3x mb-3"></i>
                    <p>Remplissez le formulaire pour voir le résumé</p>
                </div>
            `;
            return;
        }

        let summaryHtml = `
            <div class="event-summary">
                <h6 class="text-primary">${title}</h6>
                ${type ? `<p class="mb-1"><i class="fas fa-tag mr-2"></i><strong>Type:</strong> ${getTypeLabel(type)}</p>` : ''}
                ${date ? `<p class="mb-1"><i class="fas fa-calendar mr-2"></i><strong>Date:</strong> ${formatDate(date)}</p>` : ''}
                ${startTime && endTime ? `<p class="mb-1"><i class="fas fa-clock mr-2"></i><strong>Horaire:</strong> ${startTime} - ${endTime}</p>` : ''}
                ${location ? `<p class="mb-1"><i class="fas fa-map-marker-alt mr-2"></i><strong>Lieu:</strong> ${location}</p>` : ''}
                ${capacity ? `<p class="mb-1"><i class="fas fa-users mr-2"></i><strong>Capacité:</strong> ${capacity} personnes</p>` : ''}
                <p class="mb-1"><i class="fas fa-money-bill-wave mr-2"></i><strong>Prix:</strong> ${price ? price + ' FCFA' : 'Gratuit'}</p>
            </div>
        `;

        document.getElementById('eventSummary').innerHTML = summaryHtml;
    }

    function getTypeLabel(type) {
        const types = {
            'conference': 'Conférence',
            'seminar': 'Séminaire',
            'webinar': 'Webinaire',
            'workshop': 'Atelier',
            'training': 'Formation',
            'networking': 'Networking'
        };
        return types[type] || type;
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    }

    // Speaker management functions
    function addSpeaker() {
        const container = document.getElementById('speakersContainer');
        const speakerHtml = `
            <div class="speaker-item mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="speakers[${speakerCount}][name]"
                               placeholder="Nom de l'intervenant">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="speakers[${speakerCount}][title]"
                               placeholder="Titre/Fonction">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="speakers[${speakerCount}][company]"
                               placeholder="Organisation">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeSpeaker(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', speakerHtml);
        speakerCount++;
    }

    function removeSpeaker(button) {
        const speakerItem = button.closest('.speaker-item');
        speakerItem.remove();
    }

    // Image preview function
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Template functions
    function useTemplate() {
        $('#templateModal').modal('show');
    }

    function applyTemplate(templateType) {
        const templates = {
            conference: {
                title: 'Conférence sur [Sujet]',
                type: 'conference',
                description: 'Une conférence enrichissante avec des experts du domaine juridique...',
                capacity: 150,
                price: 5000
            },
            webinar: {
                title: 'Webinaire : [Sujet]',
                type: 'webinar',
                description: 'Webinaire interactif en ligne avec session Q&A...',
                location: 'En ligne (Zoom)',
                capacity: 500,
                price: 0
            },
            workshop: {
                title: 'Atelier pratique : [Sujet]',
                type: 'workshop',
                description: 'Atelier pratique avec exercices et cas d\'étude...',
                capacity: 50,
                price: 15000
            },
            training: {
                title: 'Formation : [Sujet]',
                type: 'training',
                description: 'Programme de formation structuré avec certification...',
                capacity: 30,
                price: 25000
            }
        };

        const template = templates[templateType];
        if (template) {
            Object.keys(template).forEach(key => {
                const element = document.getElementById('event' + key.charAt(0).toUpperCase() + key.slice(1));
                if (element) {
                    element.value = template[key];
                }
            });
            updateEventSummary();
        }

        $('#templateModal').modal('hide');
    }

    // Event actions
    function previewEvent() {
        const formData = new FormData(document.getElementById('eventForm'));

        // Generate preview content
        let previewHtml = `
            <div class="event-preview">
                <div class="text-center mb-4">
                    <h2 class="text-primary">${formData.get('title') || 'Titre de l\'événement'}</h2>
                    ${formData.get('type') ? `<span class="badge badge-primary badge-lg">${getTypeLabel(formData.get('type'))}</span>` : ''}
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5>Description</h5>
                                <p>${formData.get('description') || 'Aucune description fournie'}</p>

                                <h5>Détails</h5>
                                <ul class="list-unstyled">
                                    ${formData.get('date') ? `<li><i class="fas fa-calendar mr-2"></i><strong>Date:</strong> ${formatDate(formData.get('date'))}</li>` : ''}
                                    ${formData.get('start_time') && formData.get('end_time') ? `<li><i class="fas fa-clock mr-2"></i><strong>Horaire:</strong> ${formData.get('start_time')} - ${formData.get('end_time')}</li>` : ''}
                                    ${formData.get('location') ? `<li><i class="fas fa-map-marker-alt mr-2"></i><strong>Lieu:</strong> ${formData.get('location')}</li>` : ''}
                                    ${formData.get('capacity') ? `<li><i class="fas fa-users mr-2"></i><strong>Capacité:</strong> ${formData.get('capacity')} personnes</li>` : ''}
                                    <li><i class="fas fa-money-bill-wave mr-2"></i><strong>Prix:</strong> ${formData.get('price') ? formData.get('price') + ' FCFA' : 'Gratuit'}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h6>Inscription</h6>
                                <button class="btn btn-primary btn-block">S'inscrire</button>
                                <small class="text-muted mt-2">
                                    ${formData.get('registration_deadline') ? 'Limite: ' + formatDate(formData.get('registration_deadline')) : 'Pas de limite définie'}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        document.getElementById('eventPreviewContent').innerHTML = previewHtml;
        $('#previewModal').modal('show');
    }

    function saveEvent() {
        const form = document.getElementById('eventForm');
        if (form.checkValidity()) {
            // Simulate save
            console.log('Saving event...');
            alert('Événement créé avec succès !');
            // Redirect to events list
            // window.location.href = '/admin/evenements';
        } else {
            form.reportValidity();
        }
    }

    function saveEventFromPreview() {
        $('#previewModal').modal('hide');
        saveEvent();
    }

    function saveDraft() {
        console.log('Saving draft...');
        alert('Brouillon enregistré !');
    }

    function duplicateEvent() {
        console.log('Duplicating event...');
        alert('Fonction de duplication disponible bientôt.');
    }

    function importEvent() {
        console.log('Importing event...');
        alert('Fonction d\'import disponible bientôt.');
    }
</script>

<style>
    .template-card {
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .template-card:hover {
        border-color: #4e73df;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .speaker-item {
        border: 1px solid #e3e6f0;
        border-radius: 5px;
        padding: 10px;
        background-color: #f8f9fc;
    }

    .event-summary h6 {
        border-bottom: 1px solid #e3e6f0;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .event-preview h2 {
        border-bottom: 2px solid #4e73df;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }

    .badge-lg {
        font-size: 0.9em;
        padding: 8px 16px;
    }

    .custom-file-label::after {
        content: "Parcourir";
    }
</style>
@endsection
