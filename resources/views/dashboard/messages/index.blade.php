@extends('dashboard.layout')

@section('title', 'Messagerie - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-comments text-primary mr-2"></i>
            Messagerie
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Messages</li>
                </ol>
            </nav>
            <button class="btn btn-primary btn-sm" onclick="newConversation()">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouvelle Conversation</span>
                <span class="d-sm-none">Nouveau</span>
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Messages Non Lus</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">23</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Conversations Actives</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">47</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comment-dots fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Temps Réponse Moyen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2h 15min</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Taux Satisfaction</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">95%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 95%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-thumbs-up fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Messaging Interface -->
    <div class="row">
        <!-- Conversations List -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-list mr-2"></i>
                        Conversations
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow">
                            <div class="dropdown-header">Filtrer par:</div>
                            <a class="dropdown-item" href="#" onclick="filterConversations('all')">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Toutes
                            </a>
                            <a class="dropdown-item" href="#" onclick="filterConversations('unread')">
                                <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
                                Non lues
                            </a>
                            <a class="dropdown-item" href="#" onclick="filterConversations('archived')">
                                <i class="fas fa-archive fa-sm fa-fw mr-2 text-gray-400"></i>
                                Archivées
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <!-- Search Bar -->
                    <div class="p-3 border-bottom">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="searchConversations" placeholder="Rechercher conversations...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Conversations List -->
                    <div class="conversations-list" style="max-height: 600px; overflow-y: auto;">
                        <!-- Conversation Item 1 -->
                        <div class="conversation-item p-3 border-bottom cursor-pointer" onclick="selectConversation('conv-1')" data-conversation="conv-1">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="avatar-circle bg-primary text-white">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="font-weight-bold mb-1">Sophie Bernard</h6>
                                        <div class="d-flex align-items-center">
                                            <small class="text-muted mr-2">14h30</small>
                                            <span class="badge badge-primary badge-sm">3</span>
                                        </div>
                                    </div>
                                    <p class="mb-1 text-truncate">Concernant le contrat de travail, j'aurais besoin de précisions sur...</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="fas fa-briefcase mr-1"></i>Droit du travail
                                        </small>
                                        <small class="text-success">
                                            <i class="fas fa-circle mr-1"></i>En ligne
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Conversation Item 2 -->
                        <div class="conversation-item p-3 border-bottom cursor-pointer" onclick="selectConversation('conv-2')" data-conversation="conv-2">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="avatar-circle bg-success text-white">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="font-weight-bold mb-1">Entreprise SARL TECH</h6>
                                        <div class="d-flex align-items-center">
                                            <small class="text-muted mr-2">12h15</small>
                                            <span class="badge badge-success badge-sm">1</span>
                                        </div>
                                    </div>
                                    <p class="mb-1 text-truncate">Merci pour votre conseil, nous allons procéder comme convenu...</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="fas fa-handshake mr-1"></i>Droit des affaires
                                        </small>
                                        <small class="text-warning">
                                            <i class="fas fa-circle mr-1"></i>Absent
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Conversation Item 3 -->
                        <div class="conversation-item p-3 border-bottom cursor-pointer" onclick="selectConversation('conv-3')" data-conversation="conv-3">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="avatar-circle bg-info text-white">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div class="status-indicator bg-secondary"></div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="font-weight-bold mb-1">Michel Dubois</h6>
                                        <div class="d-flex align-items-center">
                                            <small class="text-muted mr-2">Hier</small>
                                        </div>
                                    </div>
                                    <p class="mb-1 text-truncate">Documents transmis par email. Bonne journée.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="fas fa-home mr-1"></i>Droit immobilier
                                        </small>
                                        <small class="text-secondary">
                                            <i class="fas fa-circle mr-1"></i>Hors ligne
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Conversation Item 4 -->
                        <div class="conversation-item p-3 border-bottom cursor-pointer" onclick="selectConversation('conv-4')" data-conversation="conv-4">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="avatar-circle bg-warning text-white">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="font-weight-bold mb-1">Cabinet Partenaire</h6>
                                        <div class="d-flex align-items-center">
                                            <small class="text-muted mr-2">2j</small>
                                            <span class="badge badge-info badge-sm">5</span>
                                        </div>
                                    </div>
                                    <p class="mb-1 text-truncate">Proposition de collaboration sur le dossier complexe...</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="fas fa-handshake mr-1"></i>Partenariat
                                        </small>
                                        <small class="text-success">
                                            <i class="fas fa-circle mr-1"></i>En ligne
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- More conversations... -->
                        <div class="conversation-item p-3 border-bottom cursor-pointer" onclick="selectConversation('conv-5')" data-conversation="conv-5">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="avatar-circle bg-secondary text-white">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="font-weight-bold mb-1">Isabelle Leroy</h6>
                                        <small class="text-muted">3j</small>
                                    </div>
                                    <p class="mb-1 text-truncate">Parfait, rendez-vous confirmé pour demain.</p>
                                    <small class="text-muted">
                                        <i class="fas fa-gavel mr-1"></i>Médiation
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Interface -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow h-100">
                <!-- Chat Header -->
                <div class="card-header py-3 bg-primary text-white">
                    <div id="chatHeader" class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="avatar-circle bg-white text-primary mr-3">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 font-weight-bold">Sophie Bernard</h6>
                                <small class="opacity-75">
                                    <i class="fas fa-circle text-success mr-1"></i>En ligne • Dernière activité: maintenant
                                </small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-light btn-sm mr-2" onclick="startVideoCall()" title="Appel vidéo">
                                <i class="fas fa-video"></i>
                            </button>
                            <button class="btn btn-light btn-sm mr-2" onclick="startVoiceCall()" title="Appel vocal">
                                <i class="fas fa-phone"></i>
                            </button>
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm" data-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" onclick="viewProfile()">
                                        <i class="fas fa-user mr-2"></i>Voir profil
                                    </a>
                                    <a class="dropdown-item" href="#" onclick="archiveConversation()">
                                        <i class="fas fa-archive mr-2"></i>Archiver
                                    </a>
                                    <a class="dropdown-item" href="#" onclick="blockUser()">
                                        <i class="fas fa-ban mr-2"></i>Bloquer
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chat Messages -->
                <div class="card-body p-0">
                    <div id="chatMessages" class="chat-messages" style="height: 400px; overflow-y: auto;">
                        <!-- Message from client -->
                        <div class="message-container p-3">
                            <div class="d-flex">
                                <div class="avatar-circle bg-primary text-white mr-3">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="message-content flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <h6 class="font-weight-bold mb-0">Sophie Bernard</h6>
                                        <small class="text-muted">14h30</small>
                                    </div>
                                    <div class="message-bubble bg-light p-3 rounded">
                                        <p class="mb-0">Bonjour Maître, j'espère que vous allez bien. Je vous écris concernant le contrat de travail dont nous avons parlé lors de notre dernière rencontre. J'aurais besoin de quelques précisions avant de procéder à la signature.</p>
                                    </div>
                                    <div class="message-actions mt-2">
                                        <small class="text-muted">
                                            <i class="fas fa-check-double text-primary"></i> Lu
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Message from lawyer -->
                        <div class="message-container p-3 bg-light">
                            <div class="d-flex">
                                <div class="avatar-circle bg-success text-white mr-3">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="message-content flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <h6 class="font-weight-bold mb-0">Me Marie Dubois</h6>
                                        <small class="text-muted">14h32</small>
                                    </div>
                                    <div class="message-bubble bg-primary text-white p-3 rounded">
                                        <p class="mb-0">Bonjour Sophie, bien sûr ! Je suis à votre disposition pour clarifier tous les points qui vous préoccupent. Quelles sont précisément les clauses sur lesquelles vous souhaitez des explications ?</p>
                                    </div>
                                    <div class="message-actions mt-2">
                                        <small class="text-muted">
                                            <i class="fas fa-check text-success"></i> Envoyé
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Message with attachment -->
                        <div class="message-container p-3">
                            <div class="d-flex">
                                <div class="avatar-circle bg-primary text-white mr-3">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="message-content flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <h6 class="font-weight-bold mb-0">Sophie Bernard</h6>
                                        <small class="text-muted">14h35</small>
                                    </div>
                                    <div class="message-bubble bg-light p-3 rounded">
                                        <p class="mb-2">Voici le document en question. J'ai des interrogations sur l'article 5 concernant la période d'essai et l'article 12 sur les heures supplémentaires.</p>
                                        <div class="attachment-preview border rounded p-2 d-flex align-items-center">
                                            <i class="fas fa-file-pdf text-danger fa-2x mr-3"></i>
                                            <div>
                                                <div class="font-weight-bold">contrat_travail_draft.pdf</div>
                                                <small class="text-muted">2.3 MB • PDF</small>
                                            </div>
                                            <button class="btn btn-outline-primary btn-sm ml-auto">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="message-actions mt-2">
                                        <small class="text-muted">
                                            <i class="fas fa-check-double text-primary"></i> Lu
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Typing indicator -->
                        <div class="message-container p-3" id="typingIndicator" style="display: none;">
                            <div class="d-flex">
                                <div class="avatar-circle bg-success text-white mr-3">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="message-content">
                                    <div class="typing-indicator">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Message Input -->
                    <div class="card-footer">
                        <div class="message-input-container">
                            <form id="messageForm" class="d-flex align-items-end">
                                <div class="flex-grow-1 mr-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button" onclick="attachFile()" title="Joindre fichier">
                                                <i class="fas fa-paperclip"></i>
                                            </button>
                                        </div>
                                        <textarea class="form-control" id="messageInput" rows="1" placeholder="Tapez votre message..." style="resize: none;"></textarea>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" onclick="insertEmoji()" title="Émojis">
                                                <i class="fas fa-smile"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <button type="submit" class="btn btn-primary mb-1" title="Envoyer">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-success btn-sm" onclick="quickReply()" title="Réponses rapides">
                                        <i class="fas fa-bolt"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Reply Modal -->
    <div class="modal fade" id="quickReplyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-bolt mr-2"></i>
                        Réponses Rapides
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action" onclick="insertQuickReply('Merci pour votre message. Je reviens vers vous dans les plus brefs délais.')">
                            <i class="fas fa-clock mr-2 text-primary"></i>
                            Accusé de réception
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" onclick="insertQuickReply('Pouvez-vous me fournir plus de détails sur ce point ?')">
                            <i class="fas fa-question mr-2 text-info"></i>
                            Demande de précisions
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" onclick="insertQuickReply('Je propose de planifier un rendez-vous pour discuter de ce sujet en détail.')">
                            <i class="fas fa-calendar mr-2 text-success"></i>
                            Proposition de RDV
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" onclick="insertQuickReply('Veuillez trouver ci-joint les documents demandés.')">
                            <i class="fas fa-file mr-2 text-warning"></i>
                            Envoi de documents
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" onclick="insertQuickReply('Suite à notre échange, voici un récapitulatif des points abordés.')">
                            <i class="fas fa-list mr-2 text-secondary"></i>
                            Récapitulatif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- File Input (Hidden) -->
    <input type="file" id="fileInput" style="display: none;" multiple accept=".pdf,.doc,.docx,.txt,.jpg,.png">
@endsection

@section('styles')
<style>
    .conversations-list {
        border-top: 1px solid #e3e6f0;
    }
    
    .conversation-item {
        transition: all 0.2s;
        cursor: pointer;
    }
    
    .conversation-item:hover {
        background-color: #f8f9fc;
    }
    
    .conversation-item.active {
        background-color: #eaecf4;
        border-left: 3px solid #4e73df;
    }
    
    .avatar-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        position: relative;
    }
    
    .status-indicator {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 2px solid white;
    }
    
    .chat-messages {
        background: linear-gradient(135deg, #f8f9fc 0%, #eaecf4 100%);
    }
    
    .message-container:nth-child(even) {
        background-color: rgba(255, 255, 255, 0.5);
    }
    
    .message-bubble {
        max-width: 80%;
        word-wrap: break-word;
        box-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }
    
    .typing-indicator {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        background-color: #e9ecef;
        border-radius: 20px;
        width: fit-content;
    }
    
    .typing-indicator span {
        height: 8px;
        width: 8px;
        background-color: #6c757d;
        border-radius: 50%;
        display: inline-block;
        margin: 0 1px;
        animation: typing 1.4s infinite ease-in-out both;
    }
    
    .typing-indicator span:nth-child(1) { animation-delay: -0.32s; }
    .typing-indicator span:nth-child(2) { animation-delay: -0.16s; }
    
    @keyframes typing {
        0%, 80%, 100% {
            transform: scale(0);
        }
        40% {
            transform: scale(1);
        }
    }
    
    .attachment-preview {
        background-color: #f8f9fc;
        transition: all 0.2s;
    }
    
    .attachment-preview:hover {
        background-color: #eaecf4;
    }
    
    #messageInput {
        min-height: 38px;
        max-height: 120px;
    }
    
    .cursor-pointer {
        cursor: pointer;
    }
    
    @media (max-width: 768px) {
        .avatar-circle {
            width: 35px;
            height: 35px;
            font-size: 0.9rem;
        }
        
        .message-bubble {
            max-width: 95%;
        }
        
        .conversation-item {
            padding: 0.75rem !important;
        }
        
        #chatMessages {
            height: 300px !important;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    let currentConversation = 'conv-1';
    let messageInput = document.getElementById('messageInput');
    let chatMessages = document.getElementById('chatMessages');
    
    // Initialize messaging
    $(document).ready(function() {
        // Auto-resize textarea
        messageInput.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
        
        // Scroll to bottom of messages
        scrollToBottom();
        
        // Simulate real-time updates
        setInterval(updateOnlineStatus, 30000);
        
        // Mark first conversation as active
        selectConversation('conv-1');
    });

    // Conversation management
    function selectConversation(conversationId) {
        // Remove active class from all conversations
        document.querySelectorAll('.conversation-item').forEach(item => {
            item.classList.remove('active');
        });
        
        // Add active class to selected conversation
        const selectedItem = document.querySelector(`[data-conversation="${conversationId}"]`);
        if (selectedItem) {
            selectedItem.classList.add('active');
        }
        
        currentConversation = conversationId;
        loadConversationMessages(conversationId);
        
        // Mark messages as read
        const badge = selectedItem?.querySelector('.badge');
        if (badge) {
            badge.style.display = 'none';
        }
    }

    function loadConversationMessages(conversationId) {
        // Mock data - replace with actual API call
        const conversations = {
            'conv-1': {
                user: 'Sophie Bernard',
                avatar: 'fas fa-user',
                status: 'En ligne',
                messages: [
                    {
                        sender: 'Sophie Bernard',
                        time: '14h30',
                        content: 'Bonjour Maître, j\'espère que vous allez bien...',
                        type: 'received'
                    }
                ]
            }
            // Add more conversations...
        };
        
        // Update chat header
        updateChatHeader(conversations[conversationId] || conversations['conv-1']);
        
        // Load messages (simplified for demo)
        console.log('Loading messages for conversation:', conversationId);
    }

    function updateChatHeader(conversation) {
        const chatHeader = document.getElementById('chatHeader');
        // Update header content based on conversation data
        // This is simplified - in real implementation, you'd update all header elements
    }

    // Message sending
    document.getElementById('messageForm').addEventListener('submit', function(e) {
        e.preventDefault();
        sendMessage();
    });

    function sendMessage() {
        const message = messageInput.value.trim();
        if (!message) return;
        
        // Add message to chat
        addMessageToChat({
            sender: 'Me Marie Dubois',
            content: message,
            time: new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' }),
            type: 'sent'
        });
        
        // Clear input
        messageInput.value = '';
        messageInput.style.height = 'auto';
        
        // Scroll to bottom
        scrollToBottom();
        
        // Simulate typing indicator
        showTypingIndicator();
        
        // Simulate response after delay
        setTimeout(() => {
            hideTypingIndicator();
            simulateResponse();
        }, 2000);
    }

    function addMessageToChat(message) {
        const messageHtml = `
            <div class="message-container p-3 ${message.type === 'sent' ? 'bg-light' : ''}">
                <div class="d-flex">
                    <div class="avatar-circle ${message.type === 'sent' ? 'bg-success' : 'bg-primary'} text-white mr-3">
                        <i class="fas ${message.type === 'sent' ? 'fa-user-tie' : 'fa-user'}"></i>
                    </div>
                    <div class="message-content flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="font-weight-bold mb-0">${message.sender}</h6>
                            <small class="text-muted">${message.time}</small>
                        </div>
                        <div class="message-bubble ${message.type === 'sent' ? 'bg-primary text-white' : 'bg-light'} p-3 rounded">
                            <p class="mb-0">${message.content}</p>
                        </div>
                        <div class="message-actions mt-2">
                            <small class="text-muted">
                                <i class="fas fa-check text-success"></i> Envoyé
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Insert before typing indicator
        const typingIndicator = document.getElementById('typingIndicator');
        typingIndicator.insertAdjacentHTML('beforebegin', messageHtml);
    }

    function showTypingIndicator() {
        document.getElementById('typingIndicator').style.display = 'block';
        scrollToBottom();
    }

    function hideTypingIndicator() {
        document.getElementById('typingIndicator').style.display = 'none';
    }

    function simulateResponse() {
        const responses = [
            "Merci pour votre message, je vais examiner cela.",
            "Pouvez-vous me fournir plus de détails ?",
            "Je reviens vers vous avec une réponse complète.",
            "C'est noté, nous pourrons en discuter lors de notre prochain rendez-vous.",
            "Parfait, je prépare les documents nécessaires."
        ];
        
        const randomResponse = responses[Math.floor(Math.random() * responses.length)];
        
        addMessageToChat({
            sender: 'Sophie Bernard',
            content: randomResponse,
            time: new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' }),
            type: 'received'
        });
        
        scrollToBottom();
    }

    function scrollToBottom() {
        setTimeout(() => {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }, 100);
    }

    // Utility functions
    function newConversation() {
        Swal.fire({
            title: 'Nouvelle conversation',
            text: 'Avec qui souhaitez-vous commencer une conversation ?',
            input: 'text',
            inputPlaceholder: 'Nom du contact...',
            showCancelButton: true,
            confirmButtonText: 'Créer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire('Conversation créée !', `Conversation avec ${result.value} créée.`, 'success');
            }
        });
    }

    function attachFile() {
        document.getElementById('fileInput').click();
    }

    // File input change handler
    document.getElementById('fileInput').addEventListener('change', function(e) {
        const files = Array.from(e.target.files);
        if (files.length > 0) {
            files.forEach(file => {
                addFileToMessage(file);
            });
        }
    });

    function addFileToMessage(file) {
        const filePreview = `
            <div class="attachment-preview border rounded p-2 d-flex align-items-center mb-2">
                <i class="fas fa-file text-primary fa-2x mr-3"></i>
                <div>
                    <div class="font-weight-bold">${file.name}</div>
                    <small class="text-muted">${(file.size / 1024 / 1024).toFixed(2)} MB</small>
                </div>
                <button class="btn btn-outline-danger btn-sm ml-auto" onclick="removeFile(this)">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        
        // Add to message input area (simplified)
        console.log('File attached:', file.name);
    }

    function removeFile(button) {
        button.closest('.attachment-preview').remove();
    }

    function insertEmoji() {
        // Simple emoji insertion - in real implementation, you'd show an emoji picker
        const emojis = ['😊', '👍', '❤️', '😂', '🤔', '✅', '📄', '💼'];
        const randomEmoji = emojis[Math.floor(Math.random() * emojis.length)];
        messageInput.value += randomEmoji;
        messageInput.focus();
    }

    function quickReply() {
        $('#quickReplyModal').modal('show');
    }

    function insertQuickReply(text) {
        messageInput.value = text;
        $('#quickReplyModal').modal('hide');
        messageInput.focus();
    }

    // Filter functions
    function filterConversations(type) {
        console.log('Filtering conversations by:', type);
        // Implement filtering logic
    }

    // Search functionality
    document.getElementById('searchConversations').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        document.querySelectorAll('.conversation-item').forEach(item => {
            const name = item.querySelector('h6').textContent.toLowerCase();
            const preview = item.querySelector('p').textContent.toLowerCase();
            
            if (name.includes(searchTerm) || preview.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Action functions
    function startVideoCall() {
        Swal.fire({
            title: 'Appel vidéo',
            text: 'Lancement de l\'appel vidéo...',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function startVoiceCall() {
        Swal.fire({
            title: 'Appel vocal',
            text: 'Lancement de l\'appel vocal...',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function viewProfile() {
        Swal.fire({
            title: 'Profil utilisateur',
            text: 'Ouverture du profil...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function archiveConversation() {
        Swal.fire({
            title: 'Archiver la conversation ?',
            text: 'Cette conversation sera déplacée vers les archives.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Oui, archiver',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire('Archivé !', 'La conversation a été archivée.', 'success');
            }
        });
    }

    function blockUser() {
        Swal.fire({
            title: 'Bloquer cet utilisateur ?',
            text: 'L\'utilisateur ne pourra plus vous envoyer de messages.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, bloquer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire('Bloqué !', 'L\'utilisateur a été bloqué.', 'success');
            }
        });
    }

    function updateOnlineStatus() {
        // Simulate status updates
        console.log('Updating online status...');
    }

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl+Enter to send message
        if (e.ctrlKey && e.key === 'Enter') {
            sendMessage();
        }
        
        // Escape to close modals
        if (e.key === 'Escape') {
            $('.modal').modal('hide');
        }
    });

    // Real-time notifications (simplified)
    function showNotification(title, body) {
        if (Notification.permission === 'granted') {
            new Notification(title, { body: body });
        }
    }

    // Request notification permission
    if ('Notification' in window && Notification.permission === 'default') {
        Notification.requestPermission();
    }
</script>
@endsection