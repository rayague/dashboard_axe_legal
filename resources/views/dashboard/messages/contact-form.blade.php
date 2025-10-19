@extends('dashboard.layout')

@section('title', 'Formulaire de contact - Axe Legal')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Configuration du formulaire de contact</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Paramètres du formulaire</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.messages.update-contact-form') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Champs obligatoires -->
                        <div class="form-group">
                            <label class="font-weight-bold">Champs obligatoires</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="requirePhone" name="require_phone" {{ $settings['require_phone'] ?? false ? 'checked' : '' }}>
                                <label class="custom-control-label" for="requirePhone">Téléphone obligatoire</label>
                            </div>
                        </div>

                        <!-- Texte d'introduction -->
                        <div class="form-group">
                            <label for="introText">Texte d'introduction</label>
                            <textarea class="form-control" id="introText" name="intro_text" rows="3">{{ $settings['intro_text'] ?? '' }}</textarea>
                            <small class="form-text text-muted">Ce texte apparaîtra au-dessus du formulaire de contact</small>
                        </div>

                        <!-- Email de réception -->
                        <div class="form-group">
                            <label for="notificationEmail">Email de notification</label>
                            <input type="email" class="form-control" id="notificationEmail" name="notification_email" value="{{ $settings['notification_email'] ?? '' }}" placeholder="contact@exemple.com">
                            <small class="form-text text-muted">Les nouveaux messages seront envoyés à cette adresse</small>
                        </div>

                        <!-- Message de confirmation -->
                        <div class="form-group">
                            <label for="confirmationMessage">Message de confirmation</label>
                            <textarea class="form-control" id="confirmationMessage" name="confirmation_message" rows="2">{{ $settings['confirmation_message'] ?? 'Merci pour votre message. Nous vous répondrons dans les plus brefs délais.' }}</textarea>
                            <small class="form-text text-muted">Ce message s'affichera après l'envoi du formulaire</small>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                            <a href="{{ route('dashboard.messages.index') }}" class="btn btn-secondary">Retour aux messages</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
