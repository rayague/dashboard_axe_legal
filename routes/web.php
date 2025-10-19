<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Routes publiques du site
Route::get('/', [ViewController::class, 'welcome'])->name('welcome');
Route::get('/test', function () {
    return view('test');
});

Route::get('/services', [FormationController::class, 'index'])->name('services');

Route::get('/equipe', function () {
    return view('equipe');
})->name('equipe');

Route::get('/processus', function () {
    return view('processus');
})->name('processus');

Route::get('/temoignages', function () {
    return view('temoignage');
})->name('temoignage');

Route::get('/legal-tech', function () {
    return view('legalTech');
})->name('legalTech');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/consultation', function () {
    return view('consultation');
})->name('consultation');

// POST endpoints for forms
Route::post('/contact', [ContactController::class, 'submitContact'])->name('contact.submit');
Route::post('/consultation', [ContactController::class, 'submitConsultation'])->name('consultation.submit');
Route::post('/formations/{id}/inscrire', [FormationController::class, 'inscrire'])->name('formations.inscrire');

// Document Request - Demande de document depuis legal-tech
Route::post('/document-request', [\App\Http\Controllers\DocumentRequestController::class, 'store'])->name('document-request.store');

Route::get('/administration', [App\Http\Controllers\Dashboard\ViewController::class, 'index'])->middleware(['auth', 'verified'])->name('administration');

// Routes pour la gestion des utilisateurs
Route::middleware(['auth', 'verified'])->group(function () {
    // Routes pour la gestion des utilisateurs
    Route::get('/dashboard/utilisateurs', [UserController::class, 'index'])->name('dashboard.utilisateurs.index');
    Route::get('/dashboard/utilisateurs/create', [UserController::class, 'create'])->name('dashboard.utilisateurs.create');
    Route::post('/dashboard/utilisateurs', [UserController::class, 'store'])->name('dashboard.utilisateurs.store');
    Route::get('/dashboard/utilisateurs/{user}/edit', [UserController::class, 'edit'])->name('dashboard.utilisateurs.edit');
    Route::put('/dashboard/utilisateurs/{user}', [UserController::class, 'update'])->name('dashboard.utilisateurs.update');
    Route::delete('/dashboard/utilisateurs/{user}', [UserController::class, 'destroy'])->name('dashboard.utilisateurs.destroy');

    // Routes pour la gestion des messages
    Route::get('/dashboard/messages', [ContactMessageController::class, 'index'])->name('dashboard.messages.index');
    Route::get('/dashboard/messages/contact-form', [ContactMessageController::class, 'index'])->name('dashboard.messages.contact-form');
    Route::get('/dashboard/messages/{message}', [ContactMessageController::class, 'show'])->name('dashboard.messages.show');
    Route::delete('/dashboard/messages/{message}', [ContactMessageController::class, 'destroy'])->name('dashboard.messages.destroy');
    Route::patch('/dashboard/messages/{message}/mark-as-read', [ContactMessageController::class, 'markAsRead'])->name('dashboard.messages.mark-as-read');
    Route::patch('/dashboard/messages/{message}/mark-as-unread', [ContactMessageController::class, 'markAsUnread'])->name('dashboard.messages.mark-as-unread');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes pour les sections du dashboard
    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'verified'])->group(function () {

        // GESTION - Formations
        Route::prefix('formations')->name('formations.')->group(function () {
            Route::get('/ajouter', [DashboardController::class, 'ajouterFormation'])->name('ajouter');
            Route::post('/ajouter', [DashboardController::class, 'storeFormation'])->name('store');
            Route::get('/liste', [DashboardController::class, 'listeFormations'])->name('liste');
            Route::get('/export/{format}', [DashboardController::class, 'exportFormations'])->name('export');
            Route::get('/editer/{formation}', [DashboardController::class, 'editFormation'])->name('edit');
            Route::put('/editer/{formation}', [DashboardController::class, 'updateFormation'])->name('update');
            Route::delete('/{formation}', [DashboardController::class, 'deleteFormation'])->name('delete');
            Route::get('/inscriptions', [DashboardController::class, 'inscriptionsFormations'])->name('inscriptions');
        });

        // GESTION - Catégories de Formations
        Route::resource('categories', \App\Http\Controllers\FormationCategoryController::class);

        // GESTION - Utilisateurs
        Route::prefix('utilisateurs')->name('utilisateurs.')->middleware(['auth'])->group(function () {
            Route::get('/clients', [DashboardController::class, 'clients'])->name('clients');
            Route::post('/clients', [DashboardController::class, 'storeClient'])->name('clients.store');
            Route::put('/clients/{client}', [DashboardController::class, 'updateClient'])->name('clients.update');
            Route::delete('/clients/{client}', [DashboardController::class, 'deleteClient'])->name('clients.delete');
            Route::get('/avocats', [DashboardController::class, 'avocats'])->name('avocats');
            Route::get('/administrateurs', [DashboardController::class, 'administrateurs'])->name('administrateurs');
            Route::get('/roles-permissions', [DashboardController::class, 'rolesPermissions'])->name('roles-permissions');
        });

        // GESTION - Legal Tech
        Route::prefix('legal-tech')->name('legal-tech.')->group(function () {
            Route::get('/', [DashboardController::class, 'legalTech'])->name('index');
            Route::post('/analyze', [AIController::class, 'analyze'])->name('analyze');
            Route::post('/generate', [AIController::class, 'generateDocument'])->name('generate');
            Route::get('/status/{id}', [AIController::class, 'getStatus'])->name('status');
            Route::get('/templates', [AIController::class, 'getTemplates'])->name('templates');
            
            // Gestion des demandes de documents
            Route::get('/demandes', [\App\Http\Controllers\DocumentRequestController::class, 'index'])->name('demandes');
            Route::get('/demandes/{documentRequest}', [\App\Http\Controllers\DocumentRequestController::class, 'show'])->name('demandes.show');
            Route::put('/demandes/{documentRequest}/statut', [\App\Http\Controllers\DocumentRequestController::class, 'updateStatut'])->name('demandes.statut');
            Route::delete('/demandes/{documentRequest}', [\App\Http\Controllers\DocumentRequestController::class, 'destroy'])->name('demandes.destroy');
        });

        // SERVICES JURIDIQUES - Consultations
        Route::prefix('consultations')->name('consultations.')->middleware('auth')->group(function () {
            Route::get('/historique', [DashboardController::class, 'historiqueConsultations'])->name('historique');
            Route::get('/planning', [DashboardController::class, 'planningConsultations'])->name('planning');
            Route::get('/affectations', [DashboardController::class, 'affectationsConsultations'])->name('affectations');
        });

        // SERVICES JURIDIQUES - Rendez-vous
        Route::prefix('rendez-vous')->name('rendez-vous.')->group(function () {
            Route::get('/nouveau', [DashboardController::class, 'nouveauRdv'])->name('nouveau');
            Route::get('/planning', [DashboardController::class, 'planningRdv'])->name('planning');
            Route::get('/confirmations', [DashboardController::class, 'confirmationsRdv'])->name('confirmations');
            Route::get('/historique', [DashboardController::class, 'historiqueRdv'])->name('historique');
        });

        // SERVICES JURIDIQUES - Services
        Route::get('/services-juridiques', [DashboardController::class, 'servicesJuridiques'])->name('services-juridiques');

        // PARTENARIATS & ÉVÉNEMENTS - Partenariats
        Route::prefix('partenariats')->name('partenariats.')->group(function () {
            Route::get('/candidatures', [DashboardController::class, 'candidaturesPartenariats'])->name('candidatures');
            Route::get('/offres', [DashboardController::class, 'offresPartenariats'])->name('offres');
            Route::get('/suivi', [DashboardController::class, 'suiviPartenariats'])->name('suivi');
        });

        // PARTENARIATS & ÉVÉNEMENTS - Événements
        Route::prefix('evenements')->name('evenements.')->group(function () {
            Route::get('/creer', [DashboardController::class, 'creerEvenement'])->name('creer');
            Route::get('/participants', [DashboardController::class, 'participantsEvenements'])->name('participants');
            Route::get('/webinaires', [DashboardController::class, 'webinaires'])->name('webinaires');
            Route::get('/replays', [DashboardController::class, 'replays'])->name('replays');
        });

        // CONTENU & COMMUNICATION - Contenu du site
        Route::prefix('contenu')->name('contenu.')->group(function () {
            Route::get('/accueil', [DashboardController::class, 'pageAccueil'])->name('accueil');
            Route::get('/a-propos', [DashboardController::class, 'aPropos'])->name('a-propos');
            Route::get('/services', [DashboardController::class, 'servicesPage'])->name('services');

            // Media Management Routes
            Route::prefix('mediatheque')->name('media.')->group(function () {
                Route::get('/', [MediaController::class, 'index'])->name('index');
                Route::post('/upload', [MediaController::class, 'store'])->name('store');
                Route::post('/folders', [MediaController::class, 'createFolder'])->name('folders.store');
                Route::post('/{file}/share', [MediaController::class, 'createShare'])->name('share');
                Route::get('/shared/{token}', [MediaController::class, 'download'])->name('shared');
                Route::delete('/{file}', [MediaController::class, 'destroy'])->name('destroy');
                Route::delete('/folders/{folder}', [MediaController::class, 'destroyFolder'])->name('folders.destroy');
            });
        });

        // CONTENU & COMMUNICATION - Messages & Contact
        Route::prefix('messages')->name('messages.')->group(function () {
            Route::get('/demandes', [DashboardController::class, 'demandesMessages'])->name('demandes');
            Route::get('/formulaires', [DashboardController::class, 'formulaires'])->name('formulaires');
            Route::get('/newsletter', [DashboardController::class, 'newsletter'])->name('newsletter');
            Route::get('/contact-form', [DashboardController::class, 'contactForm'])->name('contact-form');
            Route::put('/contact-form', [DashboardController::class, 'updateContactForm'])->name('update-contact-form');
        });
    });
});

require __DIR__.'/auth.php';
