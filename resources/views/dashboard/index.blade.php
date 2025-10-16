<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Axe Legal - Dashboard Administration</title>

        <!-- Custom fonts for this template-->
        <link
            href="{{ asset('dashboard/vendor/fontawesome-free/css/all.min.css') }}"
            rel="stylesheet"
            type="text/css"
        />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet"
        />

        <!-- Custom styles for this template-->
        <link
            href="{{ asset('dashboard/css/sb-admin-2.min.css') }}"
            rel="stylesheet"
        />
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
    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
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
                    <a class="nav-link active-link" href="{{ route('administration') }}">
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

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav
                        class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
                    >
                        <!-- Sidebar Toggle (Topbar) -->
                        <button
                            id="sidebarToggleTop"
                            class="btn btn-link d-md-none rounded-circle mr-3"
                        >
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                        >
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control bg-light border-0 small"
                                    placeholder="Search for..."
                                    aria-label="Search"
                                    aria-describedby="basic-addon2"
                                />
                                <div class="input-group-append">
                                    <button
                                        class="btn btn-primary"
                                        type="button"
                                    >
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="searchDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div
                                    class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown"
                                >
                                    <form
                                        class="form-inline mr-auto w-100 navbar-search"
                                    >
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control bg-light border-0 small"
                                                placeholder="Search for..."
                                                aria-label="Search"
                                                aria-describedby="basic-addon2"
                                            />
                                            <div class="input-group-append">
                                                <button
                                                    class="btn btn-primary"
                                                    type="button"
                                                >
                                                    <i
                                                        class="fas fa-search fa-sm"
                                                    ></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="alertsDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span
                                        class="badge badge-danger badge-counter"
                                    >
                                        3+
                                    </span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div
                                    class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown"
                                >
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                    >
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i
                                                    class="fas fa-file-alt text-white"
                                                ></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">
                                                December 12, 2019
                                            </div>
                                            <span class="font-weight-bold">
                                                A new monthly report is ready to
                                                download!
                                            </span>
                                        </div>
                                    </a>
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                    >
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i
                                                    class="fas fa-donate text-white"
                                                ></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">
                                                December 7, 2019
                                            </div>
                                            $290.29 has been deposited into your
                                            account!
                                        </div>
                                    </a>
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                    >
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i
                                                    class="fas fa-exclamation-triangle text-white"
                                                ></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">
                                                December 2, 2019
                                            </div>
                                            Spending Alert: We've noticed
                                            unusually high spending for your
                                            account.
                                        </div>
                                    </a>
                                    <a
                                        class="dropdown-item text-center small text-gray-500"
                                        href="#"
                                    >
                                        Show All Alerts
                                    </a>
                                </div>
                            </li>

                            <!-- Nav Item - Messages -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="messagesDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <!-- Counter - Messages -->
                                    <span
                                        class="badge badge-danger badge-counter"
                                    >
                                        7
                                    </span>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div
                                    class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="messagesDropdown"
                                >
                                    <h6 class="dropdown-header">
                                        Message Center
                                    </h6>
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                    >
                                        <div class="dropdown-list-image mr-3">
                                            <img
                                                class="rounded-circle"
                                                src="img/undraw_profile_1.svg"
                                                alt="..."
                                            />
                                            <div
                                                class="status-indicator bg-success"
                                            ></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">
                                                Hi there! I am wondering if you
                                                can help me with a problem I've
                                                been having.
                                            </div>
                                            <div class="small text-gray-500">
                                                Emily Fowler · 58m
                                            </div>
                                        </div>
                                    </a>
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                    >
                                        <div class="dropdown-list-image mr-3">
                                            <img
                                                class="rounded-circle"
                                                src="img/undraw_profile_2.svg"
                                                alt="..."
                                            />
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">
                                                I have the photos that you
                                                ordered last month, how would
                                                you like them sent to you?
                                            </div>
                                            <div class="small text-gray-500">
                                                Jae Chun · 1d
                                            </div>
                                        </div>
                                    </a>
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                    >
                                        <div class="dropdown-list-image mr-3">
                                            <img
                                                class="rounded-circle"
                                                src="img/undraw_profile_3.svg"
                                                alt="..."
                                            />
                                            <div
                                                class="status-indicator bg-warning"
                                            ></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">
                                                Last month's report looks great,
                                                I am very happy with the
                                                progress so far, keep up the
                                                good work!
                                            </div>
                                            <div class="small text-gray-500">
                                                Morgan Alvarez · 2d
                                            </div>
                                        </div>
                                    </a>
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                    >
                                        <div class="dropdown-list-image mr-3">
                                            <img
                                                class="rounded-circle"
                                                src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                                alt="..."
                                            />
                                            <div
                                                class="status-indicator bg-success"
                                            ></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">
                                                Am I a good boy? The reason I
                                                ask is because someone told me
                                                that people say this to all
                                                dogs, even if they aren't
                                                good...
                                            </div>
                                            <div class="small text-gray-500">
                                                Chicken the Dog · 2w
                                            </div>
                                        </div>
                                    </a>
                                    <a
                                        class="dropdown-item text-center small text-gray-500"
                                        href="#"
                                    >
                                        Read More Messages
                                    </a>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="userDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small"
                                    >
                                        Douglas McGee
                                    </span>
                                    <img
                                        class="img-profile rounded-circle"
                                        src="img/undraw_profile.svg"
                                    />
                                </a>
                                <!-- Dropdown - User Information -->
                                <div
                                    class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown"
                                >
                                    <a class="dropdown-item" href="#">
                                        <i
                                            class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"
                                        ></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i
                                            class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"
                                        ></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i
                                            class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"
                                        ></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a
                                        class="dropdown-item"
                                        href="#"
                                        data-toggle="modal"
                                        data-target="#logoutModal"
                                    >
                                        <i
                                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                                        ></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div
                            class="d-sm-flex align-items-center justify-content-between mb-4"
                        >
                            <h1 class="h3 mb-0 text-gray-800">
                                <i class="fas fa-balance-scale text-primary mr-2"></i>
                                Dashboard Axe Legal
                            </h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">
                            <!-- Consultations du mois -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div
                                    class="card border-left-primary shadow h-100 py-2"
                                    style="border-left: 4px solid #3b82f6 !important;"
                                >
                                    <div class="card-body">
                                        <div
                                            class="row no-gutters align-items-center"
                                        >
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                                                >
                                                    Consultations (Mensuel)
                                                </div>
                                                <div
                                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                                >
                                                    247
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-gavel fa-2x text-gray-300"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Chiffre d'affaires annuel -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div
                                    class="card border-left-success shadow h-100 py-2"
                                >
                                    <div class="card-body">
                                        <div
                                            class="row no-gutters align-items-center"
                                        >
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                                >
                                                    Revenus (Annuel)
                                                </div>
                                                <div
                                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                                >
                                                    242.500.000 FCFA
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-coins fa-2x text-gray-300"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Taux de satisfaction -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div
                                    class="card border-left-info shadow h-100 py-2"
                                >
                                    <div class="card-body">
                                        <div
                                            class="row no-gutters align-items-center"
                                        >
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-info text-uppercase mb-1"
                                                >
                                                    Taux de Satisfaction
                                                </div>
                                                <div
                                                    class="row no-gutters align-items-center"
                                                >
                                                    <div class="col-auto">
                                                        <div
                                                            class="h5 mb-0 mr-3 font-weight-bold text-gray-800"
                                                        >
                                                            94%
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div
                                                            class="progress progress-sm mr-2"
                                                        >
                                                            <div
                                                                class="progress-bar bg-info"
                                                                role="progressbar"
                                                                style="
                                                                    width: 94%;
                                                                "
                                                                aria-valuenow="94"
                                                                aria-valuemin="0"
                                                                aria-valuemax="100"
                                                            ></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-star fa-2x text-gray-300"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Demandes en attente -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div
                                    class="card border-left-warning shadow h-100 py-2"
                                >
                                    <div class="card-body">
                                        <div
                                            class="row no-gutters align-items-center"
                                        >
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                                                >
                                                    Demandes en Attente
                                                </div>
                                                <div
                                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                                >
                                                    12
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-clock fa-2x text-gray-300"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->

                        <div class="row"></div>

                        <!-- Content Row -->
                        <div class="row">
                            <!-- Statistiques supplémentaires -->
                            <div class="col-lg-6 mb-4">
                                <div class="card shadow h-100">
                                    <div class="card-header py-3" style="background: linear-gradient(45deg, #1e3a8a, #3b82f6); color: white;">
                                        <h6 class="m-0 font-weight-bold">
                                            <i class="fas fa-chart-pie mr-2"></i>
                                            Activités Récentes
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="fas fa-user-plus text-success mr-2"></i>
                                                    Nouvel utilisateur inscrit
                                                </div>
                                                <small class="text-muted">Il y a 2h</small>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="fas fa-calendar-check text-primary mr-2"></i>
                                                    RDV confirmé avec Me. Dupont
                                                </div>
                                                <small class="text-muted">Il y a 4h</small>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="fas fa-graduation-cap text-warning mr-2"></i>
                                                    Nouvelle formation publiée
                                                </div>
                                                <small class="text-muted">Il y a 6h</small>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="fas fa-credit-card text-success mr-2"></i>
                                                    Paiement reçu - 175.000 FCFA
                                                </div>
                                                <small class="text-muted">Il y a 8h</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <!-- À propos d'Axe Legal -->
                                <div class="card shadow h-100">
                                    <div class="card-header py-3" style="background: linear-gradient(45deg, #3b82f6, #60a5fa); color: white;">
                                        <h6 class="m-0 font-weight-bold">
                                            <i class="fas fa-balance-scale mr-2"></i>
                                            À Propos d'Axe Legal
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-justify">
                                            <strong>Axe Legal</strong> est votre partenaire de confiance pour tous vos besoins juridiques.
                                            Nous offrons des services juridiques complets, des formations spécialisées et des solutions
                                            de legal tech innovantes.
                                        </p>
                                        <p class="text-justify">
                                            Notre équipe d'experts juridiques vous accompagne dans vos démarches avec professionnalisme
                                            et expertise, que ce soit pour des consultations, des formations ou l'utilisation de nos
                                            outils technologiques avancés.
                                        </p>
                                        <p class="mb-0 text-justify">
                                            <strong>Notre mission :</strong> Démocratiser l'accès au droit grâce à la technologie et
                                            l'expertise humaine, pour une justice accessible à tous.
                                        </p>
                                        <hr>
                                        <div class="row text-center">
                                            <div class="col-4">
                                                <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                                <div class="small font-weight-bold">1,250+ Clients</div>
                                            </div>
                                            <div class="col-4">
                                                <i class="fas fa-graduation-cap fa-2x text-success mb-2"></i>
                                                <div class="small font-weight-bold">85 Formations</div>
                                            </div>
                                            <div class="col-4">
                                                <i class="fas fa-handshake fa-2x text-info mb-2"></i>
                                                <div class="small font-weight-bold">50+ Partenaires</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; <strong>Axe Legal</strong> 2025 - Réalisé par <em>Ray Ague</em></span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div
            class="modal fade"
            id="logoutModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Ready to Leave?
                        </h5>
                        <button
                            class="close"
                            type="button"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Sélectionnez « Déconnexion » ci-dessous si vous êtes
                        prêt à terminer votre session actuelle.
                    </div>
                    <div class="modal-footer">
                        <button
                            class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal"
                        >
                            Annuler
                        </button>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('dashboard/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('dashboard/vendor/chart.js/Chart.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('dashboard/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('dashboard/js/demo/chart-pie-demo.js') }}"></script>


    </body>
</html>
