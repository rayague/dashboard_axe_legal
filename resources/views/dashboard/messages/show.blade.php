@extends('dashboard.layout')

@section('title', 'Message - Axe Legal')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <!-- En-tête avec les informations essentielles -->
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h4 class="mb-1">{{ $message->name }}</h4>
                            <p class="text-muted mb-0">
                                {{ $message->created_at->format('d/m/Y à H:i') }}
                            </p>
                        </div>
                        <div>
                            @if($message->phone)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $message->phone) }}" 
                                   target="_blank" 
                                   class="btn btn-success btn-lg mr-2">
                                    <i class="fab fa-whatsapp mr-2"></i> Répondre par WhatsApp
                                </a>
                            @endif
                            <a href="mailto:{{ $message->email }}" 
                               class="btn btn-primary btn-lg">
                                <i class="fas fa-envelope mr-2"></i> Répondre par Email
                            </a>
                        </div>
                    </div>

                    <!-- Contenu du message -->
                    <div class="message-content p-4 bg-light rounded mb-4">
                        <p class="mb-0" style="white-space: pre-wrap;">{{ $message->message }}</p>
                    </div>

                    <!-- Informations de contact -->
                    <div class="contact-info text-muted">
                        <p class="mb-2">
                            <i class="fas fa-envelope mr-2"></i> {{ $message->email }}
                        </p>
                        @if($message->phone)
                            <p class="mb-0">
                                <i class="fas fa-phone mr-2"></i> {{ $message->phone }}
                            </p>
                        @endif
                    </div>

                    <!-- Bouton retour -->
                    <div class="mt-4 text-center">
                        <a href="{{ route('dashboard.messages.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i> Retour aux messages
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .btn-success {
        background-color: #25D366;
        border-color: #25D366;
    }
    .btn-success:hover {
        background-color: #128C7E;
        border-color: #128C7E;
    }
    .message-content {
        font-size: 1.1rem;
        line-height: 1.6;
    }
</style>
@endpush
@endsection