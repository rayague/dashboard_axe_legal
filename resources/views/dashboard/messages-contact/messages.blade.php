@extends('dashboard.layout')

@section('title', 'Gestion Messages - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-envelope text-primary mr-2"></i>
            Gestion des Messages
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Messages & Contact</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Messages</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-success btn-sm" onclick="markAllAsRead()">
                    <i class="fas fa-check-double mr-1"></i>
                    <span class="d-none d-sm-inline">Marquer tout lu</span>
                </button>
                <button type="button" class="btn btn-info btn-sm" onclick="exportMessages()">
                    <i class="fas fa-download mr-1"></i>
                    <span class="d-none d-sm-inline">Exporter</span>
                </button>
                <button type="button" class="btn btn-warning btn-sm" onclick="openSettings()">
                    <i class="fas fa-cog mr-1"></i>
                    <span class="d-none d-sm-inline">Paramètres</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Messages Statistics -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Messages Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">342</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Non Lus</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">23</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Traités</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">298</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cette Semaine</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">47</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-week fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Messages Management Interface -->
    <div class="row">
        <!-- Filters and Categories -->
        <div class="col-lg-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-filter mr-2"></i>
                        Filtres
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Statut</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterUnread" checked>
                            <label class="form-check-label" for="filterUnread">
                                <i class="fas fa-circle text-warning mr-1" style="font-size: 0.5rem;"></i>Non lus (23)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterRead" checked>
                            <label class="form-check-label" for="filterRead">
                                <i class="fas fa-circle text-success mr-1" style="font-size: 0.5rem;"></i>Lus (298)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterTreated">
                            <label class="form-check-label" for="filterTreated">
                                <i class="fas fa-circle text-info mr-1" style="font-size: 0.5rem;"></i>Traités (298)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterArchived">
                            <label class="form-check-label" for="filterArchived">
                                <i class="fas fa-circle text-secondary mr-1" style="font-size: 0.5rem;"></i>Archivés (21)
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Type de Demande</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterConsultation" checked>
                            <label class="form-check-label" for="filterConsultation">
                                <i class="fas fa-user-md text-primary mr-1"></i>Consultation (156)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterInfo" checked>
                            <label class="form-check-label" for="filterInfo">
                                <i class="fas fa-info-circle text-info mr-1"></i>Information (89)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterUrgent" checked>
                            <label class="form-check-label" for="filterUrgent">
                                <i class="fas fa-exclamation-triangle text-danger mr-1"></i>Urgent (23)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterDevis" checked>
                            <label class="form-check-label" for="filterDevis">
                                <i class="fas fa-file-invoice text-success mr-1"></i>Devis (74)
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Période</label>
                        <select class="form-control form-control-sm">
                            <option value="all">Toutes les périodes</option>
                            <option value="today" selected>Aujourd'hui</option>
                            <option value="week">Cette semaine</option>
                            <option value="month">Ce mois</option>
                            <option value="custom">Période personnalisée</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Domaine Juridique</label>
                        <select class="form-control form-control-sm">
                            <option value="all">Tous les domaines</option>
                            <option value="penal">Droit Pénal</option>
                            <option value="civil">Droit Civil</option>
                            <option value="commercial">Droit Commercial</option>
                            <option value="travail">Droit du Travail</option>
                        </select>
                    </div>

                    <button class="btn btn-primary btn-sm btn-block" onclick="applyFilters()">
                        <i class="fas fa-search mr-1"></i>Appliquer Filtres
                    </button>
                    <button class="btn btn-outline-secondary btn-sm btn-block mt-2" onclick="resetFilters()">
                        <i class="fas fa-undo mr-1"></i>Réinitialiser
                    </button>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-bolt mr-2"></i>
                        Actions Rapides
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary btn-sm" onclick="createTemplate()">
                            <i class="fas fa-plus mr-1"></i>Nouveau Template
                        </button>
                        <button class="btn btn-outline-success btn-sm" onclick="bulkReply()">
                            <i class="fas fa-reply-all mr-1"></i>Réponse en Masse
                        </button>
                        <button class="btn btn-outline-info btn-sm" onclick="autoAssign()">
                            <i class="fas fa-user-tag mr-1"></i>Attribution Auto
                        </button>
                        <button class="btn btn-outline-warning btn-sm" onclick="scheduleFollowUp()">
                            <i class="fas fa-clock mr-1"></i>Programmer Suivi
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages List -->
        <div class="col-lg-9">
            <!-- Search and Actions -->
            <div class="card shadow mb-4">
                <div class="card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Rechercher dans les messages..." id="messageSearch">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" onclick="searchMessages()">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group mr-2">
                                    <button class="btn btn-outline-success btn-sm" onclick="selectAllMessages()">
                                        <i class="fas fa-check-square"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-sm" onclick="markSelectedAsRead()" disabled id="markReadBtn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-warning btn-sm" onclick="archiveSelected()" disabled id="archiveBtn">
                                        <i class="fas fa-archive"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm" onclick="deleteSelected()" disabled id="deleteBtn">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <select class="form-control form-control-sm" style="width: auto;" onchange="sortMessages(this.value)">
                                    <option value="date_desc">Plus récent</option>
                                    <option value="date_asc">Plus ancien</option>
                                    <option value="priority_desc">Priorité élevée</option>
                                    <option value="unread_first">Non lus d'abord</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages Content -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-inbox mr-2"></i>
                        Messages Reçus
                    </h6>
                    <span class="badge badge-info">47 nouveaux cette semaine</span>
                </div>
                <div class="card-body p-0">
                    <div class="message-list">
                        <!-- Message Item 1 - Urgent/Unread -->
                        <div class="message-item unread urgent" data-id="1">
                            <div class="message-checkbox">
                                <input type="checkbox" class="message-select" onchange="updateSelectionCount()">
                            </div>
                            <div class="message-priority">
                                <i class="fas fa-exclamation-circle text-danger" title="Urgent"></i>
                            </div>
                            <div class="message-content">
                                <div class="message-header">
                                    <div class="message-sender">
                                        <strong>Kouassi Marie-Claire</strong>
                                        <span class="text-muted">kouassi.marie@email.com</span>
                                    </div>
                                    <div class="message-meta">
                                        <span class="message-time">Il y a 2h</span>
                                        <span class="badge badge-danger badge-sm">Urgent</span>
                                        <span class="badge badge-primary badge-sm">Droit Pénal</span>
                                    </div>
                                </div>
                                <div class="message-subject">
                                    <strong>Demande de consultation urgente - Garde à vue</strong>
                                </div>
                                <div class="message-preview">
                                    Bonjour Maître, mon fils a été placé en garde à vue depuis hier soir pour une affaire de vol présumé. Je souhaiterais une consultation d'urgence pour connaître ses droits et les démarches à entreprendre...
                                </div>
                                <div class="message-tags">
                                    <span class="tag">garde-à-vue</span>
                                    <span class="tag">consultation</span>
                                    <span class="tag">urgence</span>
                                </div>
                            </div>
                            <div class="message-actions">
                                <button class="btn btn-sm btn-primary" onclick="viewMessage(1)" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-success" onclick="replyMessage(1)" title="Répondre">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="btn btn-sm btn-info" onclick="assignMessage(1)" title="Assigner">
                                    <i class="fas fa-user-tag"></i>
                                </button>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="markAsRead(1)">
                                            <i class="fas fa-check mr-2"></i>Marquer comme lu
                                        </a>
                                        <a class="dropdown-item" href="#" onclick="archiveMessage(1)">
                                            <i class="fas fa-archive mr-2"></i>Archiver
                                        </a>
                                        <a class="dropdown-item" href="#" onclick="forwardMessage(1)">
                                            <i class="fas fa-share mr-2"></i>Transférer
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="deleteMessage(1)">
                                            <i class="fas fa-trash mr-2"></i>Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Message Item 2 - Normal/Unread -->
                        <div class="message-item unread" data-id="2">
                            <div class="message-checkbox">
                                <input type="checkbox" class="message-select" onchange="updateSelectionCount()">
                            </div>
                            <div class="message-priority">
                                <i class="fas fa-circle text-warning" style="font-size: 0.5rem;" title="Normal"></i>
                            </div>
                            <div class="message-content">
                                <div class="message-header">
                                    <div class="message-sender">
                                        <strong>Diabaté Sekou</strong>
                                        <span class="text-muted">s.diabate@entreprise.ci</span>
                                    </div>
                                    <div class="message-meta">
                                        <span class="message-time">Il y a 4h</span>
                                        <span class="badge badge-success badge-sm">Droit Commercial</span>
                                    </div>
                                </div>
                                <div class="message-subject">
                                    <strong>Demande de devis - Création de société SARL</strong>
                                </div>
                                <div class="message-preview">
                                    Bonjour, je souhaite créer une SARL avec 3 associés. Pourriez-vous m'envoyer un devis détaillé pour les formalités de création, la rédaction des statuts et l'accompagnement administratif...
                                </div>
                                <div class="message-tags">
                                    <span class="tag">sarl</span>
                                    <span class="tag">création</span>
                                    <span class="tag">devis</span>
                                </div>
                            </div>
                            <div class="message-actions">
                                <button class="btn btn-sm btn-primary" onclick="viewMessage(2)" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-success" onclick="replyMessage(2)" title="Répondre">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="btn btn-sm btn-info" onclick="assignMessage(2)" title="Assigner">
                                    <i class="fas fa-user-tag"></i>
                                </button>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="markAsRead(2)">
                                            <i class="fas fa-check mr-2"></i>Marquer comme lu
                                        </a>
                                        <a class="dropdown-item" href="#" onclick="archiveMessage(2)">
                                            <i class="fas fa-archive mr-2"></i>Archiver
                                        </a>
                                        <a class="dropdown-item" href="#" onclick="forwardMessage(2)">
                                            <i class="fas fa-share mr-2"></i>Transférer
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="deleteMessage(2)">
                                            <i class="fas fa-trash mr-2"></i>Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Message Item 3 - Read -->
                        <div class="message-item read" data-id="3">
                            <div class="message-checkbox">
                                <input type="checkbox" class="message-select" onchange="updateSelectionCount()">
                            </div>
                            <div class="message-priority">
                                <i class="fas fa-circle text-success" style="font-size: 0.5rem;" title="Lu"></i>
                            </div>
                            <div class="message-content">
                                <div class="message-header">
                                    <div class="message-sender">
                                        <strong>Fofana Aminata</strong>
                                        <span class="text-muted">a.fofana@gmail.com</span>
                                    </div>
                                    <div class="message-meta">
                                        <span class="message-time">Hier 16:30</span>
                                        <span class="badge badge-info badge-sm">Droit Civil</span>
                                        <span class="badge badge-success badge-sm">Traité</span>
                                    </div>
                                </div>
                                <div class="message-subject">
                                    Procédure de divorce - Questions sur la pension alimentaire
                                </div>
                                <div class="message-preview">
                                    Suite à notre entretien téléphonique, j'aimerais avoir des précisions sur le calcul de la pension alimentaire et les documents nécessaires pour la procédure...
                                </div>
                                <div class="message-tags">
                                    <span class="tag">divorce</span>
                                    <span class="tag">pension</span>
                                    <span class="tag">suivi</span>
                                </div>
                            </div>
                            <div class="message-actions">
                                <button class="btn btn-sm btn-primary" onclick="viewMessage(3)" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-success" onclick="replyMessage(3)" title="Répondre">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="btn btn-sm btn-info" onclick="assignMessage(3)" title="Assigner">
                                    <i class="fas fa-user-tag"></i>
                                </button>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="markAsUnread(3)">
                                            <i class="fas fa-envelope mr-2"></i>Marquer non lu
                                        </a>
                                        <a class="dropdown-item" href="#" onclick="archiveMessage(3)">
                                            <i class="fas fa-archive mr-2"></i>Archiver
                                        </a>
                                        <a class="dropdown-item" href="#" onclick="forwardMessage(3)">
                                            <i class="fas fa-share mr-2"></i>Transférer
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="deleteMessage(3)">
                                            <i class="fas fa-trash mr-2"></i>Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- More message items... -->
                        <div class="message-item read" data-id="4">
                            <div class="message-checkbox">
                                <input type="checkbox" class="message-select" onchange="updateSelectionCount()">
                            </div>
                            <div class="message-priority">
                                <i class="fas fa-circle text-success" style="font-size: 0.5rem;" title="Lu"></i>
                            </div>
                            <div class="message-content">
                                <div class="message-header">
                                    <div class="message-sender">
                                        <strong>Ouattara Ibrahim</strong>
                                        <span class="text-muted">ibrahim.ouattara@yahoo.fr</span>
                                    </div>
                                    <div class="message-meta">
                                        <span class="message-time">Hier 14:15</span>
                                        <span class="badge badge-warning badge-sm">Droit du Travail</span>
                                    </div>
                                </div>
                                <div class="message-subject">
                                    Licenciement abusif - Demande d'accompagnement
                                </div>
                                <div class="message-preview">
                                    Bonjour Maître, j'ai été licencié de mon entreprise dans des conditions que je considère comme abusives. Je souhaiterais votre accompagnement pour contester cette décision...
                                </div>
                                <div class="message-tags">
                                    <span class="tag">licenciement</span>
                                    <span class="tag">contentieux</span>
                                </div>
                            </div>
                            <div class="message-actions">
                                <button class="btn btn-sm btn-primary" onclick="viewMessage(4)" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-success" onclick="replyMessage(4)" title="Répondre">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="btn btn-sm btn-info" onclick="assignMessage(4)" title="Assigner">
                                    <i class="fas fa-user-tag"></i>
                                </button>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="markAsUnread(4)">
                                            <i class="fas fa-envelope mr-2"></i>Marquer non lu
                                        </a>
                                        <a class="dropdown-item" href="#" onclick="archiveMessage(4)">
                                            <i class="fas fa-archive mr-2"></i>Archiver
                                        </a>
                                        <a class="dropdown-item" href="#" onclick="forwardMessage(4)">
                                            <i class="fas fa-share mr-2"></i>Transférer
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="deleteMessage(4)">
                                            <i class="fas fa-trash mr-2"></i>Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted">Affichage de 1 à 20 sur 342 messages</small>
                            </div>
                            <nav>
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Précédent</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Suivant</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Message View Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-envelope-open text-primary mr-2"></i>
                        <span id="modalMessageSubject">Détail du Message</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="messageDetails">
                        <!-- Message details will be loaded here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" onclick="replyFromModal()">
                        <i class="fas fa-reply mr-1"></i>Répondre
                    </button>
                    <button type="button" class="btn btn-success" onclick="markAsTreated()">
                        <i class="fas fa-check mr-1"></i>Marquer Traité
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize message management
        initializeMessageManagement();
        
        // Setup real-time updates
        setupRealTimeUpdates();
    });

    function initializeMessageManagement() {
        // Message item clicks
        $('.message-item').on('click', function(e) {
            if (!$(e.target).closest('.message-actions, .message-checkbox').length) {
                const messageId = $(this).data('id');
                viewMessage(messageId);
            }
        });

        // Mark unread messages as read on hover (after 2 seconds)
        $('.message-item.unread').hover(function() {
            const messageItem = $(this);
            setTimeout(() => {
                if (messageItem.is(':hover') && messageItem.hasClass('unread')) {
                    markAsReadVisual(messageItem);
                }
            }, 2000);
        });
    }

    function setupRealTimeUpdates() {
        // Simulate real-time message updates
        setInterval(() => {
            // Check for new messages (simulation)
            if (Math.random() < 0.1) { // 10% chance every 30 seconds
                showNewMessageNotification();
            }
        }, 30000);
    }

    function showNewMessageNotification() {
        const notification = $(`
            <div class="alert alert-info alert-dismissible fade show position-fixed" style="top: 20px; right: 20px; z-index: 9999;">
                <i class="fas fa-envelope mr-2"></i>
                <strong>Nouveau message reçu !</strong>
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        `);
        
        $('body').append(notification);
        
        setTimeout(() => {
            notification.alert('close');
        }, 5000);
    }

    // Message actions
    function viewMessage(messageId) {
        console.log('Viewing message:', messageId);
        
        // Simulate loading message details
        const mockMessageDetails = {
            1: {
                subject: 'Demande de consultation urgente - Garde à vue',
                sender: 'Kouassi Marie-Claire',
                email: 'kouassi.marie@email.com',
                date: 'Aujourd\'hui à 14:30',
                content: `Bonjour Maître,

Mon fils Kouassi Jean-Baptiste a été placé en garde à vue hier soir vers 20h00 au commissariat du Plateau pour une affaire de vol présumé dans un magasin.

Je suis très inquiète et j'aimerais savoir :
1. Quels sont ses droits pendant la garde à vue ?
2. Puis-je lui rendre visite ?
3. A-t-il droit à un avocat ?
4. Combien de temps peut durer cette garde à vue ?

Cette situation me préoccupe énormément. Mon fils n'a jamais eu de problèmes avec la justice et je pense qu'il y a une erreur.

Pourriez-vous me recevoir en urgence aujourd'hui ou demain matin ? Je suis disponible à tout moment.

Merci infiniment pour votre aide.

Cordialement,
Marie-Claire Kouassi
Tél : +225 07 08 09 10 11`
            }
        };

        const message = mockMessageDetails[messageId];
        if (message) {
            $('#modalMessageSubject').text(message.subject);
            $('#messageDetails').html(`
                <div class="message-full-details">
                    <div class="message-meta-full mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>De :</strong> ${message.sender} &lt;${message.email}&gt;
                            </div>
                            <div class="col-md-6 text-right">
                                <strong>Date :</strong> ${message.date}
                            </div>
                        </div>
                    </div>
                    <div class="message-content-full">
                        <pre style="white-space: pre-wrap; font-family: inherit;">${message.content}</pre>
                    </div>
                </div>
            `);
            
            $('#messageModal').modal('show');
            
            // Mark as read
            markAsReadVisual($(`.message-item[data-id="${messageId}"]`));
        }
    }

    function replyMessage(messageId) {
        console.log('Replying to message:', messageId);
        alert('Fonction de réponse à venir - Ouverture de l\'éditeur d\'email');
    }

    function assignMessage(messageId) {
        console.log('Assigning message:', messageId);
        alert('Fonction d\'attribution à venir - Sélection d\'un avocat');
    }

    function deleteMessage(messageId) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce message ?')) {
            $(`.message-item[data-id="${messageId}"]`).fadeOut(() => {
                $(`.message-item[data-id="${messageId}"]`).remove();
                alert('Message supprimé !');
            });
        }
    }

    function markAsRead(messageId) {
        markAsReadVisual($(`.message-item[data-id="${messageId}"]`));
        console.log('Message marked as read:', messageId);
    }

    function markAsUnread(messageId) {
        const messageItem = $(`.message-item[data-id="${messageId}"]`);
        messageItem.removeClass('read').addClass('unread');
        messageItem.find('.message-priority i').removeClass('text-success').addClass('text-warning');
        console.log('Message marked as unread:', messageId);
    }

    function markAsReadVisual(messageItem) {
        messageItem.removeClass('unread').addClass('read');
        messageItem.find('.message-priority i').removeClass('text-warning').addClass('text-success');
    }

    function archiveMessage(messageId) {
        console.log('Archiving message:', messageId);
        $(`.message-item[data-id="${messageId}"]`).fadeOut(() => {
            $(`.message-item[data-id="${messageId}"]`).remove();
            alert('Message archivé !');
        });
    }

    function forwardMessage(messageId) {
        console.log('Forwarding message:', messageId);
        alert('Fonction de transfert à venir');
    }

    // Bulk actions
    function selectAllMessages() {
        const checkboxes = $('.message-select');
        const allChecked = checkboxes.length === checkboxes.filter(':checked').length;
        
        checkboxes.prop('checked', !allChecked);
        updateSelectionCount();
    }

    function updateSelectionCount() {
        const checkedCount = $('.message-select:checked').length;
        
        $('#markReadBtn, #archiveBtn, #deleteBtn').prop('disabled', checkedCount === 0);
        
        if (checkedCount > 0) {
            $('#markReadBtn').html(`<i class="fas fa-eye"></i> (${checkedCount})`);
            $('#archiveBtn').html(`<i class="fas fa-archive"></i> (${checkedCount})`);
            $('#deleteBtn').html(`<i class="fas fa-trash"></i> (${checkedCount})`);
        } else {
            $('#markReadBtn').html('<i class="fas fa-eye"></i>');
            $('#archiveBtn').html('<i class="fas fa-archive"></i>');
            $('#deleteBtn').html('<i class="fas fa-trash"></i>');
        }
    }

    function markSelectedAsRead() {
        const selectedMessages = $('.message-select:checked');
        selectedMessages.each(function() {
            const messageItem = $(this).closest('.message-item');
            markAsReadVisual(messageItem);
        });
        
        selectedMessages.prop('checked', false);
        updateSelectionCount();
        alert(`${selectedMessages.length} message(s) marqué(s) comme lu(s)`);
    }

    function archiveSelected() {
        const selectedMessages = $('.message-select:checked');
        
        if (selectedMessages.length > 0 && confirm(`Archiver ${selectedMessages.length} message(s) ?`)) {
            selectedMessages.each(function() {
                $(this).closest('.message-item').fadeOut();
            });
            
            setTimeout(() => {
                selectedMessages.closest('.message-item').remove();
                alert(`${selectedMessages.length} message(s) archivé(s)`);
            }, 500);
        }
    }

    function deleteSelected() {
        const selectedMessages = $('.message-select:checked');
        
        if (selectedMessages.length > 0 && confirm(`Supprimer définitivement ${selectedMessages.length} message(s) ?`)) {
            selectedMessages.each(function() {
                $(this).closest('.message-item').fadeOut();
            });
            
            setTimeout(() => {
                selectedMessages.closest('.message-item').remove();
                alert(`${selectedMessages.length} message(s) supprimé(s)`);
            }, 500);
        }
    }

    // Filter and search functions
    function applyFilters() {
        console.log('Applying filters...');
        alert('Filtres appliqués !');
    }

    function resetFilters() {
        $('input[type="checkbox"]').prop('checked', true);
        $('select').prop('selectedIndex', 0);
        alert('Filtres réinitialisés !');
    }

    function searchMessages() {
        const searchTerm = $('#messageSearch').val().toLowerCase();
        
        $('.message-item').each(function() {
            const messageText = $(this).text().toLowerCase();
            const matches = messageText.includes(searchTerm);
            $(this).toggle(matches);
        });
    }

    function sortMessages(sortBy) {
        console.log('Sorting messages by:', sortBy);
    }

    // Global actions
    function markAllAsRead() {
        $('.message-item.unread').each(function() {
            markAsReadVisual($(this));
        });
        alert('Tous les messages ont été marqués comme lus !');
    }

    function exportMessages() {
        alert('Export des messages en cours...');
    }

    function openSettings() {
        alert('Paramètres des messages à venir...');
    }

    // Quick actions
    function createTemplate() {
        alert('Création de template de réponse à venir...');
    }

    function bulkReply() {
        alert('Réponse en masse à venir...');
    }

    function autoAssign() {
        alert('Attribution automatique à venir...');
    }

    function scheduleFollowUp() {
        alert('Programmation de suivi à venir...');
    }

    // Modal actions
    function replyFromModal() {
        $('#messageModal').modal('hide');
        alert('Ouverture de l\'éditeur de réponse...');
    }

    function markAsTreated() {
        alert('Message marqué comme traité !');
        $('#messageModal').modal('hide');
    }
</script>

<style>
    .message-list {
        max-height: 800px;
        overflow-y: auto;
    }

    .message-item {
        display: flex;
        align-items: flex-start;
        padding: 15px;
        border-bottom: 1px solid #e3e6f0;
        transition: all 0.2s;
        cursor: pointer;
    }

    .message-item:hover {
        background-color: #f8f9fc;
    }

    .message-item.unread {
        background-color: #fff3cd;
        border-left: 4px solid #ffc107;
    }

    .message-item.urgent {
        border-left-color: #dc3545 !important;
    }

    .message-item.read {
        opacity: 0.8;
    }

    .message-checkbox {
        margin-right: 10px;
        margin-top: 5px;
    }

    .message-priority {
        margin-right: 10px;
        margin-top: 5px;
        width: 20px;
        text-align: center;
    }

    .message-content {
        flex: 1;
        min-width: 0;
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 5px;
    }

    .message-sender strong {
        color: #5a5c69;
        font-size: 0.9rem;
    }

    .message-sender .text-muted {
        font-size: 0.8rem;
        margin-left: 8px;
    }

    .message-meta {
        text-align: right;
        white-space: nowrap;
    }

    .message-time {
        font-size: 0.8rem;
        color: #858796;
        margin-right: 8px;
    }

    .message-subject {
        font-size: 0.95rem;
        margin-bottom: 5px;
        color: #3a3b45;
    }

    .message-subject strong {
        font-weight: 600;
    }

    .message-preview {
        font-size: 0.85rem;
        color: #6e707e;
        line-height: 1.4;
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .message-tags {
        margin-bottom: 5px;
    }

    .message-tags .tag {
        display: inline-block;
        background-color: #e9ecef;
        color: #6c757d;
        padding: 2px 6px;
        border-radius: 10px;
        font-size: 0.7rem;
        margin-right: 4px;
    }

    .message-actions {
        margin-left: 15px;
        display: flex;
        gap: 5px;
        flex-shrink: 0;
    }

    .badge-sm {
        font-size: 0.7rem;
        padding: 0.25em 0.5em;
    }

    .d-grid {
        display: grid !important;
    }

    .gap-2 {
        gap: 0.5rem !important;
    }

    @media (max-width: 768px) {
        .message-header {
            flex-direction: column;
        }
        
        .message-meta {
            text-align: left;
            margin-top: 5px;
        }
        
        .message-actions {
            flex-direction: column;
        }
    }
</style>
@endsection