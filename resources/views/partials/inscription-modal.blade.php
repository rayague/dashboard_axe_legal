<!-- Modal d'inscription à la formation -->
<div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 20px; border: none;">
            <div class="modal-header" style="background: linear-gradient(135deg, var(--primary-blue) 0%, #1976d2 100%); color: white; border-radius: 20px 20px 0 0; padding: 2rem;">
                <div>
                    <h5 class="modal-title" id="inscriptionModalLabel" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem;">
                        <i class="fas fa-user-plus"></i> Inscription à la formation
                    </h5>
                    <p id="formation-titre" style="margin: 0; opacity: 0.9; font-size: 1rem;"></p>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 2rem;">
                <form id="inscriptionForm">
                    <input type="hidden" id="formation_id" name="formation_id">
                    
                    <!-- Notification -->
                    <div id="inscription-notification" style="display: none; padding: 1rem; border-radius: 10px; margin-bottom: 1.5rem;"></div>

                    <div class="row">
                        <!-- Nom -->
                        <div class="col-md-6 mb-3">
                            <label for="nom" class="form-label" style="font-weight: 600; color: var(--text-dark);">
                                Nom <span style="color: red;">*</span>
                            </label>
                            <input type="text" class="form-control" id="nom" name="nom" required style="
                                border-radius: 10px;
                                padding: 0.75rem;
                                border: 1px solid #ddd;
                            ">
                        </div>

                        <!-- Prénom -->
                        <div class="col-md-6 mb-3">
                            <label for="prenom" class="form-label" style="font-weight: 600; color: var(--text-dark);">
                                Prénom <span style="color: red;">*</span>
                            </label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required style="
                                border-radius: 10px;
                                padding: 0.75rem;
                                border: 1px solid #ddd;
                            ">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label" style="font-weight: 600; color: var(--text-dark);">
                                Email <span style="color: red;">*</span>
                            </label>
                            <input type="email" class="form-control" id="email" name="email" required style="
                                border-radius: 10px;
                                padding: 0.75rem;
                                border: 1px solid #ddd;
                            ">
                        </div>

                        <!-- Téléphone -->
                        <div class="col-md-6 mb-3">
                            <label for="telephone" class="form-label" style="font-weight: 600; color: var(--text-dark);">
                                Téléphone <span style="color: red;">*</span>
                            </label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" required style="
                                border-radius: 10px;
                                padding: 0.75rem;
                                border: 1px solid #ddd;
                            ">
                        </div>

                        <!-- Entreprise -->
                        <div class="col-md-6 mb-3">
                            <label for="entreprise" class="form-label" style="font-weight: 600; color: var(--text-dark);">
                                Entreprise
                            </label>
                            <input type="text" class="form-control" id="entreprise" name="entreprise" style="
                                border-radius: 10px;
                                padding: 0.75rem;
                                border: 1px solid #ddd;
                            ">
                        </div>

                        <!-- Fonction -->
                        <div class="col-md-6 mb-3">
                            <label for="fonction" class="form-label" style="font-weight: 600; color: var(--text-dark);">
                                Fonction
                            </label>
                            <input type="text" class="form-control" id="fonction" name="fonction" style="
                                border-radius: 10px;
                                padding: 0.75rem;
                                border: 1px solid #ddd;
                            ">
                        </div>

                        <!-- Message -->
                        <div class="col-12 mb-3">
                            <label for="message" class="form-label" style="font-weight: 600; color: var(--text-dark);">
                                Message / Commentaire
                            </label>
                            <textarea class="form-control" id="message" name="message" rows="3" style="
                                border-radius: 10px;
                                padding: 0.75rem;
                                border: 1px solid #ddd;
                            "></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="padding: 1.5rem 2rem; border-top: 1px solid #e9ecef;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="
                    border-radius: 10px;
                    padding: 0.75rem 1.5rem;
                    font-weight: 600;
                ">
                    <i class="fas fa-times"></i> Annuler
                </button>
                <button type="submit" form="inscriptionForm" class="btn btn-primary" id="submitInscription" style="
                    border-radius: 10px;
                    padding: 0.75rem 1.5rem;
                    font-weight: 600;
                    background: var(--primary-blue);
                    border: none;
                ">
                    <i class="fas fa-paper-plane"></i> Envoyer l'inscription
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = new bootstrap.Modal(document.getElementById('inscriptionModal'));
    const form = document.getElementById('inscriptionForm');
    const notification = document.getElementById('inscription-notification');

    // Gérer les clics sur les boutons S'inscrire
    document.querySelectorAll('.inscrire-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const formationId = this.getAttribute('data-formation-id');
            const formationTitre = this.getAttribute('data-formation-titre');
            
            document.getElementById('formation_id').value = formationId;
            document.getElementById('formation-titre').textContent = formationTitre;
            
            // Réinitialiser le formulaire
            form.reset();
            document.getElementById('formation_id').value = formationId;
            notification.style.display = 'none';
            
            modal.show();
        });
    });

    // Soumettre le formulaire
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = document.getElementById('submitInscription');
        const formationId = document.getElementById('formation_id').value;
        const formData = new FormData(form);
        
        // Désactiver le bouton
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
        
        fetch(`/formations/${formationId}/inscrire`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Inscription enregistrée avec succès ! Nous vous contacterons bientôt.', 'success');
                
                setTimeout(() => {
                    modal.hide();
                    form.reset();
                }, 2000);
            } else {
                showNotification(data.message || 'Une erreur est survenue.', 'error');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            showNotification('Une erreur est survenue lors de l\'inscription.', 'error');
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Envoyer l\'inscription';
        });
    });

    function showNotification(message, type) {
        notification.textContent = message;
        notification.style.display = 'block';
        notification.style.background = type === 'success' ? '#d4edda' : '#f8d7da';
        notification.style.color = type === 'success' ? '#155724' : '#721c24';
        notification.style.border = `1px solid ${type === 'success' ? '#c3e6cb' : '#f5c6cb'}`;
    }
});
</script>
