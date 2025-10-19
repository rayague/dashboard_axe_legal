@extends('dashboard.layout')

@section('title', 'Gestion du contenu - À Propos')

@section('content')
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Gestion du contenu - À Propos</h1>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="saveChanges">
            <i class="fas fa-save fa-sm text-white-50 mr-2"></i>Enregistrer
        </button>
    </div>

    <!-- Alert pour les messages de succès/erreur -->
    <div id="alertContainer"></div>

    <!-- Contenu principal -->
    <div class="row">
        <!-- Colonne principale -->
        <div class="col-lg-8">
            <!-- Section Histoire -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-history mr-2"></i>Notre Histoire
                    </h6>
                </div>
                <div class="card-body">
                    <div class="form-group mb-0">
                        <textarea class="form-control" id="history" name="history" rows="6" style="resize: none;">Cabinet fondé en 2020 avec une vision claire : moderniser la pratique juridique au Bénin.</textarea>
                    </div>
                </div>
            </div>

            <!-- Section Mission et Vision -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-bullseye mr-2"></i>Notre Mission
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <textarea class="form-control" id="mission" name="mission" rows="4" style="resize: none;">Rendre la justice accessible grâce à l'innovation technologique et l'excellence juridique.</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-eye mr-2"></i>Notre Vision
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <textarea class="form-control" id="vision" name="vision" rows="4" style="resize: none;">Devenir le cabinet de référence en Afrique de l'Ouest pour l'innovation juridique et la Legal Tech.</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Statistiques -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-bar mr-2"></i>Statistiques Clés
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="small mb-1">Années d'expérience</label>
                                <input type="number" class="form-control" id="years" value="3">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="small mb-1">Clients satisfaits</label>
                                <input type="number" class="form-control" id="clients" value="500">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="small mb-1">Avocats partenaires</label>
                                <input type="number" class="form-control" id="lawyers" value="15">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="small mb-1">Cas traités</label>
                                <input type="number" class="form-control" id="cases" value="1000">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Colonne secondaire -->
        <div class="col-lg-4">
            <!-- Section Valeurs -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-star mr-2"></i>Nos Valeurs
                    </h6>
                    <button type="button" class="btn btn-sm btn-success" id="addValue">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div id="valuesContainer">
                        <div class="value-item mb-2">
                            <div class="input-group">
                                <input type="text" class="form-control" name="values[]" value="Excellence">
                                <div class="input-group-append">
                                    <button class="btn btn-danger remove-value" type="button">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Informations de Contact -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-address-card mr-2"></i>Informations de Contact
                    </h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="small mb-1"><i class="fas fa-map-marker-alt mr-2"></i>Adresse</label>
                        <input type="text" class="form-control" id="address" value="123 Rue du Cabinet, Cotonou, Bénin">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1"><i class="fas fa-phone mr-2"></i>Téléphone</label>
                        <input type="tel" class="form-control" id="phone" value="+229 12 34 56 78">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1"><i class="fas fa-envelope mr-2"></i>Email</label>
                        <input type="email" class="form-control" id="email" value="contact@axe-legal.bj">
                    </div>
                    <div class="form-group mb-0">
                        <label class="small mb-1"><i class="fas fa-clock mr-2"></i>Horaires</label>
                        <input type="text" class="form-control" id="hours" value="Lun-Ven: 8h-18h">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.card {
    border: none;
    border-radius: 0.5rem;
}

.card-header {
    background-color: #f8f9fc;
    border-bottom: 1px solid #eaecf4;
}

.form-control {
    border-radius: 0.35rem;
    border: 1px solid #d1d3e2;
    font-size: 0.9rem;
}

.form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

.btn {
    border-radius: 0.35rem;
}

.value-item .input-group {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.value-item:hover {
    transform: translateY(-1px);
    transition: transform 0.2s ease;
}

.alert {
    border-radius: 0.5rem;
    margin-bottom: 1.5rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .container-fluid {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .card {
        margin-bottom: 1rem;
    }

    .btn-sm {
        padding: .25rem .5rem;
        font-size: .875rem;
    }

    .h3 {
        font-size: 1.5rem;
    }

    .value-item .input-group {
        flex-wrap: nowrap;
    }
}

@media (max-width: 576px) {
    .container-fluid {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .card-body {
        padding: 1rem;
    }

    .form-control {
        font-size: 0.875rem;
    }

    .col-sm-6 {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    #saveChanges {
        width: 100%;
        margin-top: 1rem;
    }

    .d-sm-flex {
        flex-direction: column;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion des valeurs
    const valuesContainer = document.getElementById('valuesContainer');
    const addValueBtn = document.getElementById('addValue');

    // Fonction pour ajouter une nouvelle valeur
    function addNewValue() {
        const valueItem = document.createElement('div');
        valueItem.className = 'value-item mb-2';
        valueItem.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" name="values[]" placeholder="Nouvelle valeur">
                <div class="input-group-append">
                    <button class="btn btn-danger remove-value" type="button">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `;
        valuesContainer.appendChild(valueItem);

        // Animation d'entrée
        valueItem.style.opacity = '0';
        setTimeout(() => {
            valueItem.style.transition = 'opacity 0.3s ease';
            valueItem.style.opacity = '1';
        }, 10);
    }

    // Écouteur pour le bouton d'ajout
    addValueBtn.addEventListener('click', addNewValue);

    // Écouteur pour les boutons de suppression
    valuesContainer.addEventListener('click', function(e) {
        if (e.target.closest('.remove-value')) {
            const valueItem = e.target.closest('.value-item');
            valueItem.style.opacity = '0';
            setTimeout(() => {
                valueItem.remove();
            }, 300);
        }
    });

    // Gestion de la sauvegarde
    const saveBtn = document.getElementById('saveChanges');

    saveBtn.addEventListener('click', function() {
        // Animation du bouton
        saveBtn.disabled = true;
        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin fa-sm text-white-50 mr-2"></i>Enregistrement...';

        // Simulation de la sauvegarde (à remplacer par votre logique d'enregistrement)
        setTimeout(() => {
            // Afficher le message de succès
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show';
            alert.innerHTML = `
                <i class="fas fa-check-circle mr-2"></i>
                Les modifications ont été enregistrées avec succès
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            `;
            document.getElementById('alertContainer').appendChild(alert);

            // Réinitialiser le bouton
            saveBtn.disabled = false;
            saveBtn.innerHTML = '<i class="fas fa-save fa-sm text-white-50 mr-2"></i>Enregistrer';

            // Faire disparaître l'alerte après 5 secondes
            setTimeout(() => {
                alert.classList.remove('show');
                setTimeout(() => alert.remove(), 150);
            }, 5000);
        }, 1000);
    });
});
</script>
@endpush
