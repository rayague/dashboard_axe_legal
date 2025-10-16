<!-- Sidebar -->
<ul
    class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar"
    style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%) !important;"
>
    <!-- Sidebar - Brand -->
    <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="{{ route('administration') }}"
        style="background: rgba(255, 255, 255, 0.1); margin-bottom: 1rem; border-radius: 10px; margin: 0.5rem;"
    >
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-balance-scale" style="color: #60a5fa;"></i>
        </div>
        <div class="sidebar-brand-text mx-2" style="font-weight: 700; color: white;">Axe Legal</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- SECTION: TABLEAU DE BORD -->
    <div class="sidebar-heading" style="color: #a0c4ff; font-size: 0.75rem; font-weight: 800; margin-top: 1rem;">
        TABLEAU DE BORD
    </div>

    <!-- Nav Item - Accueil -->
    <li class="nav-item">
        <a class="nav-link @if(request()->routeIs('administration')) active-link @endif" href="{{ route('administration') }}">
            <i class="fas fa-fw fa-tachometer-alt" style="color: #60a5fa;"></i>
            <span>Accueil</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- SECTION: GESTION -->
    <div class="sidebar-heading" style="color: #a0c4ff; font-size: 0.75rem; font-weight: 800;">
        GESTION
    </div>

    <!-- Nav Item - Formations -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFormations"
            aria-expanded="true" aria-controls="collapseFormations">
            <i class="fas fa-fw fa-graduation-cap" style="color: #fbbf24;"></i>
            <span>Formations</span>
        </a>
        <div id="collapseFormations" class="collapse" aria-labelledby="headingFormations"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion Formations:</h6>
                <a class="collapse-item" href="{{ route('dashboard.formations.ajouter') }}">Ajouter Formation</a>
                <a class="collapse-item" href="{{ route('dashboard.formations.liste') }}">Liste Formations</a>
                <a class="collapse-item" href="{{ route('dashboard.formations.inscriptions') }}">Inscriptions</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilisateurs -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
            aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-fw fa-users" style="color: #8b5cf6;"></i>
            <span>Utilisateurs</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion Utilisateurs:</h6>
                <a class="collapse-item" href="{{ route('dashboard.utilisateurs.clients') }}">Clients</a>
                <a class="collapse-item" href="{{ route('dashboard.utilisateurs.avocats') }}">Avocats</a>
                <a class="collapse-item" href="{{ route('dashboard.utilisateurs.administrateurs') }}">Administrateurs</a>
                <a class="collapse-item" href="{{ route('dashboard.utilisateurs.roles-permissions') }}">Rôles & Permissions</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Legal Tech Users -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.legal-tech') }}">
            <i class="fas fa-fw fa-laptop-code" style="color: #06d6a0;"></i>
            <span>Utilisateurs Legal Tech</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- SECTION: SERVICES -->
    <div class="sidebar-heading" style="color: #a0c4ff; font-size: 0.75rem; font-weight: 800;">
        SERVICES JURIDIQUES
    </div>

    <!-- Nav Item - Consultations -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConsultations"
            aria-expanded="true" aria-controls="collapseConsultations">
            <i class="fas fa-fw fa-gavel" style="color: #f59e0b;"></i>
            <span>Consultations</span>
        </a>
        <div id="collapseConsultations" class="collapse" aria-labelledby="headingConsultations"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion Consultations:</h6>
                <a class="collapse-item" href="{{ route('dashboard.consultations.historique') }}">Historique</a>
                <a class="collapse-item" href="{{ route('dashboard.consultations.planning') }}">Planning</a>
                <a class="collapse-item" href="{{ route('dashboard.consultations.affectations') }}">Affectations</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Rendez-vous -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRendezVous"
            aria-expanded="true" aria-controls="collapseRendezVous">
            <i class="fas fa-fw fa-calendar-alt" style="color: #ef4444;"></i>
            <span>Rendez-vous</span>
        </a>
        <div id="collapseRendezVous" class="collapse" aria-labelledby="headingRendezVous"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion RDV:</h6>
                <a class="collapse-item" href="{{ route('dashboard.rendez-vous.nouveau') }}">Nouveau RDV</a>
                <a class="collapse-item" href="{{ route('dashboard.rendez-vous.planning') }}">Planning</a>
                <a class="collapse-item" href="{{ route('dashboard.rendez-vous.confirmations') }}">Confirmations</a>
                <a class="collapse-item" href="{{ route('dashboard.rendez-vous.historique') }}">Historique</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Services juridiques -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.services-juridiques') }}">
            <i class="fas fa-fw fa-briefcase" style="color: #10b981;"></i>
            <span>Services Juridiques</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- SECTION: PARTENARIATS & ÉVÉNEMENTS -->
    <div class="sidebar-heading" style="color: #a0c4ff; font-size: 0.75rem; font-weight: 800;">
        PARTENARIATS & ÉVÉNEMENTS
    </div>

    <!-- Nav Item - Partenariats -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePartenariats"
            aria-expanded="true" aria-controls="collapsePartenariats">
            <i class="fas fa-fw fa-handshake" style="color: #3b82f6;"></i>
            <span>Partenariats</span>
        </a>
        <div id="collapsePartenariats" class="collapse" aria-labelledby="headingPartenariats"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion Partenaires:</h6>
                <a class="collapse-item" href="{{ route('dashboard.partenariats.candidatures') }}">Candidatures</a>
                <a class="collapse-item" href="{{ route('dashboard.partenariats.offres') }}">Offres</a>
                <a class="collapse-item" href="{{ route('dashboard.partenariats.suivi') }}">Suivi</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Événements -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvenements"
            aria-expanded="true" aria-controls="collapseEvenements">
            <i class="fas fa-fw fa-calendar-check" style="color: #ec4899;"></i>
            <span>Événements</span>
        </a>
        <div id="collapseEvenements" class="collapse" aria-labelledby="headingEvenements"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion Événements:</h6>
                <a class="collapse-item" href="{{ route('dashboard.evenements.creer') }}">Créer Événement</a>
                <a class="collapse-item" href="{{ route('dashboard.evenements.participants') }}">Participants</a>
                <a class="collapse-item" href="{{ route('dashboard.evenements.webinaires') }}">Webinaires</a>
                <a class="collapse-item" href="{{ route('dashboard.evenements.replays') }}">Replays</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- SECTION: CONTENU & COMMUNICATION -->
    <div class="sidebar-heading" style="color: #a0c4ff; font-size: 0.75rem; font-weight: 800;">
        CONTENU & COMMUNICATION
    </div>

    <!-- Nav Item - Contenu du site -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContenu"
            aria-expanded="true" aria-controls="collapseContenu">
            <i class="fas fa-fw fa-globe-americas" style="color: #06b6d4;"></i>
            <span>Contenu du Site</span>
        </a>
        <div id="collapseContenu" class="collapse" aria-labelledby="headingContenu"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion Contenu:</h6>
                <a class="collapse-item" href="{{ route('dashboard.contenu.accueil') }}">Page Accueil</a>
                <a class="collapse-item" href="{{ route('dashboard.contenu.a-propos') }}">À Propos</a>
                <a class="collapse-item" href="{{ route('dashboard.contenu.services') }}">Services</a>
                <a class="collapse-item" href="{{ route('dashboard.contenu.mediatheque') }}">Médiathèque</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Messages & Contact -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMessages"
            aria-expanded="true" aria-controls="collapseMessages">
            <i class="fas fa-fw fa-envelope" style="color: #f97316;"></i>
            <span>Messages & Contact</span>
        </a>
        <div id="collapseMessages" class="collapse" aria-labelledby="headingMessages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Communication:</h6>
                <a class="collapse-item" href="{{ route('dashboard.messages.demandes') }}">Demandes</a>
                <a class="collapse-item" href="{{ route('dashboard.messages.formulaires') }}">Formulaires</a>
                <a class="collapse-item" href="{{ route('dashboard.messages.newsletter') }}">Newsletter</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Déconnexion -->
    <li class="nav-item" style="margin-top: 1rem;">
        <form method="POST" action="{{ route('logout') }}" style="margin: 0; padding: 0;">
            @csrf
            <button
                type="submit"
                class="nav-link btn btn-link text-left"
                style="background: linear-gradient(45deg, #dc2626, #ef4444); border: none; border-radius: 8px; margin: 0.25rem 0.75rem; padding: 0.75rem 1rem; color: white; font-weight: 600; width: calc(100% - 1.5rem); display: flex; align-items: center;"
            >
                <i class="fas fa-fw fa-sign-out-alt mr-2"></i>
                <span>Déconnexion</span>
            </button>
        </form>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button
            class="rounded-circle border-0"
            id="sidebarToggle"
            style="background: rgba(255, 255, 255, 0.2); color: white;"
        ></button>
    </div>
</ul>
<!-- End of Sidebar -->

<style>
    /* Effet au survol */
    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.15) !important;
        color: white !important;
        border-radius: 8px !important;
        margin: 0.25rem 0.5rem !important;
        transition: all 0.3s ease !important;
    }

    /* Classe à appliquer manuellement pour la page active */
    .nav-link.active-link {
        background-color: rgba(255, 255, 255, 0.2) !important;
        color: white !important;
        border-radius: 8px !important;
        margin: 0.25rem 0.5rem !important;
        font-weight: 600 !important;
    }

    /* Amélioration de la lisibilité des labels */
    .sidebar .nav-link {
        color: rgba(255, 255, 255, 0.9) !important;
        font-weight: 500 !important;
        padding: 0.75rem 1rem !important;
        margin: 0.1rem 0.5rem !important;
        border-radius: 6px !important;
        transition: all 0.3s ease !important;
    }

    .sidebar .nav-link span {
        font-size: 0.875rem !important;
        letter-spacing: 0.025em !important;
    }

    .sidebar .nav-link i {
        margin-right: 0.75rem !important;
        width: 1.25rem !important;
        text-align: center !important;
    }

    /* Amélioration des sections headings */
    .sidebar-heading {
        color: rgba(255, 255, 255, 0.7) !important;
        font-size: 0.7rem !important;
        font-weight: 800 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        margin: 1rem 1rem 0.5rem 1rem !important;
    }

    /* Style pour les sous-menus */
    .collapse-inner .collapse-item {
        color: #5a5c69 !important;
        font-weight: 500 !important;
        padding: 0.5rem 1.5rem !important;
        border-radius: 4px !important;
        margin: 0.1rem 0 !important;
        transition: all 0.2s ease !important;
    }

    .collapse-inner .collapse-item:hover {
        background-color: #f8f9fc !important;
        color: #3b82f6 !important;
        transform: translateX(5px) !important;
    }
</style>
