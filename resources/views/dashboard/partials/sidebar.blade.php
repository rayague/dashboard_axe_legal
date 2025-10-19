<!-- Sidebar -->
<ul
    class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar"
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
                <a class="collapse-item" href="{{ route('dashboard.utilisateurs.index') }}">Liste des utilisateurs</a>
                <a class="collapse-item" href="{{ route('dashboard.utilisateurs.create') }}">Ajouter un utilisateur</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Legal Tech Users -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.legal-tech.index') }}">
            <i class="fas fa-fw fa-laptop-code" style="color: #06d6a0;"></i>
            <span>Utilisateurs Legal Tech</span>
        </a>
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
                <a class="collapse-item" href="{{ route('dashboard.messages.index') }}">Messages reçus</a>
                <a class="collapse-item" href="{{ route('dashboard.messages.contact-form') }}">Formulaire de contact</a>
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
