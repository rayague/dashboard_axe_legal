@extends('dashboard.layout')

@section('title', 'Nouveau Rendez-vous - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-calendar-plus text-success mr-2"></i>
            Nouveau Rendez-vous
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Rendez-vous</li>
                    <li class="breadcrumb-item active" aria-current="page">Nouveau</li>
                </ol>
            </nav>
            <a href="{{ route('dashboard.rendez-vous.planning') }}" class="btn btn-outline-success btn-sm">
                <i class="fas fa-calendar mr-1"></i>
                <span class="d-none d-sm-inline">Voir Planning</span>
                <span class="d-sm-none">Planning</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">RDV Aujourd'hui</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cette Semaine</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">34</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-week fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Avocats Disponibles</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Salle Libre</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Salle A</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-door-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Appointment Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">
                <i class="fas fa-plus-circle mr-2"></i>
                Programmer un Nouveau Rendez-vous
            </h6>
        </div>
        <div class="card-body">
            <form id="newAppointmentForm">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-lg-6">
                        <h6 class="font-weight-bold text-success mb-3">
                            <i class="fas fa-user mr-2"></i>Informations Client
                        </h6>

                        <div class="form-group">
                            <label for="clientSelect" class="font-weight-bold">Client *</label>
                            <div class="input-group">
                                <select class="form-control" id="clientSelect" required>
                                    <option value="">Sélectionner un client</option>
                                    <option value="sophie-bernard">Sophie Bernard - Entrepreneuse</option>
                                    <option value="michel-dubois">Michel Dubois - Salarié</option>
                                    <option value="isabelle-leroy">Isabelle Leroy - Propriétaire</option>
                                    <option value="jean-martin">Jean Martin - Commerçant</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#newClientModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phoneNumber" class="font-weight-bold">Téléphone</label>
                            <input type="tel" class="form-control" id="phoneNumber" placeholder="06 12 34 56 78">
                        </div>

                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="client@email.com">
                        </div>

                        <div class="form-group">
                            <label for="rdvType" class="font-weight-bold">Type de rendez-vous *</label>
                            <select class="form-control" id="rdvType" required>
                                <option value="">Sélectionner le type</option>
                                <option value="consultation">Consultation juridique</option>
                                <option value="signature">Signature de documents</option>
                                <option value="suivi">Suivi de dossier</option>
                                <option value="mediation">Médiation</option>
                                <option value="conseil">Conseil stratégique</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="urgency" class="font-weight-bold">Niveau d'urgence</label>
                            <select class="form-control" id="urgency">
                                <option value="normal">Normal</option>
                                <option value="urgent">Urgent</option>
                                <option value="tres-urgent">Très urgent</option>
                            </select>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-6">
                        <h6 class="font-weight-bold text-success mb-3">
                            <i class="fas fa-calendar-alt mr-2"></i>Planification
                        </h6>

                        <div class="form-group">
                            <label for="lawyerSelect" class="font-weight-bold">Avocat assigné *</label>
                            <select class="form-control" id="lawyerSelect" required>
                                <option value="">Sélectionner un avocat</option>
                                <option value="marie-dubois" data-specialty="Droit des affaires" data-rate="60000">Me Marie Dubois - Droit des affaires</option>
                                <option value="pierre-martin" data-specialty="Droit du travail" data-rate="45000">Me Pierre Martin - Droit du travail</option>
                                <option value="sophie-bernard" data-specialty="Droit de la famille" data-rate="55000">Me Sophie Bernard - Droit de la famille</option>
                                <option value="jean-dupont" data-specialty="Droit pénal" data-rate="65000">Me Jean Dupont - Droit pénal</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="appointmentDate" class="font-weight-bold">Date *</label>
                                    <input type="date" class="form-control" id="appointmentDate" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="appointmentTime" class="font-weight-bold">Heure *</label>
                                    <input type="time" class="form-control" id="appointmentTime" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duration" class="font-weight-bold">Durée (minutes) *</label>
                                    <select class="form-control" id="duration" required>
                                        <option value="">Sélectionner</option>
                                        <option value="30">30 minutes</option>
                                        <option value="60">1 heure</option>
                                        <option value="90">1h30</option>
                                        <option value="120">2 heures</option>
                                        <option value="180">3 heures</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="meetingRoom" class="font-weight-bold">Salle</label>
                                    <select class="form-control" id="meetingRoom">
                                        <option value="">Sélectionner une salle</option>
                                        <option value="salle-a">Salle A - 4 personnes</option>
                                        <option value="salle-b">Salle B - 8 personnes</option>
                                        <option value="salle-c">Salle C - 12 personnes</option>
                                        <option value="visio">Visioconférence</option>
                                        <option value="externe">Lieu externe</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="estimatedCost" class="font-weight-bold">Coût estimé (FCFA)</label>
                            <input type="number" class="form-control" id="estimatedCost" readonly placeholder="Calculé automatiquement">
                        </div>
                    </div>
                </div>

                <!-- Full Width Section -->
                <div class="row mt-3">
                    <div class="col-12">
                        <h6 class="font-weight-bold text-success mb-3">
                            <i class="fas fa-file-alt mr-2"></i>Détails du Rendez-vous
                        </h6>

                        <div class="form-group">
                            <label for="subject" class="font-weight-bold">Objet du rendez-vous *</label>
                            <input type="text" class="form-control" id="subject" required placeholder="Ex: Révision contrat de travail">
                        </div>

                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Description détaillée</label>
                            <textarea class="form-control" id="description" rows="4" placeholder="Décrivez le contexte, les documents à apporter, les questions spécifiques..."></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Options supplémentaires</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="reminder">
                                        <label class="custom-control-label" for="reminder">Envoyer un rappel 24h avant</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="videoConference">
                                        <label class="custom-control-label" for="videoConference">Prévoir visioconférence</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="interpretation">
                                        <label class="custom-control-label" for="interpretation">Besoin d'interprétation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="documents" class="font-weight-bold">Documents à préparer</label>
                                    <textarea class="form-control" id="documents" rows="3" placeholder="Liste des documents nécessaires..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-group mt-4">
                    <div class="d-flex justify-content-between">
                        <div>
                            <button type="button" class="btn btn-outline-secondary" onclick="resetForm()">
                                <i class="fas fa-undo mr-1"></i>
                                Réinitialiser
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-outline-success mr-2" onclick="saveDraft()">
                                <i class="fas fa-save mr-1"></i>
                                Sauvegarder brouillon
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-calendar-check mr-1"></i>
                                Programmer le rendez-vous
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Recent Appointments -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-history mr-2"></i>
                Rendez-vous Récents
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Client</th>
                            <th class="d-none d-md-table-cell">Avocat</th>
                            <th class="d-none d-sm-table-cell">Date & Heure</th>
                            <th>Statut</th>
                            <th class="d-none d-lg-table-cell">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="font-weight-bold">Sophie Bernard</div>
                                <div class="small text-muted">Consultation juridique</div>
                            </td>
                            <td class="d-none d-md-table-cell">Me Marie Dubois</td>
                            <td class="d-none d-sm-table-cell">
                                <div>Demain 14h30</div>
                                <div class="small text-muted">1h</div>
                            </td>
                            <td>
                                <span class="badge badge-success">Confirmé</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <button class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="font-weight-bold">Michel Dubois</div>
                                <div class="small text-muted">Suivi de dossier</div>
                            </td>
                            <td class="d-none d-md-table-cell">Me Pierre Martin</td>
                            <td class="d-none d-sm-table-cell">
                                <div>Aujourd'hui 16h00</div>
                                <div class="small text-muted">45min</div>
                            </td>
                            <td>
                                <span class="badge badge-info">En cours</span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <button class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-video"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- New Client Modal -->
    <div class="modal fade" id="newClientModal" tabindex="-1" role="dialog" aria-labelledby="newClientModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="newClientModalLabel">
                        <i class="fas fa-user-plus mr-2"></i>
                        Nouveau Client
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="newClientForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clientFirstName">Prénom *</label>
                                    <input type="text" class="form-control" id="clientFirstName" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clientLastName">Nom *</label>
                                    <input type="text" class="form-control" id="clientLastName" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="clientEmail">Email *</label>
                            <input type="email" class="form-control" id="clientEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="clientPhone">Téléphone *</label>
                            <input type="tel" class="form-control" id="clientPhone" required>
                        </div>
                        <div class="form-group">
                            <label for="clientType">Type de client</label>
                            <select class="form-control" id="clientType">
                                <option value="particulier">Particulier</option>
                                <option value="entreprise">Entreprise</option>
                                <option value="association">Association</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-success" onclick="createNewClient()">
                        <i class="fas fa-save mr-1"></i>
                        Créer le client
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Auto-calculate estimated cost
    function calculateCost() {
        const lawyer = document.getElementById('lawyerSelect');
        const duration = document.getElementById('duration').value;
        const costField = document.getElementById('estimatedCost');

        if (lawyer.value && duration && lawyer.selectedOptions[0]) {
            const hourlyRate = parseInt(lawyer.selectedOptions[0].dataset.rate) || 50000;
            const cost = Math.round((hourlyRate * duration) / 60);
            costField.value = cost;
        } else {
            costField.value = '';
        }
    }

    // Event listeners
    document.getElementById('lawyerSelect').addEventListener('change', calculateCost);
    document.getElementById('duration').addEventListener('change', calculateCost);

    // Auto-fill client info
    document.getElementById('clientSelect').addEventListener('change', function() {
        const selectedClient = this.value;

        // Mock data - replace with actual client data
        const clientData = {
            'sophie-bernard': {
                email: 'sophie.bernard@email.com',
                phone: '06 12 34 56 78'
            },
            'michel-dubois': {
                email: 'michel.dubois@email.com',
                phone: '06 98 76 54 32'
            },
            'isabelle-leroy': {
                email: 'isabelle.leroy@email.com',
                phone: '06 55 44 33 22'
            }
        };

        if (clientData[selectedClient]) {
            document.getElementById('email').value = clientData[selectedClient].email;
            document.getElementById('phoneNumber').value = clientData[selectedClient].phone;
        }
    });

    // Set minimum date to today
    document.getElementById('appointmentDate').min = new Date().toISOString().split('T')[0];

    // Form validation and submission
    document.getElementById('newAppointmentForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Basic validation
        const requiredFields = ['clientSelect', 'rdvType', 'lawyerSelect', 'appointmentDate', 'appointmentTime', 'duration', 'subject'];
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
            // Show success message
            Swal.fire({
                title: 'Rendez-vous programmé !',
                text: 'Le rendez-vous a été ajouté au planning avec succès.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    // Redirect to planning or reset form
                    resetForm();
                }
            });
        } else {
            Swal.fire({
                title: 'Erreur',
                text: 'Veuillez remplir tous les champs obligatoires.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });

    // Reset form
    function resetForm() {
        document.getElementById('newAppointmentForm').reset();
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    }

    // Save draft
    function saveDraft() {
        Swal.fire({
            title: 'Brouillon sauvegardé',
            text: 'Vous pouvez reprendre la saisie plus tard.',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    }

    // Create new client
    function createNewClient() {
        const form = document.getElementById('newClientForm');
        const firstName = document.getElementById('clientFirstName').value;
        const lastName = document.getElementById('clientLastName').value;
        const email = document.getElementById('clientEmail').value;
        const phone = document.getElementById('clientPhone').value;

        if (firstName && lastName && email && phone) {
            // Add to client select
            const option = new Option(`${firstName} ${lastName}`, `${firstName.toLowerCase()}-${lastName.toLowerCase()}`);
            document.getElementById('clientSelect').add(option);
            document.getElementById('clientSelect').value = option.value;

            // Fill contact info
            document.getElementById('email').value = email;
            document.getElementById('phoneNumber').value = phone;

            // Close modal and reset form
            $('#newClientModal').modal('hide');
            form.reset();

            Swal.fire({
                title: 'Client créé !',
                text: 'Le nouveau client a été ajouté et sélectionné.',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }
    }

    // Initialize tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
@endsection
