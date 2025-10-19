@extends('dashboard.layout')

@section('title', 'Legal-Tech - Intelligence Artificielle Juridique - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-robot text-primary mr-2"></i>
            Legal-Tech - IA Juridique
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Legal-Tech</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button class="btn btn-success btn-sm" onclick="upgradeToAI()">
                    <i class="fas fa-crown mr-1"></i>
                    <span class="d-none d-sm-inline">Upgrade IA Premium</span>
                    <span class="d-sm-none">Premium</span>
                </button>
                <button class="btn btn-primary btn-sm" onclick="newAIAnalysis()">
                    <i class="fas fa-plus mr-1"></i>
                    <span class="d-none d-sm-inline">Nouvelle Analyse</span>
                    <span class="d-sm-none">Analyse</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Demandes de Documents Section -->
    <div class="row">
        <div class="col-12">
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h4 class="font-weight-bold text-primary mb-2">
                                <i class="fas fa-file-download mr-2"></i>
                                Demandes de Documents Juridiques
                            </h4>
                            <p class="mb-3 text-gray-700">
                                Consultez et gérez toutes les demandes de documents juridiques soumises par les visiteurs du site.
                                Vous pouvez suivre l'état de chaque demande, ajouter des notes internes et contacter directement les clients.
                            </p>
                            <div class="d-flex flex-wrap">
                                <span class="badge badge-primary mr-2 mb-1">
                                    <i class="fas fa-home mr-1"></i>Immobilier
                                </span>
                                <span class="badge badge-purple mr-2 mb-1" style="background-color: #8b5cf6;">
                                    <i class="fas fa-briefcase mr-1"></i>Droit du Travail
                                </span>
                                <span class="badge badge-success mr-2 mb-1">
                                    <i class="fas fa-building mr-1"></i>Entreprise
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center">
                            <a href="{{ route('dashboard.legal-tech.demandes') }}" class="btn btn-primary btn-lg btn-block shadow-sm">
                                <i class="fas fa-list mr-2"></i>
                                Voir toutes les demandes
                            </a>
                            <small class="text-muted d-block mt-2">
                                <i class="fas fa-clock mr-1"></i>
                                Mises à jour en temps réel
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden File Input -->
    <input type="file" id="contractFileInput" style="display: none;" accept=".pdf,.doc,.docx" onchange="handleFileUpload(this)">
@endsection

@section('styles')
<style>
    .border-dashed {
        border-style: dashed !important;
        border-width: 2px !important;
    }

    .contract-upload-zone {
        transition: all 0.3s;
        cursor: pointer;
    }

    .contract-upload-zone:hover {
        background-color: rgba(78, 115, 223, 0.1);
        transform: translateY(-2px);
    }

    .pricing-card {
        transition: all 0.3s;
    }

    .pricing-card:hover {
        transform: scale(1.05);
    }

    .badge-outline-success {
        border: 1px solid #1cc88a;
        color: #1cc88a;
        background: transparent;
        transition: all 0.2s;
    }

    .badge-outline-success:hover,
    .badge-outline-success.active {
        background-color: #1cc88a;
        color: white;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .risk-meter {
        position: relative;
    }

    .assistant-chat {
        background: #f8f9fc;
    }

    .assistant-message {
        animation: fadeInUp 0.3s ease-in-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .avatar-circle {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .card {
        transition: all 0.3s;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    @media (max-width: 768px) {
        .btn-group {
            flex-direction: column;
        }

        .btn-group .btn {
            margin-bottom: 0.25rem;
        }

        .pricing-card {
            margin-top: 1rem;
        }

        .table-responsive {
            font-size: 0.875rem;
        }
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Initialize DataTable
    $(document).ready(function() {
        $('#analysisHistoryTable').DataTable({
            "pageLength": 10,
            "order": [[ 0, "desc" ]],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "columnDefs": [
                { "orderable": false, "targets": [7] }
            ]
        });

        // Initialize risk chart
        initRiskChart();

        // Auto-save functionality
        setInterval(autoSave, 120000); // Every 2 minutes
    });

    // Risk Chart initialization
    function initRiskChart() {
        const ctx = document.getElementById('riskChart').getContext('2d');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Faible', 'Moyen', 'Élevé'],
                datasets: [{
                    data: [60, 30, 10],
                    backgroundColor: [
                        '#1cc88a',
                        '#f6c23e',
                        '#e74a3b'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
                cutout: '70%'
            }
        });
    }

    // Contract Analysis Functions
    function uploadContract() {
        document.getElementById('contractFileInput').click();
    }

    function handleFileUpload(input) {
        const file = input.files[0];
        if (file) {
            // Show upload progress
            Swal.fire({
                title: 'Téléchargement en cours...',
                text: `Téléchargement de ${file.name}`,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Simulate upload progress
            setTimeout(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Fichier téléchargé !',
                    text: 'Prêt pour l\'analyse IA',
                    timer: 2000,
                    showConfirmButton: false
                });

                // Update UI
                updateUploadZone(file);
            }, 2000);
        }
    }

    function updateUploadZone(file) {
        const uploadZone = document.querySelector('.contract-upload-zone');
        uploadZone.innerHTML = `
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fas fa-file-pdf text-danger fa-2x mr-3"></i>
                    <div>
                        <h6 class="font-weight-bold mb-0">${file.name}</h6>
                        <small class="text-muted">${(file.size / 1024 / 1024).toFixed(2)} MB</small>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm" onclick="removeFile()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
    }

    function removeFile() {
        const uploadZone = document.querySelector('.contract-upload-zone');
        uploadZone.innerHTML = `
            <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
            <h6 class="font-weight-bold text-primary">Déposez votre contrat ici</h6>
            <p class="text-muted mb-0">ou cliquez pour sélectionner un fichier</p>
            <small class="text-muted">PDF, DOC, DOCX acceptés (max 10MB)</small>
        `;
        document.getElementById('contractFileInput').value = '';
    }

    function analyzeContract() {
        const fileInput = document.getElementById('contractFileInput');
        if (!fileInput.files[0]) {
            Swal.fire({
                icon: 'warning',
                title: 'Aucun fichier sélectionné',
                text: 'Veuillez d\'abord télécharger un contrat à analyser.'
            });
            return;
        }

        // Show analysis progress
        Swal.fire({
            title: 'Analyse IA en cours...',
            html: `
                <div class="progress mb-3">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%"></div>
                </div>
                <div id="analysisStatus">Préparation de l'analyse...</div>
            `,
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                simulateAnalysisProgress();
            }
        });
    }

    function simulateAnalysisProgress() {
        const progressBar = document.querySelector('.progress-bar');
        const statusDiv = document.getElementById('analysisStatus');
        let progress = 0;

        const steps = [
            { progress: 20, status: 'Extraction du texte...' },
            { progress: 40, status: 'Analyse des clauses...' },
            { progress: 60, status: 'Vérification de conformité...' },
            { progress: 80, status: 'Détection des risques...' },
            { progress: 100, status: 'Finalisation du rapport...' }
        ];

        let currentStep = 0;
        const interval = setInterval(() => {
            if (currentStep < steps.length) {
                const step = steps[currentStep];
                progressBar.style.width = step.progress + '%';
                statusDiv.textContent = step.status;
                currentStep++;
            } else {
                clearInterval(interval);
                showAnalysisResults();
            }
        }, 1000);
    }

    function showAnalysisResults() {
        Swal.fire({
            icon: 'success',
            title: 'Analyse terminée !',
            html: `
                <div class="text-left">
                    <h6 class="font-weight-bold text-success mb-3">Résultats de l'analyse IA :</h6>
                    <div class="mb-2">
                        <span class="badge badge-success mr-2">✓</span>
                        <strong>Conformité légale :</strong> 98.7%
                    </div>
                    <div class="mb-2">
                        <span class="badge badge-warning mr-2">⚠</span>
                        <strong>Risques détectés :</strong> 2 clauses à revoir
                    </div>
                    <div class="mb-2">
                        <span class="badge badge-info mr-2">ℹ</span>
                        <strong>Suggestions :</strong> 5 améliorations proposées
                    </div>
                    <div class="mb-3">
                        <span class="badge badge-primary mr-2">$</span>
                        <strong>Coût :</strong> 2 500 FCFA
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-sm mr-2" onclick="viewDetailedReport()">
                            <i class="fas fa-file-alt mr-1"></i>Rapport détaillé
                        </button>
                        <button class="btn btn-success btn-sm" onclick="downloadAnalysis()">
                            <i class="fas fa-download mr-1"></i>Télécharger
                        </button>
                    </div>
                </div>
            `,
            showConfirmButton: true,
            confirmButtonText: 'Fermer'
        });
    }

    // Legal Research Functions
    function searchLegal() {
        const query = document.getElementById('legalQuery').value.trim();
        if (!query) {
            Swal.fire({
                icon: 'warning',
                title: 'Requête vide',
                text: 'Veuillez saisir votre question juridique.'
            });
            return;
        }

        // Show search progress
        Swal.fire({
            title: 'Recherche IA en cours...',
            text: 'Analyse de la jurisprudence et de la doctrine...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        setTimeout(() => {
            showSearchResults(query);
        }, 3000);
    }

    function showSearchResults(query) {
        Swal.fire({
            icon: 'success',
            title: 'Recherche terminée !',
            html: `
                <div class="text-left">
                    <h6 class="font-weight-bold text-success mb-3">Résultats pour : "${query}"</h6>
                    <div class="mb-2">
                        <span class="badge badge-primary mr-2">📚</span>
                        <strong>Jurisprudences trouvées :</strong> 47 décisions
                    </div>
                    <div class="mb-2">
                        <span class="badge badge-info mr-2">📖</span>
                        <strong>Articles doctrinaux :</strong> 23 références
                    </div>
                    <div class="mb-2">
                        <span class="badge badge-success mr-2">⚖️</span>
                        <strong>Textes légaux :</strong> 12 articles de loi
                    </div>
                    <div class="mb-3">
                        <span class="badge badge-warning mr-2">💰</span>
                        <strong>Coût :</strong> 1 000 FCFA
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-sm mr-2" onclick="viewSearchResults()">
                            <i class="fas fa-search mr-1"></i>Voir résultats
                        </button>
                        <button class="btn btn-success btn-sm" onclick="exportSearchResults()">
                            <i class="fas fa-file-export mr-1"></i>Exporter
                        </button>
                    </div>
                </div>
            `,
            showConfirmButton: true,
            confirmButtonText: 'Fermer'
        });
    }

    function toggleDomain(element) {
        element.classList.toggle('active');
        element.classList.toggle('badge-outline-success');
        element.classList.toggle('badge-success');
    }

    // Document Generation Functions
    function generateDocument() {
        const docType = document.getElementById('documentType').value;
        if (!docType) {
            Swal.fire({
                icon: 'warning',
                title: 'Type non sélectionné',
                text: 'Veuillez sélectionner un type de document.'
            });
            return;
        }

        const aiOptimization = document.getElementById('aiOptimization').checked;
        const legalCompliance = document.getElementById('legalCompliance').checked;

        // Show generation progress
        Swal.fire({
            title: 'Génération en cours...',
            text: 'L\'IA crée votre document personalisé...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        setTimeout(() => {
            showGenerationResults(docType, aiOptimization, legalCompliance);
        }, 4000);
    }

    function showGenerationResults(docType, aiOptimization, legalCompliance) {
        const docNames = {
            'contract': 'Contrat de travail',
            'nda': 'Accord de confidentialité',
            'partnership': 'Contrat de partenariat',
            'lease': 'Bail commercial',
            'service': 'Contrat de service',
            'consultation': 'Contrat de consultation'
        };

        Swal.fire({
            icon: 'success',
            title: 'Document généré !',
            html: `
                <div class="text-left">
                    <h6 class="font-weight-bold text-success mb-3">${docNames[docType]} créé avec succès</h6>
                    <div class="mb-2">
                        <span class="badge badge-primary mr-2">📄</span>
                        <strong>Pages :</strong> 8 pages
                    </div>
                    <div class="mb-2">
                        <span class="badge badge-info mr-2">🤖</span>
                        <strong>IA activée :</strong> ${aiOptimization ? 'Oui' : 'Non'}
                    </div>
                    <div class="mb-2">
                        <span class="badge badge-success mr-2">⚖️</span>
                        <strong>Conformité :</strong> ${legalCompliance ? 'Vérifiée' : 'Standard'}
                    </div>
                    <div class="mb-3">
                        <span class="badge badge-warning mr-2">💰</span>
                        <strong>Coût :</strong> 1 500 FCFA
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-sm mr-2" onclick="previewDocument()">
                            <i class="fas fa-eye mr-1"></i>Aperçu
                        </button>
                        <button class="btn btn-success btn-sm" onclick="downloadDocument()">
                            <i class="fas fa-download mr-1"></i>Télécharger
                        </button>
                    </div>
                </div>
            `,
            showConfirmButton: true,
            confirmButtonText: 'Fermer'
        });
    }

    // Risk Analysis Functions
    function analyzeRisk() {
        Swal.fire({
            title: 'Analyse des risques',
            text: 'Évaluation des risques juridiques et financiers...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        setTimeout(() => {
            showRiskResults();
        }, 3000);
    }

    function showRiskResults() {
        Swal.fire({
            icon: 'info',
            title: 'Analyse des risques terminée',
            html: `
                <div class="text-left">
                    <h6 class="font-weight-bold text-info mb-3">Évaluation des risques :</h6>
                    <div class="mb-2">
                        <span class="badge badge-warning mr-2">⚠️</span>
                        <strong>Risque global :</strong> Moyen (6.2/10)
                    </div>
                    <div class="mb-2">
                        <span class="badge badge-danger mr-2">⚡</span>
                        <strong>Points critiques :</strong> 3 éléments à surveiller
                    </div>
                    <div class="mb-2">
                        <span class="badge badge-success mr-2">✅</span>
                        <strong>Recommandations :</strong> 7 actions proposées
                    </div>
                    <div class="mb-3">
                        <span class="badge badge-primary mr-2">💰</span>
                        <strong>Coût :</strong> 3 000 FCFA
                    </div>
                    <div class="text-center">
                        <button class="btn btn-warning btn-sm" onclick="viewRiskReport()">
                            <i class="fas fa-chart-pie mr-1"></i>Rapport détaillé
                        </button>
                    </div>
                </div>
            `,
            showConfirmButton: true,
            confirmButtonText: 'Fermer'
        });
    }

    // AI Assistant Functions
    function askAssistant() {
        const query = document.getElementById('assistantQuery').value.trim();
        if (!query) return;

        // Add user message
        addAssistantMessage(query, 'user');

        // Clear input
        document.getElementById('assistantQuery').value = '';

        // Show typing indicator
        showAssistantTyping();

        // Simulate AI response
        setTimeout(() => {
            const responses = [
                "Cette question relève du droit des contrats. Selon l'article 1134 du Code civil béninois, les conventions légalement formées tiennent lieu de loi à ceux qui les ont faites.",
                "D'après ma base de données juridique, voici les éléments clés à retenir pour votre situation...",
                "La jurisprudence récente en la matière indique que les tribunaux considèrent généralement...",
                "Pour ce type de clause, je recommande de prévoir les éléments suivants dans le contrat...",
                "Cette problématique est fréquente en droit béninois. Voici mon analyse basée sur les textes en vigueur..."
            ];

            const randomResponse = responses[Math.floor(Math.random() * responses.length)];
            hideAssistantTyping();
            addAssistantMessage(randomResponse, 'assistant');
        }, 2000);
    }

    function addAssistantMessage(message, sender) {
        const chatContainer = document.querySelector('.assistant-chat');
        const messageDiv = document.createElement('div');
        messageDiv.className = 'assistant-message mb-2';

        if (sender === 'user') {
            messageDiv.innerHTML = `
                <div class="d-flex align-items-start justify-content-end">
                    <div class="flex-grow-1 text-right">
                        <div class="bg-primary text-white p-2 rounded" style="display: inline-block; max-width: 80%;">
                            <small>${message}</small>
                        </div>
                    </div>
                    <div class="avatar-circle bg-primary text-white ml-2" style="width: 30px; height: 30px; font-size: 0.8rem;">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="d-flex align-items-start">
                    <div class="avatar-circle bg-secondary text-white mr-2" style="width: 30px; height: 30px; font-size: 0.8rem;">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="bg-light p-2 rounded">
                            <small>${message}</small>
                        </div>
                    </div>
                </div>
            `;
        }

        chatContainer.appendChild(messageDiv);
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    function showAssistantTyping() {
        const chatContainer = document.querySelector('.assistant-chat');
        const typingDiv = document.createElement('div');
        typingDiv.className = 'assistant-message mb-2';
        typingDiv.id = 'typingIndicator';
        typingDiv.innerHTML = `
            <div class="d-flex align-items-start">
                <div class="avatar-circle bg-secondary text-white mr-2" style="width: 30px; height: 30px; font-size: 0.8rem;">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="bg-light p-2 rounded">
                        <small>
                            <i class="fas fa-circle text-secondary mr-1" style="animation: pulse 1s infinite;"></i>
                            L'assistant réfléchit...
                        </small>
                    </div>
                </div>
            </div>
        `;

        chatContainer.appendChild(typingDiv);
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    function hideAssistantTyping() {
        const typingIndicator = document.getElementById('typingIndicator');
        if (typingIndicator) {
            typingIndicator.remove();
        }
    }

    // Enter key handler for assistant
    document.getElementById('assistantQuery').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            askAssistant();
        }
    });

    // Utility Functions
    function upgradeToAI() {
        Swal.fire({
            title: 'Upgrade vers IA Premium',
            html: `
                <div class="text-left">
                    <h6 class="font-weight-bold text-warning mb-3">Avantages Premium :</h6>
                    <ul class="text-left">
                        <li>Analyses illimitées de contrats</li>
                        <li>Recherche juridique avancée</li>
                        <li>Génération automatique de documents</li>
                        <li>Support prioritaire 24/7</li>
                        <li>API d'intégration</li>
                    </ul>
                    <div class="text-center mt-3">
                        <h4 class="text-warning font-weight-bold">25 000 FCFA/mois</h4>
                        <small class="text-muted">Essai gratuit de 14 jours</small>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Commencer l\'essai',
            cancelButtonText: 'Plus tard',
            confirmButtonColor: '#f6c23e'
        }).then((result) => {
            if (result.value) {
                Swal.fire('Essai activé !', 'Vous avez maintenant accès à toutes les fonctionnalités Premium.', 'success');
            }
        });
    }

    function newAIAnalysis() {
        Swal.fire({
            title: 'Nouvelle analyse IA',
            input: 'select',
            inputOptions: {
                'contract': 'Analyse de contrat',
                'search': 'Recherche juridique',
                'document': 'Génération de document',
                'risk': 'Analyse des risques',
                'assistant': 'Consultation IA'
            },
            inputPlaceholder: 'Sélectionner le type d\'analyse',
            showCancelButton: true,
            confirmButtonText: 'Continuer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                // Redirect to appropriate function based on selection
                switch(result.value) {
                    case 'contract':
                        uploadContract();
                        break;
                    case 'search':
                        document.getElementById('legalQuery').focus();
                        break;
                    case 'document':
                        document.getElementById('documentType').focus();
                        break;
                    case 'risk':
                        analyzeRisk();
                        break;
                    case 'assistant':
                        document.getElementById('assistantQuery').focus();
                        break;
                }
            }
        });
    }

    // History table actions
    function viewAnalysis(id) {
        Swal.fire({
            icon: 'info',
            title: 'Détails de l\'analyse #' + id,
            text: 'Ouverture du rapport détaillé...',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function downloadReport(id) {
        Swal.fire({
            icon: 'success',
            title: 'Téléchargement',
            text: 'Le rapport #' + id + ' est en cours de téléchargement...',
            timer: 2000,
            showConfirmButton: false
        });
    }

    // Additional helper functions
    function viewDetailedReport() {
        console.log('Opening detailed analysis report...');
    }

    function downloadAnalysis() {
        console.log('Downloading analysis results...');
    }

    function viewSearchResults() {
        console.log('Opening search results...');
    }

    function exportSearchResults() {
        console.log('Exporting search results...');
    }

    function previewDocument() {
        console.log('Previewing generated document...');
    }

    function downloadDocument() {
        console.log('Downloading generated document...');
    }

    function viewRiskReport() {
        console.log('Opening risk analysis report...');
    }

    function autoSave() {
        console.log('Auto-saving AI session data...');
    }

    // Pulse animation for typing indicator
    const style = document.createElement('style');
    style.textContent = `
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.3; }
            100% { opacity: 1; }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection
