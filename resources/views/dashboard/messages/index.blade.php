@extends('dashboard.layout')

@section('title', 'Messages reçus - Axe Legal')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Messages & Consultations</h1>
        <div class="d-flex">
            <span class="badge badge-primary badge-pill p-2 mr-2">
                <i class="fas fa-envelope mr-1"></i>
                Messages: {{ $totalCount }}
            </span>
            <span class="badge badge-info badge-pill p-2 mr-2">
                <i class="fas fa-calendar-check mr-1"></i>
                Consultations: {{ $consultationsCount }}
            </span>
            <span class="badge badge-warning badge-pill p-2">
                <i class="fas fa-clock mr-1"></i>
                En attente: {{ $pendingConsultationsCount }}
            </span>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs mb-4" id="messagesTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-messages" role="tab">
                <i class="fas fa-envelope mr-2"></i>
                Messages de Contact ({{ $totalCount }})
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="consultations-tab" data-toggle="tab" href="#consultations" role="tab">
                <i class="fas fa-calendar-check mr-2"></i>
                Demandes de Consultation ({{ $consultationsCount }})
            </a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="messagesTabContent">
        <!-- Messages de Contact Tab -->
        <div class="tab-pane fade" id="contact-messages" role="tabpanel">
            <div class="row">
                @forelse($messages as $message)
                    <div class="col-12 mb-3">
                        <div class="card shadow-sm {{ $message->status === 'unread' ? 'border-left-warning' : '' }}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center mb-2">
                                            <h5 class="card-title mb-0 mr-2">{{ $message->name }}</h5>
                                            @if($message->status === 'unread')
                                                <span class="badge badge-warning">Non lu</span>
                                            @else
                                                <span class="badge badge-secondary">Lu</span>
                                            @endif
                                        </div>
                                        <p class="text-muted small mb-0">
                                            <i class="far fa-clock mr-1"></i>
                                            Reçu le: {{ $message->created_at->format('d/m/Y à H:i') }}
                                        </p>
                                    </div>
                                    <div class="d-flex">
                                        @if($message->phone)
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $message->phone) }}" 
                                               target="_blank" 
                                               class="btn btn-success btn-sm mr-2">
                                                <i class="fab fa-whatsapp mr-1"></i> WhatsApp
                                            </a>
                                        @endif
                                        <a href="mailto:{{ $message->email }}" 
                                           class="btn btn-primary btn-sm">
                                            <i class="fas fa-envelope mr-1"></i> Email
                                        </a>
                                    </div>
                                </div>
                                
                                @if($message->subject)
                                    <div class="mb-2">
                                        <strong><i class="fas fa-tag mr-1"></i> Sujet:</strong> {{ $message->subject }}
                                    </div>
                                @endif
                                
                                <div class="message-content mb-3">
                                    <strong><i class="fas fa-comment mr-1"></i> Message:</strong>
                                    <p class="card-text mb-0 ml-4">{{ $message->message }}</p>
                                </div>
                                
                                <div class="border-top pt-3 mt-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-muted">
                                                <i class="fas fa-envelope mr-1"></i> 
                                                {{ $message->email }}
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            @if($message->phone)
                                                <span class="text-muted">
                                                    <i class="fas fa-phone mr-1"></i> 
                                                    {{ $message->phone }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body text-center py-5">
                                <i class="fas fa-inbox fa-4x text-muted mb-4"></i>
                                <h4 class="text-muted">Aucun message de contact</h4>
                                <p class="text-muted">Les messages envoyés via le formulaire de contact apparaîtront ici</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($messages->hasPages())
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Consultations Tab -->
        <div class="tab-pane fade show active" id="consultations" role="tabpanel">
        <div class="row">
            @forelse($consultations as $consultation)
                <div class="col-12 mb-3">
                    <div class="card shadow-sm {{ $consultation->status === 'pending' || !$consultation->status ? 'border-left-info' : '' }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center mb-2">
                                        <h5 class="card-title mb-0 mr-2">{{ $consultation->name }}</h5>
                                        @if($consultation->status === 'pending' || !$consultation->status)
                                            <span class="badge badge-warning">En attente</span>
                                        @elseif($consultation->status === 'completed')
                                            <span class="badge badge-success">Complétée</span>
                                        @elseif($consultation->status === 'cancelled')
                                            <span class="badge badge-danger">Annulée</span>
                                        @endif
                                        
                                        @if($consultation->consultation_type)
                                            <span class="badge badge-info ml-2">
                                                <i class="fas fa-{{ $consultation->consultation_type === 'presentiel' ? 'user' : 'phone' }} mr-1"></i>
                                                {{ ucfirst($consultation->consultation_type) }}
                                            </span>
                                        @endif
                                    </div>
                                    <p class="text-muted small mb-0">
                                        <i class="far fa-clock mr-1"></i>
                                        Reçu le: {{ $consultation->created_at->format('d/m/Y à H:i') }}
                                        @if($consultation->scheduled_at)
                                            | <i class="fas fa-calendar-alt mr-1 ml-2"></i>
                                            RDV: {{ \Carbon\Carbon::parse($consultation->scheduled_at)->format('d/m/Y à H:i') }}
                                        @endif
                                    </p>
                                </div>
                                <div class="d-flex">
                                    @if($consultation->phone)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $consultation->phone) }}" 
                                           target="_blank" 
                                           class="btn btn-success btn-sm mr-2">
                                            <i class="fab fa-whatsapp mr-1"></i> WhatsApp
                                        </a>
                                    @endif
                                    <a href="mailto:{{ $consultation->email }}" 
                                       class="btn btn-primary btn-sm">
                                        <i class="fas fa-envelope mr-1"></i> Email
                                    </a>
                                </div>
                            </div>
                            
                            @if($consultation->subject)
                                <div class="mb-2">
                                    <strong><i class="fas fa-tag mr-1"></i> Sujet:</strong> {{ $consultation->subject }}
                                </div>
                            @endif
                            
                            @if($consultation->message)
                                <div class="message-content mb-3">
                                    <strong><i class="fas fa-comment mr-1"></i> Message:</strong>
                                    <p class="card-text mb-0 ml-4">{{ $consultation->message }}</p>
                                </div>
                            @endif
                            
                            <div class="border-top pt-3 mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="text-muted">
                                            <i class="fas fa-envelope mr-1"></i> 
                                            {{ $consultation->email }}
                                        </span>
                                    </div>
                                    <div class="col-md-4">
                                        @if($consultation->phone)
                                            <span class="text-muted">
                                                <i class="fas fa-phone mr-1"></i> 
                                                {{ $consultation->phone }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <a href="{{ route('dashboard.consultations.historique') }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye mr-1"></i> Voir détails
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-calendar-times fa-4x text-muted mb-4"></i>
                            <h4 class="text-muted">Aucune demande de consultation</h4>
                            <p class="text-muted">Les demandes de consultation apparaîtront ici</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        @if($consultations->hasPages())
            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        {{ $consultations->links() }}
                    </div>
                </div>
            </div>
        @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .border-left-info {
        border-left: 4px solid #36b9cc !important;
    }
    
    .border-left-success {
        border-left: 4px solid #1cc88a !important;
    }
    
    .border-left-danger {
        border-left: 4px solid #e74a3b !important;
    }
    
    .border-left-warning {
        border-left: 4px solid #f6c23e !important;
    }
    
    .message-content {
        line-height: 1.6;
    }
    
    .badge {
        font-size: 0.85rem;
        padding: 0.4em 0.6em;
    }
    
    .nav-tabs .nav-link {
        color: #6c757d;
        font-weight: 500;
    }
    
    .nav-tabs .nav-link.active {
        color: #1E5AA8;
        border-bottom: 2px solid #1E5AA8;
    }
</style>
@endsection
